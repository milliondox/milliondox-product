<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\CustomerContract;
use App\Models\CustomerNotification;
use App\Models\Announcement;
use DB;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\Helpers\Builder\EmailParams;
use MailerSend\Helpers\Builder\SmsParams;

use Illuminate\Support\Facades\Log;

class ContractController extends Controller
{
   // customer creation code start from here 
   public function contractmanage()
   {
       $customercount = Customer::where('customer_created_by', auth()->id())->count();
       $customer = Customer::where('customer_created_by', auth()->id())->get();
   
       // Get the customer contracts related to the authenticated user and group them by customer_id
       $contracts = Customer::where('customer_created_by', auth()->id())
           ->join('customercontracttb', 'customertb.id', '=', 'customercontracttb.customer_id')
           ->distinct()
           ->get(['customertb.id as customer_id', 'customercontracttb.startend'])
           ->groupBy('customer_id'); // Group by customer_id to get all contracts for each customer
   
       // Iterate through each customer and check their contract status
       // foreach ($customer as $cust) {
       //     $status = 'Inactive'; // Default status is Inactive
   
       //     // Check if the customer has a matching contract
       //     if ($contracts->has($cust->id)) {
       //         $status = 'Inactive'; // Reset to Inactive by default
   
       //         // Get all startend dates for the customer (an array of contract startend dates)
       //         $customerContracts = $contracts[$cust->id]; // Get all contract end dates for this customer
   
       //         // Compare contract dates
       //         foreach ($customerContracts as $contract) {
       //             $contractEndDate = Carbon::parse($contract->startend); // Parse the startend date
       //             $today = Carbon::today(); // Today's date
   
       //             // If any contract's end date is greater than or equal to today, set the status to Active
       //             if ($contractEndDate->greaterThanOrEqualTo($today)) {
       //                 $status = 'Active';
       //                 break; // Exit the loop if at least one contract is active
       //             }
       //         }
       //     }
   
       //     // Set the status for the current customer
       //     $cust->status = $status;
       // }
   
       // Iterate through each customer and check their contract status
   foreach ($customer as $cust) {
       $status = 'Inactive'; // Default status is Inactive
   
       // Check if the customer has a matching contract
       if ($contracts->has($cust->id)) {
           $status = 'Inactive'; // Reset to Inactive by default
   
           // Get all contracts for the customer
           $customerContracts = $contracts[$cust->id]; // Get all contract records for this customer
   
           // Compare contract dates
           foreach ($customerContracts as $contract) {
               // Check if startend is null
               if (is_null($contract->startend)) {
                   $status = 'Inactive';
                   continue; // Skip to the next contract
               }
   
               // Parse the startend date
               $contractEndDate = Carbon::parse($contract->startend);
               $today = Carbon::today();
   
               // If any contract's end date is greater than or equal to today, set the status to Active
               if ($contractEndDate->greaterThanOrEqualTo($today)) {
                   $status = 'Active';
                   break; // Exit the loop if at least one contract is active
               }
           }
       }
   
       // Set the status for the current customer
       $cust->status = $status;
   }
   
       $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
       $user = auth()->user();
   
       return view('user.Contract-Management.contract-manage', compact('cli_announcements', 'user', 'customer', 'customercount', 'contracts'));
   }
   
   public function contractmanagedetail($id)
   {
       $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
       $user = auth()->user();
       $customerrecord = Customer::find($id);

       $customercontract = CustomerContract::where('customer_id', $id)->get();
       $divisions = $customerrecord->customerContracts->pluck('division')->unique();
      
       // dd($customerrecord);

       $today = \Carbon\Carbon::today();
   $hasActive = false;

   foreach ($customercontract as $contract) {
       if (is_null($contract->startend)) {
           $contract->status = 'Inactive';
       } else {
           $contractEndDate = \Carbon\Carbon::parse($contract->startend);
           $contract->status = $contractEndDate->greaterThanOrEqualTo($today) ? 'Active' : 'Inactive';
       }
   
       // Check if at least one contract is active
       if ($contract->status === 'Active') {
           $hasActive = true;
           break; // No need to check further if one is active
       }
   }
   
   // Determine overall status
   $overallStatus = $hasActive ? 'Active' : 'Inactive';

      
      return view('user.Contract-Management.contract-manage-detail',compact('cli_announcements','user','customerrecord','customercontract','divisions','overallStatus'));
   }

   public function customerstore(Request $request)
   {
       // dd($request);
       // Validate incoming data
       $validated = $request->validate([
           'profile_picture' => 'nullable|image|max:20048',
           'lename' => 'required|string|max:255',
           'dname' => 'required|array',
           'dname.*' => 'required|string|max:255',
           'roa' => 'required|string',
           'state' => 'required|string|max:255',
           'city' => 'required|string|max:255',
           'pincode' => 'required|string|max:6',
           'CinNo' => 'required|string|max:21', // CIN length is fixed at 21 characters
           'cin_file' => 'required|file|max:20048',
           'GSTINNo' => 'required|string|max:15|min:15', // GSTIN length is exactly 15 characters
           'gstin_file' => 'required|file|max:20048',
           'type_of_entity' => 'required|string|max:255',
           'brandname' => 'nullable|string|max:255',
           'phone' => 'required|string|max:255|unique:customertb,phone',
           'email' => 'required|string|email|max:255|unique:customertb,email',
       ]);
   
       // Check if CIN number already exists
       if (Customer::where('CinNo', $validated['CinNo'])->exists()) {
           return response()->json([
               'message' => 'The provided CIN number already exists.',
           ], 422);
       }
   
       // Check if GSTIN number already exists
       if (Customer::where('GSTINNo', $validated['GSTINNo'])->exists()) {
           return response()->json([
               'message' => 'The provided GSTIN number already exists.',
           ], 422);
       }
   
       // Handle file uploads
       $validated['profile_picture'] = $request->file('profile_picture') 
           ? $request->file('profile_picture')->store('profile_pictures', 'public') 
           : null;
   
       $validated['cin_file'] = $request->file('cin_file') 
           ? $request->file('cin_file')->store('cin_files', 'public') 
           : null;
   
       $validated['gstin_file'] = $request->file('gstin_file') 
           ? $request->file('gstin_file')->store('gstin_files', 'public') 
           : null;
   
       // Include the authenticated user ID
       $validated['customer_created_by'] = auth()->id();
   
       // Save customer data
       Customer::create($validated);
   
       return response()->json(['message' => 'Customer details saved successfully!']);
   }
   
   public function storecustomercontract(Request $request)
   {
       // dd($request);
       // Validate the request data
       if ($request->is_drafted != 1) { // Skip validation if saving as draft
           $request->validate([
               'file' => 'required|mimes:pdf,doc,docx|max:20048',
               'contract_name' => 'required|string',
               'contracttype' => 'required|string',
               'contract_type' => 'required|string',
               'divison' => 'required|string',
               'vendor_name' => 'required|string',
               'legal_entity_status' => 'required|string',
               'startdate' => 'required|date',
               'startend' => 'required|date',
               'contract_value' => 'required|numeric',
               'signing_status' => 'required|string',
               'renewal_terms' => 'required|array', // Ensure it's an array
               'payment_terms' => 'required|array', // Ensure it's an array
               'fee_escalation_clause' => 'required|array', // Ensure it's an array
               'customer_id' => 'required|exists:customertb,id',
           ]);
       }
   
       // Handle file upload (if provided)
       $filePath = null;
       $fileName = null;
       $fileSize = null;
   
       if ($request->hasFile('file')) {
           $file = $request->file('file');
           $filePath = $file->store('contracts', 'public');
           $fileName = $file->getClientOriginalName();
           $fileSize = round($file->getSize() / 1024, 2); // Size in KB
       }
   
       // Save or update the customer contract
       CustomerContract::updateOrCreate(
           ['id' => $request->id], // Update if the record exists
           [
               'file_name' => $fileName,
               'file_path' => $filePath,
               'file_size' => $fileSize,
               'contract_name' => $request->contract_name,
               'contracttype' => $request->contracttype,
               'contract_type' => $request->contract_type,
               'division' => $request->divison,
               'vendor_name' => $request->vendor_name,
               'legal_entity_status' => $request->legal_entity_status,
               'startdate' => $request->startdate,
               'startend' => $request->startend,
               'contract_value' => $request->contract_value,
               'signing_status' => $request->signing_status,
               'renewal_terms' => json_encode($request->renewal_terms), // Convert to JSON
               'payment_terms' => json_encode($request->payment_terms), // Convert to JSON
               'fee_escalation_clause' => json_encode($request->fee_escalation_clause), // Convert to JSON
               'customer_id' => $request->customer_id,
               'is_drafted' => $request->is_drafted ?? 0, // Set draft status
           ]
       );
   
       // Redirect back with a success message
       $message = $request->is_drafted == 1
           ? 'Customer contract saved as draft!'
           : 'Customer contract submitted successfully!';
       return redirect()->back()->with('success', $message);
   }
   
   
   public function downloadContracts(Request $request)
   {
       $ids = $request->input('ids');
       $contracts = CustomerContract::whereIn('id', $ids)->get();
   
       // Generate a ZIP file or handle the download logic
       $zip = new \ZipArchive();
       $zipFileName = 'contracts.zip';
       $zip->open(public_path($zipFileName), \ZipArchive::CREATE);
   
       foreach ($contracts as $contract) {
           $filePath = storage_path('app/contracts/' . $contract->file_name);
           if (file_exists($filePath)) {
               $zip->addFile($filePath, $contract->file_name);
           }
       }
   
       $zip->close();
   
       return response()->download(public_path($zipFileName))->deleteFileAfterSend(true);
   }
   
    
   public function customernotification(Request $request)
   {
       // dd($request);
       // Validate the incoming request (optional but recommended)
       $validatedData = $request->validate([
           'expiring_opm' => 'required|string',
           'email' => 'required|email',
           'message' => 'required|string',
           'contractFilename' => 'required|string',
       ]);
   
       // Create a new CustomerNotification instance
       $customerNotification = new CustomerNotification();
   
       // Store the request data in the model
       $customerNotification->customer_email = $request->email;
       $customerNotification->message = $request->message;
       $customerNotification->contract_name = $request->contractFilename;
       $customerNotification->notification_type = $request->expiring_opm;  // Assuming this is the notification type (e.g., "Upcoming Expiry Alert")
   
       // Save the model data to the database
       $customerNotification->save();
   
       // Initialize MailerSend
       $mailersend = new MailerSend(['api_key' => 'mlsn.3cf1d191812b63e38d5edf34dd0146657c403d79af8c2cf2609e26f5b09c0a64']);
   
       // Prepare the recipient
       $recipients = [
           new Recipient($request->email, 'Customer'),  // Assuming 'Customer' as a default name
       ];
   
       // Prepare the email subject
       $subject = $request->expiring_opm;  // Dynamically set the subject from the request
   
       // Prepare the email content with dynamic message
       $emailParams = (new EmailParams())
           ->setFrom('admin@milliondox.in')
           ->setFromName('Admin')
           ->setRecipients($recipients)
           ->setSubject($subject)
           ->setHtml("
               <html>
                   <head>
                       <title>{$request->expiring_opm}</title>
                   </head>
                   <body style='font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f5f5f5;'>
                       <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                           <tr>
                               <td>
                                   <table class='email-container' cellpadding='0' cellspacing='0' border='0' style='width: 100%; max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; border: 1px solid #dddddd;'>
                                       <!-- Banner -->
                                      
                                       <!-- Content -->
                                       <tr>
                                           <td style='padding: 20px;'>
                                               <p>{$request->message}</p>
                                           </td>
                                       </tr>
                                       <!-- Footer -->
                                       <tr>
                                           <td class='footer' style='background-color: #f98b93; color: #ffffff; text-align: center; padding: 20px;'>
                                               <p class='thanks' style='font-weight: bold;'>Thank you for choosing Milliondox!</p>
                                               <p class='important' style='color: #fdbcbc; font-weight: 800;'>Important Notice:</p>
                                               <p>Please do not share your password with anyone. If you suspect that your account may be compromised, please contact us immediately.</p>
                                           </td>
                                       </tr>
                                   </table>
                               </td>
                           </tr>
                       </table>
                   </body>
               </html>
           ");
   
       // Send the email using MailerSend
       $mailersend->email->send($emailParams);
   
       // Redirect back with a success message
       return redirect()->back()->with('success', 'Notification stored and email sent successfully!');
   }
   
   public function customeraddend(Request $request){
       
       
       $contract = CustomerContract::find($request->contractid);
   
       if ($contract) {
           // Get the existing data or initialize an empty array
           $paymentTerms = $contract->payment_terms ? json_decode($contract->payment_terms, true) : [];
           $renewalTerms = $contract->renewal_terms ? json_decode($contract->renewal_terms, true) : [];
           $feeExclusionMatrix = $contract->fee_escalation_clause ? json_decode($contract->fee_escalation_clause, true) : [];
   
           // Check the selected addendum type and update corresponding fields
           switch ($request->Addendum_type) {
               case 'Payment Terms Addendum':
                   // Append new payment terms to the existing array
                   $paymentTerms[] = $request->con_add_payment_term;
                   $contract->payment_terms = json_encode($paymentTerms);
                   break;
   
               case 'Renewal Terms Addendum':
                   // Append new renewal terms to the existing array
                   $renewalTerms[] = $request->con_add_renew_term;
                   $contract->renewal_terms = json_encode($renewalTerms);
                   break;
   
               case 'Fee Exclusion Matrix Addendum':
                   // Append new fee exclusion terms to the existing array
                   $feeExclusionMatrix[] = $request->con_add_fee_term;
                   $contract->fee_escalation_clause = json_encode($feeExclusionMatrix);
                   break;
           }
   
           // Save the updated contract
           $contract->save();
       }
           return redirect()->back()->with('success', 'Contract Updated successfully!');
   }
   
       
   
       // customer creation code end here from here 
}
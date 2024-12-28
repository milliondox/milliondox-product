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
use App\Models\Division;
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
use App\Models\AuthorizeManagement;

use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use DateTime;
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
    //    dd($customerrecord);

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


   
   $div = Division::get();
   $authmanagement = DB::table('authorize_management as a')
   ->join('divisions as d', 'a.division_id', '=', 'd.id')
   ->select('a.*', 'd.division_name') // Adjust the selected columns as needed
   ->whereColumn('a.auth_user_id', 'd.user_id') // Compares auth_user_id with user_id in divisions
   ->get();

$authdata = AuthorizeManagement::where('auth_user_id', $user->id)->get();
//    dd($authmanagement);

      
      return view('user.Contract-Management.contract-manage-detail',compact('authdata','authmanagement','div','cli_announcements','user','customerrecord','customercontract','divisions','overallStatus'));
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
           'dmail' => 'required|array',
           'dmail.*' => 'required|string|max:255',
           'dphone' => 'required|array',
           'dphone.*' => 'required|string|max:255',
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
       $actualContractType = $request->contract_type === 'Other' && $request->filled('other_contract_type_input')
           ? $request->other_contract_type_input
           : ($request->contract_type === 'Other' ? null : $request->contract_type);
   
       // Validate the request data
       if ($request->is_drafted != 1) {
           $request->validate([
               'file' => 'required|mimes:pdf,doc,docx|max:20048',
               'contract_name' => 'required|string',
               'contracttype' => 'required|string',
               'contract_type' => 'required|string',
               'division' => 'required',
               'startdate' => 'required|date',
               'startend' => 'required|date',
               'contract_value' => 'required|numeric',
               'signing_status' => 'required|string',
               'renewal_terms' => 'required|array',
               'payment_terms' => 'required|array',
               'fee_escalation_clause' => 'required|array',
               'customer_id' => 'required|exists:customertb,id',
               'sign_party1_name' => 'required|string',
               'sign_party1_email' => 'required|string',
               'sign_party1_phone' => 'required|string',
               'sign_party1_sign_path' => 'required|string',
               'sign_party2_name' => 'required|string',
               'sign_party2_email' => 'required|string',
               'sign_party2_phone' => 'required|string',
               'up_picture' => 'required|file',
               'signature' => 'required|file',
           ]);
       }
   
       // Handle file upload (if provided)
       $filePath = null;
       $fileName = null;
       $fileSize = null;
       $filePathimage = null;
       $filePathsign = null;
   
       if ($request->hasFile('file')) {
           $file = $request->file('file');
           $filePath = $file->store('contracts', 'public');
           $fileName = $file->getClientOriginalName();
           $fileSize = round($file->getSize() / 1024, 2); // Size in KB
       }
   
       if ($request->hasFile('up_picture')) {
           $fileimage = $request->file('up_picture');
           $filePathimage = $fileimage->store('uploads/images', 'public');
       }
       
       if ($request->hasFile('signature')) {
           $filesign = $request->file('signature');
           $filePathsign = $filesign->store('uploads/signatures', 'public');
       }
   
       try {
        CustomerContract::updateOrCreate(
            ['id' => $request->id], // Ensure this uniquely identifies the contract
            [
                'file_name' => $fileName,
                'file_path' => $filePath,
                'file_size' => $fileSize,
                'contract_name' => $request->contract_name,
                'contracttype' => $request->contracttype,
                'contract_type' => $actualContractType,
                'division' => $request->division,
                'startdate' => $request->startdate,
                'startend' => $request->startend,
                'contract_value' => $request->contract_value,
                'signing_status' => $request->signing_status,
                'renewal_terms' => json_encode($request->renewal_terms),
                'payment_terms' => json_encode($request->payment_terms),
                'fee_escalation_clause' => json_encode($request->fee_escalation_clause),
                'customer_id' => $request->customer_id,
                'is_drafted' => $request->is_drafted ?? 0,
                'sign_party1_name' => $request->sign_party1_name,
                'sign_party1_email' => $request->sign_party1_email,
                'sign_party1_phone' => $request->sign_party1_phone,
                'sign_party1_sign_path' => $request->sign_party1_sign_path,
                'sign_party2_name' => $request->sign_party2_name,
                'sign_party2_email' => $request->sign_party2_email,
                'sign_party2_phone' => $request->sign_party2_phone,
                'sign_party2_image_path' => $filePathimage,
                'sign_party2_sign_path' => $filePathsign,
            ]
        );
        
    
        $message = $request->is_drafted == 1 ? 'Customer contract saved as draft!' : 'Customer contract submitted successfully!';
        return response()->json(['success' => true, 'message' => $message]);
    } catch (\Exception $e) {
        // Log the exception message
        \Log::error("Failed to store contract data: " . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'Failed to store contract data.']);
    }
         
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
       $adminEmail = "admin@milliondox.in";
       $fromEmail = "no-reply@milliondox.in";
       $subject = $request->expiring_opm;
       $email = $request->email;
       $thankYouSubject = "Thank You for Your Submission";
   
       // Admin email content
       $adminMessage = <<<HTML
   <!DOCTYPE html>
   <html>
   <head>
       <title>{$request->expiring_opm}</title>
   </head>
   <body style='font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f5f5f5;'>
       <table width='100%' cellpadding='0' cellspacing='0' border='0'>
           <tr>
               <td>
                   <table style='width: 100%; max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; border: 1px solid #dddddd;'>
                       <tr>
                           <td style='padding: 20px;'>
                               <p>{$request->message}</p>
                           </td>
                       </tr>
                       <tr>
                           <td style='background-color: #f98b93; color: #ffffff; text-align: center; padding: 20px;'>
                               <p style='font-weight: bold;'>Thank you for choosing Milliondox!</p>
                               <p style='color: #fdbcbc; font-weight: 800;'>Important Notice:</p>
                               <p>Please do not share your password with anyone. If you suspect your account is compromised, contact us immediately.</p>
                           </td>
                       </tr>
                   </table>
               </td>
           </tr>
       </table>
   </body>
   </html>
   HTML;
   
       // User thank-you email content
       $thankYouMessage = <<<HTML
   <!DOCTYPE html>
   <html>
   <head>
       <title>{$request->expiring_opm}</title>
   </head>
   <body style='font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f5f5f5;'>
       <table width='100%' cellpadding='0' cellspacing='0' border='0'>
           <tr>
               <td>
                   <table style='width: 100%; max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; border: 1px solid #dddddd;'>
                       <tr>
                           <td style='padding: 20px;'>
                               <p>{$request->message}</p>
                           </td>
                       </tr>
                       <tr>
                           <td style='background-color: #f98b93; color: #ffffff; text-align: center; padding: 20px;'>
                               <p style='font-weight: bold;'>Thank you for choosing Milliondox!</p>
                               <p style='color: #fdbcbc; font-weight: 800;'>Important Notice:</p>
                               <p>Please do not share your password with anyone. If you suspect your account is compromised, contact us immediately.</p>
                           </td>
                       </tr>
                   </table>
               </td>
           </tr>
       </table>
   </body>
   </html>
   HTML;
   
       // Admin email headers
       $adminHeaders = "From: $fromEmail\r\n";
       $adminHeaders .= "Reply-To: $fromEmail\r\n";
       $adminHeaders .= "MIME-Version: 1.0\r\n";
       $adminHeaders .= "Content-Type: text/html; charset=UTF-8\r\n";
   
       // User email headers
       $thankYouHeaders = "From: $fromEmail\r\n";
       $thankYouHeaders .= "Reply-To: $fromEmail\r\n";
       $thankYouHeaders .= "MIME-Version: 1.0\r\n";
       $thankYouHeaders .= "Content-Type: text/html; charset=UTF-8\r\n";
   
       // Send emails
       $adminEmailSent = mail($adminEmail, $subject, $adminMessage, $adminHeaders);
       $userEmailSent = mail($email, $thankYouSubject, $thankYouMessage, $thankYouHeaders);
   
       // Check the status of email sending
       if ($adminEmailSent && $userEmailSent) {
        // Redirect with success message
        return redirect()->back()->with('success', 'Emails sent successfully.');
    } elseif (!$adminEmailSent) {
        // Redirect with error message for admin email
        return redirect()->back()->with('error', 'Failed to send email to the admin.');
    } elseif (!$userEmailSent) {
        // Redirect with error message for user email
        return redirect()->back()->with('error', 'Failed to send thank-you email to the user.');
    } else {
        // Redirect with a general error message
        return redirect()->back()->with('error', 'Failed to send emails.');
    }
    
   
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
   
 

   public function import(Request $request)
{
    // Validate the request
    $request->validate([
        'excel_file' => 'required|mimes:xlsx,xls,csv|max:10240', // Validate excel file
        'contracts' => 'required|array', // Ensure contracts field is an array
    ]);

    // Get the uploaded Excel file
    $excelFile = $request->file('excel_file');
    $contracts = $request->file('contracts'); // Get all contract files

    // Load the spreadsheet using PhpSpreadsheet
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($excelFile);
    $worksheet = $spreadsheet->getActiveSheet();
    $rows = $worksheet->toArray(); // Convert the worksheet data to an array

    // Loop through each row in the Excel file
    foreach ($rows as $index => $row) {
        // Skip the header row (if applicable)
        if ($index === 0) {
            continue;
        }

        // Initialize contract file and file size variables
        $contractFile = null;
        $fileSize = null;

        // Check if there are enough contract files for the current row
        if (isset($contracts[$index - 1])) { // Offset by 1 to match the row index
            $file = $contracts[$index - 1];

            // Get the file size before storing it
            $fileSize = $file->getSize(); // Size in bytes

            // Store the contract file in 'contracts' directory and get the file path
            $contractFile = $file->store('contracts', 'public');
        }

        // Convert startdate and enddate (if applicable)
        try {
            $startdate = isset($row[9]) && !empty($row[9])
                ? Carbon::parse($row[9])->format('Y-m-d')
                : null;

            $startend = isset($row[10]) && !empty($row[10])
                ? Carbon::parse($row[10])->format('Y-m-d')
                : null;
        } catch (\Exception $e) {
            $startdate = null;
            $startend = null;
        }

        // Ensure contract_value is numeric (to prevent the SQL error)
        $contractValue = isset($row[11]) && is_numeric($row[11]) ? $row[11] : null;

        // Ensure 'is_drafted' is an integer (default to 0 if not set or invalid)
        $isDrafted = isset($row[17]) && is_numeric($row[17]) ? (int) $row[17] : 0;

        // Create or update the customer contract
        CustomerContract::updateOrCreate(
            ['id' => $row[0]], // Assuming the first column is the 'id' field
            [
                'file_name' => $row[0],
                'file_path' => $contractFile, // File path (contract file)
                'file_size' => isset($fileSize) ? round($fileSize / 1024, 2) : null, // File size in KB
                'contract_name' => $row[3],
                'contracttype' => $row[4],
                'contract_type' => $row[5],
                'division' => $row[6],
                'vendor_name' => $row[7],
                'legal_entity_status' => $row[8],
                'startdate' => $startdate,
                'startend' => $startend,
                'contract_value' => $contractValue,
                'signing_status' => $row[12],
                'renewal_terms' => json_encode(explode(';', $row[13])),
                'payment_terms' => json_encode(explode(';', $row[14])),
                'fee_escalation_clause' => isset($row[15]) ? json_encode(explode(';', $row[15])) : null,
                'customer_id' => isset($row[16]) && is_numeric($row[16]) ? (int) $row[16] : null,
                'is_drafted' => $isDrafted,
            ]
        );
    }

    return redirect()->back()->with('success', 'Contracts have been successfully imported.');
}

public function adddivision(Request $request){
    $userId = auth()->user()->id;

    
    // $existingDivision = Division::where('user_id', $userId)
    //                         ->where('division_name', $request->division_name)
    //                         ->first();

    
    // if ($existingDivision) {
    //     return redirect()->back()->with('error', 'You have already created this Division.');
    // }

    
    $userdivisionModel = new Division([
        'division_name' => $request->division_name,
         'user_id' => $userId,
    ]);

    
    $userdivisionModel->save();
    return redirect()->back()->with('success', 'Division created successfully.');
}
public function showGst($id)
    {
        // Fetch GST-related file for the customer
        // $customer = Customer::findOrFail($id);
        $userId = auth()->user()->id;
        $customer = Customer::where('id', $id)
                    ->where('customer_created_by', $userId)
                    ->firstOrFail();
        // dd($customer);
        $filePath = public_path('/' . $customer->gstin_file);

        if (!file_exists($filePath)) {
            abort(404, 'GST file not found.');
        }

        return response()->file($filePath);
    }

    public function showCin($id)
    {
        // Fetch CIN-related file for the customer
        $userId = auth()->user()->id;
        $customer = Customer::where('id', $id)
        ->where('customer_created_by', $userId)
        ->firstOrFail();
        $filePath = public_path('/' . $customer->cin_file);

        if (!file_exists($filePath)) {
            abort(404, 'CIN file not found.');
        }

        return response()->file($filePath);
    }

    public function addauthmanagement(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'division' => 'required|exists:divisions,id',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'sign_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $userId = auth()->user()->id;
        // Handle image upload
        $imagePath = $request->file('image')->store('uploads/images', 'public');
        $signImagePath = $request->file('sign_image')->store('uploads/signatures', 'public');

        // Save data to the database
        AuthorizeManagement::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'division_id' => $request->division,
            'auth_user_id' => $userId,
            'image_path' => $imagePath,
            'sign_image_path' => $signImagePath,
        ]);

        return redirect()->back()->with('success', 'Authorize Management added successfully.');
    }

    public function checkEmail(Request $request)
    {
        $exists = Customer::where('email', $request->email)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function checkPhone(Request $request)
    {
        $phone = $request->input('phoneNumber');
    // dd($phone);
        // Ensure the phone field is properly received
        if (!$phone) {
            return response()->json(['exists' => false]);
        }
    
        // Check if the phone exists in the database
        $exists = Customer::where('phone', $phone)->exists();
    
        return response()->json(['exists' => $exists]);
    }
    
public function editcustomerContractForm(Request $request)
{
    // dd($request);
    $contract = CustomerContract::findOrFail($request->contid);

    // Update contract fields
    $contract->contract_name = $request->contract_name;
    $contract->contract_type = $request->contract_type;
    $contract->division = $request->division;
    $contract->startdate = $request->startdate;
    $contract->startend = $request->startend;
    $contract->contract_value = $request->contract_value;
    $contract->signing_status = $request->signing_status;
    $contract->sign_party1_name = $request->sign_party1_name;
    $contract->sign_party1_email = $request->sign_party1_email;
    $contract->sign_party1_phone = $request->sign_party1_phone;
    $contract->sign_party1_sign_path = $request->sign_party1_sign_path;
    $contract->is_drafted = 0;
    $contract->renewal_terms = json_encode($request->renewal_terms); // Assuming JSON storage
    $contract->payment_terms = json_encode($request->payment_terms);
    $contract->fee_escalation_clause = json_encode($request->fee_escalation_clause);
    $contract->sign_party2_name = $request->sign_party2_name;
    $contract->sign_party2_email = $request->sign_party2_email;
    $contract->sign_party2_phone = $request->sign_party2_phone;

    // Handle file uploads
    if ($request->hasFile('file')) {
       $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $fileSize = round($file->getSize() / 1024, 2); // Size in KB
        $filePath = $request->file('file')->store('contracts', 'public');
        $contract->file_name = $fileName  ;
        $contract->file_size = $fileSize;
        $contract->file_path = $filePath;
    }

    if ($request->hasFile('signature')) {
        $signaturePath = $request->file('signature')->store('uploads/signatures', 'public');
        $contract->sign_party2_image_path = $signaturePath;
    }
    if ($request->hasFile('up_picture')) {
        
        $signaturePaths = $request->file('up_picture')->store('uploads/images', 'public');
        $contract->	sign_party2_image_path = $signaturePaths;
    }
    
    

    // Save the updated contract
    $contract->save();

    return redirect()->back()->with('success', 'Contract updated successfully.');
}
   
   
       // customer creation code end here from here 
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadedFile;
use App\Models\CharteredDoc;
use App\Models\COI;
use App\Models\PAN;
use App\Models\TAN;
use App\Models\INC;
use App\Models\SpiceDoc;
use Illuminate\Support\Facades\Storage;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\CustomDoc;


use App\Models\RegUploadedFile;
use App\Models\RegCharteredDoc;
use App\Models\RegCOI;
use App\Models\RegPAN;
use App\Models\RegTAN;
use App\Models\RegINC;
use App\Models\RegSpiceDoc;
use App\Models\RegCustomDoc;

use App\Models\MisUploadedFile;
use App\Models\MisCharteredDoc;
use App\Models\MisCOI;
use App\Models\MisPAN;
use App\Models\MisTAN;
use App\Models\MisINC;
use App\Models\MisSpiceDoc;
use App\Models\MisCustomDoc;
use App\Models\StoreIpFile;
use App\Models\StoreEmployeeprofile;
use App\Models\StoreEmployeeDetail;
use App\Models\StoreEmployeePayroll;
use App\Models\StoreContract;

use App\Models\StoreAudit;
use App\Models\StoreBankDoc;
use App\Models\StoreFixedAsset;

use App\Models\MOA;
use App\Models\INC28;
use App\Models\DECINC;
use App\Models\PFDOC;
use App\Models\ESIDOC;

use App\Models\PTDOC;

use App\Models\TLDOC;
use App\Models\URDOC;

class UploadedFileController extends Controller
{
    
    public function storeiptdi(Request $request)
    {
        if (auth()->check()) {
          
            $userName = auth()->user()->name;
    
           
            $file = $request->file('ipfile');
            $filePath = $file->store('uploads');
    
          
    
           
           
            StoreIpFile::create([
                'file_type' => $file->getClientMimeType(),
                'real_file_name' => $file->getClientOriginalName(),
                'file_name' => $request->input('file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'status' => $request->input('status'), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }
    public function storebankdoc(Request $request)
{
    if (auth()->check()) {
          
        $userName = auth()->user()->name;
        $userid = auth()->user()->id;
       
        $file = $request->file('bankdocfile');
        $filePath = $file->store('uploads');

      

       
       
        StoreBankDoc::create([
            'file_type' => $file->getClientMimeType(),
            'real_file_name' => $file->getClientOriginalName(),
            'file_name' => $request->input('file_name'),
            'file_size' => $file->getSize(),
            'file_path' => $filePath,
            'user_name' => $userName,
            'user_id' => $userid, 
        ]);

        return redirect()->back()->with('success', 'File uploaded successfully.');
    } else {
        return redirect()->back()->with('error', 'You must be logged in to upload a file.');
    }  
}
public function fixedsassetstore(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'file' => 'required|file|mimes:pdf,doc,docx|max:2048', // Adjust file validation rules as needed
        'asset_name' => 'required|string',
        'asset_id' => 'required|string',
        'loc' => 'required|string',
        'description' => 'required|string',
        'asset_category' => 'required|string',
        'division' => 'required|string',
        'date_of_purchase' => 'required|date',
        'date_put_to_use' => 'required|date',
        'asset_life' => 'required|integer',
        'purchase_price' => 'required|numeric',
        'amc_contract' => 'nullable|string',
        'insurance_contract' => 'nullable|string',
        'inovice_file' => 'required|file|mimes:pdf,doc,docx|max:2048', // Adjust invoice file validation rules as needed
        'invoice_date' => 'required|date',
        'invoice_no' => 'required|string',
    ]);

    // Handle file upload for asset
    $assetFile = $request->file('file')->store('uploads');

    // Handle file upload for invoice
    $invoiceFile = $request->file('inovice_file')->store('invoices');

    // Create a new StoreFixedAsset instance
    $fixedAsset = new StoreFixedAsset([
        'file_type' => $request->file('file')->getClientMimeType(),
        'file_name' => $request->file('file')->getClientOriginalName(),
        'real_file_name' => $assetFile,
        'file_path' => $assetFile,
        'file_size' => $request->file('file')->getSize(),
        'user_name' => $request->user()->name, // Assuming authenticated user
        'user_id' => $request->user()->id, // Assuming authenticated user
        'asset_name' => $request->input('asset_name'),
        'asset_id' => $request->input('asset_id'),
        'loc' => $request->input('loc'),
        'description' => $request->input('description'),
        'asset_category' => $request->input('asset_category'),
        'division' => $request->input('division'),
        'date_of_purchase' => $request->input('date_of_purchase'),
        'date_put_to_use' => $request->input('date_put_to_use'),
        'asset_life' => $request->input('asset_life'),
        'asset_make' => $request->input('asset_make'),
        'purchase_price' => $request->input('purchase_price'),
        'amc_contract' => $request->input('amc_contract'),
        'insurance_contract' => $request->input('insurance_contract'),
        'inovice_file_type' => $request->file('inovice_file')->getClientMimeType(),
        'inovice_file_name' => $request->file('inovice_file')->getClientOriginalName(),
        'inovice_real_file_name' => $invoiceFile,
        'inovice_file_path' => $invoiceFile,
        'inovice_file_size' => $request->file('inovice_file')->getSize(),
        'invoice_date' => $request->input('invoice_date'),
        'invoice_no' => $request->input('invoice_no'),
    ]);

    // Save the new fixed asset record
    $fixedAsset->save();

    // Redirect back or return a response as needed
    return redirect()->back()->with('success', 'Fixed asset added successfully');
}

public function upfixedsassetstore(Request $request)
{
    $contractId = $request->input('fixed_id');
    
    // Find the contract by ID
    $contract = StoreFixedAsset::findOrFail($contractId);
    
    // Update other fields of the contract if needed
     $contract->asset_name = $request->input('asset_name');
     $contract->asset_id = $request->input('asset_id');
     $contract->loc = $request->input('loc');
     $contract->description = $request->input('description');
     $contract->asset_category = $request->input('asset_category');
     $contract->division = $request->input('division');
     $contract->date_of_purchase = $request->input('date_of_purchase');
     $contract->date_put_to_use = $request->input('date_put_to_use');
     $contract->asset_life = $request->input('asset_life');
     $contract->asset_make = $request->input('asset_make');
     $contract->purchase_price = $request->input('purchase_price');
     $contract->amc_contract = $request->input('amc_contract');
     $contract->invoice_date = $request->input('invoice_date');
     $contract->invoice_no = $request->input('invoice_no');

     
     


    // Handle file update if a new file is uploaded
    if ($request->hasFile('file')) {
        // Store the new file
        $newFile = $request->file('file')->store('uploads');
        
        // Delete the old file (if it exists)
        if ($contract->file_path) {
            Storage::delete($contract->file_path);
        }

        // Update the file path and other relevant details
        $contract->file_path = $newFile;
        $contract->file_type = $request->file('file')->getClientMimeType();
        $contract->file_size = $request->file('file')->getSize();
        $contract->real_file_name = $request->file('file')->getClientOriginalName();
    }
    if ($request->hasFile('inovice_file')) {
        // Store the new file
        $newFiles = $request->file('inovice_file')->store('invoices');
        
        // Delete the old file (if it exists)
        if ($contract->inovice_file_path) {
            Storage::delete($contract->inovice_file_path);
        }

        // Update the file path and other relevant details
        $contract->invoice_file_path = $newFiles;
        $contract->invoice_file_type = $request->file('inovice_file')->getClientMimeType();
        $contract->invoice_file_size = $request->file('inovice_file')->getSize();
        $contract->invoice_real_file_name = $request->file('inovice_file')->getClientOriginalName();
    }
// dd($contract);
    // Save the changes to the contract
    $contract->save();
    return redirect()->back()->with('success', 'Fixed asset upDATE successfully');
}

public function upstorebankdoc(Request $request)
{

    // dd($request);
    $request->validate([
        'record_id1' => 'required|exists:store_audit,id',
        
    ]);
    
    // Retrieve the contract ID from the request
    $contractId = $request->input('record_id1');
    
    // Find the contract by ID
    $contract = StoreBankDoc::findOrFail($contractId);
    
    // Update other fields of the contract if needed
     $contract->file_name = $request->input('file_name');
     
     


    // Handle file update if a new file is uploaded
    if ($request->hasFile('bankdocfile')) {
        // Store the new file
        $newFile = $request->file('bankdocfile')->store('uploads');
        
        // Delete the old file (if it exists)
        if ($contract->file_path) {
            Storage::delete($contract->file_path);
        }

        // Update the file path and other relevant details
        $contract->file_path = $newFile;
        $contract->file_type = $request->file('bankdocfile')->getClientMimeType();
        $contract->file_size = $request->file('bankdocfile')->getSize();
        $contract->real_file_name = $request->file('bankdocfile')->getClientOriginalName();
    }
// dd($contract);
    // Save the changes to the contract
    $contract->save();

    // Redirect back or return a response as needed
    return redirect()->back()->with('success', 'Contract updated successfully');
}
public function deletefilebankdoc($id)
{
    $user = StoreBankDoc::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
}
public function downloadfixedFile($id)
{
    $file = StoreFixedAsset::findOrFail($id);

    // Sanitize the filename by replacing invalid characters
    $sanitizedFileName = str_replace(['/', '\\'], '_', $file->real_file_name);

    // For example, if the file is stored in the storage/app/uploads directory
    $filePath = storage_path('app/' . $file->file_path);

    return response()->download($filePath, $sanitizedFileName);
}


public function downloadfixedFile1($id)
{
    $file = StoreFixedAsset::findOrFail($id);
    $sanitizedFileName = str_replace(['/', '\\'], '_', $file->inovice_real_file_name);
    $filePath = storage_path('app/' . $file->inovice_file_path);
        
        return response()->download($filePath, $file->sanitizedFileName);
}
public function downloadbankdocFile($id)
{
    $file = StoreBankDoc::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
}
    public function storeaudit(Request $request)
{
    if (auth()->check()) {
          
        $userName = auth()->user()->name;
        $userid = auth()->user()->id;
       
        $file = $request->file('auditfile');
        $filePath = $file->store('uploads');

      

       
       
        StoreAudit::create([
            'file_type' => $file->getClientMimeType(),
            'real_file_name' => $file->getClientOriginalName(),
            'file_name' => $request->input('file_name'),
            'file_size' => $file->getSize(),
            'file_path' => $filePath,
            'user_name' => $userName,
            'user_id' => $userid, 
        ]);

        return redirect()->back()->with('success', 'File uploaded successfully.');
    } else {
        return redirect()->back()->with('error', 'You must be logged in to upload a file.');
    }  
}

public function upstoreaudit(Request $request)
{

    // dd($request);
    $request->validate([
        'record_id1' => 'required|exists:store_audit,id',
        
    ]);
    
    // Retrieve the contract ID from the request
    $contractId = $request->input('record_id1');
    
    // Find the contract by ID
    $contract = StoreAudit::findOrFail($contractId);
    
    // Update other fields of the contract if needed
     $contract->file_name = $request->input('file_name');
     
     


    // Handle file update if a new file is uploaded
    if ($request->hasFile('auditfile')) {
        // Store the new file
        $newFile = $request->file('auditfile')->store('uploads');
        
        // Delete the old file (if it exists)
        if ($contract->file_path) {
            Storage::delete($contract->file_path);
        }

        // Update the file path and other relevant details
        $contract->file_path = $newFile;
        $contract->file_type = $request->file('auditfile')->getClientMimeType();
        $contract->file_size = $request->file('auditfile')->getSize();
        $contract->real_file_name = $request->file('auditfile')->getClientOriginalName();
    }
// dd($contract);
    // Save the changes to the contract
    $contract->save();

    // Redirect back or return a response as needed
    return redirect()->back()->with('success', 'Contract updated successfully');
}
public function upstorecontract(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'contid' => 'required|exists:store_contract,id',
        
    ]);
    
    // Retrieve the contract ID from the request
    $contractId = $request->input('contid');
    
    // Find the contract by ID
    $contract = StoreContract::findOrFail($contractId);
    
    // Update other fields of the contract if needed
     $contract->contract_name = $request->input('contract_name');
     $contract->contract_type = $request->input('contract_type');
     $contract->divison = $request->input('divison');
     $contract->vendor_name = $request->input('vendor_name');
     $contract->legal_entity_status = $request->input('legal_entity_status');
     $contract->startdate = $request->input('startdate');
     $contract->startend = $request->input('startend');
     $contract->contract_value = $request->input('contract_value');
     $contract->signing_status = $request->input('signing_status');
     $contract->renewal_terms = $request->input('renewal_terms');
     $contract->payment_terms = $request->input('payment_terms');
     $contract->fee_escalation_clause = $request->input('fee_escalation_clause');
     


    // Handle file update if a new file is uploaded
    if ($request->hasFile('file')) {
        // Store the new file
        $newFile = $request->file('file')->store('uploads');
        
        // Delete the old file (if it exists)
        if ($contract->file_path) {
            Storage::delete($contract->file_path);
        }

        // Update the file path and other relevant details
        $contract->file_path = $newFile;
        $contract->file_type = $request->file('file')->getClientMimeType();
        $contract->file_size = $request->file('file')->getSize();
        $contract->real_file_name = $request->file('file')->getClientOriginalName();
    }
// dd($contract);
    // Save the changes to the contract
    $contract->save();

    // Redirect back or return a response as needed
    return redirect()->back()->with('success', 'Contract updated successfully');
}

    public function storecontract(Request $request)
    {
        if (auth()->check()) {
          
            $userName = auth()->user()->name;
            $userid = auth()->user()->id; 
            
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
          
    
           
           
            StoreContract::create([
                'file_type' => $file->getClientMimeType(),
                'real_file_name' => $file->getClientOriginalName(),
                
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                
               
                'contract_name' => $request->input('contract_name'),
                'contracttype' => $request->input('contracttype'),
                'contract_type' => $request->input('contract_type'),
                'divison' => $request->input('divison'),
                'vendor_name' => $request->input('vendor_name'),
                'legal_entity_status' => $request->input('legal_entity_status'),
                'startdate' => $request->input('startdate'),
                'startend' => $request->input('startend'),
                'contract_value' => $request->input('contract_value'),
                'signing_status' => $request->input('signing_status'),
                'renewal_terms' => $request->input('renewal_terms'),
                'payment_terms' => $request->input('payment_terms'),
                'fee_escalation_clause' => $request->input('fee_escalation_clause'),
                'user_id' => $userid,
               
            ]);
    
            return redirect()->back()->with('success', 'contract uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }
public function storeemployeepayroll(Request $request){
    if (auth()->check()) {
          
        $userName = auth()->user()->name;
        $userid = auth()->user()->id; 
        
       
        $file = $request->file('file');
        $filePath = $file->store('uploads');

      

       
       
        StoreEmployeePayroll::create([
            'file_type' => $file->getClientMimeType(),
            'real_file_name' => $file->getClientOriginalName(),
            'file_name' => $request->input('file_name'),
            'file_size' => $file->getSize(),
            'file_path' => $filePath,
            'user_name' => $userName,
            'user_id' => $userid, 
            'employee_id' => $request->input('employee_id'),
            'startdate' => $request->input('startdate'),
        ]);

        return redirect()->back()->with('success', 'File uploaded successfully.');
    } else {
        return redirect()->back()->with('error', 'You must be logged in to upload a file.');
    }
}
public function deletefileaudit($id)
{
    $user = StoreAudit::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
}
public function downloadauditFile($id)
{
    $file = StoreAudit::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
}
public function downloadpayrollFile($id)
    {
        $file = StoreEmployeePayroll::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function downloadcontractFile($id)
    {
        $file = StoreContract::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function fetchContractDetail($id)
    {
        // Fetch contract data from the database based on the $id
        $contract = StoreContract::find($id);

        if (!$contract) {
            return response()->json(['error' => 'Contract not found'], 404);
        }

        // Return the contract data as a JSON response
        return response()->json($contract);
    }
    public function deletefilecontract($id)
    {
        // Find the user by ID
        $user = StoreContract::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
    
    public function deletefilepayroll($id)
    {
        // Find the user by ID
        $user = StoreEmployeePayroll::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
    public function updateemployeedetailpayroll(Request $request)
    {
        $empid = $request->input('record_id1');
    
    // Find the employee profile record by empid
    $employee = StoreEmployeePayroll::findOrFail($empid);

    // Validate the incoming request data
    $validatedData = $request->validate([
        'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Adjust the validation rules as needed
        'startdate' => 'required|date',
        // Add more validation rules as needed
    ]);

    // Update the employee profile fields
    $employee->file_name = $request->input('file_name');
    $employee->startdate = $validatedData['startdate']; // Use the validated data

    if ($request->hasFile('file')) {
        // Store the new file
        $newFile = $request->file('file')->store('uploads');

        // Check if the file upload was successful
        if ($newFile) {
            // Delete the old file
            Storage::delete($employee->file_path);

            // Update the file path and other relevant details
            $employee->file_path = $newFile;
            $employee->file_type = $request->file('file')->getClientMimeType();
            $employee->file_size = $request->file('file')->getSize();
        } else {
            // Handle file upload failure
            return redirect()->back()->with('error', 'Failed to upload the new file.');
        }
    }

    // Save the changes to the database
    $employee->save();

    return redirect()->back()->with('success', 'Employee salary detail updated successfully.');
    }
    public function storeemployeedetail(Request $request)
    {
        if (auth()->check()) {
          
            $userName = auth()->user()->name;
            $userid = auth()->user()->id; 
            
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
          
    
           
           
            StoreEmployeeDetail::create([
                'file_type' => $file->getClientMimeType(),
                'real_file_name' => $file->getClientOriginalName(),
                'file_name' => $request->input('file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'user_id' => $userid, 
                'employee_id' => $request->input('employee_id'),
                'startdate' => $request->input('startdate'),
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }
     public function downloadempdtFile($id)
    {
        $file = StoreEmployeeDetail::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    
    public function deletefileempdt($id)
    {
        // Find the user by ID
        $user = StoreEmployeeDetail::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
    public function storeemployeeprofile(Request $request)
{
    if (auth()->check()) {
        $userid = auth()->user()->id;

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $fileSize = $file->getSize();
        $fileMimeType = $file->getClientMimeType();
        
        // Move the uploaded file to the public directory
        $file->move(public_path('uploads'), $fileName);
        
        // Get the file path relative to the public directory
        $filePath = 'uploads/' . $fileName;

        StoreEmployeeprofile::create([
            'file_type' => $fileMimeType,
            'real_file_name' => $fileName,
            'file_size' => $fileSize,
            'file_path' => $filePath,
            'fname' => $request->input('fname'), 
            'position' => $request->input('position'), 
            'division' => $request->input('division'), 
            'startdate' => $request->input('startdate'), 
            'startend' => $request->input('startend'),
            'user_id' => $userid,  
        ]);

        return redirect()->back()->with('success', 'Employee stored successfully.');
    } else {
        return redirect()->back()->with('error', 'You must be logged in to upload a file.');
    }
}
public function updateemployeedetail(Request $request)
{
    $empid = $request->input('record_id1');
    
    // Find the employee profile record by empid
    $employee = StoreEmployeeDetail::findOrFail($empid);

    // Validate the incoming request data
    $validatedData = $request->validate([
        'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Adjust the validation rules as needed
        'startdate' => 'required|date',
        // Add more validation rules as needed
    ]);

    // Update the employee profile fields
    $employee->file_name = $request->input('file_name');
    $employee->startdate = $validatedData['startdate']; // Use the validated data

    if ($request->hasFile('file')) {
        // Store the new file
        $newFile = $request->file('file')->store('uploads');

        // Check if the file upload was successful
        if ($newFile) {
            // Delete the old file
            Storage::delete($employee->file_path);

            // Update the file path and other relevant details
            $employee->file_path = $newFile;
            $employee->file_type = $request->file('file')->getClientMimeType();
            $employee->file_size = $request->file('file')->getSize();
        } else {
            // Handle file upload failure
            return redirect()->back()->with('error', 'Failed to upload the new file.');
        }
    }

    // Save the changes to the database
    $employee->save();

    return redirect()->back()->with('success', 'Employee profile updated successfully.');
}
public function upstoreemployeeprofile(Request $request)
{
    $empid = $request->input('empid');
    
    // Find the employee profile record by empid
    $employee = StoreEmployeeprofile::findOrFail($empid);

    // Update the employee profile fields
    $employee->fname = $request->input('fname');
    $employee->position = $request->input('position');
    $employee->division = $request->input('division');
    $employee->startdate = $request->input('startdate'); // Make sure to use the correct input name
    $employee->startend = $request->input('startend'); // Make sure to use the correct input name

    // Check if a new file has been uploaded
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $fileSize = $file->getSize();
        $fileMimeType = $file->getClientMimeType();
        
        // Move the uploaded file to the public directory
        $file->move(public_path('uploads'), $fileName);
        
        // Get the file path relative to the public directory
        $filePath = 'uploads/' . $fileName;

       
        
        $employee->file_path = $filePath;
    }

    

    // Save the changes to the database
    $employee->save();

    return redirect()->back()->with('success', 'Employee profile updated successfully.');
}
public function deletefilefixed($id)
{
    $user = StoreFixedAsset::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
}

   
    public function updateiptdi(Request $request)
    {
        // dd($request);
        $file = StoreIpFile::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('ipfile')) {
            // Store the new file
            $newFile = $request->file('ipfile')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }
    public function downloadiptdiFile($id)
    {
        $file = StoreIpFile::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function deletefileiptdi($id)
{
    // Find the user by ID
    $user = StoreIpFile::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    // Delete the user record
    $user->delete();

    

    return redirect()->back()->with('success', 'Record deleted successfully.');
}
    public function uploadss(Request $request)
    {
        if (auth()->check()) {
          
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
          
    
           
           
            UploadedFile::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }

    public function chartereddoc(Request $request)
    {
        if (auth()->check()) {
            
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
            
    
           
            CharteredDoc::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }
    
    public function coidoc(Request $request)
    {
        if (auth()->check()) {
           
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
           
           
            COI::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }
    
    public function pandoc(Request $request)
    {
        if (auth()->check()) {
            
            $userName = auth()->user()->name;
    
          
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
           
    
           
           
    
          
            PAN::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }
    
    


    public function tandoc(Request $request)
    {
        if (auth()->check()) {
            
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
           
            TAN::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }

    public function incdoc(Request $request)
    {
        if (auth()->check()) {
           
            $userName = auth()->user()->name;
    
            
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
         
           
            INC::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }

    public function decincdoc(Request $request)
    {
        if (auth()->check()) {
           
            $userName = auth()->user()->name;
    
            
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
         
           
            DECINC::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }

    public function incdoc28(Request $request)
    {
        if (auth()->check()) {
           
            $userName = auth()->user()->name;
    
            
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
         
           
            INC28::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }

    public function spicedoc(Request $request)
    {
        if (auth()->check()) {
           
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
           
            
            SpiceDoc::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }
    public function moadoc(Request $request)
    {
        if (auth()->check()) {
           
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
           
            
            MOA::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }
    public function downloadmoadocFile($id)
    {
        $file = MOA::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }

    public function updateFileName11(Request $request)
{
   
    $file = MOA::findOrFail($request->record_id1);

    // Initialize variables for activity and update_dates
    $activity = '';
    $updateDates = $file->update_dates ?? [];

    // Check if the file name has changed
    if ($file->file_name !== $request->file_name) {
        // Update the file name
        $file->file_name = $request->file_name;

        // Update the activity with current date and time
        $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
    }

    // Check if a new file is provided
    if ($request->hasFile('file')) {
        // Store the new file
        $newFile = $request->file('file')->store('uploads');
        
        // Delete the old file
        Storage::delete($file->file_path);

        // Update the file path and other relevant details
        $file->file_path = $newFile;
        $file->file_type = $request->file('file')->getClientMimeType();
        $file->file_size = $request->file('file')->getSize();

        // Update the activity with current date and time
        $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
    }

    // Update the reason for change
    $file->reasons_for_change = $request->reasons_for_change;

    // Update the update_dates
    $updateDates = now()->toDateTimeString();
    $file->update_dates = $updateDates;

    // Update the activity
    $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;

    // Save the changes to the database
    $file->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'File updated successfully.');
}
    

    public function deletemoadoc($id)
{
    // Find the user by ID
    $user = MOA::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    // Delete the user record
    $user->delete();

    

    return redirect()->back()->with('success', 'Record deleted successfully.');
}

    public function customdoc(Request $request){
        if (auth()->check()) {
           
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
           
            
           CustomDoc::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $request->input('file_name'),
                'real_file_name' => $file->getClientOriginalName(),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }
    
public function index()
{

    $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
    $files = UploadedFile::all();
    $chardoc = CharteredDoc::all();
    $coi = COI::all();
    $pan = PAN::all();
    $tan = TAN::all();
    $inc = INC::all();
    $spicedoc = SpiceDoc::all();
    $customdoc = CustomDoc::all();
    $moadoc = MOA::all();
    $inc28 = INC28::all();
    $decinc = DECINC::all();
    $user = auth()->user();


    
    return view('user.Charter-Documents.Incorporation-Docs', compact('cli_announcements', 'files','chardoc','coi','pan','tan','inc','spicedoc','customdoc','moadoc','inc28','decinc','user'));
}


   
    public function downloadaoaFile($id)
    {
        $file = UploadedFile::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }

    public function downloadaoaFile1($id)
    {
        $file = CharteredDoc::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function downloadaoaFile2($id)
    {
        $file = COI::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function downloadaoaFile3($id)
    {
        $file = PAN::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function downloadaoaFile4($id)
    {
        $file = TAN::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function downloadaoaFile5($id)
    {
        $file = INC::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }

    public function downloadaoaFile5dec($id)
    {
        $file = DECINC::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function downloadaoaFile528($id)
    {
        $file = INC28::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function downloadaoaFile6($id)
    {
        $file = SpiceDoc::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function downloadaoaFile7($id)
    {
        $file = CustomDoc::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }

    public function updateFileName(Request $request)
    {
        $file = UploadedFile::findOrFail($request->record_id);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }

    public function updateFileName1(Request $request)
    {
        // dd($request);
        $file = CharteredDoc::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }
    public function updateFileName2(Request $request)
    {
        // dd($request);
        $file = COI::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }
    public function updateFileName3(Request $request)
    {
        // dd($request);
        $file = PAN::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }
    public function updateFileName4(Request $request)
    {
        // dd($request);
        $file = TAN::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }
    public function updateFileName5(Request $request)
    {
        // dd($request);
        $file = INC::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }

    public function updateFileName5dec(Request $request)
    {
        // dd($request);
        $file = INC::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }

    public function updateFileName528(Request $request)
    {
        // dd($request);
        $file = INC28::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }


    public function updateFileName6(Request $request)
    {
        // dd($request);
        $file = SpiceDoc::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }

    public function updateFileName7(Request $request)
    {
        // dd($request);
        $file = CustomDoc::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }
    
    public function deletefile($id)
{
    // Find the user by ID
    $user = UploadedFile::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    // Delete the user record
    $user->delete();

    

    return redirect()->back()->with('success', 'Record deleted successfully.');
}
public function deletefile1($id)
{
    // Find the user by ID
    $user = CharteredDoc::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    // Delete the user record
    $user->delete();

    

    return redirect()->back()->with('success', 'Record deleted successfully.');
}
public function deletefile2($id)
{
    // Find the user by ID
    $user = COI::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    // Delete the user record
    $user->delete();

    

    return redirect()->back()->with('success', 'Record deleted successfully.');
}
public function deletefile3($id)
{
    // Find the user by ID
    $user = PAN::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    // Delete the user record
    $user->delete();

    

    return redirect()->back()->with('success', 'Record deleted successfully.');
}
public function deletefile4($id)
{
    // Find the user by ID
    $user = TAN::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    // Delete the user record
    $user->delete();

    

    return redirect()->back()->with('success', 'Record deleted successfully.');
}
public function deletefile5($id)
{
    // Find the user by ID
    $user = INC::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    // Delete the user record
    $user->delete();

    

    return redirect()->back()->with('success', 'Record deleted successfully.');
}
public function deletefile528($id)
{
    // Find the user by ID
    $user = INC28::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    // Delete the user record
    $user->delete();

    

    return redirect()->back()->with('success', 'Record deleted successfully.');
}
public function deletefile5dec($id)
{
    // Find the user by ID
    $user = DECINC::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    // Delete the user record
    $user->delete();

    

    return redirect()->back()->with('success', 'Record deleted successfully.');
}
public function deletefile6($id)
{
    // Find the user by ID
    $user = SpiceDoc::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    // Delete the user record
    $user->delete();

    

    return redirect()->back()->with('success', 'Record deleted successfully.');
}
public function deletefile7($id)
{
    // Find the user by ID
    $user = CustomDoc::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    // Delete the user record
    $user->delete();

    

    return redirect()->back()->with('success', 'Record deleted successfully.');
}



public function reguploadss(Request $request)
    {
        if (auth()->check()) {
          
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
          
    
           
           
            RegUploadedFile::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }

    public function regchartereddoc(Request $request)
    {
        if (auth()->check()) {
            
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
            
    
           
            RegCharteredDoc::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }
    
    public function regcoidoc(Request $request)
    {
        if (auth()->check()) {
           
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
           
           
            RegCOI::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }
    
    public function regpandoc(Request $request)
    {
        if (auth()->check()) {
            
            $userName = auth()->user()->name;
    
          
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
           
    
           
           
    
          
            RegPAN::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }
    
    


    public function regtandoc(Request $request)
    {
        if (auth()->check()) {
            
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
           
            RegTAN::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }

    public function regincdoc(Request $request)
    {
        if (auth()->check()) {
           
            $userName = auth()->user()->name;
    
            
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
         
           
            RegINC::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }

    public function regspicedoc(Request $request)
    {
        if (auth()->check()) {
           
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
           
            
            RegSpiceDoc::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }

    public function regurdoc(Request $request)
    {
        if (auth()->check()) {
           
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
           
            
            URDOC::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }

    public function regtldoc(Request $request)
    {
        if (auth()->check()) {
           
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
           
            
            TLDOC::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }

    public function regptdoc(Request $request)
    {
        if (auth()->check()) {
           
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
           
            
            PTDOC::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }

    public function regesidoc(Request $request)
    {
        if (auth()->check()) {
           
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
           
            
            ESIDOC::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }

    public function regpfdoc(Request $request)
    {
        if (auth()->check()) {
           
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
           
            
            PFDOC::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }
    public function regcustomdoc(Request $request){
        if (auth()->check()) {
           
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
           
            
           RegCustomDoc::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $request->input('file_name'),
                'real_file_name' => $file->getClientOriginalName(),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }





    public function misuploadss(Request $request)
    {
        if (auth()->check()) {
          
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
          
    
           
           
            MisUploadedFile::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }

    public function mischartereddoc(Request $request)
    {
        if (auth()->check()) {
            
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
            
    
           
            MisCharteredDoc::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }
    
    public function miscoidoc(Request $request)
    {
        if (auth()->check()) {
           
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
           
           
            MisCOI::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }
    
    public function mispandoc(Request $request)
    {
        if (auth()->check()) {
            
            $userName = auth()->user()->name;
    
          
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
           
    
           
           
    
          
            MisPAN::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }
    
    


    public function mistandoc(Request $request)
    {
        if (auth()->check()) {
            
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
           
            MisTAN::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }

    public function misincdoc(Request $request)
    {
        if (auth()->check()) {
           
            $userName = auth()->user()->name;
    
            
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
         
           
            MisINC::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }

    public function misspicedoc(Request $request)
    {
        if (auth()->check()) {
           
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
           
            
            MisSpiceDoc::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $file->getClientOriginalName(),
                'real_file_name' => $request->input('real_file_name'),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }
    public function miscustomdoc(Request $request){
        if (auth()->check()) {
           
            $userName = auth()->user()->name;
    
           
            $file = $request->file('file');
            $filePath = $file->store('uploads');
    
           
            
           MisCustomDoc::create([
                'file_type' => $file->getClientMimeType(),
                'file_name' => $request->input('file_name'),
                'real_file_name' => $file->getClientOriginalName(),
                'file_size' => $file->getSize(),
                'file_path' => $filePath,
                'user_name' => $userName,
                'file_status' => $request->input('file_status', 0), 
            ]);
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to upload a file.');
        }
    }




    public function regupdateFileName(Request $request)
    {
        $file = RegUploadedFile::findOrFail($request->record_id);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }

    public function regupdateFileName1(Request $request)
    {
        // dd($request);
        $file = RegCharteredDoc::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }
    public function regupdateFileName2(Request $request)
    {
        // dd($request);
        $file = RegCOI::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }
    public function regupdateFileName3(Request $request)
    {
        // dd($request);
        $file = RegPAN::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }
    public function regupdateFileName4(Request $request)
    {
        // dd($request);
        $file = RegTAN::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }
    public function regupdateFileName5(Request $request)
    {
        // dd($request);
        $file = RegINC::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }
    public function regupdateFileName6(Request $request)
    {
        // dd($request);
        $file = RegSpiceDoc::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }

    public function regupdateFileName6ur(Request $request)
    {
        // dd($request);
        $file = URDOC::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }

    public function regupdateFileName6tl(Request $request)
    {
        // dd($request);
        $file = TLDOC::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }

    public function regupdateFileName6pt(Request $request)
    {
        // dd($request);
        $file = PTDOC::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }
    public function regupdateFileName6esi(Request $request)
    {
        // dd($request);
        $file = ESIDOC::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }
    public function regupdateFileName6pfdoc(Request $request)
    {
        // dd($request);
        $file = PFDOC::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }

    public function regupdateFileName7(Request $request)
    {
        // dd($request);
        $file = RegCustomDoc::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }






    public function misupdateFileName(Request $request)
    {
        $file = MisUploadedFile::findOrFail($request->record_id);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }

    public function misupdateFileName1(Request $request)
    {
        // dd($request);
        $file = MisCharteredDoc::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }
    public function misupdateFileName2(Request $request)
    {
        // dd($request);
        $file = MisCOI::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }
    public function misupdateFileName3(Request $request)
    {
        // dd($request);
        $file = MisPAN::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }
    public function misupdateFileName4(Request $request)
    {
        // dd($request);
        $file = MisTAN::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }
    public function misupdateFileName5(Request $request)
    {
        // dd($request);
        $file = MisINC::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }
    public function misupdateFileName6(Request $request)
    {
        // dd($request);
        $file = MisSpiceDoc::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }

    public function misupdateFileName7(Request $request)
    {
        // dd($request);
        $file = MisCustomDoc::findOrFail($request->record_id1);

        // Initialize variables for activity and update_dates
        $activity = '';
        $updateDates = $file->update_dates ?? [];
    
        // Check if the file name has changed
        if ($file->file_name !== $request->file_name) {
            // Update the file name
            $file->file_name = $request->file_name;
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File name changed. ';
        }
    
        // Check if a new file is provided
        if ($request->hasFile('file')) {
            // Store the new file
            $newFile = $request->file('file')->store('uploads');
            
            // Delete the old file
            Storage::delete($file->file_path);
    
            // Update the file path and other relevant details
            $file->file_path = $newFile;
            $file->file_type = $request->file('file')->getClientMimeType();
            $file->file_size = $request->file('file')->getSize();
    
            // Update the activity with current date and time
            $activity .= '[' . now()->toDateTimeString() . '] File updated. ';
        }
    
        // Update the reason for change
        $file->reasons_for_change = $request->reasons_for_change;
    
        // Update the update_dates
        $updateDates = now()->toDateTimeString();
        $file->update_dates = $updateDates;
    
        // Update the activity
        $file->activities = $file->activities ? $file->activities . ' ' . $activity : $activity;
    
        // Save the changes to the database
        $file->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'File updated successfully.');
    }


    public function regdeletefile($id)
    {
        // Find the user by ID
        $user = RegUploadedFile::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
    public function regdeletefile1($id)
    {
        // Find the user by ID
        $user = RegCharteredDoc::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
    public function regdeletefile2($id)
    {
        // Find the user by ID
        $user = RegCOI::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
    public function regdeletefile3($id)
    {
        // Find the user by ID
        $user = RegPAN::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
    public function regdeletefile4($id)
    {
        // Find the user by ID
        $user = RegTAN::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
    public function regdeletefile5($id)
    {
        // Find the user by ID
        $user = RegINC::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
    public function regdeletefile6($id)
    {
        // Find the user by ID
        $user = RegSpiceDoc::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }

    public function regdeletefile6ur($id)
    {
        // Find the user by ID
        $user = URDOC::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }

    public function regdeletefile6tl($id)
    {
        // Find the user by ID
        $user = TLDOC::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }

    public function regdeletefile6pt($id)
    {
        // Find the user by ID
        $user = PTDOC::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }

    public function regdeletefile6esi($id)
    {
        // Find the user by ID
        $user = ESIDOC::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
    public function regdeletefile6regpfdoc($id)
    {
        // Find the user by ID
        $user = PFDOC::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
    public function regdeletefile7($id)
    {
        // Find the user by ID
        $user = RegCustomDoc::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }




    public function misdeletefile($id)
    {
        // Find the user by ID
        $user = MisUploadedFile::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
    public function misdeletefile1($id)
    {
        // Find the user by ID
        $user = MisCharteredDoc::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
    public function misdeletefile2($id)
    {
        // Find the user by ID
        $user = MisCOI::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
    public function misdeletefile3($id)
    {
        // Find the user by ID
        $user = MisPAN::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
    public function misdeletefile4($id)
    {
        // Find the user by ID
        $user = MisTAN::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
    public function misdeletefile5($id)
    {
        // Find the user by ID
        $user = MisINC::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
    public function misdeletefile6($id)
    {
        // Find the user by ID
        $user = MisSpiceDoc::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
    public function misdeletefile7($id)
    {
        // Find the user by ID
        $user = MisCustomDoc::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Delete the user record
        $user->delete();
    
        
    
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }


    public function regdownloadaoaFile($id)
    {
        $file = RegUploadedFile::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }

    public function regdownloadaoaFile1($id)
    {
        $file = RegCharteredDoc::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function regdownloadaoaFile2($id)
    {
        $file = RegCOI::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function regdownloadaoaFile3($id)
    {
        $file = RegPAN::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function regdownloadaoaFile4($id)
    {
        $file = RegTAN::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function regdownloadaoaFile5($id)
    {
        $file = RegINC::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function regdownloadaoaFile6($id)
    {
        $file = RegSpiceDoc::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }

    public function regdownloadaoaFile6ur($id)
    {
        $file = URDOC::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }

    public function regdownloadaoaFile6tl($id)
    {
        $file = TLDOC::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }

    public function regdownloadaoaFile6pt($id)
    {
        $file = PTDOC::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }

    public function regdownloadaoaFile6esi($id)
    {
        $file = ESIDOC::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }

    public function regdownloadreg6pfdoc($id)
    {
        $file = PFDOC::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function regdownloadaoaFile7($id)
    {
        $file = RegCustomDoc::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }


    public function misdownloadaoaFile($id)
    {
        $file = MisUploadedFile::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }

    public function misdownloadaoaFile1($id)
    {
        $file = MisCharteredDoc::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function misdownloadaoaFile2($id)
    {
        $file = MisCOI::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function misdownloadaoaFile3($id)
    {
        $file = MisPAN::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function misdownloadaoaFile4($id)
    {
        $file = MisTAN::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function misdownloadaoaFile5($id)
    {
        $file = MisINC::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function misdownloadaoaFile6($id)
    {
        $file = MisSpiceDoc::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function misdownloadaoaFile7($id)
    {
        $file = MisCustomDoc::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->file_path);
        
        return response()->download($filePath, $file->real_file_name);
    }

  
}

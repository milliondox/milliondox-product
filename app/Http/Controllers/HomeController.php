<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Assignment;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Announcement;
use App\Models\EmployeeProfile;
use App\Models\StoreCompanydirector;
use App\Models\ClientProfile;
use App\Models\TimeSheet;
use App\Models\Issue;
use App\Models\Event;
use App\Models\Notification;
use Illuminate\Support\Facades\File;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\UserInfo;
use App\Models\DataModel;
use App\Models\OutOfExpense;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\PolicyFile;
use App\Models\KeyDownload;
use App\Models\Document;
use App\Models\EmployeeStatus;
use App\Models\TemplateFile;
use App\Models\ChartedDocument;
use App\Models\Folder;

use App\Models\Files;
use App\Models\UserOtp;
use App\Models\UploadedFile;
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
use App\Models\OrganizationChart;

use App\Models\StoreBankDoc;

use App\Models\CustomDoc;
use App\Models\RegistrationDoc;
use App\Models\MiscellaneousDoc;

use App\Models\AdminEventCal;
use App\Models\CompanyProfiles;
use App\Models\DirectorStore;
use App\Models\CustomDirectorStore;
use Illuminate\Support\Facades\Response;
use Illuminate\Auth\AuthenticationException;
use App\Models\StoreIpFile;
use App\Models\StoreEmployeeprofile;
use App\Models\StoreEmployeeDetail;
use App\Models\StoreEmployeePayroll;
use App\Models\StoreContract;
use App\Models\StoreAudit;
use App\Models\MOA;
use App\Models\PFDOC;
use App\Models\ESIDOC;
use App\Models\PTDOC;
use App\Models\TLDOC;
use App\Models\URDOC;
use App\Models\StoreFixedAsset;
use App\Models\BoardNotice;
use App\Models\BoardAttendencesheet;
use App\Models\BoardResolutions;
use App\Models\BoardMinuteBook;
use App\Models\MeetNotice;
use App\Models\MeetMinBook;
use App\Models\MeetAttendencesheet;
use App\Models\MeetResolutions;
use App\Models\OrderNotice;
use App\Models\OrderMinuteBook;
use App\Models\OrderAttendencesheet; 
use App\Models\OrderResolutions;
use App\Models\InnerRun;
use App\Models\InnerINC9;
use App\Models\InnerSpice;
use App\Models\InnerINC33;

use App\Models\InnerINC34;
use App\Models\InnerINC35;

use App\Models\InnerINC22;

use App\Models\InnerINC20A;

use App\Models\AnnAoC4AFS;
use App\Models\AnnAoC4CFS;

use App\Models\AnnMGT7;

use App\Models\AnnMGT7A;

use App\Models\BankAccStatement;

use App\Models\Director1AadharKYC;
use App\Models\Director1AddressProof;
use App\Models\Director1ContactDetails;
use App\Models\Director1PANKYC;
use App\Models\Director1Photo;
use App\Models\Director1Signimg;
use App\Models\Director2AadharKYC;
use App\Models\Director2AddressProof;
use App\Models\Director2ContactDetails;
use App\Models\Director2PANKYC;
use App\Models\Director2Photo;
use App\Models\Director2Signimg;
use App\Models\IncorporationArtofAssoc;
use App\Models\IncorporationCertifofincorp;
use App\Models\IncorporationLLPAgreement;
use App\Models\IncorporationMemoofAssoc;
use App\Models\IncorporationPartnerdeed;
use App\Models\IncorporationSharecertif;
use App\Models\IncorporationTrustDeed;
use App\Models\RegistrationsEmpStateInscertif;
use App\Models\RegistrationsGSTINcertif;
use App\Models\RegistrationsLabourWelfFundcertif;
use App\Models\RegistrationsMSMEcertif;
use App\Models\RegistrationsPANcertif;
use App\Models\RegistrationsPFundcertif;
use App\Models\RegistrationsPOSHPolicy;
use App\Models\RegistrationsProfTaxcertif;
use App\Models\RegistrationsTANcertif;
use App\Models\RegistrationsTrademark;
use App\Models\CreditCardStatementsAddCreditCardState;
use App\Models\FixedDepositStatementsFixDepAccState;
use App\Models\MutualFundStatementsAddCreditCardState;
use App\Models\AuditorAppointmentAcptletterappt;
use App\Models\AuditorAppointmentBordResforaptofAudt;
use App\Models\AuditorAppointmentCrtficatRule4consntAudapt;
use App\Models\AuditorAppointmentInttoaud;
use App\Models\AuditorAppointmentLetterofapt;
use App\Models\AuditorAppointmentSpecalResl;
use App\Models\AuditorExitsADT2;
use App\Models\AuditorExitsADT3;
use App\Models\AuditorExitsResignDetofgroundsseekremaud;
use App\Models\AuditorExitsResignletteraud;
use App\Models\AuditorExitsSpecialResol;
use App\Models\DepositUndertakingsFormDPT3;
use App\Models\DirectorAppointmentsDir3;
use App\Models\DirectorAppointmentsDir6;
use App\Models\DirectorAppointmentsDir12;
use App\Models\DirectorResignationDir11;
use App\Models\DirectorResignationDir12;
use App\Models\StatutoryRegistersForeignReg;
use App\Models\StatutoryRegistersRegofCharges;
use App\Models\StatutoryRegistersRegofContDirectinterested;
use App\Models\StatutoryRegistersRegofDeposits;
use App\Models\StatutoryRegistersRegofDirKMP;
use App\Models\StatutoryRegistersRegofInvestnotheldCompany;
use App\Models\StatutoryRegistersRegofLoanGuarantSec;
use App\Models\StatutoryRegistersRegofMemb;
use App\Models\StatutoryRegistersRegofOtherSecHold;

use App\Models\Member;

use App\Models\CommonTable;
use App\Models\UserRole;

use App\Models\DataRoom;

use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\Helpers\Builder\EmailParams;


use App\Models\Tasks;
use App\Models\StoreGST;
use App\Models\StoreCompanyEmployee;
use App\Models\TaskEvents;
use App\Models\Feedback;


use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user(); // Get the currently authenticated user
        $employees = User::where('role', 'Employee')->get();
        $clients = User::where('role', 'Client')->get();
        $results = DB::table('assignments as a')
    ->join('users as u', 'u.id', '=', 'a.client_id')
    ->join('users as us', 'us.id', '=', 'a.employee_id')
    ->select('a.*', 'u.*', 'us.*') // Adjust the columns as needed
    ->get();
    $policy = PolicyFile::latest()->get();
    
   $role  = UserRole::get();
 $currentDate = Carbon::now();

   
    $roles = UserRole::pluck('role')->toArray(); // Get an array of all roles

// Get the user's role from the users table
$userRole = $user->role; // Ensure 'role' field exists in the users table
// dd($userRole);
// Check if the user's role exists in the roles array
$user = auth()->user();

// Get the user's role from the users table
$userRole = $user->role; // Ensure 'role' field exists in the users table

// Find the UserRole record where the role matches the user's role
$userRoleRecord = UserRole::where('role', $userRole)->first();

if ($userRoleRecord) {
    // Fetch data based on the matched UserRole record's id
    $roleId = $userRoleRecord->id;
    // dd($userRoleRecord);

    // Now, you can use the $roleId to fetch data related to this role
     $clientdata = ClientProfile::where('client_id', $user->id)->first();
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();

    $today = Carbon::now()->toDateString(); // Get the current date in YYYY-MM-DD format

    $events = DB::table('events as e')
        ->join('users as u', 'u.id', '=', 'e.client_id')
        ->where('e.client_id', $user->id)
        ->whereDate('e.start', '>=', $today)
        ->select('title', DB::raw('MAX(start) as start'), DB::raw('MAX(description) as description'))
        ->groupBy('title')
        ->get();

    $tasks = Tasks::where('status', '!=', 'deleted')->where('user_id', $user->id)->get();
                    // ->whereDate('taskDeadline', Carbon::today())->get();

        // $eventsData = TaskEvents::whereDate('eventDate', Carbon::today())->get();
         $eventsData = TaskEvents::where('user_id', $user->id)->get();
        // dd($eventsData);
        $upcomingevent = TaskEvents::whereDate('eventDate', '>=', Carbon::today())
        ->where('user_id', $user->id)
                    ->orderBy('eventDate', 'asc')
                    ->get();
                    // dd($upcomingevent);

    return view('user.dashboard.index', [
        'user' => $user,
        'policy' => $policy,
        'clientdata' => $clientdata,
        'cli_announcements' => $cli_announcements,
        'events' => $events,
        'tasks' => $tasks,
        'userRoleRecord' => $userRoleRecord,
        'currentDate' => $currentDate,
        'eventsData' => $eventsData,
        'upcomingevent' => $upcomingevent
    ]);

} else {
    // Handle cases where the role doesn't match any record in UserRole
    return redirect('/unauthorized'); // Example: redirect to an unauthorized page
}
    
    }
    
    
    public function saveFeedback(Request $request)
    {
        $user = auth()->user();
        $userId = Auth::id();
    
        $request->validate([
            'textarea' => 'required|string|max:1000', 
            'file' => 'required|mimes:jpg,jpeg,png,pdf,doc,docx|max:4096',
        ]);
    
        if ($request->hasFile('file')) {
            
            $file = $request->file('file');
            
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            // Store the file in the 'feedback' folder inside 'storage/app/public'
            
            $filePath = $file->storeAs('uploads/Feedbacks', $fileName);
            
            $feedback = new Feedback();
            
            $feedback->user_id = $userId;
            $feedback->role = $user->role;
            $feedback->feedback_message = $request->textarea;
            $feedback->real_file_name = $file->getClientOriginalName();
            $feedback->file_type = $file->getClientMimeType();
            $feedback->file_path = $filePath; // Store the file path in the database
            $feedback->status = 0;
    
            
            if ($feedback->save()) {
                return response()->json(['success' => 'Feedback submitted successfully. We will get back to you !']);
            } else {
                return response()->json(['error' => 'Something went wrong!']);
            }
        } else {
            return response()->json(['error' => 'File upload failed!']);
        }
    }

    
    
   
    
    
    
    
    public function addTask(Request $request){
     
     $validatedData = $request->validate([
        'taskName' => 'required|string|max:255',
        'taskDeadline' => "required",
        'assignto' => 'required|string|max:255',
        'eventnote' => 'required|string|max:500',
    ]);
$user = auth()->user();
        $userId = Auth::id();
    $task = new Tasks();
    $task->user_id =  $userId;
    $task->taskName = $validatedData['taskName'];
    $task->taskDeadline = $validatedData['taskDeadline'];
    $task->assignto = $validatedData['assignto'];
    $task->eventnote = $validatedData['eventnote'];
    $task->status="pending";

    if ($task->save()) {
        // $tasksData = Tasks::all();
        $tasksData = Tasks::where('status', '!=', 'deleted')
                            ->whereDate('taskDeadline', Carbon::today())->get();

        return response()->json(['tasks' => $tasksData,'success' => 'Task created successfully'],200);
        //   return redirect()->back()->with('success', 'Task created successfully');
    } else {
        return response()->json(['error' => 'Something went wrong'],422);
        // return redirect()->back()->with('error', 'Somewthing went wrong');
    }
}
public function editTask(Request $request) {
    $validatedData = $request->validate([
        'task_id' => 'required|integer',
        'taskName' => 'required|string|max:255',
        'taskDeadline' => 'required|date',
        'assignto' => 'required|string|max:255',
        'eventnote' => 'nullable|string'
    ]);

    // Fetch the task by ID and update its values
    $task = Tasks::find($request->task_id);
    if ($task) {
        $task->taskName = $request->taskName;
        $task->taskDeadline = $request->taskDeadline;
        $task->assignto = $request->assignto;
        $task->eventnote = $request->eventnote;
        $task->save();

        return response()->json(['success' => 'Task updated successfully.']);
    } else {
        return response()->json(['error' => 'Task not found.'], 404);
    }
}
public function deleteTask($id)
{
    $task = Tasks::find($id);

    if ($task) {
        $task->delete();
        return response()->json(['success' => 'Task deleted successfully.']);
    }

    return response()->json(['error' => 'Task not found.'], 404);
}


public function deleteeventTask($id){
    $task = TaskEvents::find($id);

    if ($task) {
        $task->delete();
        return response()->json(['success' => 'Task deleted successfully.']);
    }

    return response()->json(['error' => 'Task not found.'], 404);
}

// public function getTaskData(){
//     $tasks = Tasks::all();
//     // dd($tasks);
//     return response()->json(['tasks' => $tasks],200);
// }

public function updateTask(Request $request){
 
    // Get the task ID from the AJAX request
    // $taskId=2;
    $taskId = $request->input('task_id');
    // print_r($taskId);
    // dd($request);
    
    // dd($taskId);
    
    $validatedData = $request->validate([
        'taskName' => 'required|string|max:255',
        'taskDeadline' => "required",
        'assignto' => 'required|string|max:255',
        'eventnote' => 'required',
    ]);

    $task = new Tasks();
    $task->taskName = $validatedData['taskName'];
    $task->taskDeadline = $validatedData['taskDeadline'];
    $task->assignto = $validatedData['assignto'];
    $task->eventnote = $validatedData['eventnote'];

    // Update the status in the database
    
    
    $updated = Tasks::where('id', $taskId)
            ->update([
                'taskName' => $task->taskName,
                'taskDeadline' => $task->taskDeadline,
                'assignto' => $task->assignto,
                'eventnote' => $task->eventnote
            ]);

            // Check if the update was successful
            if ($updated) {
                // echo 'Task updated successfully!';
                //  $tasksData = Tasks::where('status', '!=', 'deleted')->get();
                 return redirect()->back()->with('success', 'Task updated successfully');
                // return response()->json(['tasks' => $tasksData,'success' => 'Task Updated successfully'],200);
                // return response()->json(['message' => 'Task is updated !!!']);
            } else {
                // echo 'Failed to update task.';
                
                // $tasksData = Tasks::where('status', '!=', 'deleted')->get();
                return redirect()->back()->with('error', 'Something Went Wrong !!!');
                // return response()->json(['tasks' => $tasksData,'error' => 'Something Went Wrong'],422);
                // return response()->json(['message' => 'Something went wrong!!!']);
              }

        // if($task->save()){
        //  $tasksData = Tasks::where('status', '!=', 'deleted')->get();

        // return response()->json(['tasks' => $tasksData,'success' => 'Task Updated successfully'],200);
        // // return response()->json(['message' => 'Status : Task is Pending !!!']);
    
        // }
        // else{
        //     return response()->json(['message' => 'Status : Something Went wrong !!!']);
        // }
}

public function getTaskWithDate(Request $request,$taskDate)
{
    // dd($request);
    
     $taskDate = $request->input('taskDate');
    //   dd($taskDate);
    //  print_r($taskDate);
    
    try {
        // Find the task by Date
         $tasksData = Tasks::where('status', '!=', 'deleted')
                            ->whereDate('taskDeadline', $taskDate )->get();
                            
        return response()->json(['tasks' => $tasksData,'success' => 'Task Fetched successfully'],200);

        // Return JSON response with task data
        // return response()->json([
        //     'success' => true,
        //     'task' => [
        //         'taskName' => $task->taskName,
        //         'taskDeadline' => $task->taskDeadline,
        //         'assignto' => $task->assignto,
        //         'eventnote' => $task->eventnote,
        //     ]
        // ]);
    } catch (\Exception $e) {
        // Handle exception and return error response
        return response()->json([
            'success' => false,
            'error' => 'Task not found.'
        ], 404);
    }
}
public function storegst(Request $request)
{
    // Validate the incoming request data
    $messages = [
        'add_gstt.unique' => 'This GST number already exists. Please provide a unique GST number.',
    ];

    // Validate the incoming request data
    $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id', // Ensure the user exists
        'statee_new' => 'required|string|max:255',
        'add_gstt' => 'required|string|max:255|unique:store_gst,add_gstt', // Ensure GSTIN is unique
    ], $messages);

    // Create a new StoreGST record
    $storeGst = StoreGST::create([
        'user_id' => $validatedData['user_id'],
        'statee_new' => $validatedData['statee_new'],
        'add_gstt' => $validatedData['add_gstt'],
    ]);

    // Return a success response (optional)
    return response()->json([
        'message' => 'GST details stored successfully!',
        'data' => $storeGst,
    ]);
}
public function updateGST(Request $request)
{
    $request->validate([
        'statee_new' => 'required|string',
        'add_gstt' => 'required|string',
        // Add any other validation rules as needed
    ]);

    // Find the GST record by ID and update it
    $gst = StoreGST::find($request->gst_id);
    $gst->statee_new = $request->statee_new;
    $gst->add_gstt = $request->add_gstt;
    // Update other fields if necessary
    $gst->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'GST details updated successfully.');
}

public function deleteGST($id)
{
    // Find the record by ID and delete
    $gst = StoreGST::find($id);
    
    if ($gst) {
        $gst->delete();
        return response()->json(['message' => 'GST record deleted successfully.'], 200);
    }
    
    return response()->json(['message' => 'GST record not found.'], 404);
}
public function storecompanydirector(Request $request)
{
    // Validate input
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'startdate' => 'required|date',
        'enddate' => 'nullable|date',
        'DIN' => 'required|string|max:50',
        'path' => 'nullable|string',
        'parent_name' => 'nullable|string',
    ]);

    $userId = Auth::id(); // Get authenticated user ID
    $name = $request->name;

    // Get current year and month
    $currentYear = now()->year;
    $currentMonth = now()->format('F'); // Full month name (e.g., 'June')
    
    // Determine fiscal year
    if (now()->month < 4) {
        // Before April, fiscal year is previous year - current year
        $fiscalYear = ($currentYear - 1) . '-' . $currentYear;
    } else {
        // Otherwise, current year - next year
        $fiscalYear = $currentYear . '-' . ($currentYear + 1);
    }

    // Generate new folder name
    $new_folderName = $fiscalYear . $currentMonth . $userId . "_" . $name;

    // Define the parent folder path
    $parentFolderPath = "Accounting & Taxation/Charter documents/Director Details";

    // Combine parent folder path with new folder name
    $newFolderPath = $parentFolderPath . '/' . $new_folderName;

    // Check if folder already exists
    if (Storage::exists($newFolderPath)) {
        return redirect()->back()->with('error', 'Same Name already exists.');
    }

    // Create a new StoreCompanyDirector record
    $storedir = StoreCompanydirector::create([
        'user_id' => $userId,
        'name' => $request->name,
        'startdate' => $request->startdate,
        'enddate' => $request->enddate,
        'DIN' => $request->DIN,
        'path' => $newFolderPath,
        'parent_name' => $parentFolderPath,
    ]);

    // Create the directory
    Storage::makeDirectory($newFolderPath);

    // Create a new Folder record and associate the director ID
    $folder = new Folder();
    $folder->name = $new_folderName;
    $folder->path = $newFolderPath;
    $folder->parent_name = $parentFolderPath;
    $folder->user_id = $userId;
    $folder->director_id = $storedir->id;  // Store the last inserted director ID
    $folder->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Director details stored successfully!');
}

public function updatecompanydirector(Request $request)
{
    // Find the director record by ID
    $dir = StoreCompanydirector::find($request->dir_id);

    // Update director details
    $dir->name = $request->f_name;
    $dir->startdate = $request->startdate;
    $dir->enddate = $request->enddate;
    $dir->DIN = $request->DIN;
    $dir->save(); // Save updated director information

    // Find the corresponding folder record
    $folder = Folder::where('director_id', $dir->id)->first();

    if ($folder) {
        // Get the current folder name and path
        $currentFolderPath = $folder->path;

        // Generate new folder name and path
        $currentYear = now()->year;
        $currentMonth = now()->format('F'); // Full month name (e.g., 'June')
        
        // Determine fiscal year
        if (now()->month < 4) {
            $fiscalYear = ($currentYear - 1) . '-' . $currentYear;
        } else {
            $fiscalYear = $currentYear . '-' . ($currentYear + 1);
        }

        // Generate new folder name
        $new_folderName = $fiscalYear . $currentMonth . Auth::id() . "_" . $request->f_name;
        $newFolderPath = "Accounting & Taxation/Charter documents/Director Details/" . $new_folderName;

        // Check if the folder name has changed
        if ($currentFolderPath !== $newFolderPath) {
            // Rename the directory in the file system
            if (Storage::exists($currentFolderPath)) {
                Storage::move($currentFolderPath, $newFolderPath); // Move/rename directory
            }

            // Update folder record with the new name and path
            $folder->name = $new_folderName;
            $folder->path = $newFolderPath;
            $folder->save();
        }
    }

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Director details updated successfully, and folder renamed if necessary.');
}

public function updatedirstatus(Request $request)
{
    $request->validate([
        'id' => 'required|integer',
        
    ]);

    // Update the is_delete status in storecompanydirector
    StoreCompanyDirector::where('id', $request->id)
        ->update(['is_delete' => 1]);

    // Update the is_delete status in folder
    Folder::where('director_id', $request->id)
        ->update(['is_delete' => 1]);

    return response()->json(['success' => true]);
}
public function storecompanyemployee(Request $request)
{
    // Custom validation messages
    $messages = [
        'emp_code.unique' => 'This Employee Code already exists. Please provide a unique Employee Code.',
    ];

    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'app_dates' => 'required|date',
        'termi_dates' => 'nullable|date',
        'emp_code' => 'required|string|max:50|unique:store_company_employee,emp_code', // Ensure emp_code is unique
    ], $messages);

    $user = auth()->user();
    $userId = Auth::id();

    // Create a new StoreCompanyEmployee record
    $storeemp = StoreCompanyEmployee::create([
        'user_id' => $userId,
        'name' => $request->name,
        'app_date' => $request->app_dates,
        'termi_date' => $request->termi_dates,
        'emp_code' => $request->emp_code,
    ]);

    // Return a success response (optional)
    return response()->json([
        'message' => 'Employee details stored successfully!',
        'data' => $storeemp,
    ]);
}

public function updatecompanyemployee(Request $request)
{
    // dd($request);
   

    // Find the GST record by ID and update it
    $emp = StoreCompanyEmployee::find($request->emp_id);
    $emp->name = $request->name;
    $emp->app_date = $request->app_date;
     $emp->termi_date = $request->termi_date;
     $emp->emp_code = $request->emp_code;
    // Update other fields if necessary
    $emp->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Employee details updated successfully.');
}

public function delcompemp(Request $request)
{
    $empId = $request->input('emp_id');

    // Find the employee by ID and delete
    $employee = StoreCompanyEmployee::find($empId);

    if ($employee) {
        $employee->delete();

        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false, 'message' => 'Employee not found.']);
}

public function downloadCsv()
{
    $user = auth()->user();
    $userId = Auth::id();// Fetch all employees
    $employees = StoreCompanyEmployee::where('user_id',$userId)->get();
    $filename = "employees.csv";

    // Set headers for the response
    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="' . $filename . '"',
    ];

    // Use output buffering to capture the CSV output
    return response()->stream(function () use ($employees) {
        $handle = fopen('php://output', 'w');

        // Set the CSV headers
        fputcsv($handle, ['name', 'app_date', 'termi_date', 'emp_code']);

        foreach ($employees as $employee) {
            fputcsv($handle, [
                $employee->name,
                // "'" . \Carbon\Carbon::parse($employee->app_date)->format('Y-m-d'), // Prepend apostrophe
                // "'" . \Carbon\Carbon::parse($employee->termi_date)->format('Y-m-d'), // Prepend apostrophe
                \Carbon\Carbon::parse($employee->app_date)->format('Y-m-d'), // Format to YYYY-MM-DD
                \Carbon\Carbon::parse($employee->termi_date)->format('Y-m-d'), // Format to YYYY-MM-DD
                $employee->emp_code
            ]);
        }

        fclose($handle); // Close the handle after writing
    }, 200, $headers);
}






public function uploadempcsv(Request $request)
{
    // Validate the uploaded CSV file
    $validator = Validator::make($request->all(), [
        'csv_file' => 'required|mimes:csv,txt|max:200048',
    ]);

    if ($validator->fails()) {
        // Redirect back with validation errors
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Get the authenticated user's ID
    $userId = Auth::id();

    // Get the uploaded file
    $file = $request->file('csv_file');

    // Open the CSV file for reading
    $file_handle = fopen($file->getRealPath(), 'r');
    
    // Skip the header row
    $header = fgetcsv($file_handle); 

    $employeesToInsert = [];
    $existingEmpCodes = [];
    $skippedRecords = 0;

    // Process the CSV file row by row
    while (($row = fgetcsv($file_handle, 1000, ",")) !== FALSE) {
        $emp_code = $row[3];

        // Check if the emp_code already exists in the database
        if (StoreCompanyEmployee::where('emp_code', $emp_code)->exists()) {
            // If the emp_code exists, increment the skipped record count
            $skippedRecords++;
        } else {
            // If it's unique, prepare it for insertion
            $employeesToInsert[] = [
                'user_id' => $userId,
                'name' => $row[0],
                'app_date' => \Carbon\Carbon::parse($row[1])->format('Y-m-d'), // Convert date to Y-m-d format
                'termi_date' => !empty($row[2]) ? \Carbon\Carbon::parse($row[2])->format('Y-m-d') : null,
                'emp_code' => $emp_code,
                'created_at' => now(), // Set the created_at timestamp
                'updated_at' => now(), // Set the updated_at timestamp
            ];
        }
    }

    fclose($file_handle);

    // Insert only the unique employee records into the database
    $storedRecords = count($employeesToInsert);
    if ($storedRecords > 0) {
        StoreCompanyEmployee::insert($employeesToInsert);
    }

    // Return a success message with the count of stored and skipped records
    return redirect()->back()->with('success', "{$storedRecords} employees stored successfully and {$skippedRecords} duplicate employees were skipped.");
}


public function getEventWithDate(Request $request, $eventDate)
{
    // dd($request);
    
     $eventDate = $request->input('eventDate');
    
    try {
        // Find the task by Date
         $eventsData = TaskEvents::whereDate('eventDate', $eventDate )->get();
                            
        return response()->json(['taskEvents' => $eventsData,'success' => 'Event Fetched successfully'],200);

    } catch (\Exception $e) {
        // Handle exception and return error response
        return response()->json([
            'success' => false,
            'error' => 'Event not found.'
        ], 404);
    }
}


public function addEvents(Request $request){
    
     $validatedData = $request->validate([
        'eventName' => 'required|string|max:255',
        'eventDate' => "required",
        'repeat' => 'required',
        'eventType' => 'required',
    ]);

$user = auth()->user();
$user_id = $user->id;
    $event = new TaskEvents();
    $event->user_id = $user_id;
    $event->eventName = $validatedData['eventName'];
    $event->eventDate = $validatedData['eventDate'];
    $event->eventRepeat = $validatedData['repeat'];
    $event->eventType = $validatedData['eventType'];

    if ($event->save()) {
        $eventsData = TaskEvents::whereDate('eventDate', Carbon::today())->get();

        return response()->json(['taskEvents' => $eventsData,'success' => 'Event created successfully'],200);
        //   return redirect()->back()->with('success', 'Task created successfully');
    } else {
        return response()->json(['error' => 'Something went wrong'],422);
        // return redirect()->back()->with('error', 'Somewthing went wrong');
    }
}
public function editEvents(Request $request) {
    

    // Fetch the task by ID and update its values
    $task = TaskEvents::find($request->event_id);
    if ($task) {
        $task->eventName = $request->eventName;
        $task->eventDate = $request->eventDate;
        $task->eventRepeat = $request->repeat;
        $task->eventType = $request->eventType;
        $task->save();

        return response()->json(['success' => 'Event updated successfully.']);
    } else {
        return response()->json(['error' => 'Event not found.'], 404);
    }
}
// public function updateEvents(Request $request){
    
//      $validatedData = $request->validate([
//         'eventName' => 'required|string|max:255',
//         'eventDate' => "required",
//         'repeat' => 'required',
//         'eventType' => 'required',
//     ]);

// }

public function updateEvents(Request $request){
    
    $eventId = $request->input('event_id');
    // print_r($eventId);
    // dd($request);
    // dd($eventId);
    
    $validatedData = $request->validate([
        'eventName' => 'required|string|max:255',
        'eventDate' => "required",
        'repeat' => 'required',
        'eventType' => 'required',
    ]);

    $event = new TaskEvents();
    $event->eventName = $validatedData['eventName'];
    $event->eventDate = $validatedData['eventDate'];
    $event->eventRepeat = $validatedData['repeat'];
    $event->eventType = $validatedData['eventType'];

    // Update the status in the database
    
    
    $updated = TaskEvents::where('id', $eventId)
            ->update([
                'eventName' => $event->eventName,
                'eventDate' => $event->eventDate,
                'eventRepeat' => $event->eventRepeat,
                'eventType' => $event->eventType
            ]);

            // Check if the update was successful
            if ($updated) {
                // echo 'Task updated successfully!';
                //  $tasksData = TaskEvents::where('status', '!=', 'deleted')->get();
                 return redirect()->back()->with('success', 'Event updated successfully');
                // return response()->json(['tasks' => $tasksData,'success' => 'Task Updated successfully'],200);
                // return response()->json(['message' => 'Task is updated !!!']);
            } else {
                // echo 'Failed to update task.';
                
                // $tasksData = TaskEvents::where('status', '!=', 'deleted')->get();
                return redirect()->back()->with('error', 'Something Went Wrong !!!');
                // return response()->json(['tasks' => $tasksData,'error' => 'Something Went Wrong'],422);
                // return response()->json(['message' => 'Something went wrong!!!']);
              }

}



public function getTaskEvents(){
    $taskEvents = TaskEvents::whereDate('eventDate', Carbon::today())->get();
    // dd($tasks);
    return response()->json(['taskEvents' => $taskEvents],200);
}

public function updateTaskStatus(Request $request)
{
    // Get the task ID from the AJAX request
    $taskId = $request->input('task_id');

    // Update the status in the database
    $task = Tasks::find($taskId);
    if($task->status=='completed'){
        $task->status = 'pending';
        $task->save();
         $tasksData = Tasks::where('status', '!=', 'deleted')
         ->whereDate('taskDeadline', Carbon::today())->get();

        return response()->json(['tasks' => $tasksData,'success' => 'Status Changed successfully'],200);
        // return response()->json(['message' => 'Status : Task is Pending !!!']);
    }
    else if($task->status=='pending'){
        $task->status = 'completed';
        $task->save();
         $tasksData = Tasks::where('status', '!=', 'deleted')
         ->whereDate('taskDeadline', Carbon::today())->get();
         
        return response()->json(['tasks' => $tasksData,'success' => 'Status Changed successfully'],200);
        // return response()->json(['message' => 'Status : Task is Completed !!!']);

    }
    else{
        return response()->json(['message' => 'Status : Something Went wrong !!!']);

    }
    // Return a response to the AJAX request
    // return response()->json(['message' => 'Status : Task Completed successfully']);
}
    


public function deleteTaskStatus(Request $request){
    $taskId = $request->input('task_id');

    // Update the status in the database
    $task = Tasks::find($taskId);
    if($task->status=='completed' || $task->status = 'pending'){
        $task->status = 'deleted';
        $task->save();
        $tasksData = Tasks::where('status', '!=', 'deleted')->whereDate('taskDeadline', Carbon::today())->get();

        return response()->json(['tasks' => $tasksData,'success' => 'Task deleted successfully'],200);
        // return response()->json(['message' => 'Status : Task is Deleted Successfully !!!']);
    }
    else{
        return response()->json(['message' => 'Status : Something Went wrong !!!']);

    }

}
    public function updateStatusrole(Request $request, $id)
{
    // dd($request);
    $role = UserRole::find($id);

        
        if ($role) {
            // Update the is_delete field in the User model
         
        $role->is_deleted = $request->is_deleted; // Update the is_deleted status
        $role->save(); 

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
}
public function deleteUser($id)
    {
        // Find the user by ID
        $user = User::find($id);
        
        if ($user) {
            // Update the is_delete field in the User model
            $user->is_delete = 0;
            $user->save();

            // Update the userinfo table where user_id matches the given ID
            DB::table('user_infos')
                ->where('user_id', $id)
                ->update(['is_delete' => 0]);

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
public function fetchUsers(Request $request)
{
    $user = auth()->user();
    $role = $request->input('role');

    // Fetch users based on the role
  $users = User::where('role', $role)
             ->whereNull('is_delete')
             ->where('createdby_id', $user->id)
             ->get();

// $role_id = $request->input('role_id');
//     $role_name = $request->input('role_name');

//     // Fetch users with matching main_role_id and role
//     $users = User::where('main_role_id', $role_id)
//                  ->where('role', $role_name)
//                  ->get();

    // Return a JSON response with the fetched users
    return response()->json([
        'success' => true,
        'users' => $users
    ]);
}
public function updateMembers(Request $request)
{
    $request->validate([
        'mem_id' => 'required|exists:users,id',
        'fname' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|string',
        'phone' => 'required|string',
        'personal_email_id' => 'required|email',
        'Role' => 'required|string',
        'profile_picture' => 'nullable|image|max:2048', // Optional, but limits the file type and size
    ]);

    // Update User table
    $user = User::findOrFail($request->mem_id);
    $user->name = $request->fname;
    $user->email = $request->email;
    $user->password = bcrypt($request->password); // Encrypt the password
    $user->phone = $request->phone;
    $user->personal_email_id = $request->personal_email_id;
    $user->role = $request->Role;

    // Handle profile picture upload
    if ($request->hasFile('profile_picture')) {
        $file = $request->file('profile_picture');
        $fileName = time() . '_' . $file->getClientOriginalName();
        
        // Move the file to the public/uploads/profile_images directory
        $file->move(public_path('uploads/profile_images'), $fileName);
        
        // Store the file path in the profile_picture field in the User table
        $user->profile_picture =  $fileName;
    }

    $user->save();

    // Update UserInfo table
    $userInfoData = [
        'name' => $request->fname,
        'email' => $request->email,
        'password' => bcrypt($request->password), // Encrypt the password
        'phone' => $request->phone,
        'personal_email_id' => $request->personal_email_id,
        'role' => $request->Role,
    ];

    // Update profile picture in UserInfo table
    if ($request->hasFile('profile_picture')) {
        $userInfoData['profile_picture'] = $fileName;
    }

    UserInfo::where('user_id', $user->id)->update($userInfoData);

    // Update Member table (assuming it has a similar structure to User and UserInfo tables)
    $member = Member::where('emp_id', $user->id)->first(); // Assuming there's a relationship
    if ($member) {
        $member->fname = $request->fname;
        $member->email = $request->email;
        $member->phone = $request->phone;
        $member->personal_email_id = $request->personal_email_id;
        $member->role = $request->Role;

        // Update profile picture in the members table
        if ($request->hasFile('profile_picture')) {
            $member->profile_picture =  $fileName;
        }

        $member->save();
    }

    return redirect()->back()->with('success', 'User information and member profile updated successfully.');
}



    public function userrolenotification()
    {
         $roles = UserRole::pluck('role')->toArray(); // Get an array of all roles

// Get the user's role from the users table
$userRole = $user->role; // Ensure 'role' field exists in the users table

// Check if the user's role exists in the roles array
$user = auth()->user();

// Get the user's role from the users table
$userRole = $user->role; // Ensure 'role' field exists in the users table

// Find the UserRole record where the role matches the user's role
$userRoleRecord = UserRole::where('role', $userRole)->first();
       return view('user.include.header-details',[
        'user' => $user]);
    }
    
    public function usertrashnotification()
    {
         $roles = UserRole::pluck('role')->toArray(); // Get an array of all roles

// Get the user's role from the users table
$userRole = $user->role; // Ensure 'role' field exists in the users table

// Check if the user's role exists in the roles array
$user = auth()->user();

// Get the user's role from the users table
$userRole = $user->role; // Ensure 'role' field exists in the users table

// Find the UserRole record where the role matches the user's role
$userRoleRecord = UserRole::where('role', $userRole)->first();
       return view('user.include.client-sidebar',[
        'user' => $user]);
    }
    
    
    public function downloadCommonFile($id)
{
    $file = CommonTable::findOrFail($id);
    
    // Assuming you store the file path in a 'file_path' column
    $filePath = $file->file_path;
    $fileName = basename($filePath);
    // $realfileName = $file->file_name;
    
    if (Storage::exists($filePath)) {
        return Storage::download($filePath);
    } else {
        return redirect()->back()->with('error', 'File not found.');
    }
    
}

public function softdeleteCommonFile($id)
{
    $file = CommonTable::findOrFail($id);
    if($file->is_delete == 0){
        $file->is_delete = 1; // Or set to a specific value like 0 or 1
        $file->save();
        return response()->json(['success' => 'File Moved to Trash']);
        // return redirect()->back()->with('success', 'File Moved to Trash.');
    }
     else {
        return response()->json(['error' => 'File Not Found']);
        // return redirect()->back()->with('error', 'File not Found.');
    }
    
}

public function deleteCustomFile($id)
{
    $file = CommonTable::findOrFail($id);
    if($file->is_delete == 0){
        $file->is_delete = 1; // Or set to a specific value like 0 or 1
        $file->save();
        return response()->json(['success' => 'File is Deleted']);
        // return redirect()->back()->with('success', 'File Moved to Trash.');
    }
     else {
        return response()->json(['error' => 'File Not Found , Something Went Wrong!!!']);
        // return redirect()->back()->with('error', 'File not Found.');
    }
}

public function loadFolderSession()
    {
        $folderPath = Session::get('folderPath');
        $folderContents = Session::get('folderContents');
        $fileContents = Session::get('fileContents');

        return response()->json([
            'folderPath' => $folderPath,
            'folderContents' => $folderContents,
            'fileContents' => $fileContents,
        ]);
    }

    // Function to save folder data to session
    public function saveFolderSession(Request $request)
    {
        $folderPath = $request->input('folderPath');
        $folderContents = $request->input('folderContents');
        $fileContents = $request->input('fileContents');

        Session::put('folderPath', $folderPath);
        Session::put('folderContents', $folderContents);
        Session::put('fileContents', $fileContents);

        return response()->json([
            'message' => 'Folder data saved to session successfully!'
        ]);
    }
        


   
    
    
   
    
public function getUsersByRole($role)
{
    $userId = Auth::id(); 

    // Fetch users where role matches and createdby_id is equal to the authenticated user's ID
    $users = User::where('role', $role)
                 ->where('createdby_id', $userId)
                 
                 ->get();

    return response()->json(['users' => $users]);
}


    
   public function getUnionResults($financialYear)
    {
        $userId = Auth::id();

        $boardNotice = DB::table('board_notice')
            ->select(DB::raw("'board_notice' AS source_table"), 'board_notice.*')
            ->where('user_id', $userId)
            ->where('fyear', $financialYear);

        $boardReso = DB::table('board_reso')
            ->select(DB::raw("'board_reso' AS source_table"), 'board_reso.*')
            ->where('user_id', $userId)
            ->where('fyear', $financialYear);

        $boardMinuteBook = DB::table('board_minute_book')
            ->select(DB::raw("'board_minute_book' AS source_table"), 'board_minute_book.*')
            ->where('user_id', $userId)
            ->where('fyear', $financialYear);

        $boardAs = DB::table('board_as')
            ->select(DB::raw("'board_as' AS source_table"), 'board_as.*')
            ->where('user_id', $userId)
            ->where('fyear', $financialYear);

        $results = $boardNotice
            ->unionAll($boardReso)
            ->unionAll($boardMinuteBook)
            ->unionAll($boardAs)
            ->get();

        return response()->json($results);
    }
    public function downloadfilterFile($sourceTable, $fileId)
{
    // Ensure valid source table to prevent SQL injection
    $validTables = ['board_notice', 'board_reso', 'board_minute_book', 'board_as'];
    if (!in_array($sourceTable, $validTables)) {
        abort(404);
    }

    // Fetch the file information from the database
    $fileInfo = DB::table($sourceTable)->where('id', $fileId)->first();

    if (!$fileInfo) {
        abort(404);
    }

    // Construct file path and name
    $filePath = storage_path('app/' . $fileInfo->file_path);
    $fileName = $fileInfo->file_name;

    // Return the file for download
    return response()->download($filePath, $fileName);
}

 public function boradnotice(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial', 'Meeting', 'Board', 'Notice'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                        
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Board Meetings')
    ->where('real_file_name', 'Notices')
    ->get();
            $count = $entries->count();

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSize,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no file was uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}


    public function boradattendencesheet(Request $request)
{
       $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial', 'Meeting', 'Board', 'Notice'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Board Meetings')
    ->where('real_file_name', 'Attendance sheet')
    ->get();
            $count = $entries->count();

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSize,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    public function boradresolution(Request $request)
{
   $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial', 'Meeting', 'Board', 'Notice'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Board Meetings')
    ->where('real_file_name', 'Resolutions')
    ->get();
            $count = $entries->count();

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSize,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}
public function boradmintuebook(Request $request)
{
   $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial', 'Meeting', 'Board', 'Notice'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entriesMinbook = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Board Meetings')
    ->where('real_file_name', 'Minute Book')
    ->get();
            $count = $entriesMinbook->count(); // Count of entries
            $totalSizeBytesentriesMinbook = $entriesMinbook->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytesentriesMinbook / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    public function fetchBoardNoticeData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Board Meetings')
    ->where('real_file_name', 'Notices')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchBoardFileNoticeData()
{
    $user = auth()->user();
   $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Board Meetings')
    ->where('real_file_name', 'Notices')
    ->get();

   

    return response()->json(['files' => $files]);
}
public function deleteBoardNotice(Request $request)
{
    $file = CommonTable::find($request->unique_tb_id);
dd($file);
    if ($file) {
        $file->is_delete = 1;
        $file->save();

        // Set success message in session
        session()->flash('success', 'The record has been deleted.');

        return response()->json(['success' => true, 'message' => 'The record has been deleted.']);
    }

    // Set error message in session
    session()->flash('error', 'Failed to delete the record.');

    return response()->json(['success' => false, 'message' => 'Failed to delete the record.'], 404);
}


public function deleteBoardMinBook(Request $request)
{
    $file = CommonTable::find($request->unique_tb_id);

    if ($file) {
        $file->is_delete = 1;
        $file->save();

        // Set success message in session
        session()->flash('success', 'The record has been deleted.');

        return response()->json(['success' => true, 'message' => 'The record has been deleted.']);
    }

    // Set error message in session
    session()->flash('error', 'Failed to delete the record.');

    return response()->json(['success' => false, 'message' => 'Failed to delete the record.'], 404);
}


public function deleteBoardAs(Request $request)
{
    $file = CommonTable::find($request->unique_tb_id);

    if ($file) {
        $file->is_delete = 1;
        $file->save();

        // Set success message in session
        session()->flash('success', 'The record has been deleted.');

        return response()->json(['success' => true, 'message' => 'The record has been deleted.']);
    }

    // Set error message in session
    session()->flash('error', 'Failed to delete the record.');

    return response()->json(['success' => false, 'message' => 'Failed to delete the record.'], 404);
}


public function deleteBoardReso(Request $request)
{
    $file = CommonTable::find($request->unique_tb_id);

    if ($file) {
        $file->is_delete = 1;
        $file->save();

        // Set success message in session
        session()->flash('success', 'The record has been deleted.');

        return response()->json(['success' => true, 'message' => 'The record has been deleted.']);
    }

    // Set error message in session
    session()->flash('error', 'Failed to delete the record.');

    return response()->json(['success' => false, 'message' => 'Failed to delete the record.'], 404);
}
public function deleteBankAccStatment(Request $request)
{
    $file = CommonTable::find($request->id);

    if ($file) {
        $file->is_delete = 1;
        $file->save();

        // Set success message in session
        session()->flash('success', 'The record has been deleted.');

        return response()->json(['success' => true, 'message' => 'The record has been deleted.']);
    }

    // Set error message in session
    session()->flash('error', 'Failed to delete the record.');

    return response()->json(['success' => false, 'message' => 'Failed to delete the record.'], 404);
}

public function deleteMeetNotice(Request $request)
{
    $file = CommonTable::find($request->id);

    if ($file) {
        $file->is_delete = 1;
        $file->save();

        // Set success message in session
        session()->flash('success', 'The record has been deleted.');

        return response()->json(['success' => true, 'message' => 'The record has been deleted.']);
    }

    // Set error message in session
    session()->flash('error', 'Failed to delete the record.');

    return response()->json(['success' => false, 'message' => 'Failed to delete the record.'], 404);
}


public function deleteMeetMinBook(Request $request)
{
    $file = CommonTable::find($request->id);

    if ($file) {
        $file->is_delete = 1;
        $file->save();

        // Set success message in session
        session()->flash('success', 'The record has been deleted.');

        return response()->json(['success' => true, 'message' => 'The record has been deleted.']);
    }

    // Set error message in session
    session()->flash('error', 'Failed to delete the record.');

    return response()->json(['success' => false, 'message' => 'Failed to delete the record.'], 404);
}
public function deleteMeetAs(Request $request)
{
    $file = CommonTable::find($request->id);

    if ($file) {
        $file->is_delete = 1;
        $file->save();

        // Set success message in session
        session()->flash('success', 'The record has been deleted.');

        return response()->json(['success' => true, 'message' => 'The record has been deleted.']);
    }

    // Set error message in session
    session()->flash('error', 'Failed to delete the record.');

    return response()->json(['success' => false, 'message' => 'Failed to delete the record.'], 404);
}

public function deleteMeetReso(Request $request)
{
    $file = CommonTable::find($request->id);

    if ($file) {
        $file->is_delete = 1;
        $file->save();

        // Set success message in session
        session()->flash('success', 'The record has been deleted.');

        return response()->json(['success' => true, 'message' => 'The record has been deleted.']);
    }

    // Set error message in session
    session()->flash('error', 'Failed to delete the record.');

    return response()->json(['success' => false, 'message' => 'Failed to delete the record.'], 404);
}


public function deleteOrderNotice(Request $request)
{
    $file = CommonTable::find($request->id);

    if ($file) {
        $file->is_delete = 1;
        $file->save();

        // Set success message in session
        session()->flash('success', 'The record has been deleted.');

        return response()->json(['success' => true, 'message' => 'The record has been deleted.']);
    }

    // Set error message in session
    session()->flash('error', 'Failed to delete the record.');

    return response()->json(['success' => false, 'message' => 'Failed to delete the record.'], 404);
}


public function deleteOrderMinBook(Request $request)
{
    $file = CommonTable::find($request->id);

    if ($file) {
        $file->is_delete = 1;
        $file->save();

        // Set success message in session
        session()->flash('success', 'The record has been deleted.');

        return response()->json(['success' => true, 'message' => 'The record has been deleted.']);
    }

    // Set error message in session
    session()->flash('error', 'Failed to delete the record.');

    return response()->json(['success' => false, 'message' => 'Failed to delete the record.'], 404);
}

public function deleteOrderAttend(Request $request)
{
    $file = CommonTable::find($request->id);

    if ($file) {
        $file->is_delete = 1;
        $file->save();

        // Set success message in session
        session()->flash('success', 'The record has been deleted.');

        return response()->json(['success' => true, 'message' => 'The record has been deleted.']);
    }

    // Set error message in session
    session()->flash('error', 'Failed to delete the record.');

    return response()->json(['success' => false, 'message' => 'Failed to delete the record.'], 404);
}

public function deleteOrderReso(Request $request)
{
    $file = CommonTable::find($request->id);

    if ($file) {
        $file->is_delete = 1;
        $file->save();

        // Set success message in session
        session()->flash('success', 'The record has been deleted.');

        return response()->json(['success' => true, 'message' => 'The record has been deleted.']);
    }

    // Set error message in session
    session()->flash('error', 'Failed to delete the record.');

    return response()->json(['success' => false, 'message' => 'Failed to delete the record.'], 404);
}

public function innerruns(Request $request)
{
   $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entriesinnerrun = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'RUN Form')
    ->get();
            $count = $entriesinnerrun->count(); // Count of entries
            $totalSizeBytesentriesinnerrun = $entriesinnerrun->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytesentriesinnerrun / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    public function fetchInnerRunsData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'RUN Form')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
            
        ]);
}
public function fetchInnerFileRunsData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'RUN Form')
    ->get();
   

    return response()->json(['files' => $files]);
}
public function fetchBoardAttendencesheetData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Board Meetings')
    ->where('real_file_name', 'Attendance sheet')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchBoardFileAttendencesheetData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Board Meetings')
    ->where('real_file_name', 'Attendance sheet')
    ->get();
   

    return response()->json(['files' => $files]);
}




public function fetchBoardResolutionData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries =  CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Board Meetings')
    ->where('real_file_name', 'Resolutions')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchBoardFileResolutionData()
{
    $user = auth()->user();
    $files =  CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Board Meetings')
    ->where('real_file_name', 'Resolutions')
    ->get();
   

    return response()->json(['files' => $files]);
}

public function fetchBoardMinBookData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Board Meetings')
    ->where('real_file_name', 'Minute Book')
    ->get();

        // Calculate count and total size of files
        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchBoardFileMinBookData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Board Meetings')
    ->where('real_file_name', 'Minute Book')
    ->get();
   

    return response()->json(['files' => $files]);
}


 public function meetminutebook(Request $request)
{
 $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial', 'Meeting', 'AGM', 'Minute Book'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                        
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual General Meeting')
    ->where('real_file_name', 'Minute Book')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeBytes = $entries->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytes / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    public function fetchMeetMinBookData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual General Meeting')
    ->where('real_file_name', 'Minute Book')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchMeetFileMinBookData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual General Meeting')
    ->where('real_file_name', 'Minute Book')
    ->get();
   

    return response()->json(['files' => $files]);
}

public function meetas(Request $request)
{
   $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial', 'Meeting', 'AGM', 'Attendance sheet'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual General Meeting')
    ->where('real_file_name', 'Attendance sheet')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeBytes = $entries->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytes / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    public function fetchMeetASData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual General Meeting')
    ->where('real_file_name', 'Attendance sheet')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchMeetFileASData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual General Meeting')
    ->where('real_file_name', 'Attendance sheet')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function meetreso(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial', 'Meeting', 'AGM', 'Resolutions'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual General Meeting')
    ->where('real_file_name', 'Resolutions')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeBytes = $entries->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytes / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    public function fetchMeetRESOData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual General Meeting')
    ->where('real_file_name', 'Resolutions')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchMeetFileRESOData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual General Meeting')
    ->where('real_file_name', 'Resolutions')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function ordernotice(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial', 'Meeting', 'EGM', 'Notice'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entriesordernotice = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Extra Ordinary General Meeting')
    ->where('real_file_name', 'Notices')
    ->get();
            $count = $entriesordernotice->count(); // Count of entries
            $totalSizeBytesentriesordernotice = $entriesordernotice->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytesentriesordernotice / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    public function fetchOrderNoticeData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries =  CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Extra Ordinary General Meeting')
    ->where('real_file_name', 'Notices')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchOrderFileNoticeData()
{
    $user = auth()->user();
    $files =  CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Extra Ordinary General Meeting')
    ->where('real_file_name', 'Notices')
    ->get();
   

    return response()->json(['files' => $files]);
}

public function orderminbook(Request $request)
{
   $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial', 'Meeting', 'EGM', 'Minute Book'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entriesorderminbook = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Extra Ordinary General Meeting')
    ->where('real_file_name', 'Minute Book')
    ->get();
            $count = $entriesorderminbook->count(); // Count of entries
            $totalSizeBytesentriesorderminbook = $entriesorderminbook->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytesentriesorderminbook / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    public function fetchOrderMinBookData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Extra Ordinary General Meeting')
    ->where('real_file_name', 'Minute Book')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchOrderFileMinBookData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Extra Ordinary General Meeting')
    ->where('real_file_name', 'Minute Book')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function orderAttend(Request $request)
{
  $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial', 'Meeting', 'EGM', 'Attendance sheet'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);


            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entriesorderAttend = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Extra Ordinary General Meeting')
    ->where('real_file_name', 'Attendance sheet')
    ->get();
            $count = $entriesorderAttend->count(); // Count of entries
            $totalSizeBytesentriesorderAttend = $entriesorderAttend->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytesentriesorderAttend / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    public function fetchOrderAttendData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Extra Ordinary General Meeting')
    ->where('real_file_name', 'Attendance sheet')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchOrderFileAttendData()
{
    $user = auth()->user();
    $files =  CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Extra Ordinary General Meeting')
    ->where('real_file_name', 'Attendance sheet')
    ->get();
   

    return response()->json(['files' => $files]);
}

public function orderreso(Request $request)
{
   $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial', 'Meeting', 'EGM', 'Resolutions'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                        
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entriesorderreso = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Extra Ordinary General Meeting')
    ->where('real_file_name', 'Resolutions')
    ->get();
            $count = $entriesorderreso->count(); // Count of entries
            $totalSizeBytesentriesorderreso = $entriesorderreso->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytesentriesorderreso / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    public function fetchOrderRESOData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Extra Ordinary General Meeting')
    ->where('real_file_name', 'Resolutions')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchOrderFileRESOData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Extra Ordinary General Meeting')
    ->where('real_file_name', 'Resolutions')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function innerincnine(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entriesinc9 = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 9')
    ->get();
            $count = $entriesinc9->count(); // Count of entries
            $totalSizeBytesentriesinc9 = $entriesinc9->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytesentriesinc9 / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    public function fetchInnerINC9Data()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 9')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchInnerFile9Data()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 9')
    ->get();
   

    return response()->json(['files' => $files]);
}

public function innerspice(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entriesinnerspice = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'SPICe Part B')
    ->get();
            $count = $entriesinnerspice->count(); // Count of entries
            $totalSizeBytesentriesinnerspice = $entriesinnerspice->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytesentriesinnerspice / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    public function fetchInnerspiceData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'SPICe Part B')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchInnerFilespiceData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'SPICe Part B')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function innerINC33(Request $request)
{
  $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entriesinnerinc33 = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 33 SPICe MoA')
    ->get();
            $count = $entriesinnerinc33->count(); // Count of entries
            $totalSizeBytesentriesinnerinc33 = $entriesinnerinc33->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytesentriesinnerinc33 / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    public function fetchInnerINC33Data()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 33 SPICe MoA')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchInnerFileINC33Data()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 33 SPICe MoA')
    ->get();
   

    return response()->json(['files' => $files]);
}

public function innerINC34(Request $request)
{
   $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entriesinnerinc34 = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 34')
    ->get();
            $count = $entriesinnerinc34->count(); // Count of entries
            $totalSizeBytesentriesinnerinc34 = $entriesinnerinc34->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytesentriesinnerinc34 / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    public function fetchInnerINC34Data()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 34')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchInnerFileINC34Data()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 34')
    ->get();
   

    return response()->json(['files' => $files]);
}

public function innerINC35(Request $request)
{
   $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entriesinnerinc35 = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 35')
    ->get();
            $count = $entriesinnerinc35->count(); // Count of entries
            $totalSizeBytesentriesinnerinc35 = $entriesinnerinc35->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytesentriesinnerinc35 / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    public function fetchInnerINC35Data()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 35')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchInnerFileINC35Data()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 35')
    ->get();
   

    return response()->json(['files' => $files]);
}
public function innerINC22(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entriesinnerinc22 =CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 22')
    ->get();
            $count = $entriesinnerinc22->count(); // Count of entries
            $totalSizeBytesentriesinnerinc22 = $entriesinnerinc22->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytesentriesinnerinc22 / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    public function fetchInnerINC22Data()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 22')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchInnerFileINC22Data()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 22')
    ->get();
   

    return response()->json(['files' => $files]);
}

public function innerINC20A(Request $request)
{
   $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entriesinnerinc20a = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 20A')
    ->get();
            $count = $entriesinnerinc20a->count(); // Count of entries
            $totalSizeBytesentriesinnerinc20a = $entriesinnerinc20a->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytesentriesinnerinc20a / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    public function fetchInnerINC20AData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 20A')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchInnerFileINC20AData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 20A')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function annaoc4afs(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entriesafs = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual Filings')
    ->where('real_file_name', 'AoC 4 Annual Filing Statement Form')
    ->get();
            $count = $entriesafs->count(); // Count of entries
            $totalSizeBytesentriesafs = $entriesafs->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytesentriesafs / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    public function fetchAnnAoc4AfsAData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual Filings')
    ->where('real_file_name', 'AoC 4 Annual Filing Statement Form')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchAnnFileAoc4AfsData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual Filings')
    ->where('real_file_name', 'AoC 4 Annual Filing Statement Form')
    ->get();
   

    return response()->json(['files' => $files]);
}

public function annaoc4Cfs(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entriescfs = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual Filings')
    ->where('real_file_name', 'AoC 4 CFS')
    ->get();
            $count = $entriescfs->count(); // Count of entries
            $totalSizeBytesentriescfs = $entriescfs->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytesentriescfs / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    public function fetchAnnAoc4CfsAData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual Filings')
    ->where('real_file_name', 'AoC 4 CFS')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchAnnFileAoc4CfsData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual Filings')
    ->where('real_file_name', 'AoC 4 CFS')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function annmgt7(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entriesmgt7 = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual Filings')
    ->where('real_file_name', 'MGT 7')
    ->get();
            $count = $entriesmgt7->count(); // Count of entries
            $totalSizeBytesentriesmgt7 = $entriesmgt7->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytesentriesmgt7 / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    public function fetchAnnmgt7Data()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual Filings')
    ->where('real_file_name', 'MGT 7')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchAnnFilemgt7Data()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual Filings')
    ->where('real_file_name', 'MGT 7')
    ->get();
   

    return response()->json(['files' => $files]);
}

public function annmgt7a(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entriesmgt7a = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual Filings')
    ->where('real_file_name', 'MGT 7A')
    ->get();
            $count = $entriesmgt7a->count(); // Count of entries
            $totalSizeBytesentriesmgt7a = $entriesmgt7a->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytesentriesmgt7a / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    public function fetchAnnmgt7aData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual Filings')
    ->where('real_file_name', 'MGT 7A')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchAnnFilemgt7aData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual Filings')
    ->where('real_file_name', 'MGT 7A')
    ->get();
   

    return response()->json(['files' => $files]);
}
public function checkFiles()
{
   $userId = Auth::id();

   
    $files = BoardNotice::where('user_id', $userId)->get();
    return response()->json($files);
}

// public function boradminutebook(Request $request)
// {
//     $request->validate([
//         'file' => 'required|mimes:pdf,doc,docx|max:102400', 
        
//     ]);
//     if ($request->hasFile('file')) {
//         try {
//             $file = $request->file('file');
//             $filePath = $file->store('uploads');

//             BoardMinuteBook::create([
//                 'file_type' => $file->getClientMimeType(),
//                 'file_name' => $file->getClientOriginalName(),
//                 'real_file_name' => $request->input('real_file_name'),
//                 'file_size' => $file->getSize(),
//                 'file_path' => $filePath,
//                 'user_name' => auth()->user()->name, // Assuming user is authenticated
//                 'user_id' => auth()->user()->id,
//                 'file_status' => $request->input('file_status', 0),
//                 'fyear' => $request->input('fyear'),
//                 'Month' => $request->input('Month'),
//                 'Tags' => $request->input('Tags'),
//             ]);

//             // Return a JSON response indicating success
//           return response()->json(['success' => true, 'message' => 'File uploaded successfully.']);

//         } catch (\Exception $e) {
//             // Handle any exceptions that occur during file upload or database saving
//             return response()->json(['success' => false, 'message' => 'Failed to save file details to database.'], 500);
//         }
//     } else {
//         // Return a JSON response indicating no file was uploaded
//         return response()->json(['error' => 'No file uploaded.'], 400);
//     }
// }


public function meetnotice(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial', 'Meeting', 'AGM', 'Notices'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual General Meeting')
    ->where('real_file_name', 'Notices')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeBytes = $entries->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytes / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    public function fetchMeetNoticeData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual General Meeting')
    ->where('real_file_name', 'Notices')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchMeetFileNoticeData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual General Meeting')
    ->where('real_file_name', 'Notices')
    ->get();
   

    return response()->json(['files' => $files]);
}

public function bankaccountstatement(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Accounting','Book-keeping','Bank/ Cash'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
   ->where('location', 'LIKE', '%Bank Account Statements%')
        ->where('real_file_name', 'Bank account statement')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchBankAccsData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Bank Account Statements%')
        ->where('real_file_name', 'Bank account statement')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchBankFileAccsData()
{
    $user = auth()->user();
    
    // Get the query without executing it
    $query = CommonTable::where('user_id', $user->id)
        ->where('is_delete', 0)
       ->where('location', 'LIKE', '%Bank Account Statements%')
        ->where('real_file_name', 'Bank account statement');

   
    $files = $query->get();
    // dd($files);
    return response()->json(['files' => $files]);
}




public function directorappointmentsdir3(Request $request)
{
   $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Appointments')
    ->where('real_file_name', 'DIR 3 KYC')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeBytes = $entries->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytes / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchdirectorappointmentsdir3Data()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Appointments')
    ->where('real_file_name', 'DIR 3 KYC')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchdirectorappointmentsdir3FileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Appointments')
    ->where('real_file_name', 'DIR 3 KYC')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function directorappointmentsdir3din(Request $request)
{
   $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Appointments')
    ->where('real_file_name', 'DIR-3 form/ DIN number')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeBytes = $entries->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytes / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

     public function fetchdirectorappointmentsdir3dinData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Appointments')
    ->where('real_file_name', 'DIR-3 form/ DIN number')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchdirectorappointmentsdir3dinFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Appointments')
    ->where('real_file_name', 'DIR-3 form/ DIN number')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function directorappointmentsdir6(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Appointments')
    ->where('real_file_name', 'DIR 6 form')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeBytes = $entries->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytes / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchdirectorappointmentsdir6Data()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Appointments')
    ->where('real_file_name', 'DIR 6 form')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchdirectorappointmentsdir6FileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Appointments')
    ->where('real_file_name', 'DIR 6 form')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function directorappointmentsdir12(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Accounting','Book-keeping','Bank/ Cash'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Appointments')
    ->where('real_file_name', 'DIR 12 form')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeBytes = $entries->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytes / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchdirectorappointmentsdir12Data()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Appointments')
    ->where('real_file_name', 'DIR 12 form')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchdirectorappointmentsdir12FileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Appointments')
    ->where('real_file_name', 'DIR 12 form')
    ->get();
   

    return response()->json(['files' => $files]);
}



public function creditcardstatement(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Accounting','Book-keeping','Bank/ Cash'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
   ->where('location', 'LIKE', '%Credit Card Statement%')
        ->where('real_file_name', 'Add Credit Card Statements')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchcreditcardstatementData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Credit Card Statement%')
        ->where('real_file_name', 'Add Credit Card Statements')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchcreditcardstatementFileData(Request $request)
{
    $user = auth()->user();
    $selectedBank = $request->input('bank'); // Get the selected bank from the request

    // Fetch files based on the selected bank
    $files = CommonTable::where('user_id', $user->id)
        ->where('is_delete', 0)
        ->where('location', 'LIKE', '%Credit Card Statement%')
        ->where('real_file_name', 'Add Credit Card Statements')
        ->when($selectedBank, function ($query) use ($selectedBank) {
            return $query->where('bank_name', $selectedBank); // Assuming you have a 'bank_name' column
        })
        ->get();

    return response()->json(['files' => $files]);
}



public function mutualfundstatement(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Accounting','Book-keeping','Invoices'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Mutual Fund Statements%')
    ->where('real_file_name', 'Add Mutual Fund Statements')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}
 
    
     public function fetchmutualfundstatementData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Mutual Fund Statements%')
    ->where('real_file_name', 'Add Mutual Fund Statements')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchmutualfundstatementFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Mutual Fund Statements%')
    ->where('real_file_name', 'Add Mutual Fund Statements')
    ->get();
   

    return response()->json(['files' => $files]);
}



public function fixeddepoiststatement(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Accounting','Book-keeping','Bank/ Cash'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Fixed Deposit Statements%')
    ->where('real_file_name', 'Fixed Deposit Account Statement')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchfixeddepoiststatementData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Fixed Deposit Statements%')
    ->where('real_file_name', 'Fixed Deposit Account Statement')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchfixeddepoiststatementFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Fixed Deposit Statements%')
    ->where('real_file_name', 'Fixed Deposit Account Statement')
    ->get();
   

    return response()->json(['files' => $files]);
}



public function directorresignationdir11(Request $request)
{
   $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Resignation')
    ->where('real_file_name', 'DIR 11 form')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeBytes = $entries->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytes / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchdirectorresignationdir11Data()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Resignation')
    ->where('real_file_name', 'DIR 11 form')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchdirectorresignationdir11FileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Resignation')
    ->where('real_file_name', 'DIR 11 form')
    ->get();
   

    return response()->json(['files' => $files]);
}




public function directorresignationdir12(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Resignation')
    ->where('real_file_name', 'DIR 12 form')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeBytes = $entries->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytes / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchdirectorresignationdir12Data()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Resignation')
    ->where('real_file_name', 'DIR 12 form')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchdirectorresignationdir12FileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Resignation')
    ->where('real_file_name', 'DIR 12 form')
    ->get();
   

    return response()->json(['files' => $files]);
}





public function depositundertakingsFormDPT3(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Deposit Undertakings')
    ->where('real_file_name', 'Form DPT 3')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeBytes = $entries->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytes / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchdepositundertakingsFormDPT3Data()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Deposit Undertakings')
    ->where('real_file_name', 'Form DPT 3')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchdepositundertakingsFormDPT3FileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Deposit Undertakings')
    ->where('real_file_name', 'Form DPT 3')
    ->get();
   

    return response()->json(['files' => $files]);
}



public function AuditorExitsADT3Form(Request $request)
{
   $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Exits')
    ->where('real_file_name', 'ADT 3 form')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeBytes = $entries->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytes / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchAuditorExitsADT3FormData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Exits')
    ->where('real_file_name', 'ADT 3 form')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchAuditorExitsADT3FormFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Exits')
    ->where('real_file_name', 'ADT 3 form')
    ->get();
   

    return response()->json(['files' => $files]);
}



public function AuditorExitsResignletteraudF(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Exits')
    ->where('real_file_name', 'Resignation letter by auditor')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeBytes = $entries->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytes / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchAuditorExitsResignletteraudFData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Exits')
    ->where('real_file_name', 'Resignation letter by auditor')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchAuditorExitsResignletteraudFFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Exits')
    ->where('real_file_name', 'Resignation letter by auditor')
    ->get();
   

    return response()->json(['files' => $files]);
}



public function AuditorExitsResignDetofgroundsseekremaudF(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Exits')
    ->where('real_file_name', 'Details of the grounds for seeking removal of auditor')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeBytes = $entries->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytes / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchAuditorExitsResignDetofgroundsseekremaudFData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Exits')
    ->where('real_file_name', 'Details of the grounds for seeking removal of auditor')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchAuditorExitsResignDetofgroundsseekremaudFFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Exits')
    ->where('real_file_name', 'Details of the grounds for seeking removal of auditor')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function AuditorExitsSpecialResolF(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Exits')
    ->where('real_file_name', 'Special Resolution')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeBytes = $entries->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytes / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchAuditorExitsSpecialResolFData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Exits')
    ->where('real_file_name', 'Special Resolution')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchAuditorExitsSpecialResolFFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Exits')
    ->where('real_file_name', 'Special Resolution')
    ->get();
   

    return response()->json(['files' => $files]);
}



public function AuditorExitsADT2Form(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Exits')
    ->where('real_file_name', 'ADT 2')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeBytes = $entries->sum('file_size'); // Sum of file sizes
            $totalSizeKB = round($totalSizeBytes / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchAuditorExitsADT2FormData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Exits')
    ->where('real_file_name', 'ADT 2')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchAuditorExitsADT2FormFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Exits')
    ->where('real_file_name', 'ADT 2')
    ->get();
   

    return response()->json(['files' => $files]);
}



public function Director1AadharKYCF(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Incorporation','Director'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'Aadhar KYC')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchDirector1AadharKYCFData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'Aadhar KYC')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchDirector1AadharKYCFFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'Aadhar KYC')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function Director1AddressProofF(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Incorporation','Director'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'Address Proof')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchDirector1AddressProofFData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'Address Proof')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchDirector1AddressProofFFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
   ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'Address Proof')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function Director1ContactDetailsF(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Incorporation','Director'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'Contact Details')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchDirector1ContactDetailsFData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'Contact Details')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchDirector1ContactDetailsFFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'Contact Details')
    ->get();
   

    return response()->json(['files' => $files]);
}



public function Director1PANKYCF(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Incorporation','Director'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'PAN KYC')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchDirector1PANKYCFData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'PAN KYC')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchDirector1PANKYCFFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'PAN KYC')
    ->get();
   

    return response()->json(['files' => $files]);
}



public function Director1PhotoF(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);
    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Incorporation','Director'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'Photo')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchDirector1PhotoFData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'Photo')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchDirector1PhotoFFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'Photo')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function Director1SignimgF(Request $request)
{
   $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Incorporation','Director'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'Signature image')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchDirector1SignimgFData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'Signature image')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchDirector1SignimgFFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'Signature image')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function Director2SignimgF(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);
    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Incorporation','Director'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'Signature image')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchDirector2SignimgFData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'Signature image')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchDirector2SignimgFFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'Signature image')
    ->get();
   

    return response()->json(['files' => $files]);
}



public function Director2PhotoF(Request $request)
{
   $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Incorporation','Director'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'Photo')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchDirector2PhotoFData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'Photo')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchDirector2PhotoFFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
   ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'Photo')
    ->get();
   

    return response()->json(['files' => $files]);
}



public function Director2PANKYCF(Request $request)
{
   $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Incorporation','Director'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'PAN KYC')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchDirector2PANKYCFData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    
    ->where('real_file_name', 'PAN KYC')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchDirector2PANKYCFFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'PAN KYC')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function Director2ContactDetailsF(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Incorporation','Director'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
   ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'Contact Details')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchDirector2ContactDetailsFData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
   ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'Contact Details')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchDirector2ContactDetailsFFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
   ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'Contact Details')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function Director2AddressProofF(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Incorporation','Director'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
   ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'Address Proof')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchDirector2AddressProofFData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'Address Proof')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchDirector2AddressProofFFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'Address Proof')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function Director2AadharKYCF(Request $request)
{
   $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Incorporation','Director'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'Aadhar KYC')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchDirector2AadharKYCFData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'Aadhar KYC')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchDirector2AadharKYCFFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'Aadhar KYC')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function IncorporationArtofAssocF(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Company Rules','Articles', 'Association', 'Incorporation'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
   ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'Articles of Association')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchIncorporationArtofAssocFData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'Articles of Association')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchIncorporationArtofAssocFFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'Articles of Association')
    ->get();
   

    return response()->json(['files' => $files]);
}

public function IncorporationCertifofincorpF(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Company Rules', 'COI','DOI', 'Incorporation Certificate', 'Incorporation'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Charter documents / Incorporation')
    ->where('real_file_name', 'Certificate of incorporation')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchIncorporationCertifofincorpFData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Charter documents / Incorporation')
    ->where('real_file_name', 'Certificate of incorporation')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchIncorporationCertifofincorpFFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Charter documents / Incorporation')
    ->where('real_file_name', 'Certificate of incorporation')
    ->get();
   

    return response()->json(['files' => $files]);
}




public function CharterdocumentsIncorporationMemorandumofAssociation(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Company Rules', 'MOA','Memorandum', 'Association', 'Incorporation'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries =  CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
   ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'Memorandum of Association')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchCharterdocumentsIncorporationMemorandumofAssociationData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
   ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'Memorandum of Association')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchCharterdocumentsIncorporationMemorandumofAssociationFileData()
{
    $user = auth()->user();
    $files =CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'Memorandum of Association')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function IncorporationPartnerdeedF(Request $request)
{
   $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Company Rules','SSHA','SSA', 'COI', 'Incorporation','Incorporation Certificate','Partnership Deed','LLP Agreement'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'Partnership deed')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchIncorporationPartnerdeedFData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'Partnership deed')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchIncorporationPartnerdeedFFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
   ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'Partnership deed')
    ->get();
   

    return response()->json(['files' => $files]);
}



public function IncorporationLLPAgreementF(Request $request)
{
   $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Company Rules','SSHA','SSA','COI', 'Incorporation','Incorporation Certificate', 'Partnership Deed','LLP Agreement'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'LLP Agreement')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchIncorporationLLPAgreementFData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
   ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'LLP Agreement')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchIncorporationLLPAgreementFFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'LLP Agreement')
    ->get();
   

    return response()->json(['files' => $files]);
}



public function IncorporationTrustDeedF(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Company Rules','SSHA','SSA','COI', 'Incorporation','Incorporation Certificate', 'Trust Deed','LLP Agreement'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'Trust Deed')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchIncorporationTrustDeedFData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'Trust Deed')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchIncorporationTrustDeedFFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'Trust Deed')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function IncorporationSharecertifF(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Shares','SH-1', 'SSHA','SSA'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'Share certificates')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

    
     public function fetchIncorporationSharecertifFData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
   ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'Share certificates')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchIncorporationSharecertifFFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'Share certificates')
    ->get();
   

    return response()->json(['files' => $files]);
}

// latest path function added by raman

public function CharterdocumentsRegistrationsPAN(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Registrations','PAN','Tax'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);


            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'PAN certificate')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}
 
    
     public function fetchCharterdocumentsRegistrationsPANData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'PAN certificate')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchCharterdocumentsRegistrationsPANFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
   ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'PAN certificate')
    ->get();
   

    return response()->json(['files' => $files]);
}



public function CharterdocumentsRegistrationsTAN(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
             // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Registrations','TAN','Direct Tax','Tax'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'TAN certificate')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}
 
    
     public function fetchCharterdocumentsRegistrationsTANData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'TAN certificate')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchCharterdocumentsRegistrationsTANFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'TAN certificate')
    ->get();
   

    return response()->json(['files' => $files]);
}





public function CharterdocumentsRegistrationsGSTIN(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Registrations','GST','Indirect Tax','TAX'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'GSTIN certificate')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}
 
    
     public function fetchCharterdocumentsRegistrationsGSTINData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'GSTIN certificate')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchCharterdocumentsRegistrationsGSTINFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'GSTIN certificate')
    ->get();
   

    return response()->json(['files' => $files]);
}



public function CharterdocumentsRegistrationsMSME(Request $request)
{
   $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Registrations','Articles', 'Association', 'MSME'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'MSME certificate')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}
 
    
     public function fetchCharterdocumentsRegistrationsMSMEData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'MSME certificate')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchCharterdocumentsRegistrationsMSMEFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'MSME certificate')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function CharterdocumentsRegistrationsTrademark(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Registrations','Trademark'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'Trademark')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}
 
    
     public function fetchCharterdocumentsRegistrationsTrademarkData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'Trademark')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchCharterdocumentsRegistrationsTrademarkFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'Trademark')
    ->get();
   

    return response()->json(['files' => $files]);
}



public function CharterdocumentsRegistrationsPFC(Request $request)
{
   $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Registrations','Labour Laws','Provident Fund','Tax'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'Provident Fund certificate')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}
 
    
     public function fetchCharterdocumentsRegistrationsPFCData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'Provident Fund certificate')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchCharterdocumentsRegistrationsPFCFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'Provident Fund certificate')
    ->get();
   

    return response()->json(['files' => $files]);
}




public function CharterdocumentsRegistrationsESIC(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Registrations','Labour Laws','Employee State Insurance','Tax'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'Employee State Insurance certificate')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}
 
    
     public function fetchCharterdocumentsRegistrationsESICData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'Employee State Insurance certificate')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchCharterdocumentsRegistrationsESICFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'Employee State Insurance certificate')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function CharterdocumentsRegistrationsPTC(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Registrations','Labour Laws','Professional Tax','Tax'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'Professional Tax certificate')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}
 
    
     public function fetchCharterdocumentsRegistrationsPTCData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'Professional Tax certificate')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchCharterdocumentsRegistrationsPTCDataFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'Professional Tax certificate')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function CharterdocumentsRegistrationsLWFC(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Registrations','Labour Laws','Labour Welfare Fund','Tax'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'Labour Welfare Fund certificate')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}
 
    
     public function fetchCharterdocumentsRegistrationsLWFCData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'Labour Welfare Fund certificate')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchCharterdocumentsRegistrationsLWFCFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'Labour Welfare Fund certificate')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function CharterdocumentsRegistrationsPOSHPolicy(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Charter','Registrations','Labour Laws','POSH','Tax'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'POSH Policy')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}
 
    
     public function fetchCharterdocumentsRegistrationsPOSHPolicyData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'POSH Policy')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchCharterdocumentsRegistrationsPOSHPolicyFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'POSH Policy')
    ->get();
   

    return response()->json(['files' => $files]);
}


// path end 



// latest path funtion  added by raman 16 aug


public function SecretarialAuditorAppointmentBRAA(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);
    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Board Resolution for the appointment of Auditor')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}
 
    
     public function fetchSecretarialAuditorAppointmentBRAAData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Board Resolution for the appointment of Auditor')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchSecretarialAuditorAppointmentBRAAFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Board Resolution for the appointment of Auditor')
    ->get();
   

    return response()->json(['files' => $files]);
}



public function SecretarialAuditorAppointmentIA(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Intimation to auditor')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}
 
    
     public function fetchSecretarialAuditorAppointmentIAData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Intimation to auditor')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchSecretarialAuditorAppointmentIAFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Intimation to auditor')
    ->get();
   

    return response()->json(['files' => $files]);
}





public function SecretarialAuditorAppointmentLA(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Letter of appointment')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}
 
    
     public function fetchSecretarialAuditorAppointmentLAData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Letter of appointment')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchSecretarialAuditorAppointmentLAFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Letter of appointment')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function SecretarialAuditorAppointmentCRCAA(Request $request)
{
   $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Certificate as per Rule 4 and consent by Auditor for his appointment')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}
 
    
     public function fetchSecretarialAuditorAppointmentCRCAAData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Certificate as per Rule 4 and consent by Auditor for his appointment')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchSecretarialAuditorAppointmentCRCAAFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Certificate as per Rule 4 and consent by Auditor for his appointment')
    ->get();
   

    return response()->json(['files' => $files]);
}

public function SecretarialAuditorAppointmentALA(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Acceptance letter for appointment')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}
 
    
     public function fetchSecretarialAuditorAppointmentALAData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Acceptance letter for appointment')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchSecretarialAuditorAppointmentALAFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Acceptance letter for appointment')
    ->get();
   

    return response()->json(['files' => $files]);
}


public function SecretarialAuditorAppointmentSR(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters and message arrays
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = [];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'bank_name' => $request->input('bank_name'),
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Special Resolution')
    ->get();
            $count = $entries->count(); // Count of entries
            $totalSizeKB = round($totalSize / 1024, 2); // Convert to KB and round

            return response()->json([
                'success' => true,
                'count' => $count,
                'totalSize' => $totalSizeKB,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}
 
    
     public function fetchSecretarialAuditorAppointmentSRData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Special Resolution')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchSecretarialAuditorAppointmentSRFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Special Resolution')
    ->get();
   

    return response()->json(['files' => $files]);
}



public function SecretarialStatutoryRegistersRM(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                        
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Members')
    ->get();
            $count = $entries->count();
            
            return redirect()->back()->with('success2', 'File Uploaded successfully.');

            // return response()->json([
            //     'success' => true,
            //     'count' => $count,
            //     'totalSize' => $totalSize,
            //     'successMessages' => $successMessages,
            //     'errorMessages' => $errorMessages,
            // ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no file was uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

public function SecretarialStatutoryRegistersROSH(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                        
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Other Security Holders')
    ->get();
            $count = $entries->count();
            
            return redirect()->back()->with('success2', 'File Uploaded successfully.');

            // return response()->json([
            //     'success' => true,
            //     'count' => $count,
            //     'totalSize' => $totalSize,
            //     'successMessages' => $successMessages,
            //     'errorMessages' => $errorMessages,
            // ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no file was uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

public function SecretarialStatutoryRegistersFR(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                        
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', '⁠Foreign Register')
    ->get();
            $count = $entries->count();
            
            return redirect()->back()->with('success2', 'File Uploaded successfully.');

            // return response()->json([
            //     'success' => true,
            //     'count' => $count,
            //     'totalSize' => $totalSize,
            //     'successMessages' => $successMessages,
            //     'errorMessages' => $errorMessages,
            // ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no file was uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}


public function SecretarialStatutoryRegistersRDK(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                        
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Directors and KMP')
    ->get();
            $count = $entries->count();
            
            return redirect()->back()->with('success2', 'File Uploaded successfully.');

            // return response()->json([
            //     'success' => true,
            //     'count' => $count,
            //     'totalSize' => $totalSize,
            //     'successMessages' => $successMessages,
            //     'errorMessages' => $errorMessages,
            // ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no file was uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}


public function SecretarialStatutoryRegistersRC(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                        
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', '⁠Register of Charges')
    ->get();
            $count = $entries->count();
            
            return redirect()->back()->with('success2', 'File Uploaded successfully.');

            // return response()->json([
            //     'success' => true,
            //     'count' => $count,
            //     'totalSize' => $totalSize,
            //     'successMessages' => $successMessages,
            //     'errorMessages' => $errorMessages,
            // ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no file was uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

public function SecretarialStatutoryRegistersRD(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                        
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Deposits')
    ->get();
            $count = $entries->count();
            
            return redirect()->back()->with('success2', 'File Uploaded successfully.');

            // return response()->json([
            //     'success' => true,
            //     'count' => $count,
            //     'totalSize' => $totalSize,
            //     'successMessages' => $successMessages,
            //     'errorMessages' => $errorMessages,
            // ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no file was uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

public function SecretarialStatutoryRegistersRLGS(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                        
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Loans, Guarantees and Securities')
    ->get();
            $count = $entries->count();
            
            return redirect()->back()->with('success2', 'File Uploaded successfully.');

            // return response()->json([
            //     'success' => true,
            //     'count' => $count,
            //     'totalSize' => $totalSize,
            //     'successMessages' => $successMessages,
            //     'errorMessages' => $errorMessages,
            // ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no file was uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

public function SecretarialStatutoryRegistersRCD(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                        
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Investments not held in Company’s name')
    ->get();
            $count = $entries->count();
            
            return redirect()->back()->with('success2', 'File Uploaded successfully.');

            // return response()->json([
            //     'success' => true,
            //     'count' => $count,
            //     'totalSize' => $totalSize,
            //     'successMessages' => $successMessages,
            //     'errorMessages' => $errorMessages,
            // ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no file was uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

public function SecretarialStatutoryRegistersRCDI(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                        
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Contracts in which Directors are interested')
    ->get();
            $count = $entries->count();
            
            return redirect()->back()->with('success2', 'File Uploaded successfully.');

            // return response()->json([
            //     'success' => true,
            //     'count' => $count,
            //     'totalSize' => $totalSize,
            //     'successMessages' => $successMessages,
            //     'errorMessages' => $errorMessages,
            // ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no file was uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

public function SecretarialStatutoryRegistersRSES(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                        
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Sweat Equity Shares')
    ->get();
            $count = $entries->count();
            
            return redirect()->back()->with('success2', 'File Uploaded successfully.');

            // return response()->json([
            //     'success' => true,
            //     'count' => $count,
            //     'totalSize' => $totalSize,
            //     'successMessages' => $successMessages,
            //     'errorMessages' => $errorMessages,
            // ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no file was uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

public function SecretarialStatutoryRegistersRESO(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                        
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Employee Stock Options')
    ->get();
            $count = $entries->count();
            
            return redirect()->back()->with('success2', 'File Uploaded successfully.');

            // return response()->json([
            //     'success' => true,
            //     'count' => $count,
            //     'totalSize' => $totalSize,
            //     'successMessages' => $successMessages,
            //     'errorMessages' => $errorMessages,
            // ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no file was uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

public function SecretarialStatutoryRegistersRSBB(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                        
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Securities Bought Back')
    ->get();
            $count = $entries->count();
            
            return redirect()->back()->with('success2', 'File Uploaded successfully.');

            // return response()->json([
            //     'success' => true,
            //     'count' => $count,
            //     'totalSize' => $totalSize,
            //     'successMessages' => $successMessages,
            //     'errorMessages' => $errorMessages,
            // ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no file was uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}


public function SecretarialStatutoryRegistersRRDSC(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                        
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Renewed or Duplicate Share Certificates')
    ->get();
            $count = $entries->count();
            
            return redirect()->back()->with('success2', 'File Uploaded successfully.');

            // return response()->json([
            //     'success' => true,
            //     'count' => $count,
            //     'totalSize' => $totalSize,
            //     'successMessages' => $successMessages,
            //     'errorMessages' => $errorMessages,
            // ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no file was uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}


public function SecretarialStatutoryRegistersSBO(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                        
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of SBO')
    ->get();
            $count = $entries->count();
            
            return redirect()->back()->with('success2', 'File Uploaded successfully.');

            // return response()->json([
            //     'success' => true,
            //     'count' => $count,
            //     'totalSize' => $totalSize,
            //     'successMessages' => $successMessages,
            //     'errorMessages' => $errorMessages,
            // ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no file was uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}


public function SecretarialStatutoryRegistersRPB(Request $request)
{
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    if ($request->hasFile('files')) {
        try {
            // Initialize counters
            $totalSize = 0;

            // Store success and error messages for individual files
            $successMessages = [];
            $errorMessages = [];
            
            // 22 August code added by sandeep ---- default tags added -- reference excel sheet shared by sir;
                    // Default tags
                    $tag_list = ['Secretarial'];

                    // Handle tagList whether it's an array, a comma-separated string, or empty
                    $userTags = $request->input('tagList', []);
                    
                    // Convert to array if it's a comma-separated string
                    if (is_string($userTags)) {
                        $userTags = explode(',', $userTags);
                    }
                    // Ensure $userTags is an array and remove any empty values
                    if (is_array($userTags)) {
                        $userTags = array_filter($userTags); // Remove empty values
                    } else {
                        $userTags = []; // Fallback to empty array if not an array
                    }
                    
                    // Merge with default tags
                    $tag_list = array_merge($tag_list, $userTags);
                    $tags = empty($tag_list) ? NULL : json_encode($tag_list);

            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Create a new entry for each file
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'real_file_name' => $request->input('real_file_name'),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name, // Assuming user is authenticated
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'tags' => $tags, // Store tags as JSON
                        'location' => $request->input('location'),
                        'descp' => $request->input('desc'),
                        
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to database.";
                }
            }

            // Compile overall success message
            $user = auth()->user();
            $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Postal Ballot')
    ->get();
            $count = $entries->count();
            
            return redirect()->back()->with('success2', 'File Uploaded successfully.');

            // return response()->json([
            //     'success' => true,
            //     'count' => $count,
            //     'totalSize' => $totalSize,
            //     'successMessages' => $successMessages,
            //     'errorMessages' => $errorMessages,
            // ]);

        } catch (\Exception $e) {
            // Handle any exceptions that occur during file upload or database saving
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // Return a JSON response indicating no file was uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}

public function fetchSecretarialStatutoryRegistersROSHFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Other Security Holders')
    ->get();
   
    return response()->json(['files' => $files]);
}

public function fetchSecretarialStatutoryRegistersFRFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', '⁠Foreign Register')
    ->get();
   
    return response()->json(['files' => $files]);
}

public function fetchSecretarialStatutoryRegistersRDKFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Directors and KMP')
    ->get();
   
    return response()->json(['files' => $files]);
}

public function fetchSecretarialStatutoryRegistersRCFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', '⁠Register of Charges')
    ->get();
   
    return response()->json(['files' => $files]);
}

public function fetchSecretarialStatutoryRegistersRDFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Deposits')
    ->get();
   
    return response()->json(['files' => $files]);
}

public function fetchSecretarialStatutoryRegistersRLGSFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Loans, Guarantees and Securities')
    ->get();
   
    return response()->json(['files' => $files]);
}

public function fetchSecretarialStatutoryRegistersRCDFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Investments not held in Company’s name')
    ->get();
   
    return response()->json(['files' => $files]);
}

public function fetchSecretarialStatutoryRegistersRCDIFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', '⁠Register of Contracts in which Directors are interested')
    ->get();
   
    return response()->json(['files' => $files]);
}

public function fetchSecretarialStatutoryRegistersRSESFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Sweat Equity Shares')
    ->get();
   
    return response()->json(['files' => $files]);
}

public function fetchSecretarialStatutoryRegistersRESOFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Employee Stock Options')
    ->get();
   
    return response()->json(['files' => $files]);
}

public function fetchSecretarialStatutoryRegistersRSBBFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Securities Bought Back')
    ->get();
   
    return response()->json(['files' => $files]);
}

public function fetchSecretarialStatutoryRegistersRRDSCFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Renewed or Duplicate Share Certificates')
    ->get();
   
    return response()->json(['files' => $files]);
}


public function fetchSecretarialStatutoryRegistersSBOFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of SBO')
    ->get();
   
    return response()->json(['files' => $files]);
}

public function fetchSecretarialStatutoryRegistersRPBFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Postal Ballot')
    ->get();
   
    return response()->json(['files' => $files]);
}
 
    
 public function fetchSecretarialStatutoryRegistersRMData()
{
    $user = Auth::user(); // Retrieve authenticated user

        // Fetch entries for the authenticated user
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Members')
    ->get();

        // Calculate count and total size of files
        $count = $entries->count();
        $totalSize = $entries->sum('file_size');

        // Return JSON response
        return response()->json([
            'count' => $count,
            'totalSize' => $totalSize,
        ]);
}
public function fetchSecretarialStatutoryRegistersRMFileData()
{
    $user = auth()->user();
    $files = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Members')
    ->get();
   

    return response()->json(['files' => $files]);
}


// path end 

public function checkFilesboradminutebook()
{
   $userId = Auth::id();

   
    $files = CommonTable::where('user_id', $userId)->get();
    return response()->json($files);
}
   public function updateuserprofile(Request $request)
{
    // Validate the input data (optional but recommended)
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'profile_picture' => 'nullable|image|max:2048', // Ensure it's an image and within size limit
    ]);

    $userId = $request->input('user_id');
    $profileImage = $request->file('profile_picture');

    // Find the user by ID
    $user = User::find($userId);
    if ($user) {
        // If a profile image is uploaded, store it and update the user's profile picture
        if ($profileImage) {
            $fileName = time() . '_' . $profileImage->getClientOriginalName();
            $profileImage->move(public_path('uploads/profile_images'), $fileName);
            $user->profile_picture = 'uploads/profile_images/' . $fileName;
        }

        // Update other user fields
        $user->name_of_the_business = $request->input('name_of_the_business');
        $user->designation = $request->input('designation');
        $user->user_status = $request->input('user_status');
        $user->other_designation = $request->input('other_designation');
        $user->employees = $request->input('employees');
        $user->industry = $request->input('industry');
        $user->other_industry = $request->input('other_industry');
        $user->legal_entity = $request->input('legal_entity');
        $user->other_legal_entity = $request->input('other_legal_entity');
        $user->phone = $request->input('phone');
        $user->phoneone = $request->input('phoneone');
        $user->backupemail = $request->input('backupemail');
        $user->dece = $request->input('dece');
        
        $user->save(); // Save the updated user data
    }

    // Find the user info associated with the user
    $userInfo = UserInfo::where('user_id', $userId)->first();
    if ($userInfo) {
        // If a profile image is uploaded, update the profile picture in user info
        if ($profileImage) {
            $userInfo->profile_picture = 'uploads/profile_images/' . $fileName;
        }

        // Update other fields in the user info
        $userInfo->name_of_the_business = $request->input('name_of_the_business');
        $userInfo->designation = $request->input('designation');
        $userInfo->user_status = $request->input('user_status');
        $userInfo->other_designation = $request->input('other_designation');
        $userInfo->employees = $request->input('employees');
        $userInfo->industry = $request->input('industry');
        $userInfo->other_industry = $request->input('other_industry');
        $userInfo->legal_entity = $request->input('legal_entity');
        $userInfo->other_legal_entity = $request->input('other_legal_entity');
        $userInfo->phone = $request->input('phone');
        $userInfo->phoneone = $request->input('phoneone');
        $userInfo->backupemail = $request->input('backupemail');
        $userInfo->dece = $request->input('dece');

        $userInfo->save(); // Save the updated user info data
    }

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Profile updated successfully');
}

    

    public function updateVideoStatus(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();
        $user_id = $user->id;
    
        // Update video status for User model
        $user = User::find($user_id);
        if ($user) {
            $user->video_status = $request->input('video_status');
            $user->save();
        }
    
        // Update video status for UserInfo model
        $userInfo = UserInfo::where('user_id', $user_id)->first();
        if ($userInfo) {
            $userInfo->video_status = $request->input('video_status');
            $userInfo->save();
        }
    
        return response()->json(['message' => 'Video status updated successfully'], 200);
    }
    
        public function updateskipdemo(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();
        $user_id = $user->id;
    
        // Update video status for User model
        $user = User::find($user_id);
        if ($user) {
            $user->user_onboard = $request->input('user_onboard');
            $user->save();
        }
    
        // Update video status for UserInfo model
        $userInfo = UserInfo::where('user_id', $user_id)->first();
        if ($userInfo) {
            $userInfo->user_onboard = $request->input('user_onboard');
            $userInfo->save();
        }
    
        return response()->json(['message' => 'skip demo onbaord  status updated successfully'], 200);
    }
    
    
    public function indexuser()
    {
        $clientdata = ClientProfile::where('client_id', $user->id)->first();
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        $today = Carbon::now()->toDateString(); // Get the current date in YYYY-MM-DD format
        $user = Auth::user(); // Get the currently authenticated user
        $employees = User::where('role', 'Employee')->get();
        $clients = User::where('role', 'Client')->get();
       
    $policy = PolicyFile::latest()->get();
      $events = DB::table('events as e')
    ->join('users as u', 'u.id', '=', 'e.client_id')
    ->where('e.client_id', $user->id)
    ->whereDate('e.start', '>=', $today)
    ->select('title', DB::raw('MAX(start) as start'), DB::raw('MAX(description) as description'))
    ->groupBy('title')
    ->get();

            // dd($events);
        return view('user.dashboard.index', ['user' => $user,'policy' => $policy,'clientdata' => $clientdata ,'cli_announcements' => $cli_announcements,'events' => $events]);
    }
    public function auditpro()
    {
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        $audit = StoreAudit::all();
       return view('user.Audit-pro.Audit-pro',compact('cli_announcements','audit'));
    }
	
    public function companystoreprofile(Request $request)
    {
        // Check if a record already exists for the authenticated user
        $existingProfile = CompanyProfiles::where('user_id', auth()->id())->first();

        // If a record exists, update it; otherwise, create a new record
        if ($existingProfile) {
            $existingProfile->update([
                'state' => $request->input('state'),
                'industry' => $request->input('industry'),
                'employee_count' => $request->input('employee_count'),
                'DOI' => $request->input('DOI'),
                'CIN' => $request->input('CIN'),
                'PAN' => $request->input('PAN'),
                'Email' => $request->input('Email'), 
                'Phone' => $request->input('Phone'), 
                'authorized_capital' => $request->input('authorized_capital'),
                'paid_up_capital' => $request->input('paid_up_capital'),
            ]);
        } else {
            CompanyProfiles::create([
                'user_id' => auth()->id(),
                'state' => $request->input('state'),
                'industry' => $request->input('industry'),
                'employee_count' => $request->input('employee_count'),
                'DOI' => $request->input('DOI'),
                'CIN' => $request->input('CIN'),
                'PAN' => $request->input('PAN'),
                'Email' => $request->input('Email'), 
                'Phone' => $request->input('Phone'), 
                'authorized_capital' => $request->input('authorized_capital'),
                'paid_up_capital' => $request->input('paid_up_capital'), 
            ]);
        }

        // Return a redirect with success message
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

//    public function storeregister(Request $request){
//     dd($request);
//    }

    public function storedirector(Request $request)
    {
      
    
        // Handle file upload
       
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        
        
        // Move the uploaded file to the public directory
        $file->move(public_path('director_images'), $fileName);
        
        // Get the file path relative to the public directory
        $imagePath = 'director_images/' . $fileName;
    
        // Create DirectorStore model and save data
        DirectorStore::create([
            'dname' => $request->dname,
            'drfile' => $imagePath,
            'status' => $request->status,
            'expiredate' => $request->expiredate ?? null,
            'activedate' => $request->activedate ?? null,
            'location' => $request->location,
        ]);
    
        // Redirect or return response as needed
        return redirect()->back()->with('success', 'Director information stored successfully.');
    }

    public function dirupdate(Request $request)
    {
       

        // Get the file and store it in a directory
        $file = $request->file('aadharcard_filepath');
        $filePath = $file->store('uploads'); // Adjust directory path as needed

        // Update the record in the database
        $directorStore = DirectorStore::findOrFail($request->input('hidden_id'));
        $directorStore->aadharcard_filepath = $filePath;
        $directorStore->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'File uploaded successfully.');
    }
    public function dirupdate3(Request $request)
    {
       

        // Get the file and store it in a directory
        $file = $request->file('passport_filepath');
        $filePath = $file->store('uploads'); // Adjust directory path as needed

        // Update the record in the database
        $directorStore = DirectorStore::findOrFail($request->input('hidden_id'));
        $directorStore->passpost_filepath = $filePath;
        $directorStore->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'File uploaded successfully.');
    }
    public function dirupdate1(Request $request)
    {
       

        // Get the file and store it in a directory
        $file = $request->file('voterid_filepath');
        $filePath = $file->store('uploads'); // Adjust directory path as needed

        // Update the record in the database
        $directorStore = DirectorStore::findOrFail($request->input('hidden_id'));
        $directorStore->voterid_filepath = $filePath;
        $directorStore->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'File uploaded successfully.');
    }

    public function downloadaadharFile1($id)
    {
        $file = DirectorStore::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->aadharcard_filepath);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function downloadpanFile1($id)
    {
        $file = DirectorStore::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->pancard_filepath);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function downloadvoterFile1($id)
    {
        $file = DirectorStore::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->voterid_filepath);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function downloadpassportFile1($id)
    {
        $file = DirectorStore::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->passpost_filepath);
        
        return response()->download($filePath, $file->real_file_name);
    }
    public function voterfile($id)
    {
        $director = DirectorStore::find($id);

        if (!$director) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Get the file path
        $filePath = storage_path('app/' . $director->voterid_filepath);
    
        // Check if the file exists
        if (file_exists($filePath)) {
            // Delete the file
            unlink($filePath);
        }
    
        // Update the database record with null for the file path
        $director->voterid_filepath = NULL;
        $director->save();
    
        return redirect()->back()->with('success', 'File deleted successfully.');
    }
    public function passportfile($id)
    {
        // Find the user by ID
        $director = DirectorStore::find($id);

        if (!$director) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Get the file path
        $filePath = storage_path('app/' . $director->passpost_filepath);
    
        // Check if the file exists
        if (file_exists($filePath)) {
            // Delete the file
            unlink($filePath);
        }
    
        // Update the database record with null for the file path
        $director->passpost_filepath = NULL;
        $director->save();
    
        return redirect()->back()->with('success', 'File deleted successfully.');
    }
    public function aadharfile($id)
    {
        $director = DirectorStore::find($id);

    if (!$director) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    // Get the file path
    $filePath = storage_path('app/' . $director->aadharcard_filepath);

    // Check if the file exists
    if (file_exists($filePath)) {
        // Delete the file
        unlink($filePath);
    }

    // Update the database record with null for the file path
    $director->aadharcard_filepath = NULL;
    $director->save();

    return redirect()->back()->with('success', 'File deleted successfully.');
    }
    public function panfile($id)
    {
        $director = DirectorStore::find($id);

        if (!$director) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Get the file path
        $filePath = storage_path('app/' . $director->pancard_filepath);
    
        // Check if the file exists
        if (file_exists($filePath)) {
            // Delete the file
            unlink($filePath);
        }
    
        // Update the database record with null for the file path
        $director->pancard_filepath = NULL;
        $director->save();
    
        return redirect()->back()->with('success', 'File deleted successfully.');
    }

    public function customdocupss(Request $request)
    {
        // Get the file and store it in a directory
        $file = $request->file('custom_file');
        $filename = $request->input('file_name');
        $filePath = $file->store('uploads'); // Adjust directory path as needed
    
        // Create a new record in the database
        $directorStore = new CustomDirectorStore();
        $directorStore->director_id = $request->input('director_id');
        $directorStore->custom_file = $filePath;
        $directorStore->file_name = $filename;
        $directorStore->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'File uploaded successfully.');
    }
    
    public function dirupdate2(Request $request)
    {
       

        // Get the file and store it in a directory
        $file = $request->file('pancard_filepath');
        $filePath = $file->store('uploads'); // Adjust directory path as needed

        // Update the record in the database
        $directorStore = DirectorStore::findOrFail($request->input('hidden_id'));
        $directorStore->pancard_filepath = $filePath;
        $directorStore->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'File uploaded successfully.');
    }
    
    public function Complianceregulator()
    {
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        
       return view('user.Document-Repository.compliance-regulator',compact('cli_announcements'));
    }

    public function fixedManagement()
    {
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        $contractNamesArray = StoreContract::pluck('contract_name')->toArray();

        $fixed = StoreFixedAsset::all();
       return view('user.fixed-management.fixed-management',compact('cli_announcements','contractNamesArray','fixed'));
    }

    // public function storeevent(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'eventName' => 'required|string',
    //         'eventDate' => 'required|date',
    //         'repeat' => 'required|string|in:yearly,monthly,daily',
    //         'eventType' => 'required|string|in:anniversary,reminder',
    //     ]);
    
    //     // Create and store the event
    //     $event = new AdminEventCal();
    //     $event->eventName = $validatedData['eventName'];
    //     $event->eventDate = $validatedData['eventDate'];
    //     $event->repeat = $validatedData['repeat'];
    //     $event->eventType = $validatedData['eventType'];
    //     $event->save();
    
    //     // Return a redirect with success message
    //     return redirect()->back()->with('success', 'Event created successfully');
    // }
    public function storeevent(Request $request)
{
    $validatedData = $request->validate([
        'eventName' => 'required|string',
        'eventDate' => 'required|date',
        'repeat' => 'required|string|in:yearly,monthly,daily',
        'eventType' => 'required|string|in:anniversary,reminder',
    ]);

    // Create and store the event
    $event = new AdminEventCal();
    $event->eventName = $validatedData['eventName'];
    $event->eventDate = $validatedData['eventDate'];
    $event->repeat = $validatedData['repeat'];
    $event->eventType = $validatedData['eventType'];
    $event->save();

    // If the event repeats yearly, create events for each year
    if ($validatedData['repeat'] === 'yearly') {
        // Create events for the next 10 years (adjust as needed)
        for ($i = 1; $i <= 100; $i++) {
            $newEvent = new AdminEventCal();
            $newEvent->eventName = $validatedData['eventName'];
            $newEvent->eventDate = date('Y-m-d', strtotime($validatedData['eventDate'] . ' + ' . $i . ' year'));
            $newEvent->repeat = 'yearly';
            $newEvent->eventType = $validatedData['eventType'];
            $newEvent->save();
        }
    }

    // If the event repeats monthly, create events for each month
    if ($validatedData['repeat'] === 'monthly') {
        // Create events for the next 12 months (adjust as needed)
        for ($i = 1; $i <= 12; $i++) {
            $newEvent = new AdminEventCal();
            $newEvent->eventName = $validatedData['eventName'];
            $newEvent->eventDate = date('Y-m-d', strtotime($validatedData['eventDate'] . ' + ' . $i . ' month'));
            $newEvent->repeat = 'monthly';
            $newEvent->eventType = $validatedData['eventType'];
            $newEvent->save();
        }
    }

    // If the event repeats daily, create events for each day
    if ($validatedData['repeat'] === 'daily') {
        // Create events for the next 30 days (adjust as needed)
        for ($i = 1; $i <= 30; $i++) {
            $newEvent = new AdminEventCal();
            $newEvent->eventName = $validatedData['eventName'];
            $newEvent->eventDate = date('Y-m-d', strtotime($validatedData['eventDate'] . ' + ' . $i . ' day'));
            $newEvent->repeat = 'daily';
            $newEvent->eventType = $validatedData['eventType'];
            $newEvent->save();
        }
    }

    // Return a redirect with success message
    return redirect()->back()->with('success', 'Event(s) created successfully');
}

public function userimg(Request $request)
{
    // Validate the request to ensure a file and user ID is provided
    $request->validate([
        'use_id' => 'required|exists:users,id',
        'profile_image' => 'required|image|max:2048', // Optional validation for image size and type
    ]);

    // Get the user ID from the request
    $userId = $request->input('use_id');

    // Get the uploaded profile image
    $profileImage = $request->file('profile_image');

    // Generate a unique filename
    $fileName = time() . '_' . $profileImage->getClientOriginalName();

    // Move the file to the public/uploads/profile_images directory
    $profileImage->move(public_path('uploads/profile_images'), $fileName);

    // Update the User model
    $user = User::find($userId);

    if ($user) {
        // Update the user's profile image
        $user->profile_picture = 'uploads/profile_images/' . $fileName;
        $user->save();
    }

    // Update the UserInfo model
    $userInfo = UserInfo::where('user_id', $userId)->first();
    if ($userInfo) {
        // Update the user's profile image in the user_info table
        $userInfo->profile_picture = 'uploads/profile_images/' . $fileName;
        $userInfo->save();
    }

    // Redirect back or return a response
    return redirect()->back()->with('success', 'Profile image updated successfully');
}



    public function getEvents()
    {
        $events = AdminEventCal::all(); // Assuming AdminEventCal is your model for events
        return response()->json($events);
    }
    public function store(Request $request)
{
   
    
    
    if (Session::has('email_otp') && Session::get('email_otp') == $request->email_otp) {
            // Clear the email OTP from the session
            Session::forget('email_otp');

            // Check if a user with the provided email already exists
            $existingUser = User::where('email', $request->email)->first();

            // If the user does not exist, create a new account and log in the user
            if (!$existingUser) {
                // Create the user account
                $user = User::create([
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => 'founder',
                    'designation' => $request->designation,
                    'name_of_the_business' => $request->name_of_the_business,
                    'industry' => $request->industry,
                    'employees' => $request->employees,
                    'name' =>$request->first_name.$request->last_name,
                    'cin_no' => $request->cin_no,
                ]);

                // Debugging: Check if user creation was successful
                if (!$user) {
                    Log::error('User creation failed.');
                    return redirect()->back()->with('error', 'User creation failed.');
                }

                // Retrieve the user ID
                $userId = $user->id;

                // Store additional user information in the user_info table
                UserInfo::create([
                    'user_id' => $userId,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'password' => $request->password,
                    'role' => 'founder',
                    'designation' => $request->designation,
                    'name_of_the_business' => $request->name_of_the_business,
                    'industry' => $request->industry,
                    'employees' => $request->employees,
                    'name' =>$request->first_name.$request->last_name,
                    'cin_no' => $request->cin_no,
                ]);

                

                return redirect()->route('login'); // Redirect to the user dashboard view
            } else {
                // User with the provided email already exists
                return redirect()->back()->with('error', 'User with this email already exists.');
            }
        } else {
            // OTP mismatch
            return redirect()->back()->with('error', 'Invalid OTP.');
        }
    
}

public function whiteboard()
{
    $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
    
   return view('user.vandor-management.whiteboard',compact('cli_announcements'));
}


public function masteradmin()
{
    $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
    
   return view('master_admin.dashboard.dashboard',compact('cli_announcements'));
}


public function publicclink()
{
    $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
    
   return view('user.public_view.publiclink',compact('cli_announcements'));
}

public function advsearch()
{
    $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
     $category = '';
    $section = '';
    $subsection = '';
  

    // Return the view with both cli_announcements and results
    return view('user.public_view.advancesearch', compact('cli_announcements','category','section','subsection')); 
}

public function showAdvSearch(Request $request)
{
    // Get the query parameters
    $category = $request->query('category');
    $section = $request->query('section');
    $subsection = $request->query('subsection');
    $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
    $user = auth()->user();

    // Initialize an empty array to hold the results
    $results = [];

    // Define table names and their respective aliases
    $tables = [
        'board_notice' => 'board_notice',
        'board_reso' => 'board_reso',
        'board_minute_book' => 'board_minute_book',
        'board_as' => 'board_as'
    ];

    // Determine the selected table based on the query parameters
    $selectedTable = null;
    if ($category === 'Secretarial' && $section === 'Board Meetings') {
        switch ($subsection) {
            case 'Notices':
                $selectedTable = 'board_notice';
                break;
            case 'Resolutions':
                $selectedTable = 'board_reso';
                break;
            case 'Minute Book':
                $selectedTable = 'board_minute_book';
                break;
            case 'Attendance sheet':
                $selectedTable = 'board_as';
                break;
            default:
                $selectedTable = null;
                break;
        }
    }

    // Fetch data for the selected table if available
    if ($selectedTable && array_key_exists($selectedTable, $tables)) {
        $tableData = DB::table($selectedTable)
            ->select(
                DB::raw("'{$tables[$selectedTable]}' AS source_table"), 
                'id', 
                'file_name as name', 
                'user_name', 
                'fyear', 
                'Tags', 
                'file_size', 
                'created_at', 
                'real_file_name', 
                'location'
            )
            ->where('user_id', $user->id)
            ->where('is_delete', 0)
            ->get();

        $results = $tableData->toArray();
    }

    // Respond with JSON if the request is made via AJAX
    if ($request->ajax()) {
        return response()->json([
            'results' => $results,
        ]);
    }

    // Otherwise, return the view
    return view('user.public_view.advancesearch', [
        'category' => $category,
        'section' => $section,
        'subsection' => $subsection,
        'cli_announcements' => $cli_announcements,
        'results' => $results,
    ]);
}






public function liveSearch(Request $request)
    {
        $query = $request->get('query');
        $fyear = $request->get('fyear'); // Get the selected financial year
        $userId = Auth::id();

        // Base query for files
        $filesQuery = Files::where('user_id', $userId)
                           ->where('file_name', 'LIKE', "%{$query}%");

        if ($fyear) {
            $filesQuery->where('fyear', $fyear); // Apply financial year filter
        }

        $files = $filesQuery->get(['id', 'file_name as name', 'file_size', 'created_at', 'user_name', 'fyear', 'Tags', 'real_file_name', 'location']);

        // Queries for each board table
        $boardNotice = DB::table('board_notice')
            ->select(DB::raw("'board_notice' AS source_table"), 'id', 'file_name as name', 'user_name','fyear', 'Tags', 'file_size', 'created_at', 'real_file_name', 'location')
            ->where('user_id', $userId)
            ->where('file_name', 'LIKE', "%{$query}%");

        if ($fyear) {
            $boardNotice->where('fyear', $fyear); // Apply financial year filter
        }

        $boardReso = DB::table('board_reso')
            ->select(DB::raw("'board_reso' AS source_table"), 'id', 'file_name as name', 'user_name','fyear', 'Tags', 'file_size', 'created_at', 'real_file_name', 'location')
            ->where('user_id', $userId)
            ->where('file_name', 'LIKE', "%{$query}%");

        if ($fyear) {
            $boardReso->where('fyear', $fyear); // Apply financial year filter
        }

        $boardMinuteBook = DB::table('board_minute_book')
            ->select(DB::raw("'board_minute_book' AS source_table"), 'id', 'file_name as name', 'user_name','fyear', 'Tags', 'file_size', 'created_at', 'real_file_name', 'location')
            ->where('user_id', $userId)
            ->where('file_name', 'LIKE', "%{$query}%");

        if ($fyear) {
            $boardMinuteBook->where('fyear', $fyear); // Apply financial year filter
        }

        $boardAs = DB::table('board_as')
            ->select(DB::raw("'board_as' AS source_table"), 'id', 'file_name as name', 'user_name','fyear', 'Tags', 'file_size', 'created_at', 'real_file_name', 'location')
            ->where('user_id', $userId)
            ->where('file_name', 'LIKE', "%{$query}%");

        if ($fyear) {
            $boardAs->where('fyear', $fyear); // Apply financial year filter
        }

        $results = $boardNotice
            ->unionAll($boardReso)
            ->unionAll($boardMinuteBook)
            ->unionAll($boardAs)
            ->get();

        $formattedResults = $files->map(function ($file) {
            return [
                'id' => $file->id,
                'name' => $file->name,
                'fyear' => $file->fyear,
                'user_name' => $file->user_name,
                'file_size' => $file->file_size,
                'Tags' => $file->Tags,
                'created_at' => $file->created_at,
                'real_file_name' => $file->real_file_name,
                'location' => $file->location,
                'source_table' => null
            ];
        })->merge($results->map(function ($result) {
            return [
                'id' => $result->id,
                'name' => $result->name,
                'fyear' => $result->fyear,
                'user_name' => $result->user_name,
                'file_size' => $result->file_size,
                'Tags' => $result->Tags,
                'created_at' => $result->created_at,
                'real_file_name' => $result->real_file_name,
                'location' => $result->location,
                'source_table' => $result->source_table
            ];
        }));

        return response()->json($formattedResults);
    }




public function exactSearch(Request $request)
{
    $query = $request->get('query');
    $userId = Auth::id();

    $files = Files::where('user_id', $userId)
                  ->where('file_name', '=', $query)
                  ->get(['id', 'file_name as name', 'file_size', 'created_at', 'user_name', 'Tags', 'real_file_name', 'location']);

    $boardNotice = DB::table('board_notice')
        ->select(DB::raw("'board_notice' AS source_table"), 'id', 'file_name as name', 'user_name', 'Tags', 'file_size', 'created_at', 'real_file_name', 'location')
        ->where('user_id', $userId)
        ->where('file_name', '=', $query);

    $boardReso = DB::table('board_reso')
        ->select(DB::raw("'board_reso' AS source_table"), 'id', 'file_name as name', 'user_name', 'Tags', 'file_size', 'created_at', 'real_file_name', 'location')
        ->where('user_id', $userId)
        ->where('file_name', '=', $query);

    $boardMinuteBook = DB::table('board_minute_book')
        ->select(DB::raw("'board_minute_book' AS source_table"), 'id', 'file_name as name', 'user_name', 'Tags', 'file_size', 'created_at', 'real_file_name', 'location')
        ->where('user_id', $userId)
        ->where('file_name', '=', $query);

    $boardAs = DB::table('board_as')
        ->select(DB::raw("'board_as' AS source_table"), 'id', 'file_name as name', 'user_name', 'Tags', 'file_size', 'created_at', 'real_file_name', 'location')
        ->where('user_id', $userId)
        ->where('file_name', '=', $query);

    $results = $boardNotice
        ->unionAll($boardReso)
        ->unionAll($boardMinuteBook)
        ->unionAll($boardAs)
        ->get();

    $formattedResults = $files->map(function ($file) {
        return [
            'id' => $file->id,
            'name' => $file->name,
            'user_name' => $file->user_name,
            'size' => $file->file_size,
            'Tags' => $file->Tags,
            'created_date' => $file->created_at,
            'real_file_name' => $file->real_file_name,
            'location' => $file->location,
            'source_table' => null // Adding source_table for consistency
        ];
    })->merge($results->map(function ($result) {
        return [
            'id' => $result->id,
            'name' => $result->name,
            'user_name' => $result->user_name,
            'size' => $result->file_size,
            'Tags' => $result->Tags,
            'created_date' => $result->created_at,
            'real_file_name' => $result->real_file_name,
            'location' => $result->location,
            'source_table' => $result->source_table
        ];
    }));

    return response()->json($formattedResults);
}

public function prefileSearch(Request $request)
{
   
    $userId = Auth::id();

   

    $boardNotice = DB::table('board_notice')
        ->select(DB::raw("'board_notice' AS source_table"), 'id', 'file_name as name', 'user_name', 'Tags', 'file_size', 'created_at', 'real_file_name', 'location')
        ->where('user_id', $userId);

    $boardReso = DB::table('board_reso')
        ->select(DB::raw("'board_reso' AS source_table"), 'id', 'file_name as name', 'user_name', 'Tags', 'file_size', 'created_at', 'real_file_name', 'location')
        ->where('user_id', $userId);

    $boardMinuteBook = DB::table('board_minute_book')
        ->select(DB::raw("'board_minute_book' AS source_table"), 'id', 'file_name as name', 'user_name', 'Tags', 'file_size', 'created_at', 'real_file_name', 'location')
        ->where('user_id', $userId);

    $boardAs = DB::table('board_as')
        ->select(DB::raw("'board_as' AS source_table"), 'id', 'file_name as name', 'user_name', 'Tags', 'file_size', 'created_at', 'real_file_name', 'location')
        ->where('user_id', $userId);

    $results = $boardNotice
        ->unionAll($boardReso)
        ->unionAll($boardMinuteBook)
        ->unionAll($boardAs)
        ->get();

    foreach ($results as $result) {
        $formattedResults[] = [
            'id' => $result->id,
            'name' => $result->name,
           
             'user_name' => $result->user_name,
             'Tags' => $result->Tags,
            'size' => $result->file_size,
            'created_date' => $result->created_at,
            'real_file_name' => $result->real_file_name,
            'location' => $result->location
        ];
    }

    return response()->json($formattedResults);

    
}


public function fetchfyeardata(Request $request)
{
    $query = $request->get('year'); // Changed from 'query' to 'year' to match AJAX request
    $userId = Auth::id();

    $boardNotice = DB::table('board_notice')
        ->select(DB::raw("'board_notice' AS source_table"), 'id', 'file_name as name', 'user_name', 'Tags', 'file_size', 'created_at', 'real_file_name', 'location')
        ->where('user_id', $userId)
        ->where('fyear', '=', $query);

    $boardReso = DB::table('board_reso')
        ->select(DB::raw("'board_reso' AS source_table"), 'id', 'file_name as name', 'user_name', 'Tags', 'file_size', 'created_at', 'real_file_name', 'location')
        ->where('user_id', $userId)
        ->where('fyear', '=', $query);

    $boardMinuteBook = DB::table('board_minute_book')
        ->select(DB::raw("'board_minute_book' AS source_table"), 'id', 'file_name as name', 'user_name', 'Tags', 'file_size', 'created_at', 'real_file_name', 'location')
        ->where('user_id', $userId)
        ->where('fyear', '=', $query);

    $boardAs = DB::table('board_as')
        ->select(DB::raw("'board_as' AS source_table"), 'id', 'file_name as name', 'user_name', 'Tags', 'file_size', 'created_at', 'real_file_name', 'location')
        ->where('user_id', $userId)
        ->where('fyear', '=', $query);

    $results = $boardNotice
        ->unionAll($boardReso)
        ->unionAll($boardMinuteBook)
        ->unionAll($boardAs)
        ->get();

    $formattedResults = []; // Initialize array
    foreach ($results as $result) {
        $formattedResults[] = [
            'id' => $result->id,
            'name' => $result->name,
            'user_name' => $result->user_name,
            'Tags' => $result->Tags,
            'size' => $result->file_size,
            'created_date' => $result->created_at,
            'real_file_name' => $result->real_file_name,
            'location' => $result->location
        ];
    }

    return response()->json($formattedResults);
}




public function customSearch(Request $request)
{
    // Get the search query and user ID from the request
    $query = $request->get('query');
    $userId = Auth::id();

    // Fetch files based on the search query and user ID
    $files = Files::where('user_id', $userId)
        ->where(function ($subQuery) use ($query) {
            $subQuery->where('file_name', 'LIKE', "%{$query}%")
                     ->orWhere('Tags', 'LIKE', "%{$query}%");
        })
        ->get(['id', 'file_name as name', 'file_size', 'created_at', 'user_name', 'Tags', 'real_file_name', 'location']);

    // Return the results as a JSON response
    return response()->json($files);
}

public function customfileCount(Request $request)
{

 $userId = Auth::id();
    $count = Files::where('user_id', $userId)->count();
    return response()->json(['count' => $count]);
    
}

    

public function trashbox()
{
    $user = auth()->user();
        $userId = Auth::id();
        // dd($user->role);
        
        $role = User::where('id', $userId)
                        ->where('role', $user->role)
                        ->where('Trash_Panel_Access', 1)
                        ->first();
        // dd($role);
        
        if (!$role) {
            echo "You have no Access to Trash Panel , Please Contact to your Account Provider";
            abort(404);  // Abort if the role is not found or access is not granted
        } 
    $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
    $user = auth()->user();
   $files = CommonTable::where('user_id', $user->id)
                    ->where('is_delete', 2)
                     ->orderBy('created_at', 'desc')
                    ->get();
                    $totalCount = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 2)
    ->count();

                    
                    $filess = CommonTable::where('user_id', $user->id)
                    ->where('is_delete', 1)
                     ->orderBy('created_at', 'desc')
                    ->get();
                    
                    
                        $user = auth()->user();
         $userRole = $user->role; // Ensure 'role' field exists in the users table
    
    // Check if the user's role exists in the roles array
    $user = auth()->user();
    
    // Get the user's role from the users table
    $userRole = $user->role; // Ensure 'role' field exists in the users table
    
    // Find the UserRole record where the role matches the user's role
    $userRoleRecord = UserRole::where('role', $userRole)->first();
    
   return view('user.Trash.trash',compact('cli_announcements','files','filess','totalCount','user'));
}

// public function update(Request $request)
// {
//     // Get the authenticated user's ID
    
    
//     $authUserId = Auth::id();

//     // Get role_id and role_name from the request
//     $roleId = $request->input('role_id');
//     $roleName = $request->input('role_name');

//     // Fetch all matching users where createdby_id and role match
//     $users = User::where('createdby_id', $roleId)
//                  ->where('role', $roleName)
//                  ->get();

//     // Fetch all matching user info records where createdby_id and role match
//     $userInfos = UserInfo::where('createdby_id', $roleId)
//                          ->where('role', $roleName)
//                          ->get();

//     // If no matching users or user info found, return failure response
//     if ($users->isEmpty() && $userInfos->isEmpty()) {
//         return response()->json(['success' => false, 'message' => 'No matching user or user info found']);
//     }

//     // Loop through and update all matching users
//     foreach ($users as $user) {
//         $user->Edit_Password = $request->input('Edit_Password', $user->Edit_Password);
//         $user->View_Exception_Reports = $request->input('View_Exception_Reports', $user->View_Exception_Reports);
//         $user->Document_Repository_Access = $request->input('Document_Repository_Access', $user->Document_Repository_Access);
//         $user->Promoters_Vault_Access = $request->input('Promoters_Vault_Access', $user->Promoters_Vault_Access);
//         $user->Coming_Soon_Access = $request->input('Coming_Soon_Access', $user->Coming_Soon_Access);
//         $user->Trash_Panel_Access = $request->input('Trash_Panel_Access', $user->Trash_Panel_Access);
//         $user->Role_Access = $request->input('Role_Access', $user->Role_Access);

//         // Save the updated user record
//         $user->save();
//     }

//     // Loop through and update all matching user info records
//     foreach ($userInfos as $userInfo) {
//         $userInfo->Edit_Password = $request->input('Edit_Password', $userInfo->Edit_Password);
//         $userInfo->View_Exception_Reports = $request->input('View_Exception_Reports', $userInfo->View_Exception_Reports);
//         $userInfo->Document_Repository_Access = $request->input('Document_Repository_Access', $userInfo->Document_Repository_Access);
//         $userInfo->Promoters_Vault_Access = $request->input('Promoters_Vault_Access', $userInfo->Promoters_Vault_Access);
//         $userInfo->Coming_Soon_Access = $request->input('Coming_Soon_Access', $userInfo->Coming_Soon_Access);
//         $userInfo->Trash_Panel_Access = $request->input('Trash_Panel_Access', $userInfo->Trash_Panel_Access);
//         $userInfo->Role_Access = $request->input('Role_Access', $userInfo->Role_Access);

//         // Save the updated user info record
//         $userInfo->save();
//     }

//     // Return success response after all updates
//     return response()->json(['success' => true, 'message' => 'Permissions updated successfully']);
// }




public function update(Request $request)
{
    // Get the authenticated user's ID
    $authUserId = Auth::id();

    // Get role_id and role_name from the request
    $roleId = $request->input('role_id');
    $roleName = $request->input('role_name');

    // Fetch all matching users where createdby_id matches role_id or it's the auth user, and role matches
    $users = User::where(function($query) use ($roleId, $authUserId) {
                    $query->where('main_role_id', $roleId);
                         
                })
                ->where('role', $roleName)
                ->get();

    // Fetch all matching user info records where createdby_id matches role_id or it's the auth user, and role matches
    $userInfos = UserInfo::where(function($query) use ($roleId, $authUserId) {
                        $query->where('main_role_id', $roleId);
                              
                    })
                    ->where('role', $roleName)
                    ->get();

    // If no matching users or user info found, return failure response
    if ($users->isEmpty() && $userInfos->isEmpty()) {
        return response()->json(['success' => false, 'message' => 'No matching user or user info found']);
    }

    // Loop through and update all matching users
    foreach ($users as $user) {
        $user->Edit_Password = $request->input('Edit_Password', $user->Edit_Password);
        $user->View_Exception_Reports = $request->input('View_Exception_Reports', $user->View_Exception_Reports);
        $user->Document_Repository_Access = $request->input('Document_Repository_Access', $user->Document_Repository_Access);
        $user->Promoters_Vault_Access = $request->input('Promoters_Vault_Access', $user->Promoters_Vault_Access);
        $user->Coming_Soon_Access = $request->input('Coming_Soon_Access', $user->Coming_Soon_Access);
        $user->Trash_Panel_Access = $request->input('Trash_Panel_Access', $user->Trash_Panel_Access);
        $user->Role_Access = $request->input('Role_Access', $user->Role_Access);

        // Save the updated user record  
        $user->save();
    }

    // Loop through and update all matching user info records
    foreach ($userInfos as $userInfo) {
        $userInfo->Edit_Password = $request->input('Edit_Password', $userInfo->Edit_Password);
        $userInfo->View_Exception_Reports = $request->input('View_Exception_Reports', $userInfo->View_Exception_Reports);
        $userInfo->Document_Repository_Access = $request->input('Document_Repository_Access', $userInfo->Document_Repository_Access);
        $userInfo->Promoters_Vault_Access = $request->input('Promoters_Vault_Access', $userInfo->Promoters_Vault_Access);
        $userInfo->Coming_Soon_Access = $request->input('Coming_Soon_Access', $userInfo->Coming_Soon_Access);
        $userInfo->Trash_Panel_Access = $request->input('Trash_Panel_Access', $userInfo->Trash_Panel_Access);
        $userInfo->Role_Access = $request->input('Role_Access', $userInfo->Role_Access);

        // Save the updated user info record
        $userInfo->save();
    }

    // Return success response after all updates
    return response()->json(['success' => true, 'message' => 'Permissions updated successfully']);
}




public function deletefilecommon($id)
{
    // $file = CommonTable::findOrFail($id);
    
  
    $totalCount = CommonTable::where('id', $id)
    ->where('is_delete', 2)
    ->update(['is_delete' => 1]);
  
   
   

    return redirect()->back()->with('success', 'File deleted successfully.');
}
// BoardNoticeController.php
public function fetchBoardNoticesCount()
{
    $userId = auth()->id(); // Or get the user ID in another way
    $totalCount = CommonTable::where('user_id', $userId)
        ->where('is_delete', 2)
        ->count();

    return response()->json(['totalCount' => $totalCount]);
}

public function restore($id)
{
    $file = CommonTable::findOrFail($id);

    // Perform restore action
    $file->update(['is_delete' => 0]);

    return redirect()->back()->with('success', 'File restored successfully.');
}

// public function restorefile($id)
// {
//     $file = BoardNotice::findOrFail($id);

//     // Perform restore action
//     $file->update(['is_delete' => 2]);

//     return redirect()->back()->with('success', 'File restored request successfully.');
// }

public function restorefile($id)
{
    $userId = auth()->id();
   

    // Fetch the file from all tables
    $fileCommon = DB::table('common_table')->where('id', $id)->where('user_id', $userId)->first();
   
   

    // Determine which table to update
    if ($fileCommon) {
      
            DB::table('common_table')->where('id', $id)->where('user_id', $userId)->update(['is_delete' => 2]);
           
            return redirect()->back()->with('success', 'File restore requested successfully.');
       
    }

   

    Log::error("File not found or permission denied for ID: {$id} and user ID: {$userId}");
    return redirect()->back()->with('error', 'File not found or you do not have permission to restore it.');
}










public function venderlist()
{
    $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
    
   return view('user.vandor-management.vendor-listing',compact('cli_announcements'));
}

public function bankingdoc()
{
    $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
    $bankdoc =  StoreBankDoc::all();
   return view('user.banking.bankingdoc',compact('cli_announcements','bankdoc'));
}

public function bankingcredit()
{
    $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
    
   return view('user.banking.bankingcredit',compact('cli_announcements'));
}
public function tickting()
{
    $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
    
   return view('user.ticket.ticket',compact('cli_announcements'));
}
    public function Employeedetails($id)
    {
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        $emplife = StoreEmployeeprofile::where('id', $id)->get();
        
        $employees = StoreEmployeeDetail::join('store_employee_profile', 'store_employee_detail.employee_id', '=', 'store_employee_profile.id')
    ->where('store_employee_detail.employee_id', $id)
    ->select('store_employee_detail.id as detail_id','store_employee_detail.startdate as sd','store_employee_detail.file_size as sz', 'store_employee_detail.*', 'store_employee_profile.*')
    ->get();
  
// dd($employees);
       return view('user.HRM.lifecycle-details',compact('cli_announcements','emplife','employees'));
    }
    public function ContractManagement()
    {
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        $contract = StoreContract::where('user_id', auth()->id())->get();
         $user = auth()->user();
         $userRole = $user->role; // Ensure 'role' field exists in the users table
    
    // Check if the user's role exists in the roles array
    $user = auth()->user();
    
    // Get the user's role from the users table
    $userRole = $user->role; // Ensure 'role' field exists in the users table
    
    // Find the UserRole record where the role matches the user's role
    $userRoleRecord = UserRole::where('role', $userRole)->first();
       return view('user.Contract-Management.Contract-Management',compact('cli_announcements','contract','user'));
    }
    public function Sop()
    {
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        
       return view('user.Document-Repository.sop',compact('cli_announcements'));
    }
	
    public function repcalander()
    {
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        
       return view('user.Document-Repository.rep-calander',compact('cli_announcements'));
    }

    public function loginpassedit()
    {
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        $user = auth()->user();
       return view('user.login-pass-edit.login-pass-edit',compact('cli_announcements', 'user'));
    }
	
public function rolemanagement()
{
      $user = auth()->user();
        $userId = Auth::id();
        // dd($user->role);
         $rolesexit = UserRole::where('user_id', $user->id)->get();
        $role = User::where('id', $userId)
                        ->where('role', $user->role)
                        ->where('Role_Access', 1)
                        ->first();
        // dd($role);
        
        if (!$role) {
            echo "You have no Access to Role Management , Please Contact to your Account Provider";
            abort(404);  // Abort if the role is not found or access is not granted
        }
 
    
    
    $user_id = $user->id;
    // dd($user_id);
    
    // Fetch the roles created by the authenticated user
    $roles = UserRole::where('user_id', $user->id)->where('is_deleted', 0)->get();

    // Fetch the "Admin" role explicitly
    $adminRole = UserRole::where('role', 'Admin')->where('is_deleted', 0)->first();

    // If the Admin role exists, combine it with the user's created roles
    // $roles = $userCreatedRoles;
    // if ($adminRole) {
    //     $roles = $roles->merge(collect([$adminRole]));
    // }
    
    
    // Debugging to view the roles being returned
    // dd($roles);

    // Fetch client announcements (assuming this is separate logic)
    $cli_announcements = Announcement::where('role', 'Client')->latest()->get();

    // Fetch all users with a role (optional)
    $userRoleR = User::whereNotNull('role')->get();

    // Group users by their role (only for the authenticated user's data)
    $usersByRole = User::whereNotNull('role')
                        ->where('id', $user->id) // Fetch only the authenticated user's role-related data
                        ->get()
                        ->groupBy('role');

    // Fetch the current user's role record (if needed elsewhere)
    $userRoleRecord = UserRole::where('role', $user->role)->where('is_deleted', 0)->first();

    // Pass all data to the view
    return view('user.role-management.role-management', [
        'cli_announcements' => $cli_announcements,
        'roles' => $roles, // Pass the combined roles (user-created + Admin)
        'userRoleRecord' => $userRoleRecord,
        'userRoleR' => $userRoleR,
        'usersByRole' => $usersByRole, // Pass the users by role to the view
        'user' => $user,
        'rolesexit' => $rolesexit
    ]);
}



    
    
    
    
    public function addroles(Request $request)
{
   
$userId = auth()->user()->id;
    // Create a new OrganizationChart instance and fill it with validated data
    $userroleModel = new UserRole([
       
        'role' => $request->role,
        'Edit_Password' => "0",
        'View_Exception_Reports' => "0",
        'user_id' => $userId,
        
    ]);

    // Save the data to the database
    $userroleModel->save();

    // Return a JSON response indicating success
        return redirect()->back()->with('success', 'Role created success.');
}

public function members(Request $request)
{
    // dd($request);
  $validatedData = $request->validate([
    'fname' => 'required|string|max:255',
    'lname' => 'required|string|max:255',
    'email' => 'required|string|email|max:255|unique:members',
    'password' => 'required|string|min:8',
    'phone' => 'required|string|max:15',
    'personal_email_id' => 'required|string|email|max:255',
    'Role' => 'required|string',
    'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
]);

if (User::where('email', $request->email)->exists()) {
        return response()->json([
            'status' => 'error',
            'message' => 'Email already exists.',
        ], 400);
    }
$user = Auth::user();
$user_id = $user->id;
$user_name = $this->generateUniqueUsername($request->fname, $request->lname);

$member = new User;
$member->name = $request->input('fname') . ' ' . $request->input('lname');
$member->email = $request->email;
$member->password = Hash::make($request->password);
$member->user_name = $user_name;
$member->phone = $request->phone;
$member->personal_email_id = $request->personal_email_id;
$member->role = $request->Role;
$member->createdby_id = $user_id;
$member->main_role_id = $request->main_role_id;
$member->Edit_Password = 1;
$member->View_Exception_Reports = 1;
$member->Document_Repository_Access = 1;
$member->Promoters_Vault_Access = 1;
$member->Coming_Soon_Access = 1;
$member->Role_Access = 0;
$member->Trash_Panel_Access = 1;
$member->user_status = 1;
$member->user_onboard = 1;
$member->video_status = 1;

// Check if a profile picture is uploaded
if ($request->hasFile('profile_picture')) {
    $file = $request->file('profile_picture');
    $fileName = time() . '_' . $file->getClientOriginalName();
    
    // Move the file to the public/uploads/profile_images directory
    $file->move(public_path('uploads/profile_images'), $fileName);
    
    // Store the filename in the member's profile picture field
    $member->profile_picture = $fileName;

    // Insert the file details into the profile_images table
    
}

$member->save();

UserInfo::create([
    'user_id' => $member->id,
    'email' => $request->email,
    'password' => $request->password,
    'user_name' => $member->user_name,
    'personal_email_id' => $request->personal_email_id,
    'role' => $request->Role,
    'fname' => $request->fname,
    'lname' => $request->lname,
    'phone' => $request->phone,
    'profile_picture' => $member->profile_picture,
    'createdby_id' => $user_id,
    'main_role_id' => $request->main_role_id,
    'Edit_Password' => 1,
    'View_Exception_Reports'  => 1,
    'Document_Repository_Access' => 1,
    'Promoters_Vault_Access'  => 1,
    'Coming_Soon_Access' => 1,
    'Role_Access' => 0,
    'Trash_Panel_Access' => 1,
    'user_status' => 1,
    'user_onboard' => 1,
    'video_status' => 1,
]);

Member::create([
    'emp_id' => $member->id,
    'email' => $request->email,
    'password' => $request->password,
    'user_name' => $member->user_name,
    'personal_email_id' => $request->personal_email_id,
    'role' => $request->Role,
    'fname' => $request->fname,
    'lname' => $request->lname,
    'phone' => $request->phone,
    'profile_picture' => $member->profile_picture,
    'createdby_id' => $user_id,
    'main_role_id' => $request->main_role_id,
    'Edit_Password' => 1,
    'View_Exception_Reports'  => 1,
    'Document_Repository_Access' => 1,
    'Promoters_Vault_Access'  => 1,
    'Coming_Soon_Access' => 1,
    'Role_Access' => 0,
    'Trash_Panel_Access' => 1,
    'user_status' => 1,
    'user_onboard' => 1,
    'video_status' => 1,
]);


$mailersend = new MailerSend(['api_key' => 'mlsn.3cf1d191812b63e38d5edf34dd0146657c403d79af8c2cf2609e26f5b09c0a64']);


        $recipients = [
            new Recipient($request->personal_email_id, "{$request->fname} {$request->lname}"),
        ];

        $emailParams = (new EmailParams())
            ->setFrom('admin@milliondox.in')
            ->setFromName('Admin')
            ->setRecipients($recipients)
            ->setSubject('Your Account Details')
            ->setHtml("<html>
                <head>
        <title>Welcome Onboard</title>
    </head>
  <body style='font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f5f5f5;'>
<table width='100%' cellpadding='0' cellspacing='0' border='0'>
    <tr>
        <td>
            <table class='email-container' cellpadding='0' cellspacing='0' border='0' style='width: 100%;  max-width: 600px;    margin: 0 auto;   background-color: #ffffff;
            border-radius: 8px;  overflow: hidden;  border: 1px solid #dddddd;'>
                
                 <!-- Banner -->
                 <tr>
                    <td class='banner'>
                        <img src='https://milliondox.in/assets/images/welcome_onboard.png' alt='img' style='max-width: 100%;  margin: 0 auto;'>
                    </td>
                </tr>

                <!-- Content -->
                <tr>
                    <td class='content' style='padding: 20px; color: #333333;'>
                        <p class='user_title' style='font-weight: 800;'>Dear {$request->fname} {$request->lname}!,</p>
                        <p>We hope this message finds you well.</p>
                        <p>We are writing to provide you with your account credentials. For security reasons, please ensure that you handle this information with care.</p>
                        <table cellpadding='0' cellspacing='0' border='0' style=' width: 100%;  border-collapse: collapse;'>
                            <tr>
                                <td style='padding: 10px;  border: 1px solid #dddddd; background-color: #f9f9f9;'><strong>Username:</strong> {$member->user_name}</td>
                            </tr>
                            <tr>
                                <td style='padding: 10px;  border: 1px solid #dddddd; background-color: #f9f9f9;'><strong>Password:</strong>  {$request->password}</td>
                            </tr>
                            <tr>
                                <td style='padding: 10px;  border: 1px solid #dddddd; background-color: #f9f9f9;'><strong>E-mail:</strong>  {$request->email}</td>
                            </tr>
                        </table>
                        <a href='https://milliondox.in/login' class='login_me' style=' display: inline-block;   padding: 12px 60px;   color: #FFF;     border-radius: 50px;
                        margin: 20px 0px 0px;   background: #fc8c92;   text-decoration: none;'>Login</a>
                        <p>For your security, we recommend changing your password as soon as you log in. If you have any questions or need further assistance, please do not hesitate to contact our support team.</p>
                    </td>
                </tr>
                <!-- Footer -->
                <tr>
                    <td class='footer' style='background-color: #f98b93;    color: #ffffff;   text-align: center;   padding: 20px;'>
                        <p class='thanks' style='font-weight: bold;'>Thank you for choosing Milliondox!</p>
                        <p class='important' style='color: #fdbcbc;  font-weight: 800;'>Important Notice:</p>
                        <p>Please do not share your password with anyone. If you suspect that your account may be compromised, please contact us immediately.</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
            </html>");
        
        $mailersend->email->send($emailParams);

// dd($mailersend->email->send($emailParams));

    return response()->json([
        'status' => 'success',
        'message' => 'Member created successfully.',
    ], 201);

    // return redirect()->back()->with('success', 'Member created successfully.');

}


private function generateUniqueUsername($fname, $lname)
{
    $base_username = strtolower($fname[0] . $lname);
    $username = $base_username . rand(1000, 9999);

    while (User::where('user_name', $username)->exists()) {
        $username = $base_username . rand(1000, 9999);
    }

    return $username;
}






	
    
	public function share($id)
{
    $document = Document::findOrFail($id);
    
    // Generate a unique token for the shared link
    $token = Str::random(32);

    // Set the expiration time (e.g., 1 hour from now)
    $expiration = Carbon::now()->addHour();

    // Generate the shared link
    $sharedLink = route('documents.download', $document->id, ['token' => $token]);

    // Store the token and expiration time in the database
    $document->shared_token = $token;
    $document->shared_expires_at = $expiration;
    $document->save();

    return response()->json(['shared_link' => $sharedLink]);
}
	
	
	  public function Employeelifecycle()
    {
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        $user = Auth::user();
        $emplife = StoreEmployeeprofile::where('user_id', $user->id)->get();
       return view('user.HRM.employee-lifecycle',compact('cli_announcements','emplife'));
    }
    public function manageprofile()
    {
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        
       return view('user.management.profile',compact('cli_announcements'));
    }

    public function managestore(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'user_id' => 'required|integer',
        'parent_id' => 'required|integer',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:255',
        // Add other validation rules as needed
    ]);

    // Create a new OrganizationChart instance and fill it with validated data
    $organizationChart = new OrganizationChart();
    $organizationChart->user_id = $validatedData['user_id'];
    $organizationChart->parent_id = $validatedData['parent_id'];
    $organizationChart->name = $validatedData['name'];
    $organizationChart->description = $validatedData['description'];

    // Save the organization chart data to the database
    $organizationChart->save();

    // Return a JSON response indicating success
    return response()->json(['success' => true]);
}
    public function Management()
    {
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        $user = Auth::user();

       return view('user.management.management',compact('cli_announcements','user'));
    }
    public function directorsinfo()
    {
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        
       return view('user.Administration.Directorinfo',compact('cli_announcements'));
    }

    public function calender()
    {
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        
       return view('user.Administration.calender',compact('cli_announcements'));
    }
    public function trademark()
    {
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        $iptd =  StoreIpFile::all();
       return view('user.trademark.trademark',compact('cli_announcements','iptd'));
    }
    
     public function director()
    {
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
       $dr = DirectorStore::latest()->get();
       $customDirectorStores = DB::table('custom_director_store as cs')
    ->leftJoin('director_store as ds', 'ds.id', '=', 'cs.director_id')
    ->select('cs.*')
    ->get();
        
       return view('user.Administration.director',compact('cli_announcements','dr','customDirectorStores'));
    }

    public function updatedirectordt(Request $request)
    {
        $empid = $request->input('dr_id');
    
    // Find the employee profile record by empid
    $employee = DirectorStore::findOrFail($empid);

    // Update the employee profile fields
    $employee->status = $request->input('status');
    $employee->expiredate = $request->input('expiredate');
    $employee->activedate = $request->input('activedate');
    $employee->location = $request->input('location'); // Make sure to use the correct input name
    

    

    

    // Save the changes to the database
    $employee->save();

    return redirect()->back()->with('success', 'DSC  updated successfully.');
    }
    public function evedelete(Request $request)
    {
        // Validate the request data
        $request->validate([
            'eventId' => 'required|integer', // Ensure eventId is an integer
        ]);
    
        // Find the event to delete
        $event = AdminEventCal::find($request->eventId);
    
        if (!$event) {
            return response()->json(['message' => 'Event not found.'], 404);
        }

        // Delete the event
        $event->delete();
    
        // Return a success response
        $request->session()->flash('success', 'Event deleted successfully.');

    // Return response
    return response()->json(['message' => 'Event deleted successfully.']);
    }
    


    public function downloadcustomFile1($id)
    {
        $file = CustomDirectorStore::findOrFail($id);
        
        // For example, if the file is stored in the storage/app/uploads directory
        $filePath = storage_path('app/' . $file->custom_file);
        
        return response()->download($filePath, $file->file_name);
    }

    public function customfilecd($id)
{
    // Find the user by ID
    $user = CustomDirectorStore::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    // Delete the user record
    $user->delete();

    

    return redirect()->back()->with('success', 'Record deleted successfully.');
}
    public function otpform(Request $request){
        // dd($request);
    }
    public function markAllAsRead(Request $request)
    {
        // Get the ID of the authenticated user
        $userId = auth()->user()->id;
    
        // Fetch announcements
        $announcements = Announcement::latest()->get();
    
        // Iterate over each announcement
        foreach ($announcements as $announcement) {
            // Get the existing user IDs as an array
            if ($announcement->user_id !== null) {
                $existingUserIds = json_decode($announcement->user_id, true);
            } else {
                $existingUserIds = [];
            }
    
            // Handle case where JSON decoding fails
            if (json_last_error() !== JSON_ERROR_NONE) {
                // Log the error or handle it as needed
                continue; // Skip this announcement and proceed to the next one
            }
    
            // If user_ids is null or decoding failed, initialize it as an empty array
            if ($existingUserIds === null) {
                $existingUserIds = [];
            }
    
            // Check if the user ID already exists in the array
            if (!in_array($userId, $existingUserIds)) {
                // If the user ID doesn't exist, add it to the array
                $existingUserIds[] = $userId;
    
                // Update the announcement with the updated user IDs
                $announcement->update([
                    'read_status' => 1,
                    'user_id' => json_encode($existingUserIds),
                ]);
            }
        }
    
        return response()->json(['success' => true]);
    }
    

    
    public function markAllAsReademp(Request $request)
{
    // Mark all announcements as read for the authenticated employee
    $userId = auth()->user()->id; // Assuming you have authentication and user ID is retrievable
    Announcement::where('role', 'Employee')->where('user_id', $userId)->update(['read_status' => 1]);
    
    // Update the status of the authenticated employee
    EmployeeStatus::updateOrCreate(
        ['user_id' => $userId],
        ['is_all_read' => 1]
    );

    return response()->json(['success' => true]);
}

    public function adminnotification()
    {
       $announcements = Announcement::latest()->get();
       return view('admin.notification.notification',compact('announcements'));
    }
    public function usertemplate()
    {
        $user = auth()->user();
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        $template = TemplateFile::latest()->get();
       return view('user.template.template',compact('cli_announcements','template','user'));
    }

    // public function userincorporationdocs()
    // {

    //     $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
    //     $files = UploadedFile::all();
        
    //     dd($files);
    //     return view('user.Charter-Documents.Incorporation-Docs', compact('cli_announcements', 'files'));
    // }
    public function getFilesss(Request $request)
    {
        // Validate the request
        $request->validate([
            'folder' => 'required|string',
        ]);
    
        // Get the folder name from the request
        $folder = $request->input('folder');
    
        // Construct the directory path
        $directory = public_path('uploads/' . $folder);
    
        // Fetch files from the specified directory
        $files = [];
        if (is_dir($directory)) {
            $fileNames = scandir($directory);
            foreach ($fileNames as $fileName) {
                if ($fileName !== '.' && $fileName !== '..') {
                    $files[] = ['name' => $fileName];
                }
            }
        }
    
        // Return JSON response containing file names
        return response()->json($files);
    }
    
    public function userregistrationlicences()
    {
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        $files = RegUploadedFile::all();
        $chardoc = RegCharteredDoc::all();
        $coi = RegCOI::all();
        $pan = RegPAN::all();
        $tan = RegTAN::all();
        $inc = RegINC::all();
        $spicedoc = RegSpiceDoc::all();
        $customdoc = RegCustomDoc::all();
        $pfdoc = PFDOC::all();
        $esidoc = ESIDOC::all();
        $ptdoc = PTDOC::all();
        $tldoc = TLDOC::all();
        $urdoc = URDOC::all();
         $user = auth()->user();
        
       return view('user.Charter-Documents.Registrations-Licences',compact('cli_announcements','user', 'files','chardoc','coi','pan','tan','inc','spicedoc','customdoc','pfdoc','esidoc','ptdoc','tldoc','urdoc'));
    }
    // public function docrepostry()
    // {
    //     $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
    //     $folders = Folder::all(); // Fetch all folders from the database
        
    //     return view('user.Document-Repository.document-repository', compact('cli_announcements', 'folders'));
    // }

     public function docurepo()
    {
        
        $user = auth()->user();
        $userId = Auth::id();
        // dd($user->role);
        
        $role = User::where('id', $userId)
                        ->where('role', $user->role)
                        ->where('Document_Repository_Access', 1)
                        ->first();
        // dd($role);
        
        if (!$role) {
            echo "You have no Access to Document Repository , Please Contact to your Account Provider";
            abort(403);  // Abort if the role is not found or access is not granted
        }
        
        
        
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        $commonFolders = Folder::where('common_folder', 1)
                        ->orderBy('name')
                        ->get();

// Fetch the authenticated user's folders
$userFolders = Folder::where('user_id', Auth::id())
                        ->orderBy('name')
                        ->get();

// Combine both results
$folders = $commonFolders->merge($userFolders);
        
    
        $allFolders = Folder::where('common_folder', 1) ->orwhere('user_id', Auth::id())->orderBy('name')->get();
        $parentFolders = $allFolders->whereNull('parent_name'); 
        $latestFolderPath = Folder::where('user_id', Auth::id())->latest()->value('path');
        $userId = Auth::id();
        $commondataroom = DataRoom::where('user_id', Auth::id())->get();

   $user = auth()->user();
//   $files = BoardNotice::where('user_id', $user->id)
//                     ->where('is_delete', 1)
//                     ->orderBy('updated_at', 'desc')
//                     ->get();
                    
//                     $files3 = BoardMinuteBook::where('user_id', $user->id)
//                     ->where('is_delete', 1)
//                     ->orderBy('updated_at', 'desc')
//                     ->get();
                    
                    
//                     $files3 = BoardResolutions::where('user_id', $user->id)
//                     ->where('is_delete', 1)
//                     ->orderBy('updated_at', 'desc')
//                     ->get();
                    
//                     $files4 = BoardAttendencesheet::where('user_id', $user->id)
//                     ->where('is_delete', 1)
//                     ->orderBy('updated_at', 'desc')
//                     ->get();
                    
//                     dd($files4);


$user_id = $user->id;

// Create individual queries for each table
$commonColumns = [
    'id',
    DB::raw('COALESCE(file_name, "N/A") as file_name'),
    DB::raw('COALESCE(file_type, "N/A") as file_type'),
    DB::raw('COALESCE(real_file_name, "N/A") as real_file_name'),
    DB::raw('COALESCE(file_size, 0) as file_size'),
    DB::raw('COALESCE(file_path, "N/A") as file_path'),
    DB::raw('COALESCE(user_name, "N/A") as user_name'),
    'user_id',
    DB::raw('COALESCE(file_status, 0) as file_status'),
    DB::raw('COALESCE(fyear, "N/A") as fyear'),
    DB::raw('COALESCE(Month, "N/A") as Month'),
    DB::raw('COALESCE(Tags, "N/A") as Tags'),
    DB::raw('COALESCE(location, "N/A") as location'),
    'created_at',
    'updated_at'
];

// Create individual queries for each table
// $files1 = DB::table('board_notice')
//     ->select(array_merge($commonColumns, [DB::raw('"board_notice" as table_name')]))
//     ->where('user_id', $user_id)
//     ->where('is_delete', 1)
//     ->unionAll(DB::table('board_notice')->select(DB::raw('NULL as id, "N/A" as file_name, "N/A" as file_type, "N/A" as real_file_name, 0 as file_size, "N/A" as file_path, "N/A" as user_name, NULL as user_id, 0 as file_status, "N/A" as fyear, "N/A" as Month, "N/A" as Tags, "N/A" as location, NULL as created_at, NULL as updated_at, "board_notice" as table_name'))->whereRaw('0 = 1'));

// $files2 = DB::table('board_minute_book')
//     ->select(array_merge($commonColumns, [DB::raw('"board_minute_book" as table_name')]))
//     ->where('user_id', $user_id)
//     ->where('is_delete', 1)
//     ->unionAll(DB::table('board_minute_book')->select(DB::raw('NULL as id, "N/A" as file_name, "N/A" as file_type, "N/A" as real_file_name, 0 as file_size, "N/A" as file_path, "N/A" as user_name, NULL as user_id, 0 as file_status, "N/A" as fyear, "N/A" as Month, "N/A" as Tags, "N/A" as location, NULL as created_at, NULL as updated_at, "board_minute_book" as table_name'))->whereRaw('0 = 1'))
//     ->unionAll($files1);

// $files3 = DB::table('board_reso')
//     ->select(array_merge($commonColumns, [DB::raw('"board_reso" as table_name')]))
//     ->where('user_id', $user_id)
//     ->where('is_delete', 1)
//     ->unionAll(DB::table('board_reso')->select(DB::raw('NULL as id, "N/A" as file_name, "N/A" as file_type, "N/A" as real_file_name, 0 as file_size, "N/A" as file_path, "N/A" as user_name, NULL as user_id, 0 as file_status, "N/A" as fyear, "N/A" as Month, "N/A" as Tags, "N/A" as location, NULL as created_at, NULL as updated_at, "board_reso" as table_name'))->whereRaw('0 = 1'))
//     ->unionAll($files2);

// $files4 = DB::table('board_as')
//     ->select(array_merge($commonColumns, [DB::raw('"board_as" as table_name')]))
//     ->where('user_id', $user_id)
//     ->where('is_delete', 1)
//     ->unionAll(DB::table('board_as')->select(DB::raw('NULL as id, "N/A" as file_name, "N/A" as file_type, "N/A" as real_file_name, 0 as file_size, "N/A" as file_path, "N/A" as user_name, NULL as user_id, 0 as file_status, "N/A" as fyear, "N/A" as Month, "N/A" as Tags, "N/A" as location, NULL as created_at, NULL as updated_at, "board_as" as table_name'))->whereRaw('0 = 1'))
//     ->unionAll($files3)
//     ->orderBy('updated_at', 'desc')
//     ->get();


$files4 = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 1)
    ->get();
                    
                    
        // $filess = BoardMinuteBook::where('user_id', $userId)->get();
        $moadoc = MOA::all();
        $user = auth()->user();
        $entries = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Board Meetings')
    ->where('real_file_name', 'Notices')
    ->get();

        $count = $entries->count();
        $totalSizeBytes = $entries->sum('file_size');
        $totalSizeKB = round($totalSizeBytes / 1024, 2);



        $entriesMinbook =CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Board Meetings')
    ->where('real_file_name', 'Minute Book')
    ->get();
        $countMinbooks = $entriesMinbook->count(); // Count of entries
        $totalSizeBytesentriesMinbook = $entriesMinbook->sum('file_size'); // Sum of file sizes
        $totalSizeKBMinbooks = round($totalSizeBytesentriesMinbook / 1024, 2); // Convert to KB and round
        
        
          $entriesreso = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Board Meetings')
    ->where('real_file_name', 'Resolutions')
    ->get();
        $countentriesreso = $entriesreso->count(); // Count of entries
        $totalSizeBytesentriesreso = $entriesreso->sum('file_size'); // Sum of file sizes
        $totalSizeKBentriesreso = round($totalSizeBytesentriesreso / 1024, 2); // Convert to KB and round
        
        
        
        $entriesas = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Board Meetings')
    ->where('real_file_name', 'Attendance sheet')
    ->get();
        $countentriesas = $entriesas->count(); // Count of entries
        $totalSizeBytesentriesas = $entriesas->sum('file_size'); // Sum of file sizes
        $totalSizeKBentriesas = round($totalSizeBytesentriesas / 1024, 2); // Convert to KB and round
        
        $fileCount = 0;

// Increment fileCount for each entry with at least one file
if ($count > 0) {
    $fileCount++;
}

if ($countMinbooks > 0) {
    $fileCount++;
}

if ($countentriesreso > 0) {
    $fileCount++;
}

if ($countentriesas > 0) {
    $fileCount++;
}

        
        
        
        $entriesnomeet = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual General Meeting')
    ->where('real_file_name', 'Notices')
    ->get();
        $countentriesnomeet = $entriesnomeet->count(); // Count of entries
        $totalSizeBytesentriesnomeet = $entriesnomeet->sum('file_size'); // Sum of file sizes
        $totalSizeKBentriesnomeet = round($totalSizeBytesentriesnomeet / 1024, 2); // Convert to KB and round
        
        
        $entriesminbookmeet = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual General Meeting')
    ->where('real_file_name', 'Minute Book')
    ->get();
        $countentriesminbookmeet = $entriesminbookmeet->count(); // Count of entries
        $totalSizeBytesentriesminbookmeet = $entriesminbookmeet->sum('file_size'); // Sum of file sizes
        $totalSizeKBentriesminbookmeet = round($totalSizeBytesentriesminbookmeet / 1024, 2); // Convert to KB and round
        
        
         $entriesasmeet = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual General Meeting')
    ->where('real_file_name', 'Attendance sheet')
    ->get();
        $countentriesasmeet = $entriesasmeet->count(); // Count of entries
        $totalSizeBytesentriesasmeet = $entriesasmeet->sum('file_size'); // Sum of file sizes
        $totalSizeKBentriesasmeet = round($totalSizeBytesentriesasmeet / 1024, 2); // Convert to KB and round
        
        
        $entriesresomeet = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual General Meeting')
    ->where('real_file_name', 'Resolutions')
    ->get();
        $countentriesresomeet = $entriesresomeet->count(); // Count of entries
        $totalSizeBytesentriesresomeet = $entriesresomeet->sum('file_size'); // Sum of file sizes
        $totalSizeKBentriesresomeet = round($totalSizeBytesentriesresomeet / 1024, 2); // Convert to KB and round
        
        
        
             $fileCount1 = 0;

// Increment fileCount for each entry with at least one file
if ($countentriesnomeet > 0) {
    $fileCount1++;
}

if ($countentriesminbookmeet > 0) {
    $fileCount1++;
}

if ($countentriesasmeet > 0) {
    $fileCount1++;
}

if ($countentriesresomeet > 0) {
    $fileCount1++;
}
        
         $entriesordernotice = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Extra Ordinary General Meeting')
    ->where('real_file_name', 'Notices')
    ->get();
        $countentriesordernotice = $entriesordernotice->count(); // Count of entries
        $totalSizeBytesentriesordernotice = $entriesordernotice->sum('file_size'); // Sum of file sizes
        $totalSizeKBentriesordernotice = round($totalSizeBytesentriesordernotice / 1024, 2); // Convert to KB and round
        
        
        $entriesorderminbook = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Extra Ordinary General Meeting')
    ->where('real_file_name', 'Minute Book')
    ->get();
        $countentriesorderminbook = $entriesorderminbook->count(); // Count of entries
        $totalSizeBytesentriesorderminbook = $entriesorderminbook->sum('file_size'); // Sum of file sizes
        $totalSizeKBentriesorderminbook = round($totalSizeBytesentriesorderminbook / 1024, 2); // Convert to KB and round
        
        $entriesorderAttend = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Extra Ordinary General Meeting')
    ->where('real_file_name', 'Attendance sheet')
    ->get();
        $countentriesorderAttend = $entriesorderAttend->count(); // Count of entries
        $totalSizeBytesentriesorderAttend = $entriesorderAttend->sum('file_size'); // Sum of file sizes
        $totalSizeKBentriesorderAttend = round($totalSizeBytesentriesorderAttend / 1024, 2); // Convert to KB and round
        
            $entriesorderreso = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Extra Ordinary General Meeting')
    ->where('real_file_name', 'Resolutions')
    ->get();
        $countentriesorderreso = $entriesorderreso->count(); // Count of entries
        $totalSizeBytesentriesorderreso = $entriesorderreso->sum('file_size'); // Sum of file sizes
        $totalSizeKBentriesorderreso = round($totalSizeBytesentriesorderreso / 1024, 2); // Convert to KB and round
        
        
          $entriesinnerrun = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'RUN Form')
    ->get();
            $countinnerrun = $entriesinnerrun->count();
            $totalSizeinnerrun = $entriesinnerrun->sum('file_size');
$totalSizeKBinnerrun = round($totalSizeinnerrun / 1024, 2); // Convert to KB and round

$entriesinc9 = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 9')
    ->get();
        $countentriesinc9 = $entriesinc9->count(); // Count of entries
        $totalSizeBytesentriesinc9 = $entriesinc9->sum('file_size'); // Sum of file sizes
        $totalSizeKBentrieinc9 = round($totalSizeBytesentriesinc9 / 1024, 2); // Convert to KB and round
        
        
        
         $entriesinnerspice = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'SPICe Part B')
    ->get();
        $countentriesinnerspice = $entriesinnerspice->count(); // Count of entries
        $totalSizeBytesentriesinnerspice = $entriesinnerspice->sum('file_size'); // Sum of file sizes
        $totalSizeKBentrieinnerspice = round($totalSizeBytesentriesinnerspice / 1024, 2); // Convert to KB and round
        
        
         $entriesinnerinc33 = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 33 SPICe MoA')
    ->get();
        $countentriesinnerinc33 = $entriesinnerinc33->count(); // Count of entries
        $totalSizeBytesentriesinnerinc33 = $entriesinnerinc33->sum('file_size'); // Sum of file sizes
        $totalSizeKBentrieinnerinc33 = round($totalSizeBytesentriesinnerinc33 / 1024, 2); // Convert to KB and round
        
        
        $entriesinnerinc34 = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 34')
    ->get();
        $countentriesinnerinc34 = $entriesinnerinc34->count(); // Count of entries
        $totalSizeBytesentriesinnerinc34 = $entriesinnerinc34->sum('file_size'); // Sum of file sizes
        $totalSizeKBentrieinnerinc34 = round($totalSizeBytesentriesinnerinc34 / 1024, 2); // Convert to KB and round
        
        $entriesinnerinc35 = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 35')
    ->get();
        $countentriesinnerinc35 = $entriesinnerinc35->count(); // Count of entries
        $totalSizeBytesentriesinnerinc35 = $entriesinnerinc35->sum('file_size'); // Sum of file sizes
        $totalSizeKBentrieinnerinc35 = round($totalSizeBytesentriesinnerinc35 / 1024, 2); // Convert to KB and round
        
            $entriesinnerinc22 = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 22')
    ->get();
        $countentriesinnerinc22 = $entriesinnerinc22->count(); // Count of entries
        $totalSizeBytesentriesinnerinc22 = $entriesinnerinc22->sum('file_size'); // Sum of file sizes
        $totalSizeKBentrieinnerinc22 = round($totalSizeBytesentriesinnerinc22 / 1024, 2); // Convert to KB and round
        
        
        
        $entriesinnerinc20a = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Incorporation')
    ->where('real_file_name', 'INC 20A')
    ->get();
        $countentriesinnerinc20a = $entriesinnerinc20a->count(); // Count of entries
        $totalSizeBytesentriesinnerinc20a = $entriesinnerinc20a->sum('file_size'); // Sum of file sizes
        $totalSizeKBentrieinnerinc20a = round($totalSizeBytesentriesinnerinc20a / 1024, 2); // Convert to KB and round
        
        
         $entriesafs = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual Filings')
    ->where('real_file_name', 'AoC 4 Annual Filing Statement Form')
    ->get();
        $countentriesafs = $entriesafs->count(); // Count of entries
        $totalSizeBytesentriesafs = $entriesafs->sum('file_size'); // Sum of file sizes
        $totalSizeKBentrieafs = round($totalSizeBytesentriesafs / 1024, 2); // Convert to KB and round
        
        
         $entriescfs = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual Filings')
    ->where('real_file_name', 'AoC 4 CFS')
    ->get();
        $countentriescfs = $entriescfs->count(); // Count of entries
        $totalSizeBytesentriescfs = $entriescfs->sum('file_size'); // Sum of file sizes
        $totalSizeKBentriecfs = round($totalSizeBytesentriescfs / 1024, 2); // Convert to KB and round
        
        
        $entriesmgt7 = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual Filings')
    ->where('real_file_name', 'MGT 7')
    ->get();
        $countentriesmgt7 = $entriesmgt7->count(); // Count of entries
        $totalSizeBytesentriesmgt7 = $entriesmgt7->sum('file_size'); // Sum of file sizes
        $totalSizeKBentriemgt7 = round($totalSizeBytesentriesmgt7 / 1024, 2); // Convert to KB and round
        
         $entriesmgt7a = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Annual Filings')
    ->where('real_file_name', 'MGT 7A')
    ->get();
        $countentriesmgt7a = $entriesmgt7a->count(); // Count of entries
        $totalSizeBytesentriesmgt7a = $entriesmgt7a->sum('file_size'); // Sum of file sizes
        $totalSizeKBentriemgt7a = round($totalSizeBytesentriesmgt7a / 1024, 2); // Convert to KB and round
        
        $entriesbank = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Bank Account Statements%')
        ->where('real_file_name', 'Bank account statement')
    ->get();
        $countbank = $entriesbank->count();
        $totalSizeBytesbank = $entriesbank->sum('file_size');
        $totalSizeKBbank = round($totalSizeBytesbank / 1024, 2);
        
        
        
        
        
        $entriesdirectorappointmentsdir3din = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Appointments')
    ->where('real_file_name', 'DIR-3 form/ DIN number')
    ->get();
        $countdirectorappointmentsdir3din = $entriesdirectorappointmentsdir3din->count();
        $totalSizeBytesdirectorappointmentsdir3din = $entriesdirectorappointmentsdir3din->sum('file_size');
        $totalSizeKBdirectorappointmentsdir3din = round($totalSizeBytesdirectorappointmentsdir3din / 1024, 2);
        
        
        
        $entriesdirectorappointmentsdir3 = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Appointments')
    ->where('real_file_name', 'DIR 3 KYC')
    ->get();
        $countdirectorappointmentsdir3 = $entriesdirectorappointmentsdir3->count();
        $totalSizeBytesdirectorappointmentsdir3 = $entriesdirectorappointmentsdir3->sum('file_size');
        $totalSizeKBdirectorappointmentsdir3 = round($totalSizeBytesdirectorappointmentsdir3 / 1024, 2);
        
        
        $entriesdirectorappointmentsdir6 =CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Appointments')
    ->where('real_file_name', 'DIR 6 form')
    ->get();
        $countdirectorappointmentsdir6 = $entriesdirectorappointmentsdir6->count();
        $totalSizeBytesdirectorappointmentsdir6 = $entriesdirectorappointmentsdir6->sum('file_size');
        $totalSizeKBdirectorappointmentsdir6 = round($totalSizeBytesdirectorappointmentsdir6 / 1024, 2);
        
        $entriesdirectorappointmentsdir12 = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Appointments')
    ->where('real_file_name', 'DIR 12 form')
    ->get();
        $countdirectorappointmentsdir12 = $entriesdirectorappointmentsdir12->count();
        $totalSizeBytesdirectorappointmentsdir12 = $entriesdirectorappointmentsdir12->sum('file_size');
        $totalSizeKBdirectorappointmentsdir12 = round($totalSizeBytesdirectorappointmentsdir12 / 1024, 2);
        
        
         $entriescreditcardstatement = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Credit Card Statement%')
        ->where('real_file_name', 'Add Credit Card Statements')
    ->get();
        $countdcreditcardstatement = $entriescreditcardstatement->count();
        $totalSizeBytescreditcardstatement = $entriescreditcardstatement->sum('file_size');
        $totalSizeKBcreditcardstatement = round($totalSizeBytescreditcardstatement / 1024, 2);
        
        $entriesfixeddepoiststatement = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Fixed Deposit Statements%')
    ->where('real_file_name', 'Fixed Deposit Account Statement')
    ->get();
        $countfixeddepoiststatement = $entriesfixeddepoiststatement->count();
        $totalSizeBytesfixeddepoiststatement = $entriesfixeddepoiststatement->sum('file_size');
        $totalSizeKBfixeddepoiststatement = round($totalSizeBytesfixeddepoiststatement / 1024, 2);
        
        
        $entriesmutualfundstatement = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Mutual Fund Statements%')
    ->where('real_file_name', 'Add Mutual Fund Statements')
    ->get();
        $countmutualfundstatement = $entriesmutualfundstatement->count();
        $totalSizeBytesmutualfundstatement = $entriesmutualfundstatement->sum('file_size');
        $totalSizeKBmutualfundstatement = round($totalSizeBytesmutualfundstatement / 1024, 2);
        
        
      $entriesdirectorresignationdir11 = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Resignation')
    ->where('real_file_name', 'DIR 11 form')
    ->get();
        $countdirectorresignationdir11 = $entriesdirectorresignationdir11->count();
        $totalSizeBytesdirectorresignationdir11 = $entriesdirectorresignationdir11->sum('file_size');
        $totalSizeKBdirectorresignationdir11 = round($totalSizeBytesdirectorresignationdir11 / 1024, 2);
        
        
        
        $entriesdirectorresignationdir12 = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Director Resignation')
    ->where('real_file_name', 'DIR 12 form')
    ->get();
        $countdirectorresignationdir12 = $entriesdirectorresignationdir12->count();
        $totalSizeBytesdirectorresignationdir12 = $entriesdirectorresignationdir12->sum('file_size');
        $totalSizeKBdirectorresignationdir12 = round($totalSizeBytesdirectorresignationdir12 / 1024, 2);
        
        
        $entriesdepositundertakingsFormDPT3 = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Deposit Undertakings')
    ->where('real_file_name', 'Form DPT 3')
    ->get();
        $countdepositundertakingsFormDPT3 = $entriesdepositundertakingsFormDPT3->count();
        $totalSizeBytesdepositundertakingsFormDPT3 = $entriesdepositundertakingsFormDPT3->sum('file_size');
        $totalSizeKBdepositundertakingsFormDPT3 = round($totalSizeBytesdepositundertakingsFormDPT3 / 1024, 2);   
        
        
        
         $entriesAuditorExitsADT3 = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Exits')
    ->where('real_file_name', 'ADT 3 form')
    ->get();
        $countAuditorExitsADT3 = $entriesAuditorExitsADT3->count();
        $totalSizeBytesAuditorExitsADT3 = $entriesAuditorExitsADT3->sum('file_size');
        $totalSizeKBAuditorExitsADT3 = round($totalSizeBytesAuditorExitsADT3 / 1024, 2);        
        
        
        
        $entriesAuditorExitsResignletteraud = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Exits')
    ->where('real_file_name', 'Resignation letter by auditor')
    ->get();
        $countAuditorExitsResignletteraud = $entriesAuditorExitsResignletteraud->count();
        $totalSizeBytesAuditorExitsResignletteraud = $entriesAuditorExitsResignletteraud->sum('file_size');
        $totalSizeKBAuditorExitsResignletteraud = round($totalSizeBytesAuditorExitsResignletteraud / 1024, 2); 
        
        
        
        $entriesAuditorExitsResignDetofgroundsseekremaud = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Exits')
    ->where('real_file_name', 'Details of the grounds for seeking removal of auditor')
    ->get();
        $countAuditorExitsResignDetofgroundsseekremaud = $entriesAuditorExitsResignDetofgroundsseekremaud->count();
        $totalSizeBytesAuditorExitsResignDetofgroundsseekremaud = $entriesAuditorExitsResignDetofgroundsseekremaud->sum('file_size');
        $totalSizeKBAuditorExitsResignDetofgroundsseekremaud = round($totalSizeBytesAuditorExitsResignDetofgroundsseekremaud / 1024, 2);       
        
        
        
        
        
        $entriesAuditorExitsSpecialResol = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Exits')
    ->where('real_file_name', 'Special Resolution')
    ->get();
        $countAuditorExitsSpecialResol = $entriesAuditorExitsSpecialResol->count();
        $totalSizeBytesAuditorExitsSpecialResol = $entriesAuditorExitsSpecialResol->sum('file_size');
        $totalSizeKBAuditorExitsSpecialResol = round($totalSizeBytesAuditorExitsSpecialResol / 1024, 2);
        
        
         $entriesAuditorExitsADT2 = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Exits')
    ->where('real_file_name', 'ADT 2')
    ->get();
        $countAuditorExitsADT2 = $entriesAuditorExitsADT2->count();
        $totalSizeBytesAuditorExitsADT2 = $entriesAuditorExitsADT2->sum('file_size');
        $totalSizeKBAuditorExitsADT2 = round($totalSizeBytesAuditorExitsADT2 / 1024, 2);
        
        
        
        
        $entriesDirector1AadharKYC = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'Aadhar KYC')
    ->get();
        $countDirector1AadharKYC = $entriesDirector1AadharKYC->count();
        $totalSizeBytesDirector1AadharKYC = $entriesDirector1AadharKYC->sum('file_size');
        $totalSizeKBDirector1AadharKYC = round($totalSizeBytesDirector1AadharKYC / 1024, 2);
        
        
        $entriesDirector1AddressProof = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'Address Proof')
    ->get();
        $countDirector1AddressProof = $entriesDirector1AddressProof->count();
        $totalSizeBytesDirector1AddressProof = $entriesDirector1AddressProof->sum('file_size');
        $totalSizeKBDirector1AddressProof = round($totalSizeBytesDirector1AddressProof / 1024, 2);
        
        
        
        $entriesDirector1ContactDetails = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'Contact Details')
    ->get();
        $countDirector1ContactDetails = $entriesDirector1ContactDetails->count();
        $totalSizeBytesDirector1ContactDetails = $entriesDirector1ContactDetails->sum('file_size');
        $totalSizeKBDirector1ContactDetails = round($totalSizeBytesDirector1ContactDetails / 1024, 2);
        
        
        
        $entriesDirector1PANKYC = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'PAN KYC')
    ->get();
        $countDirector1PANKYC = $entriesDirector1PANKYC->count();
        $totalSizeBytesDirector1PANKYC = $entriesDirector1PANKYC->sum('file_size');
        $totalSizeKBDirector1PANKYC = round($totalSizeBytesDirector1PANKYC / 1024, 2);
        
        
        $entriesDirector1Photo = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'Photo')
    ->get();
        $countDirector1Photo = $entriesDirector1Photo->count();
        $totalSizeBytesDirector1Photo = $entriesDirector1Photo->sum('file_size');
        $totalSizeKBDirector1Photo = round($totalSizeBytesDirector1Photo / 1024, 2);
        
        $entriesDirector1Signimg = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 1')
    ->where('real_file_name', 'Signature image')
    ->get();
        $countDirector1Signimg = $entriesDirector1Signimg->count();
        $totalSizeBytesDirector1Signimg = $entriesDirector1Signimg->sum('file_size');
        $totalSizeKBDirector1Signimg = round($totalSizeBytesDirector1Signimg / 1024, 2);
        
        
        
        
        
        
         $entriesDirector2AadharKYC = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'Aadhar KYC')
    ->get();
        $countDirector2AadharKYC = $entriesDirector2AadharKYC->count();
        $totalSizeBytesDirector2AadharKYC = $entriesDirector2AadharKYC->sum('file_size');
        $totalSizeKBDirector2AadharKYC = round($totalSizeBytesDirector2AadharKYC / 1024, 2);
        
        
        $entriesDirector2AddressProof = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'Address Proof')
    ->get();
        $countDirector2AddressProof = $entriesDirector2AddressProof->count();
        $totalSizeBytesDirector2AddressProof = $entriesDirector2AddressProof->sum('file_size');
        $totalSizeKBDirector2AddressProof = round($totalSizeBytesDirector2AddressProof / 1024, 2);
        
        
        
        $entriesDirector2ContactDetails = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'Contact Details')
    ->get();
        $countDirector2ContactDetails = $entriesDirector2ContactDetails->count();
        $totalSizeBytesDirector2ContactDetails = $entriesDirector2ContactDetails->sum('file_size');
        $totalSizeKBDirector2ContactDetails = round($totalSizeBytesDirector2ContactDetails / 1024, 2);
        
        
        
        $entriesDirector2PANKYC = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'PAN KYC')
    ->get();
        $countDirector2PANKYC = $entriesDirector2PANKYC->count();
        $totalSizeBytesDirector2PANKYC = $entriesDirector2PANKYC->sum('file_size');
        $totalSizeKBDirector2PANKYC = round($totalSizeBytesDirector2PANKYC / 1024, 2);
        
        
        $entriesDirector2Photo = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'Photo')
    ->get();
        $countDirector2Photo = $entriesDirector2Photo->count();
        $totalSizeBytesDirector2Photo = $entriesDirector2Photo->sum('file_size');
        $totalSizeKBDirector2Photo = round($totalSizeBytesDirector2Photo / 1024, 2);
        
        $entriesDirector2Signimg = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Director Details / Director 2')
    ->where('real_file_name', 'Signature image')
    ->get();
        $countDirector2Signimg = $entriesDirector2Signimg->count();
        $totalSizeBytesDirector2Signimg = $entriesDirector2Signimg->sum('file_size');
        $totalSizeKBDirector2Signimg = round($totalSizeBytesDirector2Signimg / 1024, 2);
        
        
        $entriesIncorporationArtofAssoc = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'Articles of Association')
    ->get();
        $countIncorporationArtofAssoc = $entriesIncorporationArtofAssoc->count();
        $totalSizeBytesIncorporationArtofAssoc = $entriesIncorporationArtofAssoc->sum('file_size');
        $totalSizeKBIncorporationArtofAssoc = round($totalSizeBytesIncorporationArtofAssoc / 1024, 2);
        
        // dd($entriesIncorporationArtofAssoc);
        $entriesIncorporationCertifofincorp = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Charter documents / Incorporation')
    ->where('real_file_name', 'Certificate of incorporation')
    ->get();
    // dd($entriesIncorporationCertifofincorp);
        $countIncorporationCertifofincorp = $entriesIncorporationCertifofincorp->count();
        $totalSizeBytesIncorporationCertifofincorp = $entriesIncorporationCertifofincorp->sum('file_size');
        $totalSizeKBIncorporationCertifofincorp = round($totalSizeBytesIncorporationCertifofincorp / 1024, 2);
        
        
        
        
        $entriesIncorporationMemoofAssoc = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'Memorandum of Association')
    ->get();
        $countIncorporationMemoofAssoc = $entriesIncorporationMemoofAssoc->count();
        $totalSizeBytesIncorporationMemoofAssoc = $entriesIncorporationMemoofAssoc->sum('file_size');
        $totalSizeKBIncorporationMemoofAssoc = round($totalSizeBytesIncorporationMemoofAssoc / 1024, 2);
        
        
         $entriesIncorporationPartnerdeed = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'Partnership deed')
    ->get();
        $countIncorporationPartnerdeed = $entriesIncorporationPartnerdeed->count();
        $totalSizeBytesIncorporationPartnerdeed = $entriesIncorporationPartnerdeed->sum('file_size');
        $totalSizeKBIncorporationPartnerdeed = round($totalSizeBytesIncorporationPartnerdeed / 1024, 2);
        
        
        $entriesIncorporationLLPAgreement = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'LLP Agreement')
    ->get();
        $countIncorporationLLPAgreement = $entriesIncorporationLLPAgreement->count();
        $totalSizeBytesIncorporationLLPAgreement = $entriesIncorporationLLPAgreement->sum('file_size');
        $totalSizeKBIncorporationLLPAgreement = round($totalSizeBytesIncorporationLLPAgreement / 1024, 2);
        
        
        $entriesIncorporationTrustDeed = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'Trust Deed')
    ->get();
        $countIncorporationTrustDeed = $entriesIncorporationTrustDeed->count();
        $totalSizeBytesIncorporationTrustDeed = $entriesIncorporationTrustDeed->sum('file_size');
        $totalSizeKBIncorporationTrustDeed = round($totalSizeBytesIncorporationTrustDeed / 1024, 2);
        
        
        $entriesIncorporationSharecertifF = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Incorporation')
    ->where('real_file_name', 'Share certificates')
    ->get();
        $countIncorporationSharecertifF = $entriesIncorporationSharecertifF->count();
        $totalSizeBytesIncorporationSharecertifF = $entriesIncorporationSharecertifF->sum('file_size');
        $totalSizeKBIncorporationSharecertifF = round($totalSizeBytesIncorporationSharecertifF / 1024, 2);
        
        
        
        
        
        $entriescharregpan = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'PAN certificate')
    ->get();
        $countcharregpan = $entriescharregpan->count();
        $totalSizeBytescharregpan = $entriescharregpan->sum('file_size');
        $totalSizeKBcharregpan = round($totalSizeBytescharregpan / 1024, 2);
        
        
        
        
        $entriescharregtan = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'TAN certificate')
    ->get();
        $countcharregtan = $entriescharregtan->count();
        $totalSizeBytescharregtan = $entriescharregtan->sum('file_size');
        $totalSizeKBcharregtan = round($totalSizeBytescharregtan / 1024, 2);
        
        
         $entriescharregGSTIN = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'GSTIN certificate')
    ->get();
        $countcharregGSTIN = $entriescharregGSTIN->count();
        $totalSizeBytescharregGSTIN = $entriescharregGSTIN->sum('file_size');
        $totalSizeKBcharregGSTIN = round($totalSizeBytescharregGSTIN / 1024, 2);
        
        
         $entriescharregMSME = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'MSME certificate')
    ->get();
        $countcharregMSME = $entriescharregMSME->count();
        $totalSizeBytescharregMSME = $entriescharregMSME->sum('file_size');
        $totalSizeKBcharregMSME = round($totalSizeBytescharregMSME / 1024, 2);
        
        
        
        $entriescharregTrademark = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'Trademark')
    ->get();
        $countcharregTrademark = $entriescharregTrademark->count();
        $totalSizeBytescharregTrademark = $entriescharregTrademark->sum('file_size');
        $totalSizeKBcharregTrademark = round($totalSizeBytescharregTrademark / 1024, 2);
        
        
        
        $entriescharregPFC = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'Provident Fund certificate')
    ->get();
        $countcharregPFC = $entriescharregPFC->count();
        $totalSizeBytescharregPFC = $entriescharregPFC->sum('file_size');
        $totalSizeKBcharregPFC = round($totalSizeBytescharregPFC / 1024, 2);
        
        
        $entriescharregESIC = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'Employee State Insurance certificate')
    ->get();
        $countcharregESIC = $entriescharregESIC->count();
        $totalSizeBytescharregESIC = $entriescharregESIC->sum('file_size');
        $totalSizeKBcharregESIC = round($totalSizeBytescharregESIC / 1024, 2);
        
        
        $entriescharregPTC = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'Professional Tax certificate')
    ->get();
        $countcharregPTC = $entriescharregPTC->count();
        $totalSizeBytescharregPTC = $entriescharregPTC->sum('file_size');
        $totalSizeKBcharregPTC = round($totalSizeBytescharregPTC / 1024, 2);
        
        
        $entriescharregLWFC = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'Labour Welfare Fund certificate')
    ->get();
        $countcharregLWFC = $entriescharregLWFC->count();
        $totalSizeBytescharregLWFC = $entriescharregLWFC->sum('file_size');
        $totalSizeKBcharregLWFC = round($totalSizeBytescharregLWFC / 1024, 2);
        
        
        $entriescharregPP = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'LIKE', '%Taxation / Charter documents / Registrations')
    ->where('real_file_name', 'POSH Policy')
    ->get();
        $countcharregPP = $entriescharregPP->count();
        $totalSizeBytescharregPP = $entriescharregPP->sum('file_size');
        $totalSizeKBcharregPP = round($totalSizeBytescharregPP / 1024, 2);
        
        
        
        $entriesSECAABRAA = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Board Resolution for the appointment of Auditor')
    ->get();
        $countSECAABRAA = $entriesSECAABRAA->count();
        $totalSizeBytesSECAABRAA = $entriesSECAABRAA->sum('file_size');
        $totalSizeKBSECAABRAA = round($totalSizeBytesSECAABRAA / 1024, 2);
        
        
         $entriesSECAAIA = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Intimation to auditor')
    ->get();
        $countSECAAIA = $entriesSECAAIA->count();
        $totalSizeBytesSECAAIA = $entriesSECAAIA->sum('file_size');
        $totalSizeKBSECAAIA = round($totalSizeBytesSECAAIA / 1024, 2);
        
        
        
          $entriesSECAALA = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Letter of appointment')
    ->get();
        $countSECAALA = $entriesSECAALA->count();
        $totalSizeBytesSECAALA = $entriesSECAALA->sum('file_size');
        $totalSizeKBSECAALA = round($totalSizeBytesSECAALA / 1024, 2);
        
        
        
         $entriesSECAACRCAA = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Certificate as per Rule 4 and consent by Auditor for his appointment')
    ->get();
        $countSECAACRCAA = $entriesSECAACRCAA->count();
        $totalSizeBytesSECAACRCAA = $entriesSECAACRCAA->sum('file_size');
        $totalSizeKBSECAACRCAA = round($totalSizeBytesSECAACRCAA / 1024, 2);
        
        
        
                 $entriesSECAAALA = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Acceptance letter for appointment')
    ->get();
        $countSECAAALA = $entriesSECAAALA->count();
        $totalSizeBytesSECAAALA = $entriesSECAAALA->sum('file_size');
        $totalSizeKBSECAAALA = round($totalSizeBytesSECAAALA / 1024, 2);
        
        
         $entriesSECAASR = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Auditor Appointment')
    ->where('real_file_name', 'Special Resolution')
    ->get();
        $countSECAASR = $entriesSECAASR->count();
        $totalSizeBytesSECAASR = $entriesSECAASR->sum('file_size');
        $totalSizeKBSECAASR = round($totalSizeBytesSECAASR / 1024, 2);
        
        
        
         $entriesSECSRRM = CommonTable::where('user_id', $user->id)
    ->where('is_delete', 0)
    ->where('location', 'Legal / Secretarial / Statutory Registers')
    ->where('real_file_name', 'Register of Members')
    ->get();
        $countSECSRRM = $entriesSECSRRM->count();
        $totalSizeBytesSECSRRM = $entriesSECSRRM->sum('file_size');
        $totalSizeKBSECSRRM = round($totalSizeBytesSECSRRM / 1024, 2);
        
        // sandeep start here 30 sept 2024 secreterial fix path 
        $entriesSECSRROSH = CommonTable::where('user_id', $user->id)
            ->where('is_delete', 0)
            ->where('location', 'Legal / Secretarial / Statutory Registers')
            ->where('real_file_name', 'Register of Other Security Holders')
            ->get();
        $countSECSRROSH = $entriesSECSRROSH->count();
        $totalSizeBytesSECSRROSH = $entriesSECSRROSH->sum('file_size');
        $totalSizeKBSECSRROSH = round($totalSizeBytesSECSRROSH / 1024, 2);
        
        
        $entriesSECSRFR = CommonTable::where('user_id', $user->id)
            ->where('is_delete', 0)
            ->where('location', 'Legal / Secretarial / Statutory Registers')
            ->where('real_file_name', '⁠Foreign Register')
            ->get();
        $countSECSRFR = $entriesSECSRFR->count();
        $totalSizeBytesSECSRFR = $entriesSECSRFR->sum('file_size');
        $totalSizeKBSECSRFR = round($totalSizeBytesSECSRFR / 1024, 2);
        
        
        $entriesSECSRRDKMPR = CommonTable::where('user_id', $user->id)
            ->where('is_delete', 0)
            ->where('location', 'Legal / Secretarial / Statutory Registers')
            ->where('real_file_name', 'Register of Directors and KMP')
            ->get();
        $countSECSRRDKMPR = $entriesSECSRRDKMPR->count();
        $totalSizeBytesSECSRRDKMPR = $entriesSECSRRDKMPR->sum('file_size');
        $totalSizeKBSECSRRDKMPR = round($totalSizeBytesSECSRRDKMPR / 1024, 2);
        
        
        $entriesSECSRROC = CommonTable::where('user_id', $user->id)
            ->where('is_delete', 0)
            ->where('location', 'Legal / Secretarial / Statutory Registers')
            ->where('real_file_name', '⁠Register of Charges')
            ->get();
        $countSECSRROC = $entriesSECSRROC->count();
        $totalSizeBytesSECSRROC = $entriesSECSRROC->sum('file_size');
        $totalSizeKBSECSRROC = round($totalSizeBytesSECSRROC / 1024, 2);
        
        
        $entriesSECSRROD = CommonTable::where('user_id', $user->id)
            ->where('is_delete', 0)
            ->where('location', 'Legal / Secretarial / Statutory Registers')
            ->where('real_file_name', 'Register of Deposits')
            ->get();
        $countSECSRROD = $entriesSECSRROD->count();
        $totalSizeBytesSECSRROD = $entriesSECSRROD->sum('file_size');
        $totalSizeKBSECSRROD = round($totalSizeBytesSECSRROD / 1024, 2);
        
        
        $entriesSECSRRLGS = CommonTable::where('user_id', $user->id)
            ->where('is_delete', 0)
            ->where('location', 'Legal / Secretarial / Statutory Registers')
            ->where('real_file_name', 'Register of Loans, Guarantees and Securities')
            ->get();
        $countSECSRRLGS = $entriesSECSRRLGS->count();
        $totalSizeBytesSECSRRLGS = $entriesSECSRRLGS->sum('file_size');
        $totalSizeKBSECSRRLGS = round($totalSizeBytesSECSRRLGS / 1024, 2);
        
        
         $entriesSECSRROINHCN = CommonTable::where('user_id', $user->id)
            ->where('is_delete', 0)
            ->where('location', 'Legal / Secretarial / Statutory Registers')
            ->where('real_file_name', 'Register of Investments not held in Company’s name')
            ->get();
        $countSECSRROINHCN = $entriesSECSRROINHCN->count();
        $totalSizeBytesSECSRROINHCN = $entriesSECSRROINHCN->sum('file_size');
        $totalSizeKBSECSRROINHCN = round($totalSizeBytesSECSRROINHCN / 1024, 2);
        
        
        $entriesSECSRRCDI = CommonTable::where('user_id', $user->id)
            ->where('is_delete', 0)
            ->where('location', 'Legal / Secretarial / Statutory Registers')
            ->where('real_file_name', '⁠Register of Contracts in which Directors are interested')
            ->get();
        $countSECSRRCDI = $entriesSECSRRCDI->count();
        $totalSizeBytesSECSRRCDI = $entriesSECSRRCDI->sum('file_size');
        $totalSizeKBSECSRRCDI = round($totalSizeBytesSECSRRCDI / 1024, 2);
        
        
        $entriesSECSRRSES = CommonTable::where('user_id', $user->id)
            ->where('is_delete', 0)
            ->where('location', 'Legal / Secretarial / Statutory Registers')
            ->where('real_file_name', 'Register of Sweat Equity Shares')
            ->get();
        $countSECSRRSES = $entriesSECSRRSES->count();
        $totalSizeBytesSECSRRSES = $entriesSECSRRSES->sum('file_size');
        $totalSizeKBSECSRRSES = round($totalSizeBytesSECSRRSES / 1024, 2);
        
        
        $entriesSECSRRESO = CommonTable::where('user_id', $user->id)
            ->where('is_delete', 0)
            ->where('location', 'Legal / Secretarial / Statutory Registers')
            ->where('real_file_name', 'Register of Employee Stock Options')
            ->get();
        $countSECSRRESO = $entriesSECSRRESO->count();
        $totalSizeBytesSECSRRESO = $entriesSECSRRESO->sum('file_size');
        $totalSizeKBSECSRRESO = round($totalSizeBytesSECSRRESO / 1024, 2);
        
        
        $entriesSECSRROSBB = CommonTable::where('user_id', $user->id)
            ->where('is_delete', 0)
            ->where('location', 'Legal / Secretarial / Statutory Registers')
            ->where('real_file_name', 'Register of Securities Bought Back')
            ->get();
        $countSECSRROSBB = $entriesSECSRROSBB->count();
        $totalSizeBytesSECSRROSBB = $entriesSECSRROSBB->sum('file_size');
        $totalSizeKBSECSRROSBB = round($totalSizeBytesSECSRROSBB / 1024, 2);
        
        
        $entriesSECSRRRDSC = CommonTable::where('user_id', $user->id)
            ->where('is_delete', 0)
            ->where('location', 'Legal / Secretarial / Statutory Registers')
            ->where('real_file_name', 'Register of Renewed or Duplicate Share Certificates')
            ->get();
        $countSECSRRRDSC = $entriesSECSRRRDSC->count();
        $totalSizeBytesSECSRRRDSC = $entriesSECSRRRDSC->sum('file_size');
        $totalSizeKBSECSRRRDSC = round($totalSizeBytesSECSRRRDSC / 1024, 2);
        
        
        $entriesSECSRRSBO = CommonTable::where('user_id', $user->id)
            ->where('is_delete', 0)
            ->where('location', 'Legal / Secretarial / Statutory Registers')
            ->where('real_file_name', 'Register of SBO')
            ->get();
        $countSECSRRSBO = $entriesSECSRRSBO->count();
        $totalSizeBytesSECSRRSBO = $entriesSECSRRSBO->sum('file_size');
        $totalSizeKBSECSRRSBO = round($totalSizeBytesSECSRRSBO / 1024, 2);
        
        
        $entriesSECSRRPB = CommonTable::where('user_id', $user->id)
            ->where('is_delete', 0)
            ->where('location', 'Legal / Secretarial / Statutory Registers')
            ->where('real_file_name', 'Register of Postal Ballot')
            ->get();
        $countSECSRRPB = $entriesSECSRRPB->count();
        $totalSizeBytesSECSRRPB = $entriesSECSRRPB->sum('file_size');
        $totalSizeKBSECSRRPB = round($totalSizeBytesSECSRRPB / 1024, 2);
        

        
        
        
        // sandeep end here 30 sept 2024
        
        
        
        $user = auth()->user();
         $userRole = $user->role; // Ensure 'role' field exists in the users table
    
    // Check if the user's role exists in the roles array
    $user = auth()->user();
    
    // Get the user's role from the users table
    $userRole = $user->role; // Ensure 'role' field exists in the users table
    
    // Find the UserRole record where the role matches the user's role
    $userRoleRecord = UserRole::where('role', $userRole)->first();
        
        
        return view('docurepo', compact('totalSizeKBdirectorappointmentsdir3din','countdirectorappointmentsdir3din','cli_announcements','fileCount','fileCount1','user','commondataroom','countSECAASR','totalSizeKBSECAASR','countSECAAALA','totalSizeKBSECAAALA','countSECAACRCAA','totalSizeKBSECAACRCAA','countSECAALA','totalSizeKBSECAALA','countSECAAIA','totalSizeKBSECAAIA','countSECAABRAA','totalSizeKBSECAABRAA','countcharregPP','totalSizeKBcharregPP','countcharregLWFC','totalSizeKBcharregLWFC','countcharregPTC','totalSizeKBcharregPTC','countcharregESIC','totalSizeKBcharregESIC','countcharregPFC','totalSizeKBcharregPFC','countcharregTrademark','totalSizeKBcharregTrademark','countcharregMSME','totalSizeKBcharregMSME','countcharregGSTIN','totalSizeKBcharregGSTIN','countcharregtan','totalSizeKBcharregtan','countcharregpan','totalSizeKBcharregpan','countIncorporationSharecertifF',
        'totalSizeKBIncorporationSharecertifF','countIncorporationTrustDeed'
        ,'totalSizeKBIncorporationTrustDeed','countIncorporationLLPAgreement',
        'totalSizeKBIncorporationLLPAgreement','countIncorporationPartnerdeed',
        'totalSizeKBIncorporationPartnerdeed','countIncorporationMemoofAssoc',
        'totalSizeKBIncorporationMemoofAssoc','countIncorporationCertifofincorp',
        'totalSizeKBIncorporationCertifofincorp','countIncorporationArtofAssoc',
        'totalSizeKBIncorporationArtofAssoc','countDirector2Signimg','totalSizeKBDirector2Signimg',
        'countDirector2Photo','totalSizeKBDirector2Photo','countDirector2PANKYC',
        'totalSizeKBDirector2PANKYC','countDirector2AddressProof','countDirector2ContactDetails',
        'totalSizeKBDirector2ContactDetails','totalSizeKBDirector2AddressProof',
        'countDirector2AadharKYC','totalSizeKBDirector2AadharKYC','countDirector1Signimg',
        'totalSizeKBDirector1Signimg','countDirector1Photo','totalSizeKBDirector1Photo',
        'countDirector1PANKYC','totalSizeKBDirector1PANKYC','countDirector1AddressProof',
        'countDirector1ContactDetails','totalSizeKBDirector1ContactDetails','totalSizeKBDirector1AddressProof',
        'countDirector1AadharKYC','totalSizeKBDirector1AadharKYC','countAuditorExitsADT2',
        'totalSizeKBAuditorExitsADT2','countAuditorExitsSpecialResol','totalSizeKBAuditorExitsSpecialResol',
        'countAuditorExitsResignDetofgroundsseekremaud','totalSizeKBAuditorExitsResignDetofgroundsseekremaud',
        'countAuditorExitsADT3','countAuditorExitsResignletteraud','totalSizeKBAuditorExitsResignletteraud',
        'totalSizeKBAuditorExitsADT3','countdepositundertakingsFormDPT3','totalSizeKBdepositundertakingsFormDPT3','files4',
        'countdirectorresignationdir11','totalSizeKBdirectorresignationdir11','countdirectorresignationdir12',
        'totalSizeKBdirectorresignationdir12','countmutualfundstatement','totalSizeKBmutualfundstatement',
        'countfixeddepoiststatement','totalSizeKBfixeddepoiststatement','countdcreditcardstatement','totalSizeKBcreditcardstatement',
        'countdirectorappointmentsdir12','totalSizeKBdirectorappointmentsdir12','countdirectorappointmentsdir6',
        'totalSizeKBdirectorappointmentsdir6','countdirectorappointmentsdir3','totalSizeKBdirectorappointmentsdir3',
        'countbank','totalSizeKBbank',
        'countentriesmgt7a','totalSizeKBentriemgt7a','countentriesmgt7',
        'totalSizeKBentriemgt7','countentriescfs','totalSizeKBentriecfs',
        'countentriesafs','countentriesinnerinc20a','totalSizeKBentrieafs',
        'totalSizeKBentrieinnerinc20a','totalSizeKBentrieinnerinc22',
        'countentriesinnerinc22','countentriesinnerinc35','totalSizeKBentrieinnerinc35',
        'countentriesinnerinc34','totalSizeKBentrieinnerinc34','countentriesinnerinc33',
        'totalSizeKBentrieinnerinc33','countentriesinnerspice','totalSizeKBentrieinnerspice',
        'totalSizeKBentrieinc9','countentriesinc9','countinnerrun','totalSizeKBinnerrun',
        'allFolders', 'parentFolders', 'folders', 'latestFolderPath','moadoc','count',
        'totalSizeKB','totalSizeKBMinbooks','countMinbooks','countentriesreso',
        'totalSizeKBentriesreso','countentriesas','totalSizeKBentriesas','countentriesnomeet',
        'totalSizeKBentriesnomeet','countentriesminbookmeet','totalSizeKBentriesminbookmeet',
        'countentriesasmeet','totalSizeKBentriesasmeet','countentriesresomeet',
        'totalSizeKBentriesresomeet','countentriesordernotice','totalSizeKBentriesordernotice',
        'countentriesorderminbook','totalSizeKBentriesorderminbook','countentriesorderAttend',
        'totalSizeKBentriesorderAttend','countentriesorderreso','totalSizeKBentriesorderreso',
        'countSECSRRM','totalSizeKBSECSRRM',
        'countSECSRROSH','totalSizeKBSECSRROSH','countSECSRFR','totalSizeKBSECSRFR','countSECSRRDKMPR','totalSizeKBSECSRRDKMPR',
        'countSECSRROC','totalSizeKBSECSRROC','countSECSRROD','totalSizeKBSECSRROD','countSECSRRLGS','totalSizeKBSECSRRLGS',
        'countSECSRROINHCN','totalSizeKBSECSRROINHCN','countSECSRRCDI','totalSizeKBSECSRRCDI','countSECSRRSES','totalSizeKBSECSRRSES',
        'countSECSRRESO','totalSizeKBSECSRRESO','countSECSRROSBB','totalSizeKBSECSRROSBB','countSECSRRRDSC','totalSizeKBSECSRRRDSC',
        'countSECSRRSBO','totalSizeKBSECSRRSBO','countSECSRRPB','totalSizeKBSECSRRPB'));
    }
    
//     public function filterContents(Request $request)
// {
//     $sortOption = $request->get('sortOption');

//     // Fetch folder contents (adjust according to your model/structure)
//     $folders = Folder::all();

//     // Apply sorting logic
//     switch ($sortOption) {
//         case 'a-to-z':
//             $folders = $folders->sortBy('name');
//             break;
//         case 'z-to-a':
//             $folders = $folders->sortByDesc('name');
//             break;
//         case 'recent':
//             $folders = $folders->sortByDesc('updated_at'); // Assuming you use 'updated_at' for recent usage
//             break;
//         default:
//             // Default sorting if needed
//             break;
//     }
// $user = auth()->user();
// $files4 = CommonTable::where('user_id', $user->id)
//     ->where('is_delete', 1)
//     ->get();
//     $userFolders = Folder::where('parent_name', $folderPath)
//                         ->where('user_id', Auth::id())
//                         ->get();

// // Combine both results
// $folderContents = $commonFolders->merge($userFolders);
//     // Return a response with filtered HTML
//     $folderHtml = $folderContents;

//     return response()->json(['folderHtml' => $folderHtml]);
// }

    
    public function getBoardNotices(Request $request)
    {
        $fyear = $request->query('fyear_board_notice');

        // Query the database for notices in the selected financial year
        $notices = BoardNotice::where('fyear', $fyear)->get();

        // Return the data as JSON
        return response()->json($notices);
    }

    public function getboardnoticeFiles()
{
     $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        $folders = Folder::where('user_id', Auth::id())->orderBy('name')->get();
        $allFolders = Folder::where('user_id', Auth::id())->orderBy('name')->get();
        $parentFolders = $allFolders->whereNull('parent_name'); 
        $latestFolderPath = Folder::where('user_id', Auth::id())->latest()->value('path');
        $userId = Auth::id();
 
   
        $files = BoardNotice::where('user_id', $userId)->get();
        $moadoc = MOA::all();
     return view('boardnotice', compact('cli_announcements', 'allFolders', 'parentFolders', 'folders', 'latestFolderPath','files','moadoc'));
   
}

    public function fetchFolderData()
    {
        $folders = Folder::where('user_id', Auth::id())->orderBy('name')->get();
        return response()->json($folders);
    }
public function fetchDataForYear(Request $request)
    {
        $selectedYear = $request->input('year');

        // Fetch records based on the selected year
        $records = Folder::whereYear('created_at', $selectedYear)
                      ->whereNull('parent_name')
                      ->get();

        // Log the records to the console
        \Log::info('Fetched records: ', $records->toArray());

        // Return the records as JSON
        return response()->json($records);
    }
public function getFolders(Request $request)
    {
     
        $folders =Folder::where('user_id', Auth::id())->orderBy('name')->get();
        return response()->json($folders);
    }
    public function fetchSubfolders(Request $request)
    {
        $path = $request->input('path');

// Fetch common subfolders where common_folder = 1
$commonSubfolders = Folder::where('parent_name', $path)
                          ->where('common_folder', 1)
                          ->get();

// Fetch the authenticated user's subfolders within the same path
$userSubfolders = Folder::where('parent_name', $path)
                        ->where('user_id', Auth::id())
                        ->get();

// Combine both results
$subfolders = $commonSubfolders->merge($userSubfolders);
    
        $html = '';
        foreach ($subfolders as $folder) {
            
            // 11 sept 2024 sandeep merge here start
            // if (strpos($folder->path, '_') !== false) {
            //     // Find the position of the '_' character
            //     $dash_position = strpos($folder->path, '_');
                
            //     // Get the substring after the '-'
            //     $replacedPath = substr($folder->path, $dash_position + 1);
            //     $folder->path = $replacedPath ;
                
            // }
            // else{
            //     $folder->path = $folder->path;
            // }
            
            if (strpos($folder->name, '_') !== false) {
                // Find the position of the '-' character
                $dash_position_name = strpos($folder->name, '_');
                
                // Get the substring after the '-'
                $replacedName = substr($folder->name, $dash_position_name + 1);
                $folder->name = $replacedName ;
                
            }
            else{
                $folder->name = $folder->name;
            }
            // 11 sept 2024 sandeep merge here end 
            
            
            $html .= '<li class="dropdown">';
             $html .= '<b class="toggle_icconn" data-folder-path="' . $folder->path . '"></b>';
            $html .= '<a href="#" class="folder-link" id="subfold" data-folder-path="' . $folder->path . '">';
            $html .= '<svg class="d_fadee" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.635 3.5525L6.01912 3.9375H10.9375C11.2856 3.9375 11.6194 4.07578 11.8656 4.32192C12.1117 4.56806 12.25 4.9019 12.25 5.25V9.625C12.25 9.9731 12.1117 10.3069 11.8656 10.5531C11.6194 10.7992 11.2856 10.9375 10.9375 10.9375H3.0625C2.7144 10.9375 2.38056 10.7992 2.13442 10.5531C1.88828 10.3069 1.75 9.9731 1.75 9.625V3.9375C1.75 3.5894 1.88828 3.25556 2.13442 3.00942C2.38056 2.76328 2.7144 2.625 3.0625 2.625H4.16237C4.33483 2.62504 4.50558 2.65906 4.66487 2.72512C4.82417 2.79118 4.96888 2.88798 5.09075 3.01L5.635 3.5525ZM0.4375 3.9375C0.4375 3.24131 0.714062 2.57363 1.20634 2.08134C1.69863 1.58906 2.36631 1.3125 3.0625 1.3125H4.16237C4.50721 1.31246 4.84868 1.38036 5.16727 1.51233C5.48586 1.6443 5.77532 1.83775 6.01912 2.08162L6.5625 2.625H10.9375C11.6337 2.625 12.3014 2.90156 12.7937 3.39384C13.2859 3.88613 13.5625 4.55381 13.5625 5.25V9.625C13.5625 10.3212 13.2859 10.9889 12.7937 11.4812C12.3014 11.9734 11.6337 12.25 10.9375 12.25H3.0625C2.36631 12.25 1.69863 11.9734 1.20634 11.4812C0.714062 10.9889 0.4375 10.3212 0.4375 9.625V3.9375ZM4.15625 5.6875C3.9822 5.6875 3.81528 5.75664 3.69221 5.87971C3.56914 6.00278 3.5 6.1697 3.5 6.34375C3.5 6.5178 3.56914 6.68472 3.69221 6.80779C3.81528 6.93086 3.9822 7 4.15625 7H9.84375C10.0178 7 10.1847 6.93086 10.3078 6.80779C10.4309 6.68472 10.5 6.5178 10.5 6.34375C10.5 6.1697 10.4309 6.00278 10.3078 5.87971C10.1847 5.75664 10.0178 5.6875 9.84375 5.6875H4.15625Z" fill="#C5C5C5"/>
         </svg> <span>' . $folder->name . '</span></a>';
            $html .= '<ul class="dropdown-menu" id="subfolders-' . urlencode($folder->path) . '">';
            $html .= '<li>';
            $html .= '</li>';
            $html .= '</ul>';
            $html .= '</li>';
        }  
    
        $latestFolderPath = $subfolders->isNotEmpty() ? $subfolders->last()->path : null;
    
        return response()->json(['html' => $html, 'latestFolderPath' => $latestFolderPath]);
    }
    public function fetchSubfolders2(Request $request)
    {
        $path = $request->input('folderName');
$sortOption = $request->get('sortOption');  // Get the selected sorting option

// Base query for fetching folders
$commonFoldersQuery = Folder::where('parent_name', $path)
                            ->where('common_folder', 1);

$userFoldersQuery = Folder::where('parent_name', $path)
                          ->where('user_id', Auth::id());

// Apply sorting logic based on the selected sort option
switch ($sortOption) {
    case 'a-to-z':
        $commonSubfolders = $commonFoldersQuery->orderBy('name', 'asc')->get();
        $userSubfolders = $userFoldersQuery->orderBy('name', 'asc')->get();
        break;

    case 'z-to-a':
        $commonSubfolders = $commonFoldersQuery->orderBy('name', 'desc')->get();
        $userSubfolders = $userFoldersQuery->orderBy('name', 'desc')->get();
        break;

    default:
        // Default to A → Z if no valid sorting option is provided
        $commonSubfolders = $commonFoldersQuery->orderBy('name', 'asc')->get();
        $userSubfolders = $userFoldersQuery->orderBy('name', 'asc')->get();
        break;
}

// Combine both results
$subfolders = $commonSubfolders->merge($userSubfolders);

// Initialize folder HTML
$folderHtml = '<ul class="customulli">';

if ($subfolders->isNotEmpty()) {
    foreach ($subfolders as $folder) {
        // Replace underscores in the folder name
        if (strpos($folder->name, '_') !== false) {
            $dash_position_name = strpos($folder->name, '_');
            $replacedName = substr($folder->name, $dash_position_name + 1);
            $folder->name = $replacedName;
        }

        // Build folder HTML
        $folderHtml .= '<li>
                            <a href="#" class="folder-link wedcolor" data-folder-path="' . $folder->path . '">
                                <div class="folder_wraap foldreload">
                                    <img src="../assets/images/solar_folder-bold.png" id="folders" class="folder-icon" alt="Folder Icon">
                                    <span>' . $folder->name . '</span>
                                </div>
                            </a>
                        </li>';
    }
} else {
    // If no folders, show empty message
    $folderHtml = '<div class="folder_emptyy" id="folds">
                       <div class="empty_image"><img src="../assets/images/empty_folder.png" alt="img"></div>
                       <div class="empty_contnet"><h2>Looks empty here!</h2><p>Try adding or creating folder.</p></div>
                   </div>';
}

$folderHtml .= '</ul>';
    
        $latestFolderPath = $subfolders->isNotEmpty() ? $subfolders->last()->path : null;
    
        return response()->json(['html' => $folderHtml, 'latestFolderPath' => $latestFolderPath]);
    }
public function shareFolder(Request $request)
{

  
  dd($request);

    $folder = Folder::findOrFail($request->folder_id);
    $email = $request->sharepeoplemail;

    // Generate the signed URL with expiration time 
    $expiration = now()->addDays(1); // Default to 1 day
    if ($request->end_date && $request->end_time) {
        $expiration = Carbon::createFromFormat('Y-m-d H:i', "{$request->end_date} {$request->end_time}");
    }

    $signedUrl = URL::temporarySignedRoute(
        'accessFolder', // route name
        $expiration,
        ['folder' => $folder->id, 'access_type' => $request->access_type]
    );

    // Prepare the email content
    $subject = "Folder Access Link: {$folder->name}";
    $message = "You have been granted {$request->access_type} access to the folder: {$folder->name}.\n\n";
    $message .= "You can access the folder using the following link:\n";
    $message .= $signedUrl . "\n\n";
    $message .= "This link will expire on " . $expiration->format('Y-m-d H:i') . ".\n\n";
    $message .= "If you did not expect this email, please ignore it.";

    $headers = "From: ramandeep.singh@milliondox.com\r\n";
    $headers .= "Reply-To: ramandeep.singh@milliondox.com\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send the email using the PHP mail function
    if (mail($email, $subject, $message, $headers)) {
        return back()->with('success', 'Folder link shared successfully.');
    } else {
        return back()->with('error', 'Failed to send the email. Please try again.');
    }
}


    
   public function fetchFolderContents(Request $request)
    {
          $folderPath = $request->get('folderName');
        //   dd($folderPath);
    $sortOption = $request->get('sortOption');  // Get the selected sorting option
    
    $oldpath = $request->get('folderNamep');

    // Base query for fetching folders
    $commonFoldersQuery = Folder::where('parent_name', $folderPath)
                                ->where('common_folder', 1);

    $userFoldersQuery = Folder::where('parent_name', $folderPath)
                              ->where('user_id', Auth::id());

    // Apply sorting logic based on the selected sort option
    switch ($sortOption) {
        case 'a-to-z':
            $commonFolders = $commonFoldersQuery->orderBy('name', 'asc')->get();
            $userFolders = $userFoldersQuery->orderBy('name', 'asc')->get();
            break;

        case 'z-to-a':
            $commonFolders = $commonFoldersQuery->orderBy('name', 'desc')->get();
            $userFolders = $userFoldersQuery->orderBy('name', 'desc')->get();
            break;

     

        default:
            // Default to A → Z if no valid sorting option is provided
            $commonFolders = $commonFoldersQuery->orderBy('name', 'asc')->get();
            $userFolders = $userFoldersQuery->orderBy('name', 'asc')->get();
            break;
    }

    // Combine both results
    $folderContents = $commonFolders->merge($userFolders);

    // Optionally, if you want to sort the merged collection again (depends on your requirements)
    if ($sortOption === 'a-to-z' || $sortOption === 'z-to-a') {
        $folderContents = ($sortOption === 'a-to-z') ? $folderContents->sortBy('name') : $folderContents->sortByDesc('name');
    }

        $fileContents = CommonTable::where('location', $folderPath)->where('user_id', Auth::id())->where('is_delete', 0 )->get();
        // dd($fileContents);
        $foldername = "Incorporation";
        $files = UploadedFile::all();
        // Generate the HTML for folders
          if (!$folderContents->isEmpty()) {
        $folderHtml = '<ul class="customulli">';
        foreach ($folderContents as $folder) {
            
            // 11 sept sandeep merge code here start
            // $original_path = $folder->path;
        
            // if (strpos($original_path, '_') !== false) {
            //     // Find the position of the '-' character
            //     $dash_position = strpos($original_path, '_');
                
            //     // Get the substring after the '-'
            //     $replacedPath = substr($original_path, $dash_position + 1);
            //     $original_path = $replacedPath;
            //     $folder->path = $replacedPath ;
                
            // }
            // else{
            //     $original_path = $folder->path;
            //     $folder->path = $folder->path;
            // }
            
            if (strpos($folder->name, '_') !== false) {
                // Find the position of the '-' character
                $dash_position_name = strpos($folder->name, '_');
                
                // Get the substring after the '-'
                $replacedName = substr($folder->name, $dash_position_name + 1);
                $folder->name = $replacedName ;
                
            }
            else{
                $folder->name = $folder->name;
            }
            // 11 sept sandeep merge code here end
            
            
            $folderHtml .= '<li><a href="#" class="folder-link wedcolor" data-folder-path="' . $folder->path . '">
                                <div class="folder_wraap foldreload" >
                                    <img src="../assets/images/solar_folder-bold.png" id="folders" class="folder-icon" alt="Folder Icon">
                                    <span>' . $folder->name . '</span>
                                </div>
                            </a>
                                           
                        </li>';
        }
          }
          else{
             
              $folderHtml = '<div class="folder_emptyy" id="folds"><div class="empty_image"><img src="../assets/images/empty_folder.png" alt="img"></div><div class="empty_contnet"><h2>Looks empty here!</h2><p>Try adding or creating folder.</p></div></div>'; // Don't show any folder message
          }
        $folderHtml .= '</ul>';

      
    
        // Generate the HTML for files
        $fileHtml = '<div class="file-container">';
        
            
      
        if (!$fileContents->isEmpty()) {
            $fileHtml .= '<h4 class="filecontents">Custom Files</h4>';
            $fileHtml .= '<table class="table table-striped">';
            $fileHtml .= '<thead>';
            $fileHtml .= '<tr>';
            $fileHtml .= '<th>File Name</th>';
            $fileHtml .= '<th class="funtion_buttnss">Action</th>';
            $fileHtml .= '</tr>';
            $fileHtml .= '</thead>';
            $fileHtml .= '<tbody>';
            foreach ($fileContents as $file) {
                $fileHtml .= '<tr>';
                $fileHtml .= '<td>' . $file->file_name . '</td>';
                $fileHtml .= '<td class="funtion_buttnss"><a href="' . route('downloadFilecustom', $file->id) . '">
                                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M2.40625 12.25C2.00014 12.25 1.61066 12.0887 1.32349 11.8015C1.03633 11.5143 0.875 11.1249 0.875 10.7188V8.53125C0.875 8.3572 0.94414 8.19028 1.06721 8.06721C1.19028 7.94414 1.3572 7.875 1.53125 7.875C1.7053 7.875 1.87222 7.94414 1.99529 8.06721C2.11836 8.19028 2.1875 8.3572 2.1875 8.53125V10.7188C2.1875 10.8395 2.2855 10.9375 2.40625 10.9375H11.5938C11.6518 10.9375 11.7074 10.9145 11.7484 10.8734C11.7895 10.8324 11.8125 10.7768 11.8125 10.7188V8.53125C11.8125 8.3572 11.8816 8.19028 12.0047 8.06721C12.1278 7.94414 12.2947 7.875 12.4688 7.875C12.6428 7.875 12.8097 7.94414 12.9328 8.06721C13.0559 8.19028 13.125 8.3572 13.125 8.53125V10.7188C13.125 11.1249 12.9637 11.5143 12.6765 11.8015C12.3893 12.0887 11.9999 12.25 11.5938 12.25H2.40625Z" fill="#CEFFA8" />
                                      <path d="M6.34334 6.72788V1.75C6.34334 1.57595 6.41248 1.40903 6.53555 1.28596C6.65862 1.16289 6.82554 1.09375 6.99959 1.09375C7.17364 1.09375 7.34056 1.16289 7.46363 1.28596C7.5867 1.40903 7.65584 1.57595 7.65584 1.75V6.72788L9.37959 5.005C9.44049 4.9441 9.51279 4.89579 9.59236 4.86283C9.67193 4.82987 9.75722 4.81291 9.84334 4.81291C9.92947 4.81291 10.0148 4.82987 10.0943 4.86283C10.1739 4.89579 10.2462 4.9441 10.3071 5.005C10.368 5.0659 10.4163 5.1382 10.4493 5.21777C10.4822 5.29734 10.4992 5.38262 10.4992 5.46875C10.4992 5.55488 10.4822 5.64016 10.4493 5.71973C10.4163 5.7993 10.368 5.8716 10.3071 5.9325L7.46334 8.77625C7.40247 8.83721 7.33018 8.88556 7.25061 8.91856C7.17103 8.95155 7.08574 8.96853 6.99959 8.96853C6.91345 8.96853 6.82815 8.95155 6.74857 8.91856C6.669 8.88556 6.59671 8.83721 6.53584 8.77625L3.69209 5.9325C3.63119 5.8716 3.58288 5.7993 3.54992 5.71973C3.51696 5.64016 3.5 5.55488 3.5 5.46875C3.5 5.38262 3.51696 5.29734 3.54992 5.21777C3.58288 5.1382 3.63119 5.0659 3.69209 5.005C3.75299 4.9441 3.82529 4.89579 3.90486 4.86283C3.98443 4.82987 4.06972 4.81291 4.15584 4.81291C4.24197 4.81291 4.32725 4.82987 4.40682 4.86283C4.48639 4.89579 4.55869 4.9441 4.61959 5.005L6.34334 6.72788Z" fill="#CEFFA8" />
                                  </svg>
                              </a>
                              
                               <button type="button" class="delete-button" id="commondelbtdtst" data-unique_file_id="' . $file->id . '">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                </button> 
                          </td>';
                $fileHtml .= '</tr>';
            }
            $fileHtml .= '</tbody>';
            $fileHtml .= '</table>';
        }
         else {
             $fileHtml = '<div class="folder_emptyy" id="folds"><div class="empty_image"><img src="../assets/images/empty_folder.png" alt="img"></div><div class="empty_contnet"><h2>Looks empty here!</h2><p>Try adding or creating files .</p></div></div>'; // Don't show any file message
        }
        $fileHtml .= '</div>';
       
    
        return response()->json(['folderHtml' => $folderHtml,  'fileHtml' => $fileHtml]);
    }
    
    public function downloadFilecustom($id)
    {
        // Find the file record in the database
        $file = CommonTable::find($id);

        if (!$file) {
            return redirect()->back()->with('error', 'File not found.');
        }

        // Extract the file path from the database
        $filePath = $file->file_path;

        // Check if the file exists on the storage
        if (!Storage::exists($filePath)) {
            return redirect()->back()->with('error', 'File does not exist.');
        }

        // Download the file
        return Storage::download($filePath, $file->file_name);
    }
   
// public function saveBreadcrumb(Request $request) {
//     // Check if 'breadcrumb' key exists in the session
//     if (!session()->has('breadcrumb')) {
//         // Initialize 'breadcrumb' as an empty array
//         session(['breadcrumb' => []]);
//     }

//     // Safely add to the breadcrumb
//     $breadcrumb = session('breadcrumb');
//     $newBreadcrumb = [
//         'path' => $request->input('path'),
//         'name' => $request->input('name')
//     ];

//     // Add the new breadcrumb to the array
//     $breadcrumb[] = $newBreadcrumb;

//     // Save the updated breadcrumb array back to the session
//     session(['breadcrumb' => $breadcrumb]);

//     // Return the saved breadcrumbs as part of the response
//     return response()->json([
//         'message' => 'Breadcrumb saved successfully',
//         'breadcrumb' => $breadcrumb
//     ]);
// }

public function saveBreadcrumb(Request $request)
    {
        $request->validate([
            'path' => 'required|string',
            'name' => 'required|string'
        ]);
    
        if (!session()->has('breadcrumb')) {
            session(['breadcrumb' => []]);
        }
    
        $breadcrumb = session('breadcrumb');
        
        $newBreadcrumb = [
            'path' => $request->input('path'),
            'name' => $request->input('name')
        ];
    
        $breadcrumb[] = $newBreadcrumb;
        session(['breadcrumb' => $breadcrumb]);
    
        return response()->json([
            'message' => 'Breadcrumb saved successfully',
            'breadcrumb' => $breadcrumb
        ]);
    }



    // public function getBreadcrumb()
    // {
    //     // Retrieve the breadcrumb from session
    //     $breadcrumb = Session::get('breadcrumb', '');
    //     $folderPath = Session::get('folderPath', '');

    //     return response()->json([
    //         'breadcrumb' => $breadcrumb,
    //         'folderPath' => $folderPath
    //     ]);
    // }
    
      public function getBreadcrumb()
    {
        $breadcrumb = Session::get('breadcrumb', []);
        $folderPath = Session::get('folderPath', '');

        return response()->json([
            'breadcrumb' => $breadcrumb,
            'folderPath' => $folderPath
        ]);
    }


public function downloadFile($id)
{
    $file = Files::findOrFail($id);
    $filePath = storage_path('app/' . $file->path);

    if (file_exists($filePath)) {
        return response()->download($filePath, $file->name);
    } else {
        abort(404, 'File not found');
    }
}


    


    

   

    public function reposidebar()
    {
        $folders = Folder::all(); // Fetch all folders from the database
    
        return view('user.include.Repo-client-sidebar', compact( 'folders'));
    }
    
   
    



    public function salemanage()
    {
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        
       return view('user.sale-management.sale-manage',compact('cli_announcements'));
    }


   

    // public function createFolder(Request $request)
    // {
    //     $folderName = $request->input('folder_name');
    //     $new_folderName = Auth::id()."_".$folderName;
    //     $parentFolderPath = $request->input('parent_folder');

    //     $fyear = $request->input('fyear');
    //     $Month = $request->input('Month');
    
      
    //     if ($parentFolderPath) {
           
    //         $newFolderPath = $parentFolderPath . '/' . $new_folderName;
    //     } else {
    //         $newFolderPath = $new_folderName;
    //     }
    
        
    //     if (Storage::exists($newFolderPath)) {
    //         return response()->json(['success' => false, 'message' => 'Folder already exists.'], 422);
    //     }
    
      
    //     Storage::makeDirectory($newFolderPath);
    
        
    //     $folder = new Folder();
    //     $folder->name = $new_folderName;
    //     $folder->path = $newFolderPath;
    //     $folder->parent_name = $parentFolderPath;
    //     $folder->user_id = Auth::id(); 
    //     $folder->fyear = $fyear;
    //     $folder->Month = $Month;
    //     $folder->save();
    
    //     return response()->json(['success' => true, 'message' => 'Folder created successfully.']);
    // }
    
    public function createFolder(Request $request)
    {
        
        $request->validate([
            'folder_name' => ['required', 'regex:/^[a-zA-Z0-9\s\-\(\):]+$/'],
            // 'parent_folder' => ['nullable', 'regex:/^[a-zA-Z0-9\s\/&_]+$/'],
            // 'parent_folder' =>  ['nullable', 'regex:/^(\/?(?:\d{4}-\d{4}(January|February|March|April|May|June|July|August|September|October|November|December)\d+_[a-zA-Z0-9]+))*$/'],
            // 'parent_folder' =>  ['nullable', 'regex:/^(\/?(?:\d{4}-\d{4}(January|February|March|April|May|June|July|August|September|October|November|December)\d+_[a-zA-Z0-9]+|[a-zA-Z0-9\s&]+))*$/'],
            // 'parent_folder' =>  ['nullable', 'regex:/^(\/?(?:\d{4}-\d{4}(January|February|March|April|May|June|July|August|September|October|November|December)\d+_[a-zA-Z0-9-]+|[a-zA-Z0-9\s&]+))*$/'],
            'parent_folder' =>  ['nullable','regex:/^(\/?(?:\d{4}-\d{4}(January|February|March|April|May|June|July|August|September|October|November|December)\d+_[a-zA-Z0-9\-\(\):]+|[a-zA-Z0-9\s&\(\):]+))*$/'],
            'fyear' => ['required', 'regex:/^\d{4}-\d{4}$/'], // Ensures format like "2013-2014"
            'Month' => ['required', 'in:January,February,March,April,May,June,July,August,September,October,November,December'], // Ensures a valid month name
        ],
        ['parent_folder.regex' => 'The parent folder must follow the specified format: either a year-month format or a simple folder name.',
         'folder_name.regex' => 'The folder name can only contain letters, numbers, spaces, and hyphens.',
         'fyear.regex' => 'The financial year must be in the format "YYYY-YYYY", e.g., "2023-2024".',
         'Month.regex' => 'The Month must be in the format e.g., "January".',
         ]);
        
        $folderName = $request->input('folder_name');
        $new_folderName = $request->input('fyear').$request->input('Month').Auth::id()."_".$folderName;
        
        
        $parentFolderPath = $request->input('parent_folder');

        $fyear = $request->input('fyear');
        $Month = $request->input('Month');
    
      
        if ($parentFolderPath) {
           
            $newFolderPath = $parentFolderPath . '/' . $new_folderName;
        } else {
            $newFolderPath = $new_folderName;
        }
    
        
        if (Storage::exists($newFolderPath)) {
            return response()->json(['success' => false, 'message' => 'Folder already exists.'], 422);
        }
    
      
        Storage::makeDirectory($newFolderPath);
    
        
        $folder = new Folder();
        $folder->name = $new_folderName;
        $folder->path = $newFolderPath;
        $folder->parent_name = $parentFolderPath;
        $folder->user_id = Auth::id(); 
        $folder->fyear = $fyear;
        $folder->Month = $Month;
        $folder->save();
    
        return response()->json(['success' => true, 'message' => 'Folder created successfully.']);
    }
    






    // public function uploadFile(Request $request)
    // {
    //     Log::debug('Upload file request:', $request->all());
    
    //     // Extract folder path from the request
    //     $folderPath = $request->input('parent_folder');
    //     Log::debug('Extracted folder path:', ['folderPath' => $folderPath]);
    //     $fyear = $request->input('fyear');
    //     $Month = $request->input('Month');
    //     // Validate the file input
    //     $validatedData = $request->validate([
    //         'file' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
    //         'parent_folder' => 'required|string'
    //     ]);
    
    //     if (!$folderPath) {
    //         Log::error('Folder path is required.');
    //         return response()->json(['success' => false, 'message' => 'Folder path is required.']);
    //     }
    
    //     // Sanitize folder path
    //     $folderPath = rtrim($folderPath, '/');
    //     Log::debug('Sanitized folder path:', ['folderPath' => $folderPath]);
    
    //     if ($request->file('file')) {
    //         $file = $request->file('file');
    //         $fileName = $file->getClientOriginalName();
    //         Log::debug('Prepared file name:', ['fileName' => $fileName]);
    
    //         // Ensure the folder exists, create if not
    //         if (!Storage::exists($folderPath)) {
    //             Storage::makeDirectory($folderPath);
    //             Log::debug('Created directory:', ['folderPath' => $folderPath]);
    //         } else {
    //             Log::debug('Directory already exists:', ['folderPath' => $folderPath]);
    //         }
    
    //         // Store the file in the specified folder path within storage/app
    //         try {
    //             $filePath = $file->storeAs($folderPath, $fileName);
    //             Log::debug('Stored file path:', ['filePath' => $filePath]);
    
    //             // Save file details to the database
    //             try {
    //                 $fileModel = new Files();
    //                 $fileModel->file_name = $fileName;
    //                 $fileModel->path = $filePath;
    //                 $fileModel->parent_folder = $folderPath;
    //                  $fileModel->location = $folderPath;
    //                 $fileModel->user_id = Auth::id(); 
    //                  $fileModel->user_name = auth()->user()->name; 
    //                 $fileModel->fyear = $fyear;
    //                 $fileModel->Month = $Month;
    //                 $fileModel->save();
    //                 Log::debug('Saved file to database:', ['fileModel' => $fileModel]);
    
    //                 return response()->json(['success' => true, 'message' => 'File uploaded successfully.']);
    //             } catch (\Exception $e) {
    //                 Log::error('Error saving file to database:', ['error' => $e->getMessage()]);
    //                 return response()->json(['success' => false, 'message' => 'Failed to save file details to database.']);
    //             }
    //         } catch (\Exception $e) {
    //             Log::error('Error storing file:', ['error' => $e->getMessage()]);
    //             return response()->json(['success' => false, 'message' => 'Failed to upload file.']);
    //         }
    //     }
    
    //     Log::error('No file was uploaded.');
    //     return response()->json(['success' => false, 'message' => 'No file was uploaded.']);
    // }
    

public function uploadFile(Request $request)
{


    // Validate the request
    $request->validate([
        'files.*' => 'required|file|max:102400|mimes:pdf,odp,ods,ppt,doc,odt,rtf,csv,json,xml,html,ico,svg,webp,zip,xls,docx,wav,ogg,mp3,avi,mov,wmv,webm,tiff,mp4,jpg,png,gif,jpeg,3gp,mkv,flv', // Allow specific file types up to 100MB
        'tagList' => 'nullable', // Allow tagList to be nullable
    ], [
        'files.*.required' => 'Each file is required.',
        'files.*.file' => 'The uploaded item must be a valid file.',
        'files.*.max' => 'Each file may not be larger than 100MB.',
        'files.*.mimes' => 'The file type must be one of the following: PDF, ODP, ODS, PPT, DOC, ODT, RTF, CSV, JSON, XML, HTML, ICO, SVG, WEBP, ZIP, XLS, DOCX, WAV, OGG, MP3, AVI, MOV, WMV, WEBM, TIFF, MP4, JPG, PNG, GIF, JPEG, 3GP, MKV, FLV.',
    ]);

    // Check if folder path is provided
    $folderPath = $request->input('parent_folder');
    // if (!$folderPath) {
    //     return response()->json(['success' => false, 'message' => 'Folder path is required.'], 400);
    // }

    // Check if files are uploaded
    if ($request->hasFile('files')) {
        try {
            $totalSize = 0;
            $successMessages = [];
            $errorMessages = [];

            // Process each file
            foreach ($request->file('files') as $file) {
                try {
                    $filePath = $file->store('uploads');

                    // Store file details in the database
                    CommonTable::create([
                        'file_type' => $file->getClientMimeType(),
                        'file_name' => $file->getClientOriginalName(),
                        'file_size' => $file->getSize(),
                        'file_path' => $filePath,
                        'user_name' => auth()->user()->name,
                        'user_id' => auth()->user()->id,
                        'file_status' => $request->input('file_status', 0),
                        'fyear' => $request->input('fyear'),
                        'month' => $request->input('Month'),
                        'location' => $folderPath,
                        'descp' => $request->input('desc'),
                    ]);

                    $totalSize += $file->getSize();
                    $successMessages[] = "File {$file->getClientOriginalName()} uploaded successfully.";
                } catch (\Exception $e) {
                    $errorMessages[] = "Failed to save file {$file->getClientOriginalName()} to the database.";
                }
            }

            // Compile the response
            return response()->json([
                'success' => true,
                'successMessages' => $successMessages,
                'errorMessages' => $errorMessages,
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to process file uploads.'], 500);
        }
    } else {
        // No files were uploaded
        return response()->json(['success' => false, 'message' => 'No files uploaded.'], 400);
    }
}



    
public function createDataRoom(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Get the new Data Room name
        $newDataRoomName = $request->input('name');

        // Define the base folder path (e.g., 'storage/app/dataroom/')
        $baseFolderPath = storage_path('app/dataroom/');

        // Define the full folder path including the new Data Room name
        $fullFolderPath = $baseFolderPath . $newDataRoomName;

        // Create the directory if it doesn't exist
        if (!File::exists($fullFolderPath)) {
            File::makeDirectory($fullFolderPath, 0755, true);
        }

        // Create a new DataRoom entry in the database
        $dataRoom = DataRoom::create([
            'name' => $newDataRoomName,
            'folderpath' => $fullFolderPath, // Store the full folder path in the database
            'user_id' => Auth::id(),
            'file_type' => null,
            'file_name' => null,
            'real_file_name' => null,
            'file_path' => null,
            'file_size' => null,
            'user_name' => Auth::user()->name,
            'file_status' => null,
        ]);

        // Return a response, you can redirect or return a JSON response
        return redirect()->back()->with('success', 'Data Room created successfully!');
    }



    public function uploadincorporationdocs(Request $request)
    {
        $request->validate([
           
            'folder_name' => 'string',
            'file' => 'required|file',
            'user_entered_file_name' => 'required|string',
            
        ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $folderName = $request->input('folder_name');

        $document = new ChartedDocument();
        $document->doc_name = $request->input('doc_name');
        $document->upload_datetime = now();
        $document->updated_by = auth()->user()->name; // Assuming you have authentication set up
       
       
        $document->folder_name = $folderName;
        $document->original_file_name = $fileName;
        $document->user_entered_file_name = $request->input('user_entered_file_name');
        // $document->updated_at = now();
        $document->save();

        // Move the uploaded file to the specified folder
        $file->move(public_path('uploads/' . $folderName), $fileName);

        return redirect()->back()->with('success', 'Document uploaded successfully.');
    }
    
    public function viewTemplateFile($id, $fileName)
    {
        // Find the template file by ID
        $templateFile = TemplateFile::findOrFail($id);

        // Assuming you want to return the file content
        // You may need to adjust this based on how you store the file content
        $fileContent = $templateFile->file_contents;

        // Get the MIME type of the file content using finfo
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->buffer($fileContent);

        // Return the file content as a response with appropriate headers
        return response($fileContent)
            ->header('Content-Type', $mimeType)
            ->header('Content-Disposition', 'inline; filename="' . $fileName . '"'); // Display file in browser
    }
    public function admintemplate()
    {
        $announcements = Announcement::latest()->get();
        $template = TemplateFile::latest()->get();
       return view('admin.template.template',compact('announcements','template'));
    }
    public function deletetemp($id)
{
    // Find the announcement by ID
    $pol = TemplateFile::find($id);

    if (!$pol) {
        // Handle the case where the announcement does not exist
        return redirect()->route('home')->with('error', 'Record not found.');
    }

    // Delete the announcement
    $pol->delete();

    // Redirect back to the home page with a success message
    return redirect()->back()->with('success', 'Record deleted successfully.');
}
public function downloadTemplateFile($id, $fileName)
{
    $policy = TemplateFile::findOrFail($id);

    // Ensure the file path is properly sanitized and validated
    $filePath = Storage::path($policy->file_path);

    // Generate a custom file name with the employee name and "ope"
    $fFileName = $fileName;

    return response()->file($filePath, [
        'Content-Type' => 'application/octet-stream',
        'Content-Disposition' => 'attachment; filename="' . rawurlencode($fFileName) . '"',
    ]);
}
public function uploadTemplate(Request $request)
{
    try {
        $validatedData = $request->validate([
            'template.*' => 'file|mimes:pdf,doc,docx|max:2048',
            'file_name' => 'required|string|max:255',
        ]);

        if ($request->hasFile('template')) {
            $files = $request->file('template');
            $name = $request->file_name;
            $ttype = $request->template_type;

            foreach ($files as $file) {
                if ($file->isValid()) {
                    $filename = $file->getClientOriginalName();
                    $fileContents = file_get_contents($file);
                    $filePath = $file->store('template_files'); // Store the file and get the path

                    TemplateFile::create([
                        'filename' => $filename,
                        'file_contents' => $fileContents,
                        'file_path' => $filePath,
                        'file_name' => $name,
                        'template_type' => $ttype, // Store the file name
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Files uploaded successfully.');
        }

        return redirect()->back()->with('error', 'No files selected.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'An error occurred while uploading files.');
    }
}
public function updateFavoriteStatus($templateId, $newFavoriteStatus)
    {
        // Find the template by ID
        $template = TemplateFile::find($templateId);

        // If the template exists
        if ($template) {
            // Update the favorite status
            $template->favorite = $newFavoriteStatus;
            $template->save();

            // Return a JSON response indicating success
            return response()->json(['success' => true, 'message' => 'Favorite status updated successfully']);
        }

        // Return a JSON response if the template does not exist
        return response()->json(['success' => false, 'message' => 'Template not found'], 404);
    }
    public function empnotification()
{
    // Get the ID of the authenticated user
    $userId = auth()->user()->id;

    // Fetch announcements where user_id does not match or is null
    $empl_announcements = Announcement::latest()->get();

   

    return view('employee.notification.notification', compact('empl_announcements'));
}

public function policymanual()
{
    $policy = PolicyFile::latest()->get();
            $announcements = Announcement::latest()->get();

     return view('admin.policymanual.index',compact('policy','announcements'));
}
    
    public function clientsview()
    {
        // $clients = DB::table('users')
        //         ->join('assignments', 'users.id', '=', 'assignments.client_id' )
        //         ->select('users.*', 'assignments.*') // Select the columns you need
               
        //         ->get();
        $clients = UserInfo::where('role', 'Client')->get();  
                // foreach ($clients as $client) {
                //     $employee = null;
                //     if ($client->employee_id) {
                //         // Fetch the employee data if employee_id is not null
                //         $employee = DB::table('users')->where('id', $client->employee_id)->first();
                //     }
            
                //     $client->employee_name = $employee ? $employee->name : 'No Employee Found';
                // }
                $announcements = Announcement::latest()->get();
        return view('admin/client/list',compact('clients','announcements'));
    }

    public function admindse()
    {
        
        $clients = User::where('role', 'Client')->get(); 
       $dataModels = DB::table('data_models')
    ->leftJoin('users', 'users.id', '=', 'data_models.client_id')
    ->select('data_models.*', 'users.name')
    ->whereNull('data_models.client_id')
    ->orWhereNotNull('data_models.client_id')
    ->get();

    $announcements = Announcement::latest()->get();

    // dd($dataModels);
        return view('admin/dsc/index',compact('clients','dataModels','announcements'));
    }

    public function storedse(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            // 'client_id' => 'required',
            'directorname' => 'required|string',
            // 'din_number' => 'string',
            'valid_from' => 'required|date', 
            'valid_till' => 'required|date',
            'dsc_location' => 'required|string',
            // 'expiry_status' => 'string',
            // 'renewal' => 'required|string',
            // 'mobile_no' => 'required',
            // 'email' => 'required',
            // 'father_name' => 'required',
            // 'pan_file' => 'required',
            // 'aadhar_file' => 'required',
            // 'profile_file' => 'required',
        ]);
    $panFilePath = null;
$aadharFilePath = null;
$profileFilePath = null;
      if ($request->hasFile('pan_file')) {
    $panFilePath = $request->file('pan_file')->store('uploads');
}

if ($request->hasFile('aadhar_file')) {
    $aadharFilePath = $request->file('aadhar_file')->store('uploads');
}

if ($request->hasFile('profile_file')) {
    $profileFilePath = $request->file('profile_file')->store('uploads');
}


    // Create a new DataModel instance and fill it with the validated data
    $dataModel = new DataModel([
        'client_id' => $request->client_id,
        'Nonclient' => $request->Nonclient,
        'directorname' => $validatedData['directorname'],
        'din_number' => $request->din_number,
        'valid_from' => $validatedData['valid_from'],
        'valid_till' => $validatedData['valid_till'],
        'expiry_status' => $request->expiry_status,
        'renewal' => $request->renewal,
        'mobile_no' => $request->mobile_no,
        'email' => $request->email,
        'father_name' => $request->father_name,
        'dsc_location' => $request->dsc_location,
        'pan_file_path' => $panFilePath,
        'aadhar_file_path' => $aadharFilePath,
        'profile_file_path' => $profileFilePath,
    ]);

    // Save the data to the database
    $dataModel->save();
    
        // Redirect back with a success message (you can customize this)
        return redirect()->back()->with('success', 'Data added successfully.');
    }

public function assignClient(Request $request) {
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'client_id' => 'required|array',
        'employee_id' => 'required|string|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/admin/employees')
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Validation failed');
    }

    $employeeId = $request->input('employee_id');
    $selectedClientIds = $request->input('client_id');
    $alreadyAssignedCount = 0;
    $newlyAssignedCount = 0;

    // Loop through the selected client IDs
    foreach ($selectedClientIds as $clientId) {
        $existingAssignment = Assignment::where('client_id', $clientId)
            ->where('employee_id', $employeeId)
            ->first();

        if ($existingAssignment) {
            $alreadyAssignedCount++;
        } else {
            // If no assignment exists, create a new one
            Assignment::create([
                'employee_id' => $employeeId,
                'client_id' => $clientId,
            ]);
            $newlyAssignedCount++;
        }
    }

    if ($request->ajax()) {
        return response()->json(['message' => 'Client(s) assigned successfully']);
    }

    $announcements = Announcement::all();

    $message = $newlyAssignedCount . ' client(s) assigned successfully. ' . $alreadyAssignedCount . ' client(s) were already assigned to the employee.';

    return redirect('/admin/employees')->with([
        'success' => $message,
        'announcements' => $announcements,
    ]);
}


public function uploadPolicy(Request $request)
{
    try {
        $validatedData = $request->validate([
            'policy.*' => 'file|mimes:pdf,doc,docx|max:2048',
            'file_name' => 'required|string|max:255',
        ]);

        if ($request->hasFile('policy')) {
            $files = $request->file('policy');
            $name = $request->file_name;

            foreach ($files as $file) {
                if ($file->isValid()) {
                    $filename = $file->getClientOriginalName();
                    $fileContents = file_get_contents($file);
                    $filePath = $file->store('policy_files'); // Store the file and get the path

                    PolicyFile::create([
                        'filename' => $filename,
                        'file_contents' => $fileContents,
                        'file_path' => $filePath,
                        'file_name' => $name, // Store the file name
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Files uploaded successfully.');
        }

        return redirect()->back()->with('error', 'No files selected.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'An error occurred while uploading files.');
    }
}

public function welcomewallet()
{
       $user = auth()->user();
        $userId = Auth::id();
        // dd($user->role);
        
        $role = User::where('id', $userId)
                        ->where('role', $user->role)
                        ->where('Promoters_Vault_Access', 1)
                        ->first();
        // dd($role);
        
        if (!$role) {
            echo "You have no Access to Promoters Vault , Please Contact to your Account Provider";
            abort(404);  // Abort if the role is not found or access is not granted
        }
    $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
    $user = Auth::user();
    $documents = Document::where('client_id', $user->id)->get();
     $user = auth()->user();
    // Get the user's role from the users table
    $userRole = $user->role; // Ensure 'role' field exists in the users table
    
    // Check if the user's role exists in the roles array
    $user = auth()->user();
    
    // Get the user's role from the users table
    $userRole = $user->role; // Ensure 'role' field exists in the users table
    
    // Find the UserRole record where the role matches the user's role
    $userRoleRecord = UserRole::where('role', $userRole)->first();
   
   return view('user/promoter-wallet/welcome-vault',compact('cli_announcements','documents','user'));
}
public function downloadPolicyFile($id, $fileName)
{
    $policy = PolicyFile::findOrFail($id);

    // Ensure the file path is properly sanitized and validated
    $filePath = Storage::path($policy->file_path);

    // Generate a custom file name with the employee name and "ope"
    $fFileName = $fileName;

    return response()->file($filePath, [
        'Content-Type' => 'application/octet-stream',
        'Content-Disposition' => 'attachment; filename="' . rawurlencode($fFileName) . '"',
    ]);
}


public function deletepol($id)
{
    // Find the announcement by ID
    $pol = PolicyFile::find($id);

    if (!$pol) {
        // Handle the case where the announcement does not exist
        return redirect()->route('home')->with('error', 'Record not found.');
    }

    // Delete the announcement
    $pol->delete();

    // Redirect back to the home page with a success message
    return redirect()->back()->with('success', 'Record deleted successfully.');
}
public function empissue()
{
    $user = Auth::user();
    
    $clients = DB::table('users as u')
    ->join('assignments as a', 'u.id', '=', 'a.client_id')
    ->where('a.employee_id', '=', $user->id)
    ->select('*')
    ->get();
        // dd($clients);
    $issue = Issue::where('employee_id', $user->id)->get();
    
    foreach ($clients as $client) {
        // Fetch the employee data if client_id is not null
        $employee = DB::table('users')->where('id', $client->employee_id)->first();

        $client->client_name = $employee ? $employee->name : 'No Employee Found';
    } 
    $empl_announcements = Announcement::where('role', 'Employee')->latest()->get();
    return view('employee/issue-tracker/list', compact('user', 'clients', 'issue','empl_announcements'));
}

public function empoutofexpense()
{
     $user = Auth::user();
     $authUserId = auth()->id();

$OutOfExpense = OutOfExpense::select('out_of_expenses.*', 'users.name as client_name')
    ->join('users', 'out_of_expenses.client_id', '=', 'users.id')
    ->where('out_of_expenses.employee_id', $authUserId)
    ->get();
// dd($OutOfExpense);
     $clients = DB::table('users as u')
    ->join('assignments as a', 'u.id', '=', 'a.client_id')
    ->where('a.employee_id', '=', $user->id)
    ->select('*')
    ->get();
    
     $empl_announcements = Announcement::where('role', 'Employee')->latest()->get();
      return view('employee/outofexpense/index',compact('user','empl_announcements','OutOfExpense','clients'));
}
public function storeoutofexpense(request $request)
    {
       $validatedData = $request->validate([
        'client_id' => 'required|integer',
        'date' => 'required|date',
        'reason' => 'required|string',
        'amount' => 'required|numeric|min:0',
        'employee_id' => 'required|integer',
        'status' => 'required|string',
        'category_of_expense' => 'required|string',
        'nature_of_expense' => 'required|string',
        'supporting_documents' => 'required|string',
        'attach_supporting_documents' => 'file',
        // Add validation for file upload
    ]);
$formattedDateTime = Carbon::now()->format('Y-m-d H:i:s');
 $outOfExpense = new OutOfExpense([
        'client_id' => $request->input('client_id'),
        'date' => $request->input('date'),
        'reason' => $request->input('reason'),
        'amount' => $request->input('amount'),
        'employee_id' => $request->input('employee_id'),
        'status' => $request->input('status'),
        'category_of_expense' => $request->input('category_of_expense'),
        'nature_of_expense' => $request->input('nature_of_expense'),
        'supporting_documents' => $request->input('supporting_documents'),
        'date_of_submission_expense' => $formattedDateTime,
    ]);

    

    // Handle file upload if a file is attached
    if ($request->hasFile('attach_supporting_documents')) {
        $file = $request->file('attach_supporting_documents');
        $filename = $file->store('attachments'); // Store the file and get its path
        $outOfExpense->attach_supporting_documents = $filename; // Save the file path in the database
    }

    // Save the OutOfExpense model to the database
    $outOfExpense->save();
     $empl_announcements = Announcement::where('role', 'Employee')->latest()->get();
        // Redirect back with a success message (you can customize this)
         return redirect('/employee/outofexpense')->with([
        'success' => 'Request created successfully',
        // 'empl_announcements' => $empl_announcements,
    ]);
    }
public function adminoutofexpense()
{
     $user = Auth::user();
     $OutOfExpense = OutOfExpense::select('out_of_expenses.*', 'employee.name as employee_name', 'client.name as client_name')
    ->join('users as employee', 'employee.id', '=', 'out_of_expenses.employee_id')
    ->join('users as client', 'client.id', '=', 'out_of_expenses.client_id')
    ->get();

    // dd($OutOfExpense);
    $announcements = Announcement::latest()->get();
      return view('admin/outofexpense/index',compact('user','announcements','OutOfExpense'));
}
public function downloadOpeFile($id, $employeeName)
{
    $policy = OutOfExpense::findOrFail($id);

    // Ensure the file path is properly sanitized and validated
    $filePath = storage_path('app/' . $policy->attach_supporting_documents);

    // Generate a custom file name with the employee name and "ope"
    $customFileName = $employeeName . '_ope_file' ;

    return response()->stream(
        function () use ($filePath) {
            echo file_get_contents($filePath);
        },
        200,
        [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="' . $customFileName . '"',
        ]
    );
}


public function empupdateoutofexpense(Request $request)
{
    $validatedData = $request->validate([
       
        'emp_id' => 'required|string',
        'attach_supporting_documents' => 'file', // Add validation for the file upload
    ]);
// $formattedDateTime = Carbon::now()->format('Y-m-d H:i:s');
    $data = [
        'date' => $request->input('date'),
        'reason' => $request->input('reason'),
        'amount' => $request->input('amount'),
        'category_of_expense' => $request->input('category_of_expense'),
        'nature_of_expense' => $request->input('nature_of_expense'),
        'supporting_documents' => $request->input('supporting_documents'),
        // 'date_of_submission_expense' => $formattedDateTime,
        'created_at' => $request->input('created_at'),
       
        
    ];

    // Handle file upload
    if ($request->hasFile('attach_supporting_documents')) {
        $file = $request->file('attach_supporting_documents');
        $filePath = $file->store('uploads'); // Adjust the storage path as needed
        $data['attach_supporting_documents'] = $filePath;
    }

    // Use updateOrInsert to update or insert the record based on the 'id'
    $adminoutexp = OutOfExpense::updateOrInsert(
        ['id' => $request->input('emp_id')],
        $data
    );

    return redirect('/employee/outofexpense')->with([
        'success' => 'Request updated successfully',
    ]);
}
public function empupdatetimesheet(Request $request)
{
    $validatedData = $request->validate([
       
        'timesheettxt' => 'string',
        'spenttime' => 'string',
        'date_of_work' => 'date', // Add validation for the file upload
    ]);

    $data = [
        'timesheet_txt' => $request->input('timesheettxt'),
        'spenttime' => $request->input('spenttime'),
        'date_of_work' => $request->input('date_of_work'),
        
        
    ];

    

    // Use updateOrInsert to update or insert the record based on the 'id'
    $emptimes = TimeSheet::updateOrInsert(
        ['id' => $request->input('time_id')],
        $data
    );

    return redirect('/employee/timesheet')->with([
        'success' => 'Request updated successfully',
    ]);
}

public function updateoutofexpense(request $request)
    {
        $validatedData = $request->validate([
        'status' => 'required|string',
        // 'remarks' => 'string',
        
        'emp_id' => 'required|string',

        
        
    ]);

   $formattedDateTime = Carbon::now()->format('Y-m-d H:i:s');
    $data = [
        'status' => $request->input('status'),
        'remarks' => $request->input('remarks'),
        'created_at' => $request->input('created_at'),
        'admin_update' => $formattedDateTime,
        'updated_at' => $formattedDateTime,
        
    ];

    // Use updateOrInsert to update or insert the record based on client_id
    $adminoutexp = OutOfExpense::updateOrInsert(
        ['id' => $request->input('emp_id')],
        $data
    );
     $announcements = Announcement::latest()->get();
        // Redirect back with a success message (you can customize this)
         return redirect('/admin/outofexpense')->with([
        'success' => 'Request updated successfully',
        // 'empl_announcements' => $empl_announcements,
    ]);
    }
    public function adminissue()
    {
       
        $user = Auth::user();
        
        
        $issue = Issue::get();
        
        $announcements = Announcement::latest()->get();
        return view('admin/issue-tracker/list',compact('issue','announcements'));
    }

    public function userissue()
    {
       
        $user = Auth::user();
        // dd($user);
        
        $issue = Issue::where('client_id', $user->id)->get();
        
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        return view('user/issue-tracker/list',compact('issue','cli_announcements'));
    }

    public function userwallet()
    {
        
        $user = auth()->user();
        $userId = Auth::id();
        // dd($user->role);
        
        $role = User::where('id', $userId)
                        ->where('role', $user->role)
                        ->where('Promoters_Vault_Access', 1)
                        ->first();
        // dd($role);
        
        if (!$role) {
            echo "You have no Access to Promoters Vault , Please Contact to your Account Provider";
            abort(404);  // Abort if the role is not found or access is not granted
        }
        // Clear the 'otp' session variable
        session()->forget('otp');
        session()->forget('match');
        $otp = rand(100000, 999999);
        session(['otp' => $otp]);
    
        $user = Auth::user();
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        // $keyDownload = KeyDownload::where('client_id', $user->id)->first();
        //  $documents = Document::where('client_id', $user->id)->get();
        
           
              $user = auth()->user();
         $userRole = $user->role; // Ensure 'role' field exists in the users table
    
    // Check if the user's role exists in the roles array
    $user = auth()->user();
    
    // Get the user's role from the users table
    $userRole = $user->role; // Ensure 'role' field exists in the users table
    
    // Find the UserRole record where the role matches the user's role
    $userRoleRecord = UserRole::where('role', $userRole)->first();
      
      
    
        return view('user/promoter-wallet/index', compact( 'cli_announcements','otp','user','user'));
    }
    public function checkEmailExists(Request $request) {
        $email = $request->input('email');
        $exists = User::where('email', $email)->exists();
        return response()->json(['exists' => $exists]);
    }
    
    public function MiscellaneousDocuments()
    {
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        $files = MisUploadedFile::all();
    $chardoc = MisCharteredDoc::all();
    $coi = MisCOI::all();
    $pan = MisPAN::all();
    $tan = MisTAN::all();
    $inc = MisINC::all();
    $spicedoc = MisSpiceDoc::all();
    $customdoc = MisCustomDoc::all();
     $user = auth()->user();
        
       return view('user.Charter-Documents.Miscellaneous-Documents',compact('cli_announcements', 'files','chardoc','coi','pan','tan','inc','spicedoc','customdoc','user'));
    }
	
	    public function companyprofile()
    {
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        $user = Auth::user();
        $cp = CompanyProfiles::where('user_id', $user->id)->get();
            $user = auth()->user();
         $userRole = $user->role; // Ensure 'role' field exists in the users table
    
    // Check if the user's role exists in the roles array
    $user = auth()->user();
    
    // Get the user's role from the users table
    $userRole = $user->role; // Ensure 'role' field exists in the users table
    
    $gstno = StoreGST::where('user_id', $user->id)->get();
    $gstnocount = StoreGST::where('user_id', $user->id)->count();
    $employeescompany = StoreCompanyEmployee ::where('user_id', $user->id)->get();
    
    $employeescount = StoreCompanyEmployee::where('user_id', $user->id)->count();
    
    // dd($gstnocount);
    // Find the UserRole record where the role matches the user's role
    $userRoleRecord = UserRole::where('role', $userRole)->first();

    $directorcompany = StoreCompanydirector ::where('user_id', $user->id)->where('is_delete', 0)->get();
    
    $directorcount = StoreCompanydirector::where('user_id', $user->id)->where('is_delete', 0)->count();
       return view('user.Administration.company-profile',compact('cli_announcements','directorcompany','directorcount','cp','user','user','gstno','gstnocount','employeescompany','employeescount'));
    }
    
    
    public function submitForm(Request $request)
    {
        $request->validate([
            'keyfile' => 'required|file',
        ]);
    
        $keyfile = $request->file('keyfile');
    
        $keyfileHash = hash_file('sha256', $keyfile->path());
    
        $keyData = "90-data-41-solov-49-taknikk-89-plutus-98";
    
        if ($keyfileHash === hash('sha256', $keyData)) {
            session(['match' => 1]);
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Keyfile data does not match']);
        }
    }
    
    
    public function submitDocu(Request $request)
{
    $request->validate([
        'anotherFile' => 'required|file|mimes:jpeg,png,pdf,doc,docx,xls,xlsx,zip,svg',
        'document_name' => 'required|string',
    ]);
    
    $user = Auth::user();
    $client_id = $user->id;
   
    if ($request->hasFile('anotherFile')) {
        $file = $request->file('anotherFile');
        
        $path = $file->store('documents');
        
        $document = new Document();
        $document->client_id =  $client_id;
        $document->name = $request->input('document_name');
        $document->file_path = $path;
        $document->save();

        return response()->json([
            'success' => true,
            'message' => 'Document uploaded successfully.',
            'document_name' => $document->name,
            'document_url' => asset('storage/' . $document->file_path),
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Failed to upload document.',
        ]);
    }
}

    
    
    public function fetchDocuments()
    {
        $user = Auth::user();
       
        $documents = Document::where('client_id', $user->id)->get();
    
        // Iterate through each document and retrieve its MIME type
        $documentsWithTypes = $documents->map(function ($document) {
            $mimeType = Storage::mimeType($document->file_path);
            $document->real_file_type = $mimeType;
            return $document;
        });
    
        return response()->json(['documents' => $documentsWithTypes]);
    }
    
    
    public function download($id)
    {
        $user = Auth::user();
    
        $document = Document::where('id', $id)
            ->where('client_id', $user->id)
            ->firstOrFail();
        
        // Retrieve the MIME type of the original file
        $mimeType = Storage::mimeType($document->file_path);
    
        // Return the file for download with the original MIME type
        return Storage::download($document->file_path, $document->name, ['Content-Type' => $mimeType]);
    }
    
    
        public function downloadKeyFile(Request $request)
    {
        // dd($request);
        $user = Auth::user();
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        $keyDownload = KeyDownload::where('client_id', $user->id)->first();
    
        if (!$keyDownload || $keyDownload->file_status === 0 || $keyDownload->file_status === null) {
            if (!$keyDownload) {
                // Additional logic when the record does not exist
                // For example, you might want to log this event, show a message, or perform other actions.
                // You can customize this part based on your specific requirements.
                // Here, we'll just create a new record for demonstration purposes.
                $keyDownload = KeyDownload::create(['client_id' => $user->id]);
            }
    
            // File has not been downloaded or there is no record, update status to 1
            $keyDownload->update(['file_status' => 1]);
    
            $keyData = "90-data-41-solov-49-taknikk-89-plutus-98";
    
            $filePath = 'keys/keyfile.ml';
            Storage::put($filePath, $keyData);
    
            return response()->download(storage_path("app/{$filePath}"), 'keyfile.ml');
      
    
            // return view('user/promoter-wallet/index', compact('keyDownload', 'cli_announcements'));
        }
    }
   

    


    public function emptimesheet()
    {
        $user = Auth::user();
        // dd($user);
        $timeSheet  = DB::table('timesheets as t')
        ->join('users as u', 'u.id', '=', 't.client_id')
        ->where('t.employee_id', '=', $user->id)
        ->select('*')
        ->get();
        $clients = DB::table('users as u')
    ->join('assignments as a', 'u.id', '=', 'a.client_id')
    ->where('a.employee_id', '=', $user->id)
    ->select('*')
    ->get();
    // $results = DB::table('assignments as a')
    // ->leftJoin('timesheets as t', 'a.client_id', '=', 't.client_id')
    // ->join('users as u', 'u.id', '=', 'a.client_id')
    // ->where('a.employee_id', $user->id)
    // ->select(
    //     'u.id as client_id',
    //     'u.name as client_name',
    //     'a.employee_id',
    //     DB::raw('DATE(t.date_of_work) as date'), // Extract the date
    //     DB::raw('GROUP_CONCAT(t.timesheet_txt) as combined_timesheet_txt'),
    //     DB::raw('COALESCE(SUM(t.spenttime), 0) as timespent'),
    //     DB::raw('MAX(t.created_at) as latest_timesheet_created_at') // Include created_at
    // )
    // ->groupBy('u.id', 'u.name', 'a.employee_id', 'date') // Group by date as well
    // ->get();
    
    // dd($results);
//   $results = DB::table('assignments as a')
//     ->join('timesheets as t', 'a.client_id', '=', 't.client_id')
//     ->join('users as u', 'u.id', '=', 'a.client_id')
//     ->where('a.employee_id', $user->id) // Filter by the logged-in user's id
//     ->whereNotNull('t.id') // Filter out records where timesheets.id is null
//     ->select(
//         'u.id as client_id',
//         'u.name as client_name',
//         'a.employee_id',
//         DB::raw('DATE(t.date_of_work) as date'), // Extract the date
//         't.timesheet_txt as timesheet_txt',
//         't.spenttime as timespent',
//         't.created_at as created_at',
//         't.id as id'
//     )
//     ->get();
$results = DB::table('timesheets as t')
    // ->join('assignments as a', 'a.employee_id', '=', 't.employee_id')
    ->join('users as u1', 'u1.id', '=', 't.employee_id')
    ->leftJoin('users as u2', 'u2.id', '=', 't.client_id') // Use leftJoin instead of join
    ->where('t.employee_id', $user->id) 
    ->select(
        // 'a.employee_id',
        't.client_id',
        't.spenttime',
        't.timesheet_txt',
        't.id',
        't.date_of_work', // Include the date_of_work field
        DB::raw('SUM(t.spenttime) as total_spenttime'),
        DB::raw('DATE(t.created_at) as created_date'), // Extract the date from created_at
        'u1.name as employee_name',
        'u2.name as client_name'
    )
    ->groupBy( 't.client_id', 't.spenttime', 't.timesheet_txt', 't.date_of_work', 't.id', 'created_date', 'u1.name', 'u2.name')
    ->orderByDesc('created_date') // Order by created_date in descending order
    // ->orderBy('a.employee_id')
    ->orderBy('t.client_id')
    ->get();




    // dd($results);
    $empl_announcements = Announcement::where('role', 'Employee')->latest()->get();
        return view('employee/timesheet/index',compact('user','timeSheet','clients','results','empl_announcements'));
    }

    public function admintimesheet()
    {
       
        
   $results = DB::table('timesheets as t')
    ->join('assignments as a', 'a.employee_id', '=', 't.employee_id')
    ->join('users as u1', 'u1.id', '=', 't.employee_id')
    ->leftJoin('users as u2', 'u2.id', '=', 't.client_id')
    ->select(
        'a.employee_id',
        't.client_id',
         't.non_client',
        't.spenttime',
        't.timesheet_txt',
        't.date_of_work', // Include the date_of_work field
        DB::raw('SUM(t.spenttime) as total_spenttime'),
        DB::raw('DATE(t.created_at) as created_date'), // Extract the date from created_at
        'u1.name as employee_name',
        'u2.name as client_name'
    )
    ->groupBy('a.employee_id', 't.client_id', 't.non_client', 't.spenttime', 't.timesheet_txt', 't.date_of_work', 'created_date', 'u1.name', 'u2.name')
    ->orderByDesc('created_date') // Order by created_date in descending order
    ->orderBy('a.employee_id')
    ->orderBy('t.client_id')
    ->get();


$results2 = DB::table('timesheets as t')
    ->leftJoin('assignments as a', 'a.employee_id', '=', 't.employee_id')
    ->join('users as u1', 'u1.id', '=', 't.employee_id')
    ->leftJoin('users as u2', 'u2.id', '=', 't.client_id')
    ->select(
        't.client_id',
        't.non_client',
        't.timesheet_txt',
        't.date_of_work',
         't.spenttime',
          't.created_at',
        'u1.name as employee_name',
        'u2.name as client_name'
    )
    ->whereNull('a.employee_id')
    ->groupBy('t.client_id', 't.non_client', 't.timesheet_txt','t.spenttime', 't.created_at',  't.date_of_work', 'u1.name', 'u2.name')
    ->get();
$results3 = DB::table('timesheets as t')
    ->join('assignments as a', 'a.employee_id', '=', 't.employee_id')
    ->join('users as u1', 'u1.id', '=', 't.employee_id')
    ->leftJoin('users as u2', 'u2.id', '=', 't.client_id')
    ->select(
        'a.employee_id',
        't.client_id',
        't.spenttime',
        't.non_client',
        't.timesheet_txt',
        't.date_of_work', // Include the date_of_work field
        DB::raw('SUM(t.spenttime) as total_spenttime'),
        DB::raw('DATE(t.created_at) as created_date'), // Extract the date from created_at
        'u1.name as employee_name',
        'u2.name as client_name'
    )
    ->where(function($query) {
        $query->whereNotNull('t.non_client')
            ->orWhere('t.non_client', '!=', '');
    }) // Include this line to filter records where non_client is not null or not an empty string
    ->whereNull('t.client_id') // Add this line to filter records where client_id is null
    ->groupBy('a.employee_id', 't.client_id','t.non_client', 't.spenttime', 't.timesheet_txt', 't.date_of_work', 'created_date', 'u1.name', 'u2.name')
    ->orderByDesc('created_date') // Order by created_date in descending order
    ->orderBy('a.employee_id')
    ->orderBy('t.client_id')
    ->get();



// dd($results2);



    $employees = User::where('role', 'Employee')->get();
        $clients = User::where('role', 'Client')->get();

    // dd($results);
    
    $announcements = Announcement::latest()->get();
        return view('admin/timesheet/index',compact('results','announcements','clients','employees','results2','results3'));
    }

    public function empprofile()
    {
        $user = Auth::user();
        $userInfo = UserInfo::select('user_infos.*')
    ->join('users', 'users.id', '=', 'user_infos.user_id')
    ->where('users.role', 'Employee')
    ->where('users.id', $user->id)
    ->first();
        // dd($userInfo);
        $profile = EmployeeProfile::where('employee_id', $user->id)->first();
        $empl_announcements = Announcement::where('role', 'Employee')->latest()->get();
        return view('employee/profile/index',compact('user','userInfo' ,'profile','empl_announcements'));
    }

    public function empcal()
    {
        $user = Auth::user();
        // dd($user);
       
        $clients = DB::table('users as u')
    ->join('assignments as a', 'u.id', '=', 'a.client_id')
    ->where('a.employee_id', '=', $user->id)
    ->select('*')
    ->get();
    $selectedClientId = request('client_id'); // Assuming you are using Laravel's request to get the selected client ID
    
    // Fetch events based on the selected client (if applicable)
    if ($selectedClientId) {
        $events = DB::table('events')
            ->where('client_id', $selectedClientId)
            ->select('*')
            ->get();
    } else {
        // If no client is selected, fetch all events
        $events = DB::table('events')->select('*')->get();
    }

    $calendarEvents = [];
    foreach ($events as $event) {
        $calendarEvents[] = [
            'title' => $event->title,
            'start' => $event->start,
            'description' => $event->description,
            'client_id' => $event->client_id,
            'employee_id' => $event->employee_id,
        ];
    }
    // dd($clients);
    $empl_announcements = Announcement::where('role', 'Employee')->latest()->get();
   




    

 
        return view('employee/calendar/index',compact('user','clients','empl_announcements','calendarEvents'));

    }

    public function usercal()
    {
        $user = Auth::user();
        // dd($user);
        $events = DB::table('events as e')
        ->join('users as u', 'u.id', '=', 'e.client_id')
        ->where('e.client_id', '=', $user->id)
        ->select('*')
        ->get();
        $calendarEvents = [];
    foreach ($events as $event) {
        $calendarEvents[] = [
            'title' => $event->title,
            'start' => $event->start,
            'description' => $event->description,
        ];
    }
    $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        return view('user/calendar/index',compact('user','calendarEvents','cli_announcements'));

    }
    // app/Http/Controllers/CalendarController.php
    public function fetchEvents(Request $request, $clientId)
    {
        // Retrieve events for the selected client from the database
        $events = Event::where('client_id', $clientId)->get();

        // Transform the events into the format expected by FullCalendar
        $formattedEvents = [];
        foreach ($events as $event) {
            $formattedEvents[] = [
                'title' => $event->title,
                'start' => $event->start_date, // Replace with your start date field
                'end' => $event->end_date, // Replace with your end date field
                // Add other event properties as needed
            ];
        }

        // Return the events in JSON format
        return response()->json($formattedEvents);
    }


    public function admincalendar()
    {
        $employees = User::where('role', 'Employee')->get();
        $clients = User::where('role', 'Client')->get();
        $selectedClientId = request('client_id'); // Assuming you are using Laravel's request to get the selected client ID
    
        // Fetch events based on the selected client (if applicable)
        if ($selectedClientId) {
            $events = DB::table('events')
                ->where('client_id', $selectedClientId)
                ->select('*')
                ->get();
        } else {
            // If no client is selected, fetch all events
            $events = DB::table('events')->select('*')->get();
        }
    
        $calendarEvents = [];
        foreach ($events as $event) {
            $calendarEvents[] = [
                'title' => $event->title,
                'start' => $event->start,
                'description' => $event->description,
                'client_id' => $event->client_id,
                'employee_id' => $event->employee_id,
            ];
        }
        $announcements = Announcement::latest()->get();
        return view('admin/calendar/index', compact('clients', 'employees', 'calendarEvents','announcements'));
    }
    

    public function userpassword()
    {
        $user = Auth::user();
        // dd($user);
       
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        return view('user/change_pass',compact('user','cli_announcements'));

    }

    public function updateuserpassword(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);
    
        // Get the current user
        $user = auth()->user();
    
        // Check if the provided old password matches the user's current password
        if (!Hash::check($request->oldpassword, $user->password)) {
            return redirect()->back()->with('error', 'The current password is incorrect.');
        }
    
        // Update the user's password
        $user->update([
            'password' => Hash::make($request->password),
        ]);
    
        return redirect()->back()->with('success', 'Password updated successfully.');
    }

    public function empclient()
    {
        $user = Auth::user();
        // dd($user);
        // $clients = Assignment::where('employee_id', $user->id)->get();


               
        $employeeId = $user->id;
        // dd($employeeId);

        // Retrieve the employee's profile
        // $employeeProfile = EmployeeProfile::where('employee_id', $employeeId)->first();
       $employeeProfile = DB::table('user_infos as u')
            ->join('assignments as a', 'u.user_id', '=', 'a.client_id')
            ->where('a.employee_id', '=', $employeeId)
            ->select('*')
            ->get();
    
        // dd($employeeProfile);
        // Retrieve the employee's assignments along with client and client details
//         $assignments = Assignment::where('employee_id', $employeeId)->with(['client', 'employee'])->get();
        
//         // Retrieve the user details (if needed)
//         $user = User::where('id', $employeeId)->get();
        
//         // You can access the data like this:
//         if ($employeeProfile) {
//             // Access employee profile data
//             $employeeName = $employeeProfile->name;
//             $employeeEmail = $employeeProfile->email;
//             // ... other profile fields
//         }
        
//         if ($assignments) {
//     foreach ($assignments as $assignment) {
//         // Access assignment data
//         $clientName = $assignment->client->name ?? ''; // Default to 'N/A' if client is null
//         $employeeName = $assignment->employee->name ?? ''; // Default to 'N/A' if employee is null
//         // ... other assignment data
//     }
// }

        
       
        $empl_announcements = Announcement::where('role', 'Employee')->latest()->get();
        
        return view('employee/client/list',compact('user', 'employeeProfile','empl_announcements'));
    }
    
    public function updateclientprofile(Request $request)
{
    // dd($request);
    $employeeId = $request->input('client_id');
    $user = User::find($employeeId);

    if (!$user) {
        return redirect()->back()->with('error', 'Client not found.');
    }

    // Clear previous files and handle new file uploads
    $this->handleFileUploadsnew1($request, $user);

    // Update the User model
    $user->fill($request->except('profile_picture', 'gst_document', 'pan_document', 'tan_document', 'address_proof_document'));
   
    $user->save();

    // Update the UserInfo model
    
    $userInfo = UserInfo::where('user_id', $employeeId)->first();
    if (!$userInfo) {
        $userInfo = new UserInfo();
        $userInfo->user_id = $user->id;
    }
    $this->handleFileUploadsnew1($request, $userInfo);
    $userInfo->fill($request->all());
    
    $userInfo->save();

    return redirect()->back()->with('success', 'Client profile updated successfully');
}
private function handleFileUploadsnew1(Request $request, $model)
{
    // List of file input names
    $fileInputs = [
        'profile_picture',
        'gst_document',
        'pan_document',
        'tan_document',
        'address_proof_document',
    ];

    foreach ($fileInputs as $fileInput) {
        if ($request->hasFile($fileInput)) {
            // Check if there is a previous file to delete
            if ($model->$fileInput) {
                Storage::disk('public')->delete($model->$fileInput);
            }

            // Handle the new file upload
            $file = $request->file($fileInput);
            $fileName = time() . '_' . $fileInput . '.' . $file->extension();
            Storage::disk('public')->put($fileName, File::get($file));
            $model->$fileInput = $fileName;
        }
    }
}

    

public function storeTimeSheet(Request $request)
{
    $request->validate([
        
        'timesheettxt' => 'string',
        'spenttime' => 'string',
        'date_of_work' => 'date',
       
    ]);

    

    // Create and save the timesheet record
    $timeSheet = new TimeSheet([
        'client_id' => $request->input('client_id'),
        'non_client' => $request->input('non_client'),
        'spenttime' => $request->input('spenttime'),
        'timesheet_txt' => $request->input('timesheettxt'),
        'employee_id' => $request->input('employee_id'),
        'date_of_work' => $request->input('date_of_work'),
    ]);

    $timeSheet->save();

    return redirect()->back()->with('success', 'Timesheet updated/created successfully');
}
    
    
    
    public function employeessview()
    {
        $employees = $employeeInfo = DB::table('user_infos as ui')
    ->join('users as u', 'u.id', '=', 'ui.user_id')
    ->where('u.role', 'employee')
    ->select('ui.*', 'u.profile_picture as profile_picture')
    ->get();
  
        // dd($employees);
    //   $clients = UserInfo::where('role', 'Client')
    // ->whereNotIn('user_id', function ($query) {
    //     $query->select('client_id','employee_id')
    //         ->from('assignments');
    // })
    // ->get();
  $clients = UserInfo::where('role', 'Client')
    ->whereNotIn('user_id', function ($query) {
        $query->select('client_id')
            ->from('assignments')
            ->whereColumn('user_infos.user_id', 'assignments.employee_id');
    })
    ->orderBy('name') // Add this line to order by name
    ->get();





    



    
    // dd($clients);
    
    $assignments = DB::table('assignments')
    ->join('users as clients', 'clients.id', '=', 'assignments.client_id')
    ->join('users as employees', 'employees.id', '=', 'assignments.employee_id')
    ->select('assignments.*', 'clients.name as client_name', 'employees.name as employee_name')
    ->get();
    $announcements = Announcement::latest()->get();
        return view('admin/employee/list',compact('employees','clients','assignments','announcements'));
    }

    public function adminannouncement()
    { 
        $clientsannouncements = Announcement::where('role','Client')->latest()->get();
        // dd($clientsannouncements);
        $employeesannouncements = Announcement::where('role','Employee')->latest()->get();
        $announcements = Announcement::latest()->get();;
        return view('admin/announcement/index',compact('clientsannouncements','employeesannouncements','announcements'));
    }

    public function storeannouncementofemployees(request $request)
    {
        $data = $request->all();
        Validator::make($data, [
            
            'role' => ['required', 'string', 'max:255'],
            'announcements_for_employee' => ['required', 'string', 'max:255'],
           
        ]);
        Announcement::create([
            'role' => $data['role'],
            'announcements_for_employee' => $data['announcements_for_employee'],
            
        ]);
        if ($request->ajax()) {
            return response()->json(['message' => 'Annoucement created successfully']);
        }
    
        // Redirect with a success message
        return redirect('/admin/announcement')->with('success', 'Annoucement created successfully');
    }

    public function storeannouncementofclients(request $request)
    {
        $data = $request->all();
        Validator::make($data, [
            
            'role' => ['required', 'string', 'max:255'],
            'announcements_for_clients' => ['required', 'string', 'max:255'],
           
        ]);
        Announcement::create([
            'role' => $data['role'],
            'announcements_for_clients' => $data['announcements_for_clients'],
            
        ]);
        if ($request->ajax()) {
            return response()->json(['message' => 'Annoucement created successfully']);
        }
    
        // Redirect with a success message
        return redirect('/admin/announcement')->with('success', 'Annoucement created successfully');
    }
   
    
    public function storeclients(request $request)
    {
        // dd($request);
        $data = $request->all();
        $validator = Validator::make($data, [
            'phone' => ['required', 'string', 'min:10', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'plan_type' => ['required', 'string', 'max:255'],
            // 'tenure_start_date' => ['required', 'string', 'max:255'],
            // 'tenure_end_date' => ['required', 'string', 'max:255'],
            'brand_name' => ['required', 'string', 'max:255'],
            'client_correspondence_address' => ['required', 'string', 'max:255'],
            'client_registered_office_address' => ['required', 'string', 'max:255'],
            'authorised_signatory_name' => ['required', 'string', 'max:255'],
            // 'authorised_signatory_contact_no' => ['required', 'string', 'max:255'],
            // 'authorised_signatory_email_id' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        $existingUser = User::where('email', $data['email'])->first();

        if ($existingUser) {
            // User with the same email already exists, return an error message for AJAX requests
            if ($request->ajax()) {
                return response()->json(['error' => 'User with this email already exists.'], 422);
            } else {
                // Redirect with an error message for regular form submissions
                return redirect()->back()->with('error', 'User with this email already exists.')->withInput();
            }
        }
        try {
            $user = User::create([
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'name' => $data['name'],
            'plan_type' => $data['plan_type'],
            // 'tenure_start_date' => $data['tenure_start_date'],
            // 'tenure_end_date' => $data['tenure_end_date'],

            'brand_name' => $data['brand_name'],
            'client_correspondence_address' => $data['client_correspondence_address'],
            'client_registered_office_address' => $data['client_registered_office_address'],
            'authorised_signatory_name' => $data['authorised_signatory_name'],
            // 'authorised_signatory_contact_no' => $data['authorised_signatory_contact_no'],
            // 'authorised_signatory_email_id' => $data['authorised_signatory_email_id'],
        ]);
        UserInfo::create([
            'user_id' => $user->id,
            
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => $data['role'],
            'name' => $data['name'],
            'plan_type' => $data['plan_type'],
            // 'tenure_start_date' => $data['tenure_start_date'],
            // 'tenure_end_date' => $data['tenure_end_date'],

            'brand_name' => $data['brand_name'],
            'client_correspondence_address' => $data['client_correspondence_address'],
            'client_registered_office_address' => $data['client_registered_office_address'],
            'authorised_signatory_name' => $data['authorised_signatory_name'],
            // 'authorised_signatory_contact_no' => $data['authorised_signatory_contact_no'],
            // 'authorised_signatory_email_id' => $data['authorised_signatory_email_id'],
            
            
        ]);
        if ($request->ajax()) {
            return response()->json(['message' => 'User created successfully']);
        }
    
        // Redirect with a success message
        return redirect('/admin/clients')->with('success', 'User created successfully');
    }
    catch (\Illuminate\Database\QueryException $e) {
        $errorMessage = 'An error occurred while creating the employee.';
        if ($request->ajax()) {
            return response()->json(['error' => $errorMessage], 422);
        } else {
            return redirect()->back()->with('error', $errorMessage)->withInput();
        }
    }
}


public function payrollmaster()
    {
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        $user = Auth::user();
        $emplife = StoreEmployeeprofile::where('user_id', $user->id)->get();
        
       return view('user.HRM.payroll-master',compact('cli_announcements','emplife'));
    }
    
    public function payrolldetails($id)
    {
        $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
        $emplife = StoreEmployeeprofile::where('id', $id)->get();
        
        $employees = StoreEmployeePayroll::join('store_employee_profile', 'store_employee_payroll.employee_id', '=', 'store_employee_profile.id')
    ->where('store_employee_payroll.employee_id', $id)
    ->select('store_employee_payroll.id as detail_id','store_employee_payroll.startdate as sd','store_employee_payroll.file_size as sz', 'store_employee_payroll.*', 'store_employee_profile.*')
    ->get();
    // dd($employees);
       return view('user.HRM.payroll-details',compact('cli_announcements','emplife','employees'));
    }



public function founderregister(Request $request)
{
    // Check if the email OTP is set in the session and matches $request->email_otp
    if (Session::has('email_otp') && Session::get('email_otp') == $request->email_otp) {
        // Clear the email OTP from the session
        Session::forget('email_otp');

        // Check if a user with the provided email already exists
        $existingUser = User::where('email', $request->email)->first();

        // If the user does not exist, create a new account and log in the user
        if (!$existingUser) {
            // Create the user account
            $user = User::create([
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'founder',
                'designation' => $request->designation,
                'name_of_the_business' => $request->name_of_the_business,
                'industry' => $request->industry,
                'employees' => $request->employees,
                'name' => $request->first_name.$request->last_name,
            ]);

            // Check if the user was successfully created
            if ($user) {
                // Retrieve the user ID
                $userId = $user->id;

                // Store additional user information in the user_info table
                UserInfo::create([
                    'user_id' => $userId,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'password' => $request->password,
                    'role' => 'founder',
                    'designation' => $request->designation,
                    'name_of_the_business' => $request->name_of_the_business,
                    'industry' => $request->industry,
                    'employees' => $request->employees,
                    'name' => $request->first_name.$request->last_name,
                ]);

                // Log in the newly created user
                Auth::login($user);

                return redirect()->route('userclientsview'); // Redirect to the user dashboard view
            }
        } else {
            // User with the provided email already exists, handle accordingly (e.g., show an error message)
            // For example:
            return redirect()->back()->with('error', 'User with this email already exists.');
        }
    }

    return null; // Return null if user creation failed or OTP mismatch
}


public function deleteAnnouncement($id)
{
    // Find the announcement by ID
    $announcement = Announcement::find($id);

    if (!$announcement) {
        // Handle the case where the announcement does not exist
        return redirect()->route('home')->with('error', 'Announcement not found.');
    }

    // Delete the announcement
    $announcement->delete();

    // Redirect back to the home page with a success message
    return redirect()->back()->with('success', 'Announcement deleted successfully.');
}
public function deleteAnnouncementd($id)
{
    // Find the announcement by ID
    $announcement = Announcement::find($id);

    if (!$announcement) {
        // Handle the case where the announcement does not exist
        return redirect()->route('home')->with('error', 'Announcement not found.');
    }

    // Delete the announcement
    $announcement->delete();

    // Redirect back to the home page with a success message
    return redirect()->back()->with('success', 'Announcement deleted successfully.');
}
public function clientdel($id)
{
    // dd($id);
   $user = User::with('userInfo')->find($id);

if ($user) {
    // Delete the user_info record
    $user->userInfo->delete();
    
    // Delete the user record
    $user->delete();
    
    
}

    // Redirect back to the home page with a success message
    return redirect()->back()->with('success', 'Announcement deleted successfully.');
}
public function storeemployee(request $request)
{ 
    // dd($request);
    $email = $request->email;
    $passwordd = $request->password;
//     $validator = Validator::make($request->all(), [
//         'phone' => ['string', 'min:10', 'max:10'],
//         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//         'password' => ['required', 'string', 'min:8', 'confirmed'],
//         'role' => ['required', 'string', 'max:255'],
//         'name' => ['string', 'max:255'],
//         'personal_email_id' => ['string', 'max:255'],
//         'designation' => ['string', 'max:255'],
//         'department' => ['string', 'max:255'],
//         'joining_date' => ['string', 'max:255'],
//         'immediate_reporting_manager' => ['string', 'max:255'],
//         'correspondence_address_employee' => ['string'],
//         'permanent_address_employee' => ['string'],
//         'aadhar_number_employee' => ['string'],
//     ]);
// dd($validator);
//     // Check for validation errors
//     if ($validator->fails()) {
//         // Validation failed, return validation errors to the front end
//         if ($request->ajax()) {
//             return response()->json(['errors' => $validator->errors()], 422);
//         }
//         return redirect()->back()->withErrors($validator)->withInput();
//     }

//     // Check if a user with the same email already exists
//     $existingUser = User::where('email', $request->email)->first();

//     if ($existingUser) {
//         // User with the same email already exists, return an error message for AJAX requests
//         if ($request->ajax()) {
//             return response()->json(['error' => 'User with this email already exists.'], 422);
//         } else {
//             // Redirect with an error message for regular form submissions
//             return redirect()->back()->with('error', 'User with this email already exists.')->withInput();
//         }
//     }

    // Create a new user record
    $user = User::create([
        'phone' => $request->phone,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
        'name' => $request->name,
        'personal_email_id' => $request->personal_email_id,
        'designation' => $request->designation,
        'department' => $request->department,
        'joining_date' => $request->joining_date,
        'immediate_reporting_manager' => $request->immediate_reporting_manager,
        'correspondence_address_employee' => $request->correspondence_address_employee,
        'permanent_address_employee' => $request->permanent_address_employee,
        'aadhar_number_employee' => $request->aadhar_number_employee,
    ]);

    // Create a corresponding user_info record (assuming there's a relationship set up)
    $userInfo = new UserInfo([
        'phone' => $request->phone,
        'email' => $request->email,
        'password' => $request->password,
        'role' => $request->role,
        'name' => $request->name,
        'personal_email_id' => $request->personal_email_id,
        'designation' => $request->designation,
        'department' => $request->department,
        'joining_date' => $request->joining_date,
        'immediate_reporting_manager' => $request->immediate_reporting_manager,
        'correspondence_address_employee' => $request->correspondence_address_employee,
        'permanent_address_employee' => $request->permanent_address_employee,
        'aadhar_number_employee' => $request->aadhar_number_employee,
    ]);

    // Save the user_info record
    $user->userInfo()->save($userInfo);

    // You can send an email notification here if needed

    if ($request->ajax()) {
        return response()->json(['message' => 'Employee created successfully']);
    }

    // Retrieve announcements (assuming there's an Announcement model)
    $announcements = Announcement::latest()->get();

    // Redirect with a success message
    return redirect('/admin/employees')->with([
        'success' => 'Employee created successfully',
        'announcements' => $announcements,
    ]);


}








// public function deleteUser($id)
// {
    
//     try {
//         // Find the user by ID
//         $user = User::find($id);

//         if (!$user) {
//             return response()->json(['success' => false, 'message' => 'User not found.']);
//         }

//         // Delete related records in other tables
//         $user->assignments()->delete();
//         $user->clientProfile()->delete();
//         $user->employeeProfile()->delete();
//         $user->timesheets()->delete();
//         $user->issues()->delete();
//         $user->userInfo()->delete();

//         // Delete the user record itself
//         $user->delete();

//         return response()->json(['success' => true, 'message' => 'User and related records deleted successfully.']);
//     } catch (\Exception $e) {
//         return response()->json(['success' => false, 'message' => 'An error occurred while deleting the user.']);
//     }
// }
public function deleteemp($id)
{
    // Find the user by ID
    $user = User::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'Employee not found.');
    }

    // Delete the user record
    $user->delete();

    // Also delete the related user_info record
    UserInfo::where('user_id', $id)->delete();

    return redirect()->back()->with('success', 'Employee deleted successfully.');
}
public function deletecli($id)
{
    // Find the user by ID
    $user = User::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'Client not found.');
    }

    // Delete the user record
    $user->delete();

    // Also delete the related user_info record
    UserInfo::where('user_id', $id)->delete();

    return redirect()->back()->with('success', 'Client deleted successfully.');
}

public function deletedsc($id)
{
    // Find the user by ID
    $user = DataModel::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    // Delete the user record
    $user->delete();

    

    return redirect()->back()->with('success', 'Record deleted successfully.');
}
public function deleteope($id)
{
    // Find the user by ID
    $user = OutOfExpense::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    // Delete the user record
    $user->delete();

    

    return redirect()->back()->with('success', 'Record deleted successfully.');
}
public function deletetime($id)
{
    // Find the user by ID
    $user = TimeSheet::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    // Delete the user record
    $user->delete();

    

    return redirect()->back()->with('success', 'Record deleted successfully.');
}
public function sendNotification(Request $request)
{
    // Retrieve the user ID from the AJAX request
    $userId = $request->input('userId');
    $mess = $request->input('mess');
    $notification = new Notification();
    $notification->user_id = $userId;
    $notification->notification = $mess;
    

    $notification->save();
    
    return redirect()->back()->with('success', 'notification send successfully');
}

    public function userclientsview()
    {
        return view('user/dashboard/index');
    }

   

    public function updateemployeeprofile(Request $request)
{
    $employeeId = $request->input('employee_id');
    $user = User::find($employeeId);

    if (!$user) {
        return redirect()->back()->with('error', 'Employee not found.');
    }

    // Clear previous files and handle new file uploads
    $this->handleFileUploads($request, $user);

    // Update the User model
    $user->fill($request->except('profile_picture', 'appointment_letter', 'increment_letter', 'kra_docs', 'policy_manuals'));
    $user->password = Hash::make($request->input('password'));
    $user->save();

    // Update the UserInfo model
    
    $userInfo = UserInfo::where('user_id', $user->id)->first();
    if (!$userInfo) {
        $userInfo = new UserInfo();
        $userInfo->user_id = $user->id;
    }
    $this->handleFileUploads($request, $userInfo);
    $userInfo->fill($request->all());
    $userInfo->password = $request->input('password');
    $userInfo->save();

    return redirect()->back()->with('success', 'Employee profile updated successfully');
}

    public function updatesingleemployeeprofile(Request $request)
{
    // dd($request);
    $employeeId = $request->input('employee_id');
    $user = User::find($employeeId);

    if (!$user) {
        return redirect()->back()->with('error', 'Employee not found.');
    }

    // Clear previous files and handle new file uploads
    $this->handleFileUploadsnew($request, $user);

    // Update the User model
    $user->fill($request->except('profile_picture', 'appointment_letter', 'increment_letter', 'kra_docs', 'policy_manuals'));
    $user->password = Hash::make($request->input('password'));
    $user->save();

    // Update the UserInfo model
    
    $userInfo = UserInfo::where('user_id', $user->id)->first();
    if (!$userInfo) {
        $userInfo = new UserInfo();
        $userInfo->user_id = $user->id;
    }
    $this->handleFileUploadsnew($request, $userInfo);
    $userInfo->fill($request->all());
    $userInfo->password = $request->input('password');
    $userInfo->save();

    return redirect()->back()->with('success', 'Employee profile updated successfully');
}
private function handleFileUploadsnew(Request $request, $model)
{
    // List of file input names
    $fileInputs = [
        'profile_picture',
        'appointment_letter',
        'increment_letter',
        'kra_docs',
        'policy_manuals',
    ];

    foreach ($fileInputs as $fileInput) {
        if ($request->hasFile($fileInput)) {
            // Check if there is a previous file to delete
            if ($model->$fileInput) {
                Storage::disk('public')->delete($model->$fileInput);
            }

            // Handle the new file upload
            $file = $request->file($fileInput);
            $fileName = time() . '_' . $fileInput . '.' . $file->extension();
            Storage::disk('public')->put($fileName, File::get($file));
            $model->$fileInput = $fileName;
        }
    }
}
private function handleFileUploads(Request $request, $model)
{
    // List of file input names
    $fileInputs = [
        'profile_picture',
        'appointment_letter',
        'increment_letter',
        'kra_docs',
        'policy_manuals',
    ];

    foreach ($fileInputs as $fileInput) {
        if ($request->hasFile($fileInput)) {
            // Check if there is a previous file to delete
            if ($model->$fileInput) {
                Storage::disk('public')->delete($model->$fileInput);
            }

            // Handle the new file upload
            $file = $request->file($fileInput);
            $fileName = time() . '_' . $fileInput . '.' . $file->extension();
            Storage::disk('public')->put($fileName, File::get($file));
            $model->$fileInput = $fileName;
        }
    }
}


    public function updateclientprofiles(Request $request)
    {
    
        $clientid = $request->input('client_id');
        $clientProfile = User::where('id', $clientid)->first();
       
      
        
        
        
        $users=  User::updateOrCreate(
            ['id' => $clientid],
            ['name' => $request->input('name'),
                'phone' => $request->input('phone'),
                
                // 'password' => Hash::make($request->input('password')),
                'brand_name' => $request->input('brand_name'),
               
              
                'client_correspondence_address' => $request->input('client_correspondence_address'),
                'client_registered_office_address' => $request->input('client_registered_office_address'),
                'plan_type' => $request->input('plan_type'),
                
                'authorised_signatory_name' => $request->input('authorised_signatory_name'),
                
               
            
        ]);
        
         UserInfo::updateOrCreate(
           ['user_id' => $clientid],
            ['name' => $request->input('name'),
                'phone' => $request->input('phone'),
                
                // 'password' => $request->input('password'),
                'brand_name' => $request->input('brand_name'),
               
              
                'client_correspondence_address' => $request->input('client_correspondence_address'),
                'client_registered_office_address' => $request->input('client_registered_office_address'),
                'plan_type' => $request->input('plan_type'),
                
                'authorised_signatory_name' => $request->input('authorised_signatory_name'),
                
               
            
        ]);
   
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = time() . '.' . $image->extension();
            Storage::disk('public')->put($imageName, File::get($image));
    
           
            $users->profile_picture = $imageName;
            $users->save();
            
            UserInfo::updateOrCreate(
        ['user_id' => $clientid],
        ['profile_picture' => $imageName]
    );
        }
        
        return redirect()->back()->with('success', 'Client profile updated/created successfully');
    }
    public function updatedsc(Request $request)
    {
  $validatedData = $request->validate([
        // Add validation rules for other fields if needed
        'dsc_id' => 'required',
    ]);

    $data = [
        'Nonclient' => $request->input('Nonclient'),
        'directorname' => $request->input('directorname'),
        'din_number' => $request->input('din_number'),
        'valid_from' => $request->input('valid_from'),
        'valid_till' => $request->input('valid_till'),
        'expiry_status' => $request->input('expiry_status'),
        'renewal' => $request->input('renewal'),
        'mobile_no' => $request->input('mobile_no'),
        'email' => $request->input('email'),
        'father_name' => $request->input('father_name'),
        'dsc_location' => $request->input('dsc_location'),
    ];

    // Check if a file was uploaded and update the corresponding DataModel record
    if ($request->hasFile('pan_file')) {
        $panFilePath = $request->file('pan_file')->store('uploads');
        $data['pan_file_path'] = $panFilePath;
    }

    if ($request->hasFile('aadhar_file')) {
        $aadharFilePath = $request->file('aadhar_file')->store('uploads');
        $data['aadhar_file_path'] = $aadharFilePath;
    }

    if ($request->hasFile('profile_file')) {
        $profileFilePath = $request->file('profile_file')->store('uploads');
        $data['profile_file_path'] = $profileFilePath;
    }

    // Use updateOrInsert to update or insert the record based on the 'dsc_id'
    $dataModel = DataModel::updateOrInsert(
        ['id' => $request->input('dsc_id')],
        $data
    );

     
   
        
        return redirect()->back()->with('success', 'DSC updated/created successfully');
    }
    public function issueClient(Request $request)
{
    $validatedData = $request->validate([
        'client_id' => 'required',
        'issue_date' => 'required|date',
        'responsibility' => 'required|string',
        'area' => 'required|string',
        'particulars' => 'required|string',
        'status' => 'required|string',
        'remarks' => 'nullable|string',
        'employee_id' => 'required',
        'employee_name' => 'required',
        'client_name' => 'required',
    ]);

    Issue::create($validatedData);

    return redirect()->back()->with('success', 'Issue updated/created successfully');
}


public function eventsstore(Request $request)
{

    // dd($request->event_description);
    
    $data = $request->validate([
        'client_id' => 'required',
        'employee_id' => 'required',
        'compliances' => 'required',
        'event_start' => 'required|date',
        
        'event_description' => 'nullable',
       
        // Add validation rules for other fields
    ]);

    Event::create([
        'title' => $request->compliances,
        'start' => $request->event_start,
       
        'description' => $request->event_description,
        'client_id' => $request->client_id,
        'employee_id' => $request->employee_id,
        // Add other fields as needed
    ]);
    return redirect()->back()->with('success', 'Event updated/created successfully');
}
public function ticktingdetails()
{
    $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
    
   return view('user.ticket.tickting',compact('cli_announcements'));
}

// public function event(Request $request)
// {
//     $clientId = $request->input('client_id');
//     $events = Event::select('events.*')
//         ->join('users as u', 'u.id', '=', 'events.employee_id')
//         ->where('u.client_id', $clientId) // Assuming there's a client_id column in your users table
//         ->get();

//     return response()->json($events);
// }

public function sendOtp(Request $request)
    {
       
        $otp = $request->input('otp');

        
       $sessionotp =  $request->session()->put('otp', $otp);

        
        

        return response()->json(['success' => true, 'message' => 'OTP sent successfully']);
    }
}

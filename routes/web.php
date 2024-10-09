<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DriveController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NavigationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
 
    return "Cache cleared successfully";
 });

 Route::get('/userregister', [RegisterController::class, 'userregister'])->name('userregister');
 Route::post('/storeregister', [RegisterController::class, 'storeregister'])->name('storeregister');
 Route::post('/storeinvite', [RegisterController::class, 'storeinvite'])->name('storeinvite');
 Route::post('/check-user-exists', [RegisterController::class,'checkUserExists'])->name('check_user_exists');
 Route::post('/check-all-user-exists',[RegisterController::class, 'checkallUserExists'])->name('checkallUserExists');
 Route::post('/send-otpp',[App\Http\Controllers\Auth\RegisterController::class, 'sendOtpp'])->name('sendOtpp');
Route::get('/invite', [App\Http\Controllers\NavigationController::class, 'invite'])
    ->name('invite')
    ->middleware('allow.invite'); // Apply the middleware here

Route::post('/send-otpd', [App\Http\Controllers\Auth\RegisterController::class, 'sendOtpd'])->name('sendOtpd');
Route::post('/check-email-existence', [App\Http\Controllers\Auth\RegisterController::class, 'checkEmailExistence'])->name('checkEmailExistence');


 Route::get('/auth/google', [LoginController::class,'redirectToGoogle']);
Route::get('/auth/google/callback', [LoginController::class,'handleGoogleCallback']);

Route::get('/auth/google', [App\Http\Controllers\Auth\LoginController::class,'redirectToGoogle']);
Route::get('/auth/google/callback', [App\Http\Controllers\Auth\LoginController::class,'handleGoogleCallback']);

 Route::get('/', function () {
    return redirect(route('login'));
});
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
// Route::get('/register', function () {
//     // Your route logic
// })->middleware('prevent.direct.access');

Auth::routes();
Route::middleware(['auth', 'prevent_direct_access'])->group(function () {
    // Routes that require authentication and the prevent_direct_access middleware
   
});
Route::group(['middleware' => ['auth', 'check.role']], function () {
    // All routes that require authentication and a valid role
   
    // other routes...
Route::get('/filter-folder-contents', [App\Http\Controllers\HomeController::class, 'filterContents']);


Route::get('/user/dashboard',  [App\Http\Controllers\HomeController::class,'index'])->middleware('auth');
Route::get('/fetch-folder-data',  [App\Http\Controllers\HomeController::class, 'fetchFolderData']);
Route::get('/fetch-subfolders',  [App\Http\Controllers\HomeController::class, 'fetchSubfolders']);
Route::get('/fetch-subfolders2',  [App\Http\Controllers\HomeController::class, 'fetchSubfolders2']);
Route::get('/fetch-folder-contents', [App\Http\Controllers\HomeController::class,'fetchFolderContents']);
Route::get('/fetch-users', [App\Http\Controllers\HomeController::class, 'fetchUsers'])->name('fetchUsers');

Route::delete('/delete-user/{id}', [App\Http\Controllers\HomeController::class, 'deleteUser'])->name('user.delete');

Route::post('/updatemembers', [App\Http\Controllers\HomeController::class, 'updatemembers'])->name('updatemembers');
Route::post('/shareFolder', [App\Http\Controllers\HomeController::class, 'shareFolder'])->name('shareFolder');

Route::get('/fetch-data-for-year', [App\Http\Controllers\HomeController::class,'fetchDataForYear'])->name('fetch.data.year');
Route::get('/getboardnoticeFiles', [App\Http\Controllers\HomeController::class, 'getboardnoticeFiles'])->name('getboardnoticeFiles');
Route::post('/boradnotice', [App\Http\Controllers\HomeController::class, 'boradnotice'])->name('boradnotice');
Route::post('/boradmintuebook', [App\Http\Controllers\HomeController::class, 'boradmintuebook'])->name('boradmintuebook');
Route::post('/check-email', [App\Http\Controllers\HomeController::class, 'checkEmailExists'])->name('email.exists');
Route::post('/boradminutebook', [App\Http\Controllers\HomeController::class, 'boradminutebook'])->name('boradminutebook');
Route::get('/checkFilesboradminutebook', [App\Http\Controllers\HomeController::class, 'checkFilesboradminutebook'])->name('checkFilesboradminutebook');
Route::get('/fetch-board-notice-data', [App\Http\Controllers\HomeController::class, 'fetchBoardNoticeData'])->name('fetch-board-notice-data');
Route::get('/fetch-board-file-notice-data', [App\Http\Controllers\HomeController::class, 'fetchBoardFileNoticeData'])->name('fetch-board-file-notice-data');


// Save folder ID and URL to the session
Route::post('/save-breadcrumb', [App\Http\Controllers\HomeController::class, 'saveBreadcrumb'])->name('save.breadcrumb');

Route::get('/fetch-existing-datarooms', [App\Http\Controllers\HomeController::class, 'fetchExistingDataRooms'])->name('fetch-existing-datarooms');

Route::post('/move-files-to-dataroom', [App\Http\Controllers\HomeController::class, 'moveFilesToDataRoom'])->name('move-files-to-dataroom');

Route::post('/createDataRoom', [App\Http\Controllers\HomeController::class, 'createDataRoom'])->name('createDataRoom');

Route::POST('/roles/updatestatusrole/{id}', [App\Http\Controllers\HomeController::class, 'updateStatusrole'])->name('roles.updatestatusrole');

Route::post('/storegst', [App\Http\Controllers\HomeController::class, 'storegst'])->name('storegst');

Route::post('/updateGST', [App\Http\Controllers\HomeController::class, 'updateGST'])->name('updateGST');

Route::delete('/deleteGST/{id}', [App\Http\Controllers\HomeController::class, 'deleteGST'])->name('deleteGST');

Route::post('/storecompanyemployee', [App\Http\Controllers\HomeController::class, 'storecompanyemployee'])->name('storecompanyemployee');


Route::post('/updatecompanyemployee', [App\Http\Controllers\HomeController::class, 'updatecompanyemployee'])->name('updatecompanyemployee');

Route::post('/delcompemp', [App\Http\Controllers\HomeController::class, 'delcompemp'])->name('delcompemp');

Route::get('/downloadCsv', [App\Http\Controllers\HomeController::class, 'downloadCsv'])->name('downloadCsv');


Route::post('/uploadempcsv', [App\Http\Controllers\HomeController::class, 'uploadempcsv'])->name('uploadempcsv');

Route::post('/storecompanydirector', [App\Http\Controllers\HomeController::class, 'storecompanydirector'])->name('storecompanydirector');

Route::post('/updatecompanydirector', [App\Http\Controllers\HomeController::class, 'updatecompanydirector'])->name('updatecompanydirector');
Route::post('/updatedirstatus', [App\Http\Controllers\HomeController::class, 'updatedirstatus']);

Route::post('/check-email-phone', [App\Http\Controllers\HomeController::class, 'checkEmailPhone'])->name('checkEmailPhone');

Route::post('/check-user-existence', [App\Http\Controllers\HomeController::class, 'checkUserExistence'])->name('checkUserExistence');

Route::post('/changeemppassword', [App\Http\Controllers\HomeController::class, 'changeemppassword'])->name('changeemppassword');


// sandeep routes start 

Route::post('/saveFeedback', [App\Http\Controllers\HomeController::class, 'saveFeedback'])->name('saveFeedback');


Route::post('/addTask', [App\Http\Controllers\HomeController::class, 'addTask'])
->name('addTask');
Route::post('/editTask', [App\Http\Controllers\HomeController::class, 'editTask'])->name('editTask');
Route::post('/editEvents', [App\Http\Controllers\HomeController::class, 'editEvents'])->name('editEvents');
Route::delete('/deleteTask/{id}', [App\Http\Controllers\HomeController::class,'deleteTask'])->name('deleteTask');
Route::delete('/deleteeventTask/{id}', [App\Http\Controllers\HomeController::class,'deleteeventTask'])->name('deleteeventTask');
// Route::get('/getTaskData', [App\Http\Controllers\HomeController::class, 'getTaskData'])
// ->name('getTaskData');
Route::post('/addEvents', [App\Http\Controllers\HomeController::class, 'addEvents'])
->name('addEvents');
Route::post('/updateTaskStatus', [App\Http\Controllers\HomeController::class, 'updateTaskStatus'])
->name('updateTaskStatus');
Route::get('/deleteTaskStatus', [App\Http\Controllers\HomeController::class, 'deleteTaskStatus'])
->name('deleteTaskStatus');

Route::post('/updateTask', [App\Http\Controllers\HomeController::class, 'updateTask'])
->name('updateTask');

Route::post('/getTaskWithDate/{taskDate}', [App\Http\Controllers\HomeController::class, 'getTaskWithDate'])
->name('getTaskWithDate');
Route::post('/getEventWithDate/{eventDate}', [App\Http\Controllers\HomeController::class, 'getEventWithDate'])
->name('getEventWithDate');

// Route::get('/getTaskWithDate', [App\Http\Controllers\HomeController::class, 'getTaskWithDate'])
// ->name('getTaskWithDate');

Route::post('/updateEvents', [App\Http\Controllers\HomeController::class, 'updateEvents'])
->name('updateEvents');

Route::get('/getTask/{id}', [App\Http\Controllers\HomeController::class, 'getTask'])
->name('getTask');


Route::get('/download-common-file/{id}', [App\Http\Controllers\HomeController::class, 'downloadCommonFile'])->name('download-common-file');
Route::post('/softdeleteCommonFile/{id}', [App\Http\Controllers\HomeController::class, 'softdeleteCommonFile'])->name('softdeleteCommonFile');
Route::post('/deleteCustomFile/{id}', [App\Http\Controllers\HomeController::class, 'deleteCustomFile'])->name('deleteCustomFile');

// sandeep routes end


Route::post('/addroles', [App\Http\Controllers\HomeController::class, 'addroles'])->name('addroles');

Route::post('/members', [App\Http\Controllers\HomeController::class, 'members'])->name('members');


Route::delete('/file/{id}', [App\Http\Controllers\HomeController::class, 'deletefilecommon'])->name('file.deleteboardnotic');

Route::put('/file/{id}/restore', [App\Http\Controllers\HomeController::class, 'restore'])->name('file.restore');


Route::put('/file/{id}/restorefile', [App\Http\Controllers\HomeController::class, 'restorefile'])->name('file.restorefile');

// web.php or api.php
Route::get('/fetch-board-notices-count', [App\Http\Controllers\HomeController::class,'fetchBoardNoticesCount']);

Route::post('/update-permission', [App\Http\Controllers\HomeController::class, 'updatePermission'])->name('updatePermission');

Route::post('/update-user-role', [App\Http\Controllers\HomeController::class, 'update'])->name('update.user.role');

Route::get('/get-board-notices', [App\Http\Controllers\HomeController::class, 'getBoardNotices']);

Route::post('/delete-board-file-notice',[App\Http\Controllers\HomeController::class, 'deleteBoardNotice'])->name('delete-board-file-notice');
Route::post('/delete-board-file-minbook',[App\Http\Controllers\HomeController::class, 'deleteBoardMinBook'])->name('delete-board-file-minbook');


Route::post('/delete-board-file-as',[App\Http\Controllers\HomeController::class, 'deleteBoardAs'])->name('delete-board-file-as');

Route::post('/delete-board-file-reso',[App\Http\Controllers\HomeController::class, 'deleteBoardReso'])->name('delete-board-file-reso');


Route::post('/delete-bank-file-accstatment',[App\Http\Controllers\HomeController::class, 'deleteBankAccStatment'])->name('delete-bank-file-accstatment');

Route::post('/delete-meet-file-notice',[App\Http\Controllers\HomeController::class, 'deleteMeetNotice'])->name('delete-meet-file-notice');


Route::post('/delete-meet-file-minbook',[App\Http\Controllers\HomeController::class, 'deleteMeetMinBook'])->name('delete-meet-file-minbook');

Route::post('/delete-meet-file-as',[App\Http\Controllers\HomeController::class, 'deleteMeetAs'])->name('delete-meet-file-as');

Route::post('/delete-meet-file-reso',[App\Http\Controllers\HomeController::class, 'deleteMeetReso'])->name('delete-meet-file-reso');


Route::post('/delete-order-file-notice',[App\Http\Controllers\HomeController::class, 'deleteOrderNotice'])->name('delete-order-file-notice');  


Route::post('/delete-order-file-minbook',[App\Http\Controllers\HomeController::class, 'deleteOrderMinBook'])->name('delete-order-file-minbook');

Route::post('/delete-order-file-attend',[App\Http\Controllers\HomeController::class, 'deleteOrderAttend'])->name('delete-order-file-attend');


Route::post('/delete-order-file-reso',[App\Http\Controllers\HomeController::class, 'deleteOrderReso'])->name('delete-order-file-reso');

Route::get('/showAdvSearch', [App\Http\Controllers\HomeController::class, 'showAdvSearch'])->name('showAdvSearch');


Route::post('/boradattendencesheet', [App\Http\Controllers\HomeController::class, 'boradattendencesheet'])->name('boradattendencesheet');
Route::post('/boradresolution', [App\Http\Controllers\HomeController::class, 'boradresolution'])->name('boradresolution');


Route::get('/get-union-results/{financialYear}', [App\Http\Controllers\HomeController::class, 'getUnionResults']);
Route::get('/download-filter-file/{sourceTable}/{fileId}', [App\Http\Controllers\HomeController::class, 'downloadfilterFile'])
    ->where('sourceTable', 'board_notice|board_reso|board_minute_book|board_as')
    ->name('download-filter-file');


Route::get('/fetch-board-reso-data', [App\Http\Controllers\HomeController::class, 'fetchBoardResolutionData'])->name('fetch-board-reso-data');
Route::get('/fetch-board-file-reso-data', [App\Http\Controllers\HomeController::class, 'fetchBoardFileResolutionData'])->name('fetch-board-file-reso-data');


Route::get('/fetch-board-as-data', [App\Http\Controllers\HomeController::class, 'fetchBoardAttendencesheetData'])->name('fetch-board-as-data');
Route::get('/fetch-board-file-as-data', [App\Http\Controllers\HomeController::class, 'fetchBoardFileAttendencesheetData'])->name('fetch-board-file-as-data');

Route::post('/meetnotice', [App\Http\Controllers\HomeController::class, 'meetnotice'])->name('meetnotice');


Route::get('/fetch-meet-notice-data', [App\Http\Controllers\HomeController::class, 'fetchMeetNoticeData'])->name('fetch-meet-notice-data');
Route::get('/fetch-meet-file-notice-data', [App\Http\Controllers\HomeController::class, 'fetchMeetFileNoticeData'])->name('fetch-meet-file-notice-data');


Route::post('/meetmintuebook', [App\Http\Controllers\HomeController::class, 'meetminutebook'])->name('meetmintuebook');


Route::get('/fetch-meet-minbook-data', [App\Http\Controllers\HomeController::class, 'fetchMeetMinBookData'])->name('fetch-meet-minbook-data');
Route::get('/fetch-meet-file-minbook-data', [App\Http\Controllers\HomeController::class, 'fetchMeetFileMinBookData'])->name('fetch-meet-file-minbook-data');



Route::post('/meetas', [App\Http\Controllers\HomeController::class, 'meetas'])->name('meetas');


Route::get('/fetch-meet-as-data', [App\Http\Controllers\HomeController::class, 'fetchMeetASData'])->name('fetch-meet-as-data');
Route::get('/fetch-meet-file-as-data', [App\Http\Controllers\HomeController::class, 'fetchMeetFileASData'])->name('fetch-meet-file-as-data');



Route::post('/meetreso', [App\Http\Controllers\HomeController::class, 'meetreso'])->name('meetreso');


Route::get('/fetch-meet-reso-data', [App\Http\Controllers\HomeController::class, 'fetchMeetRESOData'])->name('fetch-meet-reso-data');
Route::get('/fetch-meet-file-reso-data', [App\Http\Controllers\HomeController::class, 'fetchMeetFileRESOData'])->name('fetch-meet-file-reso-data');


Route::post('/ordernotice', [App\Http\Controllers\HomeController::class, 'ordernotice'])->name('ordernotice');


Route::get('/fetch-order-notice-data', [App\Http\Controllers\HomeController::class, 'fetchOrderNoticeData'])->name('fetch-order-notice-data');
Route::get('/fetch-order-file-notice-data', [App\Http\Controllers\HomeController::class, 'fetchOrderFileNoticeData'])->name('fetch-order-file-notice-data'); 



Route::post('/orderminbook', [App\Http\Controllers\HomeController::class, 'orderminbook'])->name('orderminbook');


Route::get('/fetch-order-minbook-data', [App\Http\Controllers\HomeController::class, 'fetchOrderMinBookData'])->name('fetch-order-minbook-data');
Route::get('/fetch-order-file-minbook-data', [App\Http\Controllers\HomeController::class, 'fetchOrderFileMinBookData'])->name('fetch-order-file-minbook-data');


Route::post('/orderAttend', [App\Http\Controllers\HomeController::class, 'orderAttend'])->name('orderAttend');


Route::get('/fetch-order-attend-data', [App\Http\Controllers\HomeController::class, 'fetchOrderAttendData'])->name('fetch-order-attend-data');
Route::get('/fetch-order-file-attend-data', [App\Http\Controllers\HomeController::class, 'fetchOrderFileAttendData'])->name('fetch-order-file-attend-data');


Route::post('/orderreso', [App\Http\Controllers\HomeController::class, 'orderreso'])->name('orderreso');


Route::get('/fetch-order-reso-data', [App\Http\Controllers\HomeController::class, 'fetchOrderRESOData'])->name('fetch-order-reso-data');
Route::get('/fetch-order-file-reso-data', [App\Http\Controllers\HomeController::class, 'fetchOrderFileRESOData'])->name('fetch-order-file-reso-data');

Route::post('/innerruns', [App\Http\Controllers\HomeController::class, 'innerruns'])->name('innerruns');


Route::get('/fetch-inner-runs-data', [App\Http\Controllers\HomeController::class, 'fetchInnerRunsData'])->name('fetch-inner-runs-data');
Route::get('/fetch-inner-file-runs-data', [App\Http\Controllers\HomeController::class, 'fetchInnerFileRunsData'])->name('fetch-inner-file-runs-data');



Route::post('/innerincnine', [App\Http\Controllers\HomeController::class, 'innerincnine'])->name('innerincnine');


Route::get('/fetch-inner-inc9-data', [App\Http\Controllers\HomeController::class, 'fetchInnerINC9Data'])->name('fetch-inner-inc9-data');
Route::get('/fetch-inner-file-inc9-data', [App\Http\Controllers\HomeController::class, 'fetchInnerFile9Data'])->name('fetch-inner-file-inc9-data');



Route::post('/innerspice', [App\Http\Controllers\HomeController::class, 'innerspice'])->name('innerspice');


Route::get('/fetch-inner-spice-data', [App\Http\Controllers\HomeController::class, 'fetchInnerspiceData'])->name('fetch-inner-spice-data');
Route::get('/fetch-inner-file-spice-data', [App\Http\Controllers\HomeController::class, 'fetchInnerFilespiceData'])->name('fetch-inner-file-spice-data');


Route::post('/innerINC33', [App\Http\Controllers\HomeController::class, 'innerINC33'])->name('innerINC33');


Route::get('/fetch-inner-inc33-data', [App\Http\Controllers\HomeController::class, 'fetchInnerINC33Data'])->name('fetch-inner-inc33-data');
Route::get('/fetch-inner-file-inc33-data', [App\Http\Controllers\HomeController::class, 'fetchInnerFileINC33Data'])->name('fetch-inner-file-inc33-data'); 



Route::post('/innerINC34', [App\Http\Controllers\HomeController::class, 'innerINC34'])->name('innerINC34');


Route::get('/fetch-inner-inc34-data', [App\Http\Controllers\HomeController::class, 'fetchInnerINC34Data'])->name('fetch-inner-inc34-data');
Route::get('/fetch-inner-file-inc34-data', [App\Http\Controllers\HomeController::class, 'fetchInnerFileINC34Data'])->name('fetch-inner-file-inc34-data');


Route::post('/innerINC35', [App\Http\Controllers\HomeController::class, 'innerINC35'])->name('innerINC35');


Route::get('/fetch-inner-inc35-data', [App\Http\Controllers\HomeController::class, 'fetchInnerINC35Data'])->name('fetch-inner-inc35-data');
Route::get('/fetch-inner-file-inc35-data', [App\Http\Controllers\HomeController::class, 'fetchInnerFileINC35Data'])->name('fetch-inner-file-inc35-data');


Route::post('/innerINC22', [App\Http\Controllers\HomeController::class, 'innerINC22'])->name('innerINC22');


Route::get('/fetch-inner-inc22-data', [App\Http\Controllers\HomeController::class, 'fetchInnerINC22Data'])->name('fetch-inner-inc22-data');
Route::get('/fetch-inner-file-inc22-data', [App\Http\Controllers\HomeController::class, 'fetchInnerFileINC22Data'])->name('fetch-inner-file-inc22-data');


Route::post('/innerINC20A', [App\Http\Controllers\HomeController::class, 'innerINC20A'])->name('innerINC20A');


Route::get('/fetch-inner-inc20a-data', [App\Http\Controllers\HomeController::class, 'fetchInnerINC20AData'])->name('fetch-inner-inc20a-data');
Route::get('/fetch-inner-file-inc20a-data', [App\Http\Controllers\HomeController::class, 'fetchInnerFileINC20AData'])->name('fetch-inner-file-inc20a-data');

Route::post('/annaoc4afs', [App\Http\Controllers\HomeController::class, 'annaoc4afs'])->name('annaoc4afs');


Route::get('/fetch-ann-aoc4afs-data', [App\Http\Controllers\HomeController::class, 'fetchAnnAoc4AfsAData'])->name('fetch-ann-aoc4afs-data');
Route::get('/fetch-ann-file-aoc4afs-data', [App\Http\Controllers\HomeController::class, 'fetchAnnFileAoc4AfsData'])->name('fetch-ann-file-aoc4afs-data');


Route::post('/annaoc4Cfs', [App\Http\Controllers\HomeController::class, 'annaoc4Cfs'])->name('annaoc4Cfs');


Route::get('/fetch-ann-aoc4cfs-data', [App\Http\Controllers\HomeController::class, 'fetchAnnAoc4CfsAData'])->name('fetch-ann-aoc4cfs-data');
Route::get('/fetch-ann-file-aoc4cfs-data', [App\Http\Controllers\HomeController::class, 'fetchAnnFileAoc4CfsData'])->name('fetch-ann-file-aoc4cfs-data');


Route::post('/annmgt7', [App\Http\Controllers\HomeController::class, 'annmgt7'])->name('annmgt7');


Route::get('/fetch-ann-mgt7-data', [App\Http\Controllers\HomeController::class, 'fetchAnnmgt7Data'])->name('fetch-ann-mgt7-data');
Route::get('/fetch-ann-file-mgt7-data', [App\Http\Controllers\HomeController::class, 'fetchAnnFilemgt7Data'])->name('fetch-ann-file-mgt7-data');


Route::post('/annmgt7a', [App\Http\Controllers\HomeController::class, 'annmgt7a'])->name('annmgt7a');


Route::get('/fetch-ann-mgt7a-data', [App\Http\Controllers\HomeController::class, 'fetchAnnmgt7aData'])->name('fetch-ann-mgt7a-data');
Route::get('/fetch-ann-file-mgt7a-data', [App\Http\Controllers\HomeController::class, 'fetchAnnFilemgt7aData'])->name('fetch-ann-file-mgt7a-data');

Route::get('/fetch-board-minbook-data', [App\Http\Controllers\HomeController::class, 'fetchBoardMinBookData'])->name('fetch-board-minbook-data');
Route::get('/fetch-board-file-minbook-data', [App\Http\Controllers\HomeController::class, 'fetchBoardFileMinBookData'])->name('fetch-board-file-minbook-data');



Route::post('/bankaccountstatement', [App\Http\Controllers\HomeController::class, 'bankaccountstatement'])->name('bankaccountstatement');


Route::get('/fetch-bank-accs-data', [App\Http\Controllers\HomeController::class, 'fetchBankAccsData'])->name('fetch-bank-accs-data');
Route::get('/fetch-bank-file-accs-data', [App\Http\Controllers\HomeController::class, 'fetchBankFileAccsData'])->name('fetch-bank-file-accs-data');



Route::post('/directorappointmentsdir3din', [App\Http\Controllers\HomeController::class, 'directorappointmentsdir3din'])->name('directorappointmentsdir3din');


Route::get('/fetch-directorappointments-dir3din-data', [App\Http\Controllers\HomeController::class, 'fetchdirectorappointmentsdir3dinData'])->name('fetch-directorappointments-dir3din-data');
Route::get('/fetch-directorappointments-file-dir3din-data', [App\Http\Controllers\HomeController::class, 'fetchdirectorappointmentsdir3dinFileData'])->name('fetch-directorappointments-file-dir3din-data');



Route::post('/directorappointmentsdir3', [App\Http\Controllers\HomeController::class, 'directorappointmentsdir3'])->name('directorappointmentsdir3');


Route::get('/fetch-directorappointments-dir3-data', [App\Http\Controllers\HomeController::class, 'fetchdirectorappointmentsdir3Data'])->name('fetch-directorappointments-dir3-data');
Route::get('/fetch-directorappointments-file-dir3-data', [App\Http\Controllers\HomeController::class, 'fetchdirectorappointmentsdir3FileData'])->name('fetch-directorappointments-file-dir3-data');



Route::post('/directorappointmentsdir6', [App\Http\Controllers\HomeController::class, 'directorappointmentsdir6'])->name('directorappointmentsdir6');


Route::get('/fetch-directorappointments-dir6-data', [App\Http\Controllers\HomeController::class, 'fetchdirectorappointmentsdir6Data'])->name('fetch-directorappointments-dir6-data');
Route::get('/fetch-directorappointments-file-dir6-data', [App\Http\Controllers\HomeController::class, 'fetchdirectorappointmentsdir6FileData'])->name('fetch-directorappointments-file-dir6-data');

Route::post('/directorappointmentsdir12', [App\Http\Controllers\HomeController::class, 'directorappointmentsdir12'])->name('directorappointmentsdir12');


Route::get('/fetch-directorappointments-dir12-data', [App\Http\Controllers\HomeController::class, 'fetchdirectorappointmentsdir12Data'])->name('fetch-directorappointments-dir12-data');
Route::get('/fetch-directorappointments-file-dir12-data', [App\Http\Controllers\HomeController::class, 'fetchdirectorappointmentsdir12FileData'])->name('fetch-directorappointments-file-dir12-data');



Route::post('/creditcardstatement', [App\Http\Controllers\HomeController::class, 'creditcardstatement'])->name('creditcardstatement');


Route::get('/fetch-creditcardstatement-data', [App\Http\Controllers\HomeController::class, 'fetchcreditcardstatementData'])->name('fetch-creditcardstatement-data');
Route::get('/fetch-creditcardstatement-file-data', [App\Http\Controllers\HomeController::class, 'fetchcreditcardstatementFileData'])->name('fetch-creditcardstatement-file-data');




Route::post('/mutualfundstatement', [App\Http\Controllers\HomeController::class, 'mutualfundstatement'])->name('mutualfundstatement');


Route::get('/fetch-mutualfundstatement-data', [App\Http\Controllers\HomeController::class, 'fetchmutualfundstatementData'])->name('fetch-mutualfundstatement-data');
Route::get('/fetch-mutualfundstatement-file-data', [App\Http\Controllers\HomeController::class, 'fetchmutualfundstatementFileData'])->name('fetch-mutualfundstatement-file-data');




Route::post('/fixeddepoiststatement', [App\Http\Controllers\HomeController::class, 'fixeddepoiststatement'])->name('fixeddepoiststatement');


Route::get('/fetch-fixeddepoiststatement-data', [App\Http\Controllers\HomeController::class, 'fetchfixeddepoiststatementData'])->name('fetch-fixeddepoiststatement-data');
Route::get('/fetch-fixeddepoiststatement-file-data', [App\Http\Controllers\HomeController::class, 'fetchfixeddepoiststatementFileData'])->name('fetch-fixeddepoiststatement-file-data');




Route::post('/directorresignationdir11', [App\Http\Controllers\HomeController::class, 'directorresignationdir11'])->name('directorresignationdir11');


Route::get('/fetch-directorresignationdir11-data', [App\Http\Controllers\HomeController::class, 'fetchdirectorresignationdir11Data'])->name('fetch-directorresignationdir11-data');
Route::get('/fetch-directorresignationdir11-file-data', [App\Http\Controllers\HomeController::class, 'fetchdirectorresignationdir11FileData'])->name('fetch-directorresignationdir11-file-data');



Route::post('/directorresignationdir12', [App\Http\Controllers\HomeController::class, 'directorresignationdir12'])->name('directorresignationdir12');


Route::get('/fetch-directorresignationdir12-data', [App\Http\Controllers\HomeController::class, 'fetchdirectorresignationdir12Data'])->name('fetch-directorresignationdir12-data');
Route::get('/fetch-directorresignationdir12-file-data', [App\Http\Controllers\HomeController::class, 'fetchdirectorresignationdir12FileData'])->name('fetch-directorresignationdir12-file-data');





Route::post('/depositundertakingsFormDPT3', [App\Http\Controllers\HomeController::class, 'depositundertakingsFormDPT3'])->name('depositundertakingsFormDPT3');


Route::get('/fetch-depositundertakingsFormDPT3-data', [App\Http\Controllers\HomeController::class, 'fetchdepositundertakingsFormDPT3Data'])->name('fetch-depositundertakingsFormDPT3-data');
Route::get('/fetch-depositundertakingsFormDPT3-file-data', [App\Http\Controllers\HomeController::class, 'fetchdepositundertakingsFormDPT3FileData'])->name('fetch-depositundertakingsFormDPT3-file-data');


Route::post('/AuditorExitsADT3Form', [App\Http\Controllers\HomeController::class, 'AuditorExitsADT3Form'])->name('AuditorExitsADT3Form');
Route::get('/fetch-AuditorExitsADT3Form-data', [App\Http\Controllers\HomeController::class, 'fetchAuditorExitsADT3FormData'])->name('fetch-AuditorExitsADT3Form-data');
Route::get('/fetch-AuditorExitsADT3Form-file-data', [App\Http\Controllers\HomeController::class, 'fetchAuditorExitsADT3FormFileData'])->name('fetch-AuditorExitsADT3Form-file-data');




Route::post('/AuditorExitsResignletteraudF', [App\Http\Controllers\HomeController::class, 'AuditorExitsResignletteraudF'])->name('AuditorExitsResignletteraudF');
Route::get('/fetch-AuditorExitsResignletteraudF-data', [App\Http\Controllers\HomeController::class, 'fetchAuditorExitsResignletteraudFData'])->name('fetch-AuditorExitsResignletteraudF-data');
Route::get('/fetch-AuditorExitsResignletteraudF-file-data', [App\Http\Controllers\HomeController::class, 'fetchAuditorExitsResignletteraudFFileData'])->name('fetch-AuditorExitsResignletteraudF-file-data');




Route::post('/AuditorExitsResignDetofgroundsseekremaudF', [App\Http\Controllers\HomeController::class, 'AuditorExitsResignDetofgroundsseekremaudF'])->name('AuditorExitsResignDetofgroundsseekremaudF');
Route::get('/fetch-AuditorExitsResignDetofgroundsseekremaudF-data', [App\Http\Controllers\HomeController::class, 'fetchAuditorExitsResignDetofgroundsseekremaudFData'])->name('fetch-AuditorExitsResignDetofgroundsseekremaudF-data');
Route::get('/fetch-AuditorExitsResignDetofgroundsseekremaudF-file-data', [App\Http\Controllers\HomeController::class, 'fetchAuditorExitsResignDetofgroundsseekremaudFFileData'])->name('fetch-AuditorExitsResignDetofgroundsseekremaudF-file-data');



Route::post('/AuditorExitsSpecialResolF', [App\Http\Controllers\HomeController::class, 'AuditorExitsSpecialResolF'])->name('AuditorExitsSpecialResolF');
Route::get('/fetch-AuditorExitsSpecialResolF-data', [App\Http\Controllers\HomeController::class, 'fetchAuditorExitsSpecialResolFData'])->name('fetch-AuditorExitsSpecialResolF-data');
Route::get('/fetch-AuditorExitsSpecialResolF-file-data', [App\Http\Controllers\HomeController::class, 'fetchAuditorExitsSpecialResolFFileData'])->name('fetch-AuditorExitsSpecialResolF-file-data');



Route::post('/AuditorExitsADT2Form', [App\Http\Controllers\HomeController::class, 'AuditorExitsADT2Form'])->name('AuditorExitsADT2Form');
Route::get('/fetch-AuditorExitsADT2Form-data', [App\Http\Controllers\HomeController::class, 'fetchAuditorExitsADT2FormData'])->name('fetch-AuditorExitsADT2Form-data');
Route::get('/fetch-AuditorExitsADT2Form-file-data', [App\Http\Controllers\HomeController::class, 'fetchAuditorExitsADT2FormFileData'])->name('fetch-AuditorExitsADT2Form-file-data');




Route::post('/Director1AadharKYCF', [App\Http\Controllers\HomeController::class, 'Director1AadharKYCF'])->name('Director1AadharKYCF');
Route::get('/fetch-Director1AadharKYCF-data', [App\Http\Controllers\HomeController::class, 'fetchDirector1AadharKYCFData'])->name('fetch-Director1AadharKYCF-data');
Route::get('/fetch-Director1AadharKYCF-file-data', [App\Http\Controllers\HomeController::class, 'fetchDirector1AadharKYCFFileData'])->name('fetch-Director1AadharKYCF-file-data');



Route::post('/Director1AddressProofF', [App\Http\Controllers\HomeController::class, 'Director1AddressProofF'])->name('Director1AddressProofF');
Route::get('/fetch-Director1AddressProofF-data', [App\Http\Controllers\HomeController::class, 'fetchDirector1AddressProofFData'])->name('fetch-Director1AddressProofF-data');
Route::get('/fetch-Director1AddressProofF-file-data', [App\Http\Controllers\HomeController::class, 'fetchDirector1AddressProofFFileData'])->name('fetch-Director1AddressProofF-file-data');



Route::post('/Director1ContactDetailsF', [App\Http\Controllers\HomeController::class, 'Director1ContactDetailsF'])->name('Director1ContactDetailsF');
Route::get('/fetch-Director1ContactDetailsF-data', [App\Http\Controllers\HomeController::class, 'fetchDirector1ContactDetailsFData'])->name('fetch-Director1ContactDetailsF-data');
Route::get('/fetch-Director1ContactDetailsF-file-data', [App\Http\Controllers\HomeController::class, 'fetchDirector1ContactDetailsFFileData'])->name('fetch-Director1ContactDetailsF-file-data');



Route::post('/Director1PANKYCF', [App\Http\Controllers\HomeController::class, 'Director1PANKYCF'])->name('Director1PANKYCF');
Route::get('/fetch-Director1PANKYCF-data', [App\Http\Controllers\HomeController::class, 'fetchDirector1PANKYCFData'])->name('fetch-Director1PANKYCF-data');
Route::get('/fetch-Director1PANKYCF-file-data', [App\Http\Controllers\HomeController::class, 'fetchDirector1PANKYCFFileData'])->name('fetch-Director1PANKYCF-file-data');



Route::post('/Director1PhotoF', [App\Http\Controllers\HomeController::class, 'Director1PhotoF'])->name('Director1PhotoF');
Route::get('/fetch-Director1PhotoF-data', [App\Http\Controllers\HomeController::class, 'fetchDirector1PhotoFData'])->name('fetch-Director1PhotoF-data');
Route::get('/fetch-Director1PhotoF-file-data', [App\Http\Controllers\HomeController::class, 'fetchDirector1PhotoFFileData'])->name('fetch-Director1PhotoF-file-data');



Route::post('/Director1SignimgF', [App\Http\Controllers\HomeController::class, 'Director1SignimgF'])->name('Director1SignimgF');
Route::get('/fetch-Director1SignimgF-data', [App\Http\Controllers\HomeController::class, 'fetchDirector1SignimgFData'])->name('fetch-Director1SignimgF-data');
Route::get('/fetch-Director1SignimgF-file-data', [App\Http\Controllers\HomeController::class, 'fetchDirector1SignimgFFileData'])->name('fetch-Director1SignimgF-file-data');



Route::post('/Director2SignimgF', [App\Http\Controllers\HomeController::class, 'Director2SignimgF'])->name('Director2SignimgF');
Route::get('/fetch-Director2SignimgF-data', [App\Http\Controllers\HomeController::class, 'fetchDirector2SignimgFData'])->name('fetch-Director2SignimgF-data');
Route::get('/fetch-Director2SignimgF-file-data', [App\Http\Controllers\HomeController::class, 'fetchDirector2SignimgFFileData'])->name('fetch-Director2SignimgF-file-data');


Route::post('/Director2PhotoF', [App\Http\Controllers\HomeController::class, 'Director2PhotoF'])->name('Director2PhotoF');
Route::get('/fetch-Director2PhotoF-data', [App\Http\Controllers\HomeController::class, 'fetchDirector2PhotoFData'])->name('fetch-Director2PhotoF-data');
Route::get('/fetch-Director2PhotoF-file-data', [App\Http\Controllers\HomeController::class, 'fetchDirector2PhotoFFileData'])->name('fetch-Director2PhotoF-file-data');


Route::post('/Director2PANKYCF', [App\Http\Controllers\HomeController::class, 'Director2PANKYCF'])->name('Director2PANKYCF');
Route::get('/fetch-Director2PANKYCF-data', [App\Http\Controllers\HomeController::class, 'fetchDirector2PANKYCFData'])->name('fetch-Director2PANKYCF-data');
Route::get('/fetch-Director2PANKYCF-file-data', [App\Http\Controllers\HomeController::class, 'fetchDirector2PANKYCFFileData'])->name('fetch-Director2PANKYCF-file-data');


Route::post('/Director2ContactDetailsF', [App\Http\Controllers\HomeController::class, 'Director2ContactDetailsF'])->name('Director2ContactDetailsF');
Route::get('/fetch-Director2ContactDetailsF-data', [App\Http\Controllers\HomeController::class, 'fetchDirector2ContactDetailsFData'])->name('fetch-Director2ContactDetailsF-data');
Route::get('/fetch-Director2ContactDetailsF-file-data', [App\Http\Controllers\HomeController::class, 'fetchDirector2ContactDetailsFFileData'])->name('fetch-Director2ContactDetailsF-file-data');


Route::post('/Director2AddressProofF', [App\Http\Controllers\HomeController::class, 'Director2AddressProofF'])->name('Director2AddressProofF');
Route::get('/fetch-Director2AddressProofF-data', [App\Http\Controllers\HomeController::class, 'fetchDirector2AddressProofFData'])->name('fetch-Director2AddressProofF-data');
Route::get('/fetch-Director2AddressProofF-file-data', [App\Http\Controllers\HomeController::class, 'fetchDirector2AddressProofFFileData'])->name('fetch-Director2AddressProofF-file-data');


Route::post('/Director2AadharKYCF', [App\Http\Controllers\HomeController::class, 'Director2AadharKYCF'])->name('Director2AadharKYCF');
Route::get('/fetch-Director2AadharKYCF-data', [App\Http\Controllers\HomeController::class, 'fetchDirector2AadharKYCFData'])->name('fetch-Director2AadharKYCF-data');
Route::get('/fetch-Director2AadharKYCF-file-data', [App\Http\Controllers\HomeController::class, 'fetchDirector2AadharKYCFFileData'])->name('fetch-Director2AadharKYCF-file-data');


Route::post('/IncorporationArtofAssocF', [App\Http\Controllers\HomeController::class, 'IncorporationArtofAssocF'])->name('IncorporationArtofAssocF');
Route::get('/fetch-IncorporationArtofAssocF-data', [App\Http\Controllers\HomeController::class, 'fetchIncorporationArtofAssocFData'])->name('fetch-IncorporationArtofAssocF-data');
Route::get('/fetch-IncorporationArtofAssocF-file-data', [App\Http\Controllers\HomeController::class, 'fetchIncorporationArtofAssocFFileData'])->name('fetch-IncorporationArtofAssocF-file-data');



Route::post('/IncorporationCertifofincorpF', [App\Http\Controllers\HomeController::class, 'IncorporationCertifofincorpF'])->name('IncorporationCertifofincorpF');
Route::get('/fetch-IncorporationCertifofincorpF-data', [App\Http\Controllers\HomeController::class, 'fetchIncorporationCertifofincorpFData'])->name('fetch-IncorporationCertifofincorpF-data');
Route::get('/fetch-IncorporationCertifofincorpF-file-data', [App\Http\Controllers\HomeController::class, 'fetchIncorporationCertifofincorpFFileData'])->name('fetch-IncorporationCertifofincorpF-file-data');


Route::post('/CharterdocumentsIncorporationMemorandumofAssociation', [App\Http\Controllers\HomeController::class, 'CharterdocumentsIncorporationMemorandumofAssociation'])->name('CharterdocumentsIncorporationMemorandumofAssociation');
Route::get('/fetch-CharterdocumentsIncorporationMemorandumofAssociation-data', [App\Http\Controllers\HomeController::class, 'fetchCharterdocumentsIncorporationMemorandumofAssociationData'])->name('fetch-CharterdocumentsIncorporationMemorandumofAssociation-data');
Route::get('/fetch-CharterdocumentsIncorporationMemorandumofAssociation-file-data', [App\Http\Controllers\HomeController::class, 'fetchCharterdocumentsIncorporationMemorandumofAssociationFileData'])->name('fetch-CharterdocumentsIncorporationMemorandumofAssociation-file-data');

Route::post('/IncorporationPartnerdeedF', [App\Http\Controllers\HomeController::class, 'IncorporationPartnerdeedF'])->name('IncorporationPartnerdeedF');
Route::get('/fetch-IncorporationPartnerdeedF-data', [App\Http\Controllers\HomeController::class, 'fetchIncorporationPartnerdeedFData'])->name('fetch-IncorporationPartnerdeedF-data');
Route::get('/fetch-IncorporationPartnerdeedF-file-data', [App\Http\Controllers\HomeController::class, 'fetchIncorporationPartnerdeedFFileData'])->name('fetch-IncorporationPartnerdeedF-file-data');

Route::post('/IncorporationLLPAgreementF', [App\Http\Controllers\HomeController::class, 'IncorporationLLPAgreementF'])->name('IncorporationLLPAgreementF');
Route::get('/fetch-IncorporationLLPAgreementF-data', [App\Http\Controllers\HomeController::class, 'fetchIncorporationLLPAgreementFData'])->name('fetch-IncorporationLLPAgreementF-data');
Route::get('/fetch-IncorporationLLPAgreementF-file-data', [App\Http\Controllers\HomeController::class, 'fetchIncorporationLLPAgreementFFileData'])->name('fetch-IncorporationLLPAgreementF-file-data');


Route::post('/IncorporationTrustDeedF', [App\Http\Controllers\HomeController::class, 'IncorporationTrustDeedF'])->name('IncorporationTrustDeedF');
Route::get('/fetch-IncorporationTrustDeedF-data', [App\Http\Controllers\HomeController::class, 'fetchIncorporationTrustDeedFData'])->name('fetch-IncorporationTrustDeedF-data');
Route::get('/fetch-IncorporationTrustDeedF-file-data', [App\Http\Controllers\HomeController::class, 'fetchIncorporationTrustDeedFFileData'])->name('fetch-IncorporationTrustDeedF-file-data');


Route::post('/IncorporationSharecertifF', [App\Http\Controllers\HomeController::class, 'IncorporationSharecertifF'])->name('IncorporationSharecertifF');
Route::get('/fetch-IncorporationSharecertifF-data', [App\Http\Controllers\HomeController::class, 'fetchIncorporationSharecertifFData'])->name('fetch-IncorporationSharecertifF-data');
Route::get('/fetch-IncorporationSharecertifF-file-data', [App\Http\Controllers\HomeController::class, 'fetchIncorporationSharecertifFFileData'])->name('fetch-IncorporationSharecertifF-file-data');


// latest path added by raman

Route::post('/CharterdocumentsRegistrationsPAN', [App\Http\Controllers\HomeController::class, 'CharterdocumentsRegistrationsPAN'])->name('CharterdocumentsRegistrationsPAN');
Route::get('/fetch-CharterdocumentsRegistrationsPAN-data', [App\Http\Controllers\HomeController::class, 'fetchCharterdocumentsRegistrationsPANData'])->name('fetch-CharterdocumentsRegistrationsPAN-data');
Route::get('/fetch-CharterdocumentsRegistrationsPAN-file-data', [App\Http\Controllers\HomeController::class, 'fetchCharterdocumentsRegistrationsPANFileData'])->name('fetch-CharterdocumentsRegistrationsPAN-file-data');


Route::post('/CharterdocumentsRegistrationsTAN', [App\Http\Controllers\HomeController::class, 'CharterdocumentsRegistrationsTAN'])->name('CharterdocumentsRegistrationsTAN');
Route::get('/fetch-CharterdocumentsRegistrationsTAN-data', [App\Http\Controllers\HomeController::class, 'fetchCharterdocumentsRegistrationsTANData'])->name('fetch-CharterdocumentsRegistrationsTAN-data');
Route::get('/fetch-CharterdocumentsRegistrationsTAN-file-data', [App\Http\Controllers\HomeController::class, 'fetchCharterdocumentsRegistrationsTANFileData'])->name('fetch-CharterdocumentsRegistrationsTAN-file-data');


Route::post('/CharterdocumentsRegistrationsGSTIN', [App\Http\Controllers\HomeController::class, 'CharterdocumentsRegistrationsGSTIN'])->name('CharterdocumentsRegistrationsGSTIN');
Route::get('/fetch-CharterdocumentsRegistrationsGSTIN-data', [App\Http\Controllers\HomeController::class, 'fetchCharterdocumentsRegistrationsGSTINData'])->name('fetch-CharterdocumentsRegistrationsGSTIN-data');
Route::get('/fetch-CharterdocumentsRegistrationsGSTIN-file-data', [App\Http\Controllers\HomeController::class, 'fetchCharterdocumentsRegistrationsGSTINFileData'])->name('fetch-CharterdocumentsRegistrationsGSTIN-file-data');


Route::post('/CharterdocumentsRegistrationsMSME', [App\Http\Controllers\HomeController::class, 'CharterdocumentsRegistrationsMSME'])->name('CharterdocumentsRegistrationsMSME');
Route::get('/fetch-CharterdocumentsRegistrationsMSME-data', [App\Http\Controllers\HomeController::class, 'fetchCharterdocumentsRegistrationsMSMEData'])->name('fetch-CharterdocumentsRegistrationsMSME-data');
Route::get('/fetch-CharterdocumentsRegistrationsMSME-file-data', [App\Http\Controllers\HomeController::class, 'fetchCharterdocumentsRegistrationsMSMEFileData'])->name('fetch-CharterdocumentsRegistrationsMSME-file-data');


Route::post('/CharterdocumentsRegistrationsTrademark', [App\Http\Controllers\HomeController::class, 'CharterdocumentsRegistrationsTrademark'])->name('CharterdocumentsRegistrationsTrademark');
Route::get('/fetch-CharterdocumentsRegistrationsTrademark-data', [App\Http\Controllers\HomeController::class, 'fetchCharterdocumentsRegistrationsTrademarkData'])->name('fetch-CharterdocumentsRegistrationsTrademark-data');
Route::get('/fetch-CharterdocumentsRegistrationsTrademark-file-data', [App\Http\Controllers\HomeController::class, 'fetchCharterdocumentsRegistrationsTrademarkFileData'])->name('fetch-CharterdocumentsRegistrationsTrademark-file-data');


Route::post('/CharterdocumentsRegistrationsPFC', [App\Http\Controllers\HomeController::class, 'CharterdocumentsRegistrationsPFC'])->name('CharterdocumentsRegistrationsPFC');
Route::get('/fetch-CharterdocumentsRegistrationsPFC-data', [App\Http\Controllers\HomeController::class, 'fetchCharterdocumentsRegistrationsPFCData'])->name('fetch-CharterdocumentsRegistrationsPFC-data');
Route::get('/fetch-CharterdocumentsRegistrationsPFC-file-data', [App\Http\Controllers\HomeController::class, 'fetchCharterdocumentsRegistrationsPFCFileData'])->name('fetch-CharterdocumentsRegistrationsPFC-file-data');


Route::post('/CharterdocumentsRegistrationsESIC', [App\Http\Controllers\HomeController::class, 'CharterdocumentsRegistrationsESIC'])->name('CharterdocumentsRegistrationsESIC');
Route::get('/fetch-CharterdocumentsRegistrationsESIC-data', [App\Http\Controllers\HomeController::class, 'fetchCharterdocumentsRegistrationsESICData'])->name('fetch-CharterdocumentsRegistrationsESIC-data');
Route::get('/fetch-CharterdocumentsRegistrationsESIC-file-data', [App\Http\Controllers\HomeController::class, 'fetchCharterdocumentsRegistrationsESICFileData'])->name('fetch-CharterdocumentsRegistrationsESIC-file-data');

Route::post('/CharterdocumentsRegistrationsPTC', [App\Http\Controllers\HomeController::class, 'CharterdocumentsRegistrationsPTC'])->name('CharterdocumentsRegistrationsPTC');
Route::get('/fetch-CharterdocumentsRegistrationsPTC-data', [App\Http\Controllers\HomeController::class, 'fetchCharterdocumentsRegistrationsPTCData'])->name('fetch-CharterdocumentsRegistrationsPTC-data');
Route::get('/fetch-CharterdocumentsRegistrationsPTC-file-data', [App\Http\Controllers\HomeController::class, 'fetchCharterdocumentsRegistrationsPTCDataFileData'])->name('fetch-CharterdocumentsRegistrationsPTC-file-data');

Route::post('/CharterdocumentsRegistrationsLWFC', [App\Http\Controllers\HomeController::class, 'CharterdocumentsRegistrationsLWFC'])->name('CharterdocumentsRegistrationsLWFC');
Route::get('/fetch-CharterdocumentsRegistrationsLWFC-data', [App\Http\Controllers\HomeController::class, 'fetchCharterdocumentsRegistrationsLWFCData'])->name('fetch-CharterdocumentsRegistrationsLWFC-data');
Route::get('/fetch-CharterdocumentsRegistrationsLWFC-file-data', [App\Http\Controllers\HomeController::class, 'fetchCharterdocumentsRegistrationsLWFCFileData'])->name('fetch-CharterdocumentsRegistrationsLWFC-file-data');


Route::post('/CharterdocumentsRegistrationsPOSHPolicy', [App\Http\Controllers\HomeController::class, 'CharterdocumentsRegistrationsPOSHPolicy'])->name('CharterdocumentsRegistrationsPOSHPolicy');
Route::get('/fetch-CharterdocumentsRegistrationsPOSHPolicy-data', [App\Http\Controllers\HomeController::class, 'fetchCharterdocumentsRegistrationsPOSHPolicyData'])->name('fetch-CharterdocumentsRegistrationsPOSHPolicy-data');
Route::get('/fetch-CharterdocumentsRegistrationsPOSHPolicy-file-data', [App\Http\Controllers\HomeController::class, 'fetchCharterdocumentsRegistrationsPOSHPolicyFileData'])->name('fetch-CharterdocumentsRegistrationsPOSHPolicy-file-data');


// path end


// latest path added by raman 16 aug

Route::post('/SecretarialAuditorAppointmentBRAA', [App\Http\Controllers\HomeController::class, 'SecretarialAuditorAppointmentBRAA'])->name('SecretarialAuditorAppointmentBRAA');
Route::get('/fetch-SecretarialAuditorAppointmentBRAA-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialAuditorAppointmentBRAAData'])->name('fetch-SecretarialAuditorAppointmentBRAA-data');
Route::get('/fetch-SecretarialAuditorAppointmentBRAA-file-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialAuditorAppointmentBRAAFileData'])->name('fetch-SecretarialAuditorAppointmentBRAA-file-data');


Route::post('/SecretarialAuditorAppointmentIA', [App\Http\Controllers\HomeController::class, 'SecretarialAuditorAppointmentIA'])->name('SecretarialAuditorAppointmentIA');
Route::get('/fetch-SecretarialAuditorAppointmentIA-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialAuditorAppointmentIAData'])->name('fetch-SecretarialAuditorAppointmentIA-data');
Route::get('/fetch-SecretarialAuditorAppointmentIA-file-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialAuditorAppointmentIAFileData'])->name('fetch-SecretarialAuditorAppointmentIA-file-data');

Route::post('/SecretarialAuditorAppointmentLA', [App\Http\Controllers\HomeController::class, 'SecretarialAuditorAppointmentLA'])->name('SecretarialAuditorAppointmentLA');
Route::get('/fetch-SecretarialAuditorAppointmentLA-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialAuditorAppointmentLAData'])->name('fetch-SecretarialAuditorAppointmentLA-data');
Route::get('/fetch-SecretarialAuditorAppointmentLA-file-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialAuditorAppointmentLAFileData'])->name('fetch-SecretarialAuditorAppointmentLA-file-data');

Route::post('/SecretarialAuditorAppointmentCRCAA', [App\Http\Controllers\HomeController::class, 'SecretarialAuditorAppointmentCRCAA'])->name('SecretarialAuditorAppointmentCRCAA');
Route::get('/fetch-SecretarialAuditorAppointmentCRCAA-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialAuditorAppointmentCRCAAData'])->name('fetch-SecretarialAuditorAppointmentCRCAA-data');
Route::get('/fetch-SecretarialAuditorAppointmentCRCAA-file-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialAuditorAppointmentCRCAAFileData'])->name('fetch-SecretarialAuditorAppointmentCRCAA-file-data');


Route::post('/SecretarialAuditorAppointmentALA', [App\Http\Controllers\HomeController::class, 'SecretarialAuditorAppointmentALA'])->name('SecretarialAuditorAppointmentALA');
Route::get('/fetch-SecretarialAuditorAppointmentALA-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialAuditorAppointmentALAData'])->name('fetch-SecretarialAuditorAppointmentALA-data');
Route::get('/fetch-SecretarialAuditorAppointmentALA-file-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialAuditorAppointmentALAFileData'])->name('fetch-SecretarialAuditorAppointmentALA-file-data');

Route::post('/SecretarialAuditorAppointmentSR', [App\Http\Controllers\HomeController::class, 'SecretarialAuditorAppointmentSR'])->name('SecretarialAuditorAppointmentSR');
Route::get('/fetch-SecretarialAuditorAppointmentSR-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialAuditorAppointmentSRData'])->name('fetch-SecretarialAuditorAppointmentSR-data');
Route::get('/fetch-SecretarialAuditorAppointmentSR-file-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialAuditorAppointmentSRFileData'])->name('fetch-SecretarialAuditorAppointmentSR-file-data');







Route::post('/SecretarialStatutoryRegistersRM', [App\Http\Controllers\HomeController::class, 'SecretarialStatutoryRegistersRM'])->name('SecretarialStatutoryRegistersRM');
Route::get('/fetch-SecretarialStatutoryRegistersRM-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRMData'])->name('fetch-SecretarialStatutoryRegistersRM-data');
Route::get('/fetch-SecretarialStatutoryRegistersRM-file-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRMFileData'])->name('fetch-SecretarialStatutoryRegistersRM-file-data');


Route::post('/SecretarialStatutoryRegistersROSH', [App\Http\Controllers\HomeController::class, 'SecretarialStatutoryRegistersROSH'])->name('SecretarialStatutoryRegistersROSH');
Route::get('/fetch-SecretarialStatutoryRegistersROSH-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersROSHData'])->name('fetch-SecretarialStatutoryRegistersROSH-data');
Route::get('/fetch-SecretarialStatutoryRegistersROSH-file-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersROSHFileData'])->name('fetch-SecretarialStatutoryRegistersROSH-file-data');



Route::post('/SecretarialStatutoryRegistersFR', [App\Http\Controllers\HomeController::class, 'SecretarialStatutoryRegistersFR'])->name('SecretarialStatutoryRegistersFR');
Route::get('/fetch-SecretarialStatutoryRegistersFR-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersFRData'])->name('fetch-SecretarialStatutoryRegistersFR-data');
Route::get('/fetch-SecretarialStatutoryRegistersFR-file-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersFRFileData'])->name('fetch-SecretarialStatutoryRegistersFR-file-data');



Route::post('/SecretarialStatutoryRegistersRDK', [App\Http\Controllers\HomeController::class, 'SecretarialStatutoryRegistersRDK'])->name('SecretarialStatutoryRegistersRDK');
Route::get('/fetch-SecretarialStatutoryRegistersRDK-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRDKData'])->name('fetch-SecretarialStatutoryRegistersRDK-data');
Route::get('/fetch-SecretarialStatutoryRegistersRDK-file-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRDKFileData'])->name('fetch-SecretarialStatutoryRegistersRDK-file-data');



Route::post('/SecretarialStatutoryRegistersRC', [App\Http\Controllers\HomeController::class, 'SecretarialStatutoryRegistersRC'])->name('SecretarialStatutoryRegistersRC');
Route::get('/fetch-SecretarialStatutoryRegistersRC-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRCData'])->name('fetch-SecretarialStatutoryRegistersRC-data');
Route::get('/fetch-SecretarialStatutoryRegistersRC-file-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRCFileData'])->name('fetch-SecretarialStatutoryRegistersRC-file-data');


Route::post('/SecretarialStatutoryRegistersRD', [App\Http\Controllers\HomeController::class, 'SecretarialStatutoryRegistersRD'])->name('SecretarialStatutoryRegistersRD');
Route::get('/fetch-SecretarialStatutoryRegistersRD-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRDData'])->name('fetch-SecretarialStatutoryRegistersRD-data');
Route::get('/fetch-SecretarialStatutoryRegistersRD-file-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRDFileData'])->name('fetch-SecretarialStatutoryRegistersRD-file-data');


Route::post('/SecretarialStatutoryRegistersRLGS', [App\Http\Controllers\HomeController::class, 'SecretarialStatutoryRegistersRLGS'])->name('SecretarialStatutoryRegistersRLGS');
Route::get('/fetch-SecretarialStatutoryRegistersRLGS-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRLGSData'])->name('fetch-SecretarialStatutoryRegistersRLGS-data');
Route::get('/fetch-SecretarialStatutoryRegistersRLGS-file-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRLGSFileData'])->name('fetch-SecretarialStatutoryRegistersRLGS-file-data');


Route::post('/SecretarialStatutoryRegistersRCD', [App\Http\Controllers\HomeController::class, 'SecretarialStatutoryRegistersRCD'])->name('SecretarialStatutoryRegistersRCD');
Route::get('/fetch-SecretarialStatutoryRegistersRCD-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRCDData'])->name('fetch-SecretarialStatutoryRegistersRCD-data');
Route::get('/fetch-SecretarialStatutoryRegistersRCD-file-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRCDFileData'])->name('fetch-SecretarialStatutoryRegistersRCD-file-data');

Route::post('/SecretarialStatutoryRegistersRS', [App\Http\Controllers\HomeController::class, 'SecretarialStatutoryRegistersRCDI'])->name('SecretarialStatutoryRegistersRCDI');
Route::get('/fetch-SecretarialStatutoryRegistersRS-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRCDIData'])->name('fetch-SecretarialStatutoryRegistersRCDI-data');
Route::get('/fetch-SecretarialStatutoryRegistersRS-file-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRCDIFileData'])->name('fetch-SecretarialStatutoryRegistersRCDI-file-data');


Route::post('/SecretarialStatutoryRegistersRSES', [App\Http\Controllers\HomeController::class, 'SecretarialStatutoryRegistersRSES'])->name('SecretarialStatutoryRegistersRSES');
Route::get('/fetch-SecretarialStatutoryRegistersRSES-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRSESData'])->name('fetch-SecretarialStatutoryRegistersRSES-data');
Route::get('/fetch-SecretarialStatutoryRegistersRSES-file-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRSESFileData'])->name('fetch-SecretarialStatutoryRegistersRSES-file-data');


Route::post('/SecretarialStatutoryRegistersRESO', [App\Http\Controllers\HomeController::class, 'SecretarialStatutoryRegistersRESO'])->name('SecretarialStatutoryRegistersRESO');
Route::get('/fetch-SecretarialStatutoryRegistersRESO-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRESOData'])->name('fetch-SecretarialStatutoryRegistersRESO-data');
Route::get('/fetch-SecretarialStatutoryRegistersRESO-file-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRESOFileData'])->name('fetch-SecretarialStatutoryRegistersRESO-file-data');


Route::post('/SecretarialStatutoryRegistersRSBB', [App\Http\Controllers\HomeController::class, 'SecretarialStatutoryRegistersRSBB'])->name('SecretarialStatutoryRegistersRSBB');
Route::get('/fetch-SecretarialStatutoryRegistersRSBB-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRSBBData'])->name('fetch-SecretarialStatutoryRegistersRSBB-data');
Route::get('/fetch-SecretarialStatutoryRegistersRSBB-file-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRSBBFileData'])->name('fetch-SecretarialStatutoryRegistersRSBB-file-data');


Route::post('/SecretarialStatutoryRegistersRRDSC', [App\Http\Controllers\HomeController::class, 'SecretarialStatutoryRegistersRRDSC'])->name('SecretarialStatutoryRegistersRRDSC');
Route::get('/fetch-SecretarialStatutoryRegistersRRDSC-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRRDSCData'])->name('fetch-SecretarialStatutoryRegistersRRDSC-data');
Route::get('/fetch-SecretarialStatutoryRegistersRRDSC-file-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRRDSCFileData'])->name('fetch-SecretarialStatutoryRegistersRRDSC-file-data');





Route::post('/SecretarialStatutoryRegistersSBO', [App\Http\Controllers\HomeController::class, 'SecretarialStatutoryRegistersSBO'])->name('SecretarialStatutoryRegistersSBO');
Route::get('/fetch-SecretarialStatutoryRegistersSBO-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersSBOData'])->name('fetch-SecretarialStatutoryRegistersSBO-data');
Route::get('/fetch-SecretarialStatutoryRegistersSBO-file-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersSBOFileData'])->name('fetch-SecretarialStatutoryRegistersSBO-file-data');

Route::post('/SecretarialStatutoryRegistersRPB', [App\Http\Controllers\HomeController::class, 'SecretarialStatutoryRegistersRPB'])->name('SecretarialStatutoryRegistersRPB');
Route::get('/fetch-SecretarialStatutoryRegistersRPB-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRPBData'])->name('fetch-SecretarialStatutoryRegistersRPB-data');
Route::get('/fetch-SecretarialStatutoryRegistersRPB-file-data', [App\Http\Controllers\HomeController::class, 'fetchSecretarialStatutoryRegistersRPBFileData'])->name('fetch-SecretarialStatutoryRegistersRPB-file-data');




// path end

Route::get('/downloadFilecustom/{id}', [App\Http\Controllers\HomeController::class, 'downloadFilecustom'])->name('downloadFilecustom');



Route::get('/checkFiles', [App\Http\Controllers\HomeController::class, 'checkFiles'])->name('checkFiles');
Route::get('/user/salemanage', [App\Http\Controllers\HomeController::class, 'salemanage'])->name('user/salemanage');

Route::get('/folders', [App\Http\Controllers\HomeController::class,'getFolders']);

Route::get('/user/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('user.dashboard.index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/download-file/{id}', [App\Http\Controllers\HomeController::class,'downloadFile']);


Route::get('/docurepo', [App\Http\Controllers\HomeController::class, 'docurepo'])->name('docurepo');
Route::get('/fetch-folder-contents',[App\Http\Controllers\HomeController::class, 'fetchFolderContents'])->name('fetchFolderContents');

Route::get('/reposidebar', [App\Http\Controllers\HomeController::class, 'reposidebar'])->name('reposidebar');



Route::get('/admin/clients', [App\Http\Controllers\HomeController::class, 'clientsview'])->name('admin/clients');
Route::post('/storeclients', [App\Http\Controllers\HomeController::class, 'storeclients'])->name('storeclients');
Route::post('/updateuserprofile', [App\Http\Controllers\HomeController::class, 'updateuserprofile'])->name('updateuserprofile');
Route::post('/updateVideoStatus', [App\Http\Controllers\HomeController::class, 'updateVideoStatus'])->name('updateVideoStatus');
Route::post('/updateskipdemo', [App\Http\Controllers\HomeController::class, 'updateskipdemo'])->name('updateskipdemo');


// Route::post('/register', [App\Http\Controllers\HomeController::class, 'register'])->middleware('auth')->name('register');
Route::get('/admin/employees', [App\Http\Controllers\HomeController::class, 'employeessview'])->name('admin/employees');
Route::post('/storeemployee', [App\Http\Controllers\HomeController::class, 'storeemployee'])->name('storeemployee');
Route::delete('/announcements/{id}', [App\Http\Controllers\HomeController::class,'deleteAnnouncement'])->name('announcements.delete');
Route::delete('/announcementsd/{id}', [App\Http\Controllers\HomeController::class,'deleteAnnouncementd'])->name('announcementsd.delete');
Route::get('/user/auditpro', [App\Http\Controllers\HomeController::class, 'auditpro'])->name('user/auditpro');
Route::get('/admin/notification', [App\Http\Controllers\HomeController::class, 'adminnotification'])->name('admin/notification');

Route::get('/userrolenotification', [App\Http\Controllers\HomeController::class, 'userrolenotification'])->name('userrolenotification');


Route::get('/usertrashnotification', [App\Http\Controllers\HomeController::class, 'usertrashnotification'])->name('usertrashnotification');



Route::get('/employee/notification', [App\Http\Controllers\HomeController::class, 'empnotification'])->name('employee/notification');

Route::delete('/clientdel/{id}', [App\Http\Controllers\HomeController::class,'clientdel'])->name('clientdel.delete');

Route::post('/upload-policy',[App\Http\Controllers\HomeController::class, 'uploadPolicy'])->name('upload-policy');
Route::get('/download-policy-file/{id}/{fileName}',[App\Http\Controllers\HomeController::class, 'downloadPolicyFile'])->name('download-policy-file');
Route::get('/download-ope-file/{id}/{employeeName}',[App\Http\Controllers\HomeController::class, 'downloadOpeFile'])->name('download-ope-file');

Route::post('/assignClient', [App\Http\Controllers\HomeController::class,'assignClient'])->name('assignClient');

Route::get('/employee/clients', [App\Http\Controllers\HomeController::class, 'userclientsview'])->name('employee/clients');
Route::get('/director', [App\Http\Controllers\HomeController::class, 'director'])->name('director');

Route::get('/admin/announcement', [App\Http\Controllers\HomeController::class, 'adminannouncement'])->name('admin/announcement');
Route::get('/admin/policymanual', [App\Http\Controllers\HomeController::class, 'policymanual'])->name('admin/policymanual');
Route::get('/admin/template', [App\Http\Controllers\HomeController::class, 'admintemplate'])->name('admin/template');
Route::post('/upload-template',[App\Http\Controllers\HomeController::class, 'uploadTemplate'])->name('upload-template');
Route::get('/download-template-file/{id}/{fileName}',[App\Http\Controllers\HomeController::class, 'downloadTemplateFile'])->name('download-template-file');
Route::delete('/delete-temp/{id}', [App\Http\Controllers\HomeController::class,'deletetemp'])->name('temp.delete');
Route::get('/view-template-file/{id}/{fileName}', [App\Http\Controllers\HomeController::class,'viewTemplateFile'])->name('view-template-file');

Route::post('/update-favorite-status/{templateId}/{newFavoriteStatus}',[App\Http\Controllers\HomeController::class, 'updateFavoriteStatus'])->name('update.favorite.status');



Route::get('/admin/dsc', [App\Http\Controllers\HomeController::class, 'admindse'])->name('admin/dsc');
Route::post('/storedse', [App\Http\Controllers\HomeController::class,'storedse'])->name('storedse');
Route::post('/storeannouncementofclients', [App\Http\Controllers\HomeController::class,'storeannouncementofclients'])->name('storeannouncementofclients');
Route::post('/storedirector', [App\Http\Controllers\HomeController::class,'storedirector'])->name('storedirector');
Route::post('/storeannouncementofemployees', [App\Http\Controllers\HomeController::class,'storeannouncementofemployees'])->name('storeannouncementofemployees');
Route::get('/user/trademark', [App\Http\Controllers\HomeController::class, 'trademark'])->name('user/trademark');

Route::get('/employee/timesheet', [App\Http\Controllers\HomeController::class, 'emptimesheet'])->name('employee/timesheet');

Route::get('/admin/timesheet', [App\Http\Controllers\HomeController::class, 'admintimesheet'])->name('admin/timesheet');

Route::get('/admin/outofexpense', [App\Http\Controllers\HomeController::class, 'adminoutofexpense'])->name('admin/outofexpense');
Route::post('/updateoutofexpense', [App\Http\Controllers\HomeController::class,'updateoutofexpense'])->name('updateoutofexpense');
Route::post('/empupdateoutofexpense', [App\Http\Controllers\HomeController::class,'empupdateoutofexpense'])->name('empupdateoutofexpense');

Route::get('/employee/profile', [App\Http\Controllers\HomeController::class, 'empprofile'])->name('employee/profile');
Route::post('/updatesingleemployeeprofile', [App\Http\Controllers\HomeController::class, 'updatesingleemployeeprofile'])->name('updatesingleemployeeprofile');
Route::post('/updateemployeeprofile', [App\Http\Controllers\HomeController::class, 'updateemployeeprofile'])->name('updateemployeeprofile');
Route::post('/updateclientprofiles', [App\Http\Controllers\HomeController::class, 'updateclientprofiles'])->name('updateclientprofiles');

Route::post('/updatedsc', [App\Http\Controllers\HomeController::class, 'updatedsc'])->name('updatedsc');


Route::get('/employee/client', [App\Http\Controllers\HomeController::class, 'empclient'])->name('employee/client');

Route::post('/updateclientprofile', [App\Http\Controllers\HomeController::class, 'updateclientprofile'])->name('updateclientprofile');

Route::post('/updatetimesheet', [App\Http\Controllers\HomeController::class, 'storeTimeSheet'])->name('updatetimesheet');
Route::post('/empupdatetimesheet', [App\Http\Controllers\HomeController::class, 'empupdatetimesheet'])->name('empupdatetimesheet');

Route::get('/employee/cal', [App\Http\Controllers\HomeController::class, 'empcal'])->name('employee/cal');

Route::get('/employee/issue', [App\Http\Controllers\HomeController::class, 'empissue'])->name('employee/issue');
Route::get('/employee/outofexpense', [App\Http\Controllers\HomeController::class, 'empoutofexpense'])->name('employee/outofexpense');
Route::post('/storeoutofexpense', [App\Http\Controllers\HomeController::class,'storeoutofexpense'])->name('storeoutofexpense');

Route::post('/issueClient', [App\Http\Controllers\HomeController::class, 'issueClient'])->name('issueClient');

Route::get('/admin/issue', [App\Http\Controllers\HomeController::class, 'adminissue'])->name('admin/issue');
Route::get('/admin/calendar', [App\Http\Controllers\HomeController::class, 'admincalendar'])->name('admin/calendar');
Route::get('/user/issue-tracker', [App\Http\Controllers\HomeController::class, 'userissue'])->name('user/issue-tracker');

Route::get('/user/calendar', [App\Http\Controllers\HomeController::class, 'usercal'])->name('user/calendar');
Route::get('/fetch-events/{clientId}', [App\Http\Controllers\HomeController::class,'fetchEvents'])->name('fetch-events');
Route::post('/delete-event', [App\Http\Controllers\HomeController::class,'evedelete'])->name('event.delete');

Route::get('/user/wallet', [App\Http\Controllers\HomeController::class, 'userwallet'])->name('user/wallet');
Route::get('/user/template', [App\Http\Controllers\HomeController::class, 'usertemplate'])->name('user/template');
Route::post('/downloadKeyFile', [App\Http\Controllers\HomeController::class, 'downloadKeyFile'])->name('downloadKeyFile');
Route::get('/documents/{id}/share', [App\Http\Controllers\HomeController::class,'share'])->name('documents.share');
Route::get('/user/repcalander', [App\Http\Controllers\HomeController::class, 'repcalander'])->name('user/repcalander');

Route::get('/user/payrollmaster', [App\Http\Controllers\HomeController::class, 'payrollmaster'])->name('user/payrollmaster');
	Route::get('/user/payrolldetails/{id}', [App\Http\Controllers\HomeController::class, 'payrolldetails'])->name('user/payrolldetails');

Route::get('/auth/google',[App\Http\Controllers\Auth\RegisterController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [App\Http\Controllers\Auth\RegisterController::class,'handleGoogleCallback']);



Route::post('/otpform',[App\Http\Controllers\HomeController::class, 'otpform'])->name('otpform');

Route::post('/dirupdate',[App\Http\Controllers\HomeController::class, 'dirupdate'])->name('dirupdate');
Route::post('/dirupdate1',[App\Http\Controllers\HomeController::class, 'dirupdate1'])->name('dirupdate1');
Route::post('/dirupdate2',[App\Http\Controllers\HomeController::class, 'dirupdate2'])->name('dirupdate2');
Route::post('/dirupdate3',[App\Http\Controllers\HomeController::class, 'dirupdate3'])->name('dirupdate3');

// Route::post('/customdocup',[App\Http\Controllers\HomeController::class, 'customdocup'])->name('customdocup');
Route::post('/customdocupss', [App\Http\Controllers\HomeController::class,'customdocupss'])->name('customdocupss');

Route::post('/keyfile/validate', [App\Http\Controllers\HomeController::class, 'validateOTP'])->name('keyfile.validate');

Route::post('/submitForm', [App\Http\Controllers\HomeController::class, 'submitForm'])->name('submitForm');

Route::post('/submitDocu', [App\Http\Controllers\HomeController::class, 'submitDocu'])->name('submitDocu');

Route::get('/fetchDocuments', [App\Http\Controllers\HomeController::class,'fetchDocuments'])->name('fetchDocuments');

Route::get('/documents/{id}/download',[App\Http\Controllers\HomeController::class, 'download'])->name('downloadDocument');

Route::get('/folders', [App\Http\Controllers\HomeController::class, 'getFolders']);
Route::get('/subfolders', [App\Http\Controllers\HomeController::class, 'getSubfolders']);
Route::get('/folder-data', [App\Http\Controllers\HomeController::class, 'getFolderData']);


Route::get('/user/incorporationdocs', [App\Http\Controllers\HomeController::class, 'userincorporationdocs'])->name('user/incorporationdocs');
Route::get('/getFilesss', [App\Http\Controllers\HomeController::class,'getFilesss'])->name('getFilesss');
Route::get('/user/registrationslicences', [App\Http\Controllers\HomeController::class, 'userregistrationlicences'])->name('user/registrationslicences');
Route::post('/uploadincorporationdocs', [App\Http\Controllers\HomeController::class, 'uploadincorporationdocs'])->name('uploadincorporationdocs');

Route::get('/user/change-pass', [App\Http\Controllers\HomeController::class, 'userpassword'])->name('user/change-pass');

// Route::delete('/delete-user/{id}', [App\Http\Controllers\HomeController::class,'deleteUser']);
Route::delete('/delete-employee/{id}', [App\Http\Controllers\HomeController::class,'deleteemp'])->name('employee.delete');
Route::delete('/delete-client/{id}', [App\Http\Controllers\HomeController::class,'deletecli'])->name('client.delete');
Route::delete('/delete-dsc/{id}', [App\Http\Controllers\HomeController::class,'deletedsc'])->name('dsc.delete');
Route::delete('/delete-ope/{id}', [App\Http\Controllers\HomeController::class,'deleteope'])->name('ope.delete');
Route::delete('/delete-time/{id}', [App\Http\Controllers\HomeController::class,'deletetime'])->name('time.delete');
Route::post('/send-notification', [App\Http\Controllers\HomeController::class,'sendNotification'])->name('send.notification');
Route::delete('/delete-pol/{id}', [App\Http\Controllers\HomeController::class,'deletepol'])->name('pol.delete');
Route::get('/user/welcomewallet', [App\Http\Controllers\HomeController::class, 'welcomewallet'])->name('user/welcomewallet');

Route::post('/updateuserpassword', [App\Http\Controllers\HomeController::class, 'updateuserpassword'])->name('updateuserpassword');

Route::post('/moadoc', [App\Http\Controllers\UploadedFileController::class, 'moadoc'])->name('moadoc');
Route::post('/updateFileName11', [App\Http\Controllers\UploadedFileController::class, 'updateFileName11'])->name('updateFileName11');
Route::get('/download-moadoc-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'downloadmoadocFile'])->name('download-moadoc-file');
Route::delete('/delete-moadoc/{id}', [App\Http\Controllers\UploadedFileController::class,'deletemoadoc'])->name('moadoc.delete');
// Route::get('/user/incorporationdocs', [App\Http\Controllers\DriveController::class, 'index'])->name('user/incorporationdocs');
// Route::get('/api/folders', [App\Http\Controllers\FolderController::class, 'index']);
// Route::post('/api/folders', [App\Http\Controllers\FolderController::class, 'store']);
// Route::post('/api/files', [App\Http\Controllers\FolderController::class, 'store']);
// Route::get('/folders/{folderId}/files', [App\Http\Controllers\FolderController::class,'getFiles']);
// Route::get('/download/{id}/{name}', [App\Http\Controllers\FileController::class,'download'])->name('download.file');
// Route::get('/folders/{folderId}/files', [App\Http\Controllers\FolderController::class,'showFiles'])->name('folders.showFiles');
Route::post('/eventsstore', [App\Http\Controllers\HomeController::class, 'eventsstore'])->name('eventsstore');
Route::get('events', [App\Http\Controllers\HomeController::class,'event'])->name('events.event');
Route::post('/managestore', [App\Http\Controllers\HomeController::class, 'managestore'])->name('orgchart.managestore');
Route::post('/uploadss', [App\Http\Controllers\UploadedFileController::class, 'uploadss'])->name('uploadss');

Route::post('/chartereddoc', [App\Http\Controllers\UploadedFileController::class, 'chartereddoc'])->name('chartereddoc');

Route::post('/coidoc', [App\Http\Controllers\UploadedFileController::class, 'coidoc'])->name('coidoc');
Route::post('/pandoc', [App\Http\Controllers\UploadedFileController::class, 'pandoc'])->name('pandoc');

Route::post('/tandoc', [App\Http\Controllers\UploadedFileController::class, 'tandoc'])->name('tandoc');
Route::post('/incdoc', [App\Http\Controllers\UploadedFileController::class, 'incdoc'])->name('incdoc');
Route::post('/incdoc28', [App\Http\Controllers\UploadedFileController::class, 'incdoc28'])->name('incdoc28');
Route::post('/decincdoc', [App\Http\Controllers\UploadedFileController::class, 'decincdoc'])->name('decincdoc');
Route::post('/spicedoc', [App\Http\Controllers\UploadedFileController::class, 'spicedoc'])->name('spicedoc');
Route::get('/download-aoa528-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'downloadaoaFile528'])->name('download-aoa528-file');
Route::post('/customdoc', [App\Http\Controllers\UploadedFileController::class, 'customdoc'])->name('customdoc');
Route::get('/user/rolemanagement', [App\Http\Controllers\HomeController::class, 'rolemanagement'])->name('user/rolemanagement');
Route::get('/user/loginpassedit', [App\Http\Controllers\HomeController::class, 'loginpassedit'])->name('user/loginpassedit');
Route::get('/user/incorporationdocs', [App\Http\Controllers\UploadedFileController::class, 'index'])->name('user/incorporationdocs');

Route::get('/download-aoa-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'downloadaoaFile'])->name('download-aoa-file');
Route::get('/download-aoa5dec-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'downloadaoaFile5dec'])->name('download-aoa5dec-file');
Route::get('/download-aoa1-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'downloadaoaFile1'])->name('download-aoa1-file');
Route::get('/download-aoa2-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'downloadaoaFile2'])->name('download-aoa2-file');
Route::get('/download-aoa3-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'downloadaoaFile3'])->name('download-aoa3-file');
Route::get('/download-aoa4-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'downloadaoaFile4'])->name('download-aoa4-file');
Route::get('/download-aoa5-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'downloadaoaFile5'])->name('download-aoa5-file');
Route::get('/download-aoa6-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'downloadaoaFile6'])->name('download-aoa6-file');
Route::get('/download-aoa7-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'downloadaoaFile7'])->name('download-aoa7-file');

Route::get('/user/MiscellaneousDocuments', [App\Http\Controllers\HomeController::class, 'MiscellaneousDocuments'])->name('user/MiscellaneousDocuments');
Route::get('/user/Management', [App\Http\Controllers\HomeController::class, 'Management'])->name('user/Management');
    Route::get('/user/manageprofile', [App\Http\Controllers\HomeController::class, 'manageprofile'])->name('user/manageprofile');
Route::get('/user/ContractManagement', [App\Http\Controllers\HomeController::class, 'ContractManagement'])->name('user/ContractManagement');
Route::get('/user/companyprofile', [App\Http\Controllers\HomeController::class, 'companyprofile'])->name('user/companyprofile');
Route::get('/user/Sop', [App\Http\Controllers\HomeController::class, 'Sop'])->name('user/Sop');
	Route::get('/user/Employeelifecycle', [App\Http\Controllers\HomeController::class, 'Employeelifecycle'])->name('user/Employeelifecycle');
	// Route::get('/user/Employeedetails', [App\Http\Controllers\HomeController::class, 'Employeedetails'])->name('user/Employeedetails');
    Route::get('/user/Employeedetails/{id}', [App\Http\Controllers\HomeController::class, 'Employeedetails'])->name('user/Employeedetails');

Route::post('/updateFileName', [App\Http\Controllers\UploadedFileController::class, 'updateFileName'])->name('updateFileName');
Route::post('/updateFileName1', [App\Http\Controllers\UploadedFileController::class, 'updateFileName1'])->name('updateFileName1');
Route::post('/updateFileName2', [App\Http\Controllers\UploadedFileController::class, 'updateFileName2'])->name('updateFileName2');
Route::post('/updateFileName3', [App\Http\Controllers\UploadedFileController::class, 'updateFileName3'])->name('updateFileName3');
Route::post('/updateFileName4', [App\Http\Controllers\UploadedFileController::class, 'updateFileName4'])->name('updateFileName4');
Route::post('/updateFileName5', [App\Http\Controllers\UploadedFileController::class, 'updateFileName5'])->name('updateFileName5');

Route::post('/updateFileName528', [App\Http\Controllers\UploadedFileController::class, 'updateFileName528'])->name('updateFileName528');

Route::post('/updateFileName5dec', [App\Http\Controllers\UploadedFileController::class, 'updateFileName5dec'])->name('updateFileName5dec');

Route::post('/updateFileName6', [App\Http\Controllers\UploadedFileController::class, 'updateFileName6'])->name('updateFileName6');
Route::post('/updateFileName7', [App\Http\Controllers\UploadedFileController::class, 'updateFileName7'])->name('updateFileName7');
Route::post('/sendOtp',[App\Http\Controllers\HomeController::class, 'sendOtp'])->name('sendOtp');
Route::get('/user/directorsinfo', [App\Http\Controllers\HomeController::class, 'directorsinfo'])->name('user/directorsinfo');
Route::get('/user/calender', [App\Http\Controllers\HomeController::class, 'calender'])->name('user/calender');
Route::delete('/delete-file/{id}', [App\Http\Controllers\UploadedFileController::class,'deletefile'])->name('file.delete');
Route::delete('/delete-file1/{id}', [App\Http\Controllers\UploadedFileController::class,'deletefile1'])->name('file1.delete');
Route::delete('/delete-file2/{id}', [App\Http\Controllers\UploadedFileController::class,'deletefile2'])->name('file2.delete');
Route::delete('/delete-file3/{id}', [App\Http\Controllers\UploadedFileController::class,'deletefile3'])->name('file3.delete');
Route::delete('/delete-file4/{id}', [App\Http\Controllers\UploadedFileController::class,'deletefile4'])->name('file4.delete');
Route::delete('/delete-file5/{id}', [App\Http\Controllers\UploadedFileController::class,'deletefile5'])->name('file5.delete');
Route::delete('/delete-file6/{id}', [App\Http\Controllers\UploadedFileController::class,'deletefile6'])->name('file6.delete');
Route::delete('/delete-file7/{id}', [App\Http\Controllers\UploadedFileController::class,'deletefile7'])->name('file7.delete');

Route::delete('/delete-file528/{id}', [App\Http\Controllers\UploadedFileController::class,'deletefile528'])->name('file528.delete');
Route::delete('/delete-file5dec/{id}', [App\Http\Controllers\UploadedFileController::class,'deletefile5dec'])->name('file5dec.delete');

Route::delete('/delete-filemis/{id}', [App\Http\Controllers\UploadedFileController::class,'misdeletefile'])->name('filemis.delete');
Route::delete('/delete-file1mis/{id}', [App\Http\Controllers\UploadedFileController::class,'misdeletefile1'])->name('file1mis.delete');
Route::delete('/delete-file2mis/{id}', [App\Http\Controllers\UploadedFileController::class,'misdeletefile2'])->name('file2mis.delete');
Route::delete('/delete-file3mis/{id}', [App\Http\Controllers\UploadedFileController::class,'misdeletefile3'])->name('file3mis.delete');
Route::delete('/delete-file4mis/{id}', [App\Http\Controllers\UploadedFileController::class,'misdeletefile4'])->name('file4mis.delete');
Route::delete('/delete-file5mis/{id}', [App\Http\Controllers\UploadedFileController::class,'misdeletefile5'])->name('file5mis.delete');
Route::delete('/delete-file6mis/{id}', [App\Http\Controllers\UploadedFileController::class,'misdeletefile6'])->name('file6mis.delete');
Route::delete('/delete-file7mis/{id}', [App\Http\Controllers\UploadedFileController::class,'misdeletefile7'])->name('file7mis.delete');



Route::delete('/delete-filereg/{id}', [App\Http\Controllers\UploadedFileController::class,'regdeletefile'])->name('filereg.delete');
Route::delete('/delete-file1reg/{id}', [App\Http\Controllers\UploadedFileController::class,'regdeletefile1'])->name('file1reg.delete');
Route::delete('/delete-file2reg/{id}', [App\Http\Controllers\UploadedFileController::class,'regdeletefile2'])->name('file2reg.delete');
Route::delete('/delete-file3reg/{id}', [App\Http\Controllers\UploadedFileController::class,'regdeletefile3'])->name('file3reg.delete');
Route::delete('/delete-file4reg/{id}', [App\Http\Controllers\UploadedFileController::class,'regdeletefile4'])->name('file4reg.delete');
Route::delete('/delete-file5reg/{id}', [App\Http\Controllers\UploadedFileController::class,'regdeletefile5'])->name('file5reg.delete');
Route::delete('/delete-file6reg/{id}', [App\Http\Controllers\UploadedFileController::class,'regdeletefile6'])->name('file6reg.delete');
Route::delete('/delete-file7reg/{id}', [App\Http\Controllers\UploadedFileController::class,'regdeletefile7'])->name('file7reg.delete');
Route::delete('/delete-file6regpfdoc/{id}', [App\Http\Controllers\UploadedFileController::class,'regdeletefile6regpfdoc'])->name('file6regpfdoc.delete');
Route::delete('/delete-file6regesi/{id}', [App\Http\Controllers\UploadedFileController::class,'regdeletefile6esi'])->name('file6regesi.delete');
Route::delete('/delete-file6regpt/{id}', [App\Http\Controllers\UploadedFileController::class,'regdeletefile6pt'])->name('file6regpt.delete');
Route::delete('/delete-file6regtl/{id}', [App\Http\Controllers\UploadedFileController::class,'regdeletefile6tl'])->name('file6regtl.delete');
Route::delete('/delete-file6regur/{id}', [App\Http\Controllers\UploadedFileController::class,'regdeletefile6ur'])->name('file6regur.delete');

Route::get('/user/docrepostry', [App\Http\Controllers\HomeController::class, 'docrepostry'])->name('user/docrepostry');
Route::post('/create-folder', [App\Http\Controllers\HomeController::class,'createFolder'])->name('create.folder');
Route::post('/upload-file', [App\Http\Controllers\HomeController::class,'uploadFile'])->name('upload.file');
Route::get('/check-folder-contents', [App\Http\Controllers\HomeController::class, 'checkFolderContents'])->name('check.folder.contents');

Route::post('/misupdateFileName', [App\Http\Controllers\UploadedFileController::class, 'misupdateFileName'])->name('misupdateFileName');
Route::post('/misupdateFileName1', [App\Http\Controllers\UploadedFileController::class, 'misupdateFileName1'])->name('misupdateFileName1');
Route::post('/misupdateFileName2', [App\Http\Controllers\UploadedFileController::class, 'misupdateFileName2'])->name('misupdateFileName2');
Route::post('/misupdateFileName3', [App\Http\Controllers\UploadedFileController::class, 'misupdateFileName3'])->name('misupdateFileName3');
Route::post('/misupdateFileName4', [App\Http\Controllers\UploadedFileController::class, 'misupdateFileName4'])->name('misupdateFileName4');
Route::post('/misupdateFileName5', [App\Http\Controllers\UploadedFileController::class, 'misupdateFileName5'])->name('misupdateFileName5');
Route::post('/misupdateFileName6', [App\Http\Controllers\UploadedFileController::class, 'misupdateFileName6'])->name('misupdateFileName6');
Route::post('/misupdateFileName7', [App\Http\Controllers\UploadedFileController::class, 'misupdateFileName7'])->name('misupdateFileName7');


Route::post('/regupdateFileName', [App\Http\Controllers\UploadedFileController::class, 'regupdateFileName'])->name('regupdateFileName');
Route::post('/regupdateFileName1', [App\Http\Controllers\UploadedFileController::class, 'regupdateFileName1'])->name('regupdateFileName1');
Route::post('/regupdateFileName2', [App\Http\Controllers\UploadedFileController::class, 'regupdateFileName2'])->name('regupdateFileName2');
Route::post('/regupdateFileName3', [App\Http\Controllers\UploadedFileController::class, 'regupdateFileName3'])->name('regupdateFileName3');
Route::post('/regupdateFileName4', [App\Http\Controllers\UploadedFileController::class, 'regupdateFileName4'])->name('regupdateFileName4');
Route::post('/regupdateFileName5', [App\Http\Controllers\UploadedFileController::class, 'regupdateFileName5'])->name('regupdateFileName5');
Route::post('/regupdateFileName6', [App\Http\Controllers\UploadedFileController::class, 'regupdateFileName6'])->name('regupdateFileName6');
Route::post('/regupdateFileName7', [App\Http\Controllers\UploadedFileController::class, 'regupdateFileName7'])->name('regupdateFileName7');
Route::post('/regupdateFileName6pfdoc', [App\Http\Controllers\UploadedFileController::class, 'regupdateFileName6pfdoc'])->name('regupdateFileName6pfdoc');
Route::post('/regupdateFileName6esi', [App\Http\Controllers\UploadedFileController::class, 'regupdateFileName6esi'])->name('regupdateFileName6esi');
Route::post('/regupdateFileName6pt', [App\Http\Controllers\UploadedFileController::class, 'regupdateFileName6pt'])->name('regupdateFileName6pt');
Route::post('/regupdateFileName6tl', [App\Http\Controllers\UploadedFileController::class, 'regupdateFileName6tl'])->name('regupdateFileName6tl');

Route::post('/regupdateFileName6ur', [App\Http\Controllers\UploadedFileController::class, 'regupdateFileName6ur'])->name('regupdateFileName6ur');






Route::get('/download-mis-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'misdownloadaoaFile'])->name('download-mis-file');

Route::get('/download-mis1-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'misdownloadaoaFile1'])->name('download-mis1-file');
Route::get('/download-mis2-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'misdownloadaoaFile2'])->name('download-mis2-file');
Route::get('/download-mis3-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'misdownloadaoaFile3'])->name('download-mis3-file');
Route::get('/download-mis4-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'misdownloadaoaFile4'])->name('download-mis4-file');
Route::get('/download-mis5-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'misdownloadaoaFile5'])->name('download-mis5-file');
Route::get('/download-mis6-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'misdownloadaoaFile6'])->name('download-mis6-file');
Route::get('/download-mis7-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'misdownloadaoaFile7'])->name('download-mis7-file');



Route::get('/download-reg-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'regdownloadaoaFile'])->name('download-reg-file');

Route::get('/download-reg1-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'regdownloadaoaFile1'])->name('download-reg1-file');
Route::get('/download-reg2-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'regdownloadaoaFile2'])->name('download-reg2-file');
Route::get('/download-reg3-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'regdownloadaoaFile3'])->name('download-reg3-file');
Route::get('/download-reg4-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'regdownloadaoaFile4'])->name('download-reg4-file');
Route::get('/download-reg5-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'regdownloadaoaFile5'])->name('download-reg5-file');
Route::get('/download-reg6-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'regdownloadaoaFile6'])->name('download-reg6-file');
Route::get('/download-reg7-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'regdownloadaoaFile7'])->name('download-reg7-file');
Route::get('/download-reg6pfdoc-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'regdownloadreg6pfdoc'])->name('download-reg6pfdoc-file');
Route::get('/download-reg6esi-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'regdownloadaoaFile6esi'])->name('download-reg6esi-file');
Route::get('/download-reg6pt-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'regdownloadaoaFile6pt'])->name('download-reg6pt-file');
Route::get('/download-reg6tl-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'regdownloadaoaFile6tl'])->name('download-reg6tl-file');
Route::get('/download-reg6ur-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'regdownloadaoaFile6ur'])->name('download-reg6ur-file');





Route::post('/reguploadss', [App\Http\Controllers\UploadedFileController::class, 'reguploadss'])->name('reguploadss');

Route::post('/regchartereddoc', [App\Http\Controllers\UploadedFileController::class, 'regchartereddoc'])->name('regchartereddoc');

Route::post('/regcoidoc', [App\Http\Controllers\UploadedFileController::class, 'regcoidoc'])->name('regcoidoc');
Route::post('/regpandoc', [App\Http\Controllers\UploadedFileController::class, 'regpandoc'])->name('regpandoc');

Route::post('/regtandoc', [App\Http\Controllers\UploadedFileController::class, 'regtandoc'])->name('regtandoc');
Route::post('/regincdoc', [App\Http\Controllers\UploadedFileController::class, 'regincdoc'])->name('regincdoc');

Route::post('/regspicedoc', [App\Http\Controllers\UploadedFileController::class, 'regspicedoc'])->name('regspicedoc');
Route::post('/regesidoc', [App\Http\Controllers\UploadedFileController::class, 'regesidoc'])->name('regesidoc');
Route::post('/regpfdoc', [App\Http\Controllers\UploadedFileController::class, 'regpfdoc'])->name('regpfdoc');
Route::post('/regcustomdoc', [App\Http\Controllers\UploadedFileController::class, 'regcustomdoc'])->name('regcustomdoc');
Route::post('/regptdoc', [App\Http\Controllers\UploadedFileController::class, 'regptdoc'])->name('regptdoc');
Route::post('/regtldoc', [App\Http\Controllers\UploadedFileController::class, 'regtldoc'])->name('regtldoc');
Route::post('/regurdoc', [App\Http\Controllers\UploadedFileController::class, 'regurdoc'])->name('regurdoc');




Route::post('/misuploadss', [App\Http\Controllers\UploadedFileController::class, 'misuploadss'])->name('misuploadss');

Route::post('/mischartereddoc', [App\Http\Controllers\UploadedFileController::class, 'mischartereddoc'])->name('mischartereddoc');

Route::post('/miscoidoc', [App\Http\Controllers\UploadedFileController::class, 'miscoidoc'])->name('miscoidoc');
Route::post('/mispandoc', [App\Http\Controllers\UploadedFileController::class, 'mispandoc'])->name('mispandoc');

Route::post('/mistandoc', [App\Http\Controllers\UploadedFileController::class, 'mistandoc'])->name('mistandoc');
Route::post('/misincdoc', [App\Http\Controllers\UploadedFileController::class, 'misincdoc'])->name('misincdoc');

Route::post('/misspicedoc', [App\Http\Controllers\UploadedFileController::class, 'misspicedoc'])->name('misspicedoc');
Route::post('/userimg', [App\Http\Controllers\HomeController::class, 'userimg'])->name('userimg');
Route::post('/miscustomdoc', [App\Http\Controllers\UploadedFileController::class, 'miscustomdoc'])->name('miscustomdoc');

Route::post('/admin/event/calendar', [App\Http\Controllers\HomeController::class, 'storeevent'])
    ->name('admin_event_calendar');
    Route::get('/calendar/events', [App\Http\Controllers\HomeController::class,'getEvents'])->name('calendar.events');
    Route::post('/companystoreprofile', [App\Http\Controllers\HomeController::class, 'companystoreprofile'])
    ->name('companystoreprofile');
    Route::post('/storeiptdi', [App\Http\Controllers\UploadedFileController::class, 'storeiptdi'])->name('storeiptdi');
    Route::post('/upstoreemployeeprofile', [App\Http\Controllers\UploadedFileController::class, 'upstoreemployeeprofile'])->name('upstoreemployeeprofile');
    Route::get('/download-payroll-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'downloadpayrollFile'])->name('download-payroll-file');
    Route::delete('/delete-filepayroll/{id}', [App\Http\Controllers\UploadedFileController::class,'deletefilepayroll'])->name('filepayroll.delete');
    Route::post('/storeemployeepayroll', [App\Http\Controllers\UploadedFileController::class, 'storeemployeepayroll'])->name('storeemployeepayroll');

    Route::post('/updateemployeedetailpayroll', [App\Http\Controllers\UploadedFileController::class, 'updateemployeedetailpayroll'])->name('updateemployeedetailpayroll');
    Route::get('/user/whiteboard', [App\Http\Controllers\HomeController::class, 'whiteboard'])->name('user/whiteboard');
    
    Route::get('/master_admin/masteradmin', [App\Http\Controllers\HomeController::class, 'masteradmin'])->name('master_admin/masteradmin');
    
        Route::get('/user/publicclink', [App\Http\Controllers\HomeController::class, 'publicclink'])->name('user/publicclink');
    Route::get('/user/advsearch', [App\Http\Controllers\HomeController::class, 'advsearch'])->name('user/advsearch');
    
    
    Route::get('/live-search', [App\Http\Controllers\HomeController::class, 'liveSearch'])->name('live-search');
Route::get('/exact-search', [App\Http\Controllers\HomeController::class, 'exactSearch'])->name('exact-search');

Route::get('/custom-search', [App\Http\Controllers\HomeController::class, 'customSearch'])->name('custom-search');

Route::get('/prefile-search', [App\Http\Controllers\HomeController::class, 'prefileSearch'])->name('prefile-search');

Route::get('/fetchfyear-data', [App\Http\Controllers\HomeController::class, 'fetchfyeardata'])->name('fetchfyear-data');

Route::get('/customfile-count', [App\Http\Controllers\HomeController::class, 'customfileCount'])->name('customfile-count');
   Route::get('/get-users-by-role/{role}', [App\Http\Controllers\HomeController::class, 'getUsersByRole']);


    Route::get('/user/trashbox', [App\Http\Controllers\HomeController::class, 'trashbox'])->name('user/trashbox');
    Route::get('/user/venderlist', [App\Http\Controllers\HomeController::class, 'venderlist'])->name('user/venderlist');
    Route::get('/user/bankingdoc', [App\Http\Controllers\HomeController::class, 'bankingdoc'])->name('user/bankingdoc');
Route::get('/user/bankingcredit', [App\Http\Controllers\HomeController::class, 'bankingcredit'])->name('user/bankingcredit');
Route::get('/user/tickting', [App\Http\Controllers\HomeController::class, 'tickting'])->name('user/tickting');

    Route::post('/storecontract', [App\Http\Controllers\UploadedFileController::class, 'storecontract'])->name('storecontract');
    Route::post('/upstorecontract', [App\Http\Controllers\UploadedFileController::class, 'upstorecontract'])->name('upstorecontract');

    Route::post('/storeaudit', [App\Http\Controllers\UploadedFileController::class, 'storeaudit'])->name('storeaudit');
    Route::post('/upstoreaudit', [App\Http\Controllers\UploadedFileController::class, 'upstoreaudit'])->name('upstoreaudit');
    Route::post('/storebankdoc', [App\Http\Controllers\UploadedFileController::class, 'storebankdoc'])->name('storebankdoc');
    Route::post('/upstorebankdoc', [App\Http\Controllers\UploadedFileController::class, 'upstorebankdoc'])->name('upstorebankdoc');
    Route::get('/contractdetail/{id}',[ App\Http\Controllers\UploadedFileController::class,'fetchContractDetail']);
    Route::post('/storeemployeedetail', [App\Http\Controllers\UploadedFileController::class, 'storeemployeedetail'])->name('storeemployeedetail');
    Route::get('/download-empdt-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'downloadempdtFile'])->name('download-empdt-file');
    Route::delete('/delete-fileempdt/{id}', [App\Http\Controllers\UploadedFileController::class,'deletefileempdt'])->name('fileempdt.delete');
    Route::post('/storeemployeeprofile', [App\Http\Controllers\UploadedFileController::class, 'storeemployeeprofile'])->name('storeemployeeprofile');
    Route::post('/updateemployeedetail', [App\Http\Controllers\UploadedFileController::class, 'updateemployeedetail'])->name('updateemployeedetail');
    Route::post('/updateiptdi', [App\Http\Controllers\UploadedFileController::class, 'updateiptdi'])->name('updateiptdi');
    Route::get('/download-iptdi-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'downloadiptdiFile'])->name('download-iptdi-file');

    Route::post('/fixedsassetstore', [App\Http\Controllers\UploadedFileController::class, 'fixedsassetstore'])->name('fixedsassetstore');
    Route::get('/user/ticktingdetails', [App\Http\Controllers\HomeController::class, 'ticktingdetails'])->name('user/ticktingdetails');
    Route::post('/upfixedsassetstore', [App\Http\Controllers\UploadedFileController::class, 'upfixedsassetstore'])->name('upfixedsassetstore');
    Route::get('/download-bankdoc-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'downloadbankdocFile'])->name('download-bankdoc-file');
    Route::delete('/delete-filebankdoc/{id}', [App\Http\Controllers\UploadedFileController::class,'deletefilebankdoc'])->name('filebankdoc.delete');
    Route::delete('/delete-filefixed/{id}', [App\Http\Controllers\UploadedFileController::class,'deletefilefixed'])->name('filefixed.delete');
    Route::get('/download-fixed-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'downloadfixedFile'])->name('download-fixed-file');
    Route::get('/download-fixed1-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'downloadfixedFile1'])->name('download-fixed1-file');
    
    Route::post('/updatedirectordt', [App\Http\Controllers\HomeController::class, 'updatedirectordt'])->name('updatedirectordt');
    Route::get('/download-custom-file/{id}',[App\Http\Controllers\HomeController::class, 'downloadcustomFile1'])->name('download-custom-file');
    Route::delete('/delete-customfilecd/{id}', [App\Http\Controllers\HomeController::class,'customfilecd'])->name('customfilecd.delete');
    Route::get('/download-aadhar-file/{id}',[App\Http\Controllers\HomeController::class, 'downloadaadharFile1'])->name('download-aadhar-file');
    Route::get('/download-pan-file/{id}',[App\Http\Controllers\HomeController::class, 'downloadpanFile1'])->name('download-pan-file');
    Route::get('/download-voter-file/{id}',[App\Http\Controllers\HomeController::class, 'downloadvoterFile1'])->name('download-voter-file');
    Route::get('/download-passport-file/{id}',[App\Http\Controllers\HomeController::class, 'downloadpassportFile1'])->name('download-passport-file');
    Route::delete('/delete-voter/{id}', [App\Http\Controllers\HomeController::class,'voterfile'])->name('voter.delete');
    Route::delete('/delete-passport/{id}', [App\Http\Controllers\HomeController::class,'passportfile'])->name('passport.delete');
    Route::delete('/delete-aadhar/{id}', [App\Http\Controllers\HomeController::class,'aadharfile'])->name('aadhar.delete');
    Route::delete('/delete-pan/{id}', [App\Http\Controllers\HomeController::class,'panfile'])->name('pan.delete');

    Route::get('/download-audit-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'downloadauditFile'])->name('download-audit-file');
    Route::delete('/delete-fileaudit/{id}', [App\Http\Controllers\UploadedFileController::class,'deletefileaudit'])->name('fileaudit.delete');
    Route::get('/download-contract-file/{id}',[App\Http\Controllers\UploadedFileController::class, 'downloadcontractFile'])->name('download-contract-file');
    Route::delete('/delete-filecontract/{id}', [App\Http\Controllers\UploadedFileController::class,'deletefilecontract'])->name('filecontract.delete');
    Route::delete('/delete-fileiptdi/{id}', [App\Http\Controllers\UploadedFileController::class,'deletefileiptdi'])->name('fileiptdi.delete');
    Route::get('/user/Complianceregulator', [App\Http\Controllers\HomeController::class, 'Complianceregulator'])->name('user/Complianceregulator');
    Route::get('/user/fixedManagement', [App\Http\Controllers\HomeController::class, 'fixedManagement'])->name('user/fixedManagement');
    
    
    Route::post('/update-folder-path', [App\Http\Controllers\HomeController::class, 'updateOrCreateFolderPath']);

Route::get('/fetch-folder-path', [App\Http\Controllers\HomeController::class, 'fetchLastFolderPath']);

});
Route::middleware('prevent.direct.access')->get('/{any}', function () {
    return view('errors.404');
})->where('any', '.*');

Route::post('/mark-all-read', [App\Http\Controllers\HomeController::class, 'markAllAsRead'])
    ->name('markAllAsRead');

    Route::post('/markAllAsReademp', [App\Http\Controllers\HomeController::class, 'markAllAsReademp'])
    ->name('markAllAsReademp');



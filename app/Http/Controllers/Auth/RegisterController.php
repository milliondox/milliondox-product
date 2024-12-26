<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;
use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\Helpers\Builder\EmailParams;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'phone' => ['required', 'string', 'min:10', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'max:255'],
        ]);
    }
    public function userregister()
{
    return view('auth.register');
}
public function checkallUserExists(Request $request)
    {
        $email = $request->input('email');

        // Check if the user with this email exists
        $user = User::where('email', $email)->first();

        if ($user) {
            return response()->json(['exists' => true]);
        } else {
            return response()->json(['exists' => false]);
        }
    }


public function storeregister(Request $request)
{
   
    $inputOtp = $request->input('email_otp');
    $sessionOtp = Session::get('otp');
    $otpExpiration = Session::get('otp_expiration');
    $email = Session::get('otp_email');

    // Validate the request data
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'check_reg' => 'accepted',
    ]);

    // Check if the OTP is correct and has not expired
    if ($inputOtp == $sessionOtp && now()->lessThanOrEqualTo($otpExpiration)) {
        // Create the user
        $user = new User();
        $user->name = $validatedData['first_name'] . ' ' . $validatedData['last_name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role = 'Admin';
        $user->Edit_Password = 1;
        $user->View_Exception_Reports = 1;
        $user->Document_Repository_Access = 1;
        $user->Promoters_Vault_Access = 1;
        $user->Coming_Soon_Access = 1;
        $user->Role_Access = 1;
        $user->Trash_Panel_Access = 1;
        

        // Save the user to the database
        $user->save();

        // Store additional user information in the user_info table
        UserInfo::create([
            'user_id' => $user->id,
            'email' => $user->email,
            'password' => $validatedData['password'],
            'name' => $validatedData['first_name'] . ' ' . $validatedData['last_name'],
            'role' => 'Admin',
            'Edit_Password' => 1,
            'View_Exception_Reports'  => 1,
            'Document_Repository_Access' => 1,
            'Promoters_Vault_Access'  => 1,
            'Coming_Soon_Access' => 1,
            'Role_Access' => 1,
            'Trash_Panel_Access' => 1,
        ]);

        // Log in the newly registered user
        Auth::login($user);

        // Clear OTP session after successful registration
        Session::forget(['otp', 'otp_expiration', 'otp_email']);

        // Return a success response
        return response()->json([
            'success' => true,
            'message' => 'User registered and logged in successfully!',
            'redirect' => route('user.dashboard.index'),
        ]);
    } else {
        // OTP is invalid or expired
        return response()->json([
            'success' => false,
            'message' => 'Invalid or expired OTP.',
        ]);
    }
}
public function storeinvite(Request $request)
{
    //  dd($request);
     $inputOtp = $request->input('otp');
    $sessionOtp = Session::get('otp');
    $otpExpiration = Session::get('otp_expiration');
    $email = Session::get('otp_email');

    // Validate the request data
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'check_reg' => 'accepted',
    ]);

    // Check if the OTP is correct and has not expired
    if ($inputOtp == $sessionOtp && now()->lessThanOrEqualTo($otpExpiration)) {
        // Create the user
        $user = new User();
        $user->name = $validatedData['first_name'] . ' ' . $validatedData['last_name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role = 'Admin';
        $user->Edit_Password = 1;
        $user->View_Exception_Reports = 1;
        $user->Document_Repository_Access = 1;
        $user->Promoters_Vault_Access = 1;
        $user->Coming_Soon_Access = 1;
        $user->Role_Access = 1;
        $user->Trash_Panel_Access = 1;
        

        // Save the user to the database
        $user->save();

        // Store additional user information in the user_info table
        UserInfo::create([
            'user_id' => $user->id,
            'email' => $user->email,
            'password' => $validatedData['password'],
            'name' => $validatedData['first_name'] . ' ' . $validatedData['last_name'],
            'role' => 'Admin',
            'Edit_Password' => 1,
            'View_Exception_Reports'  => 1,
            'Document_Repository_Access' => 1,
            'Promoters_Vault_Access'  => 1,
            'Coming_Soon_Access' => 1,
            'Role_Access' => 1,
            'Trash_Panel_Access' => 1,
        ]);

        // Log in the newly registered user
        Auth::login($user);

        // Clear OTP session after successful registration
        Session::forget(['otp', 'otp_expiration', 'otp_email']);

        // Return a success response
        return response()->json([
            'success' => true,
            'message' => 'User registered and logged in successfully!',
            'redirect' => route('user.dashboard.index'),
        ]);
    } else {
        // OTP is invalid or expired
        return response()->json([
            'success' => false,
            'message' => 'Invalid or expired OTP.',
        ]);
    }
}

    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
      // protected function create(array $data)
    // {
    //     return User::create([
    //         'phone' => $data['phone'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //         'role' => $data['role'],
    //     ]);
    // }

    public function checkUserExists(Request $request)
    {
        $email = $request->input('email');
        $phone = $request->input('phone');

        // Check if user exists by email or phone
        $userByEmail = User::where('email', $email)->first();
        $userByPhone = User::where('phone', $phone)->first();

        $exists = ($userByEmail || $userByPhone) ? true : false;

        return response()->json(['exists' => $exists]);
    }
protected function create(array $data)
{
    try {
        // Debugging: Dump the received data
        dd($data);

        // Check if the email OTP is set in the session and matches $request->email_otp
        if (Session::has('email_otp') && Session::get('email_otp') == $data['email_otp']) {
            // Clear the email OTP from the session
            Session::forget('email_otp');

            // Check if a user with the provided email already exists
            $existingUser = User::where('email', $data['email'])->first();

            // If the user does not exist, create a new account and log in the user
            if (!$existingUser) {
                // Create the user account
                $user = User::create([
                    'phone' => $data['phone'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'role' => 'founder',
                    'designation' => $data['designation'],
                    'name_of_the_business' => $data['name_of_the_business'],
                    'industry' => $data['industry'],
                    'employees' => $data['employees'],
                    'name' => $data['first_name'].$data['last_name'],
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
                    'phone' => $data['phone'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'role' => 'founder',
                    'designation' => $data['designation'],
                    'name_of_the_business' => $data['name_of_the_business'],
                    'industry' => $data['industry'],
                    'employees' => $data['employees'],
                    'name' => $data['first_name'].$data['last_name'],
                ]);

                // Log in the newly created user
                Auth::login($user);

                return redirect()->route('userclientsview'); // Redirect to the user dashboard view
            } else {
                // User with the provided email already exists
                return redirect()->back()->with('error', 'User with this email already exists.');
            }
        } else {
            // OTP mismatch
            return redirect()->back()->with('error', 'Invalid OTP.');
        }
    } catch (Exception $e) {
        // Exception occurred
        Log::error('Error creating user: '.$e->getMessage());
        return redirect()->back()->with('error', 'An error occurred while creating the user.');
    }
}



    public function redirectToGoogle()
    {
         dd('2');
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
{
    try {
        $user = Socialite::driver('google')->user();

        // Retrieve user details
        $googleId = $user->getId();
        $name = $user->getName();
        $email = $user->getEmail();
        // Other details like profile picture, etc.

        // Check if the user already exists in your database based on their Google ID or email
        $existingUser = User::where('google_id', $googleId)->orWhere('email', $email)->first();

        if ($existingUser) {
            // If the user exists, sign them in
            auth()->login($existingUser);
        } else {
            // If the user doesn't exist, create a new user
            $newUser = User::create([
                'name' => $name,
                'email' => $email,
                'google_id' => $googleId,
                'role' => "Admin"
                // Other fields you want to save
            ]);

            // Sign in the newly created user
            auth()->login($newUser);
        }

        // Redirect the user to the desired page after authentication
        return redirect()->intended('/dashboard');
    } catch (\Exception $e) {
        // Handle any exceptions that occur during the authentication process
        // You may want to log the error or redirect the user to an error page
        return redirect()->route('login')->with('error', 'Authentication failed. Please try again.');
    }
}  
public function checkEmailExistence(Request $request)
    {
        $email = $request->input('email');
        $exists = User::where('email', $email)->exists();

        return response()->json(['exists' => $exists]);
    }

public function sendOtpd(Request $request)
    {
      $request->validate([
            'email' => 'required|email',
        ]);

        // Generate the OTP
        $otp = rand(100000, 999999);

        // Store OTP and email in the session temporarily
       Session::put('otp', $otp);
    Session::put('otp_expiration', now()->addMinutes(10)); // Store expiration time
    Session::put('otp_email', $request->email);

        // Get the email
        $toEmail = $request->email;
        $fname =   $request->first_name;
        $lname =   $request->last_name;

        $fromEmail = "no-reply@milliondox.in";
    
        $email = $request->email;
        $thankYouSubject = "Your Account Details";
    
       
        
        $thankYouMessage = <<<HTML
    <!DOCTYPE html>
    <html>
                    <head>
        
        <title>One-Time Password Alert</title>
    </head>
    <body style='font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f5f5f5;'>
        <table width='100%' cellpadding='0' cellspacing='0' border='0'>
            <tr>
                <td>
                    <table class='email-container' cellpadding='0' cellspacing='0' border='0' style='width: 100%; max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; border: 1px solid #dddddd;'>
                        <!-- Banner -->
                        <tr>
                            <td class='banner'>
                                <img src='https://milliondox.in/assets/images/one_time_pas.png' alt='One-Time Password' style='max-width: 100%; margin: 0 auto; display: block;'>
                            </td>
                        </tr>
                        <!-- Content -->
                        <tr>
                            <td class='content' style='padding: 20px; color: #333333;'>
                                <p class='user_title' style='font-weight: 800;'>Dear {$fname} {$lname},</p>
                                <p>Your request for a one-time password (OTP) has been processed. Below is your OTP for accessing the requested feature.</p>
                                <p><strong>One-Time Password:</strong> <span style='font-size: 24px; font-weight: bold;'>{$otp}</span></p>
                                <p>Please use this OTP within the next 10 minutes to complete your request. If you did not request this OTP, please disregard this email.</p>
                                <a href='https://milliondox.com/contact.html' class='contact_support' style='display: inline-block; padding: 12px 60px; color: #FFF; border-radius: 50px; margin: 20px 0 0; background: #B498E9; text-decoration: none;'>Contact Support</a>
                                <p>For your security, do not share this OTP with anyone.</p>
                            </td>
                        </tr>
                        <!-- Footer -->
                        <tr>
                            <td class='footer' style='background-color: #B498E9; color: #ffffff; text-align: center; padding: 20px;'>
                                <p class='thanks' style='font-weight: bold;'>Thank you for your attention!</p>
                                <p class='important' style='color: #ffffff; font-weight: 800;'>Important Notice:</p>
                                <p>If you did not request this OTP, please contact us immediately for assistance.</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
    </html>
    HTML;
    
       
    
    // Email headers
    $headers = "From: $fromEmail\r\n";
    $headers .= "Reply-To: $fromEmail\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    // Recipients
    $recipients = [
        new Recipient($toEmail, 'Recipient Name'),
    ];
    
    // Send email to each recipient
    foreach ($recipients as $recipient) {
        if (mail($toEmail, $thankYouSubject, $thankYouMessage, $headers)) {
            $responses[] = [
                'email' => $toEmail,
                'status' => 'success',
                'message' => "Email sent successfully to {$request->first_name}."
            ];
        } else {
            $responses[] = [
                'email' => $toEmail,
                'status' => 'error',
                'message' => "Failed to send email to {$request->first_name}."
            ];
        }
    }
    }
    
    
      
    
   


}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;
use App\Models\UserInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    
   
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Log the user's login activity after successful authentication.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return void
     */
    protected function authenticated($request, $user)
    {
        DB::table('user_logs')->insert([
            'user_id' => $user->id,
            'logged_in_at' => now(),
        ]);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function logout(Request $request)

    {
        
      
         // Clear the session
        
    
        // dd(session()->all());

        $user = Auth::user();
        // dd($user);
         // Find the most recent log entry for the user where logged_out_at is NULL
        $latestLog = DB::table('user_logs')
        ->where('user_id', $user->id)
        ->whereNull('logged_out_at')  // Ensures we're updating the active (not yet logged out) session
        ->orderBy('logged_in_at', 'desc')  // Get the most recent entry
        ->first();

        if ($latestLog) {
            // Update the logout time for the most recent record
            DB::table('user_logs')
                ->where('id', $latestLog->id)  // Target the latest entry using its ID
                ->update([
                    'logged_out_at' => now(),  // Set the logout time
                ]);
        }

        Auth::logout();
       
        Session::flush();
        
        // Clear any cached data related to the user (optional, if needed)
        Cache::flush();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::invalidate();
        Session::regenerateToken();
        return redirect('https://milliondox.com');
    }

   public function redirectToGoogle()
{
    dd('1');
    return Socialite::driver('google')->redirect();
}


    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
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
}

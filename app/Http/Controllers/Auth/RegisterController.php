<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\General;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $userEmailMessage = "Dear " . $data['name'] . ",\n\nThank you for signing up on our platform. We're excited to have you on board!\n\nRegards,\nBayside Airporter";
        
        $adminEmailMessage = "Hello Admin,\n\nA new user has registered on the platform.\nName: " . $data['name'] . "\nEmail: " . $data['email'] . "\n\nRegards,\nBayside Airporter";

        // Send email to the user
        Mail::raw($userEmailMessage, function ($message) use ($data) {
            $message->to($data['email'])->subject('Welcome to Our Application');
        });

        // Send email to the admin
        Mail::raw($adminEmailMessage, function ($message) {
            $message->to('amir.zarif@baysideairporter.com')->subject('New User Registration');
        });

        return $user;
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
        $validations = [
            'name' => ['required', 'string','min:3', 'max:255'],
            'last_name' => ['required', 'string','min:3', 'max:255'],
            'birthday' => ['required', 'string'],
            'country' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'sale' => ['required', 'string', 'min:2']
          ];
        $messages = [
          'required' => ':attribute es obligatorio.',
          'min' => ':attribute de tener al menos :min caracteres.',
          'max' => ':attribute no debe superar los :max caracteres',
          'confirmed' => 'Las claves no coinciden.'
        ];

        return Validator::make($data, $validations, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'birthday' => $data['birthday'],
            'country' => $data['country'],
            'sale' => $data['sale'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}

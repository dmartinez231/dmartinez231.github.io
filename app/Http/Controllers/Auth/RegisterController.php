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
      if(!isset($data['sale'])){
        $data['sale'] = null;
      };
        $validations = [
            'name' => ['required','formato_nombre','regex_personalizado','min:3', 'max:255'],
            'last_name' => ['required','formato_apellido','regex_personalizado','min:3', 'max:255'],
            'birthday' => ['required', 'string','edad_formato','edad'],
            'country' => ['required', 'string', 'max:255','pais'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string','pass_personalizada','pass_mezcla','min:8', 'confirmed'],
            'sale' => ['required', 'string', 'min:2']
          ];
        $messages = [
          'required' => 'El campo es obligatorio.',
          'regex' =>'El campo tiene caracteres invalidos',
          'min' => 'El campo debe tener al menos :min caracteres.',
          'max' => 'El campo no debe superar los :max caracteres',
          'confirmed' => 'Las claves no coinciden.',
          'edad' => 'Usted es menor de edad.',
          'formato_nombre' =>'El campo solo puede tener 2 nombres',
          'formato_apellido' =>'El campo solo puede tener 2 apellidos',
          'regex_personalizado' =>'El campo tiene caracteres invalidos',
          'pass_personalizada' => 'La contraseña debe incluir al menos un numero',
          'pass_mezcla' => 'La contraseña debe incluir al menos una mayuscula, una minuscula y un numero',
          'edad_formato' =>'La edad no tiene un formato correcto aaaa-mm-dd',
          'pais' => 'Debe seleccionar un pais'
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

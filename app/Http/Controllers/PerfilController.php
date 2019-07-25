<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;

class PerfilController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = Auth::user();
      $vac = compact('user', $user);
      return view('perfil',$vac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      $usuario = User::find($id);
      $usuario->name = $request->name;
      $usuario->last_name = $request->last_name;
      $usuario->password = Hash::make($request->password);
      $usuario->sale = $request->sale;

      $rules = [
          'name' => ['required','formato_nombre','regex_personalizado','min:3', 'max:255'],
          'last_name' => ['required','formato_apellido','regex_personalizado','min:3', 'max:255'],
          'password' => ['required', 'string','pass_personalizada','pass_mezcla','min:8', 'confirmed'],
          'sale' => ['required', 'string', 'min:2']
        ];

      $messages = [
        'required' => 'El campo es obligatorio.',
        'regex' =>'El campo tiene caracteres invalidos',
        'min' => 'El campo debe tener al menos :min caracteres.',
        'max' => 'El campo no debe superar los :max caracteres',
        'confirmed' => 'Las claves no coinciden.',
        'formato_nombre' =>'El campo solo puede tener 2 nombres',
        'formato_apellido' =>'El campo solo puede tener 2 apellidos',
        'regex_personalizado' =>'El campo tiene caracteres invalidos',
        'pass_personalizada' => 'La contraseña debe incluir al menos un numero',
        'pass_mezcla' => 'La contraseña debe incluir al menos una mayuscula, una minuscula y un numero',
        ];

      $this->validate($request, $rules, $messages);

      $usuario->save();

      return redirect('perfil')->with('msj','Modifico sus datos correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

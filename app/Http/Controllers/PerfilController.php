<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('perfil');
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
    public function update(Request $request, $id)
    {
      $usuario = User::find(Auth::User()->id);
      $rules = [
        'name' => ['required','regex:/^[A-Za-zA-Za-zÁÉÍÓÚÜüñáéíóúÑ]*\s()[A-Za-zA-Za-zÁÉÍÓÚÜüñáéíóúÑ]*$/g','min:3', 'max:255'],
        'last_name' => ['required', 'string','min:3', 'max:255'],
        'birthday' => ['required', 'string'],
        'country' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'sale' => ['required', 'string', 'min:2']
      ];

      $messages = [
        'required' => ':attribute es obligatorio.',
        'regex' =>':atribute tiene caracteres invalidos',
        'min' => ':attribute de tener al menos :min caracteres.',
        'max' => ':attribute no debe superar los :max caracteres',
        'confirmed' => 'Las claves no coinciden.'
      ];

      $this->validate($request, $rules, $messages);

      if($request->name !== null){
          $usuario->name = $request->name;
      }
      if($request->last_name !== null){
          $usuario->lastName = $request->lastName;
      }
      if($request->gender !== null){
          $usuario->gender = $request->gender;
      }
      if($request->email !== null && $request->email !== $usuario->email && $request->email===$request->email2){
          $usuario->email = $request->email;
      }
      if(($request->pass2 === $request->pass3) && $request->pass2!== null){
          $usuario->email = bcrypt($request->email);
      }
      $usuario->save();

      Flash::success('Perfil actualizado con éxito.');
      return redirect('perfil');
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

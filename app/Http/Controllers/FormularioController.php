<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;

class FormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('formulario');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $new_product = new Product();
      $new_product->name = $request->input('name');
      $new_product->description = $request->input('description');
      $new_product->stock = $request->input('stock');
      $new_product->year = $request->input('year');
      $new_product->price= $request->input('price');
      if ($request['photo'] == 0){
        $new_product->photo = 'sin nombre';
      }
      else{
      $route = $request['photo']->store('public/img');
      $fileName = basename($route);
      $new_product->photo = $fileName;
      }

      $rules = [
          'name' => ['required','formato_nombre','regex_personalizado','min:3', 'max:255'],
          'description' => ['required','min:3', 'max:255'],
          'stock' => ['required','min:1'],
          'year' => ['required', 'number','min:4'],
          'price' => ['required','number'],
          'photo' => ['required','ext']
        ];

      $messages = [
        'required' => 'El campo es obligatorio.',
        'regex' =>'El campo tiene caracteres invalidos',
        'min' => 'El campo debe tener al menos :min caracteres.',
        'max' => 'El campo no debe superar los :max caracteres',
        'formato_nombre' =>'El campo solo puede tener 2 nombres',
        'regex_personalizado' =>'El campo tiene caracteres invalidos',
        'ext' => 'Los formatos aceptados son PNG, JPEG, JPG'
        ];

      $this->validate($request, $rules, $messages);
      $new_product->save();

      return redirect(route('formulario'))->with('status','El Producto fue creado con exito');
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
        //
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

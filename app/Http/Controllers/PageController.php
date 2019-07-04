<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
      $articulosHome=[
      	0 => ["id" => "option1",
      				"img" => "img/winetinto.jpg",
      				"alt" => "wine tinto",
      				"titulo" => "Grape",
      				"descripcion" => "Una vez en la bodega, existen dos métodos de elaboración: el de maceración carbónica, con uva entera y confinada (tradicional de los corcheros, para su comercio temprano) y otro en el que se elimina el raspón del racimo y se rompe la uva antes de la fermentación por levaduras (utilizado por las empresas bodegueras, para destinarlos a crianza).
      				La uva no se lava para que las levaduras que se encuentran sobre el fruto ayuden en la fermentación. Sin embargo, es muy importante el cuidado de la higiene previo a su posterior proceso."],
      	1 => ["id" => "option2",
      				"img" => "img/winewhite.jpg",
      				"alt" => "wine grape",
      				"titulo" => "White Grape",
      				"descripcion" => "Las uvas blancas que producen principalmente vinos blancos son de color verde o amarillo, una variedad muy extendida en el mundo, por lo cual este vino es producido en muchas zonas del planeta. ... También hay variedades de uva negra, como la pinot noir, utilizadas para producir vino blanco o champán."],
      	2 => ["id" => "option3",
      				"img" => "img/winepink.jpg",
      				"alt" => "wine pink",
      				"titulo" => "Pink Grape",
      				"descripcion" => "El vino rosado. Casi siempre cuando hablamos de vino solemos pensar en vinos tintos o en vinos blancos, pero poco se tiene en cuenta el vino rosado, con su color particular, su carácter y elegancia que hace despertar el gusto en todos los sentidos. Elegante y versátil, así es el vino rosado con una historia dudosa."]
      ];
      return view('index')->with('articulosHome',$articulosHome);
    }
    public function productos()
    {
      return view('productos');
    }
    public function compras()
    {
      return view('compras');
    }

    public function index()
    {
      return view('formulario');
    }
}

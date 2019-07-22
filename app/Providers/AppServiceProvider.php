<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Schema::defaultStringLength(191);
      Validator::extend('edad_formato',function($attribute,$value,$parameters){
        if(preg_match('/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/',$value) == 0){
          return false;
        }
        list($año,$mes,$dia) = explode('-',$value);
        //PREGUNTA SI ESTA VACIO Y SI ES NUMERICO
        if (empty($año) || empty($mes) || empty($dia) && !is_numeric($año) || !is_numeric($mes) || !is_numeric($dia)) {
          return false;
        }
        return true;
      });
      Validator::extend('edad',function($attribute,$value,$parameters){
        if(preg_match('/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/',$value) == 0){
          return false;
        }
        $añoActual = date("Y");
        $mesActual = date("m");
        $diaActual = date("d");
        //SEPARO FECHA DE NACIMIENTO EN AÑO, MES Y DIA PARA DESPUES COMPARAR CON LA FECHA ACTUAL
        list($año,$mes,$dia) = explode('-',$value);
        if (($añoActual - $año) < 18){
          return false;
        }
        if (($añoActual - $año) == 18) {
          if ($mesActual < $mes) {
          return  false;
          }
          if ($mesActual == $mes){
            if($diaActual <= $dia){
              return  false;
            }
          }
        }
        return true;
      });
      Validator::extend('formato_nombre',function($attribute,$value,$parameters){
        $palabras = str_word_count($value);
        if ($palabras <= 2) {
          return true;
        }
        return false;
      });
      Validator::extend('formato_apellido',function($attribute,$value,$parameters){
        $palabras = str_word_count($value);
        if ($palabras <= 2) {
          return true;
        }
        return false;
      });

      Validator::extend('regex_personalizado',function($attribute,$value,$parameters){
        $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ áéíóúÁÉÍÓÚñÑ'";
         for ($i=0; $i<strlen($value); $i++){
            if (strpos($permitidos, substr($value,$i,1)) === false){
               return false;
            }
         }
         return true;
      });
      Validator::extend('pass_personalizada',function($attribute,$value,$parameters){
        $contadorNum= 0;
        $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZáéíóúÁÉÍÓÚñÑ'_,.0123456789";
         for ($i=0; $i<strlen($value); $i++){
            if (strpos($permitidos, substr($value,$i,1)) === false){
              return false;
            }
            if (is_numeric(substr($value,$i,1))) {
              $contadorNum= $contadorNum + 1;
            }
         }
         if ($contadorNum == 0) {
           return false;
         }
         return true;
      });
      Validator::extend('pass_mezcla',function($attribute,$value,$parameters){
        if (is_numeric($value)){
          return false;
        }
        if ($value === strtoupper($value)) {
          return false;
        }
        if ($value === strtolower($value)) {
          return false;
        }
        return true;
      });
      Validator::extend('pais',function($attribute,$value,$parameters){
        if ($value == "nada"){
          return false;
        }
        return true;
      });
    }
}

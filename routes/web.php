<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Ruta de prueba
Route::get('hola' , function(){
    echo "hola"; 
});

//Ruta de arreglo
Route::get('arreglo' , function(){
    
    //defino un arreglo 
    $estudiantes = [ "AN" => "Ana" , 
                    "M" => "Maria" , 
                    "VA" => "Valeria", 
                    "CA" => "Carlos" ];

    //ciclos foreach: recorrer arreglo
    foreach($estudiantes as $indice => $e){
        echo "$e tiene el indice: $indice <br>" ;
    };                

});

//Ruta de paises
Route::get('paises' , function(){

    $paises = [
        "Colombia" => [
            "Capital" => "Bogota",
            "Moneda" => "Peso",
            "Poblacion" => 50372424.0,
            "Ciudades" => ["Medellin" , "Cali" , "Barranquilla"]
        ],
        "Peru" => [
            "Capital" => "Lima",
            "Moneda" => "Sol",
            "Poblacion" => 33050325.0,
            "Ciudades" => ["Cuzco" , "Trujillo" , "Arequipa"]
        ],
        "Ecuador" => [
            "Capital" => "Quito",
            "Moneda" => "Dolar",
            "Poblacion" => 17517141.0,
            "Ciudades" => ["Guayaquil" , "Manta" , "Cuenca"]
        ],
        "Brazil" => [
            "Capital" => "Brasilia",
            "Moneda" => "Real",
            "Poblacion" => 212216052.0,
            "Ciudades" => ["Rio de Janeiro" , "Recife" , "Bahia"]
        ],
        "Italia" => [
            "Capital" => "Roma",
            "Moneda" => "Euro",
            "Poblacion" => 60541000.0,
            "Ciudades" => ["Millan" , "Venecia" , "Palermo"]
        ]   
    ];

    //Enviar los datos de paises a una vista
    //con la funcion view 
    return view('paises') -> with("paises" , $paises);

});


//Rutas de controlador
Route::get('artistas' , "ArtistaController@index");
Route::get('artistas/create' , 'ArtistaController@create');
Route::post('artistas/store' , 'ArtistaController@store');

Route::resource('empleados', 'EmpleadoController');
Route::get('master', function(){
    return view('layouts.master');
});

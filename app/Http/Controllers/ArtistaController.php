<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artista;
use Illuminate\Support\Facades\Validator;

class ArtistaController extends Controller
{
    //Los controladores estan compuestos
    // por ACCIONES: metodos de la controller
    //debe haber una ruta por cada accion:

    public function index(){

        //Capturar datos con los modelos
        $artistas = Artista::all(); 

        //retornar vista que me muestre los artistas
        return view('artistas.index')
                    ->with('artistas' , $artistas);
    }

    public function create(){
        //mostrar el formulario para registrar artista
        return view('artistas.new');
    }

    public function store(Request $r){
        //Validacion paso 1: establecer las reglas de validacion
        $reglas=[
            "nombre_artista" => [ 'required' , 'alpha' , 'min:3' , 'max:20' , 'unique:artists,Name']
        ];

        //Validacion paso1B: Poner mensajes personalizados
        $mensajes =[
            'required' => "El nombre artista es obligatorio",
            'alpha' => "Solo letras",
            'min' => "El :attribute debe tener :value caracteres como minimo"
        ];

        //Validacion paso 2: Crear el objeto de validacion
        $validador = Validator::make($r->all(), $reglas, $mensajes);

        //Validar paso 3: Validar - Comparar input-data VS reglas
        if($validador->fails()){
            //Validacion Fallida
            //redirigir a la ruta anterior: Pero con mensajes de eroor
            return redirect('artistas/create')->withErrors($validador);
            
        }

        //crear el objeto artista
        $nuevo_artista = new Artista();
        //asignamos atributos: 
        $nuevo_artista->Name = $r->input('nombre_artista');
        //grabar
        $nuevo_artista->save();
        
        //redireccionar a la vista de nuevo:
        //redirigimos a ruta que exista en el web.php(de get)
        //with del redirect me crea una variable de session flash, para portar datos al destino
        return redirect('artistas/create')->with('exito', "Artista registrado exitosamente");

    }


}

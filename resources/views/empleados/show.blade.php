<!-- Heredar la masterpage en esta vista -->
@extends('layouts.master')

<!-- Contenido vistas-->
@section('contenido_vistas')
    <br>
    <h2>Informacion del empleado</h2>
    
        <div class="card" style="width:400px">
            <div class="card-header">
                {{ $empleado->FirstName }} {{ $empleado->LastName }}
            </div>
            <div class="card-body">
                <h1 class="card-title">Cargo: {{ $empleado->Title }}</h1>
                <ul class="list-group list-group-flush">
                    @if($empleado->jefe_directo)
                        <li class="list-group-item"> Jefe Directo:
                            {{ $empleado->jefe_directo->FirstName }}
                            {{ $empleado->jefe_directo->LastName }}
                        </li>
                    @endif
                    <li class="list-group-item">
                        Dirección: {{ $empleado->Address }} , {{ $empleado->City }} , {{ $empleado->Country }}
                    </li>
                    <li class="list-group-item">
                        Fecha Nacimiento: {{ $empleado->BirthDate->toFormattedDateString() }}
                    </li>
                    <li class="list-group-item">
                        Fecha Contratacion: {{ $empleado->HireDate->toFormattedDateString() }}
                    </li>
                </ul>
            </div>       
        </div>

        <br>
        <div id="sub" class="card" style="width:400px">
            <div class="card-header">    
            </div>
            <div class="card-body">
                    
                    @if($empleado->subalternos->count() !==0)
                    <h2 class="text-success">Subalternos:</h2>
                    <ul class="list-group list-group-flush">
                        @foreach($empleado->subalternos as $subalterno)
                            <li class="list-group-item"> 
                                {{ $subalterno->FirstName }} , {{ $subalterno->LastName }} 
                            </li> 
                        @endforeach
                    </ul>
                @else
                    <h2 class="text-danger">El empleado no tiene subalternos</h2>
                @endif 
            </div>    
        </div>

            <br><br>
            <div id="cli" class="card">
                <div class="card-body">
                    @if($empleado->clientes->count() !==0)

                        <h2 class="text-success">Clientes:</h2>
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nombre y apellido</th>
                                    <th>Compania</th>
                                    <th>Direccion</th>
                                    <th>Ciudad</th>
                                    
                                </tr>
                            </thead>
                        </table>
                        <ul class="list-group list-group-flush">
                            @foreach($empleado->clientes as $cliente)
                                <li class="list-group-item"> 
                                    {{ $cliente->FirstName }} , {{ $cliente->LastName }} 
                                </li> 
                            @endforeach
                        </ul>
                    @else
                        <h2 class="text-danger">El empleado no tiene clientes</h2>
                    @endif    
                </div>     
            </div>

    
@endsection
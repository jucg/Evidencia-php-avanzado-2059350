<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Lista de empleados </h1>
        <a class="btn btn-dark" href="{{ url('empleados/create') }}"> 
            Nuevo Empleado
        </a>
        <br><br>
    
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre y apellido</th>
                    <th>Cargo</th>
                    <th>Email</th>
                    <th>Detalles</th>
                    <th>Actualizar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->FirstName }} 
                            <strong class="text-danger"> {{ $empleado->LastName }}</strong> 
                        </td>
                        <td>{{ $empleado->Title }}</td>
                        <td>{{ $empleado->Email }}</td>
                        <td>
                            <a href="{{ url('empleados/'.$empleado->EmployeeId) }}" class="btn btn-success">Ver Detalles</a>
                        </td>
                        <td>
                            <a href="{{ url('empleados/'.$empleado->EmployeeId.'/edit') }}" 
                                class="btn btn-info">Actualizar
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- TODO: Poner el paginador -->
        {{ $empleados->links() }}
    </div>    
</body>
</html>
<!-- Heredar la masterpage en esta vista-->
@extends('layouts.master')

@section('estilos-particulares')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('j-deps')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
  } );
  </script>
@endsection

<!-- Inicio de la vista-->
@section('contenido_vistas')
<form class="form-horizontal" method="post" action="{{ url('empleados') }}">
@csrf

@if(session("mensaje"))
  <p class="alert-success"> {{ session("mensaje") }} </p>
@endif

<fieldset>

<!-- Form Name -->
<legend>Nuevo Empleado</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Nombre</label>  
  <div class="col-md-5">
  <input id="textinput" name="nombre" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="apellido">Apellido</label>  
  <div class="col-md-5">
  <input id="textinput" name="apellido" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="jefe">Jefe Directo</label>
  <div class="col-md-5">
    <select id="selectbasic" name="jefe" class="form-control">
        <!-- Recorrer los jefes -->
        @foreach($jefes as $j)
            <option value="{{ $j->EmployeeId }}"> {{ $j->LastName }} , {{ $j->FirstName }} </option>
        @endforeach
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="cargo">Cargo</label>
  <div class="col-md-5">
    <select id="selectbasic" name="cargo" class="form-control">
        <!-- Recorrer los cargos -->
        @foreach($cargos as $c)
            <option> {{ $c->Title }} </option>
        @endforeach
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="contrato">Fecha de Contratacion</label>  
  <div class="col-md-5">
  <input id="datepicker" name="contrato" type="text" placeholder="" class="datepicker form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nacimiento">Fecha de Nacimiento</label>  
  <div class="col-md-5">
  <input id="" name="nacimiento" type="text" placeholder="" class="datepicker form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>  
  <div class="col-md-5">
  <input id="textinput" name="email" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="direccion">Direccion</label>  
  <div class="col-md-5">
  <input id="textinput" name="direccion" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ciudad">Ciudad</label>  
  <div class="col-md-5">
  <input id="textinput" name="ciudad" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Enviar</button>
  </div>
</div>

</fieldset>
</form>


<!-- Fin de la vista-->
@endsection
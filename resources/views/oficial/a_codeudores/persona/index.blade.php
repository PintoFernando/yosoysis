@extends ('layouts.admin3')
@section ('contenido')
<div class="box-header">
 <h4>Personas
  <a href="{{url('/oficial/persona/create')}}" class="btn btn-success pull-right" style="margin-top: -8px;">Añadir Persona</a>
</h4>
</div>

@if(session('notification'))
<div class="alert alert-success">
   {{session('notification')}}
</div>
@endif
<!-- /.box-header -->
<div class="box-body">
  <table id="o_persona" class="table table-bordered table-striped">
    <thead>
      <tr>
       <th>Id</th>
       <th>Ci</th>
       <th>Extensión de CI</th>
       <th>Nombre</th>
       <th>Ap. paterno</th>
       <th>Ap. Materno</th>               
       <th>Ap. Casada</th>               
       <th>Fech. Nac.</th>               
       <th>Lugar Nac</th>               
       <th>Genero</th>               
       <th>Celular</th>               
       <th>Dependientes</th>               
       <th>Estado Civil</th>               
       <th>Núm Socio</th>               
       <th>Profesión</th>               
       <th>Nacionalidad</th>               
       <th>Acciones</th>               
     </tr>
   </thead>
   <tbody>
    @foreach ($personas as $pe)
    <tr>
      <td>{{$pe->id_persona}}</td>
      <td>{{$pe->ci}}</td>
      <td>{{$pe->extension}}</td>
      <td>{{$pe->nombre}}</td>
      <td>{{$pe->ap_paterno}}</td>
      <td>{{$pe->ap_materno}}</td>
      <td>{{$pe->ap_casada}}</td>
      <td>{{$pe->fec_nac}}</td>
      <td>{{$pe->lugar_nac}}</td>
      <td>{{$pe->genero}}</td>
      <td>{{$pe->celular}}</td>
      <td>{{$pe->dependientes}}</td>
      <td>{{$pe->estado_civil}}</td>
      <td>{{$pe->num_socio}}</td>
      <td>{{$pe->profesion}}</td>
      <td>{{$pe->nacionalidad}}</td>

      <td> <a href="{{url('/oficial/persona/'.$pe->id_persona.'/edit')}}" rel="tooltip" title="Editar Persona" class="btn btn-success btn-simple btn-xs">
        <i class="fa fa-pencil"></i> 
      </a>


    </td>
  </tr>
  @endforeach
</tbody>                
</table>
</div>
<!-- /.box-body -->

@include('sweetalert::alert')
@push ('scripts')
<script>
$('#liC1').addClass("treeview active");
$('#liPersona').addClass("active");
</script>
@endpush
@endsection
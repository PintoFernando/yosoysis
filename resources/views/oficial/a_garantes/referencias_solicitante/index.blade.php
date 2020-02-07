@extends ('layouts.admin3')
@section ('contenido')
<div class="row">

  <div class="col-md-3 col-sm-6 col-xs-12" style="float:right;">
    <div class="info-box bg-yellow">
      <span class="info-box-icon"><i class="fa fa-user text-black"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Garante seleccionado</span>
        <span class="info-box-number"> </span>
        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
          {{Session::get('id_persona_oficial_garante','Usuario no seleccionado')}}
        </span>
      </div>
    </div>
  </div>


  <div class="col-md-3 col-sm-6 col-xs-12" style="float:right;">
    <div class="info-box bg-green">
      <span class="info-box-icon"><i class="fa fa-user"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">S. Seleccionado</span>
        <span class="info-box-number"> </span>

        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
          {{Session::get('id_persona_oficial','Usuario no seleccionado')}}
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
</div>

<div class="row">
  <div class="box-header">
   <h3>Registrar referencia del Garante
    <a href="{{url('/oficial/a_garantes/referencias_solicitante/create')}}" 
    class="btn btn-success pull-right" 
    style="margin-top: -8px;">Nueva referencia </a>
  </h3>
</div>

@if(session('notification'))
<div class="alert alert-success">
   {{session('notification')}}
</div>
@endif
<!-- /.box-header -->
<div class="box-body">
  <table id="o_credito" class="table table-bordered table-striped">
    <thead>
      <tr>
       <th>Id</th>
       <th>Apellido Paterno</th>
       <th>Apellido Materno</th>
       <th>Nombre</th>              
       <th>Parentesco</th>               
       <th>celular</th>                              
       <th>Telefono</th>                           
       <th>Acción</th>                              
     </tr>
   </thead>
   <tbody>
    @foreach ($referencias as $re)
    <tr>
      <td>{{$re->id_referencia_solicitante}}</td>
      <td>{{$re->ap_paterno}}</td>
      <td>{{$re->ap_materno}}</td>
      <td>{{$re->nombre}}</td>
      <td>{{$re->parentesco}}</td>
      <td>{{$re->celular}}</td>
      <td>{{$re->telefono}}</td>   
      
      <td> <a href="{{url('/oficial/a_garantes/referencias_solicitante/'.$re->id_referencia_solicitante.'/edit')}}" rel="tooltip" title="Editar" class="btn btn-success btn-simple btn-xs">
        <i class="fa fa-pencil"></i> 
      </a>  


      </a>    
    </td>
  </tr>
  @include('oficial.referencias_solicitante.modal')
  @endforeach
</tbody>                
</table>
<!--  Suma del total-->
</div>
</div>
<!-- /.box-body -->
@include('sweetalert::alert')
@push ('scripts')
<script>
  $('#liGarante').addClass("treeview active");
  $('#liGarante_sub_referencias').addClass("active");
</script>
@endpush
@endsection
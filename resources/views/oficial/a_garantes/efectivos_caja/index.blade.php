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


<div class="box-header">
 <h3>Efectivos en Caja Garante
  <a href="{{url('/oficial/a_garantes/efectivos_caja/create')}}" 
  class="btn btn-success pull-right" 
  style="margin-top: -8px;">Añadir Efectivo en Caja</a>
</h3>
</div>

@if(session('notification'))
<div class="alert alert-success">
 {{session('notification')}}
</div>
@endif

<!-- /.box-header -->
<div class="box-body">
  <table id="o_efectivo_caja" class="table table-bordered table-striped">
    <thead>
      <tr>
       <th>Id</th>
       <th>Efectivos en Caja</th>
       <th>Acciones</th>               
     </tr>
   </thead>
   <tbody>
    @foreach ($efectivo as $efe)
    <tr>
      <td>{{$efe->id_efectivos_caja}}</td>
      <td>{{$efe->caja}}</td>

      <td> <a href="{{url('/oficial/a_garantes/efectivos_caja/'.$efe->id_efectivos_caja.'/edit')}}" rel="tooltip" title="Editar Efectivos Caja" class="btn btn-success btn-simple btn-xs">
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
  $('#liGarante').addClass("treeview active");
  $('#liGarante_sub_efectivo_caja').addClass("active");
</script>
@endpush
@endsection
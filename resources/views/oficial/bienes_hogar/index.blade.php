@extends ('layouts.admin3')
@section ('contenido')
<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12" style="float:right;">
    <div class="info-box bg-green">
      <span class="info-box-icon"><i class="fa fa-user"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">U. Seleccionado</span>
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
 <h3>Bienes del hogar
  <a href="{{url('/oficial/bienes_hogar/create')}}" 
  class="btn btn-success pull-right" 
  style="margin-top: -8px;">Añadir Bien</a>
</h3>
</div>

@if(session('notification'))
<div class="alert alert-success">
   {{session('notification')}}
</div>
@endif
<!-- /.box-header -->
<div class="box-body">
  <table id="o_bienes_hogar" class="table table-bordered table-striped">
    <thead>
      <tr>
       <th>Id</th>   
       <th>Articulo</th>   
       <th>Descripción</th>   
       <th>Marca</th>   
       <th>Color</th>   
       <th>Modelo</th>   
       <th>Estado</th>   
       <th>Valor</th>   
       <th>Acciones</th>               
     </tr>
   </thead>
   <tbody>
    @foreach ($bienes as $bi)
    <tr>
      <td>{{$bi->id_bien_hogar}}</td>
      <td>{{$bi->articulo}}</td>
      <td>{{$bi->descripcion}}</td>
      <td>{{$bi->marca}}</td>
      <td>{{$bi->color}}</td>
      <td>{{$bi->modelo}}</td>
      <td>{{$bi->estado}}</td>
      <td>{{$bi->valor}}</td>     

      <td> <a href="{{url('/oficial/bienes_hogar/'.$bi->id_bien_hogar.'/edit')}}" rel="tooltip" title="Editar" class="btn btn-success btn-simple btn-xs">
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
  $('#liC2').addClass("treeview active");
  $('#liBienesHogar').addClass("active");
</script>
@endpush
@endsection
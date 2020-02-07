@extends ('layouts.admin3')
@section ('contenido')
<!-- div usuario seleccionado-->
<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12" style="float:right;">
    <div class="info-box bg-light-blue">
      <span class="info-box-icon"><i class="fa fa-user text-orange"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Codeudor seleccionado</span>
        <span class="info-box-number"> </span>
        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
          {{Session::get('id_persona_oficial_codeudor','Codeudor no seleccionado')}}
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
    </div>
  </div>
</div>
<!-- div usuario seleccionado-->

<div class="box-header">
 <h4>Venta Comercializacion de productos
  <a href="{{url('/oficial/a_codeudores/venta_comercializacion_producto/create')}}" class="btn btn-success pull-right" style="margin-top: -8px;">Venta Comercialización de productos</a>
</h4>
</div>

<!-- /.box-header -->
<div class="box-body">
  <table id="o_venta_comercializacion" class="table table-bordered table-striped">
    <thead>
      <tr>
       <th>Id</th>
       <th>Producto</th>
       <th>Cantidad</th>
       <th>Unidad Medida</th>               
       <th>Compra Costo Unitario</th>               
       <th>Compra Costo Total</th>               
       <th>Venta Precio Unitario</th>               
       <th>Venta Precio Total</th>               
       <th>Utilidad</th>               
       <th>%</th>               
       <th>Acciones</th>               
       <!--<th>Acción</th>-->        
     </tr>
   </thead>
   <tbody>
    @foreach ($venta as $ve)
    <tr>
      <td>{{$ve->id_venta_comercializacion}}</td>
      <td>{{$ve->producto}}</td>
      <td>{{$ve->cantidad}}</td>
      <td>{{$ve->unidad_medida}}</td>
      <td>{{$ve->c_costo_unitario}}</td> 
      <td>{{$ve->c_costo_total}}</td> 
      <td>{{$ve->v_precio_unitario}}</td> 
      <td>{{$ve->v_precio_total}}</td> 
      <td>{{$ve->utilidad}}</td> 
      <td>{{$ve->porcentaje}}</td>
     <td> <a href="" data-target="#modal-delete-{{$ve->id_venta_comercializacion}}" rel="tooltip" title="Eliminar" data-toggle="modal" class="btn btn-danger btn-simple btn-xs">
                         <i class="fa fa-times"></i> 
                    </a>
    </td>
  </tr>
  @include('oficial.venta_comercializacion_producto.modal')
  @endforeach
</tbody>                
</table>
<!--  Suma del total-->
</div>
<!-- /.box-body -->
@include('sweetalert::alert')
@push ('scripts')
<script>
  $('#liCodeudor').addClass("treeview active");
  $('#liCodeudor_sub_venta_comercializacion').addClass("active");
</script>
@endpush
@endsection
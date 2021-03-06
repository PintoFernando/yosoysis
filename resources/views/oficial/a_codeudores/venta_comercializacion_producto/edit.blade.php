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
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Venta Comercialización:{{$ventas->id_venta_comercializacion}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
            
		</div>
	</div>


  <form method="post" action="{{url('oficial/a_codeudores/venta_comercializacion_producto/'.$ventas->id_venta_comercializacion.'/edit')}}">
  {{csrf_field()}}
  <div class="row">

  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
       <label for="producto">Producto</label>
       <input type="text" name="producto" class="form-control" value="{{old('producto',$ventas->producto)}}" placeholder="Producto">
     </div>
   </div>

   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
       <label for="cantidad">Cantidad</label>
       <input type="number" name="cantidad" class="form-control" value="{{old('cantidad',$ventas->cantidad)}}">
     </div>
   </div>

   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
       <label for="unidad_medida">Unidad de Medida</label>
       <input type="Text" name="unidad_medida" class="form-control" value="{{old('unidad_medida',$ventas->unidad_medida)}}">
     </div>
  </div>

     <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
       <label for="unidad_medida">Compra costo unitario</label>
       <input type="number" step="any" name="c_costo_unitario" class="form-control" value="{{old('c_costo_unitario',$ventas->c_costo_unitario)}}">
     </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
       <label for="v_costo_unitario">Compra costo total</label>
       <input type="number" step="any" name="c_costo_total" class="form-control" value="{{old('c_costo_total',$ventas->c_costo_total)}}">
     </div>
   </div>

   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
       <label for="v_costo_unitario">Venta precio unitario</label>
       <input type="number" step="any" name="v_precio_unitario" class="form-control" value="{{old('v_precio_unitario',$ventas->v_precio_unitario)}}">
     </div>
   </div>


   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
       <label for="v_costo_unitario">Venta precio total</label>
       <input type="number" step="any" name="v_precio_total" class="form-control" value="{{old('v_precio_total',$ventas->v_precio_total)}}">
     </div>
   </div>

   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
       <label for="v_costo_unitario">Utilidad</label>
       <input type="number" step="any" name="utilidad" class="form-control" value="{{old('utilidad',$ventas->utilidad)}}">
     </div>
   </div>

   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
       <label for="v_costo_unitario">Porcentaje</label>
       <input type="number" step="any" name="porcentaje" class="form-control" value="{{old('porcentaje',$ventas->porcentaje)}}">
     </div>
   </div>


   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    <div class="form-group">
     <button class="btn btn-primary" type="submit">Guardar</button>
     <button class="btn btn-danger" type="reset">Reset</button>
     <a href="{{url('/oficial/a_codeudores/venta_comercializacion_producto')}}" class="btn btn-warning">Cancelar</a>
   </div>
 </div>

</div>
</form>
@push ('scripts')
<script>
  $('#liCodeudor').addClass("treeview active");
  $('#liCodeudor_sub_venta_comercializacion').addClass("active");
</script>
@endpush
@endsection

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
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h3>Editar Inventario</h3>
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

<form method="post" action="{{url('/oficial/a_garantes/inventario_mercaderia/'.$inventario->id_imercaderia.'/edit')}}">
  {{csrf_field()}}
  <div class="row">

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
        <label for="detalle">Detalle</label>
        <input type="text" name="detalle" class="form-control" value="{{old('detalle',$inventario->detalle)}}" >
      </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" class="form-control" value="{{old('cantidad',$inventario->cantidad)}}" >
      </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
        <label for="unidad_medida">Unidad Medida</label>
        <input type="text" name="unidad_medida" class="form-control" value="{{old('unidad_medida',$inventario->unidad_medida)}}" >
      </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
        <label for="precio_unitario">Precio Unitario</label>
        <input type="number" step="any" name="precio_unitario" min="0" class="form-control" value="{{old('precio_unitario',$inventario->precio_unitario)}}" >
      </div>
    </div>


    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
        <label for="total">Total</label>
        <input type="number" step="any" name="total" min="0" class="form-control" value="{{old('total',$inventario->total)}}" >
      </div>
    </div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
  <div class="form-group">
   <button class="btn btn-primary" type="submit">Guardar</button>
   <button class="btn btn-info" type="reset">Restablecer</button>
   <a href="{{url('/oficial/a_garantes/inventario_mercaderia')}}" class="btn btn-danger">Cancelar</a>
 </div>
  </div>

</div>
</form>
 @push ('scripts')
<script>
  $('#liGarante').addClass("treeview active");
  $('#liGarante_sub_inventario').addClass("active");
</script>
@endpush
@endsection

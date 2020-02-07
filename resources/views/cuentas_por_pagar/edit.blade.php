@extends ('layouts.admin3')
@section ('contenido')

<div class="row">
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
   <h3>Cuentas por pagar:{{$cuentas->id_cppagar}}</h3>
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

<form method="post" action="{{url('/cuentas_por_pagar/'.$cuentas->id_cppagar.'/edit')}}">
  {{csrf_field()}}
  <div class="row">


   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    <div class="form-group">
     <label for="institucion">Institución</label>
     <input type="text" name="institucion" class="form-control" value="{{old('institucion',$cuentas->institucion)}}">
   </div>
 </div>

 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
  <div class="form-group">
   <label for="tiempo">Tiempo</label>
   <input type="text" name="tiempo" class="form-control" value="{{old('tiempo',$cuentas->tiempo)}}">
 </div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
  <div class="form-group">
   <label for="cuota_mensual">Cuota Mensual</label>
   <input type="number" step="any" name="cuota_mensual" class="form-control" value="{{old('cuota_mensual',$cuentas->cuota_mensual)}}">
 </div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
  <div class="form-group">
   <label for="saldo">Saldo</label>
   <input type="number" step="any" name="saldo" class="form-control" value="{{old('saldo',$cuentas->saldo)}}">
 </div>
</div>


<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
 <div class="form-group">
   <button class="btn btn-primary" type="submit">Guardar</button>
   <a href="{{url('/cuentas_por_pagar')}}" class="btn btn-default"> cancelar</a>
   <button class="btn btn-danger" type="reset">Restablecer</button>
 </div>
</div>
</div>
</form>
@push ('scripts')
<script>
  $('#liAdmin').addClass("treeview active");
  $('#liAdmin_cuentas_pagar').addClass("active");
</script>
@endpush
@endsection

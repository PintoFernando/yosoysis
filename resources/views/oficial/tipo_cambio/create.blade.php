@extends ('layouts.admin3')
@section ('contenido')
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <h3>Registrar Tipo de cambio</h3>
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
<!-- div usuario seleccionado-->
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
  </div>
</div>
<!-- div usuario seleccionado-->
</div>
<form method="post" action="{{url('/oficial/tipo_cambio')}}">
  {{csrf_field()}}
  <div class="row">
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
       <label for="cambio">Tipo de Cambio</label>
       <input type="number" min="0" step="any" name="cambio" class="form-control" value="{{old('cambio')}}" >
     </div>
   </div>           

   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">            
    <div class="form-group">
     <button class="btn btn-primary" type="submit">Guardar</button>
     <a href="{{url('/oficial/tipo_cambio')}}" class="btn btn-danger">Cancelar</a>
   </div>
 </div>
</div>
</form>
@push ('scripts')
<script>
  $('#liC1').addClass("treeview active");
  $('#liTipoCambio').addClass("active");
</script>
@endpush
@endsection

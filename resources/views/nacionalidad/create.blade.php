@extends ('layouts.admin3')
@section ('contenido')

<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h3>Añadir nacionalidad</h3>
    @if(count($errors)>0)
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



<form method="post" action="{{url('/nacionalidad')}}">
  {{csrf_field()}}
  <div class="row">

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
       <label for="nacionalidad">Nacionalidad</label>
       <input type="text" name="nacionalidad" class="form-control" value="{{old('nacionalidad')}}" required>
     </div>
   </div>

   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    <div class="form-group">
     <button class="btn btn-primary" type="submit">Guardar</button>
     <a href="{{url('/nacionalidad')}}" class="btn btn-danger">Cancelar</a>
   </div>
 </div>

</div>
</form>
@push ('scripts')
<script>
  $('#liAdmin_sistema').addClass("treeview active");
  $('#liAdmin_sistema_nacionalidad').addClass("active");
</script>
@endpush
@endsection

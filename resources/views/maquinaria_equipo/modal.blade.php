<div class="modal fade modal-sllide-in-rigth" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$ma->id_maquinaria_equi}}">

   <form method="post" action="{{url('/maquinaria_equipo/'.$ma->id_maquinaria_equi)}}">
  {{csrf_field()}}
  {{method_field('DELETE')}}

<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="close">
				<span aria-hidden="true">x</span>
			</button>
			<h4 class="modal-title">Eliminar Maquinaria Equipo</h4>
		</div>
		<div class="modal-body">
			<p>Confirme si desea eliminar Maquinaria Equipo</p>
		</div>
		
		  <div class="modal-footer">
		  <button type="submit" class="btn btn-success">Confirmar</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				
			</div>
	</div>
</div>	
</form>
</div>


                 
                       
                      
                        
                    
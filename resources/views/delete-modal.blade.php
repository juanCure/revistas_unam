<!-- Delete Modal -->
<div class="modal fade modal_data" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        Borrando {{$object}}!
      </div>
      <div class="modal-body">
        <h4>¿Estas seguro que deseas borrar este elemento?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          <i class="fa fa-times mr-1"></i>Cancelar</i>
        </button>
        <button type="button" wire:click.prevent="delete" class="btn btn-danger">
          <i class="fa fa-trash mr-1"></i>Eliminar {{ $object }}</i>
        </button>
      </div>
    </div>
  </div>
</div>
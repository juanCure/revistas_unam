

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="agregarResponsableModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Responsable</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="grado">Grado:</label>
            <input type="text" name="grado" class="form-control" wire:model="grado">
            @error('grado') <span class="text-danger">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label for="nombres">Nombres:</label>
            <input type="text" name="nombres" class="form-control" wire:model="nombres">
            @error('nombres') <span class="text-danger">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" class="form-control" wire:model="apellidos">
            @error('apellidos') <span class="text-danger">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label for="correo_electronico">Correo:</label>
            <input type="text" name="correo_electronico" class="form-control" wire:model="correo_electronico">
            @error('correo_electronico') <span class="text-danger">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label for="telefonos">Telefono:</label>
            <input type="text" name="telefonos" class="form-control" wire:model="telefonos">
            @error('telefonos') <span class="text-danger">{{ $message }}</span>@enderror
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="resetInputFields()">Cerrar</button>
        <button type="button" class="btn btn-success" wire:click.prevent="store()">Guardar</button>
      </div>
    </div>
  </div>
</div>
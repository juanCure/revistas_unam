<div class="form-group">
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nueva Entidad Académica" wire:model="nombre">
    @error('nombre') <span class="text-danger">{{ $message }}</span>@enderror
</div>
<button wire:click.prevent="update()" class="btn btn-success">Guardar</button>
<button wire:click.prevent="cancel()" class="btn btn-danger">Cancelar</button>

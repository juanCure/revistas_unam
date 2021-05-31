<div class="form-group">
    <label for="exampleFormControlInput1">Nombre:</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nuevo nombre" wire:model="nombre">
    @error('nombre') <span class="text-danger">{{ $message }}</span>@enderror
</div>
<button wire:click.prevent="update()" class="btn btn-dark">Actualizar</button>
<button wire:click.prevent="cancel()" class="btn btn-danger">Cancelar</button>

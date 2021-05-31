<div class="container">
    <div class="row">
        <div class="col-md-12">
        	<h1>Responsables
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarResponsableModal">
                  Agregar responsable
                </button>
            </h1>

            <input type="text"  class="form-control" placeholder="Buscar" wire:model="searchTerm" />
            {{-- <a class="btn btn-success mb-3" href="#">Agregar nuevo responsable</a> --}}
            @include('livewire.responsables.create')
            @include('livewire.responsables.update')
            <table class="table table-striped" style="margin: 10px 0 10px 0;">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Telefonos</th>
                    <th>Acciones</th>
                </tr>
                @foreach($responsables as $responsable)
                <tr>
                    <td>
                        {{ $responsable->id }}
                    </td>
                    <td>
                        {{ $responsable->grado }} {{ $responsable->nombres }} {{ $responsable->apellidos }}
                    </td>
                    <td>{{ $responsable->correo_electronico }}</td>
                    <td>{{ $responsable->telefonos }}</td>
                    <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarResponsableModal" wire:click.prevent="edit({{ $responsable->id }})">
                              Editar
                            </button>
                            <button wire:click="$emit('confirm_remove', {{ $responsable->id }})" class="btn btn-danger btn-sm">Eliminar</button>
                        </td>
                </tr>
                @endforeach
            </table>
            {{ $responsables->links() }}
        </div>
    </div>
</div>
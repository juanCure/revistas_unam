<div class="container">
    <div class="row">
        @include('delete-modal', ['object' => 'Sistema Indexador'])
        <div class="col-md-12">
            {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

            <h1>Indexadores</h1>

            @if($updateMode)
                @include('livewire.sistemas-indexadores.update')
            @else
                @include('livewire.sistemas-indexadores.create')
            @endif
            <table class="table table-bordered mt-5">
                <thead class="thead-light">
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th width="150px">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($indexadores as $indexador)
                    <tr>
                        <td>{{ $indexador->id }}</td>
                        <td>{{ $indexador->nombre }}</td>
                        <td>
                            <button wire:click="edit({{ $indexador->id }})" class="btn btn-primary btn-sm">Editar</button>
                            {{-- <button wire:click="$emit('confirm_remove', {{ $indexador->id }})" class="btn btn-danger btn-sm">Eliminar</button> --}}
                            <a class="btn btn-danger btn-sm" href="" wire:click.prevent="confirmSistemaIndexadorRemoval({{ $indexador->id }})">Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

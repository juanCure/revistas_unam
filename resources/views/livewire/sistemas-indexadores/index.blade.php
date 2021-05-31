<div class="container">
    <div class="row">
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
                        <th width="150px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($indexadores as $indexador)
                    <tr>
                        <td>{{ $indexador->id }}</td>
                        <td>{{ $indexador->nombre }}</td>
                        <td>
                            <button wire:click="edit({{ $indexador->id }})" class="btn btn-primary btn-sm">Editar</button>
                            <button wire:click="$emit('confirm_remove', {{ $indexador->id }})" class="btn btn-danger btn-sm">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

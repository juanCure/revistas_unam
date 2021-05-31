<div class="container">
    <div class="row">
        <div class="col-md-12">
            {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day --}}
            <h1>Temas</h1>

            @if($updateMode)
                @include('livewire.temas.update')
            @else
                @include('livewire.temas.create')
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
                    @foreach($temas as $tema)
                    <tr>
                        <td>{{ $tema->id }}</td>
                        <td>{{ $tema->nombre }}</td>
                        <td>
                            <button wire:click="edit({{ $tema->id }})" class="btn btn-primary btn-sm">Editar</button>
                            <button wire:click="$emit('confirm_remove', {{ $tema->id }})" class="btn btn-danger btn-sm">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

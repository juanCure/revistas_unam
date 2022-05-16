<div class="container">
    <div class="row">
        @include('delete-modal', ['object' => 'Idioma'])
        <div class="col-md-12">
            {{-- The Master doesn't talk, he acts. --}}
            <h1>Idiomas</h1>

            @if($updateMode)
                @include('livewire.idiomas.update')
            @else
                @include('livewire.idiomas.create')
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
                    @foreach($idiomas as $idioma)
                    <tr>
                        <td>{{ $idioma->id }}</td>
                        <td>{{ $idioma->nombre }}</td>
                        <td>
                            <button wire:click="edit({{ $idioma->id }})" class="btn btn-primary btn-sm">Editar</button>
                            {{-- <button wire:click="$emit('confirm_remove', {{ $idioma->id }})" class="btn btn-danger btn-sm">Eliminar</button> --}}
                            <a class="btn btn-danger btn-sm" href="" wire:click.prevent="confirmIdiomaRemoval({{ $idioma->id }})">Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

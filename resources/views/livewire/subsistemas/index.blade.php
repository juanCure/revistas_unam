<div class="container">
    <div class="row">
        @include('delete-modal', ['object' => 'Subsistema'])
        <div class="col-md-12">
            {{-- Care about people's approval and you will be their prisoner. --}}
            <h1>Subsistemas</h1>

            @if($updateMode)
                @include('livewire.subsistemas.update')
            @else
                @include('livewire.subsistemas.create')
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
                    @foreach($subsistemas as $subsistema)
                    <tr>
                        <td>{{ $subsistema->id }}</td>
                        <td>{{ $subsistema->nombre }}</td>
                        <td>
                            <button wire:click="edit({{ $subsistema->id }})" class="btn btn-primary btn-sm">Editar</button>
                            <a class="btn btn-danger btn-sm" href="" wire:click.prevent="confirmSubsistemaRemoval({{ $subsistema->id }})">Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

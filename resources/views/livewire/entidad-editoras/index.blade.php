<div class="container">
    <div class="row">
        @include('delete-modal', ['object' => 'Entidad Editora'])
        <div class="col-md-12">
            {{-- If your happiness depends on money, you will never be happy with yourself. --}}
            <h1>Entidades Editoras</h1>

            @if($updateMode)
                @include('livewire.entidad-editoras.update')
            @else
                @include('livewire.entidad-editoras.create')
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
                    @foreach($entidad_editoras as $entidad)
                    <tr>
                        <td>{{ $entidad->id }}</td>
                        <td>{{ $entidad->nombre }}</td>
                        <td>
                            <button wire:click="edit({{ $entidad->id }})" class="btn btn-primary btn-sm">Editar</button>
                            <a class="btn btn-danger btn-sm" href="" wire:click.prevent="confirmEntidadRemoval({{ $entidad->id }})">Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    console.log("hey estoy en livewire.entidad_editoras.index");
</script>

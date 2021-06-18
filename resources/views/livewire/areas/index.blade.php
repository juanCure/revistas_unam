<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Areas Conocimiento</h1>
            {{-- @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif --}}

            @if($updateMode)
                @include('livewire.areas.update')
            @else
                @include('livewire.areas.create')
            @endif

            <table class="table table-bordered mt-5" style="margin: 10px 0 10px 0;">
                <thead class="thead-light">
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th width="150px">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($areas_conocimiento as $area)
                    <tr>
                        <td>{{ $area->id }}</td>
                        <td>{{ $area->nombre }}</td>
                        <td>
                            <button wire:click="edit({{ $area->id }})" class="btn btn-primary btn-sm">Editar</button>
                            {{-- <button wire:click="delete({{ $area->id }})" class="btn btn-danger btn-sm">Delete</button> --}}
                            <button wire:click="$emit('confirm_remove', {{ $area->id }})" class="btn btn-danger btn-sm">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- <script>
    window.addEventListener('say-goodbye', event => {
        alert('Adios: ' + event.detail.nombre);
    });
</script> --}}
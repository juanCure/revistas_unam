<div class="container">
    <div class="row">
        <div class="col-md-12">
            {{-- Do your work, then step back. --}}
        	<h1>Editoriales</h1>

            @if($updateMode)
                @include('livewire.editoriales.update')
            @else
                @include('livewire.editoriales.create')
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
                    @foreach($editoriales as $editorial)
                    <tr>
                        <td>{{ $editorial->id }}</td>
                        <td>{{ $editorial->nombre }}</td>
                        <td>
                            <button wire:click="edit({{ $editorial->id }})" class="btn btn-primary btn-sm">Editar</button>
                            <button wire:click="$emit('confirm_remove', {{ $editorial->id }})" class="btn btn-danger btn-sm">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

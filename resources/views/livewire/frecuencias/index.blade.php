<div class="container">
    <div class="row">
        <div class="col-md-12">

            {{-- Care about people's approval and you will be their prisoner. --}}
            <h1>Frecuencias</h1>

            @if($updateMode)
                @include('livewire.frecuencias.update')
            @else
                @include('livewire.frecuencias.create')
            @endif
            <table class="table table-bordered mt-5" style="margin: 10px 0 10px 0;">
                <thead class="thead-light">
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th width="150px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($frecuencias as $frecuencia)
                    <tr>
                        <td>{{ $frecuencia->id }}</td>
                        <td>{{ $frecuencia->nombre }}</td>
                        <td>
                            <button wire:click="edit({{ $frecuencia->id }})" class="btn btn-primary btn-sm">Edit</button>
                            <button wire:click="$emit('confirm_remove', {{ $frecuencia->id }})" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

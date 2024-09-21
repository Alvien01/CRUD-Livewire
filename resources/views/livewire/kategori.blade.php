<div>
    <div class="col-md-12 mb-2">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
        @endif

        @if(!empty($addKategori))
            @include('livewire.kategori-create') <!-- Assuming this is your create form -->
        @endif

        @if(!empty($updateKategori))
            @include('livewire.kategori-update') <!-- Assuming this is your update form -->
        @endif
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if(!empty($updateKategori))
                    <button wire:click="create()" class="btn btn-primary btn-sm float-end">Add New Category</button>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Kategori</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (!empty($kategori))
                            @foreach ($kategori as $categori)
                                <tr>
                                    <td>{{ $categori->id }}</td>
                                    <td>{{ $categori->kategori }}</td>
                                    <td>{{ $categori->slug }}</td>
                                    <td>
                                        <button wire:click="edit({{ $categori->id }})" class="btn btn-primary btn-sm">Edit</button>
                                        <button wire:click="destroy({{ $categori->id }})" class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                            
                            @endforeach
                        @else
                                <tr>
                                    <td colspan="4" align="center">
                                        No Posts Found.
                                    </td>
                                </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

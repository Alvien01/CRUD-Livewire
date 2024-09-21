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

        @if($addPost)
            @include('livewire.create')
        @endif

        @if($updatePost)
            @include('livewire.update')
        @endif
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if(!$addPost)
                    <button wire:click="create()" class="btn btn-primary btn-sm float-end">Add New Post</button>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Kategori</th>
                            <th>Content</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->kategori }}</td>
                                <td>{{ $post->content }}</td>
                                <td>
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Image" width="100">
                                @else
                                    No Image
                                @endif

                                </td>
                                <td>{{ $post->status == 1 ? 'Publish' : 'Draft' }}</td>
                                <td>
                                    <button wire:click="edit({{ $post->id }})" class="btn btn-primary btn-sm">Edit</button>
                                    <button wire:click="destroy({{ $post->id }})" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" align="center">
                                    No Posts Found.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

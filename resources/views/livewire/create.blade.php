<div class="card">
    <div class="card-body">
        <form>
            <div class="form-group mb-3">
                <label for="title">Title:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                       placeholder="Enter Title" wire:model="title">
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="kategori">Kategori:</label>
                <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori"
                       placeholder="Enter Kategori" wire:model="kategori">
                @error('kategori')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="content">Content:</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content"
                          wire:model="content" placeholder="Enter content"></textarea>
                @error('content')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Form untuk Upload Gambar dengan Preview -->
            <div class="form-group mb-3">
                <label for="image">Upload Gambar</label>
                <input type="file" wire:model="image" class="form-control">
                @error('image') 
                <span class="text-danger">{{ $message }}</span> 
                @enderror

                <!-- Preview gambar setelah upload -->
                <div wire:loading wire:target="image" class="mt-2">
                    Loading...
                </div>

                @if ($image)
                    <div class="mt-2">
                        <label>Preview Gambar:</label><br>
                        <img src="{{ $image->temporaryUrl() }}" alt="Preview Gambar" width="200">
                    </div>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" wire:model="status">
                    <option value="1">Draft</option>
                    <option value="2">Publish</option>
                </select>
                @error('status')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="d-grid gap-2">
                <button wire:click.prevent="store()" class="btn btn-success btn-block">Save</button>
                <button wire:click.prevent="cancel()" class="btn btn-secondary btn-block">Cancel</button>
            </div>
        </form>
    </div>
</div>

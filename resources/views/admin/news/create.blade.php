@extends('layouts.admin')
@section('title', 'Tambah Berita')

@section('content')
<div class="container">
    <h1>Tambah Berita</h1>

    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id', $news->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            @error('title') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Isi Berita</label>
            <textarea id="ckeditor" name="content" class="form-control" rows="8" required>{{ old('content', $news->content ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Gambar (opsional)</label>
            <input type="file" name="image" class="form-control">
            @error('image') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('news.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/41.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector('#ckeditor'), {
            simpleUpload: {
                uploadUrl: "{{ route('ckeditor.upload') }}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        })
        .catch( error => {
            console.error( error );
        });
</script>
@endsection

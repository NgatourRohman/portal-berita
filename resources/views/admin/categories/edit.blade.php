@extends('layouts.admin')
@section('title', 'Edit Kategori')

@section('content')
<div class="container-fluid">
    <h1>Edit Kategori</h1>
    <form method="POST" action="{{ route('categories.update', $category->id) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

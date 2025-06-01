@extends('layouts.admin')
@section('title', 'Edit User')

@section('content')
<div class="container-fluid">
    <h1>Edit User</h1>

    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" value="{{ $user->name }}" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" value="{{ $user->email }}" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

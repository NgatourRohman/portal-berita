@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Dashboard Admin</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalBerita }}</h3>
                    <p>Total Berita</p>
                </div>
                <div class="icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <a href="{{ route('news.index') }}" class="small-box-footer">Lihat semua <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalKategori }}</h3>
                    <p>Total Kategori</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tags"></i>
                </div>
                <a href="{{ route('categories.index') }}" class="small-box-footer">Lihat semua <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection

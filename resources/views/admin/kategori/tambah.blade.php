@extends('admin.app')
@section('title','Tambah Instructor | IdeaThings')
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Tambah Kategori</h5>
                <div class="card">
                    <div class="container-fluid">
                        <form action="{{ route('submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama-barang">Nama</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama..." required />
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('kategori') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

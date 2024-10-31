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
                <h5 class="card-title fw-semibold mb-4">Tambah Instructor</h5>
                <div class="card">
                    <div class="container-fluid">
                        <form action="{{ route('submitinstructor') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama-barang">Nama</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama..." required />
                            </div>
                            <div class="mb-3">
                                <label for="nama-barang">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email..." required />
                            </div>
                            <div class="mb-3">
                                <label for="role">Role</label>
                                <input type="text" class="form-control" name="role" value="Instructor" readonly />
                            </div>
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="total_progress" value="0" readonly />
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password..." required />
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('instructor') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

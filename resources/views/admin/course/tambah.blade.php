@extends('admin.app')
@section('title', 'Tambah Course | IdeaThings')
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Tambah Course</h5>
                <div class="card">
                    <div class="container-fluid">
                        <form action="{{ route('submitcourse') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Judul Kursus -->
                            <div class="mb-3">
                                <label for="title">Judul</label>
                                <input type="text" class="form-control" name="title" placeholder="Masukkan judul kursus" required />
                            </div>

                            <!-- Deskripsi Kursus -->
                            <div class="mb-3">
                                <label for="description">Deskripsi</label>
                                <textarea type="text" class="form-control" name="description" placeholder="Masukkan deskripsi kursus" required></textarea>
                            </div>

                            <!-- Harga -->
                            <div class="mb-3">
                                <label for="price">Harga</label>
                                <input type="number" class="form-control" name="price" placeholder="Masukkan harga kursus" required />
                            </div>

                            <!-- Total Harga -->
                            <div class="mb-3">
                                <label for="total_price">Total Harga</label>
                                <input type="number" class="form-control" name="total_price" placeholder="Masukkan total harga kursus" required />
                            </div>

                            <!-- Status Locked -->
                            <div class="mb-3">
                                <label for="is_locked">Status Kunci</label>
                                <select name="is_locked" id="is_locked" class="form-control" required>
                                    <option value="1">Locked</option>
                                    <option value="2">Unlocked</option>
                                </select>
                            </div>

                            <!-- Pilihan Instruktur -->
                            <div class="form-group">
                                <label for="instructor_id">Instruktur</label>
                                <select name="instructor_id" id="instructor_id" class="form-control" required>
                                    <option value="">Pilih Instruktur</option>
                                    @foreach ($instructors as $instructor)
                                        <option value="{{ $instructor->id }}">{{ $instructor->instructor_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto" accept="image/*"
                                    required>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('course') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

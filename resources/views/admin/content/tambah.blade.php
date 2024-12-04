@extends('admin.app')
@section('title', 'Tambah Content | IdeaThings')
@section('content')
<br><br><br><br><br>
    <div class="container-fluid mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Tambah Content</h5>
                <form action="{{ route('submitcontent') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Pilihan Kursus -->
                    <div class="mb-3">
                        <label for="judul">Judul Kursus</label>
                        <select name="judul" id="judul" class="form-control" required>
                            <option value="">Pilih Judul Kursus</option>
                            @foreach ($courses as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pilihan Kategori -->
                    <div class="mb-3">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($course_categories as $item)
                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pilihan Section -->
                    <div class="mb-3">
                        <label for="section">Section</label>
                        <select name="section" id="section" class="form-control" required>
                            <option value="">Pilih Section</option>
                            @foreach ($course_sections as $item)
                                <option value="{{ $item->id }}">{{ $item->section }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Judul Konten -->
                    <div class="mb-3">
                        <label for="title">Judul Konten</label>
                        <input type="text" class="form-control" name="title" placeholder="Masukkan judul konten" required />
                    </div>

                    <!-- URL Konten -->
                    <div class="mb-3">
                        <label for="url">URL</label>
                        <input type="url" class="form-control" name="url" placeholder="Masukkan URL konten" required />
                    </div>

                    <!-- Durasi -->
                    <div class="mb-3">
                        <label for="durasi">Durasi (menit)</label>
                        <input type="number" class="form-control" name="durasi" placeholder="Masukkan durasi dalam menit" required />
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('content') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

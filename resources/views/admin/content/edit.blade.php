@extends('admin.index')

@section('content')
    <br><br><br><br><br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Edit Course</h5>
                <div class="container my-5">

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @elseif(session('danger'))
                        <div class="alert alert-danger">{{ session('danger') }}</div>
                    @endif

                    <form action="{{ route('updatecontent', $content->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Judul -->
                        <div class="form-group mb-3">
                            <label for="judul">Judul</label>
                            <select name="judul" class="form-control @error('judul') is-invalid @enderror">
                                <option value="">Pilih Judul Kursus</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}"
                                        {{ old('judul', $content->course_id) == $course->id ? 'selected' : '' }}>
                                        {{ $course->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div class="form-group mb-3">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" class="form-control @error('kategori') is-invalid @enderror">
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('kategori', $content->course_category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Section -->
                        <div class="form-group mb-3">
                            <label for="section">Section</label>
                            <select name="section" class="form-control @error('section') is-invalid @enderror">
                                <option value="">Pilih Section</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}"
                                        {{ old('section', $content->section_id) == $section->id ? 'selected' : '' }}>
                                        {{ $section->section }}
                                    </option>
                                @endforeach
                            </select>
                            @error('section')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Title -->
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" value="{{ old('title', $content->title) }}"
                                class="form-control @error('title') is-invalid @enderror" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- URL -->
                        <div class="form-group mb-3">
                            <label for="url">URL</label>
                            <input type="url" name="url" value="{{ old('url', $content->url) }}"
                                class="form-control @error('url') is-invalid @enderror" required>
                            @error('url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Durasi -->
                        <div class="form-group mb-3">
                            <label for="durasi">Durasi (menit)</label>
                            <input type="number" name="durasi" value="{{ old('durasi', $content->duration) }}"
                                class="form-control @error('durasi') is-invalid @enderror" required min="1">
                            @error('durasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tombol Simpan -->
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

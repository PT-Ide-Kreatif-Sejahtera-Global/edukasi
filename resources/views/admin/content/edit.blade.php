@extends('admin.index')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Edit Course</h5>
                <div class="card">
                    <div class="container-fluid">
                        <div class="container my-5">
                            <!-- Display success or error messages -->
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @elseif(session('danger'))
                                <div class="alert alert-danger">
                                    {{ session('danger') }}
                                </div>
                            @endif
                            <!-- Edit Content Form -->
                            <form action="{{ route('updatecontent', $content->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <select name="judul" class="form-control" required>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}"
                                                {{ $course->id == $content->course_id ? 'selected' : '' }}>
                                                {{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select name="kategori" class="form-control" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $content->course_category_id ? 'selected' : '' }}>
                                                {{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="section">Section</label>
                                    <select name="section" class="form-control" required>
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->id }}"
                                                {{ $section->id == $content->section_id ? 'selected' : '' }}>
                                                {{ $section->section }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" value="{{ $content->title }}" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="url">URL</label>
                                    <input type="url" name="url" value="{{ $content->url }}" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="durasi">Durasi (menit)</label>
                                    <input type="number" name="durasi" value="{{ $content->duration }}"
                                        class="form-control" required min="1">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

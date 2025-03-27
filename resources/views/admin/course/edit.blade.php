{{-- {{dd($instructor)}} --}}
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
                            <form action="{{ url('updatecourse' . $course->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                {{-- <div class="form-group">
                                    <label for="instructor_id">Instructor ID</label>
                                    <input type="text" class="form-control" id="instructor_id" name="instructor_id"
                                        value="{{ $course->instructor_id }}" required>
                                </div> --}}

                                <!-- Pilihan Instruktur -->
                                <div class="form-group">
                                    <label for="instructor_id">Instruktur</label>
                                    <select name="instructor_id" id="instructor_id" class="form-control" required>
                                        <option value="">Pilih Instruktur</option>
                                        @foreach ($instructors as $instructor)
                                            <option value="{{ $instructor->id }}">{{ $instructor->user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $course->title }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" required>{{ $course->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" id="price" name="price"
                                        value="{{ $course->price }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="total_price">Total Price</label>
                                    <input type="number" class="form-control" id="total_price" name="total_price"
                                        value="{{ $course->total_price }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="url">URL Udemy (contoh: https://www.udemy.com/course/your-course-id)</label>
                                    <input type="url" class="form-control" name="url" placeholder="Masukkan URL Udemy kursus" value="{{ $course->url }}" required />
                                </div>

                                <div class="mb-3">
                                    <label for="embedded_video">Url Embedded Video (contoh: https://mega.nz/embed/your_video_id)</label>
                                    <input type="text" class="form-control" name="embedded_video" value="{{ $course->embedded_video }}" placeholder="Masukkan URL embedded video" required />
                                    <small class="text-muted">Pastikan untuk mengubah width ke 100% untuk tampilan yang lebih rapi.</small>
                                </div>

                                <div class="form-group">
                                    <label for="is_locked">Is Locked</label>
                                    <select class="form-control" id="is_locked" name="is_locked">
                                        <option value="1" {{ $course->is_locked == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ $course->is_locked == 0 ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control-file" id="foto" name="foto">
                                    <!-- Tampilkan foto saat ini jika ada -->
                                    @if ($course->foto)
                                        <img src="{{ asset('storage/course/' . $course->foto) }}" alt="Course Image"
                                            class="img-fluid mt-2" style="width: 200px;">
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary">Update Course</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

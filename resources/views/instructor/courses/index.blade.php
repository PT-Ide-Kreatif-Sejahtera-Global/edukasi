@extends('admin.app')
@section('content')
    <br><br><br><br><br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Daftar Courses</h5>
                <div class="card">
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table" class="display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Course Title</th>
                                        <th>Instructor Name</th>
                                        <th>Total Students</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($enrollments->groupBy('course_title') as $courseTitle => $enrolledCourses)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $courseTitle }}</td>
                                            <td>{{ $enrolledCourses->first()->instructor_name }}</td>
                                            <td>{{ $enrolledCourses->count() }}</td>
                                            <td>
                                                {{-- Pastikan ID kursus berasal dari enrollments --}}
                                                <a href="{{ route('students', ['course' => $enrolledCourses->first()->course_id]) }}"
                                                    class="btn btn-primary btn-sm">Lihat Murid</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No courses enrolled yet.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

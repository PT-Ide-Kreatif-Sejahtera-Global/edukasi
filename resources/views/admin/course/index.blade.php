@extends('admin.app')
@section('content')
    <br><br><br><br><br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Course</h5>
                <a href="{{ url('tambahcourse') }}" class="ti ti-plus">Tambah Course</a>
                <div class="card">
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Instructor</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @if ($courses)
                                        @foreach ($courses as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->instructor_name }}</td>
                                                <td>{{ $data->title }}</td>
                                                <td>{{ Str::limit($data->description, 50) }}</td>
                                                <td>{{ $data->price }}</td>
                                                <td>{{ $data->total_price }}</td>
                                                <td>{{ $data->lock_status }}</td>
                                                <td>
                                                    <img width="100" height="100"
                                                        src="{{ url('storage/course/' . $data->foto) }}" alt="Course Image">
                                                </td>
                                                <td class="text-center">
                                                    <!-- Dropdown untuk Edit dan Hapus -->
                                                    <div class="dropdown">
                                                        <button class="btn btn-light ti ti-dots-vertical" type="button"
                                                            id="menuOptions" data-bs-toggle="dropdown" aria-expanded="false"
                                                            style="border: none; background: none;">
                                                            <i class="ti ti-more" style="font-size: 1.5rem;"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="menuOptions">
                                                            <li>
                                                                <a href="{{ url('editcourse' . $data->id) }}"
                                                                    class="dropdown-item">
                                                                    <i class="ti ti-pencil"></i> Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('deletecourse/' . $data->id) }}"
                                                                    class="dropdown-item"><i class="ti ti-trash"></i>Delete
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

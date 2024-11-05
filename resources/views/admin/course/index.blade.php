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
                                                <td>
                                                    <a href="{{ url('edit/' . $data->id) }}">Edit</a>
                                                    <a href="{{ url('deleteuser/' . $data->id) }}" class="ti ti-trash" id="delete"></a>
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

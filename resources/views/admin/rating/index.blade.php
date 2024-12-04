@extends('admin.app')
@section('content')
<br><br><br><br><br>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Rating</h5>
            {{-- <a href="{{ url('tambahmeja') }}" class="ti ti-plus">Tambah Course</a> --}}
            <div class="card">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Course</th>
                                    <th>Kategori</th>
                                    <th>Judul</th>
                                    <th>Bintang</th>
                                    <th>Komentar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @if ($meja)
                                    @foreach ($meja as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->no_meja }}</td>
                                            <td>{{ $data->kapasitas }}</td>
                                            <td>
                                                <form action="{{ route('updateMejaStatus', $data->id_meja) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <select name="status" class="form-select">
                                                        <option value="tersedia" {{ $data->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                                        <option value="tidak tersedia" {{ $data->status == 'tidak tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                                                    </select>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <!-- Tombol Simpan -->
                                                    <button type="submit" class="btn btn-primary ti ti-check me-2"></button>
                                                </form>
                                                
                                                <!-- Dropdown Aksi -->
                                                <div class="dropdown">
                                                    <button class="btn btn-light ti ti-dots-vertical" type="button" id="dropdownMenuButton{{ $data->id_meja }}" data-bs-toggle="dropdown" aria-expanded="false">
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $data->id_meja }}">
                                                        <li>
                                                            <a href="{{ route('editmeja', $data->id_meja) }}" class="dropdown-item">
                                                                <i class="ti ti-pencil"></i> Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ url('deletemeja/' . $data->id_meja) }}" method="GET" style="display:inline;">
                                                                @csrf
                                                                <button type="submit" class="dropdown-item text-danger">
                                                                    <i class="ti ti-trash"></i> Delete
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody> --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
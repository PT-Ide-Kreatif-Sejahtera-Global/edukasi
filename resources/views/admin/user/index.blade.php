@extends('admin.app')
@section('content')
<br><br><br><br><br>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">User</h5>
            {{-- <a href="{{ url('tambahkasir') }}" class="ti ti-plus">Tambah Kasir</a> --}}
            <div class="card">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table" class="display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    {{-- <th>Meja</th> --}}
                                    <th>Nama Pelanggan</th>
                                    {{-- <th>No Telepon</th> --}}
                                    <th>Email</th>
                                    {{-- <th>Tanggal</th>
                                    <th>Jumlah Tamu</th>
                                    <th>Menu</th>
                                    <th>Total Harga</th> --}}
                                    <th>foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @if ($pembeli)
                                    @foreach ($pembeli as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            {{-- <td>{{ $data->id_meja }}</td> --}}
                                            <td>{{ $data->name }}</td>
                                            {{-- <td>{{ $data->no_hp }}</td> --}}
                                            <td>{{ $data->email }}</td>
                                            {{-- <td>{{ $data->tanggal }}</td>
                                            <td>{{ $data->jumlah_tamu }}</td>
                                            <td>{{ $data->no_meja }}</td>
                                            <td>{{ $data->total_harga }}</td> --}}
                                            <td><img width="100" height="100" src="{{ url('storage/users/' . $data->foto) }}"></td>
                                            {{-- <td>
                                                <a href="{{ url('edit/' . $data->id_reservasi) }}">Edit</a>
                                                <a href="{{ url('deletekasir/' . $data->id_reservasi) }}" class="ti ti-trash" id="delete"></a>
                                            </td> --}}
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
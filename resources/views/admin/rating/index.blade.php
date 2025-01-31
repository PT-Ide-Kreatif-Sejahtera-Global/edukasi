@extends('admin.app')

@section('content')

{{-- @php
    dd($data);
@endphp --}}

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
                                    <th>User name</th>
                                    <th>Nama Course</th>
                                    <th>Bintang</th>
                                    <th>Komentar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->course->title}}</td>
                                        <td>{{ $item->bintang }}</td>
                                        <td>{{ $item->komentar }}</td>
                                        <td>aksi</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
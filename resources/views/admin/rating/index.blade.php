@extends('admin.app')

@section('js')
    <script src="sweetalert2.min.js"></script>

    <script>
        $(function() {
            $(document).on('click', '.delete-button', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');

                Swal.fire({
                    title: "Apakah anda yakin menghapus data ini?",
                    text: "Anda tidak akan dapat mengembalikan data ini!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Saya Yakin!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            })
        })
    </script>
@endsection

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
                                        <td>
                                            <a href="{{ url('/deletereview', $item->id) }}" class="btn btn-danger btn-sm delete-button">Delete</a>
                                        </td>
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
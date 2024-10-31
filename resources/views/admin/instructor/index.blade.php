@extends('admin.app')
@section('title','Daftar instructor | IdeaThings E-Learning')
{{-- @section('js')
    <script src="sweetalert2.min.js"></script>

    <script>
        $(function() {
            $(document).on('click', '.delete-button', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');

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
                        form.submit();
                    }
                });
            })
        })
    </script>
@endsection --}}
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Instructor</h5>
                <a href="{{ url('tambahinstructor') }}" class="ti ti-plus">Tambah Instructor</a>
                <div class="card">
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @if ($users)
                                        @foreach ($users as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ $data->role }}</td>
                                                <td><img width="100" height="100" src="{{ url('storage/users/' . $data->foto) }}"></td>
                                                <td>
                                                    <a href="{{ url('edit/' . $data->id) }}">Edit</a>
                                                    {{-- <form action="{{ url('deleteuser/' . $data->id) }}" method="GET" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="ti ti-trash"></button>
                                                    </form> --}}
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



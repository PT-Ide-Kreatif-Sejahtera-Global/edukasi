@extends('admin.app')
@section('title','Daftar Kategori | IdeaThings E-Learning')
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
                <h5 class="card-title fw-semibold mb-4">Kategori</h5>
                <a href="{{ url('tambah') }}" class="ti ti-plus">Tambah Kategori</a>
                <div class="card">
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
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
                                                <td>{{ $data->category_name }}</td>
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
                                                                <a href="{{ url('editkategori' . $data->id) }}"
                                                                    class="dropdown-item">
                                                                    <i class="ti ti-pencil"></i> Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('deletekategori/' . $data->id) }}"
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
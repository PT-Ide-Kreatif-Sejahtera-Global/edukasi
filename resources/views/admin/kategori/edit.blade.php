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
                <h5 class="card-title fw-semibold mb-4">Edit Kategori</h5>
                <div class="card">
                    <div class="container-fluid">
                        <div class="container my-5">
                            <form action="{{ route('updatekategori', $kategori->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Nama Kategori</label>
                                    <input type="text" name="name" value="{{ $kategori->category_name }}"
                                        class="form-control" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

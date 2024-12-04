@extends('admin.app')
@section('content')
    <div class="container">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Edit Profile</h5>
                    <div class="card">
                        <div class="container-fluid">
                            <div class="container my-5">
                                <form action="{{ route('updateprofile') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- Nama -->
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            value="{{ Auth::user()->name }}" required>
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            value="{{ Auth::user()->email }}" required>
                                    </div>

                                    <!-- Role (Readonly) -->
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <input type="text" id="role" name="role" class="form-control"
                                            value="{{ Auth::user()->role }}" readonly>
                                    </div>

                                    <!-- Password -->
                                    <div class="form-group">
                                        <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
                                        <input type="password" id="password" name="password" class="form-control">
                                    </div>

                                    <!-- Foto Profil -->
                                    <div class="form-group">
                                        <label for="foto">Foto Profil</label>
                                        <input type="file" id="foto" name="foto" class="form-control">
                                    </div>

                                    <!-- Tombol Update -->
                                    <button type="submit" class="btn btn-primary">Update Profil</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

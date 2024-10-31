@extends('admin.app')
@section('content')
<br><br><br><br><br>
<div class="container-fluid">
    <div class="row">
        <!-- Laporan Reservasi -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body" align='center'>
                    <h5 class="card-title">Course</h5>
                    {{-- <h6>Terdapat <strong>{{ $reservationCount }}</strong> laporan reservasi dari semua pesanan.</h6> --}}
                    <a href="course" class="btn btn-primary">course</a>
                </div>
            </div>
        </div>

        <!-- Laporan Harian -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body" align='center'>
                    <h5 class="card-title">Data User</h5>
                    {{-- <h6>Terdapat <strong>{{ $reservationharianCount }}</strong> Laporan Reservasi Hari Ini.</h6> --}}
                    <a href="user" class="btn btn-primary">user</a>
                </div>
            </div>
        </div>

        <!-- Transaksi -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body" align='center'>
                    <h5 class="card-title">Payment</h5>
                    {{-- <h6>Terdapat <strong>{{ $transaksiCount }}</strong> Semua pesanan online.</h6> --}}
                    <a href="{{ url('payment') }}" class="btn btn-primary">Payment</a>
                </div>
            </div>
        </div>

        @if (Auth::user()->role == 'Admin')

        <!-- Menu -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body" align='center'>
                    <h5 class="card-title">Rating</h5>
                    {{-- <h6>Terdapat <strong>{{ $menuCount }}</strong> Menu yang tersedia di List Menu.</h6> --}}
                    <a href="{{ url('rating') }}" class="btn btn-primary">Rating</a>
                </div>
            </div>
        </div>

        <!-- Data Pembeli -->
        {{-- <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body" align='center'>
                    <h5 class="card-title">Data Pembeli</h5>
                    <h6>Terdapat <strong>{{ $pembeliCount }}</strong> Data pembeli.</h6>
                    <a href="pembeli" class="btn btn-primary">Data Pembeli</a>
                </div>
            </div>
        </div> --}}
        @endif
    </div>
</div>
@endsection
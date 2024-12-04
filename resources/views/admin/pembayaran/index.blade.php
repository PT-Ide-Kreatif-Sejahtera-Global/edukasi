@extends('admin.app')

@section('content')
    <br><br><br><br><br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Payment</h5>
                <div class="card">
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Nama Course</th>
                                        <th>Kode Kupon</th>
                                        <th>Tanggal Pembayaran</th>
                                        <th>Diskon</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($payments as $payment)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $payment->user_name }}</td> <!-- Updated field name -->
                                            <td>{{ $payment->course_title }}</td> <!-- Updated field name -->
                                            <td>{{ $payment->coupon_code ?? '-' }}</td> <!-- Updated field name -->
                                            <td>{{ $payment->enrollment_date }}</td>
                                            <td>{{ 'Rp. ' . number_format($payment->discount_amount, 0, ',', '.') }}</td>
                                            <td>{{ 'Rp. ' . number_format($payment->total_price, 0, ',', '.') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data pembayaran.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

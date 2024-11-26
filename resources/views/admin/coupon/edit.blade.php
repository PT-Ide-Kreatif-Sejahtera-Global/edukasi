@extends('admin.index')

@section('title', 'Edit Coupon')

@section('content')
    <br><br><br><br><br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Coupon</h5>

                <!-- Form edit coupon -->
                <form action="{{ route('updatecoupon', $coupon->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="cupon_code" class="form-label">Kode Kupon</label>
                        <input type="text" class="form-control" id="cupon_code" name="cupon_code" value="{{ old('cupon_code', $coupon->cupon_code) }}" required>
                        @error('cupon_code')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" required>{{ old('description', $coupon->description) }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="discount_type" class="form-label">Tipe Diskon</label>
                        <select class="form-control" id="discount_type" name="discount_type" required>
                            <option value="percentage" {{ old('discount_type', $coupon->discount_type) == 'percentage' ? 'selected' : '' }}>Persentase</option>
                            <option value="flat" {{ old('discount_type', $coupon->discount_type) == 'flat' ? 'selected' : '' }}>Nominal</option>
                        </select>
                        @error('discount_type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="discount_value" class="form-label">Nilai Diskon</label>
                        <input type="number" class="form-control" id="discount_value" name="discount_value" value="{{ old('discount_value', $coupon->discount_value) }}" required>
                        @error('discount_value')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="valid_form" class="form-label">Tanggal Mulai Berlaku</label>
                        <input type="date" class="form-control" id="valid_form" name="valid_form" value="{{ old('valid_form', $coupon->valid_form) }}" required>
                        @error('valid_form')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="valid_until" class="form-label">Tanggal Berakhir</label>
                        <input type="date" class="form-control" id="valid_until" name="valid_until" value="{{ old('valid_until', $coupon->valid_until) }}" required>
                        @error('valid_until')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="usage_limit" class="form-label">Batas Penggunaan</label>
                        <input type="number" class="form-control" id="usage_limit" name="usage_limit" value="{{ old('usage_limit', $coupon->usage_limit) }}" required>
                        @error('usage_limit')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="total_usage" class="form-label">Total Penggunaan</label>
                        <input type="number" class="form-control" id="total_usage" name="total_usage" value="{{ old('total_usage', $coupon->total_usage) }}" required>
                        @error('total_usage')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update Kupon</button>
                </form>
            </div>
        </div>
    </div>
@endsection

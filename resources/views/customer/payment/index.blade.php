@extends('customer.index')

@section('content')
    <section id="payment" class="my-5">
        <div class="container">
            <h2 class="mb-4">Pembayaran untuk {{ $course->title }}</h2>

            <!-- Formulir Pembayaran -->
            <form action="{{ route('submitpayment', $course->id) }}" method="POST" id="paymentForm">
                @csrf

                <div class="form-group">
                    <label for="payment_method">Metode Pembayaran</label>
                    <select name="payment_method" id="payment_method" class="form-control" required>
                        <option value="">Pilih Metode Pembayaran</option>
                        <option value="credit_card">Kartu Kredit</option>
                        <option value="paypal">PayPal</option>
                        <option value="bank_transfer">Transfer Bank</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="coupon_id">Pilih Kupon (Opsional)</label>
                    <select name="coupon_id" id="coupon_id" class="form-control">
                        <option value="">Pilih Kupon</option>
                        @foreach ($coupons as $coupon)
                            <option value="{{ $coupon->id }}" data-discount="{{ $coupon->discount_value }}"
                                data-discount-type="{{ $coupon->discount_type }}">
                                {{ $coupon->cupon_code }} - Diskon:
                                {{ $coupon->discount_type === 'percentage' ? $coupon->discount_value . '%' : 'Rp. ' . number_format($coupon->discount_value, 0, ',', '.') }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="total_price">Harga Total</label>
                    <input type="text" name="total_price_display" id="total_price_display" class="form-control"
                        value="Rp. {{ number_format($course->price, 0, ',', '.') }}" readonly>
                    <input type="hidden" name="total_price" id="total_price" value="{{ $course->price }}">
                    <input type="hidden" name="discount_amount" id="discount_amount" value="0">
                    <input type="hidden" name="udemy_coupon" id="udemy_coupon" value="0">
                </div>

                <button type="submit" class="btn btn-primary mt-3">Proses Pembayaran</button>
            </form>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.getElementById('coupon_id').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const discountValue = parseInt(selectedOption.getAttribute('data-discount')) || 0;
            const discountType = selectedOption.getAttribute('data-discount-type');
            const totalPrice = parseInt(document.getElementById('total_price').value);
            const totalPriceDisplay = document.getElementById('total_price_display');

            console.log('Kupon dipilih:', selectedOption.value);
            console.log('Nilai Diskon:', discountValue);
            console.log('Tipe Diskon:', discountType);
            console.log('Harga Total Sebelum Diskon:', totalPrice);

            let finalDiscountAmount = 0;

            // Hitung diskon berdasarkan tipe
            if (discountType === 'percentage') {
                finalDiscountAmount = totalPrice * (discountValue / 100);
            } else if (discountType === 'nominal') {
                finalDiscountAmount = discountValue;
            }

            // Pastikan diskon tidak melebihi harga total
            const discountedTotal = Math.max(totalPrice - finalDiscountAmount, 0);

            console.log('Total Setelah Diskon:', discountedTotal);

            // Update field tersembunyi dan harga total tampilan
            document.getElementById('discount_amount').value = finalDiscountAmount;
            document.getElementById('udemy_coupon').value = finalDiscountAmount > 0 ? 1 : 0;
            totalPriceDisplay.value = `Rp. ${discountedTotal.toLocaleString('id-ID')}`;
        });
    </script>
@endsection

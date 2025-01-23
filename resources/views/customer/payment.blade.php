@extends('customer.index')

@section('content')
<div class="flex justify-center items-center min-h-screen">
    <div>
        <h1 class="text-center">Payment List</h1>
        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <button id="pay-button">Pay</button>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script type="text/javascript">
document.getElementById('pay-button').onclick = function () {
        const snapToken = "{{ $course[0]->snap_token }}"; // Snap token dari server

        if (snapToken) {
            window.snap.pay(snapToken, {
                onSuccess: function (result) {
                    alert('Pembayaran berhasil!');
                    console.log(result);
                },
                onPending: function (result) {
                    alert('Menunggu pembayaran!');
                    console.log(result);
                },
                onError: function (result) {
                    alert('Pembayaran gagal!');
                    console.log(result);
                }
            });
        } else {
            alert('Snap token is not available.');
        }
    };
</script>
@endsection
 
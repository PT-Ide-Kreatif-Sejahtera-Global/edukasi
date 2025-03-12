<!DOCTYPE html>
<html lang="en">

<head>
    <title>iDeaThings - Course</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/owl.theme.default.min.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/logos/logo-new.png') }}" />

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('landing/css/templatemo-style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY', 'default-client-key') }}"></script>
</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- MENU -->
    @include('customer.navbar')
 
    @yield('content')

    <!-- FOOTER -->
    @include('customer.footer')

    <!-- SCRIPTS -->
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function () {
        
            const snapToken = "{{ $enrollment[0]->snap_token ?? '' }}"; // Snap token dari server

            if (snapToken) {
                window.snap.pay(snapToken, {
                    onSuccess: function (result) {
                        // alert('Pembayaran berhasil!');
                        // console.log(result);

                        // Ambil ID kursus dari Blade
                        const order_id = "{{ $enrollment[0]->order_id ?? '' }}";

                        // Redirect ke rute paymentSuccess
                        window.location.href = `/customer/payment/course/success/${order_id}`;
                    },
                    onPending: function (result) {
                        // alert('Menunggu pembayaran!');
                        // console.log(result);
                    },
                    onError: function (result) {
                        // alert('Pembayaran gagal!');
                        // console.log(result);
                    }
                });
            } else {
                alert('Snap token is not available.');
            }
        };
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
        $(window).on('load', function() {
            $('.preloader').fadeOut('slow');
        });
    </script>
    <script src="{{ asset('landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('landing/js/smoothscroll.js') }}"></script>
    <script src="{{ asset('landing/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

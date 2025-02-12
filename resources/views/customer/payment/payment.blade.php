@extends('customer.index')

@section('content')

<section>
    <div class="d-flex justify-content-center align-items-center">
        <div class="w-75">
            <h1 class="text-center">Continue to Pay</h1>
            <div class="card border shadow-sm rounded-lg" style="padding: 0px 15px;">
                <style>
                    @media (min-width: 992px) {
                        .card {
                            padding: 0px 200px !important;
                        }
                    }
                </style>
                <div class="card-body">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Course:</strong> {{ $enrollment[0]->course->title }}</li>
                        <li class="list-group-item"><strong>Enrollment Date:</strong> {{ $enrollment[0]->enrollment_date }}</li>
                        <li class="list-group-item"><strong>Payment Status:</strong> 
                            <span class="badge bg-{{ $enrollment[0]->payment_status == 'success' ? 'success' : 'warning' }}">
                                {{ ucfirst($enrollment[0]->payment_status) }}
                            </span>
                        </li>
                        <li class="list-group-item"><strong>Discount Amount:</strong> Rp {{ number_format($enrollment[0]->discount_amount, 0, ',', '.') }}</li>
                        <li class="list-group-item"><strong>Total Price:</strong> Rp {{ number_format($enrollment[0]->total_price, 0, ',', '.') }}</li>
                        <li class="list-group-item"><strong>Udemy Coupon:</strong> {{ $enrollment[0]->udemy_coupon ? 'Yes' : 'No' }}</li>
                    </ul>

                    <div class="text-center mt-3">
                        @if($enrollment[0]->payment_status == 'pending')
                            <button id="pay-button" class="btn btn-primary">Pay Now</button>
                        @else
                            <button class="btn btn-success" disabled>Paid</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection



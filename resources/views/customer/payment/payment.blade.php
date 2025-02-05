@extends('customer.index')

@section('content')
{{-- @php
    dd($course);
@endphp --}}
<section>
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="w-75">
            <h1 class="text-center">Continue to Pay</h1>
            <div class="card border shadow-sm rounded-lg">
                <div class="card-body">
                    <h5 class="card-title">{{ $course[0]->title }}</h5>
                    <p class="card-text">{{ $course[0]->description }}</p>
                    
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Course:</strong> {{ $course[0]->course->title }}</li>
                        <li class="list-group-item"><strong>Enrollment Date:</strong> {{ $course[0]->enrollment_date }}</li>
                        <li class="list-group-item"><strong>Payment Status:</strong> 
                            <span class="badge bg-{{ $course[0]->payment_status == 'success' ? 'success' : 'warning' }}">
                                {{ ucfirst($course[0]->payment_status) }}
                            </span>
                        </li>
                        <li class="list-group-item"><strong>Discount Amount:</strong> Rp {{ number_format($course[0]->discount_amount, 0, ',', '.') }}</li>
                        <li class="list-group-item"><strong>Total Price:</strong> Rp {{ number_format($course[0]->total_price, 0, ',', '.') }}</li>
                        <li class="list-group-item"><strong>Udemy Coupon:</strong> {{ $course[0]->udemy_coupon ? 'Yes' : 'No' }}</li>
                    </ul>

                    <div class="text-center mt-3">
                        @if($course[0]->payment_status == 'pending')
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



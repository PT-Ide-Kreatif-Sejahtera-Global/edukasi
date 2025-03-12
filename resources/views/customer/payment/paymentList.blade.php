@extends('customer.index')

@section('content')

<div class="d-flex justify-content-center min-vh-100">
    <div class="container">
        <h1 class="mb-5">Payment List</h1>
        
        @if($payments->isEmpty())
            <div class="text-center text-muted py-3" style="margin: 200px 0px;">
                <em>No payment data available</em>
            </div>
        @else
            <div class="row d-flex justify-content-center">
                @foreach($payments as $payment)
                <div class="col-md-12 mb-4" style="margin: 40px 0px; border: solid 2px #6c757d; border-radius: 12px; padding: 10px;">
                    <div class="card h-100 border border-dark shadow-sm rounded-3 overflow-hidden">
                        <div class="card-header text-center fw-bold bg-light border-bottom border-dark">
                            Order ID: {{ $payment->order_id }}
                        </div>
                        <div class="card-body p-3 border-bottom border-dark">
                            <h5 class="card-title text-center border-bottom pb-2 border-dark">{{ $payment->course->title }}</h5>
                            <p class="card-text border-bottom pb-2 border-dark"><strong>Coupon:</strong> {{ $payment->coupon->cupon_code ?? ' - ' }}</p>
                            <p class="card-text border-bottom pb-2 border-dark"><strong>Enrolment Date:</strong> {{ $payment->enrollment_date }}</p>
                            <p class="card-text border-bottom pb-2 border-dark"><strong>Discount Amount:</strong> {{ $payment->discount_amount }}</p>
                            <p class="card-text border-bottom pb-2 border-dark"><strong>Total Price:</strong> {{ $payment->total_price }}</p>
                            <p class="card-text border-bottom pb-2 border-dark"><strong>Udemy Coupon:</strong> {{ $payment->udemy_coupon }}</p>
                            <p class="card-text text-center border border-dark p-2 rounded">
                                <strong>Payment Status:</strong> 
                                <span class="badge
                                    @if($payment->payment_status == 'success') bg-success 
                                    @elseif($payment->payment_status == 'canceled') bg-danger
                                    @else bg-warning text-dark @endif">
                                    {{ ucfirst($payment->payment_status) }}
                                </span>
                            </p>
                        </div>
                        <div class="card-footer text-center bg-light border-top border-dark">
                            <a href="payment/course/{{$payment->order_id}}" 
                                class="btn btn-sm 
                                @if($payment->payment_status == 'success' || $payment->payment_status == 'canceled') btn-secondary disabled 
                                @else btn-primary @endif">
                                {{ $payment->payment_status == 'success' ? 'Paid' : ($payment->payment_status == 'canceled' ? 'Canceled' : 'Pay') }}
                            </a>
                            
                            @if($payment->payment_status == 'pending')
                                <form action="{{ route('payment.cancel', $payment->order_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection

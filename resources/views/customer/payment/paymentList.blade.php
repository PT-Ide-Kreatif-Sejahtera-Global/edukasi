@extends('customer.index')

@section('content')

<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
        <h1 class="text-center mb-4">Payment List</h1>
        <div class="table-responsive border rounded">
            <table class="table table-bordered table-hover">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Order id</th>
                        <th>Course</th>
                        <th>Coupon</th>
                        <th>Enrolment Date</th>
                        <th>Discount Amount</th>
                        <th>Payment Status</th>
                        <th>Total Price</th>
                        <th>Udemy Coupon</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($payments->isEmpty())
                    <tr>
                        <td colspan="9" class="text-center text-muted py-3">
                            <em>No payment data available</em>
                        </td>
                    </tr>
                    @else
                    @foreach($payments as $payment)
                    <tr class="text-center">
                        <td>{{ $payment->order_id }}</td>
                        <td>{{ $payment->course->title }}</td>
                        <td>{{ $payment->coupon->cupon_code ?? ' - ' }}</td>
                        <td>{{ $payment->enrollment_date }}</td>
                        <td>{{ $payment->discount_amount }}</td>
                        <td>
                            <span class="badge 
                                @if($payment->payment_status == 'success') bg-success 
                                    @elseif($payment->payment_status == 'canceled') bg-danger
                                @else bg-warning text-dark @endif">
                                {{ ucfirst($payment->payment_status) }}
                            </span>
                        </td>
                        <td>{{ $payment->total_price }}</td>
                        <td>{{ $payment->udemy_coupon }}</td>
                        <td>
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
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

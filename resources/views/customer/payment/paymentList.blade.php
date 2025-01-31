@extends('customer.index')

@section('content')
    <div class="flex justify-center items-center min-h-screen">
        <div>
            <h1 class="text-center">payment list</h1>
            <div class="overflow-x-auto rounded-lg border border-gray-200">
                <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                    <thead class="ltr:text-left rtl:text-right">
                        <tr>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Course</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Coupon</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Enrolment date</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Discount Amount</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Payment Status</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Total Price</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Udemy Coupon</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Pay</th>
                        </tr>
                    </thead>
    
                    <tbody class="divide-y divide-gray-200">
                        @foreach($payments as $payment)
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $payment->course_id }}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $payment->coupon_id }}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $payment->enrollment_date }}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $payment->discount_amount }}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $payment->payment_status }}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $payment->total_price }}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $payment->udemy_coupon }}</td>
                            <td>
                                <a href="payment/course/{{$payment->course_id}}" @if($payment->payment_status == 'success') class="pointer-events-none opacity-50" @endif>
                                    <button @if($payment->payment_status == 'success') disabled @endif>
                                        @if($payment->payment_status == 'success') paid @else pay @endif
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
    
                </table>
            </div>
        </div>
    </div>
@endsection





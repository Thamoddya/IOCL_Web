@extends('Layouts.HomePageLayout')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Your Cart</h1>
        @if(count($cart) > 0)
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Price</th>
                    <th>Course No</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cart as $id => $details)
                    <tr>
                        <td>{{ $details['title'] }}</td>
                        <td>Rs.{{ number_format($details['price'], 2) }}</td>
                        <td>{{ $details['course_no'] }}</td>
                        <td>{{ $details['quantity'] }}</td>
                        <td>Rs.{{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" onclick="startPayment()">Checkout</button>
            </div>
        @else
            <div class="alert alert-info">
                Your cart is empty.
            </div>
        @endif
    </div>

    <script>

        function startPayment() {
            $.ajax({
                url: "{{ route('cart.checkout') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function (data) {
                    console.log(data);

                    payhere.onCompleted = function onCompleted(orderId) {
                        console.log("OrderID:" + orderId);
                        console.log(data.itemData);
                        $.ajax({
                            url: "{{ route('payment.store') }}",
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                order_id: orderId,
                                courses: data.itemData, // Include the array of courses
                            },
                            success: function (response) {
                                if(response.message == "success") {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Payment Successful',
                                        text: 'Thank you for your purchase!',
                                    }).then(() => {
                                        window.location.href = "{{ route('student.dashboard') }}";
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Payment Failed',
                                        text: 'An error occurred while processing your payment. Please try again later.',
                                    });
                                }
                            },
                            error: function (xhr, status, error) {
                                console.error("Failed to store transaction and enrollment:", status, error);
                                console.log("---------------------------")
                                console.log("XHR :"+ JSON.stringify(xhr))
                                console.log("---------------------------")
                            }
                        });
                    };

                    payhere.onDismissed = function onDismissed() {
                        console.log("Payment dismissed");
                    };

                    payhere.onError = function onError(error) {
                        console.log("Error:" + error);
                    };

                    var payment = {
                        "sandbox": true,
                        "merchant_id": data.merchant_id,
                        "return_url": "http://localhost:8000/cart",
                        "cancel_url": "http://localhost:8000/cart",
                        "notify_url": "http://sample.com/notify",
                        "order_id": data.order_id,
                        "items": data.items,
                        "amount": data.amount,
                        "currency": data.currency,
                        "hash": data.hash,
                        "first_name": data.first_name,
                        "last_name": data.last_name,
                        "email": data.email,
                        "phone": data.phone,
                        "address": data.address,
                        "city": data.city,
                        "country": data.country,
                        "delivery_address": data.address,
                        "delivery_city": data.city,
                        "delivery_country": data.country,
                        "itemData": data.itemData
                    };
                    console.log(payment);
                    payhere.startPayment(payment);
                },
                error: function (xhr, status, error) {
                    console.error("AJAX request failed:", status, error);
                }
            });
        }
    </script>
@endsection

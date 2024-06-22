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
                <button class="btn btn-primary" onclick="startPayment()">Proceed to Checkout</button>
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
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function (data) {
                    console.log(data.hash)

                    payhere.onCompleted = function onCompleted(orderId) {
                        console.log("Payment completed. OrderID:" + orderId);
                    };
                    payhere.onDismissed = function onDismissed() {
                        console.log("Payment dismissed");
                    };
                    payhere.onError = function onError(error) {
                        console.log("Error:" + error);
                    };
                    var payment = {
                        "sandbox": true,
                        "merchant_id": `1224284`,
                        "return_url": undefined,
                        "cancel_url": undefined,
                        "notify_url": "http://sample.com/notify",
                        "order_id": data.order_id,
                        "items": `${data.items}`,
                        "amount": `${data.amount}`,
                        "currency": `${data.currency}`,
                        "hash": `${data.hash}`,
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
                    };
                    payhere.startPayment(payment);

                },
                error: function (xhr, status, error) {
                    console.error("AJAX request failed:", status, error);
                }
            });

        }
    </script>
@endsection

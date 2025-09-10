<x-layout>
    <x-slot:title>
        Store Orderpage
    </x-slot:title>
    @auth
        <x-slot:userName>
            {{ $user->first_name }} {{ $user->last_name }}
        </x-slot:userName>
    @endauth
    <div class="container px-4 px-lg-5 my-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('orders.store') }}">
            @csrf
            <div class="mb-3">
                <h3>Please Enter the order details</h3>
            </div>
            <div class="mb-3">
                <label class="form-label" for="">Total Price</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" 
                    type="number" name="total_price" value="{{ $totalPrice }}" readonly>
                    <span class="input-group-text">.00</span>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="">Date</label>
                <input class="form-control" type="date" name="order_date" value="{{ old('order_date') }}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="">Address</label>
                <input class="form-control" type="text" name="address" value="{{ old('address') }}">
            </div>
            <button class="mt-3 btn btn-outline-success">Buy</button>
    </div>
</x-layout>

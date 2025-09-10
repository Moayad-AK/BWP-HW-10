<x-layout>
    <x-slot:title>
        Store CartItemspage
    </x-slot:title>
    @auth
        <x-slot:userName>
            {{ $user->first_name }} {{ $user->last_name }}
        </x-slot:userName>
    @endauth
    <section class="py-2">
        <div class="container mt-5">
            @auth
                @foreach ($cartItems as $cartItem)
                    <div class="card mb-3" style="max-width: 77%;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="images/post-image1.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $cartItem->product->title }}</h4>
                                    <p class="card-text">The price ${{ $cartItem->product->price }} <br>
                                        The quantity {{ $cartItem->quantity }}</p>

                                    <p class="card-text">
                                        <small class="text-muted">
                                            {{ $cartItem->updated_at === null ? now() : $cartItem->updated_at->toDayDateTimeString() }}
                                        </small>
                                    </p>
                                    <form action="/cartitems" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="product_id" value="{{ $cartItem->product->id }}">
                                        {{-- <input type="hidden" name="user_id" value="{{ $user->id }}"> --}}
                                        <button class="btn btn-outline-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="text-center my-3">
                    {{-- @dd($user->cartItems) --}}
                    {{-- @dd($cartItems) --}}
                    @if ($cartItems !== null)
                        <a href="{{ route('orders.create') }}" class="btn btn-outline-secondary btn-lg">Check Out</a>
                    @else
                        <div class="alert alert-warning" role="alert">
                            There are any product in the cart
                            <a href="{{ route('products.index') }}" class="alert-link">Home Page</a>
                            . Go to the products page if you like.
                        </div>
                    @endif
                    {{-- @cannot('check-out')
                        <a href="{{ route('orders.create') }}" class="btn btn-outline-secondary btn-lg">Check Out</a>
                    @endcannot
                    @empty($cartItems)
                        <div class="alert alert-warning" role="alert">
                            There are any product in the cart
                            <a href="{{ route('products.index') }}" class="alert-link">Home Page</a>
                            . Go to the products page if you like.
                        </div>
                    @endempty --}}
                </div>
            @endauth
        </div>
    </section>
</x-layout>

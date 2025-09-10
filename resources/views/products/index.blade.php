<x-layout>
    <x-slot:title>
        Store Homepage
    </x-slot:title>
    @auth
        <x-slot:userName>
            {{ $user->first_name }} {{ $user->last_name }}
        </x-slot:userName>
        {{-- <x-slot:cartItemsCount>
    </x-slot:cartItemsCount> --}}
    @endauth
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">My Website</h1>
                <p class="lead fw-normal text-white-50 mb-0">Welcome to our online store</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-2">
        <div class="container mt-5">
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h5 class="text-center">{{ session('message') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            {{-- Add product  --}}
            {{-- @if ($user->admin === 1) --}}
            @can('create-product')
                <div class="text-center mb-4">
                    <a href="{{ route('products.create') }}" class="btn btn-outline-success" role="button">Add Product</a>
                </div>
            @endcan
            {{-- @endif --}}
            <div class="row gx-4 gx-lg-5 row-cols-3 row-cols-md-3 row-cols-xl-3 justify-content-center">
                
                @foreach ($products as $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="/images/{{ $product->image }}" alt="{{ $product->image }}"/>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $product->title }}</h5>
                                    <!-- Product price-->
                                    ${{ $product->price }}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-secondary m-1" style="display: inline;"
                                        href="{{ route('products.show', $product->id) }}">View</a>
                                    @auth
                                        <form action="/cartitems" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <button class="btn btn-outline-dark m-1">Add to cart</button>
                                        </form>
                                    @endauth
                                    @can('edit-product', $product)
                                        <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger m-1">Delete</button>
                                        </form>
                                    @endcan


                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
            <div>
                {{ $products->links() }}
            </div>
        </div>
    </section>
</x-layout>

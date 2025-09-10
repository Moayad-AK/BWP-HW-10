<x-layout>
    <x-slot:title>
        Store Showpage
    </x-slot:title>
    @auth
        <x-slot:userName>
            {{ $user->first_name }} {{ $user->last_name }}
        </x-slot:userName>
    @endauth
    <!-- Product section -->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            {{-- Edit product  --}}
            @can('edit-product', $product)
                <div class="text-center mb-4">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-info" role="button">Edit
                        Product</a>
                </div>
            @endcan
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <img class="card-img-top" src="/images/{{ $product->image }}" alt="{{ $product->image }}"/>
                </div>
                <div class="col-md-6">

                    <h1 class="display-5 fw-bolder">{{ $product->title }}</h1>
                    <div class="fs-5 mb-5">
                        {{-- <span class="text-decoration-line-through">$45.00</span> --}}
                        <span>${{ $product->price }}</span>
                    </div>
                    <p class="lead">
                        {{ $product->description }}
                    </p>
                    @auth
                        <div class="d-flex">
                            <form action="/cartitems" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <input class="form-control text-center me-3" id="inputQuantity" name="quantity" type="num"
                                    value="1" style="max-width: 3rem" />
                                <button class="btn btn-outline-dark flex-shrink-0">
                                    Add to cart
                                </button>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </section>
</x-layout>

<x-layout>
    <x-slot:title>
        Store Editpage
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
        {{-- @dd($product) --}}
        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label" for="">Title</label>
                <input class="form-control" type="text" name="title" value="{{ $product->title }}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="">Price</label>
                <input class="form-control" type="number" name="price" value="{{ $product->price }}">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Image for product</label>
                <input class="form-control" type="file" id="formFile" name="image" value="{{ $product->image }}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="">Description</label>
                <textarea class="form-control" name="description" cols="" rows="3">{{ $product->description }}</textarea>
            </div>
            <button class="mt-3 btn btn-outline-primary">Update</button>
    </div>
</x-layout>

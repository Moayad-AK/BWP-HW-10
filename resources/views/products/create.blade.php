<x-layout>
    <x-slot:title>
        Store Createpage
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
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="">Title</label>
                <input class="form-control" type="text" name="title" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="">Price</label>
                <input class="form-control" type="number" name="price" value="{{ old('price') }}">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Image for product</label>
                <input class="form-control" type="file" id="formFile" name="image" value="{{ old('image') }}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="">Description</label>
                <textarea class="form-control" name="description" cols="" rows="3">{{ old('description') }}</textarea>
            </div>
            <button class="mt-3 btn btn-outline-success">Submit</button>
    </div>
</x-layout>

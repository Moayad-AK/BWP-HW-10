<x-layout>
    <x-slot:title>
        Store LogInpage
    </x-slot:title>
    <div class="container px-4 px-lg-5 my-5">
        <div class="row justify-content-center">
            <div class="col-6 align-self-center text-center ">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <main class="form-signin">
                    <form method="POST" action="/login">
                        @csrf
                        <h1 class="h3 mb-3 fw-normal">Please Log In</h1>
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control" id="floatingInput"
                                placeholder="name@example.com" value="{{ old('email') }}" required>
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="floatingPassword"
                                placeholder="Password" required>
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="w-100 btn btn-lg btn-outline-primary" type="submit">Log In</button>
                        
                        <!-- Login with Google button -->
                        <div class="mt-3">
                            <a href="{{ route('google.redirect') }}" class="w-100 btn btn-lg" style="background-color: #dc3545; color: white; text-decoration: none; border: none;">Login with Google</a>
                        </div>
                        
                        <p class="mt-5 mb-3 text-muted">© 2024–2025</p>
                    </form>
                </main>
            </div>

        </div>
    </div>
</x-layout>

<x-layout>
    <x-slot:title>
        Store Registerpage
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
                    <form method="POST" action="/register">
                        @csrf
                        <h1 class="h3 mb-3 fw-normal">Please Register</h1>

                        <div class="form-floating">
                            <input type="text" name="first_name" class="form-control" id="floatingInput"
                                placeholder="First Name" required>
                            <label for="floatingInput">First Name</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="last_name" class="form-control" id="floatingInput"
                                placeholder="Last Name" required>
                            <label for="floatingInput">Last Name</label>
                        </div>
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control" id="floatingInput"
                                placeholder="name@example.com" required>
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="floatingPassword"
                                placeholder="Password" required>
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password_confirmation" class="form-control"
                                id="floatingPassword" placeholder="Password" required>
                            <label for="floatingPassword">Confirm Password</label>
                        </div>
                        <button class="w-100 btn btn-lg btn-outline-primary mt-5" type="submit">Register</button>
                        <p class="mt-5 mb-3 text-muted">© 2024–2025</p>
                    </form>
                </main>
            </div>

        </div>
    </div>
</x-layout>

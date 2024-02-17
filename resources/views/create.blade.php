@extends('layouts.app')

@section('content')
    <div class="login-form-bg" style="min-height: 100vh">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-6 my-5">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">

                                <a class="text-center" href="index.html">
                                    <h4>New User</h4>
                                </a>

                                <form class="mt-5 mb-5 login-input" method="POST" action={{ route('user.store') }}>
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name" name="name" required>
                                    </div>
                                    @error('email')
                                    <small>
                                        {{ $message }}
                                    </small>
                                    @enderror
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                                    </div>
                                    <button class="btn login-form__btn submit w-100">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

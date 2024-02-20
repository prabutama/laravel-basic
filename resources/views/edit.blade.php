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
                                    <h4>Edit User : {{ $user->id }}</h4>
                                </a>

                                <form class="mt-5 mb-5 login-input" method="POST" enctype="multipart/form-data"
                                    action={{ route('user.update', ['id' => $user->id]) }}>
                                    @csrf
                                    @method('PUT')
                                    @error('photo')
                                        <small>
                                            {{ $message }}
                                        </small>
                                    @enderror
                                    <label for="photo">Profil Photo</label>
                                    <div>
                                        <img src="{{ asset('/storage/photo-users/' . $user->image) }}" height="40"
                                            width="40" alt="" class="rounded-circle">
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="photo" required>
                                    </div>
                                    @error('name')
                                        <small>
                                            {{ $message }}
                                        </small>
                                    @enderror
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name" name="name"
                                            required value="{{ $user->name }}">
                                    </div>
                                    @error('email')
                                        <small>
                                            {{ $message }}
                                        </small>
                                    @enderror
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email" name="email"
                                            required value="{{ $user->email }}">
                                    </div>
                                    @error('password')
                                        <small>
                                            {{ $message }}
                                        </small>
                                    @enderror
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password">
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

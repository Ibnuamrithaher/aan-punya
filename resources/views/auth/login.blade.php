@extends('layouts.auth')

@section('content')
@if (session()->has('succes'))
  <div class="alert alert-primary alert-dismissible fade show" role="alert">
    {{ session()->get('succes') }}
  </div>
@endif
<!-- Outer Row -->
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image">
                        <img src="{{ asset('logo_foging.jpeg') }}" width="100%" height="100%" alt="">
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">SPK Penentuan Titik Foging</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('login.authenticate') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control form-control-user"
                                        aria-describedby="emailHelp"
                                        placeholder="Masukkan Email Anda..." required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user"
                                        id="password" placeholder="Password" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block text-bold">Login</button>
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ Route('registrasi.create') }}">Buat Akun!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection






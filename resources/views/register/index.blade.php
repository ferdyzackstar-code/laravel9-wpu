@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-5">

    <main class="form-registration">
        <h1 class="h3 mb-3 fw-normal">Registration Form</h1>

    <form action="/register" method="POST">
        @csrf
    <div class="form-floating">
        <input
        type="text"
        name="name"
        class="form-control rounded-top @error('name') is-invalid @enderror"
        id="name"
        placeholder="Name..."
        />
        <label for="name">Name</label>
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-floating">
        <input
        type="text"
        name="username"
        class="form-control"
        id="username"
        placeholder="username..."
        />
        <label for="username">Username</label>
    </div>
    <div class="form-floating">
        <input
        type="email"
        name="email"
        class="form-control"
        id="email"
        placeholder="name@example.com"
        />
        <label for="email">Email address</label>
    </div>
    <div class="form-floating">
        <input
        type="password"
        name="password"
        class="form-control rounded-bottom"
        id="password"
        placeholder="Password"
        />
        <label for="password">Password</label>
    </div>
    <button class="btn btn-primary w-100 py-2 mt-3" type="submit">
        Register
    </button>
    </form>
    <small class="d-block mt-3 text-center">
    Already registered? <a href="/login">Login!</a>
    </small>
    </main>

    </div>
</div>

@endsection
@extends('layouts.guest')
@section('title', 'Login')
@section('content')
    <h1>Login</h1>

    @if (session('error'))
        <div style="color:red">{{ session('error') }}</div>
    @endif

    <form action="{{ route('login.process') }}" method="POST">
        @csrf
        <label>Username</label><br>
        <input type="text" name="username" required><br>

        <label>Password</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
@endsection
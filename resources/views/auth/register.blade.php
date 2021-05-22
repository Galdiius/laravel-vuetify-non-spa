@extends('template/header')

@section('content')
<h1 class="text-center">Register</h1>
<v-row justify="center" align="center" class="mt-3">
    <v-col lg="3" align-items="center">
        <form action="/register" method="post">
            @csrf
            <v-text-field label="Username" name="username" outlined @error('username') error-messages="{{ $message }}" @enderror value="{{ old('username') }}" ></v-text-field>
            <v-text-field label="Email" name="email" outlined @error('email') error-messages="{{ $message }}" @enderror value="{{ old('email') }}" ></v-text-field>
            <v-text-field type="password" label="Password" name="password" outlined @error('password') error-messages="{{ $message }}" @enderror></v-text-field>
            <v-text-field type="password" label="Confirm password" name="confirmPassword" outlined outlined @error('confirmPassword') error-messages="{{ $message }}" @enderror></v-text-field>
            <div class="text-center">
                <v-btn class="text-center" type="submit" color="success">Register</v-btn>
            </div>
            <v-btn  text color="primary" href="/login">Login</v-btn>
        </form>
    </v-col>
</v-row>
@endsection
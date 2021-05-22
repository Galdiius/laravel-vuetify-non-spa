@extends('template/header')

@section('content')
@if(session('status'))
    <v-row justify="center">
        <v-col lg="3">
            <v-alert type="success">{{session('status')}}</v-alert>
        </v-col>
    </v-row>
@endif
@if(session('error'))
    <v-row justify="center">
        <v-col lg="3">
            <v-alert type="error">{{session('error')}}</v-alert>
        </v-col>
    </v-row>
@endif
<h1 class="text-center">Login</h1>
<v-row justify="center" align="center" class="mt-3">
        <v-col lg="3" align-items="center">
            <form action="/login" method="post">
                @csrf
                <v-text-field label="Email" name="email" outlined @error('email') error-messages="{{ $message }}" @enderror value="{{ old('email') }}"></v-text-field>
                <v-text-field type="password" label="Password" name="password" outlined @error('password') error-messages="{{ $message }}" @enderror></v-text-field>
                <div class="text-center">
                    <v-btn class="text-center" type="submit" color="success">Login</v-btn>
                </div>
                <v-btn text color="primary" href="/register">Register</v-btn>
            </form>
        </v-col>
    </v-row>
@endsection
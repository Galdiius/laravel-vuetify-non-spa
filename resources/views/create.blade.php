@extends('template/header')

@section('content')
<h1 class="mb-4">Create post</h1>
<form action="/create" method="post" enctype="multipart/form-data">
    @csrf
    <v-row>
        <v-col lg="4">
                @if(session('status'))
                    <v-alert type="success">{{ session('status') }}</v-alert>
                @endif
                <v-text-field @error('title') error-messages="{{ $message }}" @enderror value="{{ old('title') }}" label="Title" outlined name="title" class="input"></v-text-field>
                <v-select label="Category" @error('category') error-messages="{{ $message }}"  @enderror :items="['Education','Tips']" value="{{old('category')}}" name="category" class="input" outlined></v-select>
                <v-file-input outlined id="img" label="Choose image" name="image" value="{{ old('image') }}" class="input" @error('image') error-messages="{{ $message }}" @enderror></v-file-input>
                <v-img id="image" @change="img()"></v-img>
                <v-textarea label="Content" outlined name="body" value="{{ old('body') }}" class="input" @error('body') error-messages="{{ $message }}" @enderror></v-textarea>
                <v-btn color="success" type="submit">Submit</v-btn>
            </v-col>
        </v-row>
    </form>
@endsection
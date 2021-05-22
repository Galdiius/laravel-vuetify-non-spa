@extends('template/header')

@section('content')
<h1 class="mb-4">Update post</h1>
<form action="/update/{{ $article->id }}" method="post" enctype="multipart/form-data">
    @csrf
    <v-row>
        <v-col lg="4">
                @if(session('message'))
                    <v-alert type="success">{{ session('message') }}</v-alert>
                @endif
                <input type="hidden" name="oldImage" value="{{ $article->image }}">
                <v-text-field @error('title') error-messages="{{ $message }}" @enderror value="{{ $article->title }}" label="Title" outlined name="title" class="input"></v-text-field>
                <v-select label="Category" @error('category') error-messages="{{ $message }}"  @enderror :items="['Education','Tips']" value="{{ $article->category }}" name="category" class="input" outlined></v-select>
                <label for="img">Image :</label>
                <v-img src="../img/{{ $article->image }}" id="img" class="mb-2"></v-img>
                <v-file-input outlined id="img" label="Choose image" messages="input the file if you want to change the image" name="image" class="input" @error('image') error-messages="{{ $message }}" @enderror></v-file-input>
                <v-textarea label="Content" class="mt-2" outlined name="body" value="{{ $article->body }}" class="input" @error('body') error-messages="{{ $message }}" @enderror></v-textarea>
                <v-btn color="success" type="submit">Update</v-btn>
            </v-col>
        </v-row>
    </form>
@endsection
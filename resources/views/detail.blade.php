@extends('template/header')

@section('content')
    <v-row style="background: rgba(255, 255, 255, 0.3)" class="my-auto mx-auto">
        <v-col class="text-center" cols="12">
            <h1 class="white--text">{{ $article->title }}</h1>
        </v-col>
        <v-col cols="12" align-self="center">
            <v-img class="mx-auto" width="80%" src="../img/{{$article->image}}" >
        </v-col>
        <v-col cols="12" align-self="center">
            <v-container>
                <p>{{ $article->body }}</p>
            </v-container>
        </v-col>
    </v-row>
@endsection
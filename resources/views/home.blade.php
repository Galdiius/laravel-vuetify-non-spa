@extends('template/header')

@section('content')
    <v-row justify="center">
        <v-col lg="3">
            @if (session('status'))
                <v-alert type="success">{{ session('status') }}</v-alert>
            @endif
        </v-col>
    </v-row>
    
    <h1 class="mb-5">All post</h1>
    <v-row>
        @forelse ($articles as $article)
            <v-col lg="3">
                <v-card class="" max-width="400">
                    <v-img class="white--text align-end" height="200px" src="img/{{$article->image}}" >
                    <v-card-title class="secondary">{{ $article->title }}</v-card-title>
                    </v-img>
            
                    <v-card-subtitle class="pb-0">
                        {{ $article->category }}
                    </v-card-subtitle>
            
                    <v-card-text class="text--primary">
                    <p class="caption">{{ $article->created_at }}</p>
            
                    <div>{{ Str::limit($article->body,50) }} <br> 
                        <v-btn left href="/detail/{{ $article->slug }}" text x-small color="primary">see more</v-btn>
                    </div>
                    </v-card-text>
                    <v-card-actions>
                        <dialog-component :article="{{ json_encode($article) }}"></dialog-component>
                        <v-btn text color="success" href="/update/{{ $article->slug }}">Update</v-btn>
                    </v-card-actions>
                </v-card>
            </v-col>
        @empty
            <v-row justify="center">
                <v-col cols="12" class="text-center">
                    <h1 class="text--disabled font-weight-thin">No posts</h1>
                </v-col>
            </v-row>
            
        @endforelse
    </v-row>
@endsection
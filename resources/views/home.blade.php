@extends('blog')

@section('title')
    {{$title}}
@endsection

@section('content')

    @if ( !$posts->count() )
        There is no post till now. Login and write a new post now!!!
    @else
        <div class="">
            @foreach( $posts as $post )

                <div class="column is-full-desktop">
                    <h1 class="blog-timestamp">
                        {{ $post->hummans_date }}
                    </h1>
                    <h1 class="blog-title">
                        {{ $post->title }}
                    </h1>
                    <h2 class="blog-summary">
                        {{ substr($post->sumary, 0, 200) }}
                        ...
                        <a style="font-weight: bold; font-size: 13px;" href="{{url($post->slug) }}"> Leia Mais </a>
                    </h2>
                    <div style="text-align: right;">
                        por {{ $post->author->name }}
                    </div>
                </div>
            @endforeach
            {!! $posts->render() !!}
        </div>
    @endif

@endsection
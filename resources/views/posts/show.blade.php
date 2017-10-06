<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Post - Free Bulma template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" id="bulma" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.2/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/blog-post.css">
</head>
<body>
<div class="container">

    <nav class="nav section" id="top">
        <div class="nav-left">
            <a class="nav-item">
                <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma logo">
            </a>
        </div>

        <div class="nav-center">
            <a class="nav-item">
          <span class="icon">
            <i class="fa fa-github"></i>
          </span>
            </a>
            <a class="nav-item">
          <span class="icon">
            <i class="fa fa-twitter"></i>
          </span>
            </a>
        </div>

        <!-- This "nav-toggle" hamburger menu is only visible on mobile -->
        <!-- You need JavaScript to toggle the "is-active" class on "nav-menu" -->
        <span class="nav-toggle">
        <span></span>
        <span></span>
        <span></span>
      </span>

        <!-- This "nav-menu" is hidden on mobile -->
        <!-- Add the modifier "is-active" to display it on mobile -->
        <div class="nav-right nav-menu">
            <a class="nav-item">
                Home
            </a>
            {{--<a class="nav-item">--}}
                {{--Documentation--}}
            {{--</a>--}}
            {{--<a class="nav-item">--}}
                {{--Blog--}}
            {{--</a>--}}

            {{--<span class="nav-item">--}}
          {{--<a class="button" >--}}
            {{--<span class="icon">--}}
              {{--<i class="fa fa-twitter"></i>--}}
            {{--</span>--}}
            {{--<span>Tweet</span>--}}
          {{--</a>--}}
          {{--<a class="button is-primary">--}}
            {{--<span class="icon">--}}
              {{--<i class="fa fa-download"></i>--}}
            {{--</span>--}}
            {{--<span>Download</span>--}}
          {{--</a>--}}
        </span>
        </div>
    </nav>

    <section class="hero is-primary is-medium">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title is-2">
                    {!! $post->title !!}
                </h1>
                {{--<h2 class="subtitle is-4">--}}
                    {{--Blog post subtitle--}}
                {{--</h2>--}}
            </div>
        </div>
    </section>

    <section class="section blog">
        <div class="container">
            <div class="columns is-mobile">
                <div class="column is-8 is-offset-2">
                    <div class="content blog-post section">
                        <p class="has-text-right has-text-muted">{{ $post->hummans_date }}</p>
                        {!! $post->body !!}
                    </div>
                    <div class="card is-fullwidth">
                        <header class="card-header">
                            <p class="card-header-title">
                                About the author
                            </p>
                            <a class="card-header-icon" href="#top">
                                <i class="fa fa-angle-up"></i>
                            </a>
                        </header>
                        <div class="card-content">
                            <article class="media">
                                <div class="media-left">
                                    <figure class="image is-64x64">
                                        <img src="http://placehold.it/128x128" alt="Image">
                                    </figure>
                                </div>
                                <div class="media-content">
                                    <div class="content">
                                        <p>
                                            <strong>John Smith</strong> <small>@johnsmith</small>
                                            <br>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                                        </p>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <footer class="card-footer">
                            <a class="card-footer-item">Share on Facebook</a>
                            <a class="card-footer-item">Share on Twitter</a>
                            <a class="card-footer-item">Share on G+</a>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<footer class="footer">
    <div class="container">
        <div class="content has-text-centered">
            <p>
                <strong>Bulma</strong> by <a href="http://jgthms.com">Jeremy Thomas</a>. The source code is licensed
                <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
                is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC ANS 4.0</a>.
            </p>
            <p>
                <a class="icon" href="https://github.com/jgthms/bulma">
                    <i class="fa fa-github"></i>
                </a>
            </p>
        </div>
    </div>
</footer>
</body>
</html>




@section('title')
    @if($post)
        {!! $post->title !!}
        @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
            <button class="btn" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit Post</a></button>
        @endif
    @else
        Page does not exist
    @endif
@endsection

@section('title-meta')
    <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a></p>
@endsection

@section('content')

    @if($post)
        {!! $post->title !!}
        @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
            <button class="btn" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit Post</a></button>
        @endif
    @else
        Page does not exist
    @endif

    @if($post)
        <div>
            {!! $post->body !!}
        </div>
        <div>
            <h2>Leave a comment</h2>
        </div>
        @if(Auth::guest())
            <p>Login to Comment</p>
        @else
            <div class="panel-body">
                <form method="post" action="/comment/add">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="on_post" value="{{ $post->id }}">
                    <input type="hidden" name="slug" value="{{ $post->slug }}">
                    <div class="form-group">
                        <textarea required="required" placeholder="Enter comment here" name = "body" class="form-control"></textarea>
                    </div>
                    <input type="submit" name='post_comment' class="btn btn-success" value = "Post"/>
                </form>
            </div>
        @endif

        <div>
            @if($comments)
                <ul style="list-style: none; padding: 0">
                    @foreach($comments as $comment)
                        <li class="panel-body">
                            <div class="list-group">
                                <div class="list-group-item">
                                    <h3>{{ $comment->author->name }}</h3>
                                    <p>{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</p>
                                </div>
                                <div class="list-group-item">
                                    <p>{{ $comment->body }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    @else
        404 error
    @endif

@endsection
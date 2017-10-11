@extends('layouts.app')

@section('title')
    Edit Post
@endsection

@section('content')

    <div class="hero-body">
        <div class="container">
            <form method="post" action='{{ url("/update") }}'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="post_id" value="{{ $post->id }}{{ old('post_id') }}">
                <div class="form-group">
                <label for="title">Titulo:</label>
                    <input required="required" placeholder="Titulo" type="text" name = "title" class="form-control" value="@if(!old('title')){{$post->title}}@endif{{ old('title') }}"/>
                </div>
                <div class="form-group">
                <label for="sumary">Sumário:</label>
                    <input required="required" placeholder="Sumário" type="text" name = "sumary" class="form-control" value="@if(!old('sumary')){{$post->sumary}}@endif{{ old('sumary') }}"/>
                </div>
                <div class="form-group">
                <label for="email">Texto:</label>
                <textarea name='body'class="form-control" id="summernote">
                    @if(!old('body'))
                        {!! $post->body !!}
                    @endif
                    {!! old('body') !!}
                </textarea>
                </div>
<div class="field">
@if($post->active == '1')
    <input id="active" type="checkbox" name="active" class="switch" checked="checked">
@else
    <input id="active" type="checkbox" name="active" class="switch">
@endif
  <label for="active">Switch example</label>
</div>
<div class="botoes">
                @if($post->active == '1')
                    <input type="submit" name='publish' class="btn btn-success" value = "Update"/>
                @else
                    <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
                @endif
                <a href="{{  url('delete/'.$post->id.'?_token='.csrf_token()) }}" class="btn btn-danger">Delete</a>
</div>
            </form>
        </div>
    </div>        
@endsection
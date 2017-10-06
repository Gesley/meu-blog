@extends('layouts.app')

@section('title')
    Add New Post
@endsection

@section('content')

    <div class="hero-body">
        <div class="container">
            <form action="/new-post" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                <label for="title">Titulo:</label>
                    <input required="required" value="{{ old('title') }}" placeholder="Titulo" type="text" name = "title"class="form-control" />
                </div>
                <div class="form-group">
                <label for="sumary">Sumário:</label>
                    <input required="required" value="{{ old('sumary') }}" placeholder="Sumário" type="text" name = "sumary"class="form-control" />
                </div>
                <div class="form-group">
                <label for="body">Texto:</label>
                    <textarea name='body'class="form-control" id="summernote">{{ old('body') }}</textarea>
                </div>
                <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
                <input type="submit" name='save' class="btn btn-default" value = "Save Draft" />
            </form>
        </div>
    </div>
@endsection
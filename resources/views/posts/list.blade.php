@extends('layouts.app')

@section('title')
    Add New Post
@endsection

@section('content')

  <div class="hero-body">
    <div class="container">

    
      <table class="table">
        <thead>
          <tr>
            <th><abbr title="Position">Código</abbr></th>
            <th>Titulo</th>
            <th>Criado em</th>
            <th>Editar</th>
            <th>Deletar</th>
          </tr>
        </thead>
        
        @foreach ($posts as $post)
        <tbody>
          <td>{{ $post->id }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->created_at }}</td>
          <td><a href="edit/{{ $post->id }}" class="fa fa-pencil-square-o"></a></td>
          <td><a href="delete/{{ $post->id }}" class="delete is-small" onclick="return confirm('Tem certeza?')"></a></td>
        </tbody>
        @endforeach
      </table>
    </div>
  </div>  

@endsection
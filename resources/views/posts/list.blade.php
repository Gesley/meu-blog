@extends('layouts.app')

@section('title')
    Add New Post
@endsection

@section('content')

  <div class="hero-body">
    <div class="container">

    
      <table class="table is-bordered is-striped is-narrow is-fullwidth">
        <thead>
          <tr>
            <th>Código</th>
            <th>Titulo</th>
            <th>Status</th>
            <th>Criado em</th>
            <th>Editar</th>
            <th>Deletar</th>
          </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Código</th>
            <th>Titulo</th>
            <th>Status</th>
            <th>Criado em</th>
            <th>Editar</th>
            <th>Deletar</th>
          </tr>
        </tfoot>
        
        @foreach ($posts as $post)
        <tbody>
          <td>{{ $post->id }}</td>
          <td>{{ $post->title }}</td>
          <td>
            @if ($post->active > 0 ) 
              <span class="tag is-success">Ativo</span>
            @else
              <span class="tag is-warning">Inativo</span>
            @endif          
          </td>
          <td>{{ $post->created_at }}</td>
          <td style="text-align=center"><a href="edit/{{ $post->slug }}" class="fa fa-pencil-square-o"></a></td>
          <td style="text-align=center"><a href="delete/{{ $post->id }}" class="delete is-small" onclick="return confirm('Tem certeza?')"></a></td>
        </tbody>
        @endforeach
      </table>
    </div>
  </div>  

@endsection
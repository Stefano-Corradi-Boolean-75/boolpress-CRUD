@extends('layouts.app')

@section('title')
    | Admin
@endsection

@section('content')
<div class="container">

    <h1 class="my-5">Elenco di post</h1>

    @if (session('deleted'))
        <div class="alert alert-success" role="alert">
            {{session('deleted')}}
        </div>
    @endif



    <table class="table">
        <thead>
          <tr>
            <th scope="col"> Categoria </th>
            <th scope="col">Post</th>
          </tr>
        </thead>
        <tbody>

            @forelse ($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>
                    <ul>
                        @foreach ($category->posts as $post)
                            <li>
                                <a href="{{route('admin.posts.show', $post)}}">{{$post->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </td>

            </tr>
            @empty

                <tr>
                    <td colspan="4"><h3>Nessun risultato trovato</h3></td>
                </tr>

            @endforelse

        </tbody>
      </table>




</div>
@endsection

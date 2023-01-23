@extends('layouts.app')

@section('title')
    | Admin
@endsection

@section('content')
<div class="container">

    <h1 class="my-5">Gestione Categorie</h1>

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif

    <div class="w-50"">
        <form  action="{{route('admin.categories.store')}}" method="POST">
            @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Nuova categoria">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                            <i class="fa-solid fa-circle-plus"></i>
                            Add</button>
                    </div>

        </form>
    </div>

    <table class="table w-50">
        <tr>
            <th scope="col">Categoria</th>
            <th scope="col">Post Count</th>
        </tr>




        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td class="d-flex">
                        <form action="{{route('admin.categories.update', $category)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input class="border-0" type="text" name="name" value="{{$category->name}}">
                            <button type="submit" class="btn btn-warning me-3">UPDATE</button>
                        </form>

                        @include('admin.partials.form-delete',[
                            'route' => 'categories',
                            'message' => "Confermi l'eliminazione della categoria: $category->name ?",
                            'entity' => $category
                        ])

                    </td>
                    <td>{{count($category->posts)}}</td>
                </tr>
            @endforeach

        </tbody>

    </table>






</div>
@endsection

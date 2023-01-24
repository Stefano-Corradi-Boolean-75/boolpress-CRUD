@extends('layouts.app')

@section('title')
    | Admin
@endsection

@section('content')
<div class="container">

    <h1 class="my-5">Gestione Tags</h1>

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif

    <div class="w-50"">
        <form  action="{{route('admin.tags.store')}}" method="POST">
            @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Nuovo tag">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                            <i class="fa-solid fa-circle-plus"></i>
                            Add</button>
                    </div>

        </form>
    </div>

    <table class="table w-50">
        <tr>
            <th scope="col">Tag</th>
            <th scope="col">Post Count</th>
        </tr>




        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td class="d-flex">
                        <form action="{{route('admin.tags.update', $tag)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input class="border-0" type="text" name="name" value="{{$tag->name}}">
                            <button type="submit" class="btn btn-warning me-3">UPDATE</button>
                        </form>

                        @include('admin.partials.form-delete',[
                            'route' => 'tags',
                            'message' => "Confermi l'eliminazione del tag: $tag->name ?",
                            'entity' => $tag
                        ])

                    </td>
                    <td>{{count($tag->posts)}}</td>
                </tr>
            @endforeach

        </tbody>

    </table>






</div>
@endsection

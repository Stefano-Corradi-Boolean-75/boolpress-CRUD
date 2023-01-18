@extends('layouts.app')

@section('title')
    | Admin
@endsection

@section('content')
<div class="container">

    <h1 class="my-5">Elenco di post</h1>

    @dump($posts)

</div>
@endsection

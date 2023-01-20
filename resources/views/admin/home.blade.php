@extends('layouts.app')

@section('title')
    | Admin
@endsection

@section('content')
<div class="container">
    <h1 class="my-5">Home della Dashboard</h1>
    <h3>Sono presenti {{$count_post}} post</h3>
    <a class="btn btn-success" href="{{route('admin.posts.create')}}">Crea un nuovo post</a>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta provident rerum cum voluptate sapiente officiis deserunt in amet a dolorem unde suscipit architecto labore enim inventore temporibus eius ex sequi obcaecati, autem perspiciatis vel. Possimus, cum? Ipsam totam temporibus possimus! Inventore nam pariatur labore quia perspiciatis voluptate quisquam quos. Possimus, harum expedita dolorem dignissimos non, vel similique fugit amet iste, optio beatae quas! Laborum ut autem et voluptatibus velit cum nostrum laudantium debitis fugit aut similique dolor quia voluptatum vero ab vitae doloribus, libero odit itaque doloremque. Itaque voluptatum obcaecati velit natus corrupti eos, molestiae eveniet ex aliquam quis qui.
    </p>
</div>
@endsection



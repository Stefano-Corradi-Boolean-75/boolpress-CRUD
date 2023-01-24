@extends('layouts.app')

@section('title')
    | Nuovo post
@endsection

@section('content')


<div class="container">

    <h1 class="my-5"> Nuovo post </h1>

    @if ($errors->any())

        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error )
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>


    @endif

    <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}" placeholder="Titolo">
            @error('title')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">data</label>
            <input

             type="date" class="form-control @error('date') is-invalid @enderror"  id="date" name="date" value="{{old('date',date('Y-m-d'))}}">
            @error('date')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror

        </div>

        <div class="mb-3">
            <label for="date" class="form-label">cateorie</label>
            <select class="form-select" name="category_id" aria-label="Default select example">
                <option value="">Selezionare una categoria</option>
                @foreach ($categories as $category)
                    <option
                    @if($category->id == old('category_id')) selected @endif
                     value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>

        </div>

        <div class="mb-3">
            <p for="date" class="form-label">tag</p>
            @foreach ($tags as $tag )
                <input type="checkbox"
                id="tag{{$loop->iteration}}"
                name="tags[]"
                value="{{$tag->id}}"
                @if (in_array($tag->id, old('tags',[])))
                    checked
                @endif
                >
                <label class="me-2" for="tag{{$loop->iteration}}">{{$tag->name}}</label>
            @endforeach

        </div>




        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input
            onchange="showImage(event)"
             type="file" class="form-control @error('image') is-invalid @enderror"  id="image" name="image" value="{{old('image')}}" placeholder="URL immagine">
            @error('image')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
            <div class="image mt-2" >
                <img id='output-image' width="150" src="" alt="">
            </div>
        </div>

          <div class="mb-3">
            <label for="text" class="form-label">Testo</label>
            <textarea name="text"  id="text" rows="10">{{old('text')}}</textarea>
            @error('text')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
          </div>

          <button type="submit" class="btn btn-success">Invio</button>
    </form>




</div>

<script>
ClassicEditor
        .create( document.querySelector( '#text' ),{
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        })
        .catch( error => {
            console.error( error );
        } );

function showImage(event){
    const tagImage = document.getElementById('output-image');
    tagImage.src = URL.createObjectURL(event.target.files[0]);
}

</script>


@endsection

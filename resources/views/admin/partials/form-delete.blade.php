<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{$post->id}}">
    DELETE
</button>

<!-- Modal -->
<div class="modal fade" id="modal{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminazione post</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Confermi l'eliminazione del post: {{$post->title}}
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="{{route('admin.posts.destroy',$post)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Confirm DELETE</button>
            </form>
        </div>
    </div>
    </div>
</div>

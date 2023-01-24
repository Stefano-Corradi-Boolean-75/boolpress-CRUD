<nav>
    <ul class="p-0 mt-5">
        <li class="mb-2"> <a class="sc-nav-link " href="{{route('admin.home')}}"><i class="fa-solid fa-chart-line me-1"></i> Dashboard</a> </li>
        <li class="mb-2"> <a class="sc-nav-link" href="{{route('admin.posts.index')}}"><i class="fa-regular fa-newspaper"></i> Posts</a> </li>
        <li class="mb-2"> <a class="sc-nav-link" href="{{route('admin.categories_post')}}"><i class="fa-solid fa-flag"></i> Category/Posts</a> </li>
        <li class="mb-2"> <a class="sc-nav-link" href="{{route('admin.categories.index')}}"><i class="fa-solid fa-folder-open"></i> Categorie</a> </li>
        <li class="mb-2"> <a class="sc-nav-link" href="{{route('admin.tags.index')}}"><i class="fa-solid fa-bookmark"></i> Tag</a> </li>
        <li class="mb-2">
            <a  class="sc-nav-link" class="" href="{{route('admin.posts.create')}}"><i class="fa-solid fa-plus"></i> Nuovo post</a>
        </li>
    </ul>
</nav>

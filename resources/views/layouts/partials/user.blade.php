<nav>
    <div class="row d-flex justify-content-around">
        <div class="card">
            <div class="card-header bgcolor text-white">
              User features
            </div>
            <div class="card-body">
              <h5 class="card-title">User features</h5>
              <p class="card-text">You can create and admin your posts</p>
              <a href="{{route('posts.create')}}" class="btn btn-primary">Go..</a>
            </div>
          </div>
    </div>
    <div class="row  d-flex justify-content-around">

        <span class="badge bg-success"><a href="{{route('posts.create')}}">Create new post</a></span>
    </div>
</nav>

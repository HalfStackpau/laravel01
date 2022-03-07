<nav>
    <div class="row d-flex justify-content-around">
        <div class="card">
            <div class="card-header bgcolor text-white">
              Admin users
            </div>
            <div class="card-body">

              <h5 class="card-title">Users administration</h5>
              <p class="card-text">With supporting CRUD create, read, update and delete users.</p>
              <a href="{{route('users.index')}}" class="btn btn-primary">Go..</a>
            </div>
          </div>
          <div class="card">
            <div class="card-header bgcolor text-white">
              Admin posts
            </div>
            <div class="card-body">
              <h5 class="card-title">Posts administration</h5>
              <p class="card-text">With supporting CRUD create, read, update and delete posts.</p>
              <a href="{{route('posts.index')}}" class="btn btn-primary">Go..</a>
            </div>
          </div>

    </div>
    <div class="row  d-flex justify-content-around">
        <a href="{{route('users.create')}}">Create new user</a>
        <a href="{{route('posts.create')}}">Create new post</a>
    </div>
</nav>

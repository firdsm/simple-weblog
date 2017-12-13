<div class="col-md-4">

  <!-- Search Widget -->
  <div class="card my-4">
    <h5 class="card-header">Search</h5>
    <div class="card-body">
      <form method="post" action="/post/search">
          {{ csrf_field() }}
          <div class="input-group">
              <input type="text" name="keyword" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                  <button type="submit" class="btn btn-secondary">Go!</button>
              </span>
          </div>
      </form>
    </div>
  </div>

  <!-- Categories Widget -->
  <div class="card my-4">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
      <ul class="list-unstyled mb-0">
          @foreach($tags as $tag)
            <li>
              <a href="/post/tag/{{ $tag }}"> {{ $tag }} </a>
            </li>
          @endforeach
      </ul>
    </div>
  </div>

  <!-- Archieves Widget -->
  <div class="card my-4">
    <h5 class="card-header">Archieves</h5>
    <div class="card-body">     
        <ul class="list-unstyled mb-0">
          @foreach($archieves as $stat)
            <li>
              <a href="/?month={{ $stat->month }}&year={{ $stat->year}}"> {{ $stat->month . ' ' . $stat->year }}</a>
            </li>
          @endforeach
        </ul>
    </div>
  </div>

  <div class="card my-4">
    <h5 class="card-header">Side Widget</h5>
    <div class="card-body">
      You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
    </div>
  </div>

</div>
<header>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
      <div class="container-fluid">
        <p class="navbar-brand fs-3 fw-bold" style="color: green">Task Manager</p>

        <!-- Search Form -->
        <form class="d-flex" role="search" action="{{ route('task.list') }}" method="GET">
          <input class="form-control me-2" type="search" name="search" placeholder="Search by title" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        
        </div>
      </div>
    </nav>
</header>
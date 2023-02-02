<nav class="navbar navbar-expand-lg" style="background-color:#0078AA;" data-bs-theme="dark">
    <div class="container-fluid ms-4">
      <a class="navbar-brand" href="/">Zeravel Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item ms-2">
            <a class="nav-link {{ (($title == "Home") ? 'active' : '') }}" href="/">Home</a>
          </li>
          <li class="nav-item ms-2">
            <a class="nav-link {{ (($title == "All") ? 'active' : '') }}" href="/blog">Blogs</a>
          </li>
          <li class="nav-item ms-2">
            <a class="nav-link {{ (($title == "Categories") ? 'active' : '') }}" href="/categories">Categories</a>
          </li>
          <li class="nav-item ms-2">
            <a class="nav-link {{ (($title == "Users") ? 'active' : '') }}" href="/users">Users</a>
          </li>
          <li class="nav-item ms-2">
            <a class="nav-link {{ (($title == "About") ? 'active' : '') }}" href="/about">About</a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto">
          <li class="nav-item ms-2">
            <a class="nav-link {{ (($title == "Login") ? 'active' : '') }}" href="/login">
              <i class="bi bi-box-arrow-in-right"></i> Login
            </a>
          </li>
        </ul>
      </div>
    </div>
</nav>
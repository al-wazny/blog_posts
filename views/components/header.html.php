  <header class="container">
    <div class="d-flex align-items-end">
      <a href="blog/index">
        <img src="https://placehold.co/100x100" alt="company logo">
      </a>
      <p class="ml-3">Company with super cool name</p>
    </div>
    <hr>
    <div class="d-flex justify-content-between">
      <ul class="d-flex list-unstyled mb-0">
        <li class="mx-3"><a href="blog/index">Home</a></li>
        <li class="mx-3"><a href="blog/create">New Post</a></li>
        <li class="mx-3">Impressum</li>
      </ul>
      <?php $route = !isset($_COOKIE["auth_token"]) ? "login/index" : "login/logout"; ?>
      <p class="mb-0"><a href="/<?= $route ?>">[Login/Logout]</a></p>
    </div>
    <hr>
  </header>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="From HTML to Frontend - HTML Layout" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>From HTML to Frontend</title>
</head>
<body>
  <header class="container">
    <div class="d-flex align-items-end">
      <img src="https://placehold.co/100x100" alt="company logo">
      <p class="ml-3">Company with super cool name</p>
    </div>
    <hr>
    <div class="d-flex justify-content-between">
      <ul class="d-flex list-unstyled mb-0">
        <li class="mx-3">Home</li>
        <li class="mx-3">New Post</li>
        <li class="mx-3">Impressum</li>
      </ul>
      <p class="mb-0">[Login/Logout]</p>
    </div>
    <hr>
  </header>
  <main>
    <div class="container my-4">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php foreach ($posts as $post): ?>
          <div class="col my-4">
            <div class="card h-100">
              <img src="<?= $post['image_url']?>" class="card-img-top" alt="placeholder image">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?= $post['title'] ?></h5>
                  <p class="card-text text-truncate"><?= $post['content'] ?></p>
                  <p class="text-muted mt-auto">
                    By <strong><?= $post['author_name'] ?></strong>
                    <br>
                    <?= $post['created_at'] ?>
                  </p>
                  <a href="blog/detail?id=<?= $post['post_id'] ?>" class="btn btn-primary mt-2">Read More</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </main>
</body>
</html>

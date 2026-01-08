
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
  <?php require __DIR__ . "/components/header.html.php"; ?>
    <main class="container my-5">
          <article class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="mb-3">
                <?= $post['title'] ?>
            </h1>

            <!-- Meta -->
            <p class="text-muted mb-4">
                By <strong><?= $post['author_name'] ?></strong>
                · <?= date('F j, Y', strtotime($post['created_at'])) ?>
            </p>

            <img
                src="<?= htmlspecialchars($post['image_url']) ?>"
                alt="Post image"
                class="img-fluid rounded mb-4"
            >

            <!-- Content -->
            <div class="fs-5 lh-lg">
                <?= $post['content'] ?>
            </div>

            <!-- Back button -->
            <div class="mt-5">
                <a href="/" class="btn btn-outline-secondary">
                    ← Back to posts
                </a>
            </div>

        </div>
    </article>
  </main>
</body>
</html>

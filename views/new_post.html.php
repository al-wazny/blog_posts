
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
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <h1 class="mb-4">Create New Blog Post</h1>

                <form method="POST" action="/blog/store">

                    <!-- Title -->
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            required
                        >
                    </div>

                    <!-- Image URL -->
                    <div class="mb-3">
                        <label class="form-label">Image URL</label>
                        <input
                            type="url"
                            name="image_url"
                            class="form-control"
                            placeholder="https://placehold.co/600x400"
                            required
                        >
                    </div>

                    <!-- Content -->
                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea
                            name="content"
                            rows="6"
                            class="form-control"
                            required
                        ></textarea>
                    </div>

                    <!-- Hidden author (example) -->
                    <input type="hidden" name="author_id" value="<?= $_COOKIE['user_id'] ?? 1 ?>">

                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary">
                        Publish Post
                    </button>

                    <a href="/blog" class="btn btn-outline-secondary ms-2">
                        Cancel
                    </a>

                </form>

            </div>
        </div>
    </main>
</body>
</html>

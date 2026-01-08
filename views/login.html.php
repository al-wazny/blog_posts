<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body>

<?php require __DIR__ . '/components/header.html.php'; ?>

<main class="container my-5">

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

            <h1 class="mb-4 text-center">Login</h1>
            <form method="POST" action="/login/authenticate">

                <!-- Username -->
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        required
                        autofocus
                    >
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Login
                </button>

            </form>

        </div>
    </div>

</main>

</body>
</html>

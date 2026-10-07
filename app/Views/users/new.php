<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>New User | SimplePOS</title>

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

<nav>
    <a href="<?= site_url('/') ?>">Home</a>
    <a href="<?= site_url('/about') ?>">About</a>
    <a href="<?= site_url('/customers') ?>">Customers</a>
    <a href="<?= site_url('/users') ?>">Users</a>
</nav>

<main>
    <div class="form-card">
        <h1>New User</h1>
        <p>Create a new user account.</p>

        <?php $errors = session('errors') ?? []; ?>

        <?php if ($errors !== []): ?>
            <div class="validation-errors">
                <strong>Please correct the following:</strong>

                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <form action="<?= site_url('/users/create') ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="username">Username</label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    maxlength="50"
                    value="<?= esc(old('username')) ?>"
                >
            </div>

            <div class="form-group">
                <label for="full_name">Full Name</label>

                <input
                    type="text"
                    id="full_name"
                    name="full_name"
                    maxlength="100"
                    value="<?= esc(old('full_name')) ?>"
                >
            </div>

            <div class="form-actions">
                <button type="submit" class="button">
                    Save User
                </button>

                <a href="<?= site_url('/users') ?>" class="button secondary">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</main>

</body>
</html>

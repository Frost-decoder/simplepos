<?php
/**
 * @var array{
 *     id: int,
 *     username: string,
 *     full_name: string,
 *     avatar: string|null
 * } $user
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit User | SimplePOS</title>

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
        <h1>Edit User</h1>
        <p>Update the user account and upload an optional avatar.</p>

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

        <form
            action="<?= site_url('/users/update/' . $user['id']) ?>"
            method="post"
            enctype="multipart/form-data"
        >
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="username">Username</label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    maxlength="50"
                    value="<?= esc(old('username') ?? $user['username']) ?>"
                >
            </div>

            <div class="form-group">
                <label for="full_name">Full Name</label>

                <input
                    type="text"
                    id="full_name"
                    name="full_name"
                    maxlength="100"
                    value="<?= esc(old('full_name') ?? $user['full_name']) ?>"
                >
            </div>

            <?php if (! empty($user['avatar'])): ?>
                <div class="current-avatar">
                    <p>Current Avatar</p>

                    <img
                        src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>"
                        alt="<?= esc($user['full_name']) ?>"
                        class="avatar-preview"
                    >
                </div>
            <?php endif ?>

            <div class="form-group">
                <label for="avatar">Avatar</label>

                <input
                    type="file"
                    id="avatar"
                    name="avatar"
                    accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                >

                <small>JPG or PNG only. Maximum file size: 2 MB.</small>
            </div>

            <div class="form-actions">
                <button type="submit" class="button">
                    Update User
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

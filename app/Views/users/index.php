<?php
/**
 * @var array<int, array{
 *     id: int,
 *     username: string,
 *     full_name: string,
 *     avatar: string|null
 * }> $users
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Accounts | SimplePOS</title>

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

<nav>
    <a href="<?= site_url('/') ?>">Home</a>
    <a href="<?= site_url('/about') ?>">About</a>
    <a href="<?= site_url('/customers') ?>">Customers</a>
    <a href="<?= site_url('/users') ?>">Users</a>

    <form action="<?= site_url('logout') ?>" method="post" class="logout-form">
    <?= csrf_field() ?>

    <button type="submit" class="nav-logout">
        Logout
    </button>
</form>
</nav>

<main>
    <div class="page-header">
        <div>
            <h1>User Accounts</h1>
            <p>Manage your user records and avatars.</p>
        </div>

        <a href="<?= site_url('/users/new') ?>" class="button">
            Add User
        </a>
    </div>

    <?php if (session()->has('success')): ?>
        <div class="success-message">
            <?= esc(session('success')) ?>
        </div>
    <?php endif ?>

    <?php if ($users !== []): ?>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Avatar</th>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td>
                                <?php if (! empty($user['avatar'])): ?>
                                    <img
                                        src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>"
                                        alt="<?= esc($user['full_name']) ?>"
                                        class="avatar"
                                    >
                                <?php else: ?>
                                    <img
                                        src="<?= base_url('uploads/avatars/placeholder.svg') ?>"
                                        alt="Default avatar"
                                        class="avatar"
                                    >
                                <?php endif ?>
                            </td>

                            <td><?= esc($user['username']) ?></td>
                            <td><?= esc($user['full_name']) ?></td>

                            <td>
                                <a
                                    href="<?= site_url('/users/edit/' . $user['id']) ?>"
                                    class="button small"
                                >
                                    Edit
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="empty-message">
            No user records were found.
        </div>
    <?php endif ?>
</main>

</body>
</html>

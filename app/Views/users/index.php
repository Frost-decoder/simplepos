<?php

/** @var string $title */
/** @var array<int, array<string, mixed>> $users */

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?= esc($title) ?> | SimplePOS</title>

    <link
        rel="stylesheet"
        href="<?= base_url('css/style.css') ?>"
    >
</head>
<body>

    <nav>
        <a href="<?= site_url('/') ?>">Home</a>
        <a href="<?= site_url('/about') ?>">About</a>
        <a href="<?= site_url('/customers') ?>">Customers</a>
        <a href="<?= site_url('/users') ?>">Users</a>
    </nav>

    <main>
        <h1>User Accounts</h1>

        <p>
            These records were retrieved from the MySQL database
            through UserModel.
        </p>

        <?php if (! empty($users)): ?>

            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Created At</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td>
                                <?= esc($user['username']) ?>
                            </td>

                            <td>
                                <?= esc($user['full_name']) ?>
                            </td>

                            <td>
                                <?= esc($user['created_at']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php else: ?>

            <p>No user records were found.</p>

        <?php endif; ?>
    </main>

</body>
</html>

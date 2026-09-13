<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?> | SimplePOS</title>
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
        <h1>About SimplePOS</h1>

        <p>
            SimplePOS is a beginner CodeIgniter 4 project that
            demonstrates routes, controllers, views, and temporary
            array data.
        </p>

        <p>
            This version does not use a database. Customer and user
            records will come from static PHP arrays.
        </p>
    </main>

</body>
</html>

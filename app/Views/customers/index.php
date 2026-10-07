<?php
/**
 * @var array<int, array{
 *     id: int,
 *     full_name: string,
 *     email: string,
 *     phone: string|null
 * }> $customers
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customer Accounts | SimplePOS</title>

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
    <div class="page-header">
        <div>
            <h1>Customer Accounts</h1>
            <p>Manage your customer records.</p>
        </div>

        <a href="<?= site_url('/customers/new') ?>" class="button">
            Add Customer
        </a>
    </div>

    <?php if (session()->has('success')): ?>
        <div class="success-message">
            <?= esc(session('success')) ?>
        </div>
    <?php endif ?>

    <?php if ($customers !== []): ?>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($customers as $customer): ?>
                        <tr>
                            <td><?= esc($customer['full_name']) ?></td>
                            <td><?= esc($customer['email']) ?></td>
                            <td><?= esc($customer['phone'] ?? '') ?></td>

                            <td>
                                <a
                                    href="<?= site_url('/customers/edit/' . $customer['id']) ?>"
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
            No customer records were found.
        </div>
    <?php endif ?>
</main>

</body>
</html>

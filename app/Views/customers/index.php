<?php

/** @var string $title */
/** @var array<int, array<string, mixed>> $customers */

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
        <h1>Customer Accounts</h1>

        <p>
            These records were retrieved from the MySQL database
            through CustomerModel.
        </p>

        <?php if (! empty($customers)): ?>

            <table>
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Created At</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($customers as $customer): ?>
                        <tr>
                            <td>
                                <?= esc($customer['full_name']) ?>
                            </td>

                            <td>
                                <?= esc($customer['email']) ?>
                            </td>

                            <td>
                                <?= esc($customer['phone']) ?>
                            </td>

                            <td>
                                <?= esc($customer['created_at']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php else: ?>

            <p>No customer records were found.</p>

        <?php endif; ?>
    </main>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Customer | SimplePOS</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

<script>
    function formatPhone(input) {
        const digits = input.value.replace(/\D/g, '').slice(0, 11);

        const first = digits.slice(0, 4);
        const second = digits.slice(4, 7);
        const third = digits.slice(7, 11);

        input.value = [first, second, third]
            .filter(part => part !== '')
            .join(' ');
    }
</script>

<nav>
    <a href="<?= site_url('/') ?>">Home</a>
    <a href="<?= site_url('/about') ?>">About</a>
    <a href="<?= site_url('/customers') ?>">Customers</a>
    <a href="<?= site_url('/users') ?>">Users</a>
</nav>

<main>
    <div class="form-card">
        <h1>New Customer</h1>
        <p>Add a new customer account.</p>

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

        <form action="<?= site_url('/customers/create') ?>" method="post">
            <?= csrf_field() ?>

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

            <div class="form-group">
                <label for="email">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    maxlength="100"
                    value="<?= esc(old('email')) ?>"
                >
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input
                    type="text"
                    id="phone"
                    name="phone"
                    maxlength="13"
                    inputmode="numeric"
                    value="<?= esc(old('phone')) ?>"
                    oninput="formatPhone(this)"
                >
            </div>

            <div class="form-actions">
                <button type="submit" class="button">Save Customer</button>
                <a href="<?= site_url('/customers') ?>" class="button secondary">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</main>

</body>
</html>

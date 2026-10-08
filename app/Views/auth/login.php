<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc((string) ($title ?? 'Login')) ?> | SimplePOS</title>

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body class="login-page">

    <main class="login-container">
        <section class="login-card">

            <div class="login-heading">
                <h1>SimplePOS</h1>
                <p>Sign in to access the POS system</p>
            </div>

            <?php if (session()->getFlashdata('loginError')): ?>
                <div class="alert error">
                    <?= esc((string) session()->getFlashdata('loginError')) ?>
                </div>
            <?php endif; ?>

            <?php $errors = session()->getFlashdata('errors') ?? []; ?>

            <?php if (! empty($errors)): ?>
                <div class="alert error">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= esc((string) $error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('login') ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label for="username">Username</label>

                    <input
                        type="text"
                        id="username"
                        name="username"
                        value="<?= esc((string) old('username')) ?>"
                        autocomplete="username"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        autocomplete="current-password"
                        required
                    >
                </div>

                <button type="submit" class="login-button">
                    Login
                </button>
            </form>

        </section>
    </main>

</body>
</html>

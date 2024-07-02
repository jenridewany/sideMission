<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/styles.css'); ?>">
</head>
<body class="register">
    <div class="register-container">
        <div class="register-left">
            <h2>WELCOME BACK!</h2>
            <p>To keep connected with us please login with your personal info</p>
            <button class="btn">SIGN IN</button>
        </div>
        <div class="register-right">
            <h2>CREATE ACCOUNT</h2>
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <p><?= esc($error) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <form method="post" action="<?= base_url(); ?>signup/process">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="USERNAME" name="username" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="EMAIL" name="email" required>
                </div>
                <div class="form-group">
                    <select class="form-control" name="role" required>
                        <option value="" disabled selected>ROLE</option>
                        <option value="user">User</option>
                        <option value="creator">Creator</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="PASSWORD" name="password" required>
                    <i class="fa fa-eye" id="togglePassword"></i>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="CONFIRM PASSWORD" name="confirmPassword" required>
                    <i class="fa fa-eye" id="toggleConfirmPassword"></i>
                </div>
                <button type="submit" class="btn">SIGN UP</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const password = document.querySelector('input[name="password"]');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });

        document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
            const confirmPassword = document.querySelector('input[name="confirmPassword"]');
            const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPassword.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>

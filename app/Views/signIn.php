<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN IN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/styles.css'); ?>">
</head>

<body class="sign-in">
    <div class="signin-container">
        <img src="https://via.placeholder.com/100" alt="User Image">
        <h2>SIGN IN</h2>
        <form method="post" action="<?= base_url(); ?>/signin/process">
            <?= csrf_field(); ?>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="USERNAME" name="username" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="PASSWORD" name="password" required>
            </div>
            <button type="submit" class="btn">SIGN IN</button>
        </form>
        <div class="signup-link">
            <p>Don't have an account? <a href="<?= base_url(); ?>/signup">Create one now!</a></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
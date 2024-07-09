<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/styles-dashboard.css'); ?>">
</head>
<body>
    <div class="sidebar" id="sidebar">
        <button class="toggle-btn" id="toggleBtn"><i class="fas fa-bars"></i></button>
        <h3>Pixel Mingle</h3>
        <ul>
            <li><a href="<?= site_url('products') ?>"><i class="fas fa-box"></i> <span>Product</span></a></li>
            <li></li>
            <li style="position: absolute; bottom: 0; display: block; width: 50%;">
                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle"></i>
                    <span>Profile</span>
                </a>
                <div class="btn-group dropend">
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= site_url('profile') ?>" class="profile"><i class="fas fa-user"></i>Profile</a>
                        <a class="dropdown-item" href="#" onclick="showLogoutPopup()" class="profile"><i class="fas fa-sign-out-alt"></i>Sign Out</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <div class="content" id="content">
        <form method="post" action="<?= base_url('update-profile/process'); ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="card col-md-11 profile">
                        <h1>Edit Profile</h1>
                        <img src="<?= base_url('assets/login.jpg'); ?>" alt="User Image">
                        <?php if (session('message') !== null || session('error') !== null) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= session('message') ?? session('error'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <input type="text" id="username" placeholder="Username" name="username" value="<?=$user['username'] ?>">
                        <input type="text" id="email" placeholder="email" name="email" value="<?=$user['email'] ?>">
                        <div class="form-group">
                            <select class="form-control" name="role" required>
                                <option value="user" selected="<?= $user['role'] == 'user' ? 'selected' : '' ?>">User</option>
                                <option value="creator" selected="<?= $user['role'] == 'creator' ? 'selected' : '' ?>">Creator</option>
                            </select>
                        </div>
                        <a class="btn" href="<?= base_url(); ?>profile">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
            </form>
    </div>
    
    <!-- Logout confirmation popup -->
    <div class="popup" id="logoutPopup">
        <p>Are you sure you want to log out?</p>
        <div class="d-flex flex-row justify-content-around">
            <button onclick="hideLogoutPopup()" class="btn btn-outline-danger w-100">Cancel</button>
            <button onclick="logout()" class="btn btn-dark w-100">Logout</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="<?= base_url('js/styles.js'); ?>"></script>
    
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/styles-dashboard.css'); ?>">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
        .sidebar {
            width: 80px;
            height: 100vh;
            background-color: #343a40;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }
        .sidebar .toggle-btn {
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            margin-bottom: 20px;
        }
        .sidebar h3 {
            color: white;
            display: none;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 20px 0;
        }
        .sidebar ul li a {
            color: white;
            font-size: 24px;
            display: block;
            text-align: center;
        }
        .sidebar ul li a span {
            display: none;
        }
        .sidebar .profile-icon {
            margin-top: auto;
            margin-bottom: 20px;
        }
        .content {
            margin-left: 80px;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .search-bar {
            display: flex;
            align-items: center;
            width: 100%;
        }
        .search-bar select, .search-bar input {
            margin-right: 10px;
            height: 38px;
        }
        .search-bar select {
            max-width: 150px;
        }
        .search-bar input {
            flex: 1;
        }
        .search-bar button {
            height: 38px;
        }
        .card-search {
            padding: 10px;
            margin-bottom: 20px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <ul>
            <li><a href="#"><i class="fas fa-box"></i> <span>Product</span></a></li>
        </ul>
        <div class="profile-icon">
            <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="fas fa-user"></i></a>
        </div>
    </div>

    <div class="content">
        <div class="header">
            <div class="card mb-3 card-search">
                <div class="card-body">
                    <div class="search-bar">
                        <select class="form-select" aria-label="Search by Category">
                            <option selected>Category</option>
                            <option value="1">Category 1</option>
                            <option value="2">Category 2</option>
                            <option value="3">Category 3</option>
                        </select>
                        <input type="text" class="form-control" placeholder="Search by Name">
                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
        
        <?php if (session('message') !== null) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= session('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

        <div class="table-container">
            <div class="container mt-5">
                <div class="row">
                    <?php foreach($products as $product): ?>
                        <div class="col-md-4 col-sm-6 mb-4">
                            <div class="product-image position-relative overflow-hidden">
                                <img src="<?= base_url(esc($product['picture'])) ?>" onerror="<?= base_url('assets/error-img.jpg'); ?>" alt="Product Image" class="img-fluid w-100">
                                <a href="#" download="" class="download-icon position-absolute top-50 start-50 translate-middle text-white">
                                    <i class="fas fa-download"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to logout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="<?= site_url('/sign-out') ?>" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script>
        document.getElementById('toggleBtn').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('minimized');
        });

        $('#logoutModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var recipient = button.data('whatever')
            var modal = $(this)
            modal.find('.modal-body input').val(recipient)
        });
    </script>
</body>
</html>

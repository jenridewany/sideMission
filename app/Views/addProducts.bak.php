<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f4f5f7;
            font-family: 'Outfit', sans-serif;
        }

        .sidebar {
            width: 250px;
            background-color: #fff;
            padding: 20px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: width 0.3s;
        }

        .sidebar.minimized {
            width: 80px;
        }

        .sidebar h3 {
            font-size: 24px;
            margin-bottom: 30px;
            transition: opacity 0.3s;
        }

        .sidebar.minimized h3 {
            opacity: 0;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 20px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            display: flex;
            align-items: center;
            transition: opacity 0.3s;
        }

        .sidebar ul li a i {
            margin-right: 10px;
        }

        .sidebar.minimized ul li a {
            justify-content: center;
        }

        .sidebar.minimized ul li a span {
            display: none;
        }

        .toggle-btn {
            position: absolute;
            top: 20px;
            right: -25px;
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .toggle-btn:hover {
            background-color: #218838;
        }

        .content {
            margin-left: 270px;
            padding: 20px;
            transition: margin-left 0.3s;
        }

        .content.minimized {
            margin-left: 100px;
        }

        .card {
            background-color: #fff;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
        }

        .card h2 {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .card input, .card textarea, .card select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .card .btn {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .card .btn:hover {
            background-color: #218838;
        }

        .img-upload img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .img-upload input {
            display: none;
        }

        .img-upload label {
            display: block;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
        }

        .img-upload label:hover {
            background-color: #218838;
        }

        .category-list {
            display: flex;
            gap: 10px;
        }

        .category-item {
            background-color: #f4f5f7;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }

        .category-item:hover {
            background-color: #e2e6ea;
        }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <button class="toggle-btn" id="toggleBtn"><i class="fas fa-bars"></i></button>
        <h3>SalesSync</h3>
        <ul>
            <li><a href="#"><i class="fas fa-tachometer-alt"></i> <span>Overview</span></a></li>
            <li><a href="#"><i class="fas fa-chart-line"></i> <span>Analytics</span></a></li>
            <li><a href="#"><i class="fas fa-box"></i> <span>Product</span></a></li>
            <li><a href="#"><i class="fas fa-shopping-cart"></i> <span>Sales</span></a></li>
            <li><a href="#"><i class="fas fa-money-check-alt"></i> <span>Payment</span></a></li>
            <li><a href="#"><i class="fas fa-undo-alt"></i> <span>Refunds</span></a></li>
            <li><a href="#"><i class="fas fa-file-invoice"></i> <span>Invoice</span></a></li>
            <li><a href="#"><i class="fas fa-reply"></i> <span>Returns</span></a></li>
            <li><a href="#"><i class="fas fa-bell"></i> <span>Notifications</span></a></li>
            <li><a href="#"><i class="fas fa-comment-dots"></i> <span>Feedback</span></a></li>
            <li><a href="#"><i class="fas fa-cogs"></i> <span>Setting</span></a></li>
            <li><a href="#"><i class="fas fa-moon"></i> <span>Dark Mode</span></a></li>
        </ul>
    </div>

    <div class="content" id="content">
        <h1>Overview</h1>
        <div class="card">
            <h2>Add New Product</h2>
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <h2>General Information</h2>
                        <input type="text" placeholder="Name Product">
                        <textarea rows="4" placeholder="Description Product"></textarea>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Size</label>
                                <div class="btn-group" role="group">
                                    <input type="checkbox" class="btn-check" id="sizeXS" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="sizeXS">XS</label>

                                    <input type="checkbox" class="btn-check" id="sizeS" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="sizeS">S</label>

                                    <input type="checkbox" class="btn-check" id="sizeM" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="sizeM">M</label>

                                    <input type="checkbox" class="btn-check" id="sizeL" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="sizeL">L</label>

                                    <input type="checkbox" class="btn-check" id="sizeXL" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="sizeXL">XL</label>

                                    <input type="checkbox" class="btn-check" id="sizeXXL" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="sizeXXL">XXL</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Gender</label>
                                <div class="btn-group" role="group">
                                    <input type="radio" class="btn-check" name="gender" id="genderMen" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="genderMen">Men</label>

                                    <input type="radio" class="btn-check" name="gender" id="genderWomen" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="genderWomen">Women</label>

                                    <input type="radio" class="btn-check" name="gender" id="genderUnisex" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="genderUnisex">Unisex</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <h2>Pricing and Stock</h2>
                        <input type="text" placeholder="Base Pricing">
                        <input type="text" placeholder="Stock">
                        <input type="text" placeholder="Discount">
                        <input type="text" placeholder="Discount Type">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 img-upload">
                        <h2>Upload Img</h2>
                        <img src="https://via.placeholder.com/150" alt="Product Image">
                        <input type="file" id="uploadImg">
                        <label for="uploadImg">Choose Image</label>
                    </div>
                    <div class="card mb-4">
                        <h2>Category</h2>
                        <input type="text" placeholder="Product Category">
                        <button class="btn">Add Category</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggleBtn').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('minimized');
            document.getElementById('content').classList.toggle('minimized');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

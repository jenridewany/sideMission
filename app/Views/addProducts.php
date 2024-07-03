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

        .card label {
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
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
        <h3>Pixel Mingle</h3>
        <ul>
            <li><a href="#"><i class="fas fa-box"></i> <span>Product</span></a></li>
            <li><a href="#"><i class="fas fa-shopping-cart"></i> <span>Sales</span></a></li>
        </ul>
    </div>

    <div class="content" id="content">
        <!-- <div class="card"> -->
            <div class="row">                
                <div class="col-md-6">
                    <h2>Add New Product</h2>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary">Save Product</button>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <h2>General Information</h2>
                        <label for="nameProduct">Name Product</label>
                        <input type="text" id="nameProduct" placeholder="Name Product">
                        <label for="descriptionProduct">Description Product</label>
                        <textarea id="descriptionProduct" rows="4" placeholder="Description Product"></textarea>
                    </div>

                    <div class="card">
                        <h2>Pricing & Inventory</h2>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="price">Price ($)</label>
                                <input type="number" id="price" placeholder="Price">
                            </div>
                            <div class="col-md-6">
                                <label for="stock">Stock</label>
                                <input type="number" id="stock" placeholder="Stock">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="discount">Discount</label>
                                <input type="number" id="discount" placeholder="Discount">
                            </div>
                            <div class="col-md-6">
                                <label for="category">Category</label>
                                <select id="category">
                                    <option value="1">Art</option>
                                    <option value="2">Photo Assets</option>
                                    <option value="3">Video Assets</option>
                                    <option value="4">Lightroom Preset</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4 img-upload">
                        <h2>Upload Img</h2>
                        <img src="https://via.placeholder.com/150" alt="Product Image">
                        <input type="file" id="uploadImg">
                        <label for="uploadImg">Choose Image</label>
                    </div>
                </div>
            </div>

            <div class="row">
            </div>
        <!-- </div> -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleBtn = document.getElementById('toggleBtn');
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('minimized');
            content.classList.toggle('minimized');
        });
    </script>
</body>
</html>


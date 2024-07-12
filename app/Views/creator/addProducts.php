<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel Mingle</title>
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
            <li><a href="/products"><i class="fas fa-box"></i> <span>Product</span></a></li>
            <li></li>
            <li style="position: absolute; bottom: 0; display: block; width: 50%;">
                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle"></i>
                    <span>Profile</span>
                </a>
                <div class="btn-group dropend">
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/profile" class="profile"><i class="fas fa-user"></i>Profile</a>
                        <a class="dropdown-item" href="#" onclick="showLogoutPopup()" class="profile"><i class="fas fa-sign-out-alt"></i>Sign Out</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <div class="content" id="content">
        <form method="post" action="<?= base_url(); ?>add-products/process" enctype="multipart/form-data">
            <div class="header">
                <h2>Add New Product</h2>
                <button class="btn-coral" type="submit">Save Product</button>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <h2>General Information</h2>
                        <label for="nameProduct">Name Product</label>
                        <input type="text" id="nameProduct" placeholder="Name Product" name="name" require>
                        <label for="descriptionProduct">Description Product</label>
                        <textarea id="descriptionProduct" rows="4" placeholder="Description Product"  name="description" require></textarea>
                    </div>

                    <div class="card">
                        <h2>Pricing & Inventory</h2>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="price">Price (IDR)</label>
                                <input type="number" id="price" placeholder="Price" name="price" require>
                            </div>
                            <div class="col-md-6">
                                <label for="stock">Stock</label>
                                <input type="number" id="stock" placeholder="Stock" name="stock" require>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="category">Category</label>
                                <select id="category" name="category">
                                    <?php foreach($categories as $category): ?>
                                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4 img-upload">
                        <h2>Upload Img</h2>
                        <img src="https://via.placeholder.com/150" alt="Product Image" id="productImage">
                        <input type="file" id="uploadImg" name="uploadImg">
                        <label for="uploadImg">Choose Image</label>
                    </div>
                </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('js/styles.js'); ?>"></script>
    <script>        
        document.getElementById('uploadImg').addEventListener('change', function (event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('productImage');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        })
    </script>
</body>
</html>

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
        <form method="post" action="<?= base_url('update-products/process/'.$product['id']); ?>" enctype="multipart/form-data">
        <div class="header">
            <h2>Edit Product</h2>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </div>

        
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <h2>General Information</h2>
                    <label for="nameProduct">Name Product</label>
                    <input type="text" id="nameProduct" placeholder="Name Product" value="<?= $product['name'] ?>">
                    <label for="descriptionProduct">Description Product</label>
                    <textarea id="descriptionProduct" rows="4" placeholder="Description Product"><?= $product['description'] ?></textarea>
                </div>

                <div class="card">
                    <h2>Pricing & Inventory</h2>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="price">Price (IDR)</label>
                            <input type="number" id="price" placeholder="Price" value="<?= $product['price'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="stock">Stock</label>
                            <input type="number" id="stock" placeholder="Stock" value="<?= $product['stock'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="category">Category</label>
                            <select id="category">
                                <option value="<?= $product['category'] == 1 ? 'selected' : '' ?>" >Art</option>
                                <option value="<?= $product['category'] == 2 ? 'selected' : '' ?>">Photo Assets</option>
                                <option value="<?= $product['category'] == 3 ? 'selected' : '' ?>">Video Assets</option>
                                <option value="<?= $product['category'] == 4 ? 'selected' : '' ?>">Lightroom Preset</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4 img-upload">
                    <h2>Upload Img</h2>
                    <img src="<?= isset($product['image']) && $product['image'] ? base_url($product['image']) : 'https://via.placeholder.com/150' ?>" alt="Product Image">
                    <input type="file" id="uploadImg">
                    <label for="uploadImg">Choose Image</label>
                </div>
            </div>
        </div>
        </form>
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

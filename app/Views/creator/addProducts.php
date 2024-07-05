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
        <form method="post" action="<?= base_url(); ?>add-products/process" enctype="multipart/form-data">
            <div class="header">
                <h2>Add New Product</h2>
                <button class="btn btn-primary" type="submit">Save Product</button>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <h2>General Information</h2>
                        <label for="nameProduct">Name Product</label>
                        <input type="text" id="nameProduct" placeholder="Name Product" name="name">
                        <label for="descriptionProduct">Description Product</label>
                        <textarea id="descriptionProduct" rows="4" placeholder="Description Product"  name="description"></textarea>
                    </div>

                    <div class="card">
                        <h2>Pricing & Inventory</h2>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="price">Price (IDR)</label>
                                <input type="number" id="price" placeholder="Price" name="price">
                            </div>
                            <div class="col-md-6">
                                <label for="stock">Stock</label>
                                <input type="number" id="stock" placeholder="Stock" name="stock">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <!-- <div class="col-md-6">
                                <label for="discount">Discount</label>
                                <input type="number" id="discount" placeholder="Discount">
                            </div> -->
                            <div class="col-md-6">
                                <label for="category">Category</label>
                                <select id="category" name="category">
                                    <!-- <option value="1">Art</option>
                                    <option value="2">Photo Assets</option>
                                    <option value="3">Video Assets</option>
                                    <option value="4">Lightroom Preset</option> -->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleBtn = document.getElementById('toggleBtn');
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('minimized');
            content.classList.toggle('minimized');
        });
        
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
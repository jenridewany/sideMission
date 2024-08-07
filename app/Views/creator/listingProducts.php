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
            <li><a href="#"><i class="fas fa-box"></i> <span>Product</span></a></li>
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
        <div class="header">
            <h1>Products</h1>
            <a href="/add-products" class="btn-coral">Add Product (+)</a>
        </div>
        <?php if (session('message') !== null ) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= session('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Downloads</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="productTableBody">
                    <?php $index = 1; ?>
                    <?php foreach($products as $product): ?>
                        <tr data-bs-toggle="modal" data-id="<?= esc($product['id']) ?>" data-name="<?= esc($product['name']) ?>" data-description="<?= esc($product['description']) ?>" data-price="<?= esc($product['price']) ?>" data-category="<?= esc($product['category_name']) ?>" data-download="<?= esc($product['download']) ?>" data-image="<?= esc($product['picture']) ?>">
                            <td><?= $index ?></td>
                            <td><img src="<?= esc($product['picture']) ?>" alt='Product Image'></td>
                            <td><?= esc($product['name']) ?></td>
                            <td><?= esc($product['price']) ?></td>
                            <td><?= esc($product['category_name']) ?></td>
                            <td><?= esc($product['download']) ?></td>
                            <td id="action">
                                <div class='action-buttons'>
                                    <a href="<?= site_url('edit-products/'.$product['id']) ?>" class="edit"><i class="fas fa-edit"></i></a>
                                    <i class='fas fa-trash delete' data-id="<?= $product['id'] ?>"></i>
                                </div>
                            </td>
                        </tr>
                        <?php $index++; ?>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this product?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="detailModalLabel">Product Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <img id="productImage" src="" alt="Product Image" class="img-fluid rounded shadow-sm">
                        </div>
                        <div class="col-md-7">
                            <h4 id="productName" class="mb-3"></h4>
                            <p id="productDescription" class="text-muted"></p>
                            <p><strong>Price:</strong> <span id="productPrice" class="text-primary"></span></p>
                            <p><strong>Category:</strong> <span id="productCategory" class="badge bg-secondary"></span></p>
                            <p><strong>Downloads:</strong> <span id="productDownloads" class="text-success"></span></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
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
    <script>
        const deleteButtons = document.querySelectorAll('.delete');
        let deleteId;

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                // Stop the event from propagating to the parent elements
                event.stopPropagation();

                deleteId = this.getAttribute('data-id');
                const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                deleteModal.show();
            });
        });

        document.getElementById('confirmDelete').addEventListener('click', function () {
            window.location.href = '/delete-products/' + deleteId;
        });

        const productRows = document.querySelectorAll('#productTableBody tr');
        const detailModal = new bootstrap.Modal(document.getElementById('detailModal'));
        const productImage = document.getElementById('productImage');
        const productName = document.getElementById('productName');
        const productDescription = document.getElementById('productDescription');
        const productPrice = document.getElementById('productPrice');
        const productCategory = document.getElementById('productCategory');
        const productDownloads = document.getElementById('productDownloads');

        productRows.forEach(row => {
            row.addEventListener('click', function () {
                const target = event.target.closest('#action')
                if (!target) {
                    productImage.src = this.getAttribute('data-image');
                    productName.textContent = this.getAttribute('data-name');
                    productDescription.textContent = this.getAttribute('data-description');
                    productPrice.textContent = this.getAttribute('data-price');
                    productCategory.textContent = this.getAttribute('data-category');
                    productDownloads.textContent = this.getAttribute('data-download');
                    detailModal.show();
                }
            });
        });
    </script>
</body>
</html>

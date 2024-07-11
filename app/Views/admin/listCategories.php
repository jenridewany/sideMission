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
            <li><a href="/admin-dashboard"><i class="fas fa-user"></i> <span>User</span></a></li>
            <li><a href="/admin-dashboard/category"><i class="fas fa-box"></i> <span>Category</span></a></li>
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
            <h1>List Categories</h1>
            <a href="/admin-dashboard/add-category" class="btn-coral">Add Category (+)</a>
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
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="categoriesTableBody">
                    <?php $index = 1; ?>
                    <?php foreach($categories as $category): ?>
                        <tr data-bs-toggle="modal" data-id="<?= esc($category['id']) ?>" data-name="<?= esc($category['name']) ?>" data-desc="<?= esc($category['description']) ?>" >
                            <td><?= $index ?></td>
                            <td><?= esc($category['name']) ?></td>
                            <td><?= esc($category['description']) ?></td>
                            <td id="action">
                                <div class='action-buttons'>
                                    <a href="<?= site_url('admin-dashboard/edit-category/'.$category['id']) ?>" class="edit"><i class="fas fa-edit"></i></a>
                                    <i class='fas fa-trash delete' data-id="<?= $category['id'] ?>"></i>
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
    </script>
</body>
</html>

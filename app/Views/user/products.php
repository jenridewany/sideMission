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
            <li><a href="#" onclick="showLogoutPopup()" class="profile"><i class="fas fa-sign-out-alt"></i> <span>Sign Out</span></a></li>
        </ul>
    </div>

    <div class="content">
        <div class="header">
            <h1>Recently Products</h1>
        </div>
        
        <?php if (session('message') !== null) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= session('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

        <div class="table-container">
            <div class="p-4">
                <div class="row">
                    <?php foreach($products as $product): ?>
                        <div class="col-md-4 col-sm-6 mb-4">
                            <div class="product-image position-relative overflow-hidden" data-id="<?= $product['id'] ?>">
                                <img src="<?= base_url(esc($product['picture'])) ?>" onerror="this.src='<?= base_url('assets/error-image.jpg'); ?>'" alt="Product Image" class="img-fluid w-100">
                                <div class="overlay position-absolute top-0 start-0 w-100 h-100 align-items-center justify-content-center bg-dark text-white fw-bold">
                                    <span class="download-counter" id="downloadCount_<?= $product['id'] ?>">Downloaded: <?= $product['download'] ?></span>
                                    <a href="#" download="" class="download-icon position-absolute top-50 start-50 text-white">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?= base_url('js/styles.js'); ?>"></script>
    <script>
        function updateDownloadCount(productId) {
            $.ajax({
                url: "<?= base_url('download/') ?>" + productId,
                method: 'GET',
                
                success: function (response) {
                    if (response.success) {
                        $('#downloadCount_' + productId).text('Downloaded: ' + response.downloaded);
                        
                        // buar anchor element dengan download attribute
                        const anchorElement = document.createElement('a');
                        anchorElement.href = response.url;
                        anchorElement.download = '';
                        anchorElement.style.display = 'none';
                        document.body.appendChild(anchorElement);

                        // open new blank window
                        const downloadWindow = window.open('about:blank', '_blank');

                        if (downloadWindow) {
                            // klik tag untuk trigger download proses
                            setTimeout(() => {
                                downloadWindow.document.body.appendChild(anchorElement);
                                anchorElement.click();
                                
                                // close tab download popup
                                setTimeout(() => {
                                    downloadWindow.close();
                                }, 10);
                            }, 0);
                        } else {
                            alert('Failed to open download window.');
                        }
                    } else {
                        alert('Failed download : ' + response.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error : ', error);
                }
            });
        }

        $('.download-icon').on('click', function(e) {
            e.preventDefault();
            var productId = $(this).closest('.product-image').data('id');
            console.log($(this).closest('.product-image'))
            updateDownloadCount(productId);
        });
    </script>
</body>
</html>

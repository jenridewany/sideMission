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
            <div class="container mt-5">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function updateDownloadCount(productId) {
            $.ajax({
                url: "<?= base_url('download/') ?>" + productId, // Replace with your actual backend URL
                method: 'GET',
                
                success: function (response) {
                    if (response.success) {
                        $('#downloadCount_' + productId).text(response.downloaded);
                        // window.open(response.url, '_blank');
                        
                        // Create an anchor element with the download attribute
                        const anchorElement = document.createElement('a');
                        anchorElement.href = response.url; // Use the file URL from the AJAX response
                        anchorElement.download = '';
                        anchorElement.style.display = 'none';
                        document.body.appendChild(anchorElement);

                        // Open a new blank tab
                        const downloadWindow = window.open('about:blank', '_blank');

                        if (downloadWindow) {
                            // Programmatically click on the anchor tag inside the new tab to start the file download process
                            setTimeout(() => {
                                downloadWindow.document.body.appendChild(anchorElement);
                                anchorElement.click();

                                // After a brief delay, close the new tab
                                setTimeout(() => {
                                    downloadWindow.close();
                                }, 500);
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

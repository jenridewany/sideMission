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

    <div class="content">
        <div class="header">
            <h1>Products</h1>
            <a href="/add-products" class="btn btn-primary">Add Product (+)</a>
        </div>

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
                    <?php
                    // include 'db.php';
                    
                    // $sql = "SELECT * FROM products";
                    // $result = $conn->query($sql);

                    // if ($result->num_rows > 0) {
                    //     while($row = $result->fetch_assoc()) {
                    //         echo "<tr>
                    //                 <td>{$row['id']}</td>
                    //                 <td><img src='{$row['image']}' alt='Product Image'></td>
                    //                 <td>{$row['name']}</td>
                    //                 <td>\${$row['price']}</td>
                    //                 <td>{$row['category']}</td>
                    //                 <td>{$row['downloads']}</td>
                    //                 <td>
                    //                     <div class='action-buttons'>
                    //                         <i class='fas fa-edit edit'></i>
                    //                         <i class='fas fa-trash delete'></i>
                    //                     </div>
                    //                 </td>
                    //               </tr>";
                    //     }
                    // } else {
                    //     echo "<tr><td colspan='7'>No products found</td></tr>";
                    // }

                    // $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
        }

        .success-message {
            text-align: center;
            color: green;
        }

        .error-message {
            text-align: center;
            color: red;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }

        .back-link a {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
        }

        .back-link a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
    include 'connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $product_id = $_GET["id"];

        $sql = "DELETE FROM tbSanpham WHERE id = $product_id";

        if ($conn->query($sql) === true) {
            echo "<h2 class='success-message'>Xóa sản phẩm thành công</h2>";
        } else {
            echo "<h2 class='error-message'>Lỗi: " . $sql . "<br>" . $conn->error . "</h2>";
        }
    }
    ?>

    <div class="back-link">
        <a href="display_products.php">Quay lại Danh sách sản phẩm</a>
    </div>
</body>
</html>

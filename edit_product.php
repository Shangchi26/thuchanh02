<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
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
    <h2>Chỉnh sửa sản phẩm</h2>

    <?php
    include 'connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $product_id = $_GET["id"];

        // Lấy thông tin sản phẩm cần sửa
        $sql = "SELECT * FROM tbSanpham WHERE id = $product_id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $name = $row["name"];
            $price = $row["price"];
            $quantity = $row["quantity"];
            $description = $row["description"];
            $status = $row["status"];
            $catid = $row["catid"];
        } else {
            echo "Không tìm thấy sản phẩm.";
            exit;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $product_id = $_POST["product_id"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];
        $description = $_POST["description"];
        $status = $_POST["status"];
        $catid = $_POST["catid"];

        $sql = "UPDATE tbSanpham SET name = '$name', price = $price, quantity = $quantity, description = '$description', status = $status, catid = $catid WHERE id = $product_id";

        if ($conn->query($sql) === true) {
            echo "Cập nhật sản phẩm thành công";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>

    <form method="post">
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" name="name" value="<?php echo $name; ?>"><br>
        <label for="price">Giá:</label>
        <input type="text" name="price" value="<?php echo $price; ?>"><br>
        <label for="quantity">Số lượng:</label>
        <input type="text" name="quantity" value="<?php echo $quantity; ?>"><br>
        <label for="description">Mô tả:</label>
        <textarea name="description"><?php echo $description; ?></textarea><br>
        <label for="status">Trạng thái:</label>
        <input type="text" name="status" value="<?php echo $status; ?>"><br>
        <label for="catid">Loại sản phẩm:</label>
        <input type="text" name="catid" value="<?php echo $catid; ?>"><br>
        <input type="submit" value="Cập nhật">
    </form>

    <div class="back-link">
        <a href="display_products.php">Quay lại Danh sách sản phẩm</a>
    </div>
</body>
</html>

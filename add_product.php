<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
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
    <h2>Thêm sản phẩm</h2>

    <?php
    include 'connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];
        $description = $_POST["description"];
        $status = $_POST["status"];
        $catid = $_POST["catid"];

        $sql = "INSERT INTO tbSanpham (name, price, quantity, description, status, catid) VALUES ('$name', $price, $quantity, '$description', $status, $catid)";

        if ($conn->query($sql) === true) {
            echo "Thêm sản phẩm thành công";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>

    <form method="post">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" name="name"><br>
        <label for="price">Giá:</label>
        <input type="text" name="price"><br>
        <label for="quantity">Số lượng:</label>
        <input type="text" name="quantity"><br>
        <label for="description">Mô tả:</label>
        <textarea name="description"></textarea><br>
        <label for="status">Trạng thái:</label>
        <input type="text" name="status"><br>
        <label for="catid">Loại sản phẩm:</label>
        <input type="text" name="catid"><br>
        <input type="submit" value="Thêm sản phẩm">
    </form>

    <div class="back-link">
        <a href="display_products.php">Quay lại Danh sách sản phẩm</a>
    </div>
</body>
</html>

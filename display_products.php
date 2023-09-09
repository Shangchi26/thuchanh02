<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .add-link {
            display: block;
            margin: 20px;
            text-align: center;
        }

        .add-link a {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
        }

        .add-link a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>

    <div class="add-link">
        <a href="add_product.php">Thêm sản phẩm mới</a>
    </div>

    <?php
    include 'connect.php';

    $sql = "SELECT tbSanpham.*, tbCategory.name AS category_name FROM tbSanpham
            INNER JOIN tbCategory ON tbSanpham.catid = tbCategory.id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Tên sản phẩm</th>";
        echo "<th>Giá</th>";
        echo "<th>Số lượng</th>";
        echo "<th>Mô tả</th>";
        echo "<th>Trạng thái</th>";
        echo "<th>Loại sản phẩm</th>";
        echo "<th>Thao tác</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td>" . $row["quantity"] . "</td>";
            echo "<td>" . $row["description"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            echo "<td>" . $row["category_name"] . "</td>";
            echo "<td>";

            echo "<a href='edit_product.php?id=" . $row["id"] . "'>Sửa</a> | ";
            echo "<a href='delete_product.php?id=" . $row["id"] . "'>Xóa</a>";

            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Không có sản phẩm nào trong CSDL.";
    }
    ?>

    
</body>
</html>

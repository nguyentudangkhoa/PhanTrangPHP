<?php
require_once "db/db.inc.php";
$tongSanPham = 7;// 1 trang 4 sản phẩm
if(isset($_GET['trang'])){ //kiểm tra khi vào trang index mà chưa chọn trang au to trang 1
    $trang = $_GET['trang'];
}else {
    $trang = 1;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/style.css">
</head>

<body align="center">
    
    <h1>PRODUCT:</h1>
    <h2>page: <?php echo $trang?></h2>
    <?php
    $from = ($trang - 1)*$tongSanPham;//Sản phẩm từ vị trí
    $sql2 = "SELECT * FROM products LIMIT $from,$tongSanPham";//chọn sản phẩm từ vị trí và số sp
    $result2 = $conn->query($sql2);
    ?>
    <table  align="center" border="1">
        <tr>
            <th>Product name</th>
            <th>Price</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result2)) {
            echo "<tr>
                    <td>".$row['name']."</td>
                    <td>".$row['unit_price']."</td>
                 </tr>";
        }
        ?>
    </table><br>
    <?php
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    $num = mysqli_num_rows($result);//đếm tống trang
    $tongSoTrang = $num/$tongSanPham;// tổng số trang có số sản phẩm
    for($i=1; $i<=$tongSoTrang;$i++){
        echo "<a href='index.php?trang=$i'>Trang $i | </a>";
    }
    ?>
</body>

</html>
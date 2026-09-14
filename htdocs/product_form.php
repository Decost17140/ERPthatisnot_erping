<?php
require 'config.php';
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }

$id = $_GET['id'] ?? '';
$prod_code = $name = $price = $stock = '';

if($id) {
    $res = $conn->query("SELECT * FROM products WHERE id = ".(int)$id);
    if($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $prod_code = $row['prod_code']; $name = $row['name'];
        $price = $row['price']; $stock = $row['stock'];
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prod_code = $conn->real_escape_string($_POST['prod_code']);
    $name = $conn->real_escape_string($_POST['name']);
    $price = (float)$_POST['price'];
    $stock = (int)$_POST['stock'];

    if($id) {
        $sql = "UPDATE products SET prod_code='$prod_code', name='$name', price='$price', stock='$stock' WHERE id=".(int)$id;
    } else {
        $sql = "INSERT INTO products (prod_code, name, price, stock) VALUES ('$prod_code', '$name', '$price', '$stock')";
    }
    
    if($conn->query($sql)) {
        header("Location: products.php"); exit();
    } else {
        $error = "เกิดข้อผิดพลาด: " . $conn->error;
    }
}
include 'header.php';
?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><?php echo $id ? 'แก้ไขข้อมูลสินค้า' : 'เพิ่มสินค้าใหม่'; ?></h5>
            </div>
            <div class="card-body">
                <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                <form method="POST">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label>รหัสสินค้า</label>
                            <input type="text" name="prod_code" class="form-control" value="<?php echo htmlspecialchars($prod_code); ?>" required>
                        </div>
                        <div class="col-md-8">
                            <label>ชื่อสินค้า</label>
                            <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>ราคา (บาท)</label>
                            <input type="number" step="0.01" name="price" class="form-control" value="<?php echo htmlspecialchars($price); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label>จำนวนคงเหลือ (ชิ้น)</label>
                            <input type="number" name="stock" class="form-control" value="<?php echo htmlspecialchars($stock); ?>" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> บันทึกข้อมูล</button>
                    <a href="products.php" class="btn btn-secondary">ยกเลิก</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
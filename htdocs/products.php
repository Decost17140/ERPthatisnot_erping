<?php
require 'config.php';
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }

if(isset($_GET['del'])) {
    $id = (int)$_GET['del'];
    $conn->query("DELETE FROM products WHERE id = $id");
    header("Location: products.php"); exit();
}

include 'header.php';
$result = $conn->query("SELECT * FROM products ORDER BY id DESC");
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>ระบบจัดการคลังสินค้า (Inventory)</h4>
    <a href="product_form.php" class="btn btn-success"><i class="bi bi-plus-circle"></i> เพิ่มสินค้าใหม่</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา (บาท)</th>
                        <th>จำนวนคงเหลือ</th>
                        <th class="text-center">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['prod_code']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo number_format($row['price'], 2); ?></td>
                        <td>
                            <?php 
                                $stock = $row['stock'];
                                if($stock <= 5) echo "<span class='badge bg-danger'>$stock</span>";
                                else echo "<span class='badge bg-success'>$stock</span>";
                            ?>
                        </td>
                        <td class="text-center">
                            <a href="product_form.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> แก้ไข</a>
                            <a href="products.php?del=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('ยืนยันการลบ?');"><i class="bi bi-trash"></i> ลบ</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                    <?php if($result->num_rows == 0) echo "<tr><td colspan='5' class='text-center'>ไม่มีข้อมูลสินค้า</td></tr>"; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
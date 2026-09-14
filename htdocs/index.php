<?php
require 'config.php';
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }
include 'header.php';

// นับจำนวนข้อมูลจริงจากฐานข้อมูล
$emp_count = $conn->query("SELECT COUNT(*) as total FROM employees")->fetch_assoc()['total'];
$prod_count = $conn->query("SELECT COUNT(*) as total FROM products")->fetch_assoc()['total'];
$stock_total = $conn->query("SELECT SUM(stock) as total FROM products")->fetch_assoc()['total'];
?>
<div class="row mb-4">
    <div class="col-12">
        <h4 class="mb-3">ภาพรวมระบบ (Dashboard)</h4>
    </div>
    
    <div class="col-md-4 mb-3">
        <div class="card bg-primary text-white h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="card-title text-uppercase">พนักงานทั้งหมด</h6>
                    <h2 class="mb-0"><?php echo $emp_count; ?> คน</h2>
                </div>
                <i class="bi bi-people" style="font-size: 3rem; opacity: 0.5;"></i>
            </div>
            <div class="card-footer bg-transparent border-0"><a href="employees.php" class="text-white text-decoration-none">จัดการบุคลากร ➔</a></div>
        </div>
    </div>
    
    <div class="col-md-4 mb-3">
        <div class="card bg-success text-white h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="card-title text-uppercase">สินค้าในระบบ</h6>
                    <h2 class="mb-0"><?php echo $prod_count; ?> รายการ</h2>
                </div>
                <i class="bi bi-box-seam" style="font-size: 3rem; opacity: 0.5;"></i>
            </div>
            <div class="card-footer bg-transparent border-0"><a href="products.php" class="text-white text-decoration-none">จัดการคลังสินค้า ➔</a></div>
        </div>
    </div>
    
    <div class="col-md-4 mb-3">
        <div class="card bg-warning text-dark h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="card-title text-uppercase">จำนวนสินค้าคงเหลือรวม</h6>
                    <h2 class="mb-0"><?php echo $stock_total ?? 0; ?> ชิ้น</h2>
                </div>
                <i class="bi bi-stack" style="font-size: 3rem; opacity: 0.5;"></i>
            </div>
            <div class="card-footer bg-transparent border-0"><a href="products.php" class="text-dark text-decoration-none">ดูรายละเอียด ➔</a></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ยินดีต้อนรับ, <?php echo htmlspecialchars($_SESSION['name']); ?></h5>
                <p class="card-text text-muted">ระบบ ERP นี้ประกอบด้วยโมดูลการจัดการทรัพยากรบุคคล (HR) และโมดูลการจัดการคลังสินค้า (Inventory) คุณสามารถเพิ่ม ลบ และแก้ไขข้อมูลได้จริงผ่านเมนูด้านบน</p>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
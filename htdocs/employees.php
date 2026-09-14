<?php
require 'config.php';
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }

// จัดการการลบข้อมูล (Delete)
if(isset($_GET['del'])) {
    $id = (int)$_GET['del'];
    $conn->query("DELETE FROM employees WHERE id = $id");
    header("Location: employees.php"); exit();
}

include 'header.php';
$result = $conn->query("SELECT * FROM employees ORDER BY id DESC");
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>ระบบจัดการบุคลากร (HR)</h4>
    <a href="employee_form.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> เพิ่มพนักงาน</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>รหัสพนักงาน</th>
                        <th>ชื่อ - นามสกุล</th>
                        <th>แผนก</th>
                        <th>ตำแหน่ง</th>
                        <th>เงินเดือน (บาท)</th>
                        <th class="text-center">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['emp_code']); ?></td>
                        <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                        <td><?php echo htmlspecialchars($row['department']); ?></td>
                        <td><?php echo htmlspecialchars($row['position']); ?></td>
                        <td><?php echo number_format($row['salary'], 2); ?></td>
                        <td class="text-center">
                            <a href="employee_form.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> แก้ไข</a>
                            <a href="employees.php?del=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('ยืนยันการลบ?');"><i class="bi bi-trash"></i> ลบ</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                    <?php if($result->num_rows == 0) echo "<tr><td colspan='6' class='text-center'>ไม่มีข้อมูล</td></tr>"; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
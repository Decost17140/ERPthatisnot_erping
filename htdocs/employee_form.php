<?php
require 'config.php';
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }

$id = $_GET['id'] ?? '';
$emp_code = $fullname = $department = $position = $salary = '';

// ถ้ามี ID แปลว่าเป็นการแก้ไข ให้ดึงข้อมูลเดิมมาแสดง
if($id) {
    $res = $conn->query("SELECT * FROM employees WHERE id = ".(int)$id);
    if($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $emp_code = $row['emp_code']; $fullname = $row['fullname'];
        $department = $row['department']; $position = $row['position']; $salary = $row['salary'];
    }
}

// จัดการเมื่อกดปุ่มบันทึก (Create & Update)
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emp_code = $conn->real_escape_string($_POST['emp_code']);
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $department = $conn->real_escape_string($_POST['department']);
    $position = $conn->real_escape_string($_POST['position']);
    $salary = (float)$_POST['salary'];

    if($id) {
        // Update
        $sql = "UPDATE employees SET emp_code='$emp_code', fullname='$fullname', department='$department', position='$position', salary='$salary' WHERE id=".(int)$id;
    } else {
        // Insert
        $sql = "INSERT INTO employees (emp_code, fullname, department, position, salary) VALUES ('$emp_code', '$fullname', '$department', '$position', '$salary')";
    }
    
    if($conn->query($sql)) {
        header("Location: employees.php"); exit();
    } else {
        $error = "เกิดข้อผิดพลาด: " . $conn->error;
    }
}
include 'header.php';
?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><?php echo $id ? 'แก้ไขข้อมูลพนักงาน' : 'เพิ่มพนักงานใหม่'; ?></h5>
            </div>
            <div class="card-body">
                <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                <form method="POST">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>รหัสพนักงาน</label>
                            <input type="text" name="emp_code" class="form-control" value="<?php echo htmlspecialchars($emp_code); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label>ชื่อ - นามสกุล</label>
                            <input type="text" name="fullname" class="form-control" value="<?php echo htmlspecialchars($fullname); ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label>แผนก</label>
                            <input type="text" name="department" class="form-control" value="<?php echo htmlspecialchars($department); ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label>ตำแหน่ง</label>
                            <input type="text" name="position" class="form-control" value="<?php echo htmlspecialchars($position); ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label>เงินเดือน</label>
                            <input type="number" step="0.01" name="salary" class="form-control" value="<?php echo htmlspecialchars($salary); ?>" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> บันทึกข้อมูล</button>
                    <a href="employees.php" class="btn btn-secondary">ยกเลิก</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
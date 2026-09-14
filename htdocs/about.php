<?php
require 'config.php';
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }
include 'header.php';
?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0"><i class="bi bi-journal-check"></i> ข้อมูลการส่งงานรายวิชา / สมาชิกกลุ่ม</h5>
    </div>
    <div class="card-body">
        <h5>รายชื่อสมาชิกในกลุ่ม (5 คน)</h5>
        <ul class="list-group mb-4">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                1. นาย ตรัยรัตน์ ประทีปคีรี เลขที่ 23 <span class="badge bg-primary rounded-pill">Project Manager / UI</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                2. นาย ฐิติวัชร์ เลิศทักษิณานนท์ เลขที่ 29 <span class="badge bg-info text-dark rounded-pill">HR Module (พนักงาน)</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                3. นาย ศรัณยพงศ์ เอกอัครพรพล เลขที่ 20 <span class="badge bg-success rounded-pill">Inventory Module (คลังสินค้า)</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                4. นาย บุณยกร เฉลิมพรวิทิต เลขที่ 12 <span class="badge bg-warning text-dark rounded-pill">Database / SQL</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                5. นาย สิรวิชญ์ ว่องกีรติกุล เลขที่ 28 <span class="badge bg-danger rounded-pill">Video Creator / Tester</span>
            </li>
        </ul>
        
        <h5>วิดีโอนำเสนอระบบ</h5>
        <div class="alert alert-secondary">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/U3ggYMMO4PU?si=bXPJaKSfWCpMxUM6" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <p class="mb-0"></p>
        </div>
        
        <a href="https://github.com/Decost17140/ERPthatisnot_erping" target="_blank" class="btn btn-dark"><i class="bi bi-github"></i> ดู Source Code ระบบบน GitHub</a>
    </div>
</div>
<?php include 'footer.php'; ?>

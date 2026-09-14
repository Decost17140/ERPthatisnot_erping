<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enterprise Resource Planning (ERP)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f6f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar { background-color: #2c3e50; }
        .navbar-brand, .nav-link { color: #ecf0f1 !important; }
        .nav-link:hover { color: #3498db !important; }
        .card { border-radius: 10px; border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php"><i class="bi bi-buildings"></i> ERP System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="index.php"><i class="bi bi-speedometer2"></i> แดชบอร์ด</a></li>
        <li class="nav-item"><a class="nav-link" href="employees.php"><i class="bi bi-people"></i> ระบบบุคลากร (HR)</a></li>
        <li class="nav-item"><a class="nav-link" href="products.php"><i class="bi bi-box-seam"></i> ระบบคลังสินค้า (Inventory)</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php"><i class="bi bi-info-circle"></i> ข้อมูลกลุ่ม/ส่งงาน</a></li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link text-warning" href="#"><i class="bi bi-person-circle"></i> <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
        <li class="nav-item"><a class="nav-link text-danger" href="logout.php"><i class="bi bi-box-arrow-right"></i> ออกจากระบบ</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">

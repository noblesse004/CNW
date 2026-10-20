<?php
if (!defined('APP_ROOT')) {
    require_once __DIR__ . '/../../config/config.php';
}
require_once APP_ROOT . '/app/services/PatientService.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $gender = $_POST['gender'] ?? 1;

    if (!empty($name)) {
        $patientService = new PatientService();
        $patientService->addPatient($name, $gender);
        header('Location: ' . DOMAIN . 'public/index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Bệnh Nhân</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 500px;">
    <h3 class="text-center text-uppercase text-success mb-4">Thêm mới bệnh nhân</h3>
    <form action="" method="POST">
        <div class="mb-3">
            <label class="form-label">Họ và tên</label>
            <input type="text" name="name" class="form-control" required placeholder="Nhập tên bệnh nhân">
        </div>
        <div class="mb-3">
            <label class="form-label">Giới tính</label>
            <select name="gender" class="form-select">
                <option value="1">Nam (1)</option>
                <option value="0">Nữ (0)</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success w-100">Lưu lại</button>
        <a href="<?= DOMAIN . 'public/index.php'; ?>" class="btn btn-secondary w-100 mt-2">Hủy bỏ</a>
    </form>
</div>
</body>
</html>
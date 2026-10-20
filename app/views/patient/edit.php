<?php
if (!defined('APP_ROOT')) {
    require_once __DIR__ . '/../../config/config.php';
}
require_once APP_ROOT . '/app/services/PatientService.php';

$id = $_GET['id'] ?? null;
$patientService = new PatientService();

if (!$id) {
    header('Location: ' . DOMAIN . 'public/index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $gender = $_POST['gender'] ?? 1;

    $patientService->updatePatient($id, $name, $gender);
    header('Location: ' . DOMAIN . 'public/index.php');
    exit();
}

$patient = $patientService->getPatientById($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Bệnh Nhân</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 500px;">
    <h3 class="text-center text-uppercase text-warning mb-4">Chỉnh sửa bệnh nhân</h3>
    <form action="" method="POST">
        <div class="mb-3">
            <label class="form-label">Họ và tên</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($patient ? $patient->getFullName() : ''); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Giới tính</label>
            <select name="gender" class="form-select">
                <option value="1" <?= ($patient && $patient->getGender() == 1) ? 'selected' : ''; ?>>Nam (1)</option>
                <option value="0" <?= ($patient && $patient->getGender() == 0) ? 'selected' : ''; ?>>Nữ (0)</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning w-100">Cập nhật</button>
        <a href="<?= DOMAIN . 'public/index.php'; ?>" class="btn btn-secondary w-100 mt-2">Hủy bỏ</a>
    </form>
</div>
</body>
</html>
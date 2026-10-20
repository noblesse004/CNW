<?php
if (!defined('APP_ROOT')) {
    require_once __DIR__ . '/../../config/config.php';
}
require_once APP_ROOT . '/app/services/PatientService.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $patientService = new PatientService();
    $patientService->deletePatient($id);
}

header('Location: ' . DOMAIN . 'public/index.php');
exit();
?>
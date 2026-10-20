<?php
require_once APP_ROOT . '/app/services/PatientService.php';

class PatientController {
    public function add() {
        include_once APP_ROOT . '/app/views/patient/add.php';
    }
}
?>
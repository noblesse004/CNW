<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once ('../app/config/config.php');
require_once APP_ROOT.'/app/libs/DbConnection.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index'; // Đã sửa lỗi gõ sai $aticon

if($controller == 'home'){
    require_once APP_ROOT.'/app/controllers/HomeController.php';
    $homeController = new HomeController();
    $homeController->$action(); // Thay index() thành $action() để gọi hàm linh hoạt
}else if($controller == 'patient'){
    require_once APP_ROOT. '/app/controllers/PatientController.php';
    $patientController = new PatientController();
    $patientController->$action(); // Thay index() thành $action() để gọi hàm linh hoạt
}else {
    echo 'Nothing';
}
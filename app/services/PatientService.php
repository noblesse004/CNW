<?php
require_once APP_ROOT . '/app/models/Patient.php';
require_once APP_ROOT . '/app/libs/DbConnection.php';

class PatientService {

    // 1. Lấy tất cả bệnh nhân
    public function getAllPatients() {
        $patients = [];
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "SELECT * FROM patients ORDER BY id DESC";
            $stmt = $conn->query($sql);

            while ($row = $stmt->fetch()) {
                $patient = new Patient($row['id'], $row['name'], $row['gender']);
                $patients[] = $patient;
            }
        }
        return $patients;
    }

    // 2. Lấy bệnh nhân theo ID
    public function getPatientById($id) {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "SELECT * FROM patients WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetch();

            if ($row) {
                return new Patient($row['id'], $row['name'], $row['gender']);
            }
        }
        return null;
    }

    // 3. Thêm mới bệnh nhân
    public function addPatient($name, $gender) {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "INSERT INTO patients (name, gender) VALUES (:name, :gender)";
            $stmt = $conn->prepare($sql);
            return $stmt->execute(['name' => $name, 'gender' => $gender]);
        }
        return false;
    }

    // 4. Cập nhật thông tin bệnh nhân
    public function updatePatient($id, $name, $gender) {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "UPDATE patients SET name = :name, gender = :gender WHERE id = :id";
            $stmt = $conn->prepare($sql);
            return $stmt->execute(['id' => $id, 'name' => $name, 'gender' => $gender]);
        }
        return false;
    }

    // 5. Xóa bệnh nhân
    public function deletePatient($id) {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "DELETE FROM patients WHERE id = :id";
            $stmt = $conn->prepare($sql);
            return $stmt->execute(['id' => $id]);
        }
        return false;
    }
}
?>
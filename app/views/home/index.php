<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">
        <h3 class="text-center text-uppercase text-success mt-3">Quan ly Điện Thoại</h3>
        <a href="<?= DOMAIN . 'app/views/patient/add.php'; ?>" class="btn btn-success mb-3">ADD</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name_Prod</th>
                    <th scope="col">Calculating</th>
                    <th scope="col">Des</th>
                    <th scope="col">EDIT</th>
                    <th scope="col">DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($patients as $patient): ?> 
                    <tr>
                        <th scope="row"><?= $patient->getID(); ?></th>
                        <td><?= $patient->getFullName(); ?></td>
                        <td><?= $patient->getGender(); ?></td>
                        <td>
                            <a href="<?= DOMAIN . 'app/views/patient/edit.php?id=' . $patient->getID(); ?>">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td>
                            <a href="<?= DOMAIN . 'app/views/patient/delete.php?id=' . $patient->getID(); ?>" onclick="return confirm('Ban co chac chan muon xoa?');">
                                <i class="bi bi-trash3"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
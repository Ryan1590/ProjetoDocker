<?php
require_once '../../../config.php';
require_once '../../../src/actions/user.php';
require_once '../../../src/modules/messages.php';
require_once '../partials/header.php';
$users = readUserAction($conn);

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="container mt-5">
    <div class="row mb-3 justify-content-between align-items-center">
        <div class="col">
            <a href="../../../" class="text-decoration-none"><h1>Users - Lista</h1></a>
        </div>
        <div class="col-auto">
            <a class="btn btn-success" href="./create.php">New</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <?php if(isset($_GET['message'])): ?>
                <div class="alert alert-info">
                    <?= htmlspecialchars($_GET['message']); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>TELEFONE</th>
                <th>AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['phone']) ?></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="./edit.php?id=<?= $row['id'] ?>">Editar</a>
                    <a class="btn btn-danger btn-sm" href="./delete.php?id=<?= $row['id'] ?>">Remover</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<?php require_once '../partials/footer.php'; ?>
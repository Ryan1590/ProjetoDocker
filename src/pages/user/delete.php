<?php
require_once '../../../config.php';
require_once '../../actions/user.php';
require_once '../partials/header.php';

if(isset($_POST['id']))
    deleteUserAction($conn, $_POST['id']);

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container mt-5">
    <div class="row mb-3 justify-content-between align-items-center">
        <div class="col">
            <a href="../../../index.php" class="text-decoration-none"><h1>Users - Delete</h1></a>
        </div>
        <div class="col-auto">
            <a class="btn btn-success" href="../../../index.php">Voltar</a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <form action="../../pages/user/delete.php" method="POST">
                        <p class="mb-4">Tem certeza que deseja remover esse usuario?</p>
                        <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id']) ?>" required/>

                        <div class="d-grid gap-2">
                            <button class="btn btn-danger" type="submit">Sim, remover</button>
                            <a href="../../../index.php" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<?php require_once '../partials/footer.php'; ?>
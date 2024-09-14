<?php
require_once '../../../config.php';
require_once '../../actions/user.php';
require_once '../partials/header.php';

if (isset($_POST["id"], $_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"]))
    updateUserAction($conn, $_POST["id"], $_POST["name"], $_POST["email"], $_POST["phone"]);

$user = findUserAction($conn, $_GET['id']);

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="container mt-5">
    <div class="row mb-3 justify-content-between align-items-center">
        <div class="col">
            <a href="../../../index.php" class="text-decoration-none"><h1>Users - Editar</h1></a>
        </div>
        <div class="col-auto">
            <a class="btn btn-success" href="../../../index.php">Voltar</a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="../../pages/user/edit.php" method="POST">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>" required/>
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" id="name" name="name" class="form-control" value="<?= htmlspecialchars($user['name']) ?>" required/>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required/>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefone</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="<?= htmlspecialchars($user['phone']) ?>" required/>
                        </div>

                        <button class="btn btn-success w-100" type="submit">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<?php require_once '../partials/footer.php'; ?>
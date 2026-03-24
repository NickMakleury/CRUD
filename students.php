<?php
require __DIR__ . "/connect.php";

$pdo = Connect::getInstance();
$stmt = $pdo->query("SELECT * FROM users ORDER BY id ASC");
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Alunos Cadastrados</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/themes/gti.css">
    <link rel="stylesheet" href="assets/css/themes/contabeis.css">
    <link rel="stylesheet" href="assets/css/themes/direito.css">
    <link rel="stylesheet" href="assets/css/themes/enfermagem.css">
    <link rel="stylesheet" href="assets/css/themes/fisio.css">
    <link rel="stylesheet" href="assets/css/themes/nutricao.css">
    <link rel="stylesheet" href="assets/css/themes/odonto.css">
    <link rel="stylesheet" href="assets/css/themes/pedagogia.css">
    <link rel="stylesheet" href="assets/css/themes/psico.css">
    <link rel="stylesheet" href="assets/css/themes/vet.css">
</head>

<<body class="theme-default students-page">

    <main class="page">
        <section class="register-shell">
            <div class="register-card">

                <div class="register-header">
                    <h1>Alunos Cadastrados</h1>
                    <a href="index.php" class="access-btn">Voltar</a>
                </div>

                <?php if (isset($_GET['success'])): ?>
                    <div class="success-message">
                        <?php
                        if ($_GET['success'] === 'updated') {
                            echo "Aluno atualizado com sucesso!";
                        } elseif ($_GET['success'] === 'deleted') {
                            echo "Aluno excluído com sucesso!";
                        }
                        ?>
                    </div>
                <?php endif; ?>

                <table class="students-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Curso</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $user["id"] ?></td>
                                <td><?= htmlspecialchars($user["name"]) ?></td>
                                <td><?= htmlspecialchars($user["email"]) ?></td>
                                <td><?= htmlspecialchars($user["course"]) ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $user["id"] ?>">Editar</a> |
                                    <a href="delete.php?id=<?= $user["id"] ?>" onclick="return confirm('Excluir?')">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>

            </div>
        </section>
    </main>
    <script src="assets/js/script.js"></script>
    </body>

</html>
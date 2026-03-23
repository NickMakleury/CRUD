<?php

/**
 * Inclui o arquivo de conexão com o banco de dados.
 */
require __DIR__ . "/connect.php";

/**
 * Captura o parâmetro "id" enviado pela URL
 * e valida se ele é um número inteiro válido.
 *
 * Exemplo de URL:
 * edit.php?id=3
 */
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

/**
 * Se o ID não for válido, o script é interrompido.
 */
if (!$id) {
    die("ID inválido.");
}

/**
 * Obtém a conexão com o banco de dados.
 */
$pdo = Connect::getInstance();

/**
 * Prepara a consulta SQL para buscar apenas um usuário
 * com o ID informado.
 *
 * LIMIT 1 reforça que apenas um registro será retornado.
 */
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");

/**
 * Executa a consulta, passando o valor do ID.
 */
$stmt->execute([":id" => $id]);

/**
 * Busca o primeiro registro encontrado.
 * Como o ID é único, esperamos apenas um usuário.
 */
$user = $stmt->fetch();

/**
 * Se nenhum aluno for encontrado, interrompe a execução.
 */
if (!$user) {
    die("Aluno não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar aluno</title>
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

<body class="theme-default">

    <main class="page">
        <section class="register-shell">
            <div class="register-card">
                <div class="window-top">
                    <span class="dot red"></span>
                    <span class="dot yellow"></span>
                    <span class="dot green"></span>
                </div>

                <div class="register-header">
                    <div>
                        <p class="eyebrow">Painel acadêmico</p>
                        <h1>Editar aluno</h1>
                        <p class="subtitle">Atualize os dados do aluno cadastrado no sistema.</p>
                    </div>

                    <a href="students.php" class="access-btn">Voltar</a>
                </div>

                <!--
                    Formulário responsável por enviar os dados atualizados
                    para o arquivo update.php.
                -->
                <form action="update.php" method="post" class="register-form">
                    <!--
                        Campo oculto que envia o ID do aluno.
                        Ele é necessário para que o update.php saiba
                        qual registro deve ser atualizado.
                    -->
                    <input type="hidden" name="id" value="<?= $user["id"] ?>">

                    <div class="field-group">
                        <label for="name">Nome</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            value="<?= htmlspecialchars($user["name"]) ?>"
                            required>
                    </div>

                    <div class="field-group">
                        <label for="email">E-mail</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            value="<?= htmlspecialchars($user["email"]) ?>"
                            required>
                    </div>

                    <div class="field-group select-field">
                        <label for="course">Curso</label>
                        <select name="course" id="course" required>
                            <option value="contabeis" <?= $user["course"] === "contabeis" ? "selected" : "" ?>>Ciências Contábeis</option>
                            <option value="direito" <?= $user["course"] === "direito" ? "selected" : "" ?>>Direito</option>
                            <option value="enfermagem" <?= $user["course"] === "enfermagem" ? "selected" : "" ?>>Enfermagem</option>
                            <option value="fisioterapia" <?= $user["course"] === "fisioterapia" ? "selected" : "" ?>>Fisioterapia</option>
                            <option value="gti" <?= $user["course"] === "gti" ? "selected" : "" ?>>GTI</option>
                            <option value="veterinaria" <?= $user["course"] === "veterinaria" ? "selected" : "" ?>>Veterinária</option>
                            <option value="nutricao" <?= $user["course"] === "nutricao" ? "selected" : "" ?>>Nutrição</option>
                            <option value="odontologia" <?= $user["course"] === "odontologia" ? "selected" : "" ?>>Odontologia</option>
                            <option value="pedagogia" <?= $user["course"] === "pedagogia" ? "selected" : "" ?>>Pedagogia</option>
                            <option value="psicologia" <?= $user["course"] === "psicologia" ? "selected" : "" ?>>Psicologia</option>
                        </select>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="primary-btn">Atualizar</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <script src="assets/js/script.js"></script>
</body>

</html>
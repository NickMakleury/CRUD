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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
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

    <div class="course-background">
        <div class="bg-glow bg-glow-1"></div>
        <div class="bg-glow bg-glow-2"></div>

        <div class="course-visual">
            <img src="" alt="" class="course-logo" id="courseLogo">
        </div>
    </div>

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
                        <h1>Cadastro de Alunos</h1>
                        <p class="subtitle">Preencha os dados do aluno e selecione o curso para finalizar cadastrp.</p>
                    </div>

                    <a href="students.php" class="access-btn" id="accessBtn">Acessar</a>
                </div>

                <form action="store.php" method="post" class="register-form">
                    <div class="field-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name" placeholder="Digite o nome do aluno" required>
                    </div>

                    <div class="field-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" placeholder="Digite o e-mail" required>
                    </div>

                    <div class="field-group select-field">
                        <label for="course">Curso</label>
                        <select name="course" id="course" required>
                            <option value="">Selecione o curso</option>
                            <option value="contabeis">Ciências Contábeis</option>
                            <option value="direito">Direito</option>
                            <option value="enfermagem">Enfermagem</option>
                            <option value="fisioterapia">Fisioterapia</option>
                            <option value="gti">GTI</option>
                            <option value="veterinaria">Veterinária</option>
                            <option value="nutricao">Nutrição</option>
                            <option value="odontologia">Odontologia</option>
                            <option value="pedagogia">Pedagogia</option>
                            <option value="psicologia">Psicologia</option>
                        </select>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="primary-btn">Cadastrar</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <script src="assets/js/script.js"></script>
</body>

</html>
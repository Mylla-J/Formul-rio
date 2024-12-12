<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $dataNascimento = htmlspecialchars($_POST['data-nascimento']);
    $genero = htmlspecialchars($_POST['genero']);
    $interesses = isset($_POST['interesses']) ? $_POST['interesses'] : [];
    $nivelConhecimento = htmlspecialchars($_POST['nivel-conhecimento']);
    $ultimoObservatorio = htmlspecialchars($_POST['ultimo-observatorio']);
    $sistemaFavorito = htmlspecialchars($_POST['favorito-sistema-planetario']);
    $constelacoes = isset($_POST['constelacoes']) ? $_POST['constelacoes'] : [];
    $horarioPreferido = htmlspecialchars($_POST['horario-preferido']);

    if (isset($_FILES['upload-documento']) && $_FILES['upload-documento']['error'] == 0) {
        $arquivoNome = basename($_FILES['upload-documento']['name']);
        $caminhoTemporario = $_FILES['upload-documento']['tmp_name'];
        $caminhoDestino = "uploads/" . $arquivoNome;

        if (!file_exists("uploads")) {
            mkdir("uploads", 0777, true); 
        }

        move_uploaded_file($caminhoTemporario, $caminhoDestino);
    } else {
        $arquivoNome = "Nenhum arquivo enviado ou houve um erro.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Recebidos</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Dados Recebidos com Sucesso 🚀</h1>
    </header>
    <main>
        <h2>✨Aqui estão as informações enviadas:</h2>
        <ul>
            <li><strong>Nome:</strong> <?php echo $nome; ?></li>
            <li><strong>Email:</strong> <?php echo $email; ?></li>
            <li><strong>Senha:</strong> <?php echo $senha; ?></li>
            <li><strong>Telefone:</strong> <?php echo $telefone; ?></li>
            <li><strong>Data de Nascimento:</strong> <?php echo $dataNascimento; ?></li>
            <li><strong>Gênero:</strong> <?php echo $genero; ?></li>
            <li><strong>Interesses Principais:</strong> <?php echo implode(", ", $interesses); ?></li>
            <li><strong>Nível de Conhecimento:</strong> <?php echo $nivelConhecimento; ?></li>
            <li><strong>Último Observatório Visitado:</strong> <?php echo $ultimoObservatorio; ?></li>
            <li><strong>Sistema Planetário Favorito:</strong> <?php echo $sistemaFavorito; ?></li>
            <li><strong>Constelações Favoritas:</strong> <?php echo implode(", ", $constelacoes); ?></li>
            <li><strong>Horário Preferido para Aulas:</strong> <?php echo $horarioPreferido; ?></li>
            <li><strong>Arquivo Enviado:</strong> <?php echo $arquivoNome; ?></li>
        </ul>
        <a href="index.html">🔙 Voltar ao Formulário</a>
    </main>
    <footer>
        <p>IFRN Campus Santa Cruz</p>
        <p>✨Obrigado por se inscrever!✨</p>
    </footer>
</body>
</html>


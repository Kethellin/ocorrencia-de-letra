<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Contador de Letras</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Contador de Letras</h1>
        <p class="text-center">Teste agora e descubra quantas letras definidas tem no seu texto!</p>
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <form method="POST">
                    <div class="mb-3">
                        <label for="texto" class="form-label">Digite algo:</label>
                        <input type="text" name="texto" id="texto" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary mx-auto d-block">Verificar</button>
                </form>
            </div>
        </div>

        <?php 
            $letras_para_contar = ['a'];

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $texto      = strtolower($_POST['texto']);
                $resultados = [];

                foreach ($letras_para_contar as $letra) {
                    $quantidade         = substr_count($texto, $letra);
                    $resultados[$letra] = $quantidade;
                }

                $mensagem = $quantidade > 0 ? "aparece $quantidade vez(es)" : "não aparece";
        ?>
            <div class="row justify-content-center mt-4">
                <div class="col-md-6">
                    <div class="alert alert-info">
                        <ul>
                            <?php 
                                foreach ($resultados as $letra => $quantidade){
                                    echo "<li>A letra '$letra' $mensagem no texto.</li>";
                                }; 
                            ?>
                        </ul>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

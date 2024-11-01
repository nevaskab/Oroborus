<!DOCTYPE html>
    <html lang="pt-br">
        <?php include('layouts\header.php'); ?>
        <body>
            <div class= "container mt-5">
                <header>
                    <h1 class="text-center">Resultado do Signo</h1>
                </header>

                <?php
                    $data_nascimento = $_POST['data_nascimento'];

                    $signos = simplexml_load_file("signos.xml");

                    list($ano, $mes, $dia) = explode ("-", $data_nascimento);

                    function obterSigno($dia, $mes, $signos){
                        foreach($signos->signo as $signo){
                            $dataInicio = DateTime::createFromFormat('d/m', (string)$signo->dataInicio);
                            $dataFim = DateTime::createFromFormat('d/m', (string)$signo->dataFim);
                            $dataNascimento = DateTime::createFromFormat('d/m', "$dia/$mes");

                            if(($dataNascimento >= $dataInicio && $dataNascimento <= $dataFim) || ($signo->dataInicio == '22/12' && ($dataNascimento >= $dataInicio || $dataNascimento <= $dataFim))){
                                return ["signo" => (string)$signo->signoNome, "descricao" => (string)$signo->descricao];
                            }
                        }
                        return null;
                    }

                    $signo = obterSigno((int)$dia, (int)$mes, $signos);

                    if ($signo) {
                        echo "<div class='alert alert-info text-center'>";
                        echo "<h2>Seu signo: " . $signo["signo"] . "</h2>";
                        echo "<p>" . $signo["descricao"] . "</p>";
                        echo "<img class='imagem1' src='" . realpath($signo["imagem1"]) . "' alt='" . $signo["signo"] . "'>";
                        echo "<img class='imagem2' src='" . realpath($signo["imagem2"]) . "' alt='" . $signo["signo"] . "'>";
                        echo "</div>";
                    }

                    else{
                        echo "<div class= 'alert alert-warning text-center'>Não foi possível determinar o signo.</div>";
                    }
                ?>
            </div>

            <script>src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"</script>
        </body>
    </html>
<!DOCTYPE html>
    <html lang="pt-br">
        <?php include('layouts\header.php'); ?>
        <body>
            <div class= "container mt-5">
                <header>
                    <h1 class="text-center">Descubra seu signo</h1>
                </header>

                <form id="sign-form" method= "POST" action="show_zodiac_sign.php" class="mt-4">

                    <div class="mb-4">
                        <label for="data_nascimento">Data de nascimento: </label>
                        <input type="date" id="data_nascimento" name="data_nascimento" required>
                    </div>
                    
                    <button type="submit" class= "btn btn-primary">Descobrir signo</button>
                </form>
            </div>

            <script>src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"</script>
        </body>
    </html>
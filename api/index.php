<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário PHP</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
    body {
        font-family: 'Montserrat', sans-serif;
    }

    .form-control:focus {
        outline: none;
        box-shadow: none;
    }

    .form-control::placeholder {
        color: #555;
        opacity: 1;
    }

    .input-group-text {
        width: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .input-group {
        transition: all 0.2s ease-in-out;
    }

    .input-group:focus-within {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        transform: scale(1.05);
    }
    </style>
</head>

<body>
    <main class="d-flex flex-column justify-content-center align-items-center vh-100">
        <div class="bg-light rounded-5 p-5 w-50 shadow">
            <header class="container text-center mb-4">
                <h1 class="text-dark display-1">Formulário PHP</h1>
            </header>
            <div class="container w-70">
                <form action="index.php" method="post">
                    <div class="mb-3 input-group">
                        <span class="input-group-text bg-dark"><i class="fa-solid fa-user text-white"></i></span>
                        <input type="text" class="form-control bg-light text-dark border-2 border-dark" id="nome"
                            name="nome" placeholder="Nome">
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text bg-dark"><i class="fa-solid fa-envelope text-white"></i></span>
                        <input type="email" class="form-control bg-light text-dark border-2 border-dark" id="email"
                            name="email" placeholder="Email">
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text bg-dark"><i class="fa-solid fa-heading text-white"></i></span>
                        <input type="text" class="form-control bg-light text-dark border-2 border-dark" id="assunto"
                            name="assunto" placeholder="Assunto">
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text bg-dark"><i class="fa-solid fa-comment text-white"></i></span>
                        <textarea class="form-control bg-light text-dark border-2 border-dark" id="mensagem"
                            name="mensagem" placeholder="Mensagem"></textarea>
                    </div>

                    <!-- Código PHP -->
                    <?php
                    $receiver = "";
                    if(isset($_POST['enviar'])){
                        $receiver = $_POST['email'];
                        $subject = $_POST['assunto'];
                        $message = $_POST['mensagem'];
                        $sender = "From: guipassos2001@gmail.com";

                        if(empty($receiver) || empty($subject) || empty($message)){
                            ?>
                    <div class="alert alert-danger text-center">
                        <?php echo "Todos os campos devem ser preenchidos" ?>
                    </div>
                    <?php
                        }else{
                            if(mail($receiver, $subject, $message, $sender)){
                                ?>
                    <div class="alert alert-success text-center">
                        <?php echo "Mensagem enviada com sucesso"?>
                    </div>
                    <?php
                                $receiver = "";
                            }else{
                                ?>
                    <div class="alert alert-danger text-center">
                        <?php echo "Falha ao enviar a mensagem" ?>
                    </div>
                    <?php
                            }
                        }
                    }
                    ?>
                    <!-- Fim do Código PHP -->

                    <button type="submit" name="enviar" class="btn btn-success w-25 d-block mx-auto">Enviar</button>
                </form>
            </div>
        </div>
    </main>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

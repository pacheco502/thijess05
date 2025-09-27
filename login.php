<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THIJESS - CRM Salão de Beleza</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/img//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/img//favicon-16x16.png">
    <link rel="manifest" href="./assets/img//site.webmanifest">
</head>
<body class="min-h-screen relative overflow-hidden bg-gray-900">
    <!-- Imagem de Fundo -->
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat z-0"
        style="background-image: url('./assets/img/background.jpeg')">
        <div class="absolute inset-0 bg-black/50"></div>
    </div>

    <!-- Container -->
    <div id="loginContainer" class="relative z-10 flex items-center justify-center min-h-screen p-4">
        <div id="loginCard" 
            class="w-full max-w-sm p-6 bg-white/90 backdrop-blur-lg rounded-3xl shadow-2xl transition-all duration-700">
            
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="./assets/img/logo.gif" alt="Logo ThiJess" 
                    class="w-32 h-32 rounded-full object-cover border-4 border-indigo-500 shadow-lg">
            </div>

            <!-- Mensagem de erro via GET -->
            <?php if (isset($_GET['erro'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">Login ou senha inválidos.</span>
                </div>
            <?php endif; ?>

            <!-- Formulário de login -->
            <form action="index.php" method="POST">
                <div class="mb-4">
                    <label class="block text-violet-700 text-sm font-bold mb-2" for="email">
                        E-mail
                    </label>
                    <input type="email" id="email" name="email" placeholder="Digite seu e-mail"
                        class="w-full p-3 border border-violet-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                </div>

                <div class="relative">
                    <input type="password" id="senha" name="senha" placeholder="Digite sua senha"
                        class="w-full p-3 pr-10 border border-violet-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                    <button type="button" onclick="toggleSenha()" 
                        class="absolute inset-y-0 right-0 px-3 flex items-center focus:outline-none">
                        <i id="iconSenha" class="fa-solid fa-eye text-violet-600 hover:text-violet-800 transition"></i>
                    </button>
                </div>
                <br>

                <button type="submit" name="login" value="login"
                    class="w-full bg-violet-500 text-white p-3 rounded-lg hover:bg-violet-600 transition duration-300">
                    Entrar
                </button>
            </form>

            <!-- Links -->
            <div class="text-center mt-4">
                <a href="index.php?pagina=recuperar" class="text-indigo-500 hover:underline mr-2">Esqueceu sua senha?</a><br>
                <a href="index.php?pagina=registrar" class="text-indigo-500 hover:underline">Registrar-se</a>
            </div>
        </div>
    </div>

    <script src="js/scripts.js"></script>
    <script>
    function toggleSenha() {
        const senhaInput = document.getElementById("senha");
        const icon = document.getElementById("iconSenha");

        if (senhaInput.type === "password") {
            senhaInput.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            senhaInput.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
    </script>


</body>
</html>

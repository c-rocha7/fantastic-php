<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Ambiente Docker Completo</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 2em;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h3 {
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        .status {
            padding: 10px;
            margin-top: 10px;
            border-radius: 4px;
            font-weight: bold;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Ambiente de Desenvolvimento Docker</h1>
        <p>Olá! Seu ambiente com Nginx, PHP, MySQL e Redis está funcionando.</p>

        <h3>Status da Conexão com o MySQL</h3>
        <?php
        $host = 'db';
        $dbname = 'meu_banco';
        $user = 'user';
        $password = 'user_password';

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<p class='status success'>Conexão com o banco de dados '$dbname' bem-sucedida!</p>";
        } catch (PDOException $e) {
            echo "<p class='status error'>Erro na conexão com MySQL: " . $e->getMessage() . "</p>";
        }
        ?>

        <h3>Status da Conexão com o Redis</h3>
        <?php
        try {
            $redis = new Redis();
            // O nome do host é o nome do serviço Redis: 'redis'
            $redis->connect('redis', 6379);

            // Testa a conexão com o comando PING
            $response = $redis->ping();

            if ($response == '+PONG' || $response == 'PONG') {
                echo "<p class='status success'>Conexão com o Redis bem-sucedida! (Resposta: $response)</p>";
            } else {
                echo "<p class='status error'>Resposta inesperada do Redis: " . $response . "</p>";
            }
        } catch (Exception $e) {
            echo "<p class='status error'>Erro na conexão com Redis: " . $e->getMessage() . "</p>";
        }
        ?>
    </div>
</body>

</html>

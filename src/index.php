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
        <p>Olá! Seu ambiente com Nginx, PHP, MySQL, PostgreSQL e Redis está funcionando.</p>

        <h3>Status da Conexão com o MySQL</h3>
        <?php
        // Lendo as credenciais do MySQL a partir das variáveis de ambiente
        $db_host_mysql = getenv('DB_HOST_MYSQL');
        $db_name_mysql = getenv('DB_DATABASE_MYSQL');
        $db_user_mysql = getenv('DB_USER_MYSQL');
        $db_pass_mysql = getenv('DB_PASSWORD_MYSQL');

        try {
            $conn = new PDO("mysql:host=$db_host_mysql;dbname=$db_name_mysql", $db_user_mysql, $db_pass_mysql);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<p class='status success'>Conexão com o MySQL bem-sucedida!</p>";
        } catch (PDOException $e) {
            echo "<p class='status error'>Erro na conexão com MySQL: " . $e->getMessage() . "</p>";
        }
        ?>

        <h3>Status da Conexão com o PostgreSQL</h3>
        <?php
        // Lendo as credenciais do PostgreSQL a partir das variáveis de ambiente
        $db_host_pg = getenv('DB_HOST_POSTGRES');
        $db_name_pg = getenv('DB_DATABASE_POSTGRES');
        $db_user_pg = getenv('DB_USER_POSTGRES');
        $db_pass_pg = getenv('DB_PASSWORD_POSTGRES');

        try {
            $connPg = new PDO("pgsql:host=$db_host_pg;dbname=$db_name_pg", $db_user_pg, $db_pass_pg);
            $connPg->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<p class='status success'>Conexão com o PostgreSQL bem-sucedida!</p>";
        } catch (PDOException $e) {
            echo "<p class='status error'>Erro na conexão com PostgreSQL: " . $e->getMessage() . "</p>";
        }
        ?>

        <h3>Status da Conexão com o Redis</h3>
        <?php
        // Lendo as credenciais do Redis a partir das variáveis de ambiente
        $redis_host = getenv('REDIS_HOST');
        $redis_port = getenv('REDIS_PORT');

        try {
            $redis = new Redis();
            $redis->connect($redis_host, $redis_port);
            $response = $redis->ping();

            if ($response == '+PONG' || $response == 'PONG') {
                echo "<p class='status success'>Conexão com o Redis bem-sucedida!</p>";
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

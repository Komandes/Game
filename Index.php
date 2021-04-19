<?php 
/*Jest jakiś problem z $smarty = new Smarty(); ale nie wiem co*/
    session_start(); 
    require('Smarty/Smarty.class.php');
    $smarty = new Smarty();
    
    $smarty->setTemplateDir('smarty/templates');
    $smarty->setCompileDir('smarty/templates_c');
    $smarty->setCacheDir('smarty/cache');
    $smarty->setConfigDir('smarty/configs');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="Looks.css">
</head>
<body>
<?php
   /*LOG-OUT*/
   if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'logout') {
    session_destroy();
    header("Location: Index.php");
}
if (isset($_REQUEST['action']) && isset($_REQUEST['email']) && isset($_REQUEST['password'])) 
{
    

    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $action = $_REQUEST['action'];
    $db = new mysqli('localhost', 'root', '', 'chess');
    if ($db->errno) {
        throw new RuntimeException('mysqli error: ' . $db->errno);
    }

/*register*/
    
if ($action == 'register') {
    $query = $db->prepare("INSERT INTO user (id, email, password) VALUES (NULL, ?, ?)");
    $password = password_hash($password, PASSWORD_ARGON2I);
    $query->bind_param('ss', $email, $password);
    $result = $query->execute();
    if ($result) 
        echo "Konto utworzone";
    else
    {
        if ($query->errno == 1062) 
            echo "Takie konto już istnieje";
        else 
          echo "Błąd";
        
    }
    
}

/*login*/
    
if ($action == 'login') {
    $query = $db->prepare("SELECT ID, password FROM user WHERE email = ? LIMIT 1");
    $query->bind_param('s', $email);
    $query->execute();
    $result = $query->get_result();
    $userRow = $result->fetch_assoc();
    $passwordCorrect = password_verify($password, $userRow['password']);
    if($passwordCorrect){
    echo "Dobrze Zalogowano";
        $_SESSION['user_ID'] = $userRow['ID'];
        $_SESSION['user_email'] = $email;
    }
    else 
        echo "Chujowo";
    
        

    }
}

/*Ten cały shit z logowaniem i rejestrowaniem, Plansza jest robiona po udanym zalogowaniu*/
?>

    <div class="container">
    <?php if(!isset($_SESSION['user_ID']) && !isset($_SESSION['user_email'])) : ?>
        <div class="row">
            <div class="col-4 offset-4">
                <h1 class="text.center mb-3">Rejestracja</h1>
                <form action="Index.php" method="post">
                    <input type="hidden" name="action" value="register">
                    <label class="form-label" for="emailInput">E-mail</label>
                    <Input class="form-control mb-3" type="email" name="email" id="emailInput" required>
                    <label class="form-label" for="passwordInput">Password</label>
                    <input class="form-control mb-3" type="password" name="password" id="passwordInput">
                    <button class="btn btn-primary w-100" type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4 offset-4">
                <h1 class="text.center mb-3">Logowanie</h1>
                <form action="Index.php" method="post">
                    <input type="hidden" name="action" value="login">
                    <label class="form-label" for="emailInput">E-mail</label>
                    <Input class="form-control mb-3" type="email" name="email" id="emailInput" required>
                    <label class="form-label" for="passwordInput">Password</label>
                    <input class="form-control mb-3" type="password" name="password" id="passwordInput">
                    <button class="btn btn-primary w-100" type="submit">Zaloguj</button>
                </form>
            </div>
        </div>
        <?php else : ?>
        <div class="row mt-5">
            <div class="col-4 offset-4">
                <p>Id urzytkownika: <?php echo $_SESSION['user_ID']; ?></p>
                <p>Email urzytkownika: <?php echo $_SESSION['user_email']; ?></p>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="logout">
                    <button type="submit" class="btn btn-primary">Wyloguj</button>
                </form>
                <?php
    require('class/GameGuts.php');
    $gm = new GameMenager();

    echo $gm->getboardHTML();
    
?>
                
            </div>
        </div>
        <?php endif; ?>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>    
</body>
</html>
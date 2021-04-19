<?php 
    /*Smarty*/
    require('class/GameGuts.php');
    session_start(); 
    require('Smarty/Smarty.class.php');
    $smarty = new Smarty();
    
    $smarty->setTemplateDir('Smarty/templates');
    $smarty->setCompileDir('Smarty/templates_c');
    $smarty->setCacheDir('Smarty/cache');
    $smarty->setConfigDir('Smarty/configs');

    if(isset($_REQUEST['action'])){
        $action = $_REQUEST['action'];
        $db = new mysqli('localhost', 'root', '', 'chess');
        if ($db->errno) 
            throw new RuntimeException('mysqli error: ' . $db->errno);
        /* switch odpowiadający za logowanie, rejestrowanie i wylogowywanie*/
        switch($action){
            /* wylogowywanie */
            case 'logout':
                $smarty->assign('info', "wylogowano poprawnie");
                $smarty->display('index.tpl');
                break;
                /* rejestrowanie */
            case 'register':
                if (!isset($_REQUEST['email']) && !isset($_REQUEST['password']))
                $smarty->display('register.tpl');
            else {
                $email = $_REQUEST['email'];
                $password = $_REQUEST['password'];
    $query = $db->prepare("INSERT INTO user (id, email, password) VALUES (NULL, ?, ?)");
    $password = password_hash($password, PASSWORD_ARGON2I);
    $query->bind_param('ss', $email, $password);
    $result = $query->execute();
    if ($result) 
    $smarty->assign('info', "Konto utworzone");
    else{
        if ($query->errno == 1062) 
            $smarty->assign('info', "Takie konto już istnieje");
        else 
        $smarty->assign('info', "Błąd w trakcie tworzenia konta");
    }
    $smarty->display('index.tpl');
}
                break;
                        /* logowanie */
                case 'login':
                    if (!isset($_REQUEST['email']) && !isset($_REQUEST['password']))
                    $smarty->display('login.tpl');
                else {
                    $email = $_REQUEST['email'];
                    $password = $_REQUEST['password'];
                   
                        $query = $db->prepare("SELECT ID, password FROM user WHERE email = ? LIMIT 1");
                        $query->bind_param('s', $email);
                        $query->execute();
                        $result = $query->get_result();
                        $userRow = $result->fetch_assoc();
                        $passwordCorrect = password_verify($password, $userRow['password']);
                        if($passwordCorrect){
                            $smarty->assign('info',"Dobrze Zalogowano");
                            $_SESSION['user_ID'] = $userRow['ID'];
                            $_SESSION['user_email'] = $email;
                            $smarty->assign('ID', $_SESSION['user_ID']);   
                    $smarty->assign('email', $_SESSION['user_email']);
                    $smarty->display('internal.tpl');
                    
                        } else {
                        $smarty->assign('info',"Chujowo");
                        $smarty->display('index.tpl');    
                        }
                        }
                break;
                default: throw new RuntimeException("Nieprawitłowy parametr 'action'");
                break;
            
        }
    }
    else if(isset($_REQUEST['user_ID'])){/* zalogowany */
        $smarty->assign('ID', $_SESSION['user_ID']);
        $smarty->assign('email', $_SESSION['user_email']);
        $smarty->display('internal.tpl');
    
    }
    else{/* nie zalogowany*/
        $smarty->display('index.tpl');

    }
    
?>

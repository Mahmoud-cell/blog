 <?php 
    include(ROOT_PATH . "/app/database/db.php"); //#1
    // isset() mean if i click btn that have form method post
    if (isset($_POST['register-btn'])) {
        
        unset($_POST['register-btn'], $_POST['passwordConf']);
        $_POST['admin'] = 0;
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_id = create('users', $_POST); //_post restores data
        $user = selectOne('users', ['id' => $user_id]);// remember selectOne fn is show selected row only
        
        dd($user); // so we have to import the "dd" function that where db.php file #1
    }
?>
/*this file for users login, log out and register*/
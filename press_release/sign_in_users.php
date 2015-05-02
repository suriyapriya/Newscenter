<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../style.css"/>
        <title>sign-in</title>
    </head>
    <body>
        <div id="main">
        <?php
        if(!empty($message)){
        ?> <h1><?php echo $message ?></h1>
        <?php }
            ?>
        <form action="index.php" method="post" id="sign-in">
               Username: <input type="text" name="username" value="<?php if (!empty($username)) {echo $username;} ?>"/><br/>
               Password: <input type="password" name='password'/><br/>
                <input type="hidden" name="action" value="sign-in" />
                <input type="submit" value="sign-in" />
            <br />
        </form>        
        <p><a href="?action=sign-up">sign up</a></p>
        </div>
    </body>
</html>

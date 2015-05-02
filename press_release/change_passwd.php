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
        <title>Change password</title>
    </head>
    <body>
        <?php
        if(!empty($message)){
        ?> <h1><?php echo $message ?></h1>
        <?php }
        include 'sidebar.php'; ?>
        <div id="main">
        <form action="index.php" method="post" id="sign-in">
            Current password: <input type="password" name='current_passwd'/><br/>
            New password: <input type="password" name='new_passwd'/><br/>
            <input type="hidden" name="action" value="change_password" />
            <input type="hidden" name="value" value="save"/>
            <input type="submit" value="save" />
            <br/>
        </form>
        </div>
    </body>
</html>

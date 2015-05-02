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
        <title>Sign up page</title>
    </head>
    <body>
        <?php
        if(!empty($message)){
        ?> <h1><?php echo $message ?></h1>
        <?php }
        ?>
        <div id="main">
        <form action="index.php" method="post">
           Username: <input type="text" name="username" value="<?php if (!empty($user)) {echo $user;} ?>"/><br/>
           Password: <input type="password" name='password'/><br/>
            City: <input type="text" name='city' value="<?php if (!empty($city)) {echo $city;} ?>"/><br/>
            State: <input type="text" name='state' value="<?php if (!empty($state)) {echo $state;} ?>"/><br/>
            Country: <input type="text" name='country' value="<?php if (!empty($country)) {echo $country;} ?>"/><br/>
            Admin: <select name="admin">
                <option value='Yes' <?php if (!empty($admin) && $admin == 'Yes') {echo 'selected';} ?>> Yes </option>
                <option value="No" <?php if (!empty($admin) && $admin == 'No') {echo 'selected';} ?>> No </option>
            </select> <br/>
            <input type="hidden" name="action" value="sign-up" />
            <input type="submit" value="sign-up" />
        <br/>
        </form>
            <p><a href="?action=list_news">Back to news_list</a></p>
        </div>
    </body>
</html>
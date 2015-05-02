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
        <title>Show news body</title>
    </head>
    <body>
            <?php
            if(!empty($message)){
            ?> <h1><?php echo $message ?></h1>
            <?php }
        if(isset($_SESSION['username']))
            include 'sidebar.php';
        else
        {
         ?>
        <p><a href="?action=list_news">Back to news list</a></p>
        <?php
        }?>
        <div id='main'>
        <?php foreach ($news as $single_news)
        {?>
        <h1> <?php echo $single_news['headline']; ?> </h1><br>
        Posted for: <?php echo $single_news['companyname'];?><br>
        Email:<?php echo $single_news['companyemail'];?><br>
        date posted: <?php echo $single_news['dateposted'];?><br>

        <p><h2><?php echo $single_news['newsbody']; ?></h2></p><?php
        
        }?>
        </div>
    </body>
</html>

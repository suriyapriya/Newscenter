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
        <title></title>
    </head>
    <body>
        <?php include 'sidebar.php'; ?>
        <div id='main'>
            <?php
            if(!empty($message)){
            ?> <h1><?php echo $message ?></h1>
            <?php }
            ?>            
            <form action="index.php" method="post" id="add_news">
            <input type="hidden" name="action" value="add_news" />
            Image: <textarea name='image_source' rows='2' cols='10'><?php if (!empty($image)) {echo $image;} ?></textarea> <br/>
            <br />
            Headline: <textarea name='headline' rows='2' cols='10'><?php if (!empty($headline)) {echo $headline;} ?></textarea> <br/>
            <br />
            Summary: <textarea name='summary' rows='5' cols='10'><?php if (!empty($summary)) {echo $summary;} ?></textarea> <br/>
            <br />
            News body: <textarea name='newsbody' rows='10' cols='10'><?php if (!empty($newsbody)) {echo $newsbody;} ?></textarea> <br/>
            <br />
            company name: <input type=text" name="companyname" value="<?php if (!empty($companyname)) {echo $companyname;} ?>"/>
            <br />
            company email: <input type=text" name="companyemail" value="<?php if (!empty($companyemail)) {echo $companyemail;} ?>"/>
            <br />
            <input type="hidden" name = 'news_id' value="<?php
            if(!empty($_POST['news_id']))
            {
                echo $_POST['news_id'];
            }?>"/>
            <input type="submit" value="add_news" />
            <br />
            </form>
        </div>
    </body>
</html>

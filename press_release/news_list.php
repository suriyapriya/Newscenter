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
        <title>News List</title>
    </head>
    <body>
        <?php
        if(isset($_SESSION['username']))
            include 'sidebar.php';
        ?>
        <div id="main">
        <br>
        <form action='.' method='get'>
        <input type="text" name="searchValue" value="<?php if(isset($searchword)) echo $searchword;?>"/>
        <input type="hidden" name="action" value="search_news" />
        <input type="submit" value='search'/>
        </form>
            
        <?php
        if(!empty($message))
        {?>
            <h1><?php echo $message ?></h1>
        <?php
        }
        else
        {
            foreach($news as $single_news)
            {?>
        <table>
            <tr>
                <td id="img"><img src="<?php echo $single_news['image_source']?>" width="200" height="200"><br>
                    Posted by <br><?php echo $single_news['username']?><br>
                Posted for:<br> <?php echo $single_news['companyname']?></td>
                <td><a href="?action=news_body&newsid=<?php echo $single_news['newsid']?>"><?php echo $single_news['headline']; ?></a><br>
                    <?php echo $single_news['summary']; ?><br>
                     </td><br>
            </tr>
        </table><?php
            }            
        }?>
        <?php
        if(!isset($_SESSION['username']))
        {?>
        <p><a href="?action=sign-in">sign in</a></p><?php            
        }?>
        

    </div>
    </body>
</html>

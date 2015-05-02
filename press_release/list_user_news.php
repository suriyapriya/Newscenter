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
        <?php
        ?>
        <?php include 'sidebar.php'; ?>

        <div id="main">
        <table>
            <tr>
                <th>image</th>
                <th>Headline</th>
                <th>Summary</th>
                <th>Date posted</th>
                <th>company name</th>
                <th>Company email</th>
            </tr>
            
            <?php
            if($news)
            {
                foreach ($news as $single_news) : ?>
                <tr>
                    <td><img src="<?php echo $single_news['image_source']; ?>" width="50" height="50"></td>
                    <td><?php echo $single_news['headline']; ?></td>
                    <td><?php echo $single_news['summary']; ?></td>
                    <td><?php echo $single_news['dateposted']; ?></td>
                    <td><?php echo $single_news['companyname']; ?></td>
                    <td><?php echo $single_news['companyemail']; ?></td>
                    <td>
                        <form action="." method="GET">
                            <input type="hidden" name="action"
                                   value="news_body" />
                            <input type="hidden" name="backlink"
                                   value="list_news" />
                            <input type="hidden" name="newsid"
                                   value="<?php echo $single_news['newsid']; ?>" />
                            <input type="submit" value="View" /><br>
                        </form>
                        <form action="." method="post">
                            <input type="hidden" name="action"
                                   value="add_news" />
                            <input type="hidden" name="news_id"
                                   value="<?php echo $single_news['newsid']; ?>" />
                            <input type="submit" value="Edit" /><br>
                        </form>
                        <form action="." method="post">
                            <input type="hidden" name="action"
                                   value="delete_news" />
                            <input type="hidden" name="news_id"
                                   value="<?php echo $single_news['newsid']; ?>" />
                            <input type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
            <?php endforeach; 
            }?>
        </table>
    </div>
    </body>
</html>
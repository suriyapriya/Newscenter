<?php
require('dbcontext.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class NewsRepository{
    public static function get_news()
    {
        $db = DBContext::getDB();
        $query = "select distinct b.* from user_details a, news_details b order by b.dateposted, b.username, a.city";
        $news = $db->query($query);
        if($news && $news->rowCount() > 0)
            return $news;
        return NULL;
    }
    
    public static function get_news_by_id($newsid)
    {
        $db = DBContext::getDB();
        $query = "select * from news_details where newsid = '$newsid'";
        $news = $db->query($query);
        if($news && $news->rowCount() > 0)
            return $news;
        return NULL;
    }
    
    public static function get_body($newsbody)
    {
        $db = DBContext::getDB();
        $query = "select * from news_details where newsbody='$newsbody'";
        $news = $db->query($query);
        if($news && $news->rowCount() > 0)
            return $news;
        return NULL;        
    }
    
    
    public static function search_pattern($searchword)
    {
        $db = DBContext::getDB();
        $query = "select * from news_details where newsbody like '%$searchword%'";
        $news = $db->query($query);
        if($news && $news->rowCount() > 0)
            return $news;
        return NULL;       
    }
    
    public static function search_pattern_by_userdetails($searchword)
    {
        $db = DBContext::getDB();
        $query = "select * from news_details where username in (select username from user_details where city = '$searchword' || state = '$searchword' || country = '$searchword')";
        $res = $db->query($query);
        if(!$res && !$res->rowCount())
        {
            return NULL;
        }
        return $res;
    }
}

?>
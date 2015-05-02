<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class user_repository
{
    public static function get_password($username)
    {
        $db = DBContext::getDB();
        $query = "select passwd from user_details where username='$username'";
        $user = $db->query($query);
        if($user && $user->fetchColumn() > 0)
            return $user;
        return NULL;
    }

    public static function check_passwd($username, $passwd)
    {
        $db = DBContext::getDB();
        $query = "select * from user_details where username='$username' && password ='$passwd'";
        $passwd = $db->query($query);
        if($passwd && $passwd->rowCount() > 0)
            return TRUE;
        return FALSE;      

    }

    public static function get_user_details($username)
    {
        $db = DBContext::getDB();
        $query = "select * from user_details where username='$username'";
        $user = $db->query($query);
        if($user && $user->fetchColumn() > 0)
            return $user;
        return NULL;
    }

    public static function verify_password($username, $passwd)
    {
        $db = DBContext::getDB();
        $query = "select password from user_details where username = '$username'";
        $res = $db->query($query);
        //echo 'res'.$res->fetchColumn().'res';
        if(!empty($res))
        {
            $passwd = md5($passwd);
            $value = $res->fetchColumn();
            if($passwd == $value)
                return TRUE;
        }
        return FALSE;
    }
    
    public static function set_user_details($name, $passwd, $city, $state, $admin, $country)
    {
        $db = DBContext::getDB();
        $query = "select count(*) from user_details where username = '$name'";
        $res = $db->query($query);
        if($res && $res->fetchColumn() > 0)
        {
            return "Username exists already. Please give other username";
        }
        else
        {
            $query = "insert into user_details values('$name', '$passwd', '$city', '$state', '$country', '$admin')";
            $db->query($query);  
        }
        return  NULL;
    }
    
    public static function get_user_news($username)
    {
        $db = DBContext::getDB();
        $query = "select * from news_details where username = '$username'";
        $res = $db->query($query);
        //echo $query;
        return $res;
    }
    
    public static function add_news($username, $headline, $summary, $news, $companyname, $companyemail, $image)
    {
        $db = DBContext::getDB();
        $query = "insert into news_details(username, headline, summary, newsbody, companyname, companyemail, image_source) "
                . "values('$username', '$headline', '$summary', '$news', '$companyname', '$companyemail', '$image')";
        $res = $db->query($query);
        if(!$res && !$res->rowCount())
        {
            echo 'Error querying database';
        }
    }
    public static function delete_news($newsid)
    {
        $db = DBContext::getDB();
        $query = "delete from news_details where newsid = '$newsid'";
        $res = $db->query($query);
        if(!$res && !$res->rowCount())
        {
            echo 'Error querying database';
        }
    }
    
    public  static function update_news($newsid, $headline, $summary, $news, $companyname, $companyemail, $image)
    {
        $db = DBContext::getDB();
        $query = "update news_details set headline = '$headline', summary = '$summary',"
                . " newsbody = '$news', companyname = '$companyname', companyemail = '$companyemail', image_source = '$image' "
                . "where newsid = '$newsid'" ;
        $res = $db->query($query);
        if(!$res && !$res->rowCount())
        {
            echo 'Error querying database';
        }
    }

    public static function get_news_by_id($newsid)
    {
        $db = DBContext::getDB();
        $query = "select * from news_details where newsid = '$newsid'";
        $res = $db->query($query);
        if(!empty($res))
        {
            return $res;
        }
        return NULL;
    }
    
    public static function update_passwd($username, $passwd)
    {
        $db = DBContext::getDB();
        $query = "update user_details set password='$passwd' where username ='$username'";
        $res = $db->query($query);
    }
    
    public static function is_admin($username)
    {
        $db = DBContext::getDB();
        $query = "select * from user_details where username = '$username' && admin = 'Yes'";
        $res = $db->query($query);
        if($res && $res->rowCount() > 0)
            return TRUE;
        return FALSE;
    }
}?>
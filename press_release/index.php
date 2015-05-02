<?php
require('../model/news_repository.php');
require('../model/user_repository.php');

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = 'list_news';
}
session_start();

if(isset($_SESSION['username']))
{
    $username = $_SESSION['username'];
}
if($action == 'list_news')
{
    if(isset($_SESSION['username']) && !isset($_GET['status']))
    {
        header("Location: .?action=list_user_news");
    }
    else
    {
    $news = NewsRepository::get_news();
    if(!$news)
        $message = "NO NEWS ARE POSTED YET";
    include 'news_list.php';
    }
}

else if($action == 'sign-in')
{
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $username = $_POST['username'];
        $passwd = $_POST['password'];
        if(empty($username) || empty($passwd))
        {
            $message = 'All fields are required';
        }
        else {
        $db_passwd = user_repository::verify_password($username, $passwd);    

        if($db_passwd)
        {
            $_SESSION['username'] = $username;
            $action = 'list_user_news';
            header("Location: .?action=$action");
            return;
        }
        else
            $message = "Password is not correct";
        }
    }
    include 'sign_in_users.php';
}
else if($action == 'sign-up')
{
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['city']) && isset($_POST['state']))
    {
        if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['city']) || empty($_POST['state']))
        {
            $message = 'All fields are required';
        }
        else
        {
        $user = $_POST['username'];
        $passwd = md5($_POST['password']);
        $city = $_POST['city'];
        $state = $_POST['state'];
        $admin = $_POST['admin'];
        $country = $_POST['country'];
        user_repository::set_user_details($user, $passwd, $city, $state, $admin, $country);
        $message = "created your account successfully !";
        }
    }
    include 'sign_up_page.php';
}
else if($action == 'list_user_news')
{
    if(!user_repository::is_admin($username))
    {
        $news = user_repository::get_user_news($username);
    }
    else
    {
        $news = NewsRepository::get_news();
    }
    if(!$news)
        $message = "No news are posted";
    include 'list_user_news.php';

}

else if($action == 'add_news')
{
    if(isset($_POST['image_source']) && isset($_POST['headline']) && isset($_POST['summary']) && isset($_POST['newsbody']) && isset($_POST['companyname'])
            && isset($_POST['companyemail']))
    {
        if(empty($_POST['headline']) || empty($_POST['summary']) || empty($_POST['newsbody']) || empty($_POST['companyname'])
                || empty($_POST['companyemail']))
        {
            $message = 'All fields are required';
        }
        else
        {
            if(!empty($_POST['image_source']))
                $image = $_POST['image_source'];
            else
                $image = "http://www.ibollytv.com/assets/img/no-image-available.jpg";
            $headline = $_POST['headline'];
            $summary = $_POST['summary'];
            $news = $_POST['newsbody'];
            $companyname = $_POST['companyname'];
            $companyemail = $_POST['companyemail'];
            if(!empty($_POST['news_id']))
            {
                $newsid = $_POST['news_id'];
                user_repository::update_news($newsid, $headline, $summary, $news, $companyname, $companyemail, $image);
            }
            else
            {
                user_repository::add_news($username, $headline, $summary, $news, $companyname, $companyemail, $image);
            }
            //echo "user: " .  $username;
            $news = user_repository::get_user_news($username);
            //var_dump($news);
            header("Location: ?action=list_user_news");
            return;
        }        
    }
    if(isset($_POST['news_id']))
    {
        $newsid = $_POST['news_id'];
        if($news = user_repository::get_news_by_id($newsid))
        {
        $news = $news->fetch(PDO::FETCH_ASSOC);
        $headline = $news['headline'];
        $summary = $news['summary'];
        $newsbody = $news['newsbody'];
        $companyname = $news['companyname'];
        $companyemail = $news['companyemail'];
        }
    }
    include 'add_news.php';
}

else if($action == 'delete_news')
{
    $newsid = $_POST['news_id'];
    user_repository::delete_news($newsid);
    header("Location: ?action=list_user_news");
}
else if($action == 'news_body')
{

    $newsid = $_GET['newsid'];
    if(($news = NewsRepository::get_news_by_id($newsid)) != NULL)
    {
    include 'show_news_body.php';
    }
    else 
    {
        $message = "Error querying database";    
    }
}
else if($action == 'sign-out')
{
    session_destroy();
    header("Location: .?action=list_news");
}
 else if($action == 'search_news') {
     if(!empty($_GET['searchValue']))
     {
        $searchword = $_GET['searchValue'];
        $news = NewsRepository::search_pattern($searchword);
        if(!$news)
        {
            $news = NewsRepository::search_pattern_by_userdetails($searchword);
        }
        include 'news_list.php';
     }
     else
     {
         $message = "No search word is found";
     }
}

else if($action == 'change_password')
{
    if(isset($_POST['value']))
    {
        if( !empty($_POST['current_passwd']) && !empty($_POST['new_passwd']))
        {
            $cur_passwd = md5($_POST['current_passwd']); 
            if(user_repository::check_passwd($username, $cur_passwd))
            {     
            $new_passwd = md5($_POST['new_passwd']);
            user_repository::update_passwd($username, $new_passwd);
            $message = 'Password is successfully updated';
            }
            else
                $message = "current password is not correct";
        }
    }
    include 'change_passwd.php';
}
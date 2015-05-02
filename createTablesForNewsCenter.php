<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class NewsStorage {
    private static $dsn = 'mysql:host=localhost';

    private static $username = 'root';
    private static $password = 'surirajendran';
    private static $db;

    private function __construct() {}

    public static function createStorage () {
        if (!isset(self::$db)) {
            try {
                print "PDO Object";
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);

                self::$db->query("CREATE DATABASE IF NOT EXISTS newscenter_db;");
                self::$db->query("use newscenter_db;");

                self::$db->query("CREATE TABLE IF NOT EXISTS user_details (
                                    username varchar(20) NOT NULL DEFAULT '',
                                    `password` varchar(32) DEFAULT NULL,
                                    city varchar(20) DEFAULT NULL,
                                    state varchar(20) DEFAULT NULL,
                                    country varchar(30) DEFAULT NULL,
                                    admin varchar(3) DEFAULT NULL,
                                    PRIMARY KEY (username)
                                  );");
                self::$db->query("CREATE TABLE IF NOT EXISTS news_details (
                                    newsid int(11) NOT NULL AUTO_INCREMENT,
                                    username varchar(20) DEFAULT NULL,
                                    headline varchar(200) DEFAULT NULL,
                                    summary varchar(500) DEFAULT NULL,
                                    newsbody varchar(1000) DEFAULT NULL,
                                    companyname varchar(30) DEFAULT NULL,
                                    companyemail varchar(50) DEFAULT NULL,
                                    dateposted datetime DEFAULT CURRENT_TIMESTAMP,
                                    image_source varchar(300) DEFAULT NULL,
                                    PRIMARY KEY (newsid),
                                    KEY username (username),
                                    FOREIGN KEY (username) REFERENCES user_details (username)
                                  );");
                } catch (PDOException $e) {
                $error_message = $e->getMessage();
                print "Error: Database not found";

                //include('../errors/database_error.php');
                exit();
            }
        }
    }
}

NewsStorage::createStorage();
?>

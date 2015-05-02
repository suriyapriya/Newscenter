
CREATE TABLE IF NOT EXISTS news_details (
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
);

INSERT INTO news_details (newsid, username, headline, summary, newsbody, companyname, companyemail, dateposted, image_source) VALUES
(14, 'suriya', 'rrYAWEGTWYEGUYWGDJAGKwwww', 'uutweuiwueskfaaaaHSDGAFHJFHBSADFJBDSFBHDSAVFDSABKFHFHVDBHFVDVFHDFVD', 'ttdyusdy', 'oo', 'pp', '2014-03-02 21:20:10', 'http://www.ibollytv.com/assets/img/no-image-available.jpg'),
(17, 'suriya', 'goo', 'morning', 'luck', 'g', 'rrry', '2014-03-03 09:01:16', 'http://www.ibollytv.com/assets/img/no-image-available.jpg'),
(23, 'suriya', 'hskdfh', 'hdfksj', 'luck', 'ewt', 'sfdg', '2014-03-08 21:24:12', 'http://www.ibollytv.com/assets/img/no-image-available.jpg'),
(26, 'suriya', 'test', 'more summary', 'sdfef', 'compname', 's@gmail.com', '2014-03-09 16:30:31', 'http://static.financialexpress.com/pic/uploadedImages/thumbImages/T_Id_463465_Mutual_Funds.jpg'),
(27, 'suriya', 'dummmy', 'dummy', 'dummy', 'compname', 's@gmail.com', '2014-03-09 16:32:47', 'http://www.ibollytv.com/assets/img/no-image-available.jpg'),
(30, 'suriya', 'flowers', 'scenary', 'fsadjsadas\r\nsgdjdgh\r\nasvghdajs\r\nagsdfksgd\r\ngsdjasdhsa\r\n', 'gdfgsdh', 'ddsdsahdjjsa', '2014-03-09 20:34:55', 'http://www.roseexpress.me/BlogImages/Blog202-635298081944466445.jpeg'),
(33, 'priya', 'hakdsadj', 'asjkhakjduendscxkjenccccccbjkbcnjkedbcjk', 'jksdbcvkkds\r\ndnskds\r\nnkdscv\r\n mscvjnjd\r\nncxkd\r\nnck', 'sdfdjkffkj', 'd@gmail.com', '2014-03-11 16:55:06', 'http://www.ibollytv.com/assets/img/no-image-available.jpg');

CREATE TABLE IF NOT EXISTS user_details (
  username varchar(20) NOT NULL DEFAULT '',
  `password` varchar(32) DEFAULT NULL,
  city varchar(20) DEFAULT NULL,
  state varchar(20) DEFAULT NULL,
  country varchar(30) DEFAULT NULL,
  admin varchar(3) DEFAULT NULL,
  PRIMARY KEY (username)
);

INSERT INTO user_details (username, password, city, state, country, admin) VALUES
('priya', '8fed31508ea83a522df9de3510a063e3', 'milpitas', 'california', 'usa', 'No'),
('sathya', '526e34d04735124f05a090181f3e6e8a', 'madurai', 'tamilnadu', '', 'No'),
('sathyaspriya', '8fed31508ea83a522df9de3510a063e3', 'sanjose', 'california', '', 'No'),
('suriya', '413882e418d7a4e907f37c40de39899b', 'madurai', 'tamilnadu', 'india', 'Yes'),
('suriyapriya', '8fed31508ea83a522df9de3510a063e3', 'sivakasi', 'tamilnadu', '', 'No');




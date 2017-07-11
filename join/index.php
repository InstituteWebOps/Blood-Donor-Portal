<?php

// session_start();
// try {
// require('db.php');
// print_r($_POST);
// $_SESSION['rollno'] = $_POST['rollno'];
// header('location: details.php');
// } catch (PDOException $e) {
//     echo "Error" .$e->getMessage();
// }

@session_start();
// $_SERVER = array(
//     "HTTPS" => "on",
//     "SSL_TLS_SNI" => "localhost",
//     "HTTP_HOST" => "localhost:81",
//     "HTTP_CONNECTION" => "keep-alive",
//     "HTTP_ACCEPT" => "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
//     "HTTP_UPGRADE_INSECURE_REQUESTS" => "1",
//     "HTTP_USER_AGENT" => "Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 UBrowser/6.1.2909.1022 Safari/537.36",
//     "HTTP_ACCEPT_ENCODING" => "gzip, deflate",
//     "HTTP_ACCEPT_LANGUAGE" => "en-US,en;q=0.8",
//     "HTTP_COOKIE" => "PHPSESSID=24l4sd4d1726ikfcosc49a0b77; _ga=GA1.3.533973428.1497968865; remember_token=nM_U2DGtHe3cXqiZRDSkNw; _researchportal_session=Zmp5ZUZoK21mb2VXUGpZckZyZnMyT1NtZHlWSDJVaHN3RzhEYWIyUzRVd1hRK0lJWWhtalNTcC96RkY3TVFMR1Yzck1ZUjFFM1kwc1RFdlJPdCsrTEJDcEx5YXRFNWxPam5vdVp2Nk9va2JTTXU1WGdSZk94UkdsbmVsbVo2ck5XYW1rT2V6QzlxdEtGcmI3REZ4RHBNTDFtMzhjcXZxTXkxTExuNjhIWVBKT3JQU0VFSWR4WWF2VDFWdEZUcGdDdHBSWUtieFlwMlhnUjZzcDRucmJOSVhkdE92QVd3MWV4SkZYWVJzK0x0SjdxZ0M4eFhXaXdHQUZrMHdGUlZEOS0tSklqbEYvVUw5YWZYUlJrcVJJK0dnQT09--4e2d49896c4e8ed7e450eeb0023e91e627ef40c2",
//     "PATH" => "/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin",
//     "SERVER_SIGNATURE" => "<address>Apache/2.4.7 (Ubuntu) Server at students.iitm.ac.in Port 443</address>",
//     "SERVER_SOFTWARE" => "Apache/2.4.7 (Ubuntu)",
//     "SERVER_NAME" => "students.iitm.ac.in",
//     "SERVER_ADDR" => "localhost",
//     "SERVER_PORT" => "81",
//     "REMOTE_ADDR" => "10.22.29.102",
//     "DOCUMENT_ROOT" => "/var/www",
//     "REQUEST_SCHEME" => "http",
//     "CONTEXT_PREFIX" => "",
//     "CONTEXT_DOCUMENT_ROOT" => "/var/www",
//     "SERVER_ADMIN" => "root@students.iitm.ac.in",
//     // "SCRIPT_FILENAME" => "/var/www/iitm_video/check.php",
//     "REMOTE_PORT" => "59174",
//     "GATEWAY_INTERFACE" => "CGI/1.1",
//     "SERVER_PROTOCOL" => "HTTP/1.1",
//     "REQUEST_METHOD" => "GET",
//     "QUERY_STRING" => "",
//     // "REQUEST_URI" => "/iitm_video/check.php",
//     // "SCRIPT_NAME" => "/iitm_video/check.php",
//     "PHP_SELF" => "/iitm_video/check.php",
//     "REQUEST_TIME_FLOAT" => "1499716613.264",
//     "REQUEST_TIME" => "1499716613"
// );

require '../config/OAuth_config.php';
require '../libs/OAuth.php';

$oauth = new OAuth();
$oauth->init();
if($oauth->authCode){
  $_SESSION['authcode'] = $oauth->authCode;
}
if($oauth->user['loggedIn']){
  $_SESSION['user'] = $oauth->user;
if(!isset($_GET['url'])) $_GET['url']="";
$url  = rtrim($_GET['url'],'/');
$url = explode('/', $url);
if($url[0]==''){
  $url[0]='details';
}
$_SESSION['rollno'] = $_SESSION['username'];
//print_r($_SESSION);
header("location: details.php");
// require('pages/'.$url[0].'.php');
//require($url[0].'.php');
}

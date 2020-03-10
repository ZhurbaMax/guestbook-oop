<?php
session_start();
include_once ("classes/DB.php");
include_once ("classes/User.php");
include_once ("classes/Comment.php");
include_once ("classes/Validator.php");



define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DBNAME", "userlistdb");
define("CHARSET", "utf8");
define("SALT", "qwerty");



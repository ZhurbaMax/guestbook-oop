<?php
session_start();
include_once ("app/models/DB.php");
include_once ("app/models/User.php");
include_once ("app/models/Comment.php");
include_once ("app/models/Validator.php");



define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DBNAME", "userlistdb");
define("CHARSET", "utf8");
define("SALT", "qwerty");



<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 1/22/20
 * Time: 7:55 PM
 */
session_start();
session_destroy();
header("location: login.php");
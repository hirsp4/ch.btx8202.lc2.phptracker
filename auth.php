<?php
 /* auth.php 
 *
 * This file checks if a user is logged in or not in order to give access to home.php.
 *
 * @author Patrick Hirschi <patrick.hirschi@students.bfh.ch>
 * @version 1.0
 * @date 24-11-2014
 *
 * Copyright (c) 2014 Berner Fachhochschule. All rights reserved.
 */
     session_start();

     if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
      header('location: index.php'); 
      exit;
      }


?>
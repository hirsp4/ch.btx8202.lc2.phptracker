<?php
/* logout.php 
 *
 * This file stops the user session and redirects the user to the index.php (login screen).
 *
 * @author Patrick Hirschi <patrick.hirschi@students.bfh.ch>
 * @version 1.0
 * @date 24-11-2014
 *
 * Copyright (c) 2014 Berner Fachhochschule. All rights reserved.
 */

 // destroy session
 session_start();
 session_destroy();
 // redirect to index.php (login screen).
 header('location: index.php');
?>
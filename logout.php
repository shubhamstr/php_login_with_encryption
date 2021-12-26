<?php

//Destroy entire session data.
session_start();
session_unset();
session_destroy();

//redirect page to index.php
header('location: login.php');

?>
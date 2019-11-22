<?php

 if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
     header('Location: /');
     exit();
 }

<?php
  ob_start();
  if(!isset($_SESSION['mygiohang'])) {
    $_SESSION['mygiohang'] = array();
}

define('PROURL', '/ASM/asm');
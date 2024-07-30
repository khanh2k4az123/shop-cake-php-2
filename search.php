<?php 
require_once "App/Config/function.php";
if(isset($_POST["btnsearch"])&&($_POST['kyw']!="")){
    $kyw=create_slug($_POST['kyw'],1);
    header('location: '.PROURL.'/product/search/'.$kyw);
}else{
    header('location: '.PROURL);
}
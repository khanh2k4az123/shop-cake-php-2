<?php 
namespace App\Controllers;
class BlogController extends BaseController{
//     private $BlogController;
//     function __construct(){
//         $this->BlogController = new BlogController;   
// } 
function blog(){
        $this->renderView("blog",$this->titlepage,$this->data);
}

}
?>
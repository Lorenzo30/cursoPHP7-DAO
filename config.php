<?php 
 

   spl_autoload_register(function($class){



   	     $fileName = "Class".DIRECTORY_SEPARATOR.$class.".php";

         if(file_exists($fileName)){


         	  require_once $fileName;



         }




   }) 



?> 
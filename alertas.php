<?php
function mostrarAlerta (){
    
         if (isset($_SESSION['sucess'])){
         echo "<div class='alert alert-sucess'>";
         echo $_SESSION['sucess'];
         echo "</div>";
         
         unset ($_SESSION['sucess']);
       
        }
} 
?>
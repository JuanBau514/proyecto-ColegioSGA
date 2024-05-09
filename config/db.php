<?php

    class DataBase{

        public function __construct(){
        }
        function connect(){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "n.g.d";
            $url=mysqli_connect($servername,$username,$password) or die("No se pudo conectar a la base de datos" .mysqli_error($url));
            mysqli_select_db($url,$dbname) or die("No se pudo seleccionar a la base de datos" .mysqli_error($url));
    
            return $url;
        }
    }
?> 
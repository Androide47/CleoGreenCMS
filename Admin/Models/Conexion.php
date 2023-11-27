<?php 

    Class Conexion{
        static public function conectar(){
            $link = new PDO("mysql:host=localhost;dbname=advisor", "root","root");

            $link->exec("set names utf8");

            return $link;
        }
    }

    //BASE DE DATOS PROD
    /*
        Class Conexion{
            static public function conectar(){
                $link = new PDO("mysql:host=localhost;dbname=imtechn1_sitioIM", 
                                "imtechn1_root",
                                "XGJRB~cXr]WH");

                $link->exec("set names utf8");

                return $link;
            }
        }
    */
    

<?php
            $servername = 'localhost:3306';
            $username = 'root';
            $password = '';
            $database = 'apia';
            
            //On établit la connexion
            $conn = new mysqli($servername, $username, $password, $database);
            
            //On vérifie la connexion
            if($conn->connect_error){
                die('Erreur : ' .$conn->connect_error);
            }
            //  echo 'Connexion réussie';
        ?>
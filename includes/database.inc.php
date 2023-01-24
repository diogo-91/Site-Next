<?php 
	# Conexão
	try {
        $db = new PDO("mysql:host=".DB_HOST_2.";dbname=".DB_NAME_2,DB_USER_2,DB_PASS_2,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")); 
        } catch(Exception $e) {
        echo "There was a connection error with the database.<br>";
        echo "<strong>Erro:</strong> ".$e->getMessage();
        #echo "<pre>"; print_r($e); echo "</pre>";
    }
?>
<?php
function connexionBase() {

    try 
    {
        $db = new PDO('mysql:host=localhost;charset=utf8;dbname=record', 'admin', '<0000>');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;

    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage() . "<br>";
        echo "N° : " . $e->getCode();
    }
}
?>
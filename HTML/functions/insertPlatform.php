<?php
    require_once("../_defaults.php");

    header('Content-Type: application/json');

    try {
        $object = (object) [
            'result' => 'OK',
            'errorMessage' => '',
            'data' => ''
        ];

        $stmt = $db->prepare("INSERT INTO platform (manufacturer, name) VALUES (:manufacturer, :name);");
        $stmt->bindValue(":manufacturer", $_POST["manufacturer"], SQLITE3_TEXT);
        $stmt->bindValue(":name", $_POST["name"], SQLITE3_TEXT);

        $object->data =  $stmt->getSQL($expanded = true);

        $results = $stmt->execute();
    } catch (Exception $e) {
        $object->result = "ERROR";
        $object->errorMessage = $e->getMessage();
    }

    echo json_encode($object);
?>
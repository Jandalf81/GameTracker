<?php
    require_once("../_defaults.php");

    header('Content-Type: application/json');

    try {
        $object = (object) [
            'result' => 'OK',
            'errorMessage' => '',
            'data' => ''
        ];

        $stmt = $db->prepare("INSERT INTO game (name, developer, publisher, year, platform, collection) VALUES (:name, :developer, :publisher, :year, :platform, :collection);");
        $stmt->bindValue(":name", $_POST["name"], SQLITE3_TEXT);
        $stmt->bindValue(":developer", $_POST["developer"], SQLITE3_TEXT);
        $stmt->bindValue(":publisher", $_POST["publisher"], SQLITE3_TEXT);
        if ($_POST["year"] == "") {
            $stmt->bindValue(":year", NULL, SQLITE3_INTEGER);
        } else {
            $stmt->bindValue(":year", $_POST["year"], SQLITE3_INTEGER);
        }
        if ($_POST["platform"] == -1) {
            $stmt->bindValue(":platform", NULL, SQLITE3_INTEGER);
        } else {
            $stmt->bindValue(":platform", $_POST["platform"], SQLITE3_INTEGER);
        }
        if ($_POST["collection"] == -1) {
            $stmt->bindValue(":collection", NULL, SQLITE3_INTEGER);
        } else {
            $stmt->bindValue(":collection", $_POST["collection"], SQLITE3_INTEGER);
        }

        $object->data =  $stmt->getSQL($expanded = true);

        $results = $stmt->execute();
    } catch (Exception $e) {
        $object->result = "ERROR";
        $object->errorMessage = $e->getMessage();
    }

    echo json_encode($object);
?>
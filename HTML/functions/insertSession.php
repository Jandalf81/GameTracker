<?php
    require_once("../_defaults.php");

    header('Content-Type: application/json');

    try {
        $object = (object) [
            'result' => 'OK',
            'errorMessage' => '',
            'data' => ''
        ];

        $stmt = $db->prepare("INSERT INTO session (startedAt, stoppedAt, game, note) VALUES (:fromDate, :toDate, :game, :note);");
        $stmt->bindValue(":fromDate", $_POST["fromDateTime"], SQLITE3_TEXT);
        $stmt->bindValue(":toDate", $_POST["toDateTime"], SQLITE3_TEXT);
        $stmt->bindValue(":game", $_POST["game"], SQLITE3_INTEGER);
        $stmt->bindValue(":note", $_POST["note"], SQLITE3_TEXT);

        $object->data =  $stmt->getSQL($expanded = true);

        $results = $stmt->execute();        
    } catch (Exception $e) {
        $object->result = "ERROR";
        $object->errorMessage = $e->getMessage();
    }

    echo json_encode($object);
?>
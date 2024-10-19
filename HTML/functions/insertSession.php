<?php
    require_once("../_defaults.php");

    header('Content-Type: application/json');

    try {
        $object = (object) [
            'result' => 'OK',
            'errorMessage' => '',
            'data' => ''
        ];

        $stmt = $db->prepare("INSERT INTO session (startedAt, stoppedAt, game, sessionType, run, note) VALUES (:fromDate, :toDate, :game, :sessionType, :run, :note);");
        $stmt->bindValue(":fromDate", $_POST["fromDateTime"], SQLITE3_TEXT);
        $stmt->bindValue(":toDate", $_POST["toDateTime"], SQLITE3_TEXT);
        $stmt->bindValue(":game", $_POST["game"], SQLITE3_INTEGER);
        if ($_POST["sessionType"] == -1) {
            $stmt->bindValue(":sessionType", NULL, SQLITE3_INTEGER);
        } else {
            $stmt->bindValue(":sessionType", $_POST["sessionType"], SQLITE3_INTEGER);
        }
        if ($_POST["run"] == -1) {
            $stmt->bindValue(":run", NULL, SQLITE3_INTEGER);
        } else {
            $stmt->bindValue(":run", $_POST["run"], SQLITE3_INTEGER);
        }
        $stmt->bindValue(":note", $_POST["note"], SQLITE3_TEXT);

        $object->data =  $stmt->getSQL($expanded = true);

        $results = $stmt->execute();
    } catch (Exception $e) {
        $object->result = "ERROR";
        $object->errorMessage = $e->getMessage();
    }

    echo json_encode($object);
?>
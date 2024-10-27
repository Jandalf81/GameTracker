<?php
    require_once("../_defaults.php");

    header('Content-Type: application/json');

    try {
        $stmt = $db->prepare("SELECT * FROM session WHERE id = :id");
        $stmt->bindValue(":id", $_POST["id"], SQLITE3_INTEGER);
        
        $results = $stmt->execute();

        $object = (object) [
            'result' => 'OK',
            'errorMessage' => '',
            'limit' => $_POST["limit"],
            'data' => ''
        ];

        while ($row = $results->fetchArray()) {
            $data = (object) [
                    'id' => $row['id'],
                    'startedAt' => $row['startedAt'],
                    'stoppedAt' => $row['stoppedAt'],
                    'game' => $row['game'],
                    'sessionType' => $row['sessionType'],
                    'run' => $row['run'],
                    'note' => $row['note']
            ];
        }
        $object->data = $data;
    } catch (Exception $e) {
        $object->result = "ERROR";
        $object->errorMessage = $e->getMessage();
    }

    echo json_encode($object);
?>
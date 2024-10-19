<?php
    require_once("../_defaults.php");

    header('Content-Type: application/json');

    try {
        $stmt = $db->prepare("SELECT * FROM v_sessions ORDER BY startedAt DESC LIMIT :limit;");
        $stmt->bindValue(":limit", $_POST["limit"], SQLITE3_INTEGER);
        
        $results = $stmt->execute();

        $object = (object) [
            'result' => 'OK',
            'errorMessage' => '',
            'limit' => $_POST["limit"],
            'data' => ''
        ];

        $object->data = "<table>";
        $object->data = $object->data . "<tr>";
        $object->data = $object->data . "<th>startedAt</th>";
        $object->data = $object->data . "<th>stoppedAt</th>";
        $object->data = $object->data . "<th>platform</th>";
        $object->data = $object->data . "<th>game</th>";
        $object->data = $object->data . "<th>duration</th>";
        $object->data = $object->data . "<th>note</th>";
        $object->data = $object->data . "</tr>";
        while ($row = $results->fetchArray()) {
            $object->data = $object->data . "<tr>";
            $object->data = $object->data . "<td>" . $row['startedAt'] . "</td>";
            $object->data = $object->data . "<td>" . $row['stoppedAt'] . "</td>";
            $object->data = $object->data . "<td>" . $row['platform'] . "</td>";
            $object->data = $object->data . "<td>" . $row['game'] . "</td>";
            $object->data = $object->data . "<td>" . $row['duration'] . "</td>";
            $object->data = $object->data . "<td>" . $row['note'] . "</td>";
            $object->data = $object->data . "</tr>";
        }
        $object->data = $object->data . "</table>";
    } catch (Exception $e) {
        $object->result = "ERROR";
        $object->errorMessage = $e->getMessage();
    }

    echo json_encode($object);
?>
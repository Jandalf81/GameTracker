<?php
    require_once("../_defaults.php");

    header('Content-Type: application/json');

    try {
        $stmt = $db->prepare("SELECT * FROM v_optionsGames ORDER BY game;");

        $results = $stmt->execute();

        $object = (object) [
            'result' => 'OK',
            'errorMessage' => '',
            'data' => ''
        ];

        while ($row = $results->fetchArray()) {
            $object->data = $object->data . "<option value=\"" . $row["id"] . "\"";

            if ($row["def"] = 1) {
                $object->data = $object->data . " selected";
            }

            $object->data = $object->data . ">" . $row["game"] . "</option>";
        }
    } catch (Exception $e) {
        $object->result = "ERROR";
        $object->errorMessage = $e->getMessage();
    }

    echo json_encode($object);
?>
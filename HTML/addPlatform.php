<!DOCTYPE html>
<?php
    require_once('_defaults.php');
?>
<html lang="de">
    <head charset="utf-8">
        <title>GameTracker</title>
        <link rel="stylesheet" href="generic.css">
        <script type="text/javascript" src="functions/_generic.js"></script>        
        <script type="text/javascript" src="functions/insertPlatform.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <div>
            <h1>Plattform hinzufügen</h1>
            <form>
                <table>
                    <tr>
                        <td>Hersteller: </td>
                        <td>
                            <input type="text" name="manufacturer" id="manufacturer" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Name: </td>
                        <td>
                            <input type="text" name="name" id="name">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="button" value="Speichern" onClick="insertPlatform(
                                    document.getElementById('manufacturer').value,
                                    document.getElementById('name').value
                                );">
                            <div id="result"></div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
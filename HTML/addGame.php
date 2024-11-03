<!DOCTYPE html>
<?php
    require_once('_defaults.php');
?>
<html lang="de">
    <head charset="utf-8">
        <title>GameTracker</title>
        <link rel="stylesheet" href="generic.css">
        <script type="text/javascript" src="functions/_generic.js"></script>
        <script type="text/javascript" src="functions/getOptionsPlatform.js"></script>
        <script type="text/javascript" src="functions/getOptionsCollection.js"></script>
        <script type="text/javascript" src="functions/insertGame.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <div>
            <h1>Spiel hinzufügen</h1>
            <form>
                <table>
                    <tr>
                        <td>Name: </td>
                        <td>
                            <input type="text" name="name" id="name" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Developer: </td>
                        <td>
                            <input type="text" name="developer" id="developer">
                        </td>
                    </tr>
                    <tr>
                        <td>Publisher: </td>
                        <td>
                            <input type="text" name="publisher" id="publisher">
                        </td>
                    </tr>
                    <tr>
                        <td>Year: </td>
                        <td>
                            <input type="number" name="year" id="year">
                        </td>
                    </tr>
                    <tr>
                        <td>Platform: </td>
                        <td>
                            <select class="dropdown" name="optionsPlatform" id="optionsPlatform" required>
                                <script type="text/javascript" language="javascript">
                                    // call JS function
                                    getOptionsPlatform();
                                </script>
                            </select>
                            <input type="button" value="✖️" title="Un-select" onClick="document.getElementById('optionsPlatform').value = -1;">
                            <input type="button" value="➕" title="Add new platform" onClick="window.location.href='./addPlatform.php';">
                        </td>
                    </tr>
                    <tr>
                        <td>Collection: </td>
                        <td>
                            <select class="dropdown" name="optionsCollection" id="optionsCollection">
                                <script type="text/javascript" language="javascript">
                                    // call JS function
                                    getOptionsCollection();
                                </script>
                            </select>
                            <input type="button" value="✖️" title="Un-select" onClick="document.getElementById('optionsCollection').value = -1;">
                            <input type="button" value="➕" title="Add new collection" onClick="console.log('TODO');">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="button" value="Speichern" onClick="insertGame(
                                    document.getElementById('name').value,
                                    document.getElementById('developer').value,
                                    document.getElementById('publisher').value,
                                    document.getElementById('year').value,
                                    document.getElementById('optionsPlatform').value,
                                    document.getElementById('optionsCollection').value
                                );">
                            <div id="result"></div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
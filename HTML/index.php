<!DOCTYPE html>
<?php
    require_once('_defaults.php');
?>
<html lang="de">
    <head charset="utf-8">
        <title>GameTracker</title>
        <link rel="stylesheet" href="generic.css">
        <script type="text/javascript" src="functions/_generic.js"></script>
        <script type="text/javascript" src="functions/getLatestSessions.js"></script>
        <script type="text/javascript" src="functions/getOptionsGame.js"></script>
        <script type="text/javascript" src="functions/getOptionsSessionType.js"></script>
        <script type="text/javascript" src="functions/getOptionsRun.js"></script>
        <script type="text/javascript" src="functions/insertSession.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <div>
            <h1>Session erfassen</h1>
            <form>
                <table>
                    <tr>
                        <td>startedAt: </td>
                        <td>
                            <input type="datetime-local" name="fromDateTime" id="fromDateTime" value="<?php echo date("Y-m-d H:i:s"); ?>" required>
                            <input type="button" value="✖️" title="Un-set" onClick="document.getElementById('fromDateTime').value = undefined;">
                            <input type="button" value="🕒" title="Set to now" onClick="document.getElementById('fromDateTime').value = getNowForDatetimeLocal();">
                        </td>
                    </tr>
                    <tr>
                        <td>stoppedAt: </td>
                        <td>
                            <input type="datetime-local" name="toDateTime" id="toDateTime" value="<?php echo date("Y-m-d H:i:s"); ?>" required>
                            <input type="button" value="✖️" title="Un-set" onClick="document.getElementById('toDateTime').value = undefined;">
                            <input type="button" value="🕒" title="Set to now" onClick="document.getElementById('toDateTime').value = getNowForDatetimeLocal();">
                        </td>
                    </tr>
                    <tr>
                        <td>game: </td>
                        <td>
                            <select name="optionsGame" id="optionsGame" required onChange="getOptionsRun(document.getElementById('optionsGame').value);">
                                <script type="text/javascript" language="javascript">
                                    // call JS function
                                    getOptionsGame();
                                </script>
                            </select>
                            <input type="button" value="➕" title="Add game" onClick="console.log('TODO');">
                        </td>
                    </tr>
                    <tr>
                        <td>sessionType: </td>
                        <td>
                            <select class="dropdown" name="optionsSessionType" id="optionsSessionType">
                                <script type="text/javascript" language="javascript">
                                    // call JS function
                                    getOptionsSessionType();
                                </script>
                            </select>
                            <input type="button" value="✖️" onClick="document.getElementById('optionsSessionType').value = -1;">
                        </td>
                    </tr>
                    <tr>
                        <td>run: </td>
                        <td>
                            <select class="dropdown" name="optionsRun" id="optionsRun">
                                <script type="text/javascript" language="javascript">
                                    // call JS function
                                    getOptionsRun(document.getElementById('optionsGame').value);
                                </script>
                            </select>
                            <input type="button" value="✖️" title="Un-select" onClick="document.getElementById('optionsRun').value = -1;">
                            <input type="button" value="➕" title="Add run for current game" onClick="console.log('TODO');">
                        </td>
                    </tr>
                    <tr>
                        <td>note: </td>
                        <td><input type="text" name="note" id="note"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="button" value="Speichern" onClick="insertSession(
                                    document.getElementById('fromDateTime').value,
                                    document.getElementById('toDateTime').value,
                                    document.getElementById('optionsGame').value,
                                    document.getElementById('optionsSessionType').value,
                                    document.getElementById('optionsRun').value,
                                    document.getElementById('note').value
                                );">
                            <div id="result"></div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div>
            <h1>Letzte Sessions</h1>
            <input type="number" name="itemsToLoad" id="itemsToLoad" value=50 onChange="getLatestSessions(document.getElementById('itemsToLoad').value)"> 🔁 Refresh
            <script type="text/javascript" language="javascript">
                // call JS function with parameter
                getLatestSessions(document.getElementById('itemsToLoad').value);
            </script>
            <div id="latestSessions">
            </div>
        </div>
    </body>
</html>
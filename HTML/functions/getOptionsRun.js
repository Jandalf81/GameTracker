function getOptionsRun(game) {
    $(document).ready(function() { /// Wait till page is loaded
        // call PHP function with parameter
        $.ajax({
            type: "POST",
            url: "functions/getOptionsRun.php",
            dataType: "json",
            data: {game: game},
            success: function (obj, textstatus) {
                // console.log(obj);
                if (obj.result == "OK") {
                    $('#optionsRun').html(obj.data);
                } else {
                    $('#optionsRun').html("Fehler beim Laden der Daten");
                }
            },
            error: function (obj, textstatus) {
                console.log("Fehler");
            }
        });
    });
}
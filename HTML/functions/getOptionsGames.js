function getOptionsGames() {
    $(document).ready(function() { /// Wait till page is loaded
        // call PHP function with parameter
        $.ajax({
            type: "POST",
            url: "functions/getOptionsGames.php",
            dataType: "json",
            data: {},
            success: function (obj, textstatus) {
                // console.log(obj);
                if (obj.result == "OK") {
                    $('#game').html(obj.data);
                } else {
                    $('#game').html("Fehler beim Laden der Daten");
                }
            },
            error: function (obj, textstatus) {
                console.log("Fehler");
                console.log(obj);
            }
        });
    });
}
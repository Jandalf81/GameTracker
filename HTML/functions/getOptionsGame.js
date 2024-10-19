function getOptionsGame() {
    $(document).ready(function() { /// Wait till page is loaded
        // call PHP function with parameter
        $.ajax({
            type: "POST",
            url: "functions/getOptionsGame.php",
            dataType: "json",
            data: {},
            success: function (obj, textstatus) {
                // console.log(obj);
                if (obj.result == "OK") {
                    $('#optionsGame').html(obj.data);
                } else {
                    $('#optionsGame').html("Fehler beim Laden der Daten");
                }
            },
            error: function (obj, textstatus) {
                console.log("Fehler");
                console.log(obj);
            }
        });
    });
}
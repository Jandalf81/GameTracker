function getLatestSessions(limit) {
    $(document).ready(function() { /// Wait till page is loaded
        // call PHP function with parameter
        $.ajax({
            type: "POST",
            url: "functions/getLatestSessions.php",
            dataType: "json",
            data: {limit: limit},
            success: function (obj, textstatus) {
                // console.log(obj);
                if (obj.result == "OK") {
                    $('#latestSessions').html(obj.data);
                } else {
                    $('#latestSessions').html("Fehler beim Laden der Daten");
                }
            },
            error: function (obj, textstatus) {
                console.log("Fehler");
            }
        });
    });
}
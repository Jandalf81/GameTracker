function updateSession(id, fromDateTime, toDateTime, game, sessionType, run, note) {
    if (fromDateTime == "") {
        $('#result').html("❌ Please enter startedAt");
        return;
    }
    if (toDateTime == "") {
        $('#result').html("❌ Please enter stoppedAt");
        return;
    }

    $.ajax({
        type: "POST",
        url: "functions/updateSession.php",
        dataType: "json",
        data: {id: id, fromDateTime: DatetimeToString(fromDateTime), toDateTime: DatetimeToString(toDateTime), game: game, sessionType: sessionType, run: run, note: note},
        success: function(obj, textstatus) {
            //console.log(obj);
            $('#result').html("✅");
        },
        error: function(obj, textstatus) {
            console.log(obj);
        },
    });
}
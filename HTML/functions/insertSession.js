function insertSession(fromDateTime, toDateTime, game, sessionType, run, note) {
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
        url: "functions/insertSession.php",
        dataType: "json",
        data: {fromDateTime: DatetimeToString(fromDateTime), toDateTime: DatetimeToString(toDateTime), game: game, sessionType: sessionType, run: run, note: note},
        success: function(obj, textstatus) {
            console.log(obj);
            $('#result').html("✅");
            getLatestSessions(document.getElementById('itemsToLoad').value);
        },
        error: function(obj, textstatus) {
            console.log(obj);
            
        },
    });
}
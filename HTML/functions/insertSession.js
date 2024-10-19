function insertSession(fromDateTime, toDateTime, game, note) {
    $.ajax({
        type: "POST",
        url: "functions/insertSession.php",
        dataType: "json",
        data: {fromDateTime: DatetimeToString(fromDateTime), toDateTime: DatetimeToString(toDateTime), game: game, note: note},
        success: function(obj, textstatus) {
            console.log(obj);
            $('#result').html("✅");
            getLatestSessions(document.getElementById('itemsToLoad').value);
        },
        error: function(obj, textstatus) {
            console.log(obj);
            $('#result').html("❌");
        },
    });
}
function getSessionById(id) {
    $(document).ready(function() { /// Wait till page is loaded
        // call PHP function with parameter
        $.ajax({
            type: "POST",
            url: "functions/getSessionById.php",
            dataType: "json",
            data: {id: id},
            success: function (obj, textstatus) {
                // console.log(obj);
                if (obj.result == "OK") {
                    document.getElementById("sessionId").value = obj.data.id;
                    document.getElementById("fromDateTime").value = getDatetimeForInput(obj.data.startedAt);
                    document.getElementById("toDateTime").value = getDatetimeForInput(obj.data.stoppedAt);
                    document.getElementById("optionsGame").value = obj.data.game;
                    getOptionsRun(obj.data.game);
                    document.getElementById("note").value = obj.data.note;
                        
                    // wait for the options to be loaded, then set value
                    setTimeout(() => {
                            document.getElementById("optionsSessionType").value = obj.data.sessionType;                   
                            document.getElementById("optionsRun").value = obj.data.run;
                        }, 
                        50
                    );
                    
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
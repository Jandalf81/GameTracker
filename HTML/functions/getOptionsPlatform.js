function getOptionsPlatform() {
    $(document).ready(function() { /// Wait till page is loaded
        // call PHP function with parameter
        $.ajax({
            type: "POST",
            url: "functions/getOptionsPlatform.php",
            dataType: "json",
            data: {},
            success: function (obj, textstatus) {
                // console.log(obj);
                if (obj.result == "OK") {
                    $('#optionsPlatform').html(obj.data);
                } else {
                    $('#optionsPlatform').html("Fehler beim Laden der Daten");
                }
            },
            error: function (obj, textstatus) {
                console.log("Fehler");
                console.log(obj);
            }
        });
    });
}
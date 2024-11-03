function getOptionsCollection() {
    $(document).ready(function() { /// Wait till page is loaded
        // call PHP function with parameter
        $.ajax({
            type: "POST",
            url: "functions/getOptionsCollection.php",
            dataType: "json",
            data: {},
            success: function (obj, textstatus) {
                // console.log(obj);
                if (obj.result == "OK") {
                    $('#optionsCollection').html(obj.data);
                } else {
                    $('#optionsCollection').html("Fehler beim Laden der Daten");
                }
            },
            error: function (obj, textstatus) {
                console.log("Fehler");
                console.log(obj);
            }
        });
    });
}
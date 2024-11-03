function insertPlatform(manufacturer, name) {
    $.ajax({
        type: "POST",
        url: "functions/insertPlatform.php",
        dataType: "json",
        data: {manufacturer: manufacturer, name: name},
        success: function(obj, textstatus) {
            console.log(obj);
            $('#result').html("✅");
        },
        error: function(obj, textstatus) {
            console.log(obj);
        },
    });
}
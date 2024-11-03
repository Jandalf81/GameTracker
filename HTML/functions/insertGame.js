function insertGame(name, developer, publisher, year, platform, collection) {
    $.ajax({
        type: "POST",
        url: "functions/insertGame.php",
        dataType: "json",
        data: {name: name, developer: developer, publisher: publisher, year: year, platform: platform, collection: collection},
        success: function(obj, textstatus) {
            console.log(obj);
            $('#result').html("✅");
        },
        error: function(obj, textstatus) {
            console.log(obj);
            
        },
    });
}
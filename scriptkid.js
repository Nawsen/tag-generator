

$(document).ready(function() {
    $("#downloadButton").hide();
    $("#message").hide();
    $("#helpBox").hide();
    $("#downloadButton").click(function() {
        alert("You will now download 2 JPEG files, your browser may ask you If you wish to continue, be sure to accept!");
        $("#downloadKaart")[0].click();
        $("#downloadSign")[0].click();
    });

});
//activates when clicked on "create" button
function add() {

    var name = $("#name").val();
    var job = $("#job").val();
    var email = $("#email").val();
    var gsm = $("#gsm").val();
    if (name != "" && job != "" && email != "" && gsm != "") {

        //creates Kaart image
        $.post("createImageKaart.php", {name: name, job: job, email: email, gsm: gsm}, function(returnedData) {
            $('#imgKaart').html('<img id ="image" src="data:image/jpeg;base64,' + returnedData + '" />');
            $('#imgKaart').slideDown("slow");
            dispalyDownloadKaart(returnedData);
        });
        //creates sign image
        $.post("createImageSign.php", {name: name, job: job, email: email, gsm: gsm}, function(returnedData) {
            $('#imgSign').html('<img id ="image" src="data:image/jpeg;base64,' + returnedData + '" />');
            $('#imgSign').slideDown("slow");
            displayDownloadSign(returnedData);
        });
        message(1);

    } else {
        //data is missing
        $('#imgSign').slideUp("slow", function() {
            $('#imgSign').html("");
        });
        $('#imgKaart').slideUp("slow", function() {
            $('#imgKaart').html("");
        });
        $("#downloadButton").hide();
        message(2);
    }

}
function help() {

    $("#imgSign").slideUp("slow");
    $("#imgKaart").slideUp("slow");
    $("#message").slideUp("slow");
    $("#first").slideUp("slow", function() {
        $("#helpBox").slideDown("slow");
    });
    $("#downloadButton").hide();

}
function back() {
    $("#helpBox").slideUp("slow", function() {
        $("#first").slideDown("slow");
    });
}

//2 methods needed to inject the download urls, may seem like an ugly solution but it is needed
//php doesn't instantly return the values so we have to wait for them and do them separatly
function displayDownloadSign($data) {
    if ($("#img").html() == "") {
        $("#downloadButton").hide();
    } else {
        $("#downloadSign").attr("href", 'data:image/jpeg;base64,' + $data).attr("download", "bdbSignCustom.jpg");
        $("#downloadButton").show();
    }
}
function dispalyDownloadKaart($data) {
    if ($("#img").html() == "") {
        $("#downloadButton").hide();
    } else {
        $("#downloadKaart").attr("href", 'data:image/jpeg;base64,' + $data).attr("download", "bdbKaartCustom.jpg");
        $("#downloadButton").show();
    }

}

function message($type) {
    $("#message").slideUp("slow");
    if ($type == 1) {

        $("#message").text("Succesfully created image!").addClass("green").removeClass("red");

    }
    if ($type == 2) {
        $("#message").text("Error, something went wrong!").addClass("red").removeClass("green");

    }
    $("#message").slideDown("slow");
}
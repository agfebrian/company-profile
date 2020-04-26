$(document).ready(function() {
    $('#dropdown-filter').click(function() {
        $('.dropdown-content-filter').slideToggle("slow");    
    });

    $('#input-desc').keypress(function(e) {
        var newLine = document.createElement("br");
        if( e.key == "Enter" ) {
            $('#input-desc').append(newLine);
            console.log($('#input-desc'));
        }
    })
})
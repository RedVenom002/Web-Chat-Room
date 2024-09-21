

$(document).ready(function() {
    $('#test').on('keyup', function() {
        var textareaContent = $('#test').val();
        var username = $('#username').val();
        var password = $('#password').val();
        console.log("test");
        $.ajax({
            url: 'update.php',
            type: 'POST',
            data: {
                textareaContent: textareaContent,
                username: username,
                password: password
            },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});
$(document).ready(function(){
    setInterval(function(){
        var username = $("#response_username").val();
        console.log("test");
    $.ajax({
            url: 'app.php',
            type: 'POST',
            data: { 
                username: username
            },
            success: function(response){
                
                $("#response").val(response);
            },
            error: function(xhr, status, error){
                
                console.error(xhr.responseText);
            }
    });
    },1000);
});

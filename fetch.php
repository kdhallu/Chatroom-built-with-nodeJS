
<?php 
$message = $_POST['name'];
$message2 = $_POST['message'];
?>



        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <script>
		
		$(function () {
    "use strict";

    // for better performance - to avoid searching in DOM
    var content = $('#content');
    var input = $('#input');
    var status = $('#status');

    // my color assigned by the server
    var myColor = false;
    // my name sent to the server
    var myName = false;

    // if user is running mozilla then use it's built-in WebSocket
    window.WebSocket = window.WebSocket || window.MozWebSocket;

    // if browser doesn't support WebSocket, just show some notification and exit
    if (!window.WebSocket) {
        content.html($('<p>', { text: 'Sorry, but your browser doesn\'t '
                                    + 'support WebSockets.'} ));
        input.hide();
        $('span').hide();
        return;
    }

    // open connection
    var connection = new WebSocket('ws://127.0.0.1:1337');

    connection.onopen = function () {
        // first we want users to enter their names
        input.removeAttr('disabled');
        status.text('Choose name:');
		
		connection.send('<?php echo $message; ?>');
		connection.send('<?php echo $message2; ?>');
		
    };

 
    
   
});


		</script>
    </body>
</html>
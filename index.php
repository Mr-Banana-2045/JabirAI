<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://getuikit.com/v2/docs/css/uikit.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body { font-family: Arial, sans-serif; background:#22303C }
        .chat-container {
        	position: absolute;
            left:10px;
            right:10px;
            bottom:50px;
            top:50px;
            max-width: 600px;
            margin: 20px auto;
            border:2px solid white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            overflow-y: auto;
        }
        .message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            clear: both;
        }
        .user-message {
            background: #0084ff;
            color: white;
            float: right;
            text-align: right;
            max-width: 70%;
        }
        .bot-message {
            background: #e5e5ea;
            color: black;
            float: left;
            text-align: left;
            max-width: 70%;
        }
        .clear { clear: both; }
        form{
        	position: absolute;
        bottom:10px; 
        left:10;
        right:10;
        background:black;
        border:1px solid white;
        padding:8px;
        border-radius:10px;
        }
        input[type="text"]{
        	border-radius:10px 0px 0px 10px;
        width:400px;
        outline:none;
        border:none;
        height:35px;
        padding-left:10px;
        }
        input[type="text"]::placeholder {
        	color:gray;
        font-size:15px;
        }
        input[type="submit"]{
        	background:#0084ff;
        height:36.8px;
        border:none;
        outline:none;
        margin-left:-5px;
        border-radius:0px 10px 10px 0px;
        color:white;
        font-weight:900;
        }
        #option{ display:none; position:fixed; top:300px; left:30px; right:30px;}
    </style>
</head>
<body>
<center>
    <h1 style="color:white;">jabir-400b-online <button onclick="customize()" style="background:none; border:none; float:right;"><svg fill="#ffffff" height="30px" width="30px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-5.94 -5.94 65.88 65.88" xml:space="preserve" stroke="#ffffff" stroke-width="1.4040000000000001"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M51.22,21h-5.052c-0.812,0-1.481-0.447-1.792-1.197s-0.153-1.54,0.42-2.114l3.572-3.571 c0.525-0.525,0.814-1.224,0.814-1.966c0-0.743-0.289-1.441-0.814-1.967l-4.553-4.553c-1.05-1.05-2.881-1.052-3.933,0l-3.571,3.571 c-0.574,0.573-1.366,0.733-2.114,0.421C33.447,9.313,33,8.644,33,7.832V2.78C33,1.247,31.753,0,30.22,0H23.78 C22.247,0,21,1.247,21,2.78v5.052c0,0.812-0.447,1.481-1.197,1.792c-0.748,0.313-1.54,0.152-2.114-0.421l-3.571-3.571 c-1.052-1.052-2.883-1.05-3.933,0l-4.553,4.553c-0.525,0.525-0.814,1.224-0.814,1.967c0,0.742,0.289,1.44,0.814,1.966l3.572,3.571 c0.573,0.574,0.73,1.364,0.42,2.114S8.644,21,7.832,21H2.78C1.247,21,0,22.247,0,23.78v6.439C0,31.753,1.247,33,2.78,33h5.052 c0.812,0,1.481,0.447,1.792,1.197s0.153,1.54-0.42,2.114l-3.572,3.571c-0.525,0.525-0.814,1.224-0.814,1.966 c0,0.743,0.289,1.441,0.814,1.967l4.553,4.553c1.051,1.051,2.881,1.053,3.933,0l3.571-3.572c0.574-0.573,1.363-0.731,2.114-0.42 c0.75,0.311,1.197,0.98,1.197,1.792v5.052c0,1.533,1.247,2.78,2.78,2.78h6.439c1.533,0,2.78-1.247,2.78-2.78v-5.052 c0-0.812,0.447-1.481,1.197-1.792c0.751-0.312,1.54-0.153,2.114,0.42l3.571,3.572c1.052,1.052,2.883,1.05,3.933,0l4.553-4.553 c0.525-0.525,0.814-1.224,0.814-1.967c0-0.742-0.289-1.44-0.814-1.966l-3.572-3.571c-0.573-0.574-0.73-1.364-0.42-2.114 S45.356,33,46.168,33h5.052c1.533,0,2.78-1.247,2.78-2.78V23.78C54,22.247,52.753,21,51.22,21z M52,30.22 C52,30.65,51.65,31,51.22,31h-5.052c-1.624,0-3.019,0.932-3.64,2.432c-0.622,1.5-0.295,3.146,0.854,4.294l3.572,3.571 c0.305,0.305,0.305,0.8,0,1.104l-4.553,4.553c-0.304,0.304-0.799,0.306-1.104,0l-3.571-3.572c-1.149-1.149-2.794-1.474-4.294-0.854 c-1.5,0.621-2.432,2.016-2.432,3.64v5.052C31,51.65,30.65,52,30.22,52H23.78C23.35,52,23,51.65,23,51.22v-5.052 c0-1.624-0.932-3.019-2.432-3.64c-0.503-0.209-1.021-0.311-1.533-0.311c-1.014,0-1.997,0.4-2.761,1.164l-3.571,3.572 c-0.306,0.306-0.801,0.304-1.104,0l-4.553-4.553c-0.305-0.305-0.305-0.8,0-1.104l3.572-3.571c1.148-1.148,1.476-2.794,0.854-4.294 C10.851,31.932,9.456,31,7.832,31H2.78C2.35,31,2,30.65,2,30.22V23.78C2,23.35,2.35,23,2.78,23h5.052 c1.624,0,3.019-0.932,3.64-2.432c0.622-1.5,0.295-3.146-0.854-4.294l-3.572-3.571c-0.305-0.305-0.305-0.8,0-1.104l4.553-4.553 c0.304-0.305,0.799-0.305,1.104,0l3.571,3.571c1.147,1.147,2.792,1.476,4.294,0.854C22.068,10.851,23,9.456,23,7.832V2.78 C23,2.35,23.35,2,23.78,2h6.439C30.65,2,31,2.35,31,2.78v5.052c0,1.624,0.932,3.019,2.432,3.64 c1.502,0.622,3.146,0.294,4.294-0.854l3.571-3.571c0.306-0.305,0.801-0.305,1.104,0l4.553,4.553c0.305,0.305,0.305,0.8,0,1.104 l-3.572,3.571c-1.148,1.148-1.476,2.794-0.854,4.294c0.621,1.5,2.016,2.432,3.64,2.432h5.052C51.65,23,52,23.35,52,23.78V30.22z"></path> <path d="M27,18c-4.963,0-9,4.037-9,9s4.037,9,9,9s9-4.037,9-9S31.963,18,27,18z M27,34c-3.859,0-7-3.141-7-7s3.141-7,7-7 s7,3.141,7,7S30.859,34,27,34z"></path> </g> </g></svg></button></h1>
    <div class="chat-container" id="bot">
        <div id="messages"></div>
    </div>
    <form id="myForm" method="POST" action="back.php" style="margin-top: 10px;">
        <input type="text" name="text" placeholder="Enter Your Text" required>
        <input type="submit" value="Send">
    </form>
    <div id="option">
    	<form id="myForm" method="POST" action="back.php">
    	<h1 style="color:white;">OptionS</h1>
        <input type="text" name="system" style="width:400px; border-radius:10px; margin-bottom:10px; " placeholder="system" required>
        	<input type="text" name="assistant" style="width:400px; border-radius:10px;margin-bottom:10px; " placeholder="assistant" required>
        <input type="submit" style="width:400px; border-radius:10px; margin-left:0px; margin-bottom:10px;" value="save">
    </form>
    </div>
</center>
<script>
    $(document).ready(function(){
        $('#myForm').on('submit', function(event){
            event.preventDefault();
            const userMessage = $('input[name="text"]').val();
            const time = new Date().toLocaleTimeString();
            $('#messages').append(`<div class="message user-message">${userMessage}<br><a style="font-size:10px; float:right;">${time}</a></div><div class="clear"></div>`);
            $.ajax({
                url: 'back.php',
                type: 'POST',
                data: $(this).serialize() + '&system=' + localStorage.getItem('system') + '&assistant=' + localStorage.getItem('assistant'),
                success: function(data) {
                    const response = JSON.parse(data);
                    $('#messages').append(`<div class="message bot-message"><a style="font-size:18px; font-weight:900;">${response.role}</a><br><br>${response.output}<br><a style="font-size:10px; float:right;">${time}</a></div><div class="clear"></div>`);
                    $('#bot').scrollTop($('#bot')[0].scrollHeight);
                },
                error: function(xhr, status, error) {
                    console.error("AJAX error:", error);
                }
            });
            $('input[name="text"]').val('');
        });

        $('#option form').on('submit', function(event){
            event.preventDefault();
            const system = $('input[name="system"]').val();
            const assistant = $('input[name="assistant"]').val();
            
            // Store values in localStorage
            localStorage.setItem('system', system);
            localStorage.setItem('assistant', assistant);
            
            // Hide the option div
            $('#option').hide();
        });
    });
    
    function customize(){
        document.getElementById("option").style.display = "block";
    }
    function close(){
    	document.getElementById("option").style.display = "none";
    }
</script>

</body>
</html>

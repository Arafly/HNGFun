<!--Created by Thomas Lois ---->
<!DOCTYPE html>
<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Alegreya|Allura|Almendra SC|Romanesco' rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css?family=Josefin%20Sans:400,500,600,700" rel='stylesheet' type='text/css' />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <style type="text/css">
	 @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700);
       body {
            font-family: "Josefin Sans","Montserrat","Segoe UI","Roboto","Helvetica Neue","Arial","sans-serif";
            color: #4A4646;
            overflow-x: hidden;
        }
		 .container {
            max-width: 95%;
            padding-left: 0;
		
        }
		   .chatbox {
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 16px;
            display: flex;
            flex-direction: column;
            max-width: 550px;
            margin: 0 auto;
			 border-radius: 5px;
			 border: 5px solid #191970;
        }

        footer {
            display: none;
        }

		   .container.profile-body {
            padding-right : 0;
        }

        .profile-details, .chatbox {
            padding-top: 90px;
        }

        .profile-details {
            padding-right: 0;
            height: auto;
        }
        .profile-body {
            max-width: 50%;
        }
        .profile-image img {
            margin: auto;
            display: block;
            width: 250px;
			height:400px;
            border-radius: 100px;
			box-shadow: 0px 0px 5px 2px grey;
        }
        .profile-name {
            font-size: 25px;
            font-weight: 600;
            margin-top: 20px;
			color:#191970;
        }
        .social-links a {
            margin-right: 20px;
        }
        .fa-github {
            color: #333333;
        }
        .fa-facebook {
            color: #3b5998;
        }
        .fa-twitter {
            color: #1da1f2;
        }
		
		
		* {
		outline: none; 
	   tap-highlight: none;
	   -webkit-tap-highlight: none;
	   -webkit-tap-highlight-color: none;
	   -moz-tap-highlight: none;
	   -moz-tap-highlight-color: none;
	   -khtml-tap-highlight: none;
	   -khtml-tap-highlight-color: none;
		}		
        .chat-result {
            flex: 1;
            padding: 10px;
            display: flex;
            background: white;
            flex-direction: column;
            overflow-y: scroll;
            max-height: 500px;
			border-radius: 5px; 
			
        }
        .chat-result > div {
            margin: 0 0 20px 0;
        }
        .chat-result .user-message .message {
            background: #191970;
            color: white;
        }
        .chat-result .bot-message {
            text-align: right;
        }
        .chat-result .bot-message .message {
            background: #eee;
			
        }
        .chat-result .message {
            display: inline-block;
            padding: 10px 10px;
			margin: 5px;
            border-radius: 10px;
        }
        .chat-input {
            padding: 15px;
            background-color: #fff;
			font-size: 16px;
        }
        .chat-input .user-input {
            width: 80%;
            border: 1px solid #ccc;
            border-radius: 25px;
            padding: 10px;
			float: left;
        }
		#send {
		   width: 80px;
		   height: 45px;
		   display: inline-block
		   outline: none;
		   border: none;
		   color: #fff;
		   background-color: #191970;
		   float: right;
		   border-radius: 25px;
		   padding: 0px;
		   cursor: pointer;
		   margin: 0px;
		}
		#send:active {
		   background-color: #00A; 
		   outline: none;
		}

    </style>
</head>
<body>
<div class="container">
    <?php
    global $conn;
    try {
        $sql2 = 'SELECT * FROM interns_data WHERE username="techHajiya"';
        $q2 = $conn->query($sql2);
        $q2->setFetchMode(PDO::FETCH_ASSOC);
        $my_data = $q2->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    ?>

     <div class="row">
            <div class="col-sm-6 profile-details">
                <div class="profile-image">
                    <img src="<?=$my_data['image_filename'] ?>" alt="Lois Thomas">
                </div>
				<p class="text-center profile-name">
				<span> Hi! I am  <?=$my_data['name'] ?>  <br/>(@<?=$my_data['username'] ?>) <br/> I Eat | I Code | I Repeat</span>
                </p>
                <div class="text-center social-links">
                    <a href="https://github.com/cara06" target="_blank"><i class="fa fa-2x fa-github"></i></a>
                    <a href="https://twitter.com/techhajiya" target="_blank"><i class="fa fa-2x fa-twitter"></i></a>
                    <a href="https://facebook.com/lois.idzi5" target="_blank"><i class="fa fa-2x fa-facebook"></i></a>
                </div>
            </div>


      <div class="col-sm-6 chatbox" style='float: right; padding-top: 50px'>
                <div class="chat-result" id="chat-result">
                    <div class="user-message">
					<div class="message">Hello! I'm LoBot! feel free to ask me anything.   </div>
                    <div class="message">To train me, use this syntax - 'train: question # answer # password'. </br>To learn more about me, simply type - 'aboutbot'.</div>
                    </div>
                </div>

                <div class="chat-input">
                    <form action="" method="post" id="user-input-form">
                        <input type="text" name="user-input" id="user-input" class="user-input" placeholder="Type a message...">
						<button id="send">SEND</button>
                    </form>
                </div>
		
          </div>
		   </div>


    <?php
    try {
        $sql = 'SELECT * FROM secret_word';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    $secret_word = $data['secret_word'];
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = $_POST['user-input'];
        $temp = explode(':', $data);
        $temp2 = preg_replace('/\s+/', '', $temp[0]);
        
        if($temp2 === 'train'){
            train($temp[1]);
        }elseif($temp2 === 'aboutbot') {
            aboutbot();
        }else{
            getAnswer($temp[0]);
        }
    }
	##About Bot
    function aboutbot() {
        echo "<div id='result'>LoBot version 1.0 - I am a bot created by Lois Thomas that returns data from the database. That's not all, I also can be taught new tricks!</div>";
    }
	
	##Train Bot
    function train($input) {
        $input = explode('#', $input);
        $question = trim($input[0]);
        $answer = trim($input[1]);
        $password = trim($input[2]);
        if($password == 'LoBot') {
            $sql = 'SELECT * FROM chatbot WHERE question = "'. $question .'" and answer = "'. $answer .'" LIMIT 1';
            $q = $GLOBALS['conn']->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $data = $q->fetch();
            if(empty($data)) {
                $training_data = array(':question' => $question,
                    ':answer' => $answer);
                $sql = 'INSERT INTO chatbot ( question, answer)
              VALUES (
                  :question,
                  :answer
              );';
                try {
                    $q = $GLOBALS['conn']->prepare($sql);
                    if ($q->execute($training_data) == true) {
                        echo "<div id='result'>Thank you for training me. <br>
			Now you can ask me same question, and I will answer it.</div>";
                    };
                } catch (PDOException $e) {
                    throw $e;
                }
            }else{
                echo "<div id='result'>I already understand this. Teach me something new!</div>";
            }
        }else {
            echo "<div id='result'>You entered an invalid Password. </br>Try Again!</div>";
        }
    }
    function getAnswer($input) {
        $question = $input;
        $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
        $q = $GLOBALS['conn']->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetchAll();
        if(empty($data)){
            echo "<div id='result'>Sorry, I do not know that command. You can train me simply by using the format - 'train: question # answer # password'</div>";
        }else {
            $rand_keys = array_rand($data);
            echo "<div id='result'>". $data[$rand_keys]['answer'] ."</div>";
        }
    }
    ?>

</div>

</body>

<script>
    var outputArea = $("#chat-result");
    $("#user-input-form").on("submit", function(e) {
        e.preventDefault();
        var message = $("#user-input").val();
        outputArea.append(`<div class='bot-message'><div class='message'>${message}</div></div>`);
        $.ajax({
            url: 'profile.php?id=techHajiya',
            type: 'POST',
            data:  'user-input=' + message,
            success: function(response) {
                var result = $($.parseHTML(response)).find("#result").text();
                setTimeout(function() {
                    outputArea.append("<div class='user-message'><div class='message'>" + result + "</div></div>");
                    $('#chat-result').animate({
                        scrollTop: $('#chat-result').get(0).scrollHeight
                    }, 1500);
                }, 250);
            }
        });
        $("#user-input").val("");
    });
</script>
<?php
  $result = $conn->query("Select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_ASSOC);
  $secret_word = $result['secret_word'];

  $result2 = $conn->query("Select * from interns_data where username = 'basitomania'");
  $user = $result2->fetch(PDO::FETCH_ASSOC);
  
  $username = $user['username'];
  $name = $user['name'];
  $image_filename = $user['image_filename'];
?>

<?php
$servername = "localhost";
$username = "username";
$password = "password";

try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Basitomania | Web Developer</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/responsive.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Changa+One|Open+Sans" rel="stylesheet">
        <style>
        /********************
GENERAL
*********************/
body {
	font-family: 'Open Sans', sans-serif;
}
#wrapper {
	max-width: 940px;
	margin: 0 auto;
	padding: 0 5%;
}

a {
	text-decoration: none;
}


h3 {
	margin: 0 0 1em 0;
}

/********************
HEADING
*********************/
header {
	float: left;
	margin: 0 0 30px 0;
	padding: 5px 0 0 0;
	width: 100%;
}
#logo {
	text-align: center;
	margin: 0;
}

h1 {
	font-family: 'Changa One', sans-serif;
	margin: 15px 0;
	font-size: 1.75em;
	font-weight: normal;
	line-height: 0.8em;
}

h2 {
	font-size: 0.75em
	margin: -5px 0 0;
	font-weight: normal;
}

#primary {
		width: 50%;
		float: left;
	}

#secondary {
		width: 40%;
		float: right;
	}


/********************
FOOTER
*********************/
footer {
	font-size: 0.95em;
	text-align: center;
	clear: both;
	padding-top: 50px
	color: #ccc;
}

/********************
PAGE: ABOUT
*********************/
.profile-photo {
            border-radius:50%;
        }



/********************
PAGE: CONTACT
*********************/
.contact-info {
	list-style: none;
	padding: 0;
	margin: 0;
	font-size: 0.9em;
}

.contact-info a {
	display: block;
	min-height: 20px;
	background-repeat: no-repeat;
	background-size: 20px 20px;
	padding: 0 0 0 30px;
	margin: 0 0 10px;
}

.contact-info li.phone a {
	background-image: url('../img/phone.png');
}

.contact-info li.mail a {
	background-image: url('../img/mail.png');
}

.contact-info li.twitter a {
	background-image: url('../img/twitter.png');
}

/********************
COLORS
*********************/

/* site body */
body {
	background-color: #fff;
	color: #999;
}

/* Green Header */
header {
	background: #6ab47b;
	border-color: #599a68;
	padding-top: 30px;
}

/* Nav background on mobile devices */
nav {
	background: #599a68;
	text-align: center;
	padding: 5px 0;
	margin: 5px 0 0;
}

h1, h2 {
	color: #fff;
}

/* logo text */
a {
	color: #6ab47b;
}

/*chatbot*/
.chatbot-container{
		  background-color: #F3F3F3;
		  width: 500px;
		  height: 500px;
		  margin: 10px;
		  box-sizing: border-box;
		  box-shadow: -3px 3px 5px gray;
		}
.chat-header{
			width: 500px;
			height: 50px;
			background-color: #6ab47b;
			color: white;
			text-align: center;
			padding: 10px;
			font-size: 1.5em;
		}
#chat-body{
		    display: flex;
		    flex-direction: column;
		    padding: 10px 20px 20px 20px;
		    background: white;
		    overflow-y: scroll;
		    height: 395px;
		    max-height: 395px;
		}
.message{
			font-size: 0.8em;
			width: 300px;
			display: inline-block;
          	padding: 10px;
			margin: 5px;
        	border-radius: 10px;
    		line-height: 18px;
		}
.bot-chat{
			text-align: left;
		}
.bot-chat .message{
			background-color: #34495E;
			color: white;
			opacity: 1.9;
			box-shadow: 5px 5px 8px gray;
		}
#chat_showcase{
      list-style-type: none;
      display: flex;
      flex-direction: column;
    }

.user_chat{
			text-align: right;
		}
.user_chat .message{
			background-color: #E0E0E0;
			color: black;
			box-shadow: 3px 3px 5px gray;
		}
#send {
      border: none;
      color: white;
      padding: 13px 28px;
      text-align: center;
      font-size: 15px;
      margin: 5px 12px;
      /*position: absolute;*/
      float: right;
      /*box-shadow: 4px 4px 2px #a8b2c1;*/
      border-radius: 10px;
    }

</style>
	</head>
	<body>
		<header>
			<a href="index.html" id="logo">
				<h1>Basitomania</h1>
				<h2>Web Developer</h2>
			</a>
		</header>
		<div id="wrapper">
				<section id = "primary">
					<img src="https://res.cloudinary.com/envision-media/image/upload/v1524776569/IMG_20180211_193710.jpg" alt="photo" class="profile-photo">
					<h3 style = "padding-top:10px">About</h3>
					<p>Hi I'm basitomania, this is my design portfolio where i share all my work when i'm not surfing the net and markerting online. To follow me on twitter my handle is <a href="http://www.twitter.com">@iamblack8</a>.</p>
					<h3 style = "padding-top:10px">Contact Details</h3>
					<ul class="contact-info">
						<li class="phone">
							<a href="tel:+2348166380172">+2348166380172</a>
						</li>
						<li class="mail">
							<a href="mailto:basitomania@gmail.com">basitomania@gmail.com</a>
						</li>
						<li class="twitter">
							<a href="http://twitter.com/intent/tweet?screen_name=iamblack8">@iamblack8</a>
						</li>
					</ul>	
				</section>		
			<section id="secondary">
				<div class="chatbot-container">
					<div class="chat-header">
						<span>Bas Chatbot</span>
					</div>
					<div id="chat-body">
						<div class="bot-chat">
							<div class="message">Hello! My name is Basbot.<br>You can ask me questions and get answers.<br>Type <span style="color: #90CAF9;/"><strong> Aboutbot</strong></span> to know more about me.</div>
							<div class="message">You can also train me to be smarter by typing; <br><span style="color: #90CAF9;"><strong>train: question #answer #password</strong></span><br></div>
						</div>
					</div>
					<div class="chat-footer">
						<div class="input-text-container">
							<form action="" method="post" id="chat-input-form">
								<input type="text" name="input_text" id="input" required class="input_text" placeholder="Type your question here...">
								<button type="submit" class="send_button" id="send">Send</button>
							</form>
						</div>
					</div>
				</div>	
			</section>		
		</div>

		<footer>
			<p>&copy; 2017 Maniaweb.</p>
		</footer>
			<script type = text/javascript>
				
				document.queryselector("#input").addEventListener("keypress", function(e){
					var key = e.which || e.keyCode;
					if(key == 13){
						var input = document.getElementById("input").value;
						document.getElementById("user").innerHTML = input;
						output(input);
						}
					});

					function output(input){
						try{
							var product = input + "=" + eval(input);
						} catch(e){
							var text = (input.toLowerCase()).replace(/[^\w\s\d]/gi, "");
							if(compare(trigger, reply, text)){
								var product = compare(trigger, reply, text);
							} else {
								var product = text;
							}
						}
						document.getELementById("chatbot").innerHTML = input;
						document.getElementById("input").value = "";
					}
					function compare(arr, array, string){
						var item;
						for(var x= 0; x<arr.length; x++){
							for(var y = 0; y<array.length; y++){
								if(arr[x][y] == string){
									items = array[x];
									item = items[Math.floor(Math.random()*items.length)];
								}
							}
						}
						return item
					}
			</script>
		</div>
	</body>
</html>
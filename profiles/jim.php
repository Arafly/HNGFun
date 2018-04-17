<?php

// First off: Helper functions
function respond($response, array $options=['chatMassage' => true]) {
	if ($options['chatMassage'] == true) {
		// We call this function concurrently
		respond(['message' => $response], ['chatMassage' => false]);
	} else {
		echo json_encode($response);
		exit();
	}
}

function sanitize(string $value) {
	return trim(filter_var($value, FILTER_SANITIZE_STRING));
}

// Chatbot (Jimie)
if (!empty($_POST['message'])) {
	
	if(! defined('DB_USER')){
		require "../../config.php";		
		try {
		    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		} catch (PDOException $pe) {
		    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
		}
	}

	$message = $_POST['message'];

	$trainRegex = "^train(?:\:?)?(?:\s+)?(.+)#(.+)";

	// First we check if we are training
	if (preg_match("/^train/", $message)) {
		
		if (preg_match_all("/${trainRegex}/i", $message, $matches)) {
			$question = sanitize($matches[1][0]);
			$answer = sanitize($matches[2][0]);

			if (empty($question)) {
				respond('It look like you did not provide me with a question');
			}
			if (empty($answer)) {
				respond('It look like you did not provide me with answer');
			}

			// Now we check if the question and answer already exists
            $sql = $conn->prepare("SELECT * FROM chatbot WHERE question = :question AND answer = :answer");
			$sql->execute([':question' => $question, ':answer' => $answer]);
            $result = $sql->fetch(PDO::FETCH_ASSOC);

            if(!empty($result)) {
                respond('Oh! I already knew that. Please teach something else.');
            } else {
				$sql = 'INSERT INTO chatbot (question, answer) VALUES (:question, :answer)';

	            try {
	                $query = $conn->prepare($sql);
	                if ($query->execute([':question' => $question, ':answer' => $answer]) == true) {
	                    respond('Great! thank you so much for teaching that');
	                };
	            } catch (PDOException $e) {
	                respond('Oh o! Looks like the system that allows my to learn had a glitch, please try again');
	            }
            }
		} else {
			respond('Oh! No. This is how to train me: train: Question # Answer');
		}
	} else {
		$question = sanitize($message);

		$sql = $conn->prepare("SELECT * FROM chatbot WHERE question LIKE :question ORDER BY RAND()");
		$sql->execute([':question' => "%{$question}%"]);
        $result = $sql->fetch(PDO::FETCH_ASSOC);

        if (! $result) {
        	respond('I do not understand what you mean because I\'ve not been trained on that.');
        } else {
        	$output = preg_replace_callback("/(&#[0-9]+;)/", function($m) {
        		return mb_convert_encoding($m[1], "UTF-8", "HTML-ENTITIES");
        	}, $result['answer']); 

	        respond($output);
        }
	}
}

$sql = "SELECT * FROM interns_data WHERE username = 'jim'";
$q = $conn->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$data = $q->fetchAll();
$jim = array_shift($data);

// Secret word
$sql = "SELECT * FROM secret_word";
$q = $conn->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$words = $q->fetch();
$secret_word = $words['secret_word'];



?>
<div class="Jim">
	<div class="profile-wrap">
	<div class="about">
		<?php if (empty($jim)): ?>
		<h1>Jim is supposed to be here</h1>
		<?php else: ?>
		<div class="photo-wrap">
			<img src="<?php echo $jim['image_filename']; ?>" alt="" />
		</div>
		<h1><?php echo $jim['name']; ?></h1>
		<h3>Pro. Web Developer</h3>
		
		<div class="social-icons">
		    <a href="https://twitter.com/nzesalem" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>  
		    <a href="https://github.com/nzesalem" class="github" target="_blank"><i class="fa fa-github"></i></a>
		    <a href="https://linkedin.com/in/nzesalem" class="linkedin" target="_blank"><i class="fa fa-linkedin-square"></i></a>  
		    <a href="https://fb.me/nzesalem" class="facebook" target="_blank"><i class="fa fa-facebook-square"></i></a> 
		</div>
		<?php endif; ?>
	</div>
	</div>
	<div id="Jimie"></div>
</div>
<script src="profiles/jim/dist/Jimie.js"></script>
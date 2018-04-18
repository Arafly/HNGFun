<!DOCTYPE html>
<html>
<head>
	<title>Samuel's Profile</title>
	<?php 
  try {
      $sql = "SELECT secret_word FROM secret_word";
      $q = $conn->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC);
      $data = $q->fetch();
      $secret_word = $data['secret_word'];
  } catch (PDOException $e) {
      throw $e;
  }
?>


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	h2{
		padding-top: 40px;
	}
			.profile {
			  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			  max-width: 300px;
			  margin: auto;
			  text-align: center;
			  font-family: arial;
			  border-radius: 10px;
			  padding-top: 20px;
			  background-color: #eff2f7;
			}

			.title {
			  color: grey;
			  font-size: 18px;
			}

			a {
			  text-decoration: none;
			  font-size: 22px;
			  color: black;
			}

			 a:hover {
			  opacity: 0.7;
			}
			
			img{
				width: 150px; 
				height: 150px;
	-moz-border-radius: 50px;
	-webkit-border-radius: 50px;
	border-radius: 50px;
			}

	</style>

</head>
<body>

	<h2 style="text-align:center">PROFILE</h2>

	<div class="profile" >
	  <img src="https://res.cloudinary.com/samuelweke/image/upload/v1523620154/2017-11-13_21.01.13.jpg" alt="Samuel Weke" >
	  <h1>Weke Samuel</h1>
	  <p class="title">Back End Developer</p>
	  <p>PHP, MySQL, Laravel</p>
	  <div style="margin: 24px 0; padding-bottom: 20px">
  
	 </div>
	</div>

</body>
</html>

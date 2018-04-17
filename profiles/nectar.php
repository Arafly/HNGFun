<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HNG Nectar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <style>
    /* 
    primary=#FF5722   
    primary-dark = #E64A19
    primary-light= #FFCCBC
    secondary = 
    accent = 
    */
        body{
            
        }
        div.profile-image{
            width: 100%;
            margin-right: auto;
            margin-left: auto;
            align-content: center;

            background: #FFCCBC;
            
            /* background-image: url('http://res.cloudinary.com/primefeed/image/upload/v1523891070/images.jpg'); */
            /* background-repeat: no-repeat; */

            /* Test attributes */
            /* border: 2px solid red;  */
        }
        div.profile-image img {
            margin:auto;
<<<<<<< HEAD
            margin-left: 35%;
=======
            margin-left: 40%;
>>>>>>> c4cd176945e1e8f6df3bf5ca3e7506726d4861d1
            max-width: 100%;
            min-width: 10%;
            width: 20%;
            min-height: 70%;
            max-height: 90%;

            border-radius: 50%;
        }

        div.profile-details{
            background-color: pink;
            margin:auto;
            width: 59.3%;
            min-height: 70%;
            max-height: 90%;
            height: 80%;

            margin-top: 2%;

            /* Text attrributes */
            text-align: center;

            /* Test attributes */
            /* border: 2px solid blue;  */
        }

        div.profile-details .detail-title{
            margin-top: 6%;
            font-size: 4em;
            font-weight:bold;
            font-family: Cambria, Cochin, Georgia, Times, Times New Roman, serif;

            /* Test attributes */
            /* border: 2px solid green; */
        }
        div.profile-details .detail-name{
            font-size: 3.5em;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bold;


            /* Test attributes */
            /* border: 2px solid yellow; */
        }
        div.profile-details .detail-username{
            font-size: 3.5em;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bold;

            /* Test attributes */
            /* border: 2px solid red;             */
        }
    </style>
</head>
<body>
    <?php
        // Get the config file
        // include ('../config.php');
         
        // Set the needed variables
        $name = "";
        $username = ""; 
        $pics = "";

<<<<<<< HEAD
         $table = 'interns_data_';
=======
<<<<<<< HEAD
         $table = 'interns_data_';
         $secret_table = 'secret_word';
         $intern_name = 'Nectar';
         $test_link = 'https://upload.wikimedia.org/wikipedia/commons/f/f9/Phoenicopterus_ruber_in_S%C3%A3o_Paulo_Zoo.jpg';
=======
         $table = 'interns_data';
>>>>>>> 5ef1071cdc6fab6c77c5d245d8d2aceb93db086c
         $secret_table = 'secret_word';
         $intern_name = 'Nectar';
>>>>>>> c4cd176945e1e8f6df3bf5ca3e7506726d4861d1
         
        // Make a connection to the db, Catch the database errors
        try {
            // Create connection object using PDO
            $connect = new PDO("mysql:host=".DB_HOST ."; dbname=".DB_DATABASE, DB_USER, DB_PASSWORD);
            // set the PDO error mode to exception
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // echo nl2br("Connected successfully \r\n");

<<<<<<< HEAD
            // Query the db for the data in interns data table
            $query = "SELECT * FROM ".$table." WHERE username='Nectar'";
            $data = $connect->query($query);

            // Check if the data was returned, if data was returned use it
            if ($data == null){
                echo nl2br("Empty, Name not found");
            }else{
                foreach($data as $row) {
                    $name = $row["name"];
                    $username = $row["username"];
                    $pics = $row["image_filename"];
                }
            }

            // Query the db for the data in secret_word table
            $query_secret = "SELECT * FROM ".$secret_table;
            $data_secret = $connect->query($query_secret);
=======
            // Query the db for the data in secret_word table
<<<<<<< HEAD
            $query_secret = "SELECT secret_word FROM secret_word";
            $res = $connect->query($query_secret);
            $res->setFetchMode(PDO::FETCH_ASSOC);
            $secret_word = $res;
=======
            $query_secret = "SELECT secret_word FROM ".$secret_table;
            $data_secret = $connect->query($query_secret);
            // echo $data_secret;
>>>>>>> c4cd176945e1e8f6df3bf5ca3e7506726d4861d1
>>>>>>> 5ef1071cdc6fab6c77c5d245d8d2aceb93db086c

            // Check if the data was returned, if data was returned use it
            foreach($res as $raw_secret) { 
                $secret_word = $raw_secret['secret_word'];
            }
<<<<<<< HEAD
=======

            // Query the db for the data in interns data table
            $query = "SELECT * FROM ".$table." WHERE username='Nectar'";
            $data = $connect->query($query);
            $data->setFetchMode(PDO::FETCH_ASSOC);

            foreach($data as $row) {
                $name = $row["name"];
                $username = $row["username"];
                $pics = $row["image_filename"];
            }
>>>>>>> c4cd176945e1e8f6df3bf5ca3e7506726d4861d1
                
            
        }catch(PDOException $e) {
            echo "Connection failed: " .$e->getMessage();
        }
    ?>
    <div class ="profile-image">
        <img src="<?php echo $pics ?>" alt="<?php echo $pics ?>">
        <!-- <img src="./sunday-min.jpg" alt="Test"> -->
    </div>

    <div class ="profile-details">
<<<<<<< HEAD
    <?php echo $name."".$username." ".$pics ?>
        <h4 class="detail-title">HNG4 internship 2018 </h4>
        <p class="detail-name"><?php echo $name?></p>
        <p class="detail-username">@<?php echo $username?></p>
        <p>Secret Word: <?php echo $secret_word?></p>
=======
        <h4 class="detail-title">HNG4 internship 2018 </h4>
        <p class="detail-name"><?php echo $name?></p>
        <p class="detail-username">@<?php echo $username?></p>
<<<<<<< HEAD
        
=======
       
>>>>>>> c4cd176945e1e8f6df3bf5ca3e7506726d4861d1
>>>>>>> 5ef1071cdc6fab6c77c5d245d8d2aceb93db086c
    </div>
</body>
</html>
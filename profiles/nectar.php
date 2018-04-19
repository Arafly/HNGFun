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
            margin-left: 40%;
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
        // include '../db.php';
         
        // Set the needed variables
        $table = 'interns_data';
        $secret_table = 'secret_word';
        $intern_name = 'Nectar';

        // Query the db for the data in interns data table
        $query = "SELECT * FROM ".$table." WHERE username='Nectar'";
        $data = $conn->query($query);
        $data->setFetchMode(PDO::FETCH_ASSOC);

        foreach($data as $row) {
            $name = $row["name"];
            $username = $row["username"];
            $pics = $row["image_filename"];
        }
        
        try {
            $query2 = "SELECT * FROM secret_word";
            $word = $conn->query($query2);
            $word->setFetchMode(PDO::FETCH_ASSOC);
            $result = $word->fetch();
        } catch (PDOException $e) {
            throw $e;
        }
        $secret_word = $result['secret_word'];
    ?>
    <div class ="profile-image">
        <img src="<?php echo $pics ?>" alt="<?php echo $pics ?>">
        <!-- <img src="./sunday-min.jpg" alt="Test"> -->
    </div>

    <div class ="profile-details">
        <h4 class="detail-title">HNG4 internship 2018 </h4>
        <p class="detail-name"><?php echo $name?></p>
        <p class="detail-username">@<?php echo $username?></p>        
    </div>
</body>
</html>
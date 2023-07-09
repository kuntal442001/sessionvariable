<?php

        session_start();

        


        $servername = "localhost";
        $username   = "root";
        $password   = "";
        $databasename = "user_db";  

        if(array_key_exists('email_id',$_POST) OR array_key_exists('PWD',$_POST)){
         
          $conn = mysqli_connect($servername,$username,$password,$databasename);
        
        
          if(mysqli_connect_error()){
            die("failed to connect");
          }

          if($_post['email_id'] = ''){
              echo "<p>email not entereds</p>";
          }
          elseif($_post['PWD'] = ''){
              echo "<p> the password is requred</p>";
          }
          else{
            $query = "select id FROM users WHERE email_id='"
                      .mysqli_real_escape_string($conn,$_POST['email_id']) ."'" ;
            $result = mysqli_query($conn,$query);            
          }

          if(mysqli_num_rows($result) > 0){
              echo "<p> that email address has already been registered</p>";
          }
          else{
              $query = "INSERT INTO users (email_id,PWD) VALUES('"
                        .mysqli_real_escape_string($conn , $_POST['email_id']) . "','"
                        .mysqli_real_escape_string($conn ,$_POST['PWD']) . "')";


              if(mysqli_query($conn,$query)){
                  $_SESSION['email_id'] = $_POST['email_id'];

                  header('Location : session.php');
              }   
              else{
                echo "<p> There Was A Problem</p>";
              }       
          }


        }
        

        
?>

<form method = "post">
        <input name = "email_id" type="text" placeholder="Email address">
        <input name = "PWD" type="text" placeholder="Password">

        <input type="submit" value = "SignUp!">
</from>

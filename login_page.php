<?php 

    $Error = "";
    $UsernameError = "";
    $PasswordError = "";

    if(isset($_POST["Submit"])) {

        if(empty($_POST["uname"])) {
           $Error = "";
        } else {
            $UserName = Test_User_Input($_POST["uname"]);

            if($UserName != "snehalgaikwad") {
                $UsernameError = "Invalid Username!";
            }
        }

        if(empty($_POST["psw"])) {
            $Error = "";
        } else {
            $Password = Test_User_Input($_POST["psw"]);

            if($Password != "Sneha@0201") {
                $PasswordError = "Invalid Password!";
            }
        }
    }

    function Test_User_Input($Data) {
        return $Data;
    }

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Simple login form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
<style>
      html, body {
      margin-top: 60px;
      display: flex;
      justify-content: center;
      font-family: 'Inter', sans-serif;
      letter-spacing: 0.4px;
      font-size: 15px;
      }
      form {
      border: 5px solid #f1f1f1;
      }
      input[type=text], input[type=password] {
      letter-spacing: 0.4px;
      width: 100%;
      padding: 16px 8px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
      }
      button {
      letter-spacing: 0.4px;
      background-color: #8ebf42;
      color: white;
      padding: 14px 0;
      margin: 10px 0;
      border: none;
      cursor: grabbing;
      width: 100%;
      font-size: 20px;
      }
      h1 {
      text-align:center;
      fone-size:18;
      }
      button:hover {
      opacity: 0.8;
      }
      .formcontainer {
      text-align: left;
      margin: 24px 50px ;
      }

      .formcontainer span {
          margin: 0px;
          color: red;
          font-size: 15px;
      }

      .container {
      padding: 16px 0;
      text-align:left;
      }
      /* Change styles for span on extra small screens */
     
    </style>
  </head>
  <body>
    <form action="Insert_into_database.php" method="POST">
      <h1>Login Form</h1>
      <div class="formcontainer">
      <hr/>
      <span><?php echo $UsernameError . " " . $PasswordError?></span>
      <div class="container">
        <label><strong>Username</strong></label>
        <input type="text" placeholder="Enter Username" name="uname" required>
        <label><strong>Password</strong></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
      </div>
      <button type="submit" name="Submit">Login</button>
    </form>
  </body>
</html>
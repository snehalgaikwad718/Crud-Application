<?php 

require_once("Include/DB.php");
if(isset($_POST["Submit"])) {
  if(!empty($_POST["name"])&&!empty($_POST["phone"])) {
    $EName = $_POST["name"];
    $Phone = $_POST["phone"];
    $Address = $_POST["address"];
    $Street = $_POST["street"];
    $City = $_POST["city"];
    $Ssn = $_POST["ssn"];
    $Dept = $_POST["dept"];
    $Salary = $_POST["salary"];
    $ConnectingDB;
    $sql = "INSERT INTO emp_details(ename, phone, homeaddress, street, city, ssn, dept, salary)
    VALUES(:enamE, :phonE, :homeaddresS, :streeT, :citY, :ssN, :depT, :salarY)";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':enamE', $EName);
    $stmt->bindValue(':phonE', $Phone);
    $stmt->bindValue(':homeaddresS', $Address);
    $stmt->bindValue(':streeT', $Street);
    $stmt->bindValue(':citY', $City);
    $stmt->bindValue(':ssN', $Ssn);
    $stmt->bindValue(':depT', $Dept);
    $stmt->bindValue(':salarY', $Salary);
    $Execute = $stmt->execute();
    if($Execute) {
      echo '<script>window.open("View_into_database.php?id= Record Added Successfully", "_self")</script>';
    }
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Account registration form</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      }
      h1 {
      margin: 0;
      font-weight: 400;
      }
      h3 {
      margin: 12px 0;
      color: #8ebf42;
      }

      .success {
        font-size: 25px;
        color: #8ebf42;
        font-weight: 500;
      }

      .main-block {
          margin-top: 40px;
      display: flex;
      justify-content: center;
      align-items: center;
      background: #fff;
      }
      form {
      width: 50%;
      padding: 20px;
      }
      fieldset {
      border: none;
      border-top: 1px solid #8ebf42;
      }
      .personal-details {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .personal-details >div >div {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
      }

      .personal-details span {
        color: red;
      }

      .personal-details >div, input, label {
      width: 100%;
      }

      .personal-details textarea {
          width: 232px;
      }

      label {
      padding: 0 5px;
      text-align: right;
      vertical-align: middle;
      }
      input {
      padding: 5px;
      vertical-align: middle;
      }
      .checkbox {
      margin-bottom: 10px;
      }
      select, .children, .gender, .bdate-block {
      width: calc(100% + 26px);
      padding: 5px 0;
      }
      select {
      background: transparent;
      }
      button {
      width: 100%;
      padding: 10px 0;
      margin: 10px auto;
      border-radius: 5px; 
      border: none;
      background: #8ebf42; 
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      }
      button:hover {
      background: #82b534;
      }
      @media (min-width: 568px) {
      .account-details >div, .personal-details >div {
      width: 50%;
      }
      label {
      width: 40%;
      }
      input {
      width: 60%;
      }
      }
    </style>
  </head>
  <body>
    <div class="main-block">
    <form action="Insert_into_database.php" method="POST">
      <h1>Enter Employee Details</h1>
      <fieldset>
        <legend>
          <h3>Personal Details</h3>
        </legend>
        <div class="personal-details">
          <div>
            <div><label>Name <span>*</span></label><input type="text" name="name" required></div>
            <div><label>Phone <span>*</span></label><input type="text" name="phone" required></div>
            <div><label>Address <span>*</span></label><textarea type="text" name="address" required></textarea></div>
            <div><label>Street</label><input type="text" name="street"></div>
            <div><label>City <span>*</span></label><input type="text" name="city" required></div>
          </div>
      </fieldset>
      <fieldset>
        <legend>
          <h3>Company Details</h3>
        </legend>
        <div class="personal-details">
          <div>
            <div><label>Social Security No. <span>*</span></label><input type="text" name="ssn" required></div>
            <div><label>Department <span>*</span></label><input type="text" name="dept" required></div>
            <div><label>Salary <span>*</span></label><textarea type="text" name="salary" required></textarea></div>
          </div>
        </div>
      </fieldset>
      <button type="submit" name="Submit" href="/">Submit Record</button>
    </form>
    </div> 
  </body>
</html>
<?php 

require_once("Include/DB.php");

$SearchQueryParameter = $_GET["id"];

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
    $sql = "DELETE FROM emp_details WHERE id='$SearchQueryParameter'";
    $Execute = $ConnectingDB->query($sql);
    if($Execute) {
      echo '<script>window.open("View_into_database.php?id=Record Deleted Successfully", "_self")</script>';
    }
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Update data from database</title>
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
      .gender input {
      width: auto;
      } 
      .gender label {
      padding: 0 5px 0 0;
      } 
      .bdate-block {
      display: flex;
      justify-content: space-between;
      }
      .birthdate select.day {
      width: 50px;
      }
      .birthdate select.mounth {
      width: calc(100% - 110px);
      }
      .birthdate input {
      width: 38px;
      vertical-align: unset;
      }
      .checkbox input, .children input {
      width: auto;
      margin: -2px 10px 0 0;
      }
      .checkbox a {
      color: #8ebf42;
      }
      .checkbox a:hover {
      color: #82b534;
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
      select, .children, .gender, .bdate-block {
      width: calc(60% + 16px);
      }
      }
    </style>
  </head>
  <body>
      <?php
        $ConnectingDB;
        $sql = "SELECT * FROM emp_details WHERE id = '$SearchQueryParameter'";
        $stmt = $ConnectingDB->query($sql);
        while ($DataRows=$stmt->fetch()) {
            $ID = $DataRows["id"];
            $Name = $DataRows["ename"];
            $Phone = $DataRows["phone"];
            $HomeAddress = $DataRows["homeaddress"];
            $Street = $DataRows["street"];
            $City = $DataRows["city"];
            $Ssn = $DataRows["ssn"];
            $Dept = $DataRows["dept"];
            $Salary = $DataRows["salary"];
        }

      ?>
    <div class="main-block">
    <form action="Delete.php?id=<?php echo $SearchQueryParameter; ?>" method="POST">
      <h1>Enter Employee Details</h1>
      <fieldset>
        <legend>
          <h3>Personal Details</h3>
        </legend>
        <div class="personal-details">
          <div>
            <div><label>Name <span>*</span></label><input type="text" name="name" value="<?php echo $Name; ?>" required></div>
            <div><label>Phone <span>*</span></label><input type="text" name="phone" value="<?php echo $Phone; ?>" required></div>
            <div><label>Address <span>*</span></label><textarea type="text" name="address" required><?php echo $HomeAddress; ?></textarea></div>
            <div><label>Street</label><input type="text" name="street" value="<?php echo $Street; ?>"></div>
            <div><label>City <span>*</span></label><input type="text" name="city" value="<?php echo $City; ?>" required></div>
          </div>
      </fieldset>
      <fieldset>
        <legend>
          <h3>Company Details</h3>
        </legend>
        <div class="personal-details">
          <div>
            <div><label>Social Security No. <span>*</span></label><input type="text" name="ssn" value="<?php echo $Ssn; ?>" required></div>
            <div><label>Department <span>*</span></label><input type="text" name="dept" value="<?php echo $Dept; ?>" required></div>
            <div><label>Salary <span>*</span></label><input type="text" name="salary" value="<?php echo $Salary; ?>" required></div>
          </div>
        </div>
      </fieldset>
      <button type="submit" name="Submit" href="/">Delete Record</button>
    </form>
    </div> 
  </body>
</html>
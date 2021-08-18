<?php
require_once("Include/DB.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View data from database</title>
    <style>
        table {
            border: 5px solid #8ebf42;
        }
        th {
            background-color: #8ebf42;
            padding: 12px 6px;
            font-weight: bold;
            font-size: 17px;
        }
        td {
            border-right: 1.5px solid #8ebf42;
            border-bottom: 1.5px solid #8ebf42;
            padding: 10px 6px;
        }
        caption {
            font-size: 30px;
            font-weight: bold;
            padding: 25px;;
        }
        .success {
        font-size: 25px;
        color: #8ebf42;
        font-weight: 500;
      }
      .main-block {
        margin-top: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      background: #fff;
      }
      form {
      width: 50%;
      }
      fieldset {
      border: none;
      }
      .personal-details {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .personal-details >div {
      align-items: center;
      margin-bottom: 15px;
      }

      .personal-details span {
        color: red;
      }

      .personal-details input, label {
      width: 300px;
      padding: 7px;
      }

      button {
      width: 300px;
      padding: 10px 0;
      margin: 10px 20px;
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

    </style>
</head>
<body>
    <h2 class=success><?php echo @$_GET['id'] ?></h2>
    <div class="main-block">
        <form action="View_into_database.php" method="GET">
            <fieldset>
                <div class="personal-details">
                    <div>
                        <input type="text" name="Search" placeholder="Search by name / ssn" required>
                        <button type="submit" name="SearchButton" href="/">Search Record</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

    <?php
        if(isset($_GET["SearchButton"])) {
            $ConnectingDB;
            $Search = $_GET["Search"];
            $sql = "SELECT * FROM emp_details WHERE ename=:searcH or ssn=:searcH";
            $stmt = $ConnectingDB->prepare($sql);
            $stmt->bindValue(':searcH',$Search);
            $stmt->execute();
            while ($DataRows = $stmt->fetch()) {
                $ID = $DataRows["id"];
                $Name = $DataRows["ename"];
                $Phone = $DataRows["phone"];
                $HomeAddress = $DataRows["homeaddress"];
                $Street = $DataRows["street"];
                $City = $DataRows["city"];
                $Ssn = $DataRows["ssn"];
                $Dept = $DataRows["dept"];
                $Salary = $DataRows["salary"];
             ?>

            <table width="1100" align="center">
                <caption>Search Result</caption>
                <tr>
                    <th style="width:30px; border-left:1.5px solid #8ebf42;">ID</th>
                    <th style="width:130px;">Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>SSN</th>
                    <th>Department</th>
                    <th>Salary</th>
                    <th>Search Again</th>
                </tr>
                <tr>
                    <td><?php echo $ID; ?></td>
                    <td><?php echo $Name; ?></td>
                    <td><?php echo $Phone; ?></td>
                    <td><?php echo $HomeAddress; ?></td>
                    <td><?php echo $Street; ?></td>
                    <td><?php echo $City; ?></td>
                    <td><?php echo $Ssn; ?></td>
                    <td><?php echo $Dept; ?></td>
                    <td><?php echo $Salary; ?></td>
                    <td><a href="View_into_database.php">Search Again</a></td>
                <tr>
            </table>

        <?php
            }
        } 
    ?>
    
    <div>
    <table width="1100" align="center">
		<caption>View From Database</caption>
			<tr>
				<th style="width:30px; border-left:1.5px solid #8ebf42;">ID</th>
				<th style="width:130px;">Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Street</th>
                <th>City</th>
				<th>SSN</th>
				<th>Department</th>
				<th>Salary</th>
                <th>Update</th>
                <th>Delete</th>
			</tr>

        <?php
            global $ConnectingDB;
            $sql = "SELECT * FROM emp_details";
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
        ?>
        <tr>
            <td style="border-left:1.5px solid #8ebf42;"><?php echo $ID?></td>
            <td><?php echo $Name?></td>
            <td><?php echo $Phone?></td>
            <td><?php echo $HomeAddress?></td>
            <td><?php echo $Street?></td>
            <td><?php echo $City?></td>
            <td><?php echo $Ssn?></td>
            <td><?php echo $Dept?></td>
            <td><?php echo $Salary?></td>
            <td><a href="Update.php?id=<?php echo $ID?>">Update</a></td>
            <td><a href="Delete.php?id=<?php echo $ID?>">Delete</a></td>
        </tr>

        <?php } ?>
	</table>
</div>
</body>
</html>
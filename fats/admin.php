<?php
include "db_conn.php";
session_start();

if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="x-icon" href="FATS.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>FATS | ADMIN</title>

  <!-- Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/2.1.2/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.2/js/dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.2/js/dataTables.bootstrap4.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="s.css">

  </head>
  <header>
        <div class="logo">
            <h1><strong>TOYOTA OTIS</strong></h1>
        </div>
        <nav>
            <ul>
                <strong>
                  <li><a href="admin">Home</a></li>
                  <li><a href="export">Export</a></li>
                  <li><a href="#">About</a></li>
                  <li><a href="logout">Logout</a></li>
                </strong>
            </ul>
        </nav>
    </header>
    <br />     
    <br />     
  <br /> 
  <div class="text-center">
  <h2><strong>APPLICATION ENTRY</strong></h2>
  </div>    
  <br />     
  <div class="container">
  <div class="col mb-3">
  
    <a href="new" class="btn btn-dark">Add New</a>
    
</div>
</div>
</div>

<div class="container">
<div class="col mb-3">
      <div style="overflow-x:auto;">
    <table id="table" class="table table-striped table-hover table-bordered text-center">
      <thead class="table-dark">
        <tr>
        <th class="text-center" scope="col">APPLICATION DATE</th>
        <th class="text-center" scope="col">GROUP</th>
          <th class="text-center" scope="col">CLIENTS NAME</th>
          <th class="text-center" scope="col">MP</th>
          <th class="text-center" scope="col">UNIT</th>
          <th class="text-center" scope="col">DP</th>
          <th class="text-center" scope="col">TERMS</th>
          <th class="text-center" scope="col">ACTION</th>

        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `input`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
        ?>
          <tr>
            <td class="text-center"><?php echo $row["ad"] ?></td>
            <td class="text-center"><?php echo $row["gp"] ?></td>
            <td class="text-center"><?php echo $row["cname"] ?></td>
            <td class="text-center"><?php echo $row["mp"] ?></td>
            <td class="text-center"><?php echo $row["unit"] ?></td>
            <td class="text-center"><?php echo $row["dp"] ?></td>
            <td class="text-center"><?php echo $row["terms"] ?></td>
            <td class="text-center">
              <a href="view?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fas fa-glasses"></i></a>  
              <i class="fa-solid fas fa-i-cursor"></i>
              <a href="editlast?id=<?php echo $row["id"] ?>" class="link-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
        
      </tbody>
    </table>
      </div>
      </div>
  </div>

<script type="text/javascript">
  $(document).ready(function(){
    $('table').DataTable({

    });
  });
</script>
<br />
<div class="container" align="right">
  <div class="col">
<div>
    <a href="logout" class="btn btn-danger">Logout</a>
</div>
</div>
</div>

</div>
<br />

<br />

<br />

<br />

<br />

<br />

 </html>

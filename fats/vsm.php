<?php
include "db_conn.php";
session_start();

if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'vsm') {
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

        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/2.1.2/js/dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/2.1.2/js/dataTables.bootstrap4.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />

        <title>FATS | TOYOTA OTIS</title>
        <link rel="stylesheet" href="s.css">
    </head>
    <header>
        <div class="logo">
            <h1><strong>TOYOTA OTIS</strong></h1>
        </div>
        <nav>
            <ul>
                <strong>
                  <li><a href="vsm">Dashboard</a></li>
                  <li><a href="export">Export</a></li>
                  <li><a href="logout">Logout</a></li>
                </strong>
            </ul>
        </nav>
    </header>
    <body>
    <br />
    <br />
    
    <div class="text-center">
  <h2><strong>APPLICATION STATUS DASHBOARD</strong></h2>
  </div>
    <br />
    <br />
    <div class="container">  
    <a href="history1" class="btn btn-success">History</a>
</div>
</div>
</div>
<br />

        <div class="container">    
            <div style="overflow-x:auto;">
            <table id="table" class="table table-striped table-hover table-bordered text-center">
            <thead class="table-dark">
              <tr>
                <th class="text-center" scope="col">GROUP</th>
                <th class="text-center" scope="col">APPLICATION DATE</th>
                <th class="text-center" scope="col">DATE OF APPROVAL</th>
                <th class="text-center" scope="col">DATE RELEASED</th>
                <th class="text-center" scope="col">RELEASING BANK</th>
                <th class="text-center" scope="col">CLIENTS NAME</th>
                <th class="text-center" scope="col">MP</th>
                <th class="text-center" scope="col">UNIT</th>
                <th class="text-center" scope="col">DP</th>
                <th class="text-center" scope="col">TERMS</th>
                <th class="text-center" scope="col">STATUS</th>
                <th class="text-center" scope="col">VIEW</th>
                
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM `input`";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <tr>
                  <td class="text-center"><?php echo $row["gp"] ?></td>
                  <td class="text-center"><?php echo $row["ad"] ?></td>
                  <td class="text-center"><?php echo $row["da"] ?></td>
                  <td class="text-center"><?php echo $row["dr"] ?></td>
                  <td class="text-center"><?php echo $row["rb"] ?></td>
                  <td class="text-center"><?php echo $row["cname"] ?></td>
                  <td class="text-center"><?php echo $row["mp"] ?></td>
                  <td class="text-center"><?php echo $row["unit"] ?></td>
                  <td class="text-center"><?php echo $row["dp"] ?></td>
                  <td class="text-center"><?php echo $row["terms"] ?></td>
                  <td class="text-center"><?php echo $row["status"] ?></td>
                  <td>
                    <a href="bank?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fas fa-eye" style='font-size:20px;color:skyblue'></i></a>  
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        </div>
        <br />

        <br />

        <br />
    
    <script type="text/javascript">
        $(document).ready(function(){
          $('table').DataTable({
      
          });
        });
      </script>
</body>
</html>
<?php
include "db_conn.php";
include "conn.php";
session_start();

if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'group5') {
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

  <title>FATS | History Group 5</title>

  <!-- Bootstrap -->
   
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/2.1.2/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.2/js/dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.2/js/dataTables.bootstrap4.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="s.css">

  </head>
<body>
<style>
        .invisible-search-box{
            display: none;
        }        
    </style>
<body>
<nav class="navbar navbar-light justify-content-center fs-1 text-light mb-4" align="center" style="background-color: #c91019;">
<h1><strong>FINANCING APPLICATION TRACKING SYSTEM</strong></h1></nav>
<div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4 align="center"><strong>GROUP 5 APPLICATION HISTORY</strong></h4>
                    </div>
                    <br>
                                <form action="" method="GET">
                                    <div class="col mb-2" align="right">
                                        <input class="invisible-search-box" name="refresh" readonly value="GROUP 5">

                                        <button type="submit" class="btn btn-primary">Load</button>
                                        <a href="group5" class="btn btn-success">Dashboard</a>     
    <a href="logout" class="btn btn-danger">Logout</a></div>
    </div>
                                    
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="overflow-x:auto;">
    <table id="table" class="table table-primary text-center">
      <thead class="table">
                            <thead>
                            <tr>
                              <th class="text-center" scope="col">Group</th>
                              <th class="text-center" scope="col">Application_Date</th>
                              <th class="text-center" scope="col">Date_Of_Approval</th>
                              <th class="text-center" scope="col">Date_Released</th>
                              <th class="text-center" scope="col">Releasing_Bank</th>
                              <th class="text-center" scope="col">Clients_Name</th>
                              <th class="text-center" scope="col">MP</th>
                              <th class="text-center" scope="col">Unit</th>
                              <th class="text-center" scope="col">DP</th>
                              <th class="text-center" scope="col">Terms</th>
                              <th class="text-center" scope="col">Status</th>
                              <th class="text-center" scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody class="table table-striped table-info">
                                <?php 
                                    $con = mysqli_connect("localhost","root","","fna");

                                    if(isset($_GET['refresh']))
                                    {
                                        $filtervalues = $_GET['refresh'];
                                        $query = "SELECT * FROM fnahis WHERE CONCAT(gp) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                              ?>
                                              <tr>
                                                <td class="text-center"><?= $items['gp']; ?></td>
                                                <td class="text-center"><?= $items['ad']; ?></td>
                                                <td class="text-center"><?= $items['da']; ?></td>
                                                <td class="text-center"><?= $items['dr']; ?></td>
                                                <td class="text-center"><?= $items['rb']; ?></td>
                                                <td class="text-center"><?= $items['cname']; ?></td>
                                                <td class="text-center"><?= $items['mp']; ?></td>
                                                <td class="text-center"><?= $items['unit']; ?></td>
                                                <td class="text-center"><?= $items['dp']; ?></td>
                                                <td class="text-center"><?= $items['terms']; ?></td>
                                                <td class="text-center"><?= $items['status']; ?></td>
                                                <td class="text-center">
                                                  <a href="banks?id=<?= $items["id"]; ?>" class="link-primary"><i class="fa-solid fas fa-glasses"></i></a>
                                                </td>
                                              </tr>
                                            <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                    
                                ?>
                            </tbody>
                        </table>
                        </div>
                        </div>
                        <script type="text/javascript">
  $(document).ready(function(){
    $('table').DataTable({

    });
  });
</script>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.5.1.js"></scrip>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
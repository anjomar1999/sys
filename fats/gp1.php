<?php
include "db_conn.php";
include "conn.php";
session_start();

if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'group1') {
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

  <title>FATS | History Group 1</title>

  <!-- Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/2.1.2/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.2/js/dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.2/js/dataTables.bootstrap4.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="s.css">

  <style>
    /* Base Styles for Light Mode */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      color: #333;
      transition: background-color 0.3s, color 0.3s;
    }

    h1, h4 {
      font-family: 'Helvetica', sans-serif;
    }

    /* Navbar */
    nav {
      background-color: #1a5276; /* Dark Blue */
      color: white;
      transition: background-color 0.3s;
    }

    .navbar h1 {
      font-size: 30px;
      text-align: center;
    }

    /* Card */
    .card {
      background-color: white;
      color: #333;
      border-radius: 10px;
      transition: background-color 0.3s, color 0.3s;
    }

    .card-header {
      background-color: #1a5276; /* Dark Blue */
      color: white;
      text-align: center;
      font-size: 1.2rem;
      font-weight: bold;
    }

    /* Table */
    .table {
      width: 100%;
      max-width: 100%; /* Ensure it takes up the entire width */
      border-collapse: collapse;
      margin-top: 20px;
    }

    .table th, .table td {
      text-align: center;
      padding: 15px;
      border: 1px solid #ddd;
    }

    .table-striped tbody tr:nth-of-type(odd) {
      background-color: #f9f9f9;
    }

    /* Buttons */
    .btn-primary, .btn-success, .btn-danger {
      border-radius: 5px;
    }

    .btn-primary {
      background-color: #1a5276; /* Dark Blue */
      color: #fff;
    }

    .btn-success {
      background-color: #2ecc71;
      color: #fff;
    }

    .btn-danger {
      background-color: #e74c3c;
      color: #fff;
    }

    /* Dark Mode Styles */
    body.dark-mode {
      background-color: #181818;
      color: #ecf0f1;
    }

    body.dark-mode .navbar {
      background-color: #2c3e50;
    }

    body.dark-mode .card {
      background-color: #2e2e2e;
      color: #ecf0f1;
    }

    body.dark-mode .card-header {
      background-color: #34495e;
      color: #ecf0f1;
    }

    body.dark-mode .table {
      background-color: #222; /* Dark background for the table */
      color: #ecf0f1; /* Light text color for dark mode */
    }

    body.dark-mode .table th, body.dark-mode .table td {
      border-color: #444;
    }

    body.dark-mode .table-striped tbody tr:nth-of-type(odd) {
      background-color: #333; /* Dark alternating row color */
    }

    body.dark-mode .table-striped tbody tr:nth-of-type(even) {
      background-color: #2c3e50; /* Slightly lighter background for even rows */
    }

    body.dark-mode .btn-primary {
      background-color: #2980b9;
    }

    body.dark-mode .btn-success {
      background-color: #27ae60;
    }

    body.dark-mode .btn-danger {
      background-color: #c0392b;
    }
  </style>
</head>
<body>

  <!-- Dark Mode Toggle -->
  <button id="darkModeToggle" class="btn btn-dark" style="position: fixed; top: 15px; right: 15px; z-index: 100;">Dark Mode</button>

  <!-- Navbar -->
  <nav class="navbar navbar-light justify-content-center fs-1 text-light mb-4">
    <h1><strong>FINANCING APPLICATION TRACKING SYSTEM</strong></h1>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="col-md-12">
      <div class="card mt-4">
        <div class="card-header">
          <h4><strong>GROUP 1 APPLICATION HISTORY</strong></h4>
        </div>
        <br>
        <form action="" method="GET">
          <div class="col mb-2" align="right">
            <input class="invisible-search-box" hidden name="refresh" readonly value="GROUP 1">
            <button type="submit" class="btn btn-primary">Load</button>
            <a href="group1" class="btn btn-success">Dashboard</a>     
            <a href="logout" class="btn btn-danger">Logout</a>
          </div>
        </form>

        <div style="overflow-x:auto;">
          <table id="table" class="table table-striped text-center">
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
            <tbody>
              <?php 
                $con = mysqli_connect("localhost","root","","fna");

                if(isset($_GET['refresh'])) {
                    $filtervalues = $_GET['refresh'];
                    $query = "SELECT * FROM fnahis WHERE CONCAT(gp) LIKE '%$filtervalues%' ";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0) {
                        foreach($query_run as $items) {
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
                    } else {
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
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Dark Mode Toggle
    const darkModeToggle = document.getElementById('darkModeToggle');
    const isDarkMode = localStorage.getItem('dark-mode') === 'true';

    // Set initial dark mode state
    document.body.classList.toggle('dark-mode', isDarkMode);
    darkModeToggle.textContent = isDarkMode ? 'Light Mode' : 'Dark Mode';

    // Toggle Dark Mode
    darkModeToggle.addEventListener('click', () => {
      const darkModeEnabled = !document.body.classList.contains('dark-mode');
      document.body.classList.toggle('dark-mode', darkModeEnabled);
      localStorage.setItem('dark-mode', darkModeEnabled);
      darkModeToggle.textContent = darkModeEnabled ? 'Light Mode' : 'Dark Mode';
    });
  </script>

</body>
</html>

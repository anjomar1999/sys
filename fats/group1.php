<?php
include "db_conn.php";
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
  <link rel="shortcut icon" type="image/x-icon" href="FATS.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FATS | Group 1</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    :root {
      --primary-color: #2c3e50;
      --accent-color: #2980b9;
      --light-color: #ecf0f1;
      --dark-color: #1a252f;
    }

    body {
      background-color: var(--light-color);
      color: var(--dark-color);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      transition: background-color 0.3s, color 0.3s;
    }

    .dark-mode {
      background-color: #121212;
      color: #f0f0f0;
    }

    .dark-mode .card,
    .dark-mode .table,
    .dark-mode .navbar {
      background-color: #1e1e1e;
      color: white;
    }

    .dark-mode .table th,
    .dark-mode .table td {
      background-color: #2a2a2a;
    }

    .navbar-custom {
      background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
      padding: 1rem 2rem;
      border-radius: 0 0 12px 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }

    .navbar-custom h1 {
      color: white;
      font-weight: 600;
      margin: 0;
    }

    .dark-toggle {
      position: absolute;
      top: 20px;
      right: 30px;
      z-index: 1050;
    }

    .btn-primary {
      background-color: var(--accent-color);
      border: none;
    }

    .btn-primary:hover {
      background-color: #2471a3;
    }

    .card {
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .table th, .table td {
      vertical-align: middle;
      white-space: nowrap;
    }
  </style>
</head>
<body>
  <button class="btn btn-secondary dark-toggle" onclick="toggleDarkMode()">Switch to Dark</button>

  <nav class="navbar navbar-custom text-center">
    <h1>FINANCING APPLICATION TRACKING SYSTEM</h1>
  </nav>

  <div class="container mt-5">
    <div class="card">
      <div class="card-header text-center">
        <h4><strong>GROUP 1 DASHBOARD</strong></h4>
      </div>
      <div class="card-body">
        <form action="" method="GET" class="mb-3 text-right">
          <input type="hidden" name="refresh" value="GROUP 1">
          <button type="submit" class="btn btn-primary">Load</button>
          <a href="gp1" class="btn btn-success">History</a>  
          <a href="logout" class="btn btn-danger">Logout</a>
        </form>

        <div class="table-responsive">
          <table id="table" class="table table-bordered table-hover text-center">
            <thead class="thead-dark">
              <tr>
                <th>Group</th>
                <th>Application Date</th>
                <th>Date of Approval</th>
                <th>Date Released</th>
                <th>Releasing Bank</th>
                <th>Client's Name</th>
                <th>MP</th>
                <th>Unit</th>
                <th>DP</th>
                <th>Terms</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $con = mysqli_connect("localhost", "root", "", "fna");

                if (isset($_GET['refresh'])) {
                    $filtervalues = $_GET['refresh'];
                    $query = "SELECT * FROM input WHERE gp LIKE '%$filtervalues%'";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $items) {
                            echo "<tr>
                                    <td>{$items['gp']}</td>
                                    <td>{$items['ad']}</td>
                                    <td>{$items['da']}</td>
                                    <td>{$items['dr']}</td>
                                    <td>{$items['rb']}</td>
                                    <td>{$items['cname']}</td>
                                    <td>{$items['mp']}</td>
                                    <td>{$items['unit']}</td>
                                    <td>{$items['dp']}</td>
                                    <td>{$items['terms']}</td>
                                    <td>{$items['status']}</td>
                                    <td><a href='bank?id={$items['id']}' class='text-primary'><i class='fa-solid fa-glasses'></i></a></td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='12'>No Record Found</td></tr>";
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
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function(){
      $('#table').DataTable();
    });

    function toggleDarkMode() {
      const darkModeButton = document.querySelector('.dark-toggle');
      document.body.classList.toggle("dark-mode");

      if (document.body.classList.contains("dark-mode")) {
        darkModeButton.textContent = "Switch to Light";
        localStorage.setItem("darkMode", "true");
      } else {
        darkModeButton.textContent = "Switch to Dark";
        localStorage.setItem("darkMode", "false");
      }
    }

    window.onload = () => {
      if (localStorage.getItem("darkMode") === "true") {
        document.body.classList.add("dark-mode");
        document.querySelector('.dark-toggle').textContent = "Switch to Light";
      }
    }
  </script>
</body>
</html>

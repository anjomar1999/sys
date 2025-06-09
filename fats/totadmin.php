<?php
include "db_conn.php";
session_start();

if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'totadmin') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>FATS | ADMIN</title>
  <link rel="shortcut icon" type="image/x-icon" href="FATS.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap & DataTables -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      transition: background-color 0.3s, color 0.3s;
    }

    header {
  background-color: #003366;
  color: white;
  padding: 15px 30px;
  display: flex;
  justify-content: flex-end; /* Aligns the items to the right */
  align-items: center;
  gap: 20px; /* Adds space between the elements */
}

header h1 {
  margin: 0;
  font-size: 24px;
  flex-grow: 1; /* Allows the title to take up space and push nav to the right */
}

header nav ul {
  list-style: none;
  display: flex;
  gap: 20px;
  margin: 0;
}

header nav ul li a {
  color: white;
  text-decoration: none;
  font-weight: bold;
}

header .toggle-theme {
  background: transparent;
  border: none;
  color: white;
  font-size: 18px;
  cursor: pointer;
}

header .toggle-theme i {
  margin-right: 10px; /* Optional: space between icon and button edge */
}

    .toggle-theme {
      background: transparent;
      border: none;
      color: white;
      font-size: 18px;
      cursor: pointer;
    }

    .container h2 {
      color: #003366;
      margin-top: 20px;
    }

    .btn {
      border-radius: 20px;
    }

    .table thead th {
      background-color: #003366;
      color: white;
    }

    .table-striped tbody tr:nth-of-type(odd) {
      background-color: #f2f2f2;
    }

    .table-hover tbody tr:hover {
      background-color: #e6f7ff;
    }

    .badge-status {
      font-size: 0.9rem;
      padding: 5px 10px;
      border-radius: 12px;
      font-weight: 500;
      display: inline-block;
      min-width: 80px;
    }

    .badge-approved {
      background-color: #28a745;
      color: white;
    }

    .badge-pending {
      background-color: #ffc107;
      color: black;
    }

    .badge-rejected {
      background-color: #dc3545;
      color: white;
    }

    footer {
      margin-top: 50px;
      padding: 20px 0;
      background-color: #003366;
      color: white;
      text-align: center;
    }

    /* Dark Mode Styles */
   /* Dark Mode Styles */
body.dark-mode {
            background-color: #121212;
            color: #ffffff;
        }

body.dark-mode header,
body.dark-mode footer {
  background-color: #1e1e1e;
}

body.dark-mode .table thead th {
  background-color: #333;
  color: white; /* Ensures the text in table headers is visible in dark mode */
}

body.dark-mode .table-striped tbody tr:nth-of-type(odd) {
  background-color: #1a1a1a;
}

body.dark-mode .table-hover tbody tr:hover {
  background-color: #2c2c2c;
}

body.dark-mode .table td, body.dark-mode .table th {
  color: #e0e0e0; /* Ensures table text is visible in dark mode */
}

body.dark-mode .badge-status {
  color: #e0e0e0; /* Ensures badge text is visible */
}

body.dark-mode .btn {
  border: none;
}

body.dark-mode .container h2 {
  color: #90caf9;
}

  </style>
</head>

<body>
<header>
  <h1><strong>TOYOTA OTIS | FATS</strong></h1>
  <div>
    <nav>
      <ul>
        <li><a href="totadmin">Home</a></li>
        <li><a href="export">Export</a></li>
        <li><a href="#">About</a></li>
        <li><a href="logout">Logout</a></li>
      </ul>
    </nav>
  </div>
  <button class="toggle-theme" id="toggleTheme" title="Toggle Dark/Light Mode">
    <i class="fas fa-moon"></i>
  </button>
</header>


  <div class="container">
    <div class="text-center mt-4">
      <h2><strong>APPLICATION ENTRY</strong></h2>
    </div>

    <div class="text-right my-3">
      <a href="new" class="btn btn-dark">Add New</a>
      <a href="history" class="btn btn-success">Transactions</a>
    </div>

    <div class="table-responsive">
      <table id="table" class="table table-striped table-hover table-bordered text-center">
        <thead>
          <tr>
            <th>APPLICATION DATE</th>
            <th>GROUP</th>
            <th>CLIENTS NAME</th>
            <th>MP</th>
            <th>UNIT</th>
            <th>DP</th>
            <th>TERMS</th>
            <th>STATUS</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM `input`";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_array($result)) {
              $status = strtolower($row["status"]);
              $badgeClass = 'badge-secondary';
              if ($status === 'approved') $badgeClass = 'badge-approved';
              elseif ($status === 'pending') $badgeClass = 'badge-pending';
              elseif ($status === 'rejected') $badgeClass = 'badge-rejected';
          ?>
            <tr>
              <td><?= $row["ad"] ?></td>
              <td><?= $row["gp"] ?></td>
              <td><?= $row["cname"] ?></td>
              <td><?= $row["mp"] ?></td>
              <td><?= $row["unit"] ?></td>
              <td><?= $row["dp"] ?></td>
              <td><?= $row["terms"] ?></td>
              <td><span class="badge badge-status <?= $badgeClass ?>"><?= strtoupper($row["status"]) ?></span></td>
              <td>
                <a href="view?id=<?= $row["id"] ?>" class="text-dark" title="View">
                  <i class="fas fa-eye"></i>
                </a>
                &nbsp;
                <a href="editlast?id=<?= $row["id"] ?>" class="text-primary" title="Edit">
                  <i class="fas fa-pen-to-square"></i>
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <div class="text-right mt-3">
      <a href="logout" class="btn btn-danger">Logout</a>
    </div>
  </div>

  <footer>
    &copy; <?= date("Y") ?> - ANJOMAR BERNARDO
  </footer>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#table').DataTable();

      // Load theme preference
      const isDark = localStorage.getItem("theme") === "dark";
      if (isDark) document.body.classList.add("dark-mode");

      // Toggle theme
      $('#toggleTheme').click(function () {
        document.body.classList.toggle("dark-mode");
        localStorage.setItem("theme", document.body.classList.contains("dark-mode") ? "dark" : "light");
      });
    });
  </script>
</body>
</html>

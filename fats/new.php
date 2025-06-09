<?php
include "db_conn.php";
session_start();

if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'totadmin') {
    header("Location: login.php");
    exit;
}

if (isset($_POST["submit"])) {
    $gp = $_POST['gp'];
    $cname = $_POST['cname'];
    $mp = $_POST['mp'];
    $unit = $_POST['unit'];
    $dp = $_POST['dp'];
    $terms = $_POST['terms'];

    $sql = "INSERT INTO input(gp, cname, mp, unit, dp, terms) 
            VALUES ('$gp','$cname', '$mp', '$unit', '$dp', '$terms')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: totadmin.php?msg=New record created successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="FATS.jpg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FATS | ADD NEW</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        body.dark-mode {
            background-color: #121212;
            color: #ffffff;
        }
        .form-control.dark-mode,
        .form-select.dark-mode {
            background-color: #2c2c2c;
            color: #ffffff;
            border-color: #444;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm mb-4">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <h3 class="navbar-brand mb-0"><strong>FATS | ADD NEW</strong></h3>
        <div class="form-check form-switch text-white">
            <input class="form-check-input" type="checkbox" id="darkModeToggle">
            <label class="form-check-label" for="darkModeToggle">Dark Mode</label>
            
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container">
    <div class="text-center mb-4">
        <h3><strong>ADD CUSTOMER AND VEHICLE</strong></h3>
    </div>

    <!-- Form to Add New Record -->
    <form action="" method="post">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Group:</label>
                <select name="gp" class="form-select" required>
                    <option value="" disabled selected>Select Group</option>
                    <option value="Group 1">Group 1</option>
                    <option value="Group 2">Group 2</option>
                    <option value="Group 3">Group 3</option>
                    <option value="Group 4">Group 4</option>
                    <option value="Group 5">Group 5</option>
                    <option value="Group 6">Group 6</option>
                    <option value="Group 7">Group 7</option>
                    <option value="Group 8">Group 8</option>
                    <option value="Group 9">Group 9</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Client's Name:</label>
                <input type="text" class="form-control" name="cname" placeholder="Last Name, First Name, MI" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Marketing Professional:</label>
                <input type="text" class="form-control" name="mp" placeholder="Last Name, First Name, MI" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Unit:</label>
                <select name="unit" class="form-select" required>
                    <option value="" disabled selected>Select Unit</option>
                    <<option value="Alphard 2.5 HEV CVT">Alphard 2.5 HEV CVT</option>
                           <option value="Avanza 1.3 E CVT">Avanza 1.3 E CVT</option>
                           <option value="Avanza 1.3 E M/T">Avanza 1.3 E M/T</option>
                           <option value="Avanza 1.3 J M/T">Avanza 1.3 J M/T</option>
                           <option value="Avanza 1.5 G CVT">Avanza 1.5 G CVT</option>
                           <option value="Camry 2.5 V A/T Hybrid Electric Variant">Camry 2.5 V A/T Hybrid Electric Variant</option>
                           <option value="Coaster  29-Seater M/T diesel">Coaster  29-Seater M/T diesel</option>
                           <option value="Corolla Altis 1.8 E CVT">Corolla Altis 1.8 E CVT</option>
                           <option value="Corolla Altis 1.8 G GR-S CVT">Corolla Altis 1.8 G GR-S CVT</option>
                           <option value="Corolla Altis 1.8 GR-S Hybrid Electric Variant">Corolla Altis 1.8 GR-S Hybrid Electric Variant</option>
                           <option value="Corolla Cross 1.8 G Hybrid Electric Variant">Corolla Cross 1.8 G Hybrid Electric Variant</option>
                           <option value="Corolla Cross 1.8 GR-S Hybrid Electric Variant">Corolla Cross 1.8 GR-S Hybrid Electric Variant</option>
                           <option value="Corolla Cross 1.8 V Hybrid Electric Variant">Corolla Cross 1.8 V Hybrid Electric Variant</option>
                           <option value="Fortuner 4X2 2.4L G A/T DSL">Fortuner 4X2 2.4L G A/T DSL</option>
                           <option value="Fortuner 4X2 2.4L G M/T DSL">Fortuner 4X2 2.4L G M/T DSL</option>
                           <option value="Fortuner 4X2 2.4L V A/T DSL">Fortuner 4X2 2.4L V A/T DSL</option>
                           <option value="Fortuner 4X2 2.8L LTD A/T DSL 2tone">Fortuner 4X2 2.8L LTD A/T DSL 2tone</option>
                           <option value="Fortuner 4X2 2.8L Q A/T DSL">Fortuner 4X2 2.8L Q A/T DSL</option>
                           <option value="Fortuner 4X4 2.8L LTD A/T DSL 2tone">Fortuner 4X4 2.8L LTD A/T DSL 2tone</option>
                           <option value="Fortuner 4X4 GR-S A/T">Fortuner 4X4 GR-S A/T</option>
                           <option value="GR Yaris 1.6 4WD Turbo M/T">GR Yaris 1.6 4WD Turbo M/T</option>
                           <option value="GR86 2.4 A/T">GR86 2.4 A/T</option>
                           <option value="GR86 2.4 M/T">GR86 2.4 M/T</option>
                           <option value="Hi Ace Ambulance 3.0 M/T">Hi Ace Ambulance 3.0 M/T</option>
                           <option value="Hi Ace Cargo 3.0 M/T">Hi Ace Cargo 3.0 M/T</option>
                           <option value="Hi Ace Commuter De Lux 2.8 M/T">Hi Ace Commuter De Lux 2.8 M/T</option>
                           <option value="Hi Ace Commuter Decontent 3.0 M/T">Hi Ace Commuter Decontent 3.0 M/T</option>
                           <option value="Hi Ace GL Grandia 2.8L 1T A/T">Hi Ace GL Grandia 2.8L 1T A/T</option>
                           <option value="Hi Ace GL Grandia 2.8L 1T M/T ">Hi Ace GL Grandia 2.8L 1T M/T </option>
                           <option value="Hi Ace GL Grandia Tourer 2.8L A/T">Hi Ace GL Grandia Tourer 2.8L A/T</option>
                           <option value="Hi Ace Super Grandia  A/T Leather">Hi Ace Super Grandia  A/T Leather</option>
                           <option value="Hi Ace Super Grandia A/T Elite">Hi Ace Super Grandia A/T Elite</option>
                           <option value="Hilux 4X2 E 2.4  A/T vnt">Hilux 4X2 E 2.4  A/T vnt</option>
                           <option value="Hilux 4X2 E 2.4  M/T vnt">Hilux 4X2 E 2.4  M/T vnt</option>
                           <option value="Hilux 4X2 G 2.4 A/T vnt">Hilux 4X2 G 2.4 A/T vnt</option>
                           <option value="Hilux 4X2 G 2.4 M/T vnt">Hilux 4X2 G 2.4 M/T vnt</option>
                           <option value="Hilux 4X2 J 2.4 M/T vnt">Hilux 4X2 J 2.4 M/T vnt</option>
                           <option value="Hilux 4X4 J 2.4  M/T vnt">Hilux 4X4 J 2.4  M/T vnt</option>
                           <option value="Hilux Cab and Chassis 2.4 M/T">Hilux Cab and Chassis 2.4 M/T</option>
                           <option value="Hilux Cargo 2.4 M/T">Hilux Cargo 2.4 M/T</option>
                           <option value="Hilux Conquest 4X2 2.4  A/T">Hilux Conquest 4X2 2.4  A/T</option>
                           <option value="Hilux Conquest 4X4 2.8  A/T">Hilux Conquest 4X4 2.8  A/T</option>
                           <option value="Hilux Conquest 4X4 2.8  M/T">Hilux Conquest 4X4 2.8  M/T</option>
                           <option value="Hilux FX 2.4 M/T  (w/ Aircon)">Hilux FX 2.4 M/T  (w/ Aircon)</option>
                           <option value="Hilux GR-S 4X4 A/T">Hilux GR-S 4X4 A/T</option>
                           <option value="Innova E 2.8 DSL A/T">Innova E 2.8 DSL A/T</option>
                           <option value="Innova G 2.8 DSL A/T">Innova G 2.8 DSL A/T</option>
                           <option value="Innova G 2.8 DSL M/T">Innova G 2.8 DSL M/T</option>
                           <option value="Innova J 2.8 DSL M/T">Innova J 2.8 DSL M/T</option>
                           <option value="Innova V 2.8 DSL A/T">Innova V 2.8 DSL A/T</option>
                           <option value="Innova XE 2.8 DSL A/T">Innova XE 2.8 DSL A/T</option>
                           <option value="LC 300 3.5L V6 A/T VX">LC 300 3.5L V6 A/T VX</option>
                           <option value="LC 300 3.5L V6 A/T ZX">LC 300 3.5L V6 A/T ZX</option>
                           <option value="Lite Ace 1.5 Cargo">Lite Ace 1.5 Cargo</option>
                           <option value="Lite Ace 1.5 FX">Lite Ace 1.5 FX</option>
                           <option value="Lite Ace 1.5 Panel Van">Lite Ace 1.5 Panel Van</option>
                           <option value="Lite Ace 1.5 PICK-UP">Lite Ace 1.5 PICK-UP</option>
                           <option value="Prado 2.4 4x4 Gas Turbo A/T">Prado 2.4 4x4 Gas Turbo A/T</option>
                           <option value="Raize 1.0 Turbo CVT">Raize 1.0 Turbo CVT</option>
                           <option value="Raize 1.2 E CVT">Raize 1.2 E CVT</option>
                           <option value="Raize 1.2 E M/T">Raize 1.2 E M/T</option>
                           <option value="Raize 1.2 G CVT">Raize 1.2 G CVT</option>
                           <option value="Rav4 HEV 2.5 LTD CVT  Euro 6">Rav4 HEV 2.5 LTD CVT  Euro 6</option>
                           <option value="Rav4 HEV 2.5 XLE CVT  Euro 6">Rav4 HEV 2.5 XLE CVT  Euro 6</option>
                           <option value="Rush 1.5 GR-S A/T dual vvti">Rush 1.5 GR-S A/T dual vvti</option>
                           <option value="Supra 3.0L A/T">Supra 3.0L A/T</option>
                           <option value="TAMARAW 2.4 GL Dropside DSL A/T">TAMARAW 2.4 GL Dropside DSL A/T</option>
                           <option value="TAMARAW 2.4 Utility Van LWB DSL M/T">TAMARAW 2.4 Utility Van LWB DSL M/T</option>
                           <option value="TAMARAW 2.4 Utility Van LWB G M/T">TAMARAW 2.4 Utility Van LWB G M/T</option>
                           <option value="TAMARAW 2.4 Dropside DSL M/T">TAMARAW 2.4 Dropside DSL M/T</option>
                           <option value="TAMARAW 2.4 Dropside G M/T">TAMARAW 2.4 Dropside G M/T</option>
                           <option value="TAMARAW 2.4 Aluminum Cargo DSL M/T">TAMARAW 2.4 Aluminum Cargo DSL M/T</option>
                           <option value="TAMARAW 2.4 Aluminum Cargo G M/T">TAMARAW 2.4 Aluminum Cargo G M/T</option>
                           <option value="Veloz 1.5 E CVT">Veloz 1.5 E CVT</option>
                           <option value="Veloz 1.5 G CVT">Veloz 1.5 G CVT</option>
                           <option value="Veloz 1.5 V CVT">Veloz 1.5 V CVT</option>
                           <option value="Vios 1.3 J M/T">Vios 1.3 J M/T</option>
                           <option value="Vios 1.3 XE CVT">Vios 1.3 XE CVT</option>
                           <option value="Vios 1.3 XLE CVT">Vios 1.3 XLE CVT</option>
                           <option value="Vios 1.3 XLE M/T">Vios 1.3 XLE M/T</option>
                           <option value="Vios 1.5 G CVT">Vios 1.5 G CVT</option>
                           <option value="Vios 1.5 G M/T">Vios 1.5 G M/T</option>
                           <option value="Wigo 1.0 E CVT">Wigo 1.0 E CVT</option>
                           <option value="Wigo 1.0 G CVT">Wigo 1.0 G CVT</option>
                           <option value="Wigo 1.0 J M/T">Wigo 1.0 J M/T</option>
                           <option value="Yaris Cross 1.5 G CVT">Yaris Cross 1.5 G CVT</option>
                           <option value="Yaris Cross 1.5 S Hybrid Electric Variant">Yaris Cross 1.5 S Hybrid Electric Variant</option>
                           <option value="Yaris Cross 1.5 V CVT">Yaris Cross 1.5 V CVT</option>
                           <option value="Zenix 2.0 Q  Hybrid Electric Variant  CVT">Zenix 2.0 Q  Hybrid Electric Variant  CVT</option>
                           <option value="Zenix 2.0 V CVT">Zenix 2.0 V CVT</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Down Payment:</label>
                <input type="text" class="form-control" name="dp" placeholder="Down Payment Amount" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Terms:</label>
                <input type="text" class="form-control" name="terms" placeholder="Payment Terms" required>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-center mt-4">
            <button type="submit" name="submit" class="btn btn-success px-5">Add Record</button>
        </div>
    </form>
</div>



<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Dark Mode Toggle Script -->
<script>
    const toggle = document.getElementById('darkModeToggle');
    toggle.addEventListener('change', () => {
        document.body.classList.toggle('dark-mode');
        document.querySelectorAll('.form-control, .form-select').forEach(el => {
            el.classList.toggle('dark-mode');
        });
    });
</script>

</body>
</html>

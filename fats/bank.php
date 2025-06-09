<?php
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $gp = $_POST['gp'];
  $ad = $_POST['ad'];
  $da = $_POST['da'];
  $dr = $_POST['dr'];
  $rb = $_POST['rb'];
  $cname = $_POST['cname'];
  $mp = $_POST['mp'];
  $unit = $_POST['unit'];
  $tfs = $_POST['tfs'];
  $tfsremarks = $_POST['tfsremarks'];
  $ewb = $_POST['ewb'];
  $ewbremarks = $_POST['ewbremarks'];
  $psb = $_POST['psb'];
  $psbremarks = $_POST['psbremarks'];
  $bpi = $_POST['bpi'];
  $bpiremarks = $_POST['bpiremarks'];
  $sb = $_POST['sb'];
  $sbremarks = $_POST['sbremarks'];
  $cb = $_POST['cb'];
  $cbremarks = $_POST['cbremarks'];
  $pffc = $_POST['pffc'];
  $pffcremarks = $_POST['pffcremarks'];
  $bdo = $_POST['bdo'];
  $bdoremarks = $_POST['bdoremarks'];
  $mb = $_POST['mb'];
  $mbremarks = $_POST['mbremarks'];
  $status = $_POST['status'];

  $sql = "UPDATE `input` SET `gp`='$gp',`ad`='$ad',`da`='$da',`dr`='$dr',`rb`='$rb',`cname`='$cname',`mp`='$mp',`unit`='$unit',`tfs`='$tfs',`tfsremarks`='$tfsremarks',
  `ewb`='$ewb',`ewbremarks`='$ewbremarks',`psb`='$psb',`psbremarks`='$psbremarks',`bpi`='$bpi',`bpiremarks`='$bpiremarks',`sb`='$sb',`sbremarks`='$sbremarks',`cb`='$cb',
  `cbremarks`='$cbremarks',`pffc`='$pffc',`pffcremarks`='$pffcremarks',`bdo`='$bdo',`bdoremarks`='$bdoremarks',`mb`='$mb',`mbremarks`='$mbremarks',`status`='$status' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: addboard?msg=Data updated successfully");
  } else {
    header("Location: addboard?msg=ERROR");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" type="x-icon" href="FATS.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>FATS | BANK</title>
</head>

<body>
<nav class="navbar navbar-light justify-content-center fs-1 text-light mb-4" align="center" style="background-color: #c91019;">
<h1><strong>FINANCING APPLICATION TRACKING SYSTEM</strong></h1></nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3><strong>BANKS STATUS</strong></h3>
    </div>

    <?php
    $sql = "SELECT * FROM `input` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

<div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="col mb-1">
                    <label class="form-label">TFSPH:</label>
                    <input type="text" class="form-control" name="tfs" readonly value="<?php echo $row['tfs'] ?>">
                </div>

                <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="tfsremarks" readonly value="<?php echo $row['tfsremarks'] ?>">
                        </div>
                      </div>

                      <div class="col mb-1">
                    <label class="form-label">EWB:</label>
                    <input type="text" class="form-control" name="ewb" readonly value="<?php echo $row['ewb'] ?>">
                </div>

                <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="ewbremarks" readonly value="<?php echo $row['ewbremarks'] ?>">
                        </div>
                      </div>

                <div class="col mb-1">
                    <label class="form-label">PSB:</label>
                    <input type="text" class="form-control" name="psb" readonly value="<?php echo $row['psb'] ?>">
                </div>

                <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="psbremarks" readonly value="<?php echo $row['psbremarks'] ?>">
                        </div>
                      </div>

                      <div class="col mb-1">
                      <label class="form-label">BPI:</label>
                    <input type="text" class="form-control" name="bpi" readonly value="<?php echo $row['bpi'] ?>">
                </div>      

                <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="bpiremarks" readonly value="<?php echo $row['bpiremarks'] ?>">
                        </div>
                      </div>
                      
                      <div class="col mb-1">
                      <label class="form-label">SB:</label>
                    <input type="text" class="form-control" name="sb" readonly value="<?php echo $row['sb'] ?>">
                </div>

                <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="sbremarks" readonly value="<?php echo $row['sbremarks'] ?>">
                      </div>
                </div>

                <div class="col mb-1">
                    <label class="form-label">CB:</label>
                    <input type="text" class="form-control" name="cb" readonly value="<?php echo $row['cb'] ?>">
                </div>

                <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="cbremarks" readonly value="<?php echo $row['cbremarks'] ?>">
                        </div>
                      </div>

                      <div class="col mb-1">
                      <label class="form-label">PFFC:</label>
                    <input type="text" class="form-control" name="pffc" readonly value="<?php echo $row['pffc'] ?>">
                </div>

                <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="pffcremarks" readonly value="<?php echo $row['pffcremarks'] ?>">
                        </div>
                      </div>

                      <div class="col mb-1">
                      <label class="form-label">BDO:</label>
                    <input type="text" class="form-control" name="bdo" readonly value="<?php echo $row['bdo'] ?>">
                </div>

                <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="bdoremarks" readonly value="<?php echo $row['bdoremarks'] ?>">
                        </div>
                      </div>
                        
                <div class="col mb-1">
                    <label class="form-label">MB:</label>
                    <input type="text" class="form-control" name="mb" readonly value="<?php echo $row['mb'] ?>">
                </div>

                <div class="col mb-3">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="mbremarks" readonly value="<?php echo $row['mbremarks'] ?>">
                        </div>
                      </div>

                      <h5>
                        <div class="row mb-3">
                          <div class="col">
                            <label class="form-label">Status:</label>
                            <input type="text" class="form-control" name="status" readonly value="<?php echo $row['status'] ?>">
                          </div>    
                        </div>
                      </h5>
      </form>
    </div>
  </div>

  <h6>.</h6>
  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
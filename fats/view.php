<?php
include "db_conn.php";

?>
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
  $dp = $_POST['dp'];
  $terms = $_POST['terms'];
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

  $sql = "UPDATE `fnahis` SET `gp`='$gp',`da`='$da',`dr`='$dr',`rb`='$rb',`cname`='$cname',`mp`='$mp',`unit`='$unit',`dp`='$dp',`terms`='$terms',`tfs`='$tfs',`tfsremarks`='$tfsremarks',
  `ewb`='$ewb',`ewbremarks`='$ewbremarks',`psb`='$psb',`psbremarks`='$psbremarks',`bpi`='$bpi',`bpiremarks`='$bpiremarks',`sb`='$sb',`sbremarks`='$sbremarks',`cb`='$cb',
  `cbremarks`='$cbremarks',`pffc`='$pffc',`pffcremarks`='$pffcremarks',`bdo`='$bdo',`bdoremarks`='$bdoremarks',`mb`='$mb',`mbremarks`='$mbremarks',`status`='$status' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("");
  } else {
    header("");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="x-icon" href="FATS.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/2.1.2/css/dataTables.bootstrap4.min.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.2/js/dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.2/js/dataTables.bootstrap4.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
  <title>FATS | VIEW</title>
</head>

<body>
<nav class="navbar navbar-light justify-content-center fs-1 text-light mb-4" align="center" style="background-color: #c91019;">
<h1><strong>FINANCING APPLICATION TRACKING SYSTEM</strong></h1></nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3><strong>VIEW CUSTOMER INFORMATION</strong></h3>
    </div>

    <?php
    $sql = "SELECT * FROM `input` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>


      <div class="container d-flex justify-content-center">
      <form action="move_data.php" method="post" style="width:50vw; min-width:300px;">
              <div class="row mb-3">
                <div class="col">
                      <label class="form-label">Group:</label>
                      <input type="text" class="form-control" name="gp" readonly value="<?php echo $row['gp'] ?>">
                </div>

                <div class="col">
                      <label class="form-label">Application Date:</label>
                      <input type="date" class="form-control" name="ad" readonly value="<?php echo $row['ad'] ?>">
                </div>
              
                <div class="col">
                      <label class="form-label">Date of Approval:</label>
                      <input type="date" class="form-control" name="da" readonly value="<?php echo $row['da'] ?>">
                </div>
              </div>

               <div class="row mb-1">
                  <div class="col">
                        <label class="form-label">Date Released:</label>
                        <input type="date" class="form-control" name="dr" readonly value="<?php echo $row['dr'] ?>">
                  </div>

                  <div class="col">
                        <label class="form-label">Releasing Bank:</label>
                        <input type="text" class="form-control" name="rb" readonly value="<?php echo $row['rb'] ?>">
                  </div>
  
                    <div class="col">
                        <label class="form-label">Clients Name:</label>
                        <input type="text" class="form-control" name="cname" readonly value="<?php echo $row['cname'] ?>">
                    </div>
                    </div>

                    <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Marketing Professional:</label>
                        <input type="text" class="form-control" name="mp" readonly value="<?php echo $row['mp'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Unit:</label>
                        <input type="text" class="form-control" name="unit" readonly value="<?php echo $row['unit'] ?>">
                    </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                        <h6>Down Payment:</h6>
                        <input type="text" class="form-control" name="dp" readonly value="<?php echo $row['dp'] ?>">
                    </div>

                        <div class="col">
                        <h6>Terms:</h6>
                        <input type="text" class="form-control" name="terms" readonly value="<?php echo $row['terms'] ?>">
                    </div>
                    </div>

                <div class="row mb-3">
                <div class="col">
                    <label class="form-label">TFSPH:</label>
                    <input type="text" class="form-control" name="tfs" readonly value="<?php echo $row['tfs'] ?>">
                </div>
                </div>

                <div class="row mb-3">
                <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="tfsremarks" readonly value="<?php echo $row['tfsremarks'] ?>">
                        </div>
                        </div>
                      </div>

                      <div class="row mb-3">
                      <div class="col">
                    <label class="form-label">EWB:</label>
                    <input type="text" class="form-control" name="ewb" readonly value="<?php echo $row['ewb'] ?>">
                </div>
                </div>

                <div class="row mb-3">
                <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="ewbremarks" readonly value="<?php echo $row['ewbremarks'] ?>">
                        </div>
                      </div>
                      </div>

                      <div class="row mb-3">
                <div class="col">
                    <label class="form-label">PSB:</label>
                    <input type="text" class="form-control" name="psb" readonly value="<?php echo $row['psb'] ?>">
                </div>
                </div>

                <div class="row mb-3">
                <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="psbremarks" readonly value="<?php echo $row['psbremarks'] ?>">
                        </div>
                      </div>
                      </div>

                      <div class="row mb-3">
                      <div class="col">
                      <label class="form-label">BPI:</label>
                    <input type="text" class="form-control" name="bpi" readonly value="<?php echo $row['bpi'] ?>">
                </div>      
                </div>

                <div class="row mb-3">
                <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="bpiremarks" readonly value="<?php echo $row['bpiremarks'] ?>">
                        </div>
                        </div>
                      </div>
                      
                      <div class="row mb-3">
                      <div class="col">
                      <label class="form-label">SB:</label>
                    <input type="text" class="form-control" name="sb" readonly value="<?php echo $row['sb'] ?>">
                </div>
                </div>

                <div class="row mb-3">
                <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="sbremarks" readonly value="<?php echo $row['sbremarks'] ?>">
                      </div>
                </div>
                </div>

                <div class="row mb-3">
                <div class="col">
                    <label class="form-label">CB:</label>
                    <input type="text" class="form-control" name="cb" readonly value="<?php echo $row['cb'] ?>">
                </div>
                </div>

                <div class="row mb-3">
                <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="cbremarks" readonly value="<?php echo $row['cbremarks'] ?>">
                        </div>
                        </div>
                      </div>

                      <div class="row mb-3">
                      <div class="col">
                      <label class="form-label">PFFC:</label>
                    <input type="text" class="form-control" name="pffc" readonly value="<?php echo $row['pffc'] ?>">
                </div>
                </div>

                <div class="row mb-3">
                <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="pffcremarks" readonly value="<?php echo $row['pffcremarks'] ?>">
                        </div>
                        </div>
                      </div>

                      <div class="row mb-3">
                      <div class="col">
                      <label class="form-label">BDO:</label>
                    <input type="text" class="form-control" name="bdo" readonly value="<?php echo $row['bdo'] ?>">
                </div>
                </div>

                <div class="row mb-3">
                <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="bdoremarks" readonly value="<?php echo $row['bdoremarks'] ?>">
                        </div>
                      </div>
                      </div>
                        
                      <div class="row mb-3">
                <div class="col">
                    <label class="form-label">MB:</label>
                    <input type="text" class="form-control" name="mb" readonly value="<?php echo $row['mb'] ?>">
                </div>
                </div>

                <div class="row mb-3">
                <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="mbremarks" readonly value="<?php echo $row['mbremarks'] ?>">
                        </div>
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
      
                        <div class="row mb-3">
                        <div class="col" align="right">
                          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                          <input type="submit" class="btn btn-danger" value="RELEASE">
                        </div>    
                        </div>
                          </form>
    </div>
  </div>

  <br />
  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>
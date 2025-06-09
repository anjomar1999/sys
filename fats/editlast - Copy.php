<?php
include "db_conn.php";
session_start();

if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'totadmin') {
    header("Location: login.php");
    exit;
}
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

    $sql = "UPDATE `input` SET `gp`='$gp',`da`='$da',`dr`='$dr',`rb`='$rb',`cname`='$cname',`mp`='$mp',`unit`='$unit',`dp`='$dp',`terms`='$terms',`tfs`='$tfs',`tfsremarks`='$tfsremarks',
    `ewb`='$ewb',`ewbremarks`='$ewbremarks',`psb`='$psb',`psbremarks`='$psbremarks',`bpi`='$bpi',`bpiremarks`='$bpiremarks',`sb`='$sb',`sbremarks`='$sbremarks',`cb`='$cb',
    `cbremarks`='$cbremarks',`pffc`='$pffc',`pffcremarks`='$pffcremarks',`bdo`='$bdo',`bdoremarks`='$bdoremarks',`mb`='$mb',`mbremarks`='$mbremarks',`status`='$status' WHERE id = $id";
  
  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: totadmin?msg=Data updated successfully");
  } else {
    header("Location: totadmin?msg=ERROR");
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
  
  <title>FATS | EDIT</title>
</head>

<body>
<nav class="navbar navbar-light justify-content-center fs-1 text-light mb-4" align="center" style="background-color: #c91019;">
<h1><strong>FINANCING APPLICATION TRACKING SYSTEM</strong></h1></nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3><strong>UPDATE CUSTOMER INFORMATION</strong></h3>
      <p class="text-muted">Click Update after confirming any information</p>
    </div>
    <?php
    $sql = "SELECT * FROM `input` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

      <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
      
              <div class="row mb-3">
                <div class="col">
                      <label class="form-label">Group:</label>
                      <input type="text" class="form-control" name="gp" value="<?php echo $row['gp'] ?>">
                </div>
              
                <div class="col">
                      <label class="form-label">Date of Approval:</label>
                      <input type="date" class="form-control" name="da" value="<?php echo $row['da'] ?>">
                </div>
              </div>

               <div class="row mb-1">
                  <div class="col">
                        <label class="form-label">Date Released:</label>
                        <input type="date" class="form-control" name="dr" value="<?php echo $row['dr'] ?>">
                  </div>

                  <div class="col">
                        <label class="form-label">Releasing Bank:</label>
                        <input type="text" class="form-control" name="rb" value="<?php echo $row['rb'] ?>">
                  </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Clients Name:</label>
                        <input type="text" class="form-control" name="cname" value="<?php echo $row['cname'] ?>">
                    </div>
                    
                    <div class="col">
                        <label class="form-label">Marketing Professional:</label>
                        <input type="text" class="form-control" name="mp" value="<?php echo $row['mp'] ?>">
                    </div>
                    </div>  

                    <div class="row mb-3">
                      <div class="col">
                        <label class="form-label">Unit:</label>
                        <input type="text" class="form-control" name="unit" value="<?php echo $row['unit'] ?>">
                      </div>

                        <div class="col">

                        <h6>Down Payment:</h6>
                        <input type="text" class="form-control" name="dp" value="<?php echo $row['dp'] ?>">
                    </div>
                        <div class="col">
                        <h6>Terms:</h6>
                        <input type="text" class="form-control" name="terms" value="<?php echo $row['terms'] ?>">
                    </div>
                    </div>

                      <h5>
                        <div class="row mb-3">
                          <div class="col">
                            <label class="form-label text-secondary">TFSPH:</label>
                            <select name="tfs" id="tfs">
                            <option value="<?php echo $row['tfs'] ?>"></option>
                            <option value="For Encode">For Encode</option>
                            <option value="Document Deficiency">Document Deficiency</option>
                            <option value="On Process">On Process</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Declined">Declined</option>
                            <option value="Reprocess">Reprocess</option>
                            <option value="Approved">Approved</option>
                            <option value="Not Process">Not Process</option>
                            </select>       
                          </div>      
                        </div>
                      </h5>

                      <div class="row mb-3">
                      <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="tfsremarks" value="<?php echo $row['tfsremarks'] ?>">
                        </div>
                      </div>
                      </div>

                      <h5>
                        <div class="row mb-3">
                          <div class="col">
                            <label class="form-label text-secondary">EWB:</label>
                            <select name="ewb" id="ewb">
                            <option value="<?php echo $row['ewb'] ?>"></option>
                            <option value="For Encode">For Encode</option>
                            <option value="Document Deficiency">Document Deficiency</option>
                            <option value="On Process">On Process</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Declined">Declined</option>
                            <option value="Reprocess">Reprocess</option>
                            <option value="Approved">Approved</option>
                            <option value="Not Process">Not Process</option>
                            </select>       
                          </div>      
                        </div>
                      </h5>

                      <div class="row mb-3">
                      <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="ewbremarks" value="<?php echo $row['ewbremarks'] ?>">
                        </div>
                      </div>
                      </div>

                      <h5>
                        <div class="row mb-3">
                          <div class="col">
                            <label class="form-label text-secondary">PSB:</label>
                            <select name="psb" id="psb">
                            <option value="<?php echo $row['psb'] ?>"></option>
                            <option value="For Encode">For Encode</option>
                            <option value="Document Deficiency">Document Deficiency</option>
                            <option value="On Process">On Process</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Declined">Declined</option>
                            <option value="Reprocess">Reprocess</option>
                            <option value="Approved">Approved</option>
                            <option value="Not Process">Not Process</option>
                            </select>       
                          </div>      
                        </div>
                      </h5>

                      <div class="row mb-3">
                      <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="psbremarks" value="<?php echo $row['psbremarks'] ?>">
                        </div>
                      </div>
                      </div>

                      <h5>
                        <div class="row mb-3">
                          <div class="col">
                            <label class="form-label text-secondary">BPI:</label>
                            <select name="bpi" id="bpi">
                            <option value="<?php echo $row['bpi'] ?>"></option>
                            <option value="For Encode">For Encode</option>
                            <option value="Document Deficiency">Document Deficiency</option>
                            <option value="On Process">On Process</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Declined">Declined</option>
                            <option value="Reprocess">Reprocess</option>
                            <option value="Approved">Approved</option>
                            <option value="Not Process">Not Process</option>
                            </select>       
                          </div>      
                        </div>
                      </h5>

                      <div class="row mb-3">
                      <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="bpiremarks" value="<?php echo $row['bpiremarks'] ?>">
                        </div>
                      </div>
                      </div>

                      <h5>
                        <div class="row mb-3">
                          <div class="col">
                            <label class="form-label text-secondary">SB:</label>
                            <select name="sb" id="sb">
                            <option value="<?php echo $row['sb'] ?>"></option>
                            <option value="For Encode">For Encode</option>
                            <option value="Document Deficiency">Document Deficiency</option>
                            <option value="On Process">On Process</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Declined">Declined</option>
                            <option value="Reprocess">Reprocess</option>
                            <option value="Approved">Approved</option>
                            <option value="Not Process">Not Process</option>
                            </select>       
                          </div>      
                        </div>
                      </h5>

                      <div class="row mb-3">
                      <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="sbremarks" value="<?php echo $row['sbremarks'] ?>">
                        </div>
                      </div>
                      </div>

                      <h5>
                        <div class="row mb-3">
                          <div class="col">
                            <label class="form-label text-secondary">CB:</label>
                            <select name="cb" id="cb">
                            <option value="<?php echo $row['cb'] ?>"></option>
                            <option value="For Encode">For Encode</option>
                            <option value="Document Deficiency">Document Deficiency</option>
                            <option value="On Process">On Process</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Declined">Declined</option>
                            <option value="Reprocess">Reprocess</option>
                            <option value="Approved">Approved</option>
                            <option value="Not Process">Not Process</option>
                            </select>       
                          </div>      
                        </div>
                      </h5>

                      <div class="row mb-3">
                      <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="cbremarks" value="<?php echo $row['cbremarks'] ?>">
                        </div>
                      </div>
                      </div>

                      <h5>
                        <div class="row mb-3">
                          <div class="col">
                            <label class="form-label text-secondary">PFFC:</label>
                            <select name="pffc" id="pffc">
                            <option value="<?php echo $row['pffc'] ?>"></option>
                            <option value="For Encode">For Encode</option>
                            <option value="Document Deficiency">Document Deficiency</option>
                            <option value="On Process">On Process</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Declined">Declined</option>
                            <option value="Reprocess">Reprocess</option>
                            <option value="Approved">Approved</option>
                            <option value="Not Process">Not Process</option>
                            </select>       
                          </div>      
                        </div>
                      </h5>

                      <div class="row mb-3">
                      <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="pffcremarks" value="<?php echo $row['pffcremarks'] ?>">
                        </div>
                      </div>
                      </div>

                      <h5>
                        <div class="row mb-3">
                          <div class="col">
                            <label class="form-label text-secondary">BDO:</label>
                            <select name="bdo" id="bdo">
                            <option value="<?php echo $row['bdo'] ?>"></option>
                            <option value="For Encode">For Encode</option>
                            <option value="Document Deficiency">Document Deficiency</option>
                            <option value="On Process">On Process</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Declined">Declined</option>
                            <option value="Reprocess">Reprocess</option>
                            <option value="Approved">Approved</option>
                            <option value="Not Process">Not Process</option>
                            </select>       
                          </div>      
                        </div>
                      </h5>

                      <div class="row mb-3">
                      <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="bdoremarks" value="<?php echo $row['bdoremarks'] ?>">
                        </div>
                      </div>
                      </div>

                      <h5>
                        <div class="row mb-3">
                          <div class="col">
                            <label class="form-label text-secondary">MB:</label>
                            <select name="mb" id="mb">
                            <option value="<?php echo $row['mb'] ?>"></option>
                            <option value="For Encode">For Encode</option>
                            <option value="Document Deficiency">Document Deficiency</option>
                            <option value="On Process">On Process</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Declined">Declined</option>
                            <option value="Reprocess">Reprocess</option>
                            <option value="Approved">Approved</option>
                            <option value="Not Process">Not Process</option>
                            </select>       
                          </div>      
                        </div>
                      </h5>

                      <div class="row mb-3">
                      <div class="col">
                        <div class="form-floating text-secondary">
                        <input type="text" class="form-control" name="mbremarks" value="<?php echo $row['mbremarks'] ?>">
                        </div>
                      </div>
                      </div>

                      <h5>
                        <div class="row mb-3">
                          <div class="col">
                            <label class="form-label text-secondary">STATUS:</label>
                            <select name="status" id="status">
                            <option value="<?php echo $row['status'] ?>"></option>
                            <option value="For Encode">For Encode</option>
                            <option value="Document Deficiency">Document Deficiency</option>
                            <option value="On Process">On Process</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Declined">Declined</option>
                            <option value="Reprocess">Reprocess</option>
                            <option value="Approved">Approved</option>
                            <option value="Released">Released</option>
                            <option value="Not Process">Not Process</option>
                            </select>       
                          </div>      
                        </div>
                      </h5>
                        
              <div>
          <button type="submit" class="btn btn-dark" name="submit">Update</button>
              </div>
      </form>
    </div>
  </div>
  
  <br />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>
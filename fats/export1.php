<?php
include "db_conn.php";
?>
<?php

$connect = new PDO("mysql:host=localhost;dbname=fna", "root", "");

$start_date_error = '';
$end_date_error = '';

if(isset($_POST["export"]))
{
 if(empty($_POST["start_date"]))
 {
  $start_date_error = '<label class="text-danger">Start Date is required</label>';
 }
 else if(empty($_POST["end_date"]))
 {
  $end_date_error = '<label class="text-danger">End Date is required</label>';
 }
 else
 {
  $file_name = 'Untitled.csv';
  header("Content-Description: File Transfer");
  header("Content-Disposition: attachment; filename=$file_name");
  header("Content-Type: application/csv;");

  $file = fopen('php://output', 'w');

  $header = array("Application Date", "Group", "Date of Approval", "Date Released", "Releasing Bank", "Clients Name", "MP", "Unit", "DP", "Terms", "TFSPH", "EWB", "PSB", "BPI", "SB", "CB", "PFFC", "BDO", "MB", "STATUS",);

  fputcsv($file, $header);

  $query = "
  SELECT * FROM fnahis 
  WHERE ad >= '".$_POST["start_date"]."' 
  AND ad <= '".$_POST["end_date"]."' 
  ORDER BY ad DESC
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   $data = array();
   $data[] = $row["ad"];
   $data[] = $row["gp"];
   $data[] = $row["da"];
   $data[] = $row["dr"];
   $data[] = $row["rb"];
   $data[] = $row["cname"];
   $data[] = $row["mp"];
   $data[] = $row["unit"];
   $data[] = $row["dp"];
   $data[] = $row["terms"];
   $data[] = $row["tfs"];
   $data[] = $row["ewb"];
   $data[] = $row["psb"];
   $data[] = $row["bpi"];
   $data[] = $row["sb"];
   $data[] = $row["cb"];
   $data[] = $row["pffc"];
   $data[] = $row["bdo"];
   $data[] = $row["mb"];
   $data[] = $row["status"];
   fputcsv($file, $data);
  }
  fclose($file);
  exit;
 }
}

$query = "
SELECT * FROM fnahis
ORDER BY ad DESC;
";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

?>

<html>
 <head>
  <title>FATS | EXPORT</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="shortcut icon" type="x-icon" href="FATS.jpg">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
 </head>
 <body>
 <nav class="navbar navbar-light justify-content-center fs-1 text-light mb-4" align="center" style="background-color: #c91019;">
    <h1><strong>FINANCING APPLICATION TRACKING SYSTEM</strong></h1>
  </nav>
  <h1 class="text-success" align="center"><strong>EXPORT DATA TO EXCEL</strong></h1>
    <h3 align="center"><strong>SELECT DATE RANGE</strong></h3>
    <br />
    <div class="container box">
     <form method="post">
     <div class="input-daterange">

      <div class="row mb-3">       
        <div class="col">
        <h5 align="center"><label class="form-label">FROM</label></h5>
        <input type="date" name="start_date" class="form-control" readonly />
        <?php echo $start_date_error; ?>
       </div>
       <div class="col">
        <h5 align="center"><label class="form-label">TO</label></h5>
        <input type="date" name="end_date" class="form-control" readonly />
        <?php echo $end_date_error; ?>
       </div>
       </div>
       <br />

       <br />
      <div class="row-md-3" align="center">
      <div class="col">
      <div class="form-floating text-secondary">
       <input type="submit" name="export" value="Export" class="btn btn-success" />
      </div>
      </div>
      </div>
     </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


 </body>
</html>

<script>

$(document).ready(function(){
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format: "yyyy-mm-dd",
  autoclose: true
 });
});

</script>

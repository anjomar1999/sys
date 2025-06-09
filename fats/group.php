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

if (isset($_POST["submit"])) {
   $gp = $_POST['gp'];
   $cname = $_POST['cname'];
   $mp = $_POST['mp'];
   $unit = $_POST['unit'];
   $dp = $_POST['dp'];
   $terms = $_POST['terms'];

   $sql = "INSERT INTO `input`(`gp`, `cname`, `mp`, `unit`, `dp`, `terms`) VALUES ('$gp','$cname', '$mp', '$unit', '$dp', '$terms')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: totadmin?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

?>

<?php
$groups = [
    
    1 => 'Group1',
    2 => 'Group2',
    3 => 'Group3',
    3 => 'Group4',
    3 => 'Group5',
    3 => 'Group6',
    3 => 'Group7',
    3 => 'Group8',
    3 => 'Group9'
];

$members = [
    1 => ['Cristobal, Kenneth', 'David, Ron Alfred', 'De Manuel, Aizza', 'Dionisio, Kenneth'],
    2 => ['Butardo, Christian', 'Celorio, Claro', 'Corpuz, Chrisiram', ],
    3 => ['Anjomar', 'Bernardo']
];

$selected_group = isset($_POST['group']) ? $_POST['group'] : '';
$selected_member = isset($_POST['member']) ? $_POST['member'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FATS</title>
</head>
<body>

    <form method="post">
        <label for="group">Select Group:</label>
        <select name="group" id="group" onchange="this.form.submit()">
            <option value="">-- Select Group --</option>
            <?php
            foreach ($groups as $group_id => $group_name) {
                echo "<option value=\"$group_id\" " . ($selected_group == $group_id ? 'selected' : '') . ">$group_name</option>";
            }
            ?>
        </select>

        <br><br>

        <label for="member">Select Member:</label>
        <select name="member" id="member">
            <option value="">-- Select Member --</option>
            <?php
            if ($selected_group) {
                foreach ($members[$selected_group] as $member) {
                    echo "<option value=\"$member\" " . ($selected_member == $member ? 'selected' : '') . ">$member</option>";
                }
            }
            ?>
        </select>
    </form>

</body>
</html>

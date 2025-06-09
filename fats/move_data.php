<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "fna");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Move data to the destination table
    $conn->query("INSERT INTO fnahis (id, gp, ad, da, dr, rb, cname, mp, unit, dp, terms, tfs, tfsremarks, ewb, ewbremarks, psb, psbremarks, bpi, bpiremarks, sb, sbremarks, cb, cbremarks, pffc, pffcremarks, bdo, bdoremarks, mb, mbremarks, status)
                  SELECT id, gp, ad, da, dr, rb, cname, mp, unit, dp, terms, tfs, tfsremarks, ewb, ewbremarks, psb, psbremarks, bpi, bpiremarks, sb, sbremarks, cb, cbremarks, pffc, pffcremarks, bdo, bdoremarks, mb, mbremarks, status FROM input WHERE id = $id");

    // Delete data from the source table (optional)
    $conn->query("DELETE FROM input WHERE id = $id");

    // Redirect back to the table page
    header("Location: totadmin.php");
    exit();
}
?>
<?php
    include'../connect.php';
?>

<?php
    date_default_timezone_set('Europe/Athens');
    
    // Λήψη των τιμών POST
    $id = $_POST['id'];
    $tropos_pliromis = $_POST['tropos_pliromis'];
    $imerominia = date('Y-m-d H:i:s');
    $dieythinsi = $_POST['dieythinsi'];
    $timi = $_POST['timi'];

    
    // Σύνταξη εντολής SQL για εισαγωγή δεδομένων
    $qry = "UPDATE paraggelies 
            SET tropos_pliromis='$tropos_pliromis', 
                imerominia='$imerominia',
                dieythinsi='$dieythinsi',
                timi='$timi'
            WHERE id='$id'";
    
    // Εκτέλεση εντολής
    $qryexe = mysqli_query($conn, $qry);
    
    header("location: update_paraggelies.php");
?>
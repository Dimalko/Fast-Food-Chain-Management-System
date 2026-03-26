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
    $qry = "INSERT INTO paraggelies (id, tropos_pliromis, imerominia, dieythinsi, timi, katastima) 
            VALUES ('$id', '$tropos_pliromis', '$imerominia', '$dieythinsi', '$timi', 'K0001')";
    
    try{
        // Εκτέλεση εντολής
        $qryexe = mysqli_query($conn, $qry);

        header("location: insert_paraggelies.php");
    }catch(Exception){
        echo"Σφάλμα εισαγωγής δεδομένων.";
    }

?>
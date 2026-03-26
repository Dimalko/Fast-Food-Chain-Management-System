<?php
    include'../connect.php';
?>

<?php
    // Λήψη των τιμών POST
    $a_t = $_POST['a_t'];
    $onomateponimo = $_POST['onomateponimo'];
    $misthos = $_POST['misthos'];
    $posto = $_POST['posto'];

    
    // Σύνταξη εντολής SQL για εισαγωγή δεδομένων
    $qry = "UPDATE ipalilos 
            SET onomateponimo='$onomateponimo', 
                misthos='$misthos',
                posto='$posto'
            WHERE a_t='$a_t'";
    
    // Εκτέλεση εντολής
    $qryexe = mysqli_query($conn, $qry);
    
    header("location: update_ipalilos.php");
?>
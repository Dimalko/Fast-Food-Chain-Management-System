<?php
    include'../connect.php';
?>

<?php
    // Λήψη των τιμών POST
    $id = $_POST['id'];
    $onoma = $_POST['onoma'];
    $timi = $_POST['timi'];
    $katigoria = $_POST['katigoria'];

    
    // Σύνταξη εντολής SQL για εισαγωγή δεδομένων
    $qry = "UPDATE geyma 
            SET onoma='$onoma', 
                timi='$timi',
                katigoria='$katigoria'
            WHERE id='$id'";
    
    // Εκτέλεση εντολής
    $qryexe = mysqli_query($conn, $qry);
    
    header("location: update_geyma.php");
?>
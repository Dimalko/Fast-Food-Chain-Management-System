<?php
    include'../connect.php';
?>

<?php
    // Λήψη των τιμών POST
    $id = $_POST['id'];
    $onoma = $_POST['onoma'];
    $katigoria = $_POST['katigoria'];
    $posotita = $_POST['posotita'];

    
    // Σύνταξη εντολής SQL για εισαγωγή δεδομένων
    $qry = "UPDATE ylika, katastima_yliko
            SET ylika.onoma='$onoma',
                ylika.katigoria='$katigoria',
                katastima_yliko.posothta='$posotita'
            WHERE ylika.id='$id' AND katastima_yliko.yliko='$id' AND katastima_yliko.katastima= 'K0001'";
    
    // Εκτέλεση εντολής
    $qryexe = mysqli_query($conn, $qry);
    
    header("location: update_ylika.php");
?>
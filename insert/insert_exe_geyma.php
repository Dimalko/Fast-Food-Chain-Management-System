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
    $qry1 = "INSERT INTO geyma (id, onoma, timi, katigoria) 
            VALUES ('$id', '$onoma', $timi, '$katigoria')";

    try{
        // Εκτέλεση εντολής
        $qry1exe = mysqli_query($conn, $qry1);

        $qry2 = "INSERT INTO katastima_geyma (katastima, geyma) 
                VALUES ('K0001', '$id')";
        // Εκτέλεση εντολής
        $qry2exe = mysqli_query($conn, $qry2);

        header("location: insert_geyma.php");
    }catch(Exception){
        echo"Σφάλμα εισαγωγής δεδομένων.";
    }
    
    
?>
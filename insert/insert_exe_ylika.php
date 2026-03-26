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
    $qry1 = "INSERT INTO ylika (id, onoma, katigoria) 
            VALUES ('$id', '$onoma', '$katigoria')";

    try{
        // Εκτέλεση εντολής
        $qry1exe = mysqli_query($conn, $qry1);

        $qry2 = "INSERT INTO katastima_yliko (katastima, yliko, posothta) 
                VALUES ('K0001', '$id', '$posotita')";
        // Εκτέλεση εντολής
        $qry2exe = mysqli_query($conn, $qry2);
        
        header("location: insert_ylika.php");
    }catch(Exception){
        echo"Σφάλμα εισαγωγής δεδομένων.";
    }
?>
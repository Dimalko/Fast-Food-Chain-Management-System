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
    $qry = "INSERT INTO ipalilos (a_t, onomateponimo, misthos, posto, katastima) 
            VALUES ('$a_t', '$onomateponimo', $misthos, '$posto', 'K0001')";
    
    try{
        // Εκτέλεση εντολής
        $qryexe = mysqli_query($conn, $qry);

        header("location: insert_ipalilos.php");
    }catch(Exception){
        echo"Σφάλμα εισαγωγής δεδομένων.";
    }
?>
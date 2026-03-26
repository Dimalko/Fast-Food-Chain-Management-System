<?php
    include'../connect.php';

    if (!$conn) {
        die("Σφάλμα: " . mysqli_connect_error());
    }   
?>

<?php
    // Λήψη του id από τη φόρμα
    $id = $_POST['id'];

    if (!empty($id)) {
        // Διαγραφή της εγγραφής
        $qry = "DELETE FROM ylika WHERE id = '$id'";
        $qryexe = mysqli_query($conn, $qry);

        if ($qryexe) {
            echo "Η διαγραφή ολοκληρώθηκε επιτυχώς.";
        } else {
            echo "Σφάλμα κατά τη διαγραφή: " . mysqli_error($conn);
        }
    } else {
        echo "Παρακαλώ δώστε έγκυρη τιμή για το πεδίο id.";
    }

    // Κλείσιμο της σύνδεσης
    mysqli_close($conn);

    header("location: delete_ylika.php");
?>
<?php
    include'../connect.php';

    if (!$conn) {
        die("Σφάλμα: " . mysqli_connect_error());
    }
?>

<?php
    // Έλεγχος σύνδεσης
    if (!$conn) {
        die("Σφάλμα σύνδεσης στη βάση δεδομένων: " . mysqli_connect_error());
    }

    // Λήψη του a_t από τη φόρμα
    $a_t = $_POST['a_t'];

    if (!empty($a_t)) {
        // Διαγραφή της εγγραφής
        $qry = "DELETE FROM ipalilos WHERE a_t = '$a_t'";
        $qryexe = mysqli_query($conn, $qry);

        if ($qryexe) {
            echo "Η διαγραφή ολοκληρώθηκε επιτυχώς.";
        } else {
            echo "Σφάλμα κατά τη διαγραφή: " . mysqli_error($conn);
        }
    } else {
        echo "Παρακαλώ δώστε έγκυρη τιμή για το πεδίο a_t.";
    }

    // Κλείσιμο της σύνδεσης
    mysqli_close($conn);

    header("location: delete_ipalilos.php");
?>
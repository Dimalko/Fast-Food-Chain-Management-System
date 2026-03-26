<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title> Διαγραφή Γεύματος </title>
    <link rel="stylesheet" href="../style.css">
</head>

<?php
	include("../connect.php");
?>

<body>
    <div class="header">
		<h1 align=center>Διαγραφή Γεύματος</h1>
	</div>
    <div class="table-form-frame">
        <table class="table" border=2 align=center>
        <!--thead><-->
            <tr>
                <th class="tc" width=80>id</th>
                <th class="tc" width=80>Όνομα</th>
                <th class="tc" width=80>Τιμή</th>
                <th class="tc" width=80>Κατηγορία</th>
            </tr>
        <!--tbody><-->
            <?php
                // Σύνταξη Ερωτήματος για την εμφάνιση δεδομένων
                $qry = "SELECT *
                        FROM geyma
                        INNER JOIN katastima_geyma
                        ON geyma.id=katastima_geyma.geyma
                        WHERE katastima_geyma.katastima='K0001';";
                
                // Εκτέλεση Ερωτήματος
                $result = mysqli_query($conn, $qry);
                
                // Παρουσίαση αποτελεσμάτων Ερωτήματος
                while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                    
                    echo ("<tr><td><div align=\"center\"> $row[0]</div></td>
                            <td><div align=\"center\"> $row[1] </div></td>
                            <td><div align=\"center\"> $row[2] </div></td>
                            <td><div align=\"center\"> $row[3] </div></td></tr>");
                }
            ?>
        </table>
        <div class="form">
            <form name="delete" method="post" action="delete_exe_geyma.php">
                <table width=300 border=0 align=center cellpadding=2 cellspacing=0>
                    <tr>
                        <td class="ipnut-text" width=120 align=right><b>id:</b></td>
                        <td width=180><input name="id" type="text" size=3></td>
                    </tr>
                    <tr>
                        <td colspan="2" align=center>
                        <input type="submit" name="delete" value="Διαγραφή" class="submitBtn"></td>
                    </tr>
                </table>
            </form>		
        </div>
    </div>
</body>
</html>
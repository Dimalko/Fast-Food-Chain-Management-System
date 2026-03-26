<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title> Επεξεργασία Γεύματος </title>
    <link rel="stylesheet" href="../style.css">
</head>

<?php
	include("../connect.php");
?>

<body>
    <div class="header">
		<h1 align=center>Επεξεργασία Γεύματος</h1>
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
            <form name="update" method="post" action="update_exe_geyma.php">
                <table width=300 border=0 align=center cellpadding=2 cellspacing=0>
                    <tr>
                        <td class="ipnut-text" width=120 align=right><b>id:</b></td>
                        <td width=180><input name="id" type="text" size=3></td>
                    </tr>
                    <tr>
                        <td class="ipnut-text" align=right><b>Όνομα:</b></td>
                        <td><input name="onoma" type="text" size=35></td>
                    </tr>
                    <tr>
                        <td class="ipnut-text" align=right><b>Τιμή:</b></td>
                        <td><input name="timi" type="text" size=10></td>
                    </tr>
                    <tr>
                        <td class="ipnut-text" align=right><b>Κατηγορία:</b></td>
                        <td>
                            <select id="dropdown" name="katigoria">
                                <option value="Burgers">Burgers</option>
                                <option value="Sandwiches">Sandwiches</option>
                                <option value="Μερίδες">Μερίδες</option>
                                <option value="Αναψυκτικά">Αναψυκτικά</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align=center>
                        <input type="submit" name="update" value="Εφαρμογή" class="submitBtn"></td>
                    </tr>
                </table>
            </form>		
        </div>
    </div>
</body>
</html>
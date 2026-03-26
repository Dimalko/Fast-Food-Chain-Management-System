<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title> Επεξεργασία Υλικού </title>
    <link rel="stylesheet" href="../style.css">
</head>

<?php
	include("../connect.php");
?>

<body>
    <div class="header">
		<h1 align=center>Επεξεργασία Υλικού</h1>
	</div>
    <div class="table-form-frame">
        <table class="table" border=2 align=center>
            <!--thead><-->
            <tr>
                <th class="tc" width=80>id</th>
                <th class="tc" width=80>Όνομα</th>
                <th class="tc" width=80>Κατηγορία</th>
                <th class="tc" width=80>Ποσότητα</th>
            </tr>
            <!--tbody><-->
            <?php
                // Σύνταξη Ερωτήματος για την εμφάνιση δεδομένων
                $qry = "SELECT ylika.id, ylika.onoma, ylika.katigoria, katastima_yliko.posothta AS posotita
                        FROM ylika
                        INNER JOIN katastima_yliko
                        ON ylika.id = katastima_yliko.yliko
                        WHERE katastima_yliko.katastima='K0001';";
                
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
            <form name="update" method="post" action="update_exe_ylika.php">
                <table width=300 border=0 align=center cellpadding=2 cellspacing=0>
                    <tr>
                        <td class="ipnut-text" width=120 align=right><b>id:</b></td>
                        <td width=180><input name="id" type="text" size=4></td>
                    </tr>
                    <tr>
                        <td class="ipnut-text" align=right><b>Όνομα:</b></td>
                        <td><input name="onoma" type="text" size=25></td>
                    </tr>
                    <tr>
                        <td class="ipnut-text" align=right><b>Κατηγορία:</b></td>
                        <td>
                            <select id="dropdown" name="katigoria">
                                <option value="Λαχανικά">Λαχανικά</option>
                                <option value="Κρεατικά">Κρεατικά</option>
                                <option value="Σως">Σως</option>
                                <option value="Αλοιφές">Αλοιφές</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="ipnut-text" align=right><b>Ποσότητα:</b></td>
                        <td><input name="posotita" type="text" size=25></td>
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
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title> Εισαγωγή Παραγγελίας </title>
    <link rel="stylesheet" href="../style.css">
</head>

<?php
	include("../connect.php");
?>

<body>
    <div class="header">
		<h1 align=center>Εισαγωγή Παραγγελίας</h1>
	</div>
    <div class="table-form-frame">
        <table class="table" border=2 align=center>
            <!--thead><-->
            <tr>
                <th class="tc" width=80>id</th>
                <th class="tc" width=80>Τρ. Πληρωμής</th>
                <th class="tc" width=80>Ημερομηνία</th>
                <th class="tc" width=80>Διεύθυνση</th>
                <th class="tc" width=80>Τιμή</th>
            </tr>
            <!--tbody><-->
            <?php
                // Σύνταξη Ερωτήματος για την εμφάνιση δεδομένων
                $qry = "SELECT * FROM paraggelies WHERE katastima='K0001'";
                
                // Εκτέλεση Ερωτήματος
                $result = mysqli_query($conn, $qry);
                
                // Παρουσίαση αποτελεσμάτων Ερωτήματος
                while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                    
                    echo ("<tr><td><div align=\"center\"> $row[0]</div></td>
                            <td><div align=\"center\"> $row[1] </div></td>
                            <td><div align=\"center\"> $row[2] </div></td>
                            <td><div align=\"center\"> $row[3] </div></td>
                            <td><div align=\"center\"> $row[4] </div></td></tr>");
                }
            ?>
        </table>
        <div class="form"> 
            <form name="insert" method="post" action="insert_exe_paraggelies.php">
                <table width=300 border=0 align=center cellpadding=2 cellspacing=0>
                    <tr>
                        <td class="ipnut-text" width=120 align=right><b>id:</b></td>
                        <td width=180><input name="id" type="text" size=6></td>
                    </tr>
                    <tr>
                        <td class="ipnut-text" align=right><b>Τρόπος Πληρωμής:</b></td>
                        <td>
                            <select id="dropdown" name="tropos_pliromis">
                                <option value="Μετρητά">Μετρητά</option>
                                <option value="Κάρτα">Κάρτα</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="ipnut-text" align=right><b>Διεύθυνση:</b></td>
                        <td><input name="dieythinsi" type="text" size=25></td>
                    </tr>
                    <tr>
                        <td class="ipnut-text" align=right><b>Τιμή:</b></td>
                        <td><input name="timi" type="text" size=10></td>
                    </tr>
                    <tr>
                        <td colspan="2" align=center>
                        <input type="submit" name="insert" value="Εισαγωγή" class="submitBtn"></td>
                    </tr>
                </table>
            </form>           
        </div>
    </div>
</body>
</html>
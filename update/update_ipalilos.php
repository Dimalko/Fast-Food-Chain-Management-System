<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title> Επεξεργασία Υπαλλήλου </title>
	<link rel="stylesheet" href="../style.css">
</head>

<?php
	include("../connect.php");
?>

<body>
	<div class="header">
		<h1 align=center>Επεξεργασία Υπαλλήλου</h1>
	</div>
	<div class="table-form-frame">
		<table class="table" border=2 align=center>
		<!--thead><-->
			<tr>
				<th class="tc" width=80>Αρ. Ταυτότητας</th>
				<th class="tc" width=80>Ονοματεπώνυμο</th>
				<th class="tc" width=80>Μισθός</th>
				<th class="tc" width=80>Πόστο</th>
			</tr>
		<!--tbody><-->
			<?php
				// Σύνταξη Ερωτήματος για την εμφάνιση δεδομένων
				$qry = "SELECT * FROM ipalilos WHERE katastima='K0001'";
				
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
			<form name="update" method="post" action="update_exe_ipalilos.php">
				<table width=300 border=0 align=center cellpadding=2 cellspacing=0>
					<tr>
						<td class="ipnut-text" align=right><b>Αρ. Ταυτότητας:</b></td>
						<td ><input name="a_t" type="text" size=7></td>
					</tr>
					<tr>
						<td class="ipnut-text" align=right><b>Ονοματεπώνυμο:</b></td>
						<td><input name="onomateponimo" type="text" size=25></td>
					</tr>
					<tr>
						<td class="ipnut-text" align=right><b>Μισθός:</b></td>
						<td><input name="misthos" type="text" size=25></td>
					</tr>
					<tr>
						<td class="ipnut-text" align=right><b>Πόστο:</b></td>
						<td>
							<select id="dropdown" name="posto">
								<option value="Διανομέας">Διανομέας</option>
								<option value="Μάγειρας">Μάγειρας</option>
								<option value="Ταμείο">Ταμείο</option>
								<option value="Υπέυθυνος">Υπέυθυνος</option>
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
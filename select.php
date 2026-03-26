<?php
	include("connect.php");
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Εμφάνιση Δεδομένων</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="header">
		<h1 align=center>Στοιχεία Πινάκων</h1>
	</div>
	<div>
		<h2 align=center>Υπάλληλος</h2>
		<table class="stable" border=2 align=center>
			<tr>
				<th class="tc" width=80>Αρ. Ταυτότητας</th>
				<th class="tc" width=80>Ονοματεπώνυμο</th>
				<th class="tc" width=80>Μισθός</th>
				<th class="tc" width=80>Πόστο</th>
			</tr>
			<?php
				$qry = "SELECT * FROM ipalilos WHERE katastima='K0001'";
				
				$result = mysqli_query($conn, $qry);
				
				while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
					
					echo ("<tr><td><div align=\"center\"> $row[0]</div></td>
							<td><div align=\"center\"> $row[1] </div></td>
							<td><div align=\"center\"> $row[2] </div></td>
							<td><div align=\"center\"> $row[3] </div></td></tr>");
				}
			?>
		</table>
	</div>
	<div>
		<h2 align=center>Γέυμα</h2>
		<table class="stable" border=2 align=center>
			<tr>
				<th class="tc" width=80>id</th>
				<th class="tc" width=80>Όνομα</th>
				<th class="tc" width=80>Τιμή</th>
				<th class="tc" width=80>Κατηγορία</th>
			</tr>
			<?php
				$qry = "SELECT *
						FROM geyma
						INNER JOIN katastima_geyma
						ON geyma.id=katastima_geyma.geyma
						WHERE katastima_geyma.katastima='K0001';";
				
				$result = mysqli_query($conn, $qry);
				
				while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
					
					echo ("<tr><td><div align=\"center\"> $row[0]</div></td>
							<td><div align=\"center\"> $row[1] </div></td>
							<td><div align=\"center\"> $row[2] </div></td>
							<td><div align=\"center\"> $row[3] </div></td></tr>");
				}
			?>
		</table>
	</div>
	<div>
		<h2 align=center>Παραγγελίες</h2>
		<table class="stable" border=2 align=center>
			<tr>
				<th class="tc" width=80>id</th>
				<th class="tc" width=80>Τρόπος Πληρωμής</th>
				<th class="tc" width=80>Ημερομηνία</th>
				<th class="tc" width=80>Διεύθυνση</th>
				<th class="tc" width=80>Τιμή</th>
			</tr>
			<?php
				$qry = "SELECT * FROM paraggelies WHERE katastima='K0001'";
				
				$result = mysqli_query($conn, $qry);
				
				while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
					
					echo ("<tr><td><div align=\"center\"> $row[0]</div></td>
							<td><div align=\"center\"> $row[1] </div></td>
							<td><div align=\"center\"> $row[2] </div></td>
							<td><div align=\"center\"> $row[3] </div></td>
							<td><div align=\"center\"> $row[4] </div></td></tr>");
				}
			?>
		</table>
	</div>
	<div>
		<h2 align=center>Υλικά</h2>
		<table class="stable" border=2 align=center>
			<tr>
				<th class="tc" width=80>id</th>
				<th class="tc" width=80>Όνομα</th>
				<th class="tc" width=80>Κατηγορία</th>
				<th class="tc" width=80>Ποσότητα</th>
			</tr>
			<?php
				$qry = "SELECT ylika.id, ylika.onoma, ylika.katigoria, katastima_yliko.posothta AS posotita
						FROM ylika
						INNER JOIN katastima_yliko
						ON ylika.id = katastima_yliko.yliko
						WHERE katastima_yliko.katastima='K0001';";
				
				$result = mysqli_query($conn, $qry);
				
				while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
					
					echo ("<tr><td><div align=\"center\"> $row[0]</div></td>
							<td><div align=\"center\"> $row[1] </div></td>
							<td><div align=\"center\"> $row[2] </div></td>
							<td><div align=\"center\"> $row[3] </div></td></tr>");
				}
			?>
		</table>
	</div>
</body>
</html>
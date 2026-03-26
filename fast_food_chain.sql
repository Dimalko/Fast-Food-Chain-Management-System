#Δημιουργία βάσης δεδομένων
CREATE DATABASE fast_food_chain;

#Επιλογή βασης
USE fast_food_chain;



#Δημιουργία πίνακα "κατάστημα"
CREATE TABLE katastima(
		id CHAR(5),
		poli VARCHAR(25),
		embadon FLOAT(7,2),
		dieuthinsi VARCHAR(50),
    	doy VARCHAR(35),
	PRIMARY KEY(id)
);

#Δημιουργία πίνακα "υπάλληλος"
CREATE TABLE ipalilos(
		a_t CHAR(8),
		onomateponimo VARCHAR(35),
		misthos FLOAT(7,2),
		posto VARCHAR(25),
        katastima CHAR(5) NOT NULL,
	PRIMARY KEY(a_t),
	FOREIGN KEY(katastima) REFERENCES katastima(id)
);

#Δημιουργία πίνακα "γεύμα"
CREATE TABLE geyma(
		id CHAR(4),
		onoma VARCHAR(35),
		timi FLOAT(7,2),
		katigoria VARCHAR(25),
	PRIMARY KEY(id)
);

#Δημιουργία πίνακα "προσφέρεται"
CREATE TABLE katastima_geyma(
		katastima CHAR(5),
    	geyma CHAR(4),
	PRIMARY KEY(katastima, geyma),
    FOREIGN KEY(katastima) REFERENCES katastima(id),
    FOREIGN KEY(geyma) REFERENCES geyma(id)
);



#Δημιουργία πίνακα "όχημα delivery"
CREATE TABLE oxima_delivery(
		a_k CHAR(7),
        katastasi VARCHAR(25),
    	xoritikotita int,
        odigos CHAR(8),
	UNIQUE(odigos),
	PRIMARY KEY(a_k),
	FOREIGN KEY(odigos) REFERENCES ipalilos(a_t)
);

#Δημιουργία πίνακα "παραγγελίες"
CREATE TABLE paraggelies(
		id CHAR(6),
        tropos_pliromis VARCHAR(15),
        imerominia DATETIME,
    	dieythinsi VARCHAR(35),
    	timi FLOAT(7,2),
        katastima CHAR(5),
		dianomeas CHAR(8),
	PRIMARY KEY(id),
    FOREIGN KEY(katastima) REFERENCES katastima(id),
	FOREIGN KEY(dianomeas) REFERENCES ipalilos(a_t)
);

#Δημιουργία πίνακα "περιλαμβάνουν"
CREATE TABLE paraggelia_geyma(
		paraggelia CHAR(6),
        geyma CHAR(4),
	PRIMARY KEY(paraggelia, geyma),
    FOREIGN KEY(paraggelia) REFERENCES paraggelies(id),
    FOREIGN KEY(geyma) REFERENCES geyma(id)
);

#Δημιουργία πίνακα "προμηθευτές"
CREATE TABLE promitheftes(
		id CHAR(5),
    	tilefono INT(10),
    	timi_emporeymatos FLOAT(7,2),
    	doy VARCHAR(35),
	PRIMARY KEY(id)
);

#Δημιουργία πίνακα "προμηθεύεται απο"
CREATE TABLE promitheftes_katastima(
		promitheftis CHAR(5),
        katastima CHAR(5),
	PRIMARY KEY(promitheftis, katastima),
    FOREIGN KEY(promitheftis) REFERENCES promitheftes(id),
    FOREIGN KEY(katastima) REFERENCES katastima(id)
);

#Δημιουργία πίνακα "υλικά"
CREATE TABLE ylika(
		id CHAR(4),
        onoma VARCHAR(25),
        katigoria VARCHAR(25),
	PRIMARY KEY(id)
);

#Δημιουργία πίνακα "προμηθεύουν"
CREATE TABLE promitheftes_ylika(
		promitheftis CHAR(5),
        yliko CHAR(4),
	PRIMARY KEY(promitheftis, yliko),
    FOREIGN KEY(promitheftis) REFERENCES promitheftes(id),
    FOREIGN KEY(yliko) REFERENCES ylika(id)
);

#Δημιουργία πίνακα "περιέχει"
CREATE TABLE ylika_geyma(
		geyma CHAR(4),
        yliko CHAR(4),
	PRIMARY KEY(geyma, yliko),
	FOREIGN KEY(geyma) REFERENCES geyma(id),
    FOREIGN KEY(yliko) REFERENCES ylika(id)
);

#Δημιουργία πίνακα "κατέχει"
CREATE TABLE katastima_yliko(
		katastima CHAR(5),
        yliko CHAR(4),
        posothta FLOAT(5,2),
	PRIMARY KEY(katastima, yliko),
    FOREIGN KEY(katastima) REFERENCES katastima(id),
    FOREIGN KEY(yliko) REFERENCES ylika(id)
);

#
#----Εισαγωγή στοιχείων στους πινακες----
#
INSERT INTO `katastima` (`id`, `poli`, `embadon`, `dieuthinsi`, `doy`) VALUES
('K0001', 'Καβάλα', 150.00, '25ης Μαρτίου 29', 'Καβάλας'),
('K0002', 'Καβάλα', 120.00, 'Ναυπλίου 1', 'Κβάλας'),
('K0003', 'Ξάνθη', 100.00, 'Μηχαήλ Καραολή 73', 'Ξάνθης'),
('K0004', 'Δράμα', 110.00, 'Καισαρείας 1', ' Δράμας'),
('K0005', 'Κομοτηνή', 110.00, 'Αντιγόνου 19', 'Κομοτηνής');

INSERT INTO `ipalilos` (`a_t`, `onomateponimo`, `misthos`, `posto`, `katastima`) VALUES
('ΑΜ657890', 'Κώστας Παπαδόπουλος', 880.00, 'Διανομέας ', 'K0005'),
('ΑΝ711134', 'Μηχάλης Γεοργίου', 800.00, 'Σερβιτόρος', 'K0001'),
('ΑΝ712645', 'Μπάμπης Σουγιάς', 800.00, 'Κουζίνα', 'K0003'),
('ΑΚ123455', 'Γιαννης Καραγιάννης', 800.00, 'Διανομέας','K0001'),
('ΑΟ127755', 'Μίλτος Παππάς', 800.00, 'Διανομέας','K0002'),
('ΑΛ598170', 'Ιωάννα Ιωαννου', 800.00, 'Σερβιτόρος','K0005'),
('ΑΠ094866', 'Ερμίρ Χότζα', 800.00, 'Διανομέας','K0002'),
('ΑΚ669310', 'Μαρία Παπαδοπούλου', 800.00, 'Κουζίνα', 'K0004'),
('ΑΠ997768', 'Γιώργος Παπανδρέου', 800.00, 'Διανομέας','K0003');

INSERT INTO `geyma` (`id`, `onoma`, `timi`, `katigoria`) VALUES
('G100', 'Cheese-burger', 8.00, 'burgers'),
('G101', 'Club sandwich', 9.00, 'sandwiches'),
('G102', 'Κοτομπουκές', 10.00, 'Μερίδες'),
('G103', 'Classic burger', 10.00, 'burgers'),
('G104', 'Chikies', 10.00, 'sandwiches'),
('G105', 'Γύρος χοιρινός', 10.00, 'Μερίδες');

INSERT INTO `katastima_geyma` (`katastima`, `geyma`) VALUES
('K0001', 'G100'),
('K0001', 'G102'),
('K0002', 'G100'),
('K0002', 'G102'),
('K0005', 'G102'),
('K0003', 'G103'),
('K0003', 'G105'),
('K0001', 'G103'),
('K0002', 'G103'),
('K0005', 'G104');

INSERT INTO `oxima_delivery` (`a_k`, `katastasi`, `xoritikotita`, `odigos`) VALUES
('ΙΚΜ6699', 'Ελεύθερο', 10, 'ΑΜ657890'),
('ΒΑΙ8447', 'Ελεύθερο ', 10, 'ΑΚ123455'),
('ΙΚΜ6549', 'Ελεύθερο', 10, 'ΑΟ127755'),
('ΗΜΙ9776', 'Ελεύθερο', 10, 'ΑΠ094866'),
('ΙΚΜ4433', 'Ελεύθερο', 10, 'ΑΠ997768');

INSERT INTO `paraggelies` (`id`, `tropos_pliromis`, `imerominia`, `dieythinsi`, `timi`, `katastima`) VALUES
('P01000', 'Κάρτα', '2024-11-12 19:16:03', 'Αμυνταίου 13', 9.00, 'K0001'),
('P01002', 'Μετριτά', '2024-11-12 19:30:03', 'Ομονοίας 116', 17.00, 'K0002'),
('P01003', 'Μετριτά', '2024-11-12 17:56:03', 'Αριστοτέλη Στανη 15', 29.00, 'K0002'),
('P01004', 'Κάρτα', '2024-11-12 10:58:03', 'Ναυπλίου 19', 8.00, 'K0001'),
('P01005', 'Κάρτα', '2024-11-12 18:50:03', '7ης Μεραρχίας 31', 10.00, 'K0004');

INSERT INTO `paraggelia_geyma` (`paraggelia`, `geyma`) VALUES
('P01000', 'G101'),
('P01002', 'G101'),
('P01002', 'G100'),
('P01003', 'G102'),
('P01003', 'G103'),
('P01003', 'G101'),
('P01004', 'G100'),
('P01005', 'G105');

INSERT INTO `promitheftes` (`id`, `tilefono`, `timi_emporeymatos`, `doy`) VALUES
('S2000', 69875210, 200.00, 'Καβάλας'),
('S2001', 69875212, 250.00, 'Καβάλας'),
('S2002', 69875210, 200.00, 'Αλεξανδούπολης'),
('S2003', 69875210, 200.00, 'Ξάνθης'),
('S2004', 69875210, 200.00, 'Κομοτηνής');

INSERT INTO `promitheftes_katastima` (`promitheftis`, `katastima`) VALUES
('S2001', 'K0001'),
('S2001', 'K0002'),
('S2001', 'K0003'),
('S2002', 'K0004'),
('S2000', 'K0004'),
('S2004', 'K0005'),
('S2003', 'K0005');

INSERT INTO `ylika` (`id`, `onoma`, `katigoria`) VALUES
('Y001', 'Μαρούλι', 'Λαχανικά'),
('Y002', 'Τομάτα', 'Λαχανικά'),
('Y003', 'Κιμάς', 'Κρεατικά'),
('Y004', 'Κοτόπουλο', 'Κρεατικά'),
('Y005', 'BBQ sauce', 'sauces'),
('Y006', 'Sauce μουστάρδας', 'sauces'),
('Y007', 'Burger sauce', 'sauces');

INSERT INTO `promitheftes_ylika` (`promitheftis`, `yliko`) VALUES
('S2000', 'Y001'),
('S2000', 'Y005'),
('S2001', 'Y002'),
('S2002', 'Y007'),
('S2002', 'Y006'),
('S2003', 'Y006'),
('S2004', 'Y003');

INSERT INTO `ylika_geyma` (`geyma`, `yliko`) VALUES
('G100', 'Y001'),
('G100', 'Y003'),
('G100', 'Y007'),
('G100', 'Y002'),
('G101', 'Y001'),
('G101', 'Y002'),
('G101', 'Y004');

INSERT INTO katastima_yliko (katastima, yliko, posothta) VALUES 
('K0001','Y002',20),
('K0001','Y001',20),
('K0002','Y002',20),
('K0002','Y003',20),
('K0003','Y003',20),
('K0003','Y004',20);




#----Εντολη SELECT με χρήση του τελεστή like----
SELECT a_k FROM oxima_delivery WHERE a_k LIKE 'ΙΚΜ%';

#----Εντολη SELECT οπου γίνεται φιλτράρισμα και ταξινόμηση----
SELECT * FROM geyma ORDER BY timi DESC;

#----Εντολη SELECT με χρήση του λογικού τελεστή NOT----
SELECT * FROM geyma WHERE NOT (katigoria = 'Μερίδες');

#----Εντολη SELECT με χρήση της συναθροιστικής συνάρτησης COUNT----
SELECT katastima,COUNT(*) FROM paraggelies GROUP BY katastima;

#----Εντολη SELECT με χρήση της συναθροιστικής συνάρτησης ΜΑΧ----
SELECT MAX(timi), katastima FROM paraggelies GROUP BY katastima;



#----Εντολές INNER JOIN----
/*
ενώνει τους πίνακες ipalilos και oxima_delivery
και εμφανίζει το όνομα των υπαλλήλων που έχουν όχημα delivery
καθώς και το όχημά τους
*/
SELECT ipalilos.onomateponimo, oxima_delivery.a_k
FROM ipalilos
INNER JOIN oxima_delivery 
ON ipalilos.a_t=oxima_delivery.odigos;

/*
ενώνει τους πίνακες geyma, ylika, και ylika_geyma
και εμφανίζει το όνομα του γεύματος και το ονομα των υλικών που περιέχει
*/
SELECT geyma.onoma, ylika.onoma
FROM ((ylika_geyma
INNER JOIN geyma 
ON geyma.id = ylika_geyma.geyma)
INNER JOIN ylika 
ON ylika.id = ylika_geyma.yliko);

/*
ενώνει τους πίνακες katastima, geyma και katastima_geyma
και εμφανίζει τα γευματα που προσφερονται σε καθε καταστημα,
και την διευθυνση του κατστηματος 
*/
SELECT katastima.dieuthinsi AS dieuthinsi, 
geyma.onoma AS geyma 
FROM katastima_geyma 
INNER JOIN katastima 
ON katastima_geyma.katastima = katastima.id 
INNER JOIN geyma 
ON katastima_geyma.geyma = geyma.id 
ORDER BY katastima.dieuthinsi, geyma.onoma;



#----Εντολές LEFT JOIN----
/*
ενώνει τους πίνακες ipalilos και oxima_delivery
και εμφανίζει όλους τους υπαλλήλους 
καθώς και το όχημά τους (σε όποιον υπάλληλος διαθέτει)
*/
SELECT ipalilos.onomateponimo, oxima_delivery.a_k
FROM ipalilos
LEFT JOIN oxima_delivery 
ON ipalilos.a_t = oxima_delivery.odigos;

/*
βρισκει τα καταστηματα που δεν προσφερουν κανενα φαγητο 
και εμφανιζει την πολη τους
*/
SELECT katastima.poli 
FROM katastima 
LEFT JOIN katastima_geyma 
ON katastima.id = katastima_geyma.katastima 
WHERE katastima_geyma.geyma IS NULL;



#----Εντολές CREATE VIEW----
/*
εμφανιζει τη διεύθυνση του καταστήματος, το όνομα του υπαλλήλου 
και τον αριμθο κυκλοφοριας του χοματος του υπαλληλου
*/
CREATE VIEW stoixia AS
SELECT katastima.dieuthinsi, ipalilos.onomateponimo, oxima_delivery.a_k
FROM katastima, ipalilos, oxima_delivery
WHERE katastima.id=ipalilos.katastima AND ipalilos.a_t=oxima_delivery.odigos;

SELECT * FROM stoixia;


/*

*/
CREATE VIEW paraggelies_stoixia AS
SELECT paraggelies.id, paraggelies.timi, katastima.poli, ipalilos.onomateponimo
FROM paraggelies
JOIN katastima 
ON paraggelies.katastima = katastima.id
JOIN ipalilos 
ON katastima.id = ipalilos.katastima
WHERE ipalilos.posto = 'Διανομέας';
    
SELECT * FROM paraggelies_stoixia;



#----Εντολές CREATE PROCEDURE----
/*
βρίσκει και εμφανίζει τον υπαλληλο 
με βαση τον αριθμό ταυτότητας που αναζητείτε
*/
DELIMITER $$
CREATE PROCEDURE vres_ipalilo(IN a_t_ipalilou CHAR(8))
BEGIN
	SELECT * 
    FROM ipalilos
    WHERE a_t = a_t_ipalilou;
END$$
DELIMITER ;

CALL vres_ipalilo("ΑΚ123455");



#----Εντολές CREATE TRIGGER----
/*
διαγράφει τα δεδομένα απο τον πίνακα paraggelia_geyma
πρίν διαγράψει την συσχετιζόμενη παραγγελία απο τον πίνακα paraggelies
*/
DELIMITER $$
CREATE TRIGGER diagrafi_paraggelias
BEFORE DELETE ON paraggelies 
FOR EACH ROW
BEGIN
    DELETE FROM paraggelia_geyma WHERE OLD.id=paraggelia;
END$$
DELIMITER ;

DELETE FROM paraggelies where ID = "P01002";


/*
Αποτρεπει την εισαγωγη νεας παραγγελειας 
που η τιμη της ειναι κατω απο 5 ευρω με χρηση trigger 
*/
DELIMITER $$
CREATE TRIGGER Checktimi
BEFORE INSERT ON paraggelies
FOR EACH ROW
BEGIN
    IF NEW.timi < 5 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Η ελάχιστη τιμή παραγγελίας πρέπει να είναι τουλάχιστον 5 ευρώ';
    END IF;
END$$
DELIMITER ;


/*

*/
DELIMITER $$
CREATE TRIGGER before_delete_ipalilos
BEFORE DELETE ON ipalilos
FOR EACH ROW
BEGIN
    -- Έλεγχος αν το πόστο του υπαλλήλου είναι "Διανομέας"
    IF OLD.posto = 'Διανομέας' THEN
        -- Διαγραφή των εγγραφών από τον πίνακα oxima_delivery που σχετίζονται με τον υπάλληλο
        DELETE FROM oxima_delivery WHERE odigos = OLD.a_t;
    END IF;
END $$
DELIMITER ;

/*

*/
DELIMITER $$
CREATE TRIGGER elegxos_dianomea
BEFORE INSERT ON paraggelies
FOR EACH ROW
BEGIN
    -- Έλεγχος αν το πόστο του υπαλλήλου είναι 'Διανομέας' πριν την εισαγωγή παραγγελίας
    IF (SELECT posto FROM ipalilos WHERE a_t = NEW.dianomeas) = 'Διανομέας' THEN
        -- Αν το πόστο είναι "Διανομέας", ακυρώνουμε την εισαγωγή
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Ο διανομέας δεν μπορεί να έχει παραγγελία.';
    END IF;
END $$
DELIMITER ;



DELIMITER $$
#---Trigger για τον πίνακα katastima_geyma
CREATE TRIGGER before_delete_geyma_katastima
BEFORE DELETE ON geyma
FOR EACH ROW
BEGIN
    DELETE FROM katastima_geyma WHERE geyma = OLD.id;
END$$

DELIMITER ;




DELIMITER $$
#---Trigger για τον πίνακα paraggelia_geyma---
CREATE TRIGGER before_delete_geyma_paraggelia
BEFORE DELETE ON geyma
FOR EACH ROW
BEGIN
    DELETE FROM paraggelia_geyma WHERE geyma = OLD.id;
END$$

DELIMITER ;



DELIMITER $$

#---Trigger για τον πίνακα katastima_yliko--- 
CREATE TRIGGER before_delete_ylika_katastima_yliko
BEFORE DELETE ON ylika
FOR EACH ROW
BEGIN
    DELETE FROM katastima_yliko WHERE yliko = OLD.id;
END$$

DELIMITER ;

DELIMITER $$

#---Trigger για τον πίνακα ylika_geyma---
CREATE TRIGGER before_delete_ylika_ylika_geyma
BEFORE DELETE ON ylika
FOR EACH ROW
BEGIN
    DELETE FROM ylika_geyma WHERE yliko = OLD.id;
END$$

DELIMITER ;


DELIMITER $$
#---Trigger για τον πίνακα promitheftes_ylika---
CREATE TRIGGER before_delete_ylika_promitheftes_ylika
BEFORE DELETE ON ylika
FOR EACH ROW
BEGIN
    DELETE FROM promitheftes_ylika WHERE yliko = OLD.id;
END$$

DELIMITER ;




#----Εντολή insert για δοκιμη του TRIGGER Checktimi----
INSERT INTO paraggelies (id, tropos_pliromis, imerominia, dieythinsi, timi, katastima)
VALUES ('P01008', 'Κάρτα', '2024-11-20 15:00:00', 'Παπαναστασίου 10', 4.00, 'K0001');
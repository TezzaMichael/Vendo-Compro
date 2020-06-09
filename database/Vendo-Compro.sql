-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Giu 09, 2020 alle 15:35
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Vendo-Compro`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Prodotto`
--

CREATE TABLE `Prodotto` (
  `Codice_prodotto` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `Modalità` enum('Vendo','Compro','Scambio','Regalo') NOT NULL,
  `Nome_prodotto` varchar(30) NOT NULL,
  `tipo` enum('Elettronica','Abbigliamento','Casa','Giardinaggio','Sport','Auto e Moto','Giocattoli') NOT NULL,
  `condizioni` enum('Nuovo','Come_nuovo','Usato','Danneggiato','Ricondizionato') NOT NULL,
  `disponibilità` enum('si','no') NOT NULL,
  `descrizione` text NOT NULL,
  `costo` decimal(10,0) NOT NULL,
  `immagine` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Prodotto`
--

INSERT INTO `Prodotto` (`Codice_prodotto`, `id_utente`, `Modalità`, `Nome_prodotto`, `tipo`, `condizioni`, `disponibilità`, `descrizione`, `costo`, `immagine`) VALUES
(1, 1, 'Vendo', 'iPhone 4s', 'Elettronica', 'Ricondizionato', 'si', 'Vendo iPhone 4s ricondizionato con la sua originale versione iOS.\r\nCome da immagine è in buone condizioni.\r\nIl prezzo non è trattabile.', '440', 'iphone4s.jpg'),
(2, 1, 'Vendo', 'Alfa Romeo MiTo 2012', 'Auto e Moto', 'Usato', 'si', 'Guidabile per neopatenati\r\nStato\r\nTipo di veicolo:Usato\r\nTagliandi certificati\r\nVeicolo per non fumatori\r\n\r\nCaratteristiche\r\nMarca: Alfa Romeo\r\nModello:MiTo\r\nAnno:2012\r\nColore esterno: Rosso\r\nPorte: 3\r\nPosti a sedere:4\r\n\r\nMotore e Trazione\r\nTipo di cambio: Manuale\r\nCilindrata: 1.368 cm³\r\nCilindri: 4\r\nTipo di unità: anteriore', '10000', 'alfaromeo.jpg'),
(3, 1, 'Scambio', 'Maglia Fila', 'Abbigliamento', 'Danneggiato', 'si', 'Scambio Maglietta un pò danneggiata, ha un piccolo buco dietro', '0', 'magliaia.jpg'),
(4, 1, 'Compro', 'Divano nero', 'Casa', 'Come_nuovo', 'si', 'Compro Divani neri per il soggiorno.\r\nSe possibile cerco simili a quelli in figura.', '0', 'divanonero.jpg'),
(5, 1, 'Vendo', 'Fascia Nike bianca', 'Sport', 'Usato', 'si', 'Vendo Fascia Nike bianca utile per capelli e per impedire alle gocce di sudore di arrivare agli occhi', '5', 'fascianike.jpg'),
(6, 2, 'Vendo', 'Monopoly', 'Giocattoli', 'Nuovo', 'si', 'Vendo Monopoly mai usato prima\r\nVersione Verona', '30', 'monopolyverona.jpg'),
(7, 2, 'Vendo', 'Tagliaerba', 'Giardinaggio', 'Come_nuovo', 'si', 'Vendo Tagliaerba usato molto poco.\r\nlo vendo perché sono passato a uno più grande.\r\n', '300', 'tagliaerba.jpg'),
(8, 2, 'Vendo', 'MacBook Air 2019', 'Elettronica', 'Usato', 'si', 'Spettacolare display Retina da 13,3\" con tecnologia True Tone\r\nMagic Keyboard retroilluminata e Touch ID\r\nProcessore Intel Core i3 di decima generazione\r\nIntel Iris Plus Graphics\r\nArchiviazione SSD veloce\r\n8GB di memoria\r\nAltoparlanti con un suono stereo più ampio\r\nDue porte Thunderbolt 3 (USB‑C)\r\nFino a 11 ore di autonomia\r\nTrackpad Force Touch', '800', 'MacBook.jpg'),
(9, 3, 'Vendo', 'Calze adidas', 'Abbigliamento', 'Nuovo', 'no', 'Vendo Calze Adidas non usate\r\nModello Bianco \r\nTaglia Unique\r\nofferta 3x2 ', '7', 'calzeadidas.jpg'),
(10, 3, 'Vendo', 'macchina del caffè', 'Casa', 'Usato', 'si', 'Vendo macchina del caffè Lavazza con 20 cialde,\r\nla macchina è usata ma funziona benissimo e fa un buon caffè.\r\n', '25', 'macchinalavazza.jpg'),
(11, 3, 'Vendo', 'Bosch Home and Garden ', 'Giardinaggio', 'Come_nuovo', 'si', 'Trapano battente da 701 Watt\r\nMandrino autoserrante da 13 mm Press&Lock\r\nØ foro: 30 mm/legno, 12 mm/acciaio, 14 mm/calcestruzzo\r\nCoppia di serraggio max 17 Nm, preselazione n° di giri, 50-3000 giri/min, n° 45.000 colpi/min', '50', 'trapano.jpg'),
(12, 4, 'Vendo', 'Scarpe chiodate Nike Superfly', 'Sport', 'Usato', 'si', 'Vendo scarpe chiodate per velocità\r\nle scarpe sono usate ma comunque in buone condizioni', '60', 'superfly.jpg'),
(13, 4, 'Vendo', 'Ducati Hyperstrada 939', 'Auto e Moto', 'Danneggiato', 'si', 'Accessori: Borse laterali Cupolino carbonio\r\nTipo offerta: Passaggio di proprietà a carico dell\'acquirente\r\nNorma antinquinamento: Euro 4\r\nIncidentata: No\r\nCilindrata: 939 cc\r\nProprietari: 2\r\nColore: ROSSA\r\nCondizioni gomme ant. 90% post. 90%\r\nScadenza bollo	marzo 2021\r\nDepotenziata: No\r\nSolo uso pista: No\r\nABS: Si\r\nSpecial: No\r\nElettrica: No ', '9500', 'ducati.jpg'),
(14, 4, 'Vendo', 'Goku Super Sayan Blue', 'Giocattoli', 'Nuovo', 'si', 'Figura con dettagli di alto livello\r\nAltezza: 30 cm.\r\nArrotolato su braccia e testa.\r\nDa collezione', '30', 'goku.jpg'),
(15, 4, 'Regalo', 'Mascherina Italia', 'Abbigliamento', 'Nuovo', 'si', 'Regalo mascherine dell\'Italia lavabili per solidarietà. L\'Italia non si deve fermare.\r\n', '0', 'italia.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `Genere` enum('Maschio','Femmina','Altro') NOT NULL,
  `Data_di_nascita` date NOT NULL,
  `Luogo_di_nascita` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `telefono` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`Id`, `Nome`, `Cognome`, `Genere`, `Data_di_nascita`, `Luogo_di_nascita`, `email`, `password`, `telefono`) VALUES
(1, 'Michael', 'Tezza', 'Maschio', '2000-08-09', 'Verona', 'michael@gmail.com', '123456789', '1234567890'),
(2, 'Gino', 'Pino', 'Maschio', '1971-04-01', 'Mantova', 'ginoilpino@gmail.com', '0102030405', '1230123012'),
(3, 'Maria', 'Contini', 'Femmina', '1971-09-08', 'Milano', 'mariacontini@gmail.com', '1234567890', '0450450123'),
(4, 'Federica', 'Trecca', 'Femmina', '2001-04-08', 'Gallipoli', 'federicatrecca@gmail.com', '1231230202', '0120120121');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Prodotto`
--
ALTER TABLE `Prodotto`
  ADD PRIMARY KEY (`Codice_prodotto`),
  ADD KEY `id_utente` (`id_utente`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Prodotto`
--
ALTER TABLE `Prodotto`
  MODIFY `Codice_prodotto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `Prodotto`
--
ALTER TABLE `Prodotto`
  ADD CONSTRAINT `Prodotto_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utenti` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

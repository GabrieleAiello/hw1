-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 05, 2024 alle 10:53
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homework`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `id_carrello` int(11) NOT NULL,
  `proprietario` int(11) NOT NULL,
  `prodotto` int(11) NOT NULL,
  `quantità` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `carrello`
--

INSERT INTO `carrello` (`id_carrello`, `proprietario`, `prodotto`, `quantità`) VALUES
(63, 34, 10, 2),
(65, 35, 9, 1),
(68, 35, 8, 1),
(70, 34, 8, 5),
(71, 34, 9, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `likes`
--

CREATE TABLE `likes` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `likes`
--

INSERT INTO `likes` (`user_id`, `product_id`, `product_title`) VALUES
(34, 10, 'Classic Blue Baseball Cap'),
(34, 11, 'Classic Red Baseball Cap'),
(34, 44, 'Classic Blue Suede Casual Shoes'),
(35, 8, 'Classic Red Jogger Sweatpants'),
(35, 9, 'Classic Navy Blue Baseball Cap'),
(35, 11, 'Classic Red Baseball Cap');

-- --------------------------------------------------------

--
-- Struttura della tabella `preferiti`
--

CREATE TABLE `preferiti` (
  `id_preferito` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `ID_Prodotto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `preferiti`
--

INSERT INTO `preferiti` (`id_preferito`, `ID_User`, `ID_Prodotto`) VALUES
(187, 35, 9),
(191, 35, 8),
(194, 34, 8);

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `id_prodotto` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `immagine` varchar(255) NOT NULL,
  `prezzo` float NOT NULL,
  `quantità` int(11) NOT NULL,
  `descrizione` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`id_prodotto`, `nome`, `immagine`, `prezzo`, `quantità`, `descrizione`) VALUES
(8, 'Nike Air Force 1 \'07', 'immagini/Scarpa1.png', 119, 1, 'Scarpa - Uomo'),
(9, 'Nike Air Force 1 LE', 'immagini/Scarpa2.png', 94, 1, 'Scarpa - Ragazzi\r\n'),
(10, 'Nike Dunk Low', 'immagini/Scarpa3.png\r\n', 69, 1, 'Scarpa - Bambini');

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `cognome` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confermaPassword` varchar(25) NOT NULL,
  `PreferenzaAcquisto` varchar(25) NOT NULL,
  `DataNascita` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`id`, `email`, `nome`, `cognome`, `password`, `confermaPassword`, `PreferenzaAcquisto`, `DataNascita`) VALUES
(34, 'gabriele.aiello@gmail.com', 'Gabriele', 'Aiello', '$2y$10$NJ0v3huXVLAnI8dULs9EzuuyrUeleC73sG4UA/pE6JUKSHeyRA53i', '$2y$10$UMcXiM0zFVYySN/AzH', 'Uomo', '2024-05-16'),
(35, 'luigi@gmail.com', 'luigi', 'rizzo', '$2y$10$/GDqijZF1D2YacSADzZKNO4a4TGq2AMwA9/4aH2xWRtzdPyomRgPS', '$2y$10$hAwcLbet/2G2Z6yPnt', 'Uomo', '2024-06-03');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`id_carrello`),
  ADD KEY `fkprodotto` (`prodotto`),
  ADD KEY `fkproprietario` (`proprietario`);

--
-- Indici per le tabelle `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`user_id`,`product_id`);

--
-- Indici per le tabelle `preferiti`
--
ALTER TABLE `preferiti`
  ADD PRIMARY KEY (`id_preferito`),
  ADD KEY `fk_User` (`ID_User`),
  ADD KEY `fk_Prodotto` (`ID_Prodotto`);

--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`id_prodotto`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `carrello`
--
ALTER TABLE `carrello`
  MODIFY `id_carrello` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT per la tabella `preferiti`
--
ALTER TABLE `preferiti`
  MODIFY `id_preferito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `id_prodotto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `fkprodotto` FOREIGN KEY (`prodotto`) REFERENCES `prodotto` (`id_prodotto`),
  ADD CONSTRAINT `fkproprietario` FOREIGN KEY (`proprietario`) REFERENCES `user` (`id`);

--
-- Limiti per la tabella `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_utente` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Limiti per la tabella `preferiti`
--
ALTER TABLE `preferiti`
  ADD CONSTRAINT `fk_Prodotto` FOREIGN KEY (`ID_Prodotto`) REFERENCES `prodotto` (`id_prodotto`),
  ADD CONSTRAINT `fk_User` FOREIGN KEY (`ID_User`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

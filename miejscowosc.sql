SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `eternis`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `miejscowosc`
--

CREATE TABLE `miejscowosc` (
  `id` int(11) NOT NULL,
  `miejscowosc` text COLLATE utf8_unicode_ci NOT NULL,
  `kiedy` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `miejscowosc`
--

INSERT INTO `miejscowosc` (`id`, `miejscowosc`, `kiedy`) VALUES
(1, 'Borek', '2024-01-08'),
(2, 'Kąkolówka', '2024-01-11'),
(3, 'Lecka', '2024-01-12'),
(4, 'Wesoła', '2024-01-20'),
(5, 'Rzeszów', '2024-01-22'),
(6, 'Hyżne', '2024-01-25'),
(7, 'Borek', '2024-01-26'),
(8, 'Piątkowa', '2024-02-01'),
(9, 'Racławówka', '2024-02-04'),
(10, 'Borek', '2024-02-06'),
(11, 'Tyczyn', '2024-02-06'),
(12, 'Wesoła', '2024-02-07'),
(13, 'Borek', '2024-02-09'),
(14, 'Wesoła', '2024-02-10'),
(15, 'Kąkolówka', '2024-02-14'),
(16, 'Harta', '2024-02-18'),
(17, 'Pawłokoma', '2024-02-19'),
(18, 'Szklary', '2024-02-19'),
(19, 'Borek', '2024-02-22');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `miejscowosc`
--
ALTER TABLE `miejscowosc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `miejscowosc`
--
ALTER TABLE `miejscowosc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=398;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


--
-- Database: `todo`
--

-- --------------------------------------------------------

--
--  table `task`
--

CREATE TABLE `task` (
  `id` int(10) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

INSERT INTO `task` (`id`, `title`) VALUES
(1, 'Young Adult'),
(2, 'Unsaid, The'),
(3, 'Himizu'),
(4, 'Island'),
(5, 'Speed Zone! (a.k.a. Cannonball Run III)'),
(6, 'TV Set, The'),
(7, 'Farewell to Matyora'),
(8, 'Dark Knight Rises, The'),
(9, 'Zero Degrees of Separation'),
(10, 'Tiger of Eschnapur, The (Tiger von Eschnapur, Der)');

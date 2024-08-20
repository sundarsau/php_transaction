CREATE TABLE `emp_salaries` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `basic` int(11) NOT NULL,
  `allowance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `emp_salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`);

ALTER TABLE `emp_salaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `emp_salaries`
  add FOREIGN KEY(`emp_id`) REFERENCES `employees` (`id`);

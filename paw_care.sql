

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `adoption_request` (
  `userSno` int(255) NOT NULL,
  `rescuedId` int(11) NOT NULL,
  `requested_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_approve` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE appointments
ADD COLUMN approved TINYINT(1) DEFAULT 0;


INSERT INTO `adoption_request` (`userSno`, `rescuedId`, `requested_at`, `admin_approve`) VALUES
(8, 20, '2023-11-27 07:14:34', 0),
(9, 20, '2023-11-27 07:17:03', 0),
(9, 20, '2023-11-27 07:51:05', 0),
(9, 21, '2023-11-27 08:46:26', 0),
(9, 22, '2023-11-27 10:06:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(255) NOT NULL,
  `pet_name` varchar(255) NOT NULL,
  `pet_owner_name` varchar(255) NOT NULL,
  `phone_number` int(255) NOT NULL,
  `appointment_type` varchar(255) NOT NULL,
  `preferred_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `pet_name`, `pet_owner_name`, `phone_number`, `appointment_type`, `preferred_date`) VALUES
(36, 'shubash', 'dewan', 1746357501, 'Grooming', '2023-11-07 19:02:00'),
(37, 'shubash', 'dewan', 1746357501, 'Neuter/Spay', '2023-11-11 19:03:00'),
(38, 'shubash', 'dewan', 1746357501, 'Grooming', '2023-11-01 19:28:00'),
(39, 'shubash', 'dewan', 1746357501, 'Nail Clipping', '2023-11-14 19:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `field` varchar(100) DEFAULT NULL,
  `credentials` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `field`, `credentials`, `description`, `contact`, `photo`) VALUES
(1, 'Dr. Ayesha Rahman\r\n\r\n', 'Veterinary Surgery', 'DVM, PhD in Veterinary Medicine', 'Dr. Rahman specializes in advanced surgical procedures for animals, with a focus on orthopedic and soft tissue surgeries. She has extensive experience in both clinical practice and research, contributing significantly to innovative surgical techniques for', 'Email: drayesha@pawcare.com | Phone: +880-123-456789', 'image/doctor5.jpg'),
(2, 'Dr. Farhan Khan\r\n\r\n', 'Veterinary Cardiology', 'DVM, MS in Veterinary Cardiology', 'Dr. Khan is a dedicated veterinary cardiologist known for his expertise in diagnosing and treating heart conditions in animals. He has a passion for educating pet owners about heart health and preventive measures for their furry companions.', 'Email: drfarhan@pawcare.com | Phone: +880-987-654321', 'image/doctor6.jpg'),
(3, 'Dr. Sabrina Islam\r\n\r\n', 'Animal Behavior and Psychology', 'DVM, Certified Animal Behaviorist', 'Dr. Islam specializes in understanding and modifying animal behavior, helping pet owners address behavioral issues in their pets through positive reinforcement and behavioral therapy. She conducts seminars and workshops to promote a deeper understanding o', 'Email: drsabrina@pawcare.com | Phone: +880-234-567890', 'image/doctor1.jpg'),
(4, 'Dr. Karim Ahmed\r\n\r\n', 'Exotic Animal Medicine', 'DVM, Exotic Animal Medicine Certification', 'Dr. Ahmed has a keen interest in exotic pets and their unique medical needs. He provides specialized care and treatment for various exotic species, including reptiles, birds, and small mammals, emphasizing their specific dietary and environmental requirem', 'Email: drkarim@pawcare.com | Phone: +880-345-678901', 'image/doctor2.jpg'),
(5, 'Dr. Imran Ahmed\r\n\r\n', 'Wildlife Medicine', 'DVM, MSc in Wildlife Conservation', 'Dr. Ahmed is a passionate wildlife veterinarian dedicated to the health and conservation of wild animals. He actively participates in field research and rescue missions, focusing on the intersection of veterinary medicine and wildlife conservation efforts', 'Email: drimran@pawcare.com | Phone: +880-567-890123', 'image/doctor3.jpg'),
(6, 'Dr. Riaz Khan', 'Small Animal Dentistry', 'DVM, Advanced Certification in Veterinary Dentistry', 'Dr. Khan specializes in small animal dentistry, promoting oral health in pets through preventive care and advanced dental procedures. He is committed to educating pet owners about the importance of dental hygiene for their furry friends.', 'Email: drriaz@pawcare.com | Phone: +880-789-012345', 'image/doctor4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rescue`
--

CREATE TABLE `rescue` (
  `id` int(11) NOT NULL,
  `rescuer_name` varchar(255) NOT NULL,
  `animal_type` varchar(50) NOT NULL,
  `found_area` varchar(100) NOT NULL,
  `additional_info` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `imagePath` varchar(255) DEFAULT NULL,
  `admin_ver` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rescue`
--

INSERT INTO `rescue` (`id`, `rescuer_name`, `animal_type`, `found_area`, `additional_info`, `created_at`, `imagePath`, `admin_ver`) VALUES
(21, 'Tamzid', 'Cat', 'Dhaka', 'I want to kill it', '2023-11-27 08:35:14', 'uploads/656454c2667c5.jpg', 1),
(22, 'rifat', 'Cat', 'Barishal', 'I fakfj', '2023-11-27 10:03:29', 'uploads/65646971b365d.jpg', 1),
(23, 'Neel', 'Dog', 'Barishal', 'hrdh', '2023-11-27 10:05:07', 'uploads/656469d317467.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` int(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `email`, `password`, `role`) VALUES
(7, 'mdasadsunny@gmail.com', 123456, 'user'),
(8, 'R@gmail.com', 123456, 'user'),
(9, 'death@gmail.com', 123456, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rescue`
--
ALTER TABLE `rescue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rescue`
--
ALTER TABLE `rescue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

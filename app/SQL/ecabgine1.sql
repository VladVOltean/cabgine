-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 10:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecabgine1`
--

-- --------------------------------------------------------

--
-- Table structure for table `analysis`
--

CREATE TABLE `analysis` (
  `id_analysis` int(4) NOT NULL,
  `analysis_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `analysis`
--

INSERT INTO `analysis` (`id_analysis`, `analysis_name`) VALUES
(2, 'Ammioncentesis culture'),
(3, 'ASAT, ALAT, Bilirubine'),
(6, 'Chorionic villus sampling(CVS)'),
(11, 'Genetic carrier screening'),
(9, 'Glucose tolerance test'),
(12, 'Group B strep culture'),
(8, 'hCG, Estriol, Inhibin'),
(5, 'Ionogram'),
(7, 'IP, INR, TQ, APTT'),
(1, 'Urea and creatinine');

-- --------------------------------------------------------

--
-- Table structure for table `cabinet`
--

CREATE TABLE `cabinet` (
  `id_cabinet` int(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `logo` blob NOT NULL,
  `image_path` varchar(150) NOT NULL,
  `address` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `tax_identification_code` varchar(10) NOT NULL,
  `trade_register_number` varchar(15) NOT NULL,
  `IBAN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cabinet`
--

INSERT INTO `cabinet` (`id_cabinet`, `name`, `logo`, `image_path`, `address`, `telephone`, `email`, `tax_identification_code`, `trade_register_number`, `IBAN`) VALUES
(1, 'Gine3', 0x89504e470d0a1a0a0000000d494844520000001100000036080600000021c472740000077949444154488985575b6c9c4715fee6f2ef35be3bf16dbd761a27769226694249930a520941910a3c504094072005c4453c20da075e1054880768c545889ba8848810a40204aa5a0550519ba62d692155139138f7d85e3b1b7bedddb5bddef5eeffcfcc41331bdb6bef263dd291f75fcfffcd3767cef9ce59a60a45d4191730e974bf99cbb7999b99a3e6c6c4e3acb9e9697968ff8f215805e500a15ddb01ce0122702c57b0cecb15a0548af8afbcf927cae6f77bfb869fe05b934f527ee149f5df73afd3e2d23626c5ba6d3995caa875040aeaecc52fa050ec163d5b8e53a902b629fe5bf9c0fe03542a2bfff5336f901fec440d10e752a0d61901fadad897f83dc9bff3be6e9fb53681c722609e4c79470e7e40b4b5ce046f9d7d810ac51670560531c52256bd548229143aa85cd9c17cffbcbe70153493056b6d06cd2f6ec26211dea1fd1f41a9d45b39f5e60f109280c721d5647aed7016d85013406104daa78525a0a5195828dcaf6e4cfc9102c5bcbd238fc9fb767d43bd7dfe37c1eef19fb2e6a6cb9cc763d8e0018888c25e8cf56c064acbd0d3b30fd172793b8886d495b163a23ff137c42259fdbf4b9fc7fc22b8dc96c49a0f40de939c05e339168d0c8be141f0ae0e88eecdff76d7290468a9b89b2a95413198f88bcee43e8a58947393c963d56772a0f982cf3bdacee8f1c9f79b8b63366c10fb76bd25bab6bc003f0031063d9db99fc5a26f50b1b8c3a4529d5cb435a3d6797b2be460ffef4d767e0f49f9304ff4581cc33b5bbfca3cf12ad706a2b36d947776ccc20fc2acbd6350eaf9c2bac42130b0ce8ee7c5968ef3c1e9b79f35d9fc8332d97d93499116435b1f86d2df32c5e53e003e11c1dccaf430359bad4f7bcf831e9f3aec9f78f91484b81e3ebcff2bf042af9a42117cb0afd73f71f21488961004fb44b2f7a80463f52064c05a369d16db063e6152e9e7fcd3ef9c64adadff642df1974c7a7a27f9fe361b641b6c2a2d47999acbd583080e339787b9360e168bee0e46af3d85c5c227610824a5fbbf33a520776eff0caf47a831638070e882e8effe54e8d0813daca3ed846559939d4a24b65cb83b88354380d2c0a6d879efc1f73cca3b3b5e83d6b0ce9ae3ef30e15de28e5a23e77cb5146c6e58ea4cca8ae8ef79a60aac2047867e87444f20696ebe7e77ce400b852a8b40830bcf2522a6b396c11c630c2c1e9b94435b9fb3bb48526a3d80ddb5ac40e90c58733344a21be43b168027a146afeea14a05a2bfe74593cbe530ad20118bd68304019ce8843cc068d8978834502937e9b1d437890bb02d1dd7b895083f80b41a59672bdfb9bf0c542a81b215a9276e3e6b0ac51166c5480acd2c0129f1eeb763930aac535d1d3b6e66b39f764264c1c36185580cd6e55d01a48099cb7d30f8cfd95f50c5df6177c56d92dcf3b210125c98bb8078127a62eaeb667cea27c498e70056c2e6793057c6b2c6aaa221d4d78e7db68be6f24fe8b1d48fece78d6b8873627d5d5984c3ee68928acb750c687cf2513d31d510c0bec4849863dd9b532c1a71c5baee7618e730b3b95e756ef4e72e6b1b55b831604df114b2f93cd9f477a1eb6cbd8d503dabbe70f9db14e81e84438d63650c786bd31991ecd52e9f2cc84a0372e59f9d1fd2e3539f43d8bb63bc5def4df4fc8b5676b62034bfe44411a110d4e895a3a454dc7e6e0c60c0a2918c1c4cbce212cdd06d2636268c81ca9590999af978ed55d699d210c9bebf42c8aca9b9104985a5aacc154bbba9b83cbcaa5a0d8d05e86cff75309506f49a3849d6d6ec02aab2f903a49480b8c3517c1f6220714cf6769dab0674ede6a4be7ca3ca2493dd5bad93c63702cf9b0c1f39fc1ddede5255ba1a93dede9db0355079e954b27145c352d7dec17d5f4638748b4acbd8b84e92d50dc94186ba1ab2087c8864e2fb7264e81f5429838ca95b22295fb0e5cea074a82e43fd00a2adf544e8a183df035f29dffac04b0806a72a0ceb392a0d168b8c7b1f7adf17d1b4c9a001833526dcb34c6c59ad5f45c697efddf738ebeb9eb68cee1874c7c40e696c43407d1ff2dee11fca3d2327ed90f36e2679c431b115ac1c94e5148d5c9223434f53a1e484faae4668a06c8182d83e780c649628d7a04faf98ed3d4eb025a429f92e4fc818cf4d27826b399078995bd59277ae66dbafcc420122d16599d878ea2a2f72ad60414f67264c6ebe2ea9dcb3ad2ddb8f7c059dc942247b2069d115a0644a872d06188c99c99a46b28868a43aa50681655c4d7f66dbe85cdef6de30948a3a8152a645ecde91e06d2db3ee452297a54c29f76852693057f96cb592b9957d33792b4cbe1f07e320ad3d733df559dbb42d4b5201ccccacd5deeace0dea8b7b870f40debb230aade32e2e6e5e4b7d4d4da63f66f2393bb75a75c7aa8c36306e770763fd20d6ece260e711c123c19973c74d26fb98eb2d777ebfca049e80c92f2449056b4b2d3021aec76ffec15c9ff8ae8b5e83c25b03b1038defdf878d47b5ac4221ae2e5e7f4a5db8fa2295ca23ee6a1bf42289a532cccd99076a7f04adb3700826977fc42c2c1e92e5f2334cc85f42f0c575fb552edf3854f9f389d3cc4ac25dcd5e7f604789346b8aff8ac5a2cf332015fef09182c4ccec801cdef63316096d98bb6ab702a81218085686315110b533f0475853fc1a947eedfff521a5e9b5da42020000000049454e44ae426082, '', 'str. Short Martin no. 18', '0364812623', 'gine3@office.com', 'Ro123456', 'J12/123456/2000', 'RO4231BCR1781');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id_city` int(4) NOT NULL,
  `id_county` int(4) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id_city`, `id_county`, `city`) VALUES
(1, 1, 'Cluj-Napoca'),
(2, 2, 'Alba-Iulia');

-- --------------------------------------------------------

--
-- Table structure for table `consult`
--

CREATE TABLE `consult` (
  `id_consult` int(4) NOT NULL,
  `id_user` int(4) NOT NULL,
  `id_patient` int(4) NOT NULL,
  `date` datetime NOT NULL,
  `udate` date NOT NULL,
  `last_period` date NOT NULL,
  `climax` tinyint(4) NOT NULL,
  `menstrual_cycle` text NOT NULL,
  `births` int(2) NOT NULL,
  `abortions` int(2) NOT NULL,
  `antecedents` text NOT NULL,
  `consult_reason` varchar(100) DEFAULT NULL,
  `observations` text DEFAULT NULL,
  `diagnosis` varchar(100) NOT NULL,
  `recommendations` text DEFAULT NULL,
  `treatment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consult`
--

INSERT INTO `consult` (`id_consult`, `id_user`, `id_patient`, `date`, `udate`, `last_period`, `climax`, `menstrual_cycle`, `births`, `abortions`, `antecedents`, `consult_reason`, `observations`, `diagnosis`, `recommendations`, `treatment`) VALUES
(147, 10, 1, '2021-03-02 15:37:51', '2021-03-02', '2020-08-20', 1, 'no', 1, 0, '', 'check pregnancy', 'Normal baby development', 'Patient 4 weeks pregnant', 'less activity', ''),
(154, 10, 1, '2021-03-02 16:17:41', '2021-03-02', '2020-08-20', 1, 'no', 1, 0, '', '8 weeks pregnacy check', 'no', 'normal baby evolution', 'bed rest', ''),
(243, 1, 1, '2021-04-03 05:31:49', '2021-04-03', '2020-08-20', 1, 'no', 1, 0, '', '24 week pregnacy', 'norma baby evolution', 'pregnacy', 'no', 'Pregnacy vitC'),
(266, 1, 1, '2021-04-04 21:51:50', '2021-04-04', '2020-08-20', 1, 'no', 1, 0, '', '32 weeks pregnacy', 'normal baby development', 'pregnacy', 'no', 'Pregnancy Vits2');

-- --------------------------------------------------------

--
-- Table structure for table `consult_analysis`
--

CREATE TABLE `consult_analysis` (
  `id_anal` int(4) NOT NULL,
  `id_analyses` int(4) NOT NULL,
  `id_consult` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consult_analysis`
--

INSERT INTO `consult_analysis` (`id_anal`, `id_analyses`, `id_consult`) VALUES
(11, 11, 154),
(12, 9, 154),
(13, 5, 154),
(30, 2, 243),
(31, 6, 243),
(32, 9, 243),
(33, 2, 266),
(34, 9, 266),
(35, 1, 266);

-- --------------------------------------------------------

--
-- Table structure for table `consult_examinations`
--

CREATE TABLE `consult_examinations` (
  `id_exam` int(4) NOT NULL,
  `id_examination` int(4) NOT NULL,
  `id_consult` int(4) NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consult_examinations`
--

INSERT INTO `consult_examinations` (`id_exam`, `id_examination`, `id_consult`, `price`) VALUES
(7, 1, 147, 50),
(8, 4, 147, 100),
(9, 8, 147, 150),
(31, 5, 154, 150),
(32, 8, 154, 150),
(84, 1, 243, 50),
(85, 5, 243, 150),
(92, 5, 266, 150),
(93, 6, 266, 100);

-- --------------------------------------------------------

--
-- Table structure for table `county`
--

CREATE TABLE `county` (
  `id_county` int(4) NOT NULL,
  `county` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `county`
--

INSERT INTO `county` (`id_county`, `county`) VALUES
(1, 'Cluj'),
(2, 'Alba');

-- --------------------------------------------------------

--
-- Table structure for table `examinations`
--

CREATE TABLE `examinations` (
  `id_examination` int(4) NOT NULL,
  `examination_name` varchar(30) NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examinations`
--

INSERT INTO `examinations` (`id_examination`, `examination_name`, `price`) VALUES
(1, 'Clinical breast exam', 50),
(2, 'Mammography', 150),
(3, 'Pap Smear', 100),
(4, 'Pelvic Exam', 100),
(5, 'Ultrasound', 150),
(6, 'Fetal monitoring', 100),
(7, 'Group B strep culture', 50),
(8, 'Ammiocentesis withdraw', 150);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id_invoice` int(4) NOT NULL,
  `series` varchar(3) NOT NULL,
  `number` int(5) NOT NULL,
  `date` date NOT NULL,
  `id_cabinet` int(4) NOT NULL,
  `id_patient` int(4) NOT NULL,
  `id_consult` int(4) NOT NULL,
  `id_exam` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medical_letter`
--

CREATE TABLE `medical_letter` (
  `id_letter` int(4) NOT NULL,
  `id_patient` int(4) NOT NULL,
  `id_consult` int(4) NOT NULL,
  `id_user` int(4) NOT NULL,
  `id_cabinet` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id_patient` int(4) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `identification_number` varchar(13) NOT NULL,
  `date_of_birth` date NOT NULL,
  `id_county` int(4) NOT NULL,
  `id_city` int(4) NOT NULL,
  `address` varchar(100) NOT NULL,
  `ocuppation` varchar(20) NOT NULL,
  `job` varchar(30) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `civil_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id_patient`, `first_name`, `last_name`, `identification_number`, `date_of_birth`, `id_county`, `id_city`, `address`, `ocuppation`, `job`, `telephone`, `email`, `civil_status`) VALUES
(1, 'Smith', 'Marta', '2751123192128', '1975-11-23', 1, 1, 'Str. Roses nr. 3', 'seller', 'seller', '0364812623', 'smithmarta@yahoo.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `title` varchar(15) NOT NULL,
  `signature` blob DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `title`, `signature`, `is_admin`) VALUES
(1, 'doctor@gmail.com', '$2y$10$w.0LrU7Jcemf4rktajdJuOJtgKen0nUxcyecYbOGFOQru87IQrWKK', 'Ion', 'Pop', 'Dr', '', 0),
(11, 'paulsmith@yahoo.com', '$2y$10$kRwjfImOEySpGa7YZupMl.val1SuKZoktkXntFmJqUhiF6wb8YSva', 'Paul', 'Smith', '', 0x89504e470d0a1a0a0000000d49484452000000640000003108060000002ca10c10000000017352474200aece1ce90000000467414d410000b18f0bfc61050000000970485973000012740000127401de661f78000006e349444154785eed9a7b704c571cc7bf89bc36c926d94422d8242299789410af7a1435289deaa4da6294a19e25aaa318555a61842929e2d1a24507a3b419458b96f18a578821118f0621af8dc86b93cd6393ddcdeeed3927374884ecaeee5abbf7f3cfee39f7ceceee7ecff9fdbebfdfb9761c010216833dff2a6021088258188220168620888521086261bc52411ee6a9107f201fc32293d9ab00f04a6ceff153721cfebb10ffdea9c4c0b724e8dfd70b9bb6ca30f7f340f479d393bfcb3631ab2069772bb161730e0a0ad558bc20186ddb88e0e9e1c0ae9d3a5b8243870bb07e753b36b655cc12b26a6a3826c4c225e9f860842fe2778723225cfc580c4a446777c87255ec5e5bc6e48268c81fbc6f7f3e526f9663d74f6fe09dc13eb0b3e32f3e8544e28866cdec5058a4e6676c13930a42c558bb310ba713e458111d0a8fa776446384048bf020b38a1f358ebc44c3bfb34e4c2ac8c933725c4d2e471cc90b2dfc9cd89c56cba1acbc86bd6f489b2011c9334a7ef42cf9056a4c98760b3a2b8e6a261384aee42ddb6458bd3c1462f766fc2c9098a4c0aab559fca83ede120728955a7e541f6a0496c4dcc727a3fd61df48c8b3164c26c8c62d39e8d7db8badfa86186aec2a2ab588fa320d03fa493076943f3f6b9d98449062b9064957cb3063aa949f311e8d8643ccaa0cf4ebe3857163fc1b3504d68449042955d4c0afb953bd50652cc74f16233ba71a73a202f919ebc62482d0826fc9c2607ea43fb9792a88c5f59dd89f470bf1e9f89656bf33ea308920f4cf0b26a234c6c54b0a7468e7c68f9e70e55a198e9d9063f8101f7ee609015217fe9df563b2a4fe3cee6728d1a39b073f022a89ab3a74b810abd76562657408fc5bd4da635bc5ec826464553fde3dd752ca3179e66d1c226169e3f7ed11d145cce66d19b30a426b0991c81e35c439cd9a9b86f98bef61faa4d6d8f163479bdf1975985590c2220d5af93bc3c9d91e430679e3707c170c7edb9bbfda383e3e4eacdab7150c12a4a8588384f325fcc870eedcab4450a00b9c1ced30f27d3fb8ba366d8bbf981180dfffc847de23153f63dd1824c8d61d3276a8642ca9372b10dec99d1fe9070d6513c7b5c4b82937599168ed182448e26505eb2519834ec7e1c6ad0a74ea60982014da90d4e9c04e19ad1dbd05a9a8d082ae4f6727e3d2ceb98ba52c7f0406e85f535001e77c7517c748b54e6b91d7b5cb4b7776fa7d258e1c2bc2ae5ff3b0799b0ca7cf361efaf53ec22d29d16012b1a807f775e1670c63d1b2fb18d0d70bc387fab02f7837bd92350d9f07b5c4f1070a309424ff81fd25d8b25d86c8f77cf151a41f7f87f1a8d53a52ff902dd704f664ed3d7daad9140d3fb7a8588d23ff14e1c46939bcbc1c1016ea06692b67963b070d903c3e92781ab308525eaec5e889a9d8b3bd13e27ec8266228e1e3ed0837b767933a152bf97a39db4d52a9333f0bdc4eabc4bcd941ec8750e87dd424a8d51c3a93bce4e8d0746f45965b8d83a408bd94a44031f93d4ded7665958e2d22fae085d8fdf9c228ca6a907455c1ba108ec4b0d4d19c38c46e5dc5c4c0f8a225f93dfa6016418e92ad9a70be14dd23c4387ba11473660520b4ad2b7ff509f49bac23825137f7f5bc36f59a93b46e9931450a095969e7131538f85701dcc8752a489f5e9e889af6fcce724a6a392e5f29c3f153c57897ecd076616ee8dcd19dadda17919955855b6421249c7bb1b3742636be67770ff4eee9093fdf97aba7cc22c8a2a5e91836c487ed8c0b64152d9813848eedebf7b3d464c5fffc4b2edb1d71abc2e0dea053fcdd9a4c9c4b2c85c8c51ebdba7bb2d015d2568447f96a4411b162be0d613db2aa2a2deba565e7a89097afc26ffbf359f7b9534737ccfe2ca0c963e4578dc905a14dc3e8150f70706f384a4a6b58824e23d679e5d250fe8e5a56c466a0b0508398e810b83712cad41a1daa487cf6f47cf60f5dbe2a83edaaccec2aa8553ad837b363b19a768e7b4478e0c3485f52fb186746cc0e15441fe47235173926851fe9cfa6ad39dcf65db9fc88e392af97712346a57024e1b131b1c3dcce3d0fb98fc7a772d5d55a366728b287d5dcb69db91c119aaba8a8e19455c67d8e2560d265934c6237cd1f34a9d5d1355c8c6183bdb17b6f1e7b062b362e8be48452ac8f0d63b1d8185ab774c69409ad486e7065468186b5d715937d73ea3c56c66662d9376d492276e4676b1935b2057b22853a9e1c5935cb19d455099848906cf227afd990c5dc0f8de10da1ee263040849da4489a4f12bc3e3d2d5be1a5933a0d3bf4392b7aee4d4920b6f60ca942870c9260fa24693d5f2ed0347a0b428bbbb1936fc055547f35d3ea54456a81b0d0daba2228c00533a74ad9b98780e1e82d088536f81a3e7b4b05128b8590f37f61902002a647882b1686208885210862610882581882201686208885210862610882581882201605f01f094b28d4c9ee7d870000000049454e44ae426082068bb0cbbf46eb687324627fc997a22de2d0e6b358fa9976798b16fd65d3120d8015d85fefed68bb38b4f92c167da65ddba245ffcfd69468004cccfe681f469b86a2cda7606f2cd1606e76e77db4e21d5b59a201301ffb5b7d186dda066d3e8515df6877dea2f167b6be44036026f6577a32fa7804da7c0a4fde68dfae18bd049880fd717e8d3e9b006d3e9e3db0448343f6c9d2d193f087fde3cc13dd6f1176f9d8e88cc9d0e6e35d7da0ad4f103d0cd3ffc7d52d2766178e8dce98156d3edef1036d9a327aeaafb27f8d25a2abcfc1eed6223a696eb4f960f6ba120dfeb051cae8a9bfc7fe1d168d1e3382dda44574d22268f3c18e5f67d3b7d1d296ecc42d1a5f14b249655b6dd17856765b3255f41f6941b4f960c7afb3a9458b1ab343b7687cddf37d6c874fd1ea99d80dbf469f0d65575a287ac0cfa0cd47b2a79568f0878df6d18af6ecdc2d1adff2642bfbf66bf4d904ec6267a22f2760179b3cbaf4efa1cd473a789a8d6a34ebc82e50a2c103f736b4af4e461f8f66b77a8dd6adc3ee3f3cbad66fa3cd473a789a8d4a34e8c82e50a2c13397f6b4c557a35d86b22beda3156bb2b70c89ae823f68f361ec5d251afc7130eac32e50a2c16367b6b53507d1077fd9b444835eecf44fd16a200e6d3eccf1bb8ea7add9e9359a3d76b0ad8d0ea20fdeb195251ab467e7be8d9602d168f3618edf753c6dca8eaed12c82ed7c35dae5335b5fa3593376dca76835d0006d3ec6d747d9822d1a3763c7d56816c7f63f197d7c827d58a359283be238fa066883361fe3eba36cc13e5ad1801d54a359283be238fae622dba4448338b6ff41f401d0126d3ec6d747d9028b16c5b1fdb7681ccd4e791b2d7d207043dbea6bf419d0116d3e80bda844831d5bf01aad8b603b6fd1b80d3bab46b32027377fbb66ffe3d5680ba02fdabc377b4e89062ff60bb6ffbda5ae79ceb6dda2f1ca3ebdc87e8f8a760706a1cdbbb2b7d468f6cdbdaf8ed99e5b345e9c3daae4ed8f21a9270203d1e65dd95b6a34fbe6de57c76ccf1acdd667ef6a179d070c459b77656f29d1e084db1f7e621b966890883df076b41d3031dabcab276f79f2ed5be11b4ec8def8369f56d6df8155d0e65d3d798b7d5ba2c12db6558906e9d833f7d10a2005dabc9f870fb1cf6b34bbc276a8d12ca99f7a2c7e166ddecfc387d8e7359a9d669f6fd118c0b268f34eec15251a5c613bd46876827db84563002ba3cd7bb027946870cbbdadecab2d1a03581c6dde833da144835b6e6c659f6cd118c0fa68f3e6ecfe251a3c7069435b5ca319802c68f3b6ecf2359a3d601b9668f0ff6ccd168d0124429b376437afd1ec19dbb346b3bf6cba456300b9d0e60dd9cd4b3488603b9768f0974d6b3403900e6dde8a5dbb44833807fbdba846330019d1e64dd89d4b34087570c4c108404ab4793cbb708d66a13e1d61bf976800202fda3c9e5db8448368764ac9a71f01a4479bc7eb76613be853b41a406ab479b09eb7b5b3de464b0164479b47b2ab9668d08c1d67d122003f80360f6037dc472b5ab213f7d10a003f80367fcaaeb78f56b467e7d66806e037d0e6f7d9c52c5a04005dd0e677d8955ea37500d00b6d7e8d5de66db414003aa2cd2fb09b58b4080046a0cdc54eb9146d0100e3fc689bdb9eb7a3ed0060b4f5da7c92e872003007dafc4e74330098066d7e2dba13004c6681362fac521b458701c082d668f33dabe07bd15e0090c57a6d0e0078459b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b034006b4390064409b03c0fafef9e77f9c28b1faac679d110000000049454e44ae426082, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analysis`
--
ALTER TABLE `analysis`
  ADD PRIMARY KEY (`id_analysis`),
  ADD KEY `analysis_name` (`analysis_name`);

--
-- Indexes for table `cabinet`
--
ALTER TABLE `cabinet`
  ADD PRIMARY KEY (`id_cabinet`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id_city`),
  ADD KEY `id_judet` (`id_county`);

--
-- Indexes for table `consult`
--
ALTER TABLE `consult`
  ADD PRIMARY KEY (`id_consult`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_patient` (`id_patient`);

--
-- Indexes for table `consult_analysis`
--
ALTER TABLE `consult_analysis`
  ADD PRIMARY KEY (`id_anal`),
  ADD KEY `id_alalysis` (`id_analyses`),
  ADD KEY `id_consult` (`id_consult`),
  ADD KEY `id_analysis_2` (`id_analyses`),
  ADD KEY `id_analysis_3` (`id_analyses`),
  ADD KEY `id_analysis` (`id_analyses`) USING BTREE;

--
-- Indexes for table `consult_examinations`
--
ALTER TABLE `consult_examinations`
  ADD PRIMARY KEY (`id_exam`),
  ADD KEY `id_examination` (`id_examination`),
  ADD KEY `id_analysis` (`id_consult`);

--
-- Indexes for table `county`
--
ALTER TABLE `county`
  ADD PRIMARY KEY (`id_county`);

--
-- Indexes for table `examinations`
--
ALTER TABLE `examinations`
  ADD PRIMARY KEY (`id_examination`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id_invoice`),
  ADD KEY `id_cabinet` (`id_cabinet`),
  ADD KEY `id_consult` (`id_consult`),
  ADD KEY `id_patient` (`id_patient`),
  ADD KEY `id_exam` (`id_exam`);

--
-- Indexes for table `medical_letter`
--
ALTER TABLE `medical_letter`
  ADD PRIMARY KEY (`id_letter`),
  ADD KEY `id_patient` (`id_patient`),
  ADD KEY `id_consult` (`id_consult`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_cabinet` (`id_cabinet`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id_patient`),
  ADD KEY `id_county` (`id_county`) USING BTREE,
  ADD KEY `id_city` (`id_city`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analysis`
--
ALTER TABLE `analysis`
  MODIFY `id_analysis` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cabinet`
--
ALTER TABLE `cabinet`
  MODIFY `id_cabinet` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id_city` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `consult`
--
ALTER TABLE `consult`
  MODIFY `id_consult` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT for table `consult_analysis`
--
ALTER TABLE `consult_analysis`
  MODIFY `id_anal` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `consult_examinations`
--
ALTER TABLE `consult_examinations`
  MODIFY `id_exam` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `county`
--
ALTER TABLE `county`
  MODIFY `id_county` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `examinations`
--
ALTER TABLE `examinations`
  MODIFY `id_examination` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medical_letter`
--
ALTER TABLE `medical_letter`
  MODIFY `id_letter` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id_patient` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`id_county`) REFERENCES `county` (`id_county`);

--
-- Constraints for table `consult_analysis`
--
ALTER TABLE `consult_analysis`
  ADD CONSTRAINT `consult_analysis_ibfk_3` FOREIGN KEY (`id_consult`) REFERENCES `consult` (`id_consult`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consult_analysis_ibfk_4` FOREIGN KEY (`id_analyses`) REFERENCES `analysis` (`id_analysis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consult_examinations`
--
ALTER TABLE `consult_examinations`
  ADD CONSTRAINT `consult_examinations_ibfk_1` FOREIGN KEY (`id_examination`) REFERENCES `examinations` (`id_examination`),
  ADD CONSTRAINT `consult_examinations_ibfk_2` FOREIGN KEY (`id_consult`) REFERENCES `consult` (`id_consult`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`id_cabinet`) REFERENCES `cabinet` (`id_cabinet`),
  ADD CONSTRAINT `invoices_ibfk_3` FOREIGN KEY (`id_consult`) REFERENCES `consult` (`id_consult`);

--
-- Constraints for table `medical_letter`
--
ALTER TABLE `medical_letter`
  ADD CONSTRAINT `medical_letter_ibfk_2` FOREIGN KEY (`id_patient`) REFERENCES `patients` (`id_patient`),
  ADD CONSTRAINT `medical_letter_ibfk_3` FOREIGN KEY (`id_cabinet`) REFERENCES `cabinet` (`id_cabinet`),
  ADD CONSTRAINT `medical_letter_ibfk_4` FOREIGN KEY (`id_consult`) REFERENCES `consult` (`id_consult`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_2` FOREIGN KEY (`id_city`) REFERENCES `city` (`id_city`),
  ADD CONSTRAINT `patients_ibfk_3` FOREIGN KEY (`id_county`) REFERENCES `county` (`id_county`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for simplicity
CREATE DATABASE IF NOT EXISTS `simplicity` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `simplicity`;

-- Dumping structure for table simplicity.tests
CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_name` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `test_desc` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table simplicity.tests: ~2 rows (approximately)
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;
INSERT INTO `tests` (`id`, `test_name`, `test_desc`) VALUES
	(1, 'IOS', 'IOS- Swift and Xcode Ide related question'),
	(2, 'PHP', 'PHP-Questions  includint use of basics of HTML and server side progaramming ');
/*!40000 ALTER TABLE `tests` ENABLE KEYS */;

-- Dumping structure for table simplicity.test_question
CREATE TABLE IF NOT EXISTS `test_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL DEFAULT '0',
  `question_no` int(2) NOT NULL DEFAULT '0',
  `option` int(2) NOT NULL DEFAULT '0',
  `option_val` varchar(400) COLLATE utf8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `test_id_question_no_option` (`test_id`,`question_no`,`option`),
  CONSTRAINT `FK_test_question_tests` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table simplicity.test_question: ~234 rows (approximately)
/*!40000 ALTER TABLE `test_question` DISABLE KEYS */;
INSERT INTO `test_question` (`id`, `test_id`, `question_no`, `option`, `option_val`) VALUES
	(1, 1, 1, 0, 'Which of the following structures has both computed and stored properties?'),
	(2, 1, 1, 1, 'struct Rect { var origin = CGPointZero var center: CGPoint { get { // } set { // } } }'),
	(3, 1, 1, 2, 'struct Rect { var center: CGPoint { get { // } set { // } } }'),
	(4, 1, 1, 3, 'struct Rect { let origin = CGPointZero }'),
	(5, 1, 1, 4, 'struct Rect { var origin = CGPointZero var center: CGPointMake(0,0) }'),
	(6, 1, 1, 5, '1'),
	(7, 1, 2, 0, 'Which one of the below functions definitions is wrong considering Swift language?'),
	(10, 1, 2, 1, 'func haveChar(#string: String, character: Character) -> (Bool)'),
	(11, 1, 2, 2, 'func mean(numbers: Double...) -> Double'),
	(12, 1, 2, 3, 'func minMax(array: [Int]) -> (min: Int, max: Int)?'),
	(13, 1, 2, 4, 'func minMax(array: [Int]) -> (min: Int, max: Int)?'),
	(14, 1, 2, 5, '4'),
	(15, 1, 3, 0, 'Which keyword do you use to declare enumeration?'),
	(16, 1, 3, 1, 'var'),
	(17, 1, 3, 2, 'let'),
	(18, 1, 3, 3, 'enum'),
	(19, 1, 3, 4, 'e(num)'),
	(20, 1, 3, 5, '3'),
	(21, 1, 4, 0, 'Which of the following declares a mutable array in Swift?'),
	(22, 1, 4, 1, 'let x = [Int]()'),
	(23, 1, 4, 2, 'var x = [Int]'),
	(24, 1, 4, 3, 'var x = [Int]()'),
	(25, 1, 4, 4, 'let x = [Int]'),
	(26, 1, 4, 5, '2'),
	(27, 1, 5, 0, 'Which of these is an appropriate syntax for declaring a function that takes an argument of a generic type?'),
	(28, 1, 5, 1, 'generic func genericFunction(argument: T) { }'),
	(29, 1, 5, 2, 'func genericFunction<T>(argument) { }'),
	(30, 1, 5, 3, 'func genericFunction(argument: T<Generic>) { }'),
	(31, 1, 5, 4, 'func genericFunction<T>(argument: T) { }'),
	(32, 1, 5, 5, '4'),
	(33, 1, 6, 0, 'Which one creates a dictionary with a key type of Integer and value of String?'),
	(34, 1, 6, 1, 'var dict:[Int: String] = ["one":1]'),
	(35, 1, 6, 2, 'var dict: = [1: "name"] : [2, "name2"]'),
	(36, 1, 6, 3, 'var dict: [Int: String] = [1:"one"]'),
	(37, 1, 6, 4, 'var dict: [String: Int] = [1:"one"]'),
	(38, 1, 6, 5, '4'),
	(39, 1, 7, 0, 'Which of these is not a valid property declaration in Swift?'),
	(40, 1, 7, 1, 'final let x = 0'),
	(41, 1, 7, 2, 'final lazy let x = 0'),
	(42, 1, 7, 3, 'final lazy var x = 0'),
	(43, 1, 7, 4, 'final var x = 0'),
	(44, 1, 7, 5, '1'),
	(45, 1, 8, 0, 'All Swift classes must inherit from which root class?'),
	(46, 1, 8, 1, 'Not Required'),
	(47, 1, 8, 2, 'NSObject'),
	(48, 1, 8, 3, 'NSRootObject'),
	(50, 1, 8, 4, '@ObjC'),
	(51, 1, 8, 5, '1'),
	(52, 1, 9, 0, 'Which of the following statements could be used to determine if a given variable is of String type?'),
	(53, 1, 9, 1, 'if unknownVariable is String { }'),
	(54, 1, 9, 2, 'if unkownVariable: String { }'),
	(55, 1, 9, 3, 'if unkownVariable = String() { }'),
	(56, 1, 9, 4, 'if unkownVariable <> String[] { }'),
	(57, 1, 9, 5, '1'),
	(58, 1, 10, 0, 'What would be used for safe casting and to return nil if failed?'),
	(59, 1, 10, 1, 'as?'),
	(60, 1, 10, 2, 'as!'),
	(61, 1, 10, 3, '!as?'),
	(62, 1, 10, 4, '!as!'),
	(63, 1, 10, 5, '1'),
	(64, 1, 11, 0, 'When declaring an enumeration, multiple member values can appear on a single line, separated by which punctuation mark?'),
	(65, 1, 11, 1, 'Semi-colon'),
	(66, 1, 11, 2, 'Colon'),
	(67, 1, 11, 3, 'Comma'),
	(68, 1, 11, 4, 'Question Mark'),
	(69, 1, 11, 5, '3'),
	(70, 1, 12, 0, 'Which keyword in the context of a Switch statement is required to force the execution of a subsequent case?'),
	(71, 1, 12, 1, 'Fallthrough'),
	(72, 1, 12, 2, 'Continue'),
	(73, 1, 12, 3, 'Release'),
	(74, 1, 12, 4, 'DropEnd'),
	(75, 1, 12, 5, '1'),
	(76, 1, 13, 0, 'Which keyword is used on a function in an enumeration to indicate that the function will modify \'self\'?'),
	(77, 1, 13, 1, 'modifier'),
	(78, 1, 13, 2, 'mutating'),
	(79, 1, 13, 3, 'mutable'),
	(80, 1, 13, 4, 'mod'),
	(81, 1, 14, 0, 'What is the name of the deinitializer in a Class declaration?'),
	(82, 1, 14, 1, 'dealloc'),
	(83, 1, 14, 2, 'release'),
	(84, 1, 14, 3, 'dint'),
	(85, 1, 14, 4, 'deinit'),
	(86, 1, 14, 5, '4'),
	(87, 1, 15, 0, 'Which of these is an appropriate syntax for dispatching a heavy operation to a background thread?'),
	(88, 1, 15, 1, 'dispatch_async(DISPATCH_QUEUE_PRIORITY_BACKGROUND), { self.heavyOperation() })'),
	(89, 1, 15, 2, 'DISPATCH_QUEUE_PRIORITY_BACKGROUND({ self.heavyOperation() })'),
	(90, 1, 15, 3, 'dispatch_async(dispatch_get_global_queue (DISPATCH_QUEUE_PRIORITY_BACKGROUND, 0), { self.heavyOperation() })'),
	(91, 1, 15, 4, 'dispatch_async({ self.heavyOperation() })'),
	(92, 1, 15, 5, '3'),
	(93, 1, 16, 0, 'If we have a class named MyClass with a nested enum called Status, declared like so: \r\n====================\r\nclass MyClass {\r\n    enum Status {\r\n        case On, Off\r\n    }\r\n}\r\n====================\r\nHow would one indicate that a variable is an enum of type Status outside\r\nthe c?'),
	(94, 1, 16, 1, 'var status: Status = .On'),
	(95, 1, 16, 2, 'var status: MyClass.Status = .On'),
	(96, 1, 16, 3, 'var status: MyClass<Status> = .On'),
	(97, 1, 16, 4, 'var status: MyClass(Status) = .On'),
	(98, 1, 16, 5, '3'),
	(99, 1, 17, 0, 'Which of these is a valid syntax for iterating through the keys and values of a dictionary: \r\n\r\nlet dictionary = [keyOne : valueOne, keyTwo : valueTwo] \r\n'),
	(100, 1, 17, 1, 'for (key, value) in dictionary { println("Key: \\(key) Value: \\(value)") }'),
	(101, 1, 17, 2, 'for (key, value) in enumerate(dictionary) { println("Key: \\(key) Value: \\(value)") }'),
	(102, 1, 17, 3, 'for (key, value) in (dictionary.keys, dictionary.values) { println("Key: \\(key) Value: \\(value)") }'),
	(103, 1, 17, 4, 'for (key, value) in dictionary.enumerate() { println("Key: \\(key) Value: \\(value)") }'),
	(105, 1, 17, 5, '1'),
	(106, 1, 18, 0, 'Here is some code: \r\n====================\r\nvar x = 0\r\n\r\nfor index in 1...5 {\r\n    ++x\r\n}\r\nprint("\\(x)")\r\n====================\r\n\r\nWhat is the output?'),
	(107, 1, 18, 1, '0'),
	(108, 1, 18, 2, 'Compile Error'),
	(109, 1, 18, 3, '5'),
	(110, 1, 18, 4, '1,2,3,4,5'),
	(111, 1, 18, 5, '3'),
	(113, 1, 19, 0, 'What does a retainCount represent in ARC?'),
	(114, 1, 19, 1, 'The current number of strong references to an object.'),
	(115, 1, 19, 2, 'The current number of instances of an object.'),
	(116, 1, 19, 3, 'The total number of times an object has been allocated.'),
	(117, 1, 19, 4, 'The total number of objects currently being retained in memory.'),
	(118, 1, 19, 5, '1'),
	(119, 1, 20, 0, 'Which of these statements is a valid way to extend the capabilities of our theoretical class, MyClass to conform to protocol MyProtocol?'),
	(120, 1, 20, 1, 'extension MyClass(MyProtocol) { }'),
	(121, 1, 20, 2, 'extension MyClass, prot MyProtocol { }'),
	(122, 1, 20, 3, 'extension MyClass: MyProtocol { }'),
	(123, 1, 20, 4, 'extension MyClass, MyProtocol { }'),
	(124, 1, 20, 5, '3'),
	(125, 2, 1, 0, 'Which one of the following is the right way of defining a function in PHP?'),
	(128, 2, 1, 1, ' function { function body }'),
	(129, 2, 1, 2, ' data type functionName(parameters) { function body }'),
	(130, 2, 1, 3, ' functionName(parameters) { function body '),
	(131, 2, 1, 4, 'function fumctionName(parameters) { function body }'),
	(132, 2, 1, 5, '4'),
	(133, 2, 2, 0, '. Type Hinting was introduced in which version of PHP?'),
	(134, 2, 2, 1, 'PHP 4'),
	(135, 2, 2, 2, 'PHP 5'),
	(136, 2, 2, 3, '  PHP 5.3 '),
	(137, 2, 2, 4, ' PHP 6'),
	(138, 2, 2, 5, '2'),
	(139, 2, 3, 0, 'What will happen in this function call?\r\n\r\n    <?php\r\n    function calc($price, $tax)	\r\n    {\r\n        $total = $price + $tax;\r\n    }\r\n    $pricetag = 15;\r\n    $taxtag = 3;\r\n    calc($pricetag, $taxtag);	\r\n    ?>'),
	(140, 2, 3, 1, ' Call By Value'),
	(141, 2, 3, 2, ' Call By Reference'),
	(142, 2, 3, 3, 'Default Argument Value'),
	(143, 2, 3, 4, 'Type Hinting'),
	(144, 2, 3, 5, '1'),
	(145, 2, 4, 0, 'What will be the output of the following PHP code?\r\n\r\n    <?php\r\n    function calc($price, $tax="")\r\n    {\r\n        $total = $price + ($price * $tax);\r\n        echo "$total"; \r\n    }\r\n    calc(42);	\r\n    ?>'),
	(146, 2, 4, 1, 'Error'),
	(147, 2, 4, 2, '0'),
	(148, 2, 4, 3, '42'),
	(149, 2, 4, 4, '84'),
	(150, 2, 4, 5, '3'),
	(151, 2, 5, 0, ' Which of the following are valid function names?\r\ni) function()\r\nii) €()\r\niii) .function()\r\niv) $function()'),
	(152, 2, 5, 1, 'Only ii)'),
	(153, 2, 5, 2, ' None of the mentioned.'),
	(154, 2, 5, 3, ' All of the mentioned.'),
	(155, 2, 5, 4, 'iii) and iv)'),
	(156, 2, 5, 5, '1'),
	(157, 2, 6, 0, 'What will be the output of the following PHP code?\r\n\r\n    <?php\r\n    function a()\r\n    {\r\n        function b()\r\n        {\r\n            echo "I am b";\r\n 	}\r\n        echo "I am a";\r\n    }\r\n    a();\r\n    a();\r\n    ?>'),
	(158, 2, 6, 1, ' I am b'),
	(159, 2, 6, 2, ' I am bI am a'),
	(160, 2, 6, 3, 'Error'),
	(161, 2, 6, 4, ' I am a Error'),
	(162, 2, 6, 5, '4'),
	(163, 2, 7, 0, 'What will be the output of the following PHP code?\r\n\r\n    <?php\r\n    function a()  \r\n    {\r\n        function b()\r\n        {\r\n            echo "I am b";\r\n 	}\r\n        echo "I am a";\r\n    }\r\n    b();\r\n    a();\r\n    ?>'),
	(164, 2, 7, 1, 'I am b'),
	(165, 2, 7, 2, 'I am bI am a'),
	(166, 2, 7, 3, 'Error'),
	(167, 2, 7, 4, ' I am a Error'),
	(168, 2, 7, 5, '3'),
	(169, 2, 8, 0, 'What will be the output of the following PHP code?\r\n\r\n    <?php\r\n    $op2 = "blabla";\r\n    function foo($op1)\r\n    {\r\n        echo $op1;\r\n        echo $op2;\r\n    }\r\n    foo("hello");\r\n    ?>'),
	(170, 2, 8, 1, 'helloblabla'),
	(171, 2, 8, 2, 'Error'),
	(172, 2, 8, 3, 'hello'),
	(173, 2, 8, 4, 'helloblablablabla'),
	(174, 2, 8, 5, '3'),
	(175, 2, 9, 0, '. A function in PHP which starts with __ (double underscore) is know as..'),
	(176, 2, 9, 1, ' Magic Function'),
	(177, 2, 9, 2, ' Inbuilt Function'),
	(178, 2, 9, 3, 'Default Function'),
	(179, 2, 9, 4, ' User Defined Function'),
	(180, 2, 9, 5, '1'),
	(181, 2, 10, 0, 'What will be the output of the following PHP code?\r\n\r\n    <?php\r\n    function foo($msg)\r\n    {\r\n        echo "$msg";\r\n    }\r\n    $var1 = "foo";\r\n    $var1("will this work");\r\n    ?>'),
	(182, 2, 10, 1, 'Error'),
	(183, 2, 10, 2, '$msg'),
	(184, 2, 10, 3, '0'),
	(185, 2, 10, 4, ' will this work'),
	(186, 2, 10, 5, '4'),
	(187, 2, 11, 0, 'What does PHP stand for?\r\ni) Personal Home Page\r\nii) Hypertext Preprocessor\r\niii) Pretext Hypertext Processor\r\niv) Preprocessor Home Page'),
	(188, 2, 11, 1, 'Both i) and iii)'),
	(189, 2, 11, 2, '  Both ii) and iv)'),
	(190, 2, 11, 3, ' Only ii)'),
	(191, 2, 11, 4, ' Both i) and ii)'),
	(192, 2, 11, 5, '4'),
	(193, 2, 12, 0, 'PHP files have a default file extension of..'),
	(194, 2, 12, 1, '.html'),
	(195, 2, 12, 2, ' .xml'),
	(196, 2, 12, 3, '.php'),
	(197, 2, 12, 4, '.ph'),
	(198, 2, 12, 5, '3'),
	(199, 2, 14, 0, 'Which of the following must be installed on your computer so as to run PHP script?\r\ni) Adobe Dreamweaver\r\nii) PHP\r\niii) Apache\r\niv) IIS'),
	(200, 2, 14, 1, 'All of the mentioned'),
	(201, 2, 14, 2, 'Only ii)'),
	(202, 2, 14, 3, 'ii) and iii)'),
	(203, 2, 14, 4, ' ii), iii) and iv)'),
	(204, 2, 14, 5, '4'),
	(205, 2, 15, 0, 'Which version of PHP introduced Try/catch Exception?'),
	(206, 2, 15, 1, 'PHP 4'),
	(207, 2, 15, 2, 'PHP 5'),
	(208, 2, 15, 3, 'PHP 5.3'),
	(209, 2, 15, 4, 'PHP 6)'),
	(210, 2, 15, 5, '2'),
	(211, 2, 16, 0, 'We can use ___ to comment a single line?\r\ni) /?\r\nii) //\r\niii) #\r\niv) /* */'),
	(212, 2, 16, 1, ' Only ii)'),
	(213, 2, 16, 2, ' i), iii) and iv)'),
	(214, 2, 16, 3, ' ii), iii) and iv)'),
	(215, 2, 16, 4, ' Both ii) and iv)'),
	(216, 2, 16, 5, '3'),
	(217, 2, 17, 0, 'Which of the following php statement/statements will store 111 in variable num?\r\ni) int $num = 111;\r\nii) int mum = 111;\r\niii) $num = 111;\r\niv) 111 = $num;'),
	(218, 2, 17, 1, ' Both i) and ii)'),
	(219, 2, 17, 2, 'All of the mentioned.'),
	(220, 2, 17, 3, 'Only iii)'),
	(221, 2, 17, 4, 'Only i)'),
	(222, 2, 17, 5, '3'),
	(223, 2, 18, 0, ' What will be the output of the following php code?\r\n\r\n    <?php\r\n    $num  = 1;\r\n    $num1 = 2;\r\n    print $num . "+". $num1;\r\n    ?>'),
	(224, 2, 18, 1, '3'),
	(225, 2, 18, 2, '1+2.'),
	(226, 2, 18, 3, '1.+.2'),
	(227, 2, 18, 4, 'Error'),
	(228, 2, 18, 5, '2'),
	(229, 2, 19, 0, '  What will be the output of the following php code?\r\n    <?php\r\n    $num  = "1";\r\n    $num1 = "2";\r\n    print $num+$num1;\r\n    ?>'),
	(230, 2, 19, 1, '3'),
	(231, 2, 19, 2, '1+2.'),
	(232, 2, 19, 3, '12'),
	(233, 2, 19, 4, 'Error'),
	(234, 2, 19, 5, '1'),
	(235, 2, 20, 0, ' The practice of creating objects based on predefined classes is often referred to as..'),
	(236, 2, 20, 1, 'class creation'),
	(237, 2, 20, 2, ' object creation'),
	(238, 2, 20, 3, 'object instantiation'),
	(239, 2, 20, 4, 'class instantiation'),
	(240, 2, 20, 5, '4'),
	(241, 1, 13, 5, '2');
/*!40000 ALTER TABLE `test_question` ENABLE KEYS */;

-- Dumping structure for table simplicity.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `l_name` varchar(20) COLLATE utf8_bin DEFAULT '0',
  `email_id` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `password` varchar(15) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `phone` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `address` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `gender` char(1) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `start_dte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table simplicity.users: ~7 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `f_name`, `l_name`, `email_id`, `password`, `phone`, `address`, `gender`, `start_dte`) VALUES
	(1, 'Suraj', 'Bangera', 'jarus.d.b@gmail.com', 'suraj', '2147483647', 'Apt 403 95 Havenbrook Blvd', 'M', '2016-10-16 17:09:58'),
	(2, 'Sreejith', 'Nair', 'sreejith@gmail.com', 'sreejith', '2342334388', 'Diwan Park Vassai', 'M', '2016-10-18 17:16:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table simplicity.user_score
CREATE TABLE IF NOT EXISTS `user_score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `test_id` int(4) NOT NULL DEFAULT '0',
  `score` int(4) NOT NULL DEFAULT '0',
  `score_desc` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_attempts` varchar(4) COLLATE utf8_bin NOT NULL,
  `start_dte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_user_score_users` (`user_id`),
  KEY `FK_user_score_tests` (`test_id`),
  CONSTRAINT `FK_user_score_tests` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`),
  CONSTRAINT `FK_user_score_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*!40000 ALTER TABLE `user_score` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

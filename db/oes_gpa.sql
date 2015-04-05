-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2015 at 11:39 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oes_gpa`
--
CREATE DATABASE IF NOT EXISTS `oes_gpa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `oes_gpa`;

-- --------------------------------------------------------

--
-- Table structure for table `login_examiner_gpa`
--

CREATE TABLE IF NOT EXISTS `login_examiner_gpa` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `r_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pswd` varchar(24) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Login Table for Examiner' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `login_examiner_gpa`
--

INSERT INTO `login_examiner_gpa` (`id`, `r_id`, `username`, `pswd`) VALUES
(6, 6, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `login_gpa`
--

CREATE TABLE IF NOT EXISTS `login_gpa` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `r_id` int(12) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pswd` varchar(24) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `login_gpa`
--

INSERT INTO `login_gpa` (`id`, `r_id`, `user`, `pswd`) VALUES
(19, 19, '7020', 'abcd'),
(20, 20, '1212', '1212'),
(23, 23, '4151', '123');

-- --------------------------------------------------------

--
-- Table structure for table `question_gpa`
--

CREATE TABLE IF NOT EXISTS `question_gpa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch` varchar(50) DEFAULT NULL,
  `sem` int(2) DEFAULT NULL,
  `subject` varchar(40) DEFAULT NULL,
  `question` varchar(500) NOT NULL,
  `option_a` varchar(200) NOT NULL,
  `option_b` varchar(200) NOT NULL,
  `option_c` varchar(200) NOT NULL,
  `option_d` varchar(200) NOT NULL,
  `answer` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=180 ;

--
-- Dumping data for table `question_gpa`
--

INSERT INTO `question_gpa` (`id`, `branch`, `sem`, `subject`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`) VALUES
(4, 'computer', 4, 'COMPUTER NETWORKS', 'Which one of the following extends a private network across public networks?', 'local area network', 'virtual private network', 'enterprise private network', 'storage area network', 'option_b'),
(5, 'computer', 4, 'COMPUTER NETWORKS', 'When collection of various computers seems a single coherent system to its client, then it is called', 'computer network', 'distributed system', 'both (a) and (b)', 'none of the mentioned', 'option_b'),
(6, 'computer', 4, 'COMPUTER NETWORKS', 'Two devices are in network if', 'a process in one device is able to exchange information with a process in another device', 'a process is running on both devices', 'PIDs of the processes running of different devices are same', 'none of the mentioned', 'option_a'),
(7, 'computer', 4, 'COMPUTER NETWORKS', 'In computer network nodes are', 'the computer that originates the data', 'the computer that routes the data', 'the computer that terminates the data', 'all of the mentioned', 'option_d'),
(8, 'computer', 4, 'COMPUTER NETWORKS', 'Communication channel is shared by all the machines on the network in', 'broadcast network', 'unicast network', 'multicast network', 'none of the mentioned', 'option_a'),
(9, 'computer', 4, 'COMPUTER NETWORKS', 'A _____ is a device that forwards packets between networks by processing the routing information included in the packet.', 'bridge', 'firewall', 'router', 'all of the mentioned', 'option_c'),
(10, 'computer', 4, 'COMPUTER NETWORKS', 'Network congestion occurs', 'in case of traffic overloading', 'when a system terminates', 'when connection between two nodes terminates', 'none of the mentioned', 'option_a'),
(11, 'computer', 4, 'COMPUTER NETWORKS', 'The structure or format of data is called', 'Syntax', 'Semantics', 'Struct', 'None of the mentioned', 'option_a'),
(12, 'computer', 4, 'COMPUTER NETWORKS', 'Communication between a computer and a keyboard involves ______________ transmission', 'Automatic', 'Half-duplex', 'Full-duplex', 'Simplex', 'option_d'),
(13, 'computer', 4, 'COMPUTER NETWORKS', 'The first Network', 'CNNET', 'NSFNET', 'ASAPNET', 'ARPANET', 'option_d'),
(14, 'computer', 4, 'COMPUTER NETWORKS', 'Which of this is not a network edge device ?', 'PC', 'Smartphones', 'Servers', 'Switch', 'option_d'),
(15, 'computer', 4, 'COMPUTER NETWORKS', 'A set of rules that governs data communication', 'Protocols', 'Standards', 'RFCs', 'None of the mentioned', 'option_a'),
(16, 'computer', 4, 'COMPUTER NETWORKS', 'Three or more devices share a link in ________ connection', 'Unipoint', 'Multipoint', 'Point to point', 'None of the mentioned', 'option_b'),
(17, 'computer', 4, 'COMPUTER NETWORKS', 'The network layer concerns with', 'bits', 'frames', 'packets', 'none of the mentioned', 'option_c'),
(18, 'computer', 4, 'COMPUTER NETWORKS', 'The 4 byte IP address consists of', 'network address', 'host address', 'both (a) and (b)', 'none of the mentioned', 'option_c'),
(19, 'computer', 4, 'COMPUTER NETWORKS', 'The network layer protocol of internet is', 'ethernet', 'internet protocol', 'hypertext transfer protocol', 'none of the mentioned', 'option_b'),
(20, 'computer', 4, 'COMPUTER NETWORKS', 'ICMP is primarily used for', 'error and diagnostic functions', 'addressing', 'forwarding', 'none of the mentioned', 'option_a'),
(21, 'computer', 4, 'COMPUTER NETWORKS', 'What is the access point (AP) in wireless LAN?', 'device that allows wireless devices to connect to a wired network', 'wireless devices itself', 'both (a) and (b)', 'none of the mentioned', 'option_a'),
(22, 'computer', 4, 'COMPUTER NETWORKS', 'In wireless distribution system', 'multiple access point are inter-connected with each other', 'there is no access point', 'only one access point exists', 'none of the mentioned', 'option_a'),
(23, 'computer', 4, 'COMPUTER NETWORKS', 'What is WPA?', 'wi-fi protected access', 'wired protected access', 'wired process access', 'wi-fi process access', 'option_a'),
(24, 'computer', 4, 'COMPUTER NETWORKS', 'Transport layer aggregates data from different applications into a single stream before passing it to', 'network layer', 'data link layer', 'application layer', 'physical layer', 'option_a'),
(25, 'computer', 4, 'COMPUTER NETWORKS', 'Which one of the following is a transport layer protocol used in internet ?', 'TCP', 'udp', 'both (a) and (b)', 'none of the mentioned', 'option_c'),
(26, 'computer', 4, 'COMPUTER NETWORKS', 'Transmission control protocol is', 'connection oriented protocol', 'uses a three way handshake to establish a connection', 'recievs data from application as a single stream', 'all of the mentioned', 'option_d'),
(27, 'computer', 4, 'COMPUTER NETWORKS', 'Transport layer protocols deals with', 'application to application communication', 'process to process communication', 'node to node communication', 'none of the mentioned', 'option_b'),
(28, 'computer', 4, 'COMPUTER NETWORKS', 'Which one of the following is a transport layer protocol ?', 'stream control transmission protocol', 'internet control message protocol', 'neighbor discovery protocol', 'dynamic host configuration protocol', 'option_a'),
(29, 'computer', 4, 'COMPUTER NETWORKS', 'A _____ is a TCP name for a transport service access point.', 'port', 'pipe', 'node', 'none of the mentioned', 'option_a'),
(30, 'computer', 4, 'COMPUTER NETWORKS', 'SSH can be used in only', 'unix-like operating systems', 'windows', 'both (a) and (b)', 'none of the mentioned', 'option_c'),
(31, 'computer', 4, 'COMPUTER NETWORKS', 'SSH uses _______ to authenticate the remote computer.', 'public-key cryptography', 'private-key cryptography', 'both (a) and (b)', 'none of the mentioned', 'option_a'),
(32, 'computer', 4, 'COMPUTER NETWORKS', 'Which one of the following authentication method is used by SSH?', 'public-key', 'host based', 'PASSWORD', 'all of the mentioned', 'option_d'),
(33, 'computer', 4, 'COMPUTER NETWORKS', 'Which standard TCP port is assigned for contacting SSH servers ?', 'port 21', 'port 22', 'port 23', 'port 24', 'option_b'),
(34, 'computer', 4, 'COMPUTER NETWORKS', 'The entire hostname has a maximum of', '255 characters', '127 characters', '63 characters', '31 characters', 'option_a'),
(35, 'computer', 4, 'COMPUTER NETWORKS', 'Servers handle requests for other domains', 'directly', 'by contacting remote DNS server', 'it is not possible', 'none of the mentioned', 'option_b'),
(36, 'computer', 4, 'COMPUTER NETWORKS', 'DNS database contains', 'name server records', 'hostname-to-address records', 'hostname aliases', 'all of the mentioned', 'option_d'),
(37, 'computer', 4, 'COMPUTER NETWORKS', 'The right to use a domain name is delegated by domain name registers which are accredited by', 'internet architecture board', 'internet society', 'internet research task force', 'internet corporation for assigned names and numbers', 'option_d'),
(38, 'computer', 4, 'COMPUTER NETWORKS', 'Which one of the following is not true?', 'multiple hostnames may correspond to a single IP address', 'a single hostname may correspond to many IP addresses', 'a single hostname may correspond to a single IP address', 'none of the mentioned', 'option_c'),
(39, 'computer', 4, 'COMPUTER NETWORKS', 'A piece of icon or image on a web page associated with another webpage is called', 'url', 'hyperlink', 'plugin', 'none of the mentioned', 'option_b'),
(40, 'computer', 4, 'COMPUTER NETWORKS', 'URL stands for', 'unique reference label', 'uniform reference label', 'uniform resource locator', 'unique resource locator', 'option_c'),
(41, 'computer', 4, 'COMPUTER NETWORKS', 'Which one of the following is not used to generate dynamic web pages?', 'PHP', 'asp.net', 'jsp', 'none of the mentioned', 'option_d'),
(42, 'computer', 4, 'COMPUTER NETWORKS', 'What is a web browser ?', 'a program that can display a web page', 'a program used to view html documents', 'it enables user to access the resources of internet', 'all of the mentioned', 'option_d'),
(43, 'computer', 4, 'COMPUTER NETWORKS', 'Physical or logical arrangement of network is', 'topology', 'routing', 'networking', 'none of the mentioned', 'option_a'),
(44, 'computer', 4, 'COMPUTER NETWORKS', 'In this topology there is a central controller or hub', 'star', 'mesh', 'ring', 'bus', 'option_a'),
(45, 'computer', 4, 'COMPUTER NETWORKS', 'This topology requires multipoint connection', 'star', 'mesh', 'ring', 'bus', 'option_d'),
(46, 'computer', 4, 'COMPUTER NETWORKS', 'Data communication system spanning states, countries, or the whole world is', 'lan', 'man', 'wan', 'none of the mentioned', 'option_c'),
(47, 'computer', 4, 'COMPUTER NETWORKS', 'Data communication system within a building or campus is', 'lan', 'man', 'wan', 'none of the mentioned', 'option_a'),
(48, 'computer', 4, 'COMPUTER NETWORKS', 'Ping can', 'Measure round-trip time', 'Report packet loss', 'Report latency', 'All of the mentioned', 'option_d'),
(49, 'computer', 4, 'COMPUTER NETWORKS', 'If you want to find the number of routers between a source and destination, the utility to be used is', 'route', 'Ipconfig', 'Ifconfig', 'Traceroute', 'option_d'),
(50, 'computer', 4, 'COMPUTER NETWORKS', 'This allows to check if a domain is available for registration.', 'Domain Check', 'Domain Dossier', 'Domain Lookup', 'None of the mentioned', 'option_a'),
(51, 'computer', 4, 'COMPUTER NETWORKS', 'Which of the following is not applicable for IP ?', 'Error reporting', 'Handle addressing conventions', 'Datagram format', 'Packet handling conventions', 'option_a'),
(52, 'computer', 4, 'COMPUTER NETWORKS', 'The data field can carry which of the following?', 'TCP segemnt', 'UDP segment', 'ICMP messages', 'None of the mentioned', 'option_c'),
(53, 'computer', 4, 'COMPUTER NETWORKS', 'The TTL field has value 10. How many routers (max) can process this datagram ?', '11', '5', '10', '9', 'option_c'),
(54, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'Who is father of C Language?', 'Bjarne Stroustrup', 'Dennis Ritchie', 'James A. Gosling', 'Dr. E.F. Codd', 'option_b'),
(55, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'C programs are converted into machine language with the help of', 'An Editor', 'a compiler', 'an operating system', 'none of the above', 'option_b'),
(56, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'A C variable cannot start with', 'An alphabet', 'a number', 'A special symbol other than underscore', 'both (b) and (c)', 'option_d'),
(57, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'Which of the following is allowed in a C Arithmetic instruction', '[]', '{}', '()', 'none of the above', 'option_c'),
(58, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'Which of the following shows the correct hierarchy of arithmetic operations in C', '/ + * -', '* - / +', '+ - / *', '* / + -', 'option_d'),
(59, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'What is an array?', 'An array is a collection of variables that are of the dissimilar data type', 'An array is a collection of variables that are of the same data type', 'An array is not a collection of variables that are of the same data type', 'None of the above', 'option_b'),
(60, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'What is right way to Initialization array?', 'int num[6] = { 2, 4, 12, 5, 45, 5 } ;', 'int n{} = { 2, 4, 12, 5, 45, 5 } ;', 'int n{6} = { 2, 4, 12 } ;', 'int n(6) = { 2, 4, 12, 5, 45, 5 } ;', 'option_a'),
(61, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'What is the right way to access value of structure variable book{ price, page } ?', 'printf("%d%d", book.price, book.page);', 'printf("%d%d", price.book, page.book);', 'printf("%d%d", price::book, page::book);', 'printf("%d%d", price->book, page->book);', 'option_a'),
(62, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'Bitwise operators can operate upon ?', 'double and chars', 'floats and doubles', 'ints and floats', 'ints and chars', 'option_d'),
(63, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'What is C Tokens ?', 'The smallest individual units of c program', 'The basic element recognized by the compiler', 'The largest individual units of program', 'Both (a) & (b)', 'option_d'),
(64, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'What is Keywords ?', 'Keywords have some predefine meanings and these meanings can be changed', 'Keywords have some unknown meanings and these meanings cannot be changed', 'Keywords have some predefine meanings and these meanings cannot be changed', 'None of the above', 'option_c'),
(65, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'What is constant ?', 'Constants have fixed values that do not change during the execution of a program', 'Constants have fixed values that change during the execution of a program', 'Constants have unknown values that may be change during the execution of a program', 'None of the above', 'option_a'),
(66, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'Which is the right way to declare constant in C ?', 'int constant var =10;', 'int const var = 10;', 'const int var = 10;', 'B & C Both', 'option_d'),
(67, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'Which operators are known as Ternary Operator ?', '::, ?', '?, :', '?, ;;', 'None of the above', 'option_b'),
(68, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'In switch statement, each case instance value must be _______?', 'Constant', 'Variable', 'Special Symbol', 'None of the above', 'option_a'),
(69, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'What is the work of break keyword ?', 'Halt execution of program', 'Restart execution of program', 'Exit from loop or switch statement', 'None of the above', 'option_c'),
(70, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'what is function ?', 'Function is a block of statements that perform some specific task', 'Function is the fundamental modular unit. A function is usually designed to perform a specific task', 'Function is a block of code that performs a specific task. It has a name and it is reusable', 'All the above', 'option_d'),
(71, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'Which one of the following sentences is true ?', 'The body of a while loop is executed at least once', 'The body of a do ... while loop is executed at least once', 'The body of a do ... while loop is executed zero or more times', 'A for loop can never be used in place of a while loop', 'option_b'),
(72, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'Which of the following data structure is linear type?', 'Strings', 'queue', 'lists', 'all of the above', 'option_d'),
(73, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'The statement printf("%c", 100); will print ?', 'prints 100', 'print garbage', 'prints ASCII equivalent of 100', 'None of the above', 'option_c'),
(74, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'The _______ memory allocation function modifies the previous allocated space', 'calloc', 'free', 'malloc', 'realloc', 'option_d'),
(75, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'The "C" language is', 'Context free language', 'Context sensitive language', 'Regular language', 'None of the above', 'option_a'),
(76, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'C is ______ Language?', 'Low Level', 'High Level', 'Assembly Level', 'Machine Level', 'option_d'),
(77, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'The Default Parameter Passing Mechanism is called as', 'Call by Value', 'Call by Reference', 'Call by Address', 'Call by Name', 'option_a'),
(78, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'Which is the correct syntax to declare constant pointer?', 'int *const constPtr;', '*int constant constPtr;', 'const int *constPtr;', 'A and C both', 'option_d'),
(79, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'What will be the output of the following arithmetic expression ?\r\n5+3*2%10-8*6', '-37', '-42', '-32', '-28', 'option_a'),
(80, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'What will be the output of the following statement ?\r\nint a=10; printf("%d &i",a,10);', 'error', '10', '10 10', 'none of these', 'option_d'),
(81, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'What will be the output of the following statements ?\r\nint a = 4, b = 7,c; c = a = = b; printf("%i",c);', '0', 'error', '1', 'garbage value', 'option_a'),
(82, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'What will be the output of the following statements ?\r\nint x[4] = {1,2,3}; printf("%d %d %D",x[3],x[2],x[1]);', '03%D', '000', '032', '321', 'option_c'),
(83, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'What will be the output of the following statement ?\r\nprintf( 3 + "goodbye");', 'goodbye', 'odbye', 'bye', 'dbye', 'option_d'),
(84, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'What will be the output of following program ?\r\n#include\r\nmain()\r\n{\r\nint x,y = 10;\r\nx = y * NULL;\r\nprintf("%d",x);\r\n}', 'error', '0', '10', 'garbage value', 'option_b'),
(85, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'What will be the output of following statements ?\r\nchar x[ ] = "hello hi"; printf("%d%d",sizeof(*x),sizeof(x));', '88', '18', '29', '19', 'option_d'),
(86, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'void main()\r\n{\r\nint a=10,b=20;\r\nchar x=1,y=0;\r\nif(a,b,x,y)\r\n{\r\nprintf("EXAM");\r\n}\r\n}\r\nWhat is the output?', 'XAM is printed', 'exam is printed', 'Compiler Error', 'othing is printed', 'option_d'),
(87, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'What will happen if in a C program you assign a value to an array element whose subscript exceeds the size of array?', 'The element will be set to 0', 'The compiler would report an error', 'The program may crash if some important data gets overwritten', 'The array size would appropriately grow', 'option_c'),
(88, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'What will be output if you will compile and execute the following c code?\r\nvoid main()\r\n{\r\nif(printf("cquestionbank"))\r\nprintf("I know c");\r\nelse\r\nprintf("I know c++");\r\n}', 'I know c', 'I know c++', 'cquestionbankI know c', 'cquestionbankI know c++', 'option_c'),
(89, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'What will be output if you will compile and execute the following c code?\r\nvoid main(){\r\nint a,b;\r\na=1,3,15;\r\nb=(2,4,6);\r\nclrscr();\r\nprintf("%d ",a+b);\r\ngetch();\r\n}', '3', '21', '17', '7', 'option_d'),
(90, 'computer', 2, 'ADVANCED COMPUTER PROGRAMMING', 'What will be output if you will compile and execute the following c code?\r\nint extern x;\r\nvoid main()\r\nprintf("%d",x);\r\nx=2;\r\ngetch();\r\n}\r\nint x=23;', '0', '2', '23', 'compiler error', 'option_c'),
(91, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', '------- responsible for authorizing access to the database, for co-ordinating and monitoring its use, acquiring software, and hardware resources, controlling its use and  monitoring efficiency of operations.', 'Authorization Manager', 'Storage Manager', 'transaction Manager', 'Buffer Manager', 'option_d'),
(92, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', '------- is a property that describes various characteristics of an entity', 'ER Diagram', 'column', 'relationship', 'attribute', 'option_d'),
(93, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', '-------- level describes what data is stored in the database and the relationships among the data', 'Physical Level', 'Logical Level', 'Conceptual Level', 'None of the above', 'option_b'),
(94, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', '---------- denote derived attributes.', 'Double ellipse', 'Dashed ellipse', 'Squared ellipse', 'Ellipse with attribute name underlined', 'option_b'),
(95, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', 'A --------- is an association between entities', 'Relation', 'One to One', 'Generalization', 'Specialization', 'option_a'),
(96, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', '-------------  stores metadata about the structure of the data base', 'Physical data base', 'Query Analyzer', 'Data Dictionary', 'Data Catalog', 'option_c'),
(97, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', '------------is a collection of operations that perform s single logical function in  a database application', 'Transaction', 'Concurrent operation', 'Atomocity', 'Durability', 'option_a'),
(98, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', 'The problem that is compounded when constraints involve several data items from different files are Called --------', 'Transaction Control Management Problem', 'Security Problem', 'Integrity Problem', 'Durability Problem', 'option_c'),
(99, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', 'Ensuring atomicity is the responsibility of the ------------component', 'File Manager', 'buffer manager', 'dba', 'Transation Manager', 'option_d'),
(100, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', '-----manages the allocation of the space on the disk storage and the data base structure  used to represent information stored on disk', 'disk manager', 'File Manager', 'buffer manager', 'none of the above', 'option_b'),
(101, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', 'is the minimal super key', 'primary key', 'candidate key', 'surrogate key', 'unique key', 'option_b'),
(102, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', 'engine executes low level instructions generated by the DML compilier', 'DDL Analyzer', 'Query Interpreter', 'Database Engine', 'None of the above', 'option_d'),
(103, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', '------------responsible to define the content, the structure, the constraints, and functions or transactions against the database', 'Transcation Manager', 'Query Analyzer', 'DBA', 'All the above', 'option_c'),
(104, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', 'In  ER model -------------denote  derived attributes', 'Double ellipse', 'Diamond', 'Reactangle', 'None of the above', 'option_d'),
(105, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', 'Foreign Key can be null', 'true', 'false', 'both a & b', 'none of the above', 'option_a'),
(106, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', 'All   primary keys should be super keys.', 'true', 'false', 'both a & b', 'none of the above', 'option_a'),
(107, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', 'In   Relational database  Data is stored as record types and the  relationship is represented by set types', 'True', 'false', 'both a & b', 'none of the above', 'option_a'),
(108, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', 'In   Hierarchical database to get to a low-level table, you start at the root and work your way down the tree until you reach your target data.', 'true', 'false', 'both a & b', 'none of the above', 'option_a'),
(109, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', 'Using relational model we design conceptual   database design', 'true', 'false', 'both a & b', 'NONE OF THE ABOVE', 'option_b'),
(110, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', 'Conceptual data model is the source of   information   for logical design phase', 'true', 'false', 'both a & b', 'none of the above', 'option_a'),
(111, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', 'Logical database design describes describes base relations, file organizations, and indexes that are used to achieve efficient access to   data.', 'true', 'false', 'both a & b', 'none of the above', 'option_b'),
(112, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', 'Conceptual data modeling uses a high level data modeling concept of E-R Models', 'true', 'false', 'BOTH A & B', 'none of the above', 'option_a'),
(113, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', 'Tables are required to have at least one column', 'true', 'false', 'both a & b', 'none of the above', 'option_a'),
(114, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', 'Logical data independence. Refers to the separation of the external views from the conceptual view', 'true', 'false', 'both a & b', 'none of the above', 'option_a'),
(115, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', 'Duplication of data is the disadvantage of DBMS', 'true', 'false ', 'BOTH A & B', 'none of the above', 'option_b'),
(116, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', 'Candidate key can have a null value', 'true', 'false', 'both a & b', 'none of the above', 'option_b'),
(117, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', 'Each program maintains its own set of data. So users of one program may be unaware of potentially useful data held by other programs  this leads toDuplication of data', 'True', 'False', 'both a & b', 'none of the above', 'option_b'),
(118, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', 'A traditional database stores just data â€“ with no procedures', 'true', 'false', 'BOTH A & B', 'NONE OF THE ABOVE', 'option_a'),
(119, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', 'Simple Attribute  composed of multiple components, each with an independent existence.', 'true', 'false', 'both a & b', 'none of the above', 'option_b'),
(120, 'computer', 3, 'DATABSE MANAGEMENT SYSTEM', 'Cardinality specifies how many instances of an entity relate to one instance of another entity', 'true', 'false', 'both a & b', 'none of the above', 'option_a'),
(122, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'Which standard TCP port is assigned for contacting SSH servers ?', 'port 21', 'port 22', 'port 23', 'port 24', 'option_b'),
(123, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'Cardinality specifies how many instances of an entity relate to one instance of another entity', 'true', 'false', 'both a & b', 'none of the above', 'option_a'),
(124, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'Each program maintains its own set of data. So users of one program may be unaware of potentially useful data held by other programs  this leads toDuplication of data', 'True', 'False', 'both a & b', 'none of the above', 'option_b'),
(125, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'Each program maintains its own set of data. So users of one program may be unaware of potentially useful data held by other programs  this leads toDuplication of data', 'True', 'False', 'both a & b', 'none of the above', 'option_b'),
(126, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'Conceptual data model is the source of   information   for logical design phase', 'true', 'false', 'both a & b', 'none of the above', 'option_a'),
(127, 'it', 6, 'ANDROID APPS DEVELOPMENT', '-------------  stores metadata about the structure of the data base', 'Physical data base', 'Query Analyzer', 'Data Dictionary', 'Data Catalog', 'option_c'),
(128, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'The problem that is compounded when constraints involve several data items from different files are Called --------', 'Transaction Control Management Problem', 'Security Problem', 'Integrity Problem', 'Durability Problem', 'option_c'),
(129, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'Each program maintains its own set of data. So users of one program may be unaware of potentially useful data held by other programs  this leads toDuplication of data', 'True', 'False', 'both a & b', 'none of the above', 'option_b'),
(130, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'Each program maintains its own set of data. So users of one program may be unaware of potentially useful data held by other programs  this leads toDuplication of data', 'True', 'False', 'both a & b', 'none of the above', 'option_b'),
(131, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'Candidate key can have a null value', 'true', 'false', 'both a & b', 'none of the above', 'option_b'),
(132, 'it', 6, 'ANDROID APPS DEVELOPMENT', '------------is a collection of operations that perform s single logical function in  a database application', 'Transaction', 'Concurrent operation', 'Atomocity', 'Durability', 'option_a'),
(133, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'A --------- is an association between entities', 'Relation', 'One to One', 'Generalization', 'Specialization', 'option_a'),
(134, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'A --------- is an association between entities', 'Relation', 'One to One', 'Generalization', 'Specialization', 'option_a'),
(135, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'is the minimal super key', 'primary key', 'candidate key', 'surrogate key', 'unique key', 'option_b'),
(136, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'Which operators are known as Ternary Operator ?', '::, ?', '?, :', '?, ;;', 'None of the above', 'option_b'),
(137, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'Which one of the following sentences is true ?', 'The body of a while loop is executed at least once', 'The body of a do ... while loop is executed at least once', 'The body of a do ... while loop is executed zero or more times', 'A for loop can never be used in place of a while loop', 'option_b'),
(138, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'what is function ?', 'Function is a block of statements that perform some specific task', 'Function is the fundamental modular unit. A function is usually designed to perform a specific task', 'Function is a block of code that performs a specific task. It has a name and it is reusable', 'All the above', 'option_d'),
(139, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'What is constant ?', 'Constants have fixed values that do not change during the execution of a program', 'Constants have fixed values that change during the execution of a program', 'Constants have unknown values that may be change during the execution of a program', 'None of the above', 'option_a'),
(140, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'The Default Parameter Passing Mechanism is called as', 'Call by Value', 'Call by Reference', 'Call by Address', 'Call by Name', 'option_a'),
(141, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'What will be the output of the following statements ?\r\nint a = 4, b = 7,c; c = a = = b; printf("%i",c);', '0', 'error', '1', 'garbage value', 'option_a'),
(142, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'What will be the output of the following statements ?\r\nint x[4] = {1,2,3}; printf("%d %d %D",x[3],x[2],x[1]);', '03%D', '000', '032', '321', 'option_c'),
(143, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'What will be the output of following program ?\r\n#include\r\nmain()\r\n{\r\nint x,y = 10;\r\nx = y * NULL;\r\nprintf("%d",x);\r\n}', 'error', '0', '10', 'garbage value', 'option_b'),
(144, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'What will be the output of the following statements ?\r\nint a = 4, b = 7,c; c = a = = b; printf("%i",c);', '0', 'error', '1', 'garbage value', 'option_a'),
(145, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'What will be the output of the following statements ?\r\nint x[4] = {1,2,3}; printf("%d %d %D",x[3],x[2],x[1]);', '03%D', '000', '032', '321', 'option_c'),
(146, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'Which is the right way to declare constant in C ?', 'int constant var =10;', 'int const var = 10;', 'const int var = 10;', 'B & C Both', 'option_d'),
(147, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'What will happen if in a C program you assign a value to an array element whose subscript exceeds the size of array?', 'The element will be set to 0', 'The compiler would report an error', 'The program may crash if some important data gets overwritten', 'The array size would appropriately grow', 'option_c'),
(148, 'it', 6, 'ANDROID APPS DEVELOPMENT', '------- responsible for authorizing access to the database, for co-ordinating and monitoring its use, acquiring software, and hardware resources, controlling its use and  monitoring efficiency of operations.', 'Authorization Manager', 'Storage Manager', 'transaction Manager', 'Buffer Manager', 'option_d'),
(149, 'it', 6, 'ANDROID APPS DEVELOPMENT', '------- responsible for authorizing access to the database, for co-ordinating and monitoring its use, acquiring software, and hardware resources, controlling its use and  monitoring efficiency of operations.', 'Authorization Manager', 'Storage Manager', 'transaction Manager', 'Buffer Manager', 'option_d'),
(150, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'Which one of the following is not used to generate dynamic web pages?', 'PHP', 'asp.net', 'jsp', 'none of the mentioned', 'option_d'),
(151, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'Which one of the following is not used to generate dynamic web pages?', 'PHP', 'asp.net', 'jsp', 'none of the mentioned', 'option_d'),
(152, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'Which one of the following is not used to generate dynamic web pages?', 'PHP', 'asp.net', 'jsp', 'none of the mentioned', 'option_d'),
(153, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'If you want to find the number of routers between a source and destination, the utility to be used is', 'route', 'Ipconfig', 'Ifconfig', 'Traceroute', 'option_d'),
(154, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'If you want to find the number of routers between a source and destination, the utility to be used is', 'route', 'Ipconfig', 'Ifconfig', 'Traceroute', 'option_d'),
(155, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'What is the right way to access value of structure variable book{ price, page } ?', 'printf("%d%d", book.price, book.page);', 'printf("%d%d", price.book, page.book);', 'printf("%d%d", price::book, page::book);', 'printf("%d%d", price->book, page->book);', 'option_a'),
(156, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'Which of the following is allowed in a C Arithmetic instruction', '[]', '{}', '()', 'none of the above', 'option_c'),
(157, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'What is right way to Initialization array?', 'int num[6] = { 2, 4, 12, 5, 45, 5 } ;', 'int n{} = { 2, 4, 12, 5, 45, 5 } ;', 'int n{6} = { 2, 4, 12 } ;', 'int n(6) = { 2, 4, 12, 5, 45, 5 } ;', 'option_a'),
(158, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'The TTL field has value 10. How many routers (max) can process this datagram ?', '11', '5', '10', '9', 'option_c'),
(159, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'Bitwise operators can operate upon ?', 'double and chars', 'floats and doubles', 'ints and floats', 'ints and chars', 'option_d'),
(160, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'Transport layer aggregates data from different applications into a single stream before passing it to', 'network layer', 'data link layer', 'application layer', 'physical layer', 'option_a'),
(161, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'What is the access point (AP) in wireless LAN?', 'device that allows wireless devices to connect to a wired network', 'wireless devices itself', 'both (a) and (b)', 'none of the mentioned', 'option_a'),
(162, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'Which one of the following is a transport layer protocol ?', 'stream control transmission protocol', 'internet control message protocol', 'neighbor discovery protocol', 'dynamic host configuration protocol', 'option_a'),
(163, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'Which standard TCP port is assigned for contacting SSH servers ?', 'port 21', 'port 22', 'port 23', 'port 24', 'option_b'),
(164, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'The 4 byte IP address consists of', 'network address', 'host address', 'both (a) and (b)', 'none of the mentioned', 'option_c'),
(165, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'Data communication system spanning states, countries, or the whole world is', 'lan', 'man', 'wan', 'none of the mentioned', 'option_c'),
(166, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'What is the right way to access value of structure variable book{ price, page } ?', 'printf("%d%d", book.price, book.page);', 'printf("%d%d", price.book, page.book);', 'printf("%d%d", price::book, page::book);', 'printf("%d%d", price->book, page->book);', 'option_a'),
(167, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'The TTL field has value 10. How many routers (max) can process this datagram ?', '11', '5', '10', '9', 'option_c'),
(168, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'Which of the following shows the correct hierarchy of arithmetic operations in C', '/ + * -', '* - / +', '+ - / *', '* / + -', 'option_d'),
(169, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'What is the right way to access value of structure variable book{ price, page } ?', 'printf("%d%d", book.price, book.page);', 'printf("%d%d", price.book, page.book);', 'printf("%d%d", price::book, page::book);', 'printf("%d%d", price->book, page->book);', 'option_a'),
(170, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'What is the right way to access value of structure variable book{ price, page } ?', 'printf("%d%d", book.price, book.page);', 'printf("%d%d", price.book, page.book);', 'printf("%d%d", price::book, page::book);', 'printf("%d%d", price->book, page->book);', 'option_a'),
(171, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'The statement printf("%c", 100); will print ?', 'prints 100', 'print garbage', 'prints ASCII equivalent of 100', 'None of the above', 'option_c'),
(172, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'What will be the output of the following statement ?\r\nint a=10; printf("%d &i",a,10);', 'error', '10', '10 10', 'none of these', 'option_d'),
(173, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'What will be the output of the following statements ?\r\nint x[4] = {1,2,3}; printf("%d %d %D",x[3],x[2],x[1]);', '03%D', '000', '032', '321', 'option_c'),
(174, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'What will be the output of the following statements ?\r\nint x[4] = {1,2,3}; printf("%d %d %D",x[3],x[2],x[1]);', '03%D', '000', '032', '321', 'option_c'),
(175, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'What will be output if you will compile and execute the following c code?\r\nvoid main()\r\n{\r\nif(printf("cquestionbank"))\r\nprintf("I know c");\r\nelse\r\nprintf("I know c++");\r\n}', 'I know c', 'I know c++', 'cquestionbankI know c', 'cquestionbankI know c++', 'option_c'),
(176, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'What will be output if you will compile and execute the following c code?\r\nint extern x;\r\nvoid main()\r\nprintf("%d",x);\r\nx=2;\r\ngetch();\r\n}\r\nint x=23;', '0', '2', '23', 'compiler error', 'option_c'),
(177, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'What will be output if you will compile and execute the following c code?\r\nvoid main()\r\n{\r\nif(printf("cquestionbank"))\r\nprintf("I know c");\r\nelse\r\nprintf("I know c++");\r\n}', 'I know c', 'I know c++', 'cquestionbankI know c', 'cquestionbankI know c++', 'option_c'),
(178, 'it', 6, 'ANDROID APPS DEVELOPMENT', 'What will be output if you will compile and execute the following c code?\r\nint extern x;\r\nvoid main()\r\nprintf("%d",x);\r\nx=2;\r\ngetch();\r\n}\r\nint x=23;', '0', '2', '23', 'compiler error', 'option_c'),
(179, 'biomedical', 1, 'ENGLISH', 'quest 1', 'Option 1', 'OPTION 2', 'OPTION 3', 'OPTION 4', 'option_a');

-- --------------------------------------------------------

--
-- Table structure for table `reg_examiner_gpa`
--

CREATE TABLE IF NOT EXISTS `reg_examiner_gpa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `branch` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(10) NOT NULL,
  `cdate` datetime NOT NULL,
  `mdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Registration Table for Examiner' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `reg_examiner_gpa`
--

INSERT INTO `reg_examiner_gpa` (`id`, `fname`, `lname`, `gender`, `branch`, `email`, `phone`, `cdate`, `mdate`) VALUES
(6, 'Kinjal', 'patel', 'female', 'Computer Engineering', 'kinjalpatel@gmail.com', 98470987, '2015-03-15 07:29:35', '2015-04-03 08:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `reg_gpa`
--

CREATE TABLE IF NOT EXISTS `reg_gpa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `enroll` int(12) NOT NULL,
  `sem` int(2) NOT NULL,
  `branch` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(120) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pin` int(6) NOT NULL,
  `cdate` datetime NOT NULL,
  `mdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Registration Table of OES_GPA' AUTO_INCREMENT=24 ;

--
-- Dumping data for table `reg_gpa`
--

INSERT INTO `reg_gpa` (`id`, `fname`, `lname`, `gender`, `enroll`, `sem`, `branch`, `dob`, `email`, `phone`, `address`, `city`, `pin`, `cdate`, `mdate`) VALUES
(19, 'Vish', 'Soni', 'female', 7020, 0, 'computer', '1996-10-30', 'vishsoni30@gmail.com', 21, 'Bado Pol', 'AHMEDABAD', 380001, '2015-03-07 08:29:12', NULL),
(20, 'sagar', 'jasani', 'male', 1212, 4, 'computer', '2015-03-20', 'sagarjasani@gmail.com', 2147483647, 'maninagar', 'JUNAGADH', 362001, '2015-03-07 06:18:35', '2015-03-17 11:05:06'),
(21, 'Gunjan', 'panara', 'male', 123, 0, 'automobile', '0010-10-10', 'panaragunjan@gmail.com', 4646, 'BOPAL-58\r\nINDUCTOTHERM', 'AHMEDABAD', 565, '2015-03-08 05:18:20', NULL),
(22, 'Vijay', 'kjl', 'male', 123123, 0, 'automobile', '0122-10-10', 'abc@gmail.com', 236, '23213,LJKJKLJMKL', 'MKLML', 1254, '2015-03-08 05:22:04', NULL),
(23, 'hello', 'ABD', 'female', 4151, 0, 'automobile', '0010-10-10', 'vishsoni30@gmail.com', 465456, 'NJKFNKJ', 'NJKN', 5465, '2015-03-08 05:27:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `result_gpa`
--

CREATE TABLE IF NOT EXISTS `result_gpa` (
  `result_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `obtain_marks` int(3) NOT NULL,
  `total_marks` int(3) NOT NULL,
  PRIMARY KEY (`result_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Result Table for Examination' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

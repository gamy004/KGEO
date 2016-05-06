
-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 68.178.137.179
-- Generation Time: Dec 10, 2013 at 01:24 AM
-- Server version: 5.0.96
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `KGEODB`
--

-- --------------------------------------------------------

--
-- Table structure for table `ARTICLETYPELOOKUP`
--

DROP TABLE IF EXISTS `ARTICLETYPELOOKUP`;
CREATE TABLE `ARTICLETYPELOOKUP` (
  `Id` int(11) NOT NULL,
  `MsgKey` char(15) NOT NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ARTICLETYPELOOKUP`
--

INSERT INTO `ARTICLETYPELOOKUP` VALUES(1, 'ARTY00001');
INSERT INTO `ARTICLETYPELOOKUP` VALUES(2, 'ARTY00002');
INSERT INTO `ARTICLETYPELOOKUP` VALUES(3, 'ARTY00003');

-- --------------------------------------------------------

--
-- Table structure for table `COLLABORATOR`
--

DROP TABLE IF EXISTS `COLLABORATOR`;
CREATE TABLE `COLLABORATOR` (
  `CollaboratorId` int(11) NOT NULL,
  `NameId` varchar(15) NOT NULL,
  `Type` char(1) NOT NULL,
  `PicId` int(11) default NULL,
  `Website` varchar(300) default NULL,
  PRIMARY KEY  (`CollaboratorId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `COLLABORATOR`
--

INSERT INTO `COLLABORATOR` VALUES(1, 'COLL00001', 'c', 4, 'www.dwr.go.th/‎');
INSERT INTO `COLLABORATOR` VALUES(2, 'COLL00002', 'c', 5, 'www.egat.co.th');
INSERT INTO `COLLABORATOR` VALUES(3, 'COLL00003', 'p', 6, 'www2.kmutt.ac.th/en_index.aspx');
INSERT INTO `COLLABORATOR` VALUES(5, 'COLL00005', 'p', 8, 'www.innosoft.kmutt.ac.th');
INSERT INTO `COLLABORATOR` VALUES(6, 'COLL00006', 'p', 9, 'www.cpe.kmutt.ac.th');
INSERT INTO `COLLABORATOR` VALUES(7, 'COLL00007', 'p', 10, 'science.kmutt.ac.th/mth');
INSERT INTO `COLLABORATOR` VALUES(4, 'COLL00004', 'p', 7, 'fibo.kmutt.ac.th/');
INSERT INTO `COLLABORATOR` VALUES(8, 'COLL00008', 'c', 14, 'www.bangkok.go.th/th/main/index.php');

-- --------------------------------------------------------

--
-- Table structure for table `CONTENTTEXT`
--

DROP TABLE IF EXISTS `CONTENTTEXT`;
CREATE TABLE `CONTENTTEXT` (
  `MsgKey` varchar(15) NOT NULL,
  `Lang` char(3) NOT NULL,
  `TextMsg` text,
  PRIMARY KEY  (`MsgKey`,`Lang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CONTENTTEXT`
--

INSERT INTO `CONTENTTEXT` VALUES('COLL00001', 'eng', 'Department of water resource');
INSERT INTO `CONTENTTEXT` VALUES('COLL00001', 'tha', 'กรมทรัพยากรน้ำ');
INSERT INTO `CONTENTTEXT` VALUES('COLL00002', 'eng', 'Electricity Generating Authority of Thailand');
INSERT INTO `CONTENTTEXT` VALUES('COLL00002', 'tha', 'การไฟฟ้าฝ่ายผลิตแห่งประเทศไทย');
INSERT INTO `CONTENTTEXT` VALUES('COLL00003', 'tha', 'มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี');
INSERT INTO `CONTENTTEXT` VALUES('COLL00004', 'eng', 'Institute of Field Robotics');
INSERT INTO `CONTENTTEXT` VALUES('COLL00005', 'eng', 'Software and Computing Innovation Center');
INSERT INTO `CONTENTTEXT` VALUES('COLL00005', 'tha', 'ศูนย์นวัตกรรมซอฟต์แวร์และการประมวลผล');
INSERT INTO `CONTENTTEXT` VALUES('COLL00006', 'eng', 'KMUTT Computer Engineering Department');
INSERT INTO `CONTENTTEXT` VALUES('COLL00006', 'tha', 'ภาควิชาวิศวกรรมคอมพิวเตอร์ มจธ.');
INSERT INTO `CONTENTTEXT` VALUES('COLL00007', 'eng', 'KMUTT Mathematics Department');
INSERT INTO `CONTENTTEXT` VALUES('COLL00007', 'tha', 'ภาควิชาคณิตศาสตร์ มจธ.');
INSERT INTO `CONTENTTEXT` VALUES('COLL00004', 'tha', 'สถาบันวิทยาการหุ่นยนต์ภาคสนาม');
INSERT INTO `CONTENTTEXT` VALUES('STAF00001', 'eng', 'Dr. Pariwate Varnakovida');
INSERT INTO `CONTENTTEXT` VALUES('STAF00001', 'tha', 'ดร. ปริเวท วรรณโกวิท');
INSERT INTO `CONTENTTEXT` VALUES('STAF00002', 'eng', 'Director');
INSERT INTO `CONTENTTEXT` VALUES('STAF00002', 'tha', 'ผู้อำนวยการ');
INSERT INTO `CONTENTTEXT` VALUES('STAF00004', 'eng', 'Dr. Sally E. Goldin');
INSERT INTO `CONTENTTEXT` VALUES('STAF00005', 'eng', 'Project Development Specialist');
INSERT INTO `CONTENTTEXT` VALUES('STAF00007', 'eng', 'Kurt T. Rudahl');
INSERT INTO `CONTENTTEXT` VALUES('STAF00004', 'tha', 'Dr. Sally E. Goldin');
INSERT INTO `CONTENTTEXT` VALUES('STAF00007', 'tha', 'Kurt T. Rudahl');
INSERT INTO `CONTENTTEXT` VALUES('STAF00008', 'eng', 'Project Development Specialist ');
INSERT INTO `CONTENTTEXT` VALUES('STAF00010', 'eng', 'Thananan Prasartvit');
INSERT INTO `CONTENTTEXT` VALUES('STAF00010', 'tha', 'ธนนันท์ ประศาสน์วิทย์');
INSERT INTO `CONTENTTEXT` VALUES('STAF00011', 'eng', 'Software Engineer');
INSERT INTO `CONTENTTEXT` VALUES('STAF00011', 'tha', 'วิศวกรซอฟต์แวร์');
INSERT INTO `CONTENTTEXT` VALUES('STAF00013', 'eng', 'Farida Duriyapong');
INSERT INTO `CONTENTTEXT` VALUES('STAF00013', 'tha', 'ฟาริดา ดุริยะพงศ์');
INSERT INTO `CONTENTTEXT` VALUES('STAF00014', 'eng', 'GIS Specialist');
INSERT INTO `CONTENTTEXT` VALUES('STAF00014', 'tha', 'ผู้เชี่ยวชาญด้านระบบภูมิศาสตร์สารสนเทศ');
INSERT INTO `CONTENTTEXT` VALUES('STAF00005', 'tha', 'ผู้เชี่ยวชาญฝ่ายพัฒนาโครงการ');
INSERT INTO `CONTENTTEXT` VALUES('STAF00008', 'tha', 'ผู้เชี่ยวชาญฝ่ายพัฒนาโครงการ');
INSERT INTO `CONTENTTEXT` VALUES('STAF00006', 'tha', 'B.A., M.A., Brown University; M.Sc., Ph.D., Carnegie-Mellon University. <br><br>\r\n\r\n<b>ความเชี่ยวชาญและความสนใจ:</b><br><br>\r\n\r\n<li>GIS algorithms and architecture</li>\r\n\r\n<li>User Interface Design</li>\r\n\r\n<li>Visualization</li>\r\n\r\n<li>Knowledge-based Systems</li>\r\n\r\n<li>Mobile applications</li>\r\n\r\n<li>Software development methodology</li>\r\n\r\n<li>Project management</li>');
INSERT INTO `CONTENTTEXT` VALUES('STAF00012', 'eng', 'B.Eng. , M.Eng., King Mongkut''s University of Technology Thonburi.  <br><br>\r\n\r\n<b>Specialties include:</b><br><br>\r\n\r\n<li>Data analysis</li>\r\n\r\n<li>Web application architecture</li>\r\n\r\n<li>Databases</li>\r\n\r\n<li>Optimization algorithms</li>');
INSERT INTO `CONTENTTEXT` VALUES('STAF00006', 'eng', 'B.Sc., New York University; M.Sc., University of Wisconsin at Madison.<br><br>\r\n\r\n<b>Specialties include:</b><br><br>\r\n\r\n<li>Image processing and Graphics</li>\r\n\r\n<li>Embedded systems and Sensors</li>\r\n\r\n<li>Parallel and Distributed computing</li>\r\n\r\n<li>High performance systems</li>\r\n\r\n<li>Cross-platform computing</li>\r\n\r\n<li>Entrepreneurship</li>');
INSERT INTO `CONTENTTEXT` VALUES('STAF00003', 'eng', 'B.Sc. Chiang Mai University; M.Sc. Mahidol University; Ph.D. Michigan State University.<br><br>\r\n\r\n<b>Specialities include: </b><br><br>\r\n\r\n<li>Urban and Environmental Models</li>\r\n\r\n<li>Remote sensing</li>\r\n\r\n<li>Computer simulation</li>\r\n\r\n<li>Sustainable development</li>\r\n\r\n<li>Spatial statistics</li>');
INSERT INTO `CONTENTTEXT` VALUES('STAF00015', 'tha', ' ศศ.บ. มหาวิทยาลัยเกษตรศาสตร์; วท.ม. มหาวิทยาลัยมหิดล.<br><br>\r\n\r\n<b>ความเชี่ยวชาญและความสนใจ:</b><br><br>\r\n\r\n<li>การออกแบบและพัฒนาระบบภูมิศาสตร์สารสนเทศ</li>\r\n\r\n<li>ระบบสื่อสารมวลชน</li>\r\n\r\n<li>การจัดการโครงการด้านภูมิศาสตร์สารสนเทศ</li>');
INSERT INTO `CONTENTTEXT` VALUES('STAF00015', 'eng', 'B.A. Kasetsart University, M.Sc. Mahidol University.  <br><br>\r\n\r\n<b>Specialties include:</b><br><br>\r\n\r\n<li>GIS application design and implementation</li>\r\n\r\n<li>Communications</li>\r\n\r\n<li>GIS project management</li>');
INSERT INTO `CONTENTTEXT` VALUES('STAF00003', 'tha', 'วท.บ. มหาวิทยาลัยเชียงใหม่; วท.ม. มหาวิทยาลัยมหิดล; ปริญญาเอก มหาวิทยาลัยมิชิแกนสเตท <br><br>\r\n\r\n<b>ความเชี่ยวชาญและความสนใจ:</b><br><br>\r\n\r\n<li>Urban and Environmental Models</li>\r\n\r\n<li>การประมวลผลภาพระยะไกล</li>\r\n\r\n<li>Computer simulation</li>\r\n\r\n<li>Sustainable development</li>\r\n\r\n<li>สถิติเชิงพื้นที่</li>');
INSERT INTO `CONTENTTEXT` VALUES('COLL00003', 'eng', 'KMUTT');
INSERT INTO `CONTENTTEXT` VALUES('NEWS00006', 'eng', 'kGeo will have a booth at GISTDA''s annual geospatial conference, GeoInfoTech, which will be organized from 25-27 December at Impact Muang Thong Thani conference center. Attendees to the conference are invited to visit us, view our project showcase, and discuss their needs for geospatial engineering expertise.');
INSERT INTO `CONTENTTEXT` VALUES('COLL00008', 'eng', 'Bangkok Metropolitan Administration');
INSERT INTO `CONTENTTEXT` VALUES('COLL00008', 'tha', 'กรุงเทพมหานคร');
INSERT INTO `CONTENTTEXT` VALUES('STAF00016', 'eng', 'Dr. Supanee Tanathong');
INSERT INTO `CONTENTTEXT` VALUES('STAF00016', 'tha', 'ดร. สุพรรณี ตะนะทอง');
INSERT INTO `CONTENTTEXT` VALUES('STAF00017', 'eng', 'Researcher and Software Engineer');
INSERT INTO `CONTENTTEXT` VALUES('STAF00017', 'tha', 'นักวิจัยและวิศวกรซอฟต์แวร์');
INSERT INTO `CONTENTTEXT` VALUES('STAF00018', 'eng', 'B.Eng., M.Eng., King Mongkut''s University of Technology Thonburi; Ph.D. University of Seoul.<br><br>\r\n\r\n<b>Specialties include:</b><br><br>\r\n\r\n<li>Computer vision</li>\r\n\r\n<li>Image processing</li>\r\n\r\n<li>Software development</li>\r\n\r\n<li>Photogrammetry</li>\r\n\r\n<li>Information security</li>\r\n\r\n<li>Project management</li>');
INSERT INTO `CONTENTTEXT` VALUES('PROD00002', 'eng', 'Research and Development Projects ');
INSERT INTO `CONTENTTEXT` VALUES('PROD00002', 'tha', 'โครงการวิจัยและพัฒนา');
INSERT INTO `CONTENTTEXT` VALUES('STAF00009', 'eng', 'B.Sc., New York University; M.Sc., University of Wisconsin at Madison.<br><br>\r\n\r\n<b>Specialties include:</b><br><br>\r\n\r\n<li>Image processing and Graphics</li>\r\n\r\n<li>Embedded systems and Sensors</li>\r\n\r\n<li>Parallel and Distributed computing</li>\r\n\r\n<li>High performance systems</li>\r\n\r\n<li>Cross-platform computing</li>\r\n\r\n<li>Entrepreneurship</li>');
INSERT INTO `CONTENTTEXT` VALUES('PROD00005', 'eng', '<p>\r\n\r\n<li>System architecture and design</li>\r\n\r\n<li>Data development (field data, remote sensing)</li>\r\n\r\n<li>Education and training in spatially related topics</li>\r\n\r\n<li>Impartial review and evaluation of proposals and terms of reference (TOR) for feasibility and technical merit</li>\r\n\r\n</p>');
INSERT INTO `CONTENTTEXT` VALUES('PROD00004', 'eng', 'Short Term Consulting');
INSERT INTO `CONTENTTEXT` VALUES('PROD00003', 'eng', 'kGeo undertakes research and development projects for government entities, commercial entities, and non-profit groups.<br>\r\n\r\n<b>Areas of expertise include:</b><br>\r\n\r\n<li>Custom design and development of geospatial information systems for agriculture, water resource management, environmental monitoring, business development and planning, infrastructure planning, public health, and many other applications</li>\r\n\r\n<li>Processing and analysis of imagery from satellites, manned and unmanned aerial vehicles as well as oblique imagery</li>\r\n\r\n<li>Design and prototyping of environmental sensors and integration of sensors into information systems</li>\r\n\r\n<li>Design and development of location-enabled mobile applications</li>\r\n\r\n<li>Development and testing of analytic and predictive models with a spatial component</li>\r\n\r\n<li>Development of educational tools and materials related to geospatial topics.</li>\r\n\r\n');
INSERT INTO `CONTENTTEXT` VALUES('PROD00004', 'tha', 'การให้คำปรึกษาระยะสั้น');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00005', 'eng', 'Department of Water Resources');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00004', 'eng', 'Project to Manage and Plan Restoring and Protecting Water Sources (Lampradong) and Community Involvement, Amphoe Amphawa, Samut Songkram Province');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00005', 'tha', 'กรมทรัพยากรน้ำ');
INSERT INTO `CONTENTTEXT` VALUES('STAF00009', 'tha', 'B.Sc., New York University; M.Sc., University of Wisconsin at Madison.<br><br>\r\n\r\n<b>ความเชี่ยวชาญและความสนใจ:</b><br><br>\r\n\r\n<li>การประมวลผลภาพและกราฟิก</li>\r\n\r\n<li>ระบบสมองกลฝังตัวและเซนเซอร์</li>\r\n\r\n<li>การประมวลแบบกระจายและขนาน</li>\r\n\r\n<li>ระบบประมวลผลความเร็วสูง</li>\r\n\r\n<li>Cross-platform computing</li>\r\n\r\n<li>Entrepreneurship</li>');
INSERT INTO `CONTENTTEXT` VALUES('STAF00012', 'tha', 'วศ.บ. วศ.ม. มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี.<br><br>\r\n\r\n<b>ความเชี่ยวชาญและความสนใจ:</b><br><br>\r\n\r\n<li>การวิเคราะห์ข้อมูล</li>\r\n\r\n<li>สถาปัตยกรรมโปรแกรมประยุกต์บนเว็บ</il>\r\n\r\n<li>ระบบฐานข้อมูล</li>\r\n\r\n<li>Optimization algorithms</li>');
INSERT INTO `CONTENTTEXT` VALUES('STAF00018', 'tha', 'วศ.บ. วศ.ม. มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี; ปริญญาเอก University of Seoul.<br><br>\r\n\r\n<b>ความเชี่ยวชาญและความสนใจ:</b><br><br>\r\n\r\n<li>Computer vision</li>\r\n\r\n<li>Image processing</li>\r\n\r\n<li>Software development</li>\r\n\r\n<li>Photogrammetry</li>\r\n\r\n<li>Information security</li>\r\n\r\n<li>Project management</li>');
INSERT INTO `CONTENTTEXT` VALUES('PROD00005', 'tha', '<p>\r\n\r\n<li>ด้านสถาปัตยกรรมและการออกแบบระบบ</li>\r\n\r\n<li>ด้านการพัฒนาระบบข้อมูล(ข้อมูลภาคสนาม, ข้อมูลการสำรวจระยะไกล)</li>\r\n\r\n<li>ด้านการให้ความรู้และการจัดฝึกอบรมในเรื่องที่เกี่ยวข้องกับข้อมูลด้านภูมิศาสตร์</li>\r\n\r\n<li>ด้านการให้การตรวจสอบและประเมินแผนงาน (proposal) และข้อกำหนดโครงการ (terms of reference) อย่างเที่ยงตรงและเป็นกลาง ในแง่ความเป็นไปได้และความเหมาะสมต่างๆ</li>\r\n\r\n</p>');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00009', 'eng', '<strong><i>Goals and Activities: </i></strong>kGeo is designing and developing a system to visualize the three dimensional structure of canals using data gathered by a robotic boat. The system integrates laser scanning data, depth soundings and GPS to provide a flexible, easily understood presentation of the width, depth, bank height and bottom profiles of waterways in the Bangkok area.');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00007', 'eng', '3D Canal Mapping');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00007', 'tha', 'แผนที่คลองสามมิติ');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00008', 'eng', 'Hydro and Agro Informatics Institute');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00008', 'tha', 'สถาบันสารสนเทศทรัพยากรน้ำและการเกษตร (องค์การมหาชน)');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00004', 'tha', 'โครงการจัดทำแผนอนุรักษ์ฟื้นฟูแหล่งน้ำลำประโดงและวิถีชุมชน อำเภออัมพวา จังหวัดสมุทรสงคราม');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00006', 'eng', '<strong><i>Goals and Activities: </i></strong> kGeo is designing and developing a web-based geospatial information system for subdistrict leaders and local people. The interactive mapping system will allow these users to locate the small canals known as lampradong, understand the characteristics and status of each lampradong, and make plans to use these resources in the most appropriate way. Kgeo is also conducting an extensive field survey operation to gather the required spatial data for this project. ');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00010', 'eng', 'Water in Your Pocket');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00010', 'tha', 'Water in Your Pocket');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00011', 'eng', 'Royal Irrigation Department ');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00011', 'tha', 'กรมชลประทาน');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00013', 'eng', 'Mr. Chanon Pansamut');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00013', 'tha', 'นายชานนท์ ปานสมุทร');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00009', 'tha', '<strong><i>เป้าหมายและการดำเนินการ: </i></strong>ดำเนินการออกแบบและพัฒนาระบบจำลองโครงสร้างของคลองในรูปแบบสามมิติ โดยใช้ข้อมูลที่เก็บรวบรวมได้จากเรือหุ่นยนต์ โดยระบบจะนำข้อมูลทั้งหมดซึ่งประกอบไปด้วย  ข้อมูลที่ได้จากการรังวัดด้วยเลเซอร์ (ความกว้างคลอง) เสียง (ความลึกคลอง ) และจีพีเอช มาคำนวณและวิเคราะห์ร่วมกัน เพื่อให้ระบบแผนที่คลองสามมิติที่จัดสร้างขึ้นนี้มีความยืดหยุ่น และสามารถนำเสนอข้อมูลของลำคลอง เช่น ความกว้าง ความลึก  ความสูงตลิ่ง รวมไปถึงลักษณะท้องคลอง ในพื้นที่ต่างๆ ของกรุงเทพมหานครให้มีรูปแบบที่เข้าใจได้ง่ายขึ้น');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00014', 'eng', 'FloodFinder');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00014', 'tha', 'FloodFinder');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00015', 'eng', 'United States Agency for International Development (USAID)');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00006', 'tha', '<strong><i>เป้าหมายและการดำเนินการ: </i></strong>เคจีโอจะเป็นผู้ดำเนินการออกแบบและพัฒนาระบบภูมิศาสตร์สารสนเทศบนระบบเว็บแอพลิเคชั่น สำหรับเจ้าหน้าที่และผู้คนในท้องถิ่น โดยระบบที่จัดทำขึ้นนี้ประกอบได้ด้วย แผนที่แบบโต้ตอบอัตโนมัติซึ่งจะช่วยให้ผู้ใช้งานสามารถค้นหาลำคลองขนาดเล็ก หรือที่เรียกว่า “ลำประโดง” ได้ นอกจากนี้ผู้ใช้งานยังจะสามารถเข้าใจลักษณะ รวมไปถึงสถานะการใช้งานของลำประโดงต่างๆ เพื่อที่จะวางแผนการจัดการและอนุรักษ์ทรัพยากรเหล่านี้อย่างเหมาะสมที่สุด ทั้งนี้ เคจีโอยังมีส่วนร่วมดำเนินการ ด้านการสำรวจลักษณะทางภูมิศาสตร์อื่นๆ เพื่อรวบรวมข้อมูลเชิงพื้นที่ที่จำเป็นต้องใช้สำหรับโครงการนี้อีกด้วย');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00016', 'eng', '<strong><i>Goals and Activities: </i></strong>FloodFinder is an innovative mobile application for gathering and disseminating information during a flood disaster. FloodFinder measures the level of flood waters by applying image processing algorithms to photos of partially submerged objects taken by the user. Water level information is sent to a server for aggregation. Information about flood levels in selected regions and time periods can then be displayed on a map using either the mobile application or a regular web-browser. <br><br>FloodFinder won first prize in the 2011 Students with Solutions mobile application competition sponsored by USAID. The authors are currently working on an enhanced version that can display remotely sensed images as background for the flood map.');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00017', 'eng', 'Ms. Boosapan Pongsiriyaporn, Mr. Chattriya Jariyavajee,  Mr. Nattaphat Laoharawee, Mr. Nuntipat Narkthong, Mr. Tanapon Pitichat');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00015', 'tha', 'องค์กรเพื่อการพัฒนาระหว่างประเทศแห่งสหรัฐฯ');
INSERT INTO `CONTENTTEXT` VALUES('PROD00003', 'tha', 'เคจีโอรองรับการพัฒนาและโครงการวิจัย ทั้งจากหน่วยงานภาครัฐ หน่วยงานเชิงพาณิชย์ และกลุ่มที่ไม่แสวงหากำไร<br>\r\n\r\n<b>โคยเคจีโอมีศักยภาพและความเชี่ยวชาญครอบคลุมในด้านต่างๆ ดังนี้:</b><br>\r\n\r\n<li>การออกแบบและการพัฒนาระบบ อุปกรณ์หรือเครื่องมือเฉพาะทาง ที่เกี่ยวข้องกับระบบข้อมูลเชิงพื้นที่ เพื่อการเกษตร การจัดการทรัพยากรน้ำ การตรวจสอบด้านสิ่งแวดล้อม การพัฒนาธุรกิจ และการวางแผนการโครงการ ระบบสาธารณูปโภคพื้นฐาน ระบบสาธารณสุข และการประยุกต์ใช้อื่น ๆ</li>\r\n\r\n<li>การประมวลผลและการวิเคราะห์ภาพถ่ายดาวเทียม ระบบอากาศยานและระบบอากาศยานไร้คนขับ และระบบภาพออบลิค</li>\r\n\r\n<li>การออกแบบและจัดทำต้นแบบของเซ็นเซอร์ด้านสิ่งแวดล้อม และการบูรณาการระบบเซ็นเซอร์เข้ากับระบบข้อมูล</li>\r\n\r\n<li>การออกแบบและการพัฒนาแอพพลิเคชั่นด้าน location-enabled mobile บนอุปกรณ์เคลื่อนที่</ li>\r\n\r\n<li>การพัฒนาและการทดสอบแบบจำลองการวิเคราะห์และการคาดการณ์ ที่เกี่ยวข้องกับองค์ประกอบด้านพื้นที่</li>\r\n\r\n<li>การพัฒนาอุปกรณ์และวัสดุทางการศึกษาที่เกี่ยวข้องกับระบบข้อมูลเชิงพื้นที่</li>\r\n\r\n');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00017', 'tha', 'นางสาวบุษภาณี พงษ์ศิริยาภรณ์ นายฉัตริยะ จริยวจี นายณัฐภัทร เลาหะรวี นายนันทิพัฒน์ นาคทอง และนายธนพล ปิติฉัตร');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00016', 'tha', '<strong><i>เป้าหมายและการดำเนินการ: </i></strong>FloodFinder เป็นโปรแกรมที่ถือเป็นนวัตกรรมใหม่สำหรับการรวบรวมและเผยแพร่ข้อมูลในช่วงภัยพิบัติน้ำท่วม การทำงานของ FloodFinder นั้น จะทำการคำนวณระดับน้ำที่ท่วมขังในพื้นที่ต่างๆ แบบอัตโนมัติ โดยใช้วิธีการประมวลผลภาพจากข้อมูลภาพวัตถุที่จมอยู่บางส่วนซึ่งถูกถ่ายและบันทึกไว้โดยผู้ใช้ ข้อมูลระดับน้ำจะถูกส่งไปยังเซิร์ฟเวอร์เพื่อเก็บรวบรวมไว้ ซึ่งข้อมูลเกี่ยวกับระดับน้ำท่วมนี้ จะถูกแสดงบนแผนที่โดยผู้ใช้สามารถเรียกดูได้ทั้งจากแอพลิเคชั่นบนมือถือหรือจากเว็บเบราว์เซอร์ทั่วไป\r\n\r\n<br><br>สำหรับ FloodFinder เคยได้รับรางวัลชนะเลิศระดับนิสิตนักศึกษาในการแข่งขัน Solutions mobile application competition ในปีพ.ศ. 2554 ซึ่งได้รับการสนับสนุนโดยองค์กรเพื่อการพัฒนาระหว่างประเทศแห่งสหรัฐฯ ขณะนี้ผู้จัดทำกำลังเพิ่มประสิทธิภาพของโปรแกรม FloodFinder ให้สามารถแสดงภาพถ่ายระยะไกลเป็นพื้นหลังของแผนที่น้ำท่วมด้วย');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00012', 'eng', '<strong><i>Goals and Activities: </i></strong>This project has developed a web-based implementation of the standard RID irrigation forecasting model WASAM. This model was then integrated with a simulation of water distribution through the irrigation canal system and a simple animated visualization to help farmers understand the irrigation plan and to encourage their compliance. The visualization component was designed for mobile devices so that farmers can interact with the system while they are working in their fields. RID officials in the NamOon irrigation project, the study area for this project, are planning to deploy the system in 2014.');
INSERT INTO `CONTENTTEXT` VALUES('PUBL00001', 'eng', 'Water resources are very important for agriculture in Thailand. Many irrigation projects have been built to provide improved systems for using water resources efficiently. Irrigation officials in Thailand currently use a special offline application to compute water requirements. However, farmers lack access to information from the management application, so they do not understand the irrigation plans and sometimes do not follow them. In our research we have designed and implemented a mobile web application to provide farmers with information about irrigation plans and outcomes. We have integrated a mathematical model to calculate the amount of water delivered to each section of canal system, using geographic information about irrigation canal structure, location and connectivity. We have also created a simple spatial simulation and a dynamic visualization capability. Our application can help the farmers to monitor the water situation in order to understand and follow water management plans. It also allows them easy access to irrigation data while they are in their fields. Our special purpose GIS application is designed for use in the Nam Oon irrigation project but the software can easily be adapted to other irrigation systems. It allows farmers to optimize the water delivered to their fields and hopefully, to improve agricultural productivity.');
INSERT INTO `CONTENTTEXT` VALUES('PUBL00001', 'tha', 'Water resources are very important for agriculture in Thailand. Many irrigation projects have been built to provide improved systems for using water resources efficiently. Irrigation officials in Thailand currently use a special offline application to compute water requirements. However, farmers lack access to information from the management application, so they do not understand the irrigation plans and sometimes do not follow them. In our research we have designed and implemented a mobile web application to provide farmers with information about irrigation plans and outcomes. We have integrated a mathematical model to calculate the amount of water delivered to each section of canal system, using geographic information about irrigation canal structure, location and connectivity. We have also created a simple spatial simulation and a dynamic visualization capability. Our application can help the farmers to monitor the water situation in order to understand and follow water management plans. It also allows them easy access to irrigation data while they are in their fields. Our special purpose GIS application is designed for use in the Nam Oon irrigation project but the software can easily be adapted to other irrigation systems. It allows farmers to optimize the water delivered to their fields and hopefully, to improve agricultural productivity.');
INSERT INTO `CONTENTTEXT` VALUES('PUBL00002', 'eng', 'Continuous measurement and monitoring of precipitation is very important for Thailand. Accurate, timely information on rainfall location and intensity is necessary to predict and respond to droughts and floods, to predict landslides and to guide cloud seeding activities.<br><br>\r\n\r\nThailand has approximately twenty weather radar installations in various locations throughout the country. However, it is difficult to integrate regional information into a national perspective, since each radar site covers a radius of only 240 km around the station, and different stations produce plots of different types with different geographic and measurement scales.<br><br>\r\n\r\nThis paper reports on our work using image processing to extract rainfall intensity measurements from the graphical products supplied by the radar sites, storing these measurements in a geodatabase, and then synthesizing new images that display current or historical precipitation information for any selected region in Thailand. This specialized geographic information system is both computation- and storage-intensive. Thus we have designed it to use the parallel processing capabilities of the multi-computer Thai National Grid.\r\n\r\n');
INSERT INTO `CONTENTTEXT` VALUES('PUBL00002', 'tha', 'Continuous measurement and monitoring of precipitation is very important for Thailand. Accurate, timely information on rainfall location and intensity is necessary to predict and respond to droughts and floods, to predict landslides and to guide cloud seeding activities.<br><br>\r\n\r\nThailand has approximately twenty weather radar installations in various locations throughout the country. However, it is difficult to integrate regional information into a national perspective, since each radar site covers a radius of only 240 km around the station, and different stations produce plots of different types with different geographic and measurement scales.<br><br>\r\n\r\nThis paper reports on our work using image processing to extract rainfall intensity measurements from the graphical products supplied by the radar sites, storing these measurements in a geodatabase, and then synthesizing new images that display current or historical precipitation information for any selected region in Thailand. This specialized geographic information system is both computation- and storage-intensive. Thus we have designed it to use the parallel processing capabilities of the multi-computer Thai National Grid.\r\n\r\n');
INSERT INTO `CONTENTTEXT` VALUES('NEWS00002', 'eng', 'kGeo has teamed up with the BMA to submit a proposal for the Rockefeller Foundation''s 100 Resilient Cities Centennial Challenge. Cities are growing rapidly, and they are largely unprepared to withstand and bounce back from natural and man-made shocks and stresses. Kgeo is working with BMA to help Bangkok prepare for and recover from future disasters.');
INSERT INTO `CONTENTTEXT` VALUES('PUBL00003', 'eng', 'Devastating floods in Thailand during the final quarter of 2011 caused almost 600 deaths as well as severe damage to the country''s infrastructure and economy. The crisis prompted us to very quickly develop a system using mobile devices to survey the status of industrial facilities in disaster-affected areas. Our objective was to create a system that would allow an untrained user equipped with a modern mobile telephone to acquire and transmit location-tagged information, in multiple modalities, about the conditions at a disaster site. The system needed to be robust in the face of abnormal conditions in the disaster area, should permit the users to use their own language, and should make the resulting data available immediately both to supervisors coordinating the disaster remediation effort and to experts elsewhere. In this paper we describe the motivation and methodology for this project, the functional architecture of the resulting software, its present status and its future prospects. The project serves a case study for rapid application development of geospatial software. The resulting application has potential utility in other disaster situations.');
INSERT INTO `CONTENTTEXT` VALUES('PUBL00003', 'tha', 'Devastating floods in Thailand during the final quarter of 2011 caused almost 600 deaths as well as severe damage to the country''s infrastructure and economy. The crisis prompted us to very quickly develop a system using mobile devices to survey the status of industrial facilities in disaster-affected areas. Our objective was to create a system that would allow an untrained user equipped with a modern mobile telephone to acquire and transmit location-tagged information, in multiple modalities, about the conditions at a disaster site. The system needed to be robust in the face of abnormal conditions in the disaster area, should permit the users to use their own language, and should make the resulting data available immediately both to supervisors coordinating the disaster remediation effort and to experts elsewhere. In this paper we describe the motivation and methodology for this project, the functional architecture of the resulting software, its present status and its future prospects. The project serves a case study for rapid application development of geospatial software. The resulting application has potential utility in other disaster situations.');
INSERT INTO `CONTENTTEXT` VALUES('EDCT00001', 'eng', 'CPE 476/483/671 - Algorithms and Architectures for Geoinformatics ');
INSERT INTO `CONTENTTEXT` VALUES('EDCT00001', 'tha', 'CPE 476/483/671 - อัลกอริทึมและสถาปัตยกรรมสำหรับระบบภูมิศาสตร์สารสนเทศ');
INSERT INTO `CONTENTTEXT` VALUES('EDCT00002', 'eng', 'Dr. Sally E. Goldin and Mr. Kurt T. Rudahl');
INSERT INTO `CONTENTTEXT` VALUES('EDCT00002', 'tha', 'Dr. Sally E. Goldin and Mr. Kurt T. Rudahl');
INSERT INTO `CONTENTTEXT` VALUES('EDCT00004', 'eng', 'CSS 443 - Geographic Information Systems');
INSERT INTO `CONTENTTEXT` VALUES('EDCT00004', 'tha', 'CSS 443 - ระบบข้อมูลทางภูมิศาสตร์');
INSERT INTO `CONTENTTEXT` VALUES('NEWS00001', 'eng', 'kGeo collaborates with Bangkok Metropolitan Authority on Rockefeller Foundation Initiative');
INSERT INTO `CONTENTTEXT` VALUES('EDCT00007', 'eng', 'CSS 497 – Special Topics: Remote Sensing');
INSERT INTO `CONTENTTEXT` VALUES('EDCT00009', 'eng', 'To be determined');
INSERT INTO `CONTENTTEXT` VALUES('EDCT00007', 'tha', 'CSS 497 – หัวข้อพิเศษ: การประมวลผลภาพระยะไกล');
INSERT INTO `CONTENTTEXT` VALUES('EDCT00005', 'eng', 'Dr. Pariwate Varnakovida');
INSERT INTO `CONTENTTEXT` VALUES('EDCT00005', 'tha', 'ดร. ปริเวท วรรณโกวิท');
INSERT INTO `CONTENTTEXT` VALUES('EDCT00008', 'tha', 'ดร. ปริเวท วรรณโกวิท');
INSERT INTO `CONTENTTEXT` VALUES('EDCT00008', 'eng', 'Dr. Pariwate Varnakovida');
INSERT INTO `CONTENTTEXT` VALUES('EDCT00003', 'eng', 'Geoinformatics is the use of computers to process geographically-related spatial information. It includes remote sensing image analysis, geographic information systems (GIS), computer-based mapping, and similar applications. \r\n\r\nThis course will familiarize students with data structures, algorithms, design concepts, and architectural issues that are important when developing geoinformatics software. By the conclusion of the course, students will understand what is `under the hood` of a remote sensing or GIS software system, as well as being able to create novel geoinformatics software. \r\n\r\nThe course will be project-oriented and will involve significant amounts of programming. Students must have prior experience programming in C, C++ and/or Java to take this course. \r\n\r\n');
INSERT INTO `CONTENTTEXT` VALUES('EDCT00006', 'tha', 'To be determined');
INSERT INTO `CONTENTTEXT` VALUES('EDCT00006', 'eng', 'To be determined');
INSERT INTO `CONTENTTEXT` VALUES('PROJ00012', 'tha', '<strong><i>เป้าหมายและการดำเนินการ: </i></strong>โครงการนี้ได้ถูกพัฒนาขึ้นในรูปแบบเว็บแอพลิเคชั่นตามมาตรฐานโมเดลการพยากรณ์ระบบชลประทาน WASAM. ภายในแอพลิเคชั่นนี้ได้ถูกบูรณาการร่วมกับแบบจำลองการจัดสรรน้ำผ่านระบบคลองชลประทาน และการสร้างภาพเคลื่อนไหวอย่างง่าย เพื่อช่วยให้เกษตรกรมีความเข้าใจในแผนการชลประทาน และกระตุ้นให้เกิดการปฏิบัติตาม โดยระบบได้ถูกออกแบบมาสำหรับอุปกรณ์โทรศัพท์มือถือ เพื่อให้เกษตรกรสามารถใช้งานระบบได้ ในขณะกำลังปฏิบัติงานในพื้นที่ของตนเอง ทั้งนี้กรมชลประทานได้มีการวางแผนการเริ่มใช้งานตัวระบบ ในพื้นที่ศึกษาของโครงการชลประทานน้ำอูน ในปี พ.ศ 2557');
INSERT INTO `CONTENTTEXT` VALUES('NEWS00003', 'eng', 'kGeo Participating in Climate Change Working Group');
INSERT INTO `CONTENTTEXT` VALUES('NEWS00004', 'eng', 'kGeo has been selected to work with the Thailand Research Fund and the National Natural Science Foundation of China (NFSC) on the question of monitoring and mitigating climate change. Kgeo personnel with participate in a high level meeting on this topic from 27 - 31 October in Phuket.');
INSERT INTO `CONTENTTEXT` VALUES('NEWS00005', 'eng', 'kGeo at GeoInfoTech 2013');
INSERT INTO `CONTENTTEXT` VALUES('EDCT00009', 'tha', 'To be determined');
INSERT INTO `CONTENTTEXT` VALUES('NEWS00001', 'tha', 'เคจีโอร่วมกับกรุงเทพมหานครเข้าร่วมโครงการ มูลนิธิ Rockefeller');
INSERT INTO `CONTENTTEXT` VALUES('NEWS00005', 'tha', 'kGeo at GeoInfoTech 2013');
INSERT INTO `CONTENTTEXT` VALUES('NEWS00003', 'tha', 'เคจีโอเข้าร่วมการสัมมนาว่าด้วยการเปลี่ยนแปลงสภาพภูมิอากาศ');
INSERT INTO `CONTENTTEXT` VALUES('NEWS00002', 'tha', 'เคจีโอจับมือกับกรุงเทพมหานคร เพื่อร่วมทำให้กรุงเทพฯ เป็น 1 ใน 100 เมือง ในโครงการ “100 Resilient Cities Centennial Challenge” ของมูลนิธิ Rockefeller เนื่องจากปัจจุบันกรุงเทพมีการพัฒนาขึ้นอย่างรวดเร็ว ทำให้ขาดความพร้อมในการเตรียมรับมือกับปัญหาต่างๆ ที่อาจส่งผลย้อนกลับมาสู่เมืองหลวงของประเทศ ทั้งจากภัยธรรมชาติหรือจากน้ำมือมนุษย์ ดังนั้นเคจีโอจึงได้ร่วมมือกับกรุงเทพมหานครเพื่อเตรียมพร้อมในการรับมือและวางแผนในการฟื้นฟูกรุงเทพฯ จากกรณีพิบัติภัยต่างๆ ที่อาจจะเกิดขึ้นในอนาคต');
INSERT INTO `CONTENTTEXT` VALUES('NEWS00004', 'tha', 'เคจีโอได้รับเลือกให้ร่วมการสัมมนา ร่วมกับกองทุนเพื่อสนับสนุนการวิจัยแห่งประเทศไทยและมูลนิธิวิทยาศาสตร์ชาติธรรมชาติของประเทศสาธารณรัฐประชาชนจีน (NFSC) ในการตรวจสอบและบรรเทาการเปลี่ยนแปลงสภาพภูมิอากาศ ซึ่งเจ้าหน้าที่และบุคลากรของเคจีโอได้เข้าร่วมในการประชุมสัมมนาแลกเปลี่ยนความคิดเห็นกับเจ้าหน้าที่ระดับสูงท่านอื่น เมื่อวันที่ 27-31 ตุลาคมที่ผ่านมา ที่จังหวัดภูเก็ต');
INSERT INTO `CONTENTTEXT` VALUES('EDCT00003', 'tha', 'ภูมิสารสนเทศ คือ การใช้คอมพิวเตอร์เพื่อประมวลผลข้อมูลทางภูมิศาสตร์ ซึ่งรวมไปถึงการวิเคราะห์ภาพระยะไกล, ระบบสารสนเทศทางภูมิศาสตร์ (GIS), การทำแผนที่คอมพิวเตอร์ (computer-based mapping)  หรือระบบอื่นๆ ที่เกี่ยวข้องกับการประมวลผลข้อมูลเชิงพื้นที่ <br/><br/>\r\n\r\nหลักสูตรนี้เหมาะสำหรับผู้เรียนที่มีความรู้พื้นฐาน เรื่องโครงสร้างข้อมูล, design concepts และ architectural issues ซึ่งจะมีประโยชน์อย่างมากต่อการพัฒนาระบบซอฟแวร์ด้านภูมิสารสนเทศ เมื่อจบหลักสูตรผู้เรียนจะมีความรู้ความเข้าใจในเรื่องต่างๆ เกี่ยวกับ การวิเคราะห์ภาพระยะไกลหรือระบบสารสนเทศภูมิศาสตร์ และสามารถออกแบบหรือพัฒนาระบบภูมิสารสนเทศด้วยตนเองได้<br/><br/>\r\n\r\nวิชานี้มุ่งเน้นเรื่องการพัฒนาโปรเจ็คเป็นหลัก ซึ่งจำเป็นต้องใช้ความรู้พื้นฐานเกี่ยวกับการเขียนโปรแกรมเป็นอย่างมาก ดังนั้นผู้เรียนจึงควรมีประสบการณด้านการเขียนโปรแกรมด้วยภาษา C, C++  หรือ Java มาก่อนการเรียนวิชานี้\r\n\r\n');
INSERT INTO `CONTENTTEXT` VALUES('NEWS00006', 'tha', 'เคจีโอเข้าร่วมการจัดแสดงนิทรรศการในการประชุมวิชาการเทคโนโลยีภูมิสารสนเทศแห่งชาติประจำปีหรือ GeoInfoTech ของสำนักงานพัฒนาเทคโนโลยีอวกาศและภูมิสารสนเทศ (สทอภ.) ซึ่งจะจัดขึ้นในวันที่ 25-27 ธันวาคมนี้ ที่ศูนย์ประชุมนานาชาติอิมแพ็คเมืองทองธานี ผู้สนใจสามารถเยี่ยมชมการจัดแสดงผลงานและโครงการต่างๆ ของเคจีโอ หรือร่วมพูดคุยแลกเปลี่ยนประสบการณ์และความคิดเห็นต่างๆ กับผู้เชี่ยวชาญของเรา เกี่ยวกับวิศวกรรมภูมิสารสนเทศได้ในงานนี้');

-- --------------------------------------------------------

--
-- Table structure for table `DEPARTMENTLOOKUP`
--

DROP TABLE IF EXISTS `DEPARTMENTLOOKUP`;
CREATE TABLE `DEPARTMENTLOOKUP` (
  `Id` int(11) NOT NULL,
  `MsgKey` varchar(15) NOT NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `DEPARTMENTLOOKUP`
--

INSERT INTO `DEPARTMENTLOOKUP` VALUES(1, 'DPTY00001');
INSERT INTO `DEPARTMENTLOOKUP` VALUES(2, 'DRTY00002');

-- --------------------------------------------------------

--
-- Table structure for table `EDUCATION`
--

DROP TABLE IF EXISTS `EDUCATION`;
CREATE TABLE `EDUCATION` (
  `CourseId` int(11) NOT NULL,
  `TitleId` varchar(15) NOT NULL,
  `InstructorId` varchar(15) NOT NULL,
  `DepartmentId` varchar(15) default NULL,
  `Term` varchar(20) NOT NULL,
  `DescriptionId` varchar(15) NOT NULL,
  `SourceId` int(11) default NULL,
  `LevelId` text,
  `ExternURL` varchar(300) default NULL,
  PRIMARY KEY  (`CourseId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `EDUCATION`
--

INSERT INTO `EDUCATION` VALUES(1, 'EDCT00001', 'EDCT00002', 'DPTY00001', '1, 2556', 'EDCT00003', NULL, '{''SLTY00004'',''SLTY00005'',''SLTY00006''}', NULL);
INSERT INTO `EDUCATION` VALUES(2, 'EDCT00004', 'EDCT00005', 'DPTY00002', '1, 2556', 'EDCT00006', NULL, '{''SLTY00004''}', NULL);
INSERT INTO `EDUCATION` VALUES(3, 'EDCT00007', 'EDCT00008', 'DPTY00002', '1, 2556', 'EDCT00009', NULL, '{''SLTY00006''}', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `HOME`
--

DROP TABLE IF EXISTS `HOME`;
CREATE TABLE `HOME` (
  `HomeId` int(11) NOT NULL,
  `NewsPic` text,
  `WelcomeMessage` varchar(15) default NULL,
  PRIMARY KEY  (`HomeId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `HOME`
--

INSERT INTO `HOME` VALUES(1, '{19,20}', 'HOME00001');

-- --------------------------------------------------------

--
-- Table structure for table `INPUTFIELD`
--

DROP TABLE IF EXISTS `INPUTFIELD`;
CREATE TABLE `INPUTFIELD` (
  `FieldId` int(11) NOT NULL,
  `Label` text NOT NULL,
  `DataType` varchar(50) NOT NULL,
  `Maxlength` int(11) NOT NULL,
  `Order` int(11) NOT NULL,
  `LookupTableName` varchar(50) NOT NULL,
  `StoreTableName` varchar(50) NOT NULL,
  `StoreFieldName` varchar(50) NOT NULL,
  PRIMARY KEY  (`FieldId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `INPUTFIELD`
--


-- --------------------------------------------------------

--
-- Table structure for table `INPUTFORM`
--

DROP TABLE IF EXISTS `INPUTFORM`;
CREATE TABLE `INPUTFORM` (
  `FormType` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `FieldIds` text NOT NULL,
  PRIMARY KEY  (`FormType`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `INPUTFORM`
--


-- --------------------------------------------------------

--
-- Table structure for table `KGEOINFO`
--

DROP TABLE IF EXISTS `KGEOINFO`;
CREATE TABLE `KGEOINFO` (
  `KgeoInfoId` int(11) NOT NULL,
  `Head` varchar(150) default NULL,
  `Detail` text,
  `GroupNo` int(11) default NULL,
  PRIMARY KEY  (`KgeoInfoId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `KGEOINFO`
--

INSERT INTO `KGEOINFO` VALUES(1, 'KGEO00001', 'KGEO00007', 1);
INSERT INTO `KGEOINFO` VALUES(2, 'KGEO00002', 'KGEO00008', 1);
INSERT INTO `KGEOINFO` VALUES(3, 'KGEO00003', 'KGEO00009', 1);
INSERT INTO `KGEOINFO` VALUES(4, 'KGEO00004', 'KGEO00010', 2);
INSERT INTO `KGEOINFO` VALUES(5, 'KGEO00005', 'KGEO00011', 3);
INSERT INTO `KGEOINFO` VALUES(6, 'KGEO00006', 'KGEO00012', 4);

-- --------------------------------------------------------

--
-- Table structure for table `MSGKEY`
--

DROP TABLE IF EXISTS `MSGKEY`;
CREATE TABLE `MSGKEY` (
  `MsgKeyPrefix` char(4) NOT NULL,
  `LastMsgKeyNumber` varchar(11) NOT NULL,
  PRIMARY KEY  (`MsgKeyPrefix`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MSGKEY`
--

INSERT INTO `MSGKEY` VALUES('KGEO', '00012');
INSERT INTO `MSGKEY` VALUES('CONT', '00007');
INSERT INTO `MSGKEY` VALUES('HOME', '00004');
INSERT INTO `MSGKEY` VALUES('STAF', '00021');
INSERT INTO `MSGKEY` VALUES('PROD', '00004');
INSERT INTO `MSGKEY` VALUES('COLL', '00010');
INSERT INTO `MSGKEY` VALUES('PJTY', '00006');
INSERT INTO `MSGKEY` VALUES('PROJ', '00019');
INSERT INTO `MSGKEY` VALUES('PUBL', '00007');
INSERT INTO `MSGKEY` VALUES('ARTY', '00003');
INSERT INTO `MSGKEY` VALUES('DPTY', '00002');
INSERT INTO `MSGKEY` VALUES('SLTY', '00006');
INSERT INTO `MSGKEY` VALUES('EDCT', '00014');
INSERT INTO `MSGKEY` VALUES('NEWS', '00007');

-- --------------------------------------------------------

--
-- Table structure for table `MSGTEXT`
--

DROP TABLE IF EXISTS `MSGTEXT`;
CREATE TABLE `MSGTEXT` (
  `MsgKey` varchar(15) NOT NULL,
  `Lang` char(3) NOT NULL,
  `TextMsg` text,
  PRIMARY KEY  (`MsgKey`,`Lang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MSGTEXT`
--

INSERT INTO `MSGTEXT` VALUES('HOME00001', 'eng', '<b>The KMUTT Geospatial Engineering and InnOvation Center</b> (KGEO) is a new source for geospatial research and development. KGEO is an independent center under the renowned Institute of Field Robotics (FIBO) dedicated to helping Thai government organizations, businesses and society to realize the full benefits of geospatial knowledge by designing, building and deploying robust solutions to real world problems.');
INSERT INTO `MSGTEXT` VALUES('KGEO00001', 'eng', 'What is kGeo?');
INSERT INTO `MSGTEXT` VALUES('KGEO00001', 'tha', 'เคจีโอ คือ?');
INSERT INTO `MSGTEXT` VALUES('KGEO00002', 'eng', 'What is Geospatial Engineering?');
INSERT INTO `MSGTEXT` VALUES('KGEO00007', 'eng', '<li>An independent center within the Institute of Field Robotics (FIBO)</li>\r\n\r\n                    <li>\r\n\r\n                        Leverages the expertise of KMUTT''s world-class faculty and researchers from computer engineering, mechanical engineering, civil engineering, robotics, environmental engineering, and other relevant fields\r\n\r\n                    </li>\r\n\r\n                    <li>\r\n\r\n                        Addresses urgent issues with a spatial component\r\n\r\n                    </li>\r\n\r\n                    <div style=`padding-left:30px;`>\r\n\r\n                        <li>Floods</li>\r\n\r\n                        <li>Drought</li>\r\n\r\n                        <li>Agricultural yield</li>\r\n\r\n                        <li>Industrial siting</li>\r\n\r\n                        <li>Coastal erosion</li>\r\n\r\n                        <li>Land subsidence</li>\r\n\r\n                        <li>Forest conservation</li>\r\n\r\n                        <li>Infrastructure development</li>\r\n\r\n                        <li>Epidemic forecasting</li>\r\n\r\n                    </div>\r\n\r\n                    <li>develops practical tools and techniques to solve real world problems</li>\r\n\r\n                    <li>Conducts cutting edge research to advance scientific knowledge in geospatially-related domains</li>');
INSERT INTO `MSGTEXT` VALUES('KGEO00002', 'tha', 'วิศวกรรมภูมิสารสนเทศ คือ?');
INSERT INTO `MSGTEXT` VALUES('KGEO00003', 'eng', 'Rationale');
INSERT INTO `MSGTEXT` VALUES('KGEO00004', 'eng', 'Vision');
INSERT INTO `MSGTEXT` VALUES('KGEO00004', 'tha', 'วิสัยทัศน์');
INSERT INTO `MSGTEXT` VALUES('KGEO00005', 'eng', 'Mission');
INSERT INTO `MSGTEXT` VALUES('KGEO00005', 'tha', 'พันธกิจ');
INSERT INTO `MSGTEXT` VALUES('KGEO00006', 'eng', 'Activities');
INSERT INTO `MSGTEXT` VALUES('KGEO00006', 'tha', 'ภารกิจ');
INSERT INTO `MSGTEXT` VALUES('KGEO00003', 'tha', 'หลักการและเหตุผล');
INSERT INTO `MSGTEXT` VALUES('HOME00001', 'tha', '<b>ศูนย์วิศวกรรมสารสนเทศภูมิศาสตร์และนวัตกรรม </b>(เคจีโอ) คือ ศูนย์ข้อมูลสำหรับการวิจัยและพัฒนาเชิงพื้นที่ ซึ่งเป็นหน่วยงานอิสระภายใต้สถาบันวิทยาการหุ่นยนต์ภาคสนามหรือพีโบ้ ของมหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี เพื่อให้คำแนะนำและความช่วยเหลือด้านการพัฒนาเชิงพื้นที่แก่ องค์กรภาครัฐ เอกชน ภาคธุรกิจและต่อสังคมอย่างครบวงจรทั้งการวิจัย ออกแบบ พัฒนาและติดตั้ง เพื่อการนำไปประยุกต์ใช้แก้ไขปัญหาต่างๆ อย่างมีประสิทธิภาพ');
INSERT INTO `MSGTEXT` VALUES('KGEO00008', 'eng', '<p>We define geospatial engineering very broadly. Geospatial engineering products may include: remote sensing image analysis algorithms and software, Geographic Information Systems (GIS) and computer mapping; location-based mobile applications; Global Positional System (GPS) and other satellite-based location services; hardware such as sensors and sensor networks, exploration robots, autonomous vehicles (both aerial and aquatic), and even small satellites;  mathematical or other models that predict spatially distributed phenomena; processes that facilitate the gathering or dissemination of spatial data.</p>');
INSERT INTO `MSGTEXT` VALUES('KGEO00007', 'tha', '<li>หน่วยงานอิสระภายใต้สถาบันวิทยาการหุ่นยนต์ภาคสนามหรือฟีโบ้</li>\r\n\r\n                    <li>\r\n\r\n                        โดยความร่วมมือจากคณาจารย์ คณะนักวิจัยและผู้เชี่ยวชาญระดับโลกในสาขาต่างๆ ของมหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี จากภาควิชาวิศวกรรมคอมพิวเตอร์ วิศวกรรมเครื่องกล วิศวกรรมโยธา หุ่นยนต์ วิศวกรรมสิ่งแวดล้อมและสาขาอื่น ๆ ที่เกี่ยวข้อง\r\n\r\n                    </li>\r\n\r\n                    <li>\r\n\r\n                        มุ่งศึกษาวิจัยและแก้ไขปัญหาเชิงภูมิศาสตร์สารสนเทศในด้านต่างๆ ดังนี้ \r\n\r\n                    </li>\r\n\r\n                    <div style=`padding-left:30px;`>\r\n\r\n                        <li>อุทกภัย</li>\r\n\r\n                        <li>ภัยแล้ง</li>\r\n\r\n                        <li>ผลผลิตทางการเกษตร</li>\r\n\r\n                        <li>การกำหนดพื้นที่อุตสาหกรรม</li>\r\n\r\n                        <li>การกัดเซาะชายฝั่ง</li>\r\n\r\n                        <li>แผ่นดินทรุด</li>\r\n\r\n                        <li>การอนุรักษ์พื้นที่ป่าไม้</li>\r\n\r\n                        <li>การพัฒนาโครงสร้างพื้นฐาน</li>\r\n\r\n                        <li>การพยากรณ์การระบาดของโรค</li>\r\n\r\n                    </div>\r\n\r\n                    <li>พัฒนาเทคนิคและเครื่องมือที่สามารถนำไปประยุกต์ใช้ได้จริง เพื่อแก้ไขปัญหาที่เกิดขึ้นในปัจจุบัน</li>\r\n\r\n                    <li>พัฒนางานวิจัยที่ทันสมัย ​​เพื่อความก้าวหน้าขององค์ความรู้ต่างๆ ที่เกี่ยวข้องกับวิทยาศาสตร์ภูมิศาสตร์</li>\r\n\r\n                     \r\n\r\n                   ');
INSERT INTO `MSGTEXT` VALUES('KGEO00008', 'tha', '<p>วิศวกรรมภูมิสารสนเทศ สามารถนิยามได้กว้างๆ ดังนี้ วิศวกรรมภูมิสารสนเทศ คือ ศาสตร์ทางวิศวกรรมที่ครอบคลุมกระบวนการวิเคราะห์หรือการผลิตอุปกรณ์ต่างๆ ทั้งด้านซอฟต์แวร์ ฮาร์ดแวร์ รวมถึงอัลกอริทึมต่างๆ ที่เกี่ยวข้องกับการประมวลผลข้อมูลเชิงภูมิสารสนเทศ อาทิ ซอฟต์แวร์สำหรับการสำรวจและประมวลผลภาพระยะไกล, ระบบข้อมูลสารสนเทศภูมิศาสตร์ (จีไอเอส)\r\n\r\nและการทำแผนที่คอมพิวเตอร์; แอพพลิเคชั่นค้นหาและระบุตำแหน่งต่างๆ บนอุปกรณ์ไร้สาย; ระบบกำหนดตำแหน่งบนโลก (จีพีเอส) รวมทั้งบริการการค้นหาและระบุตำแหน่งสถานที่ผ่านระบบสัญญาณดาวเทียม หรืออื่นๆ; ระบบฮาร์ดแวร์ เช่น เซนเซอร์หรือกลุ่มเซนเซอร์,\r\n\r\nหุ่นยนต์สำรวจ พาหนะเคลื่อนที่อัตโนมัติ (ทั้งทางอากาศและทางน้ำ) และดาวเทียมสำรวจขนาดเล็ก; ด้านอัลกอริทึม เช่น การสร้างแบบจำลองทางคณิตศาสตร์ หรืออื่น ๆ ซึ่งช่วยคาดเดาการแพร่ระบาดหรือการแพร่กระจายของปรากฏการณ์ต่างๆ; อัลกอริทึมที่ช่วยอำนวยความสะดวกในการเก็บรวบรวมหรือการเผยแพร่ข้อมูลเชิงพื้นที่</p>');
INSERT INTO `MSGTEXT` VALUES('KGEO00009', 'eng', '<p>\r\n\r\n                        Geospatial information gathering and analysis are essential for the economic and social development of Thailand. The country''s ongoing water management issues provide a prominent example. Predicting and responding to floods is extremely difficult without accurate knowledge about waterways, water gates, and dykes; the volume and flow rate at different points in the hydrological network; land elevation and the location of obstacles; the spatial pattern of precipitation; and so on. Other government activities needing geospatial data include health services delivery,  pollution monitoring, law and import/export enforcement, fisheries, forestry, and mineral exploitation.\r\n\r\n                    </p>\r\n\r\n                    <p>\r\n\r\n                        Thai businesses rely on geospatial data. Retail companies use demographics and infrastructure projections to decide where to site new outlets. Property businesses look at land prices, zoning, transportation, elevation, and many other location-specific factors in planning new condominiums or housing estates. Agroindustry requires near-real-time spatial information to predict yields, identify disease or pest infestations, and implement fertilizer or irrigation regimens. Manufacturing industries choose locations based on a wide variety of spatially distributed characteristics including availability of water, the presence of skilled labor, and resistance to flooding. Advertising and media companies  increasingly turn to location-based mobile applications to deliver content appropriate to a particular spatial context. \r\n\r\n                    </p>\r\n\r\n                    <p>\r\n\r\n                        In fact, spatial information is required for decision-making in almost every domain, from agriculture to tourism, health care delivery to transportation. Furthermore, due to advances in technology, every year brings an increase in the volume and types of spatial data available, and a decrease in the cost of computers needed to process that data. \r\n\r\n                    </p>\r\n\r\n                    <p>\r\n\r\n                        Although Thailand has been a regional leader in the generation of spatial data and the use of geoinformatics (computer-based analysis of spatial data) since the early nineteen eighties, when the country built the first remote sensing satellite receiving center in Southeast Asia, neither the government nor the private sector has all the expertise required to fully integrate spatial information processing into their activities. Much of the potential benefit from spatial data analysis remains unrealized.\r\n\r\n                    </p>');
INSERT INTO `MSGTEXT` VALUES('KGEO00012', 'eng', '<p>\r\n\r\n                        <font style=`font-weight:bold; font-style:italic`>Projects and Consulting:&nbsp;</font>\r\n\r\n                        kGeo undertakes projects with a geospatial knowledge component for government agencies, commercial companies or non-governmental organizations, developing software, hardware and process tools to solve real-world problems. We also provide expert consulting on geoinformatics and geoscience on a per-day basis to outside organizations. \r\n\r\n                    </p>\r\n\r\n                    <p>\r\n\r\n                        <font style=`font-weight:bold; font-style:italic`>Undergraduate and Graduate Education:&nbsp;</font>\r\n\r\n                        Through its projects, kGeo provides support for masters and PhD students working on geospatially-related projects. It also organizes geoinformatics courses and seminars for KMUTT students.\r\n\r\n                    </p>\r\n\r\n                    <p>\r\n\r\n                        <font style=`font-weight:bold; font-style:italic`>Communication and Collaboration:&nbsp;</font>\r\n\r\n                        kGeo runs an annual seminar to facilitate the exchange of knowledge among KMUTT faculty and researchers working on problems with a geospatial component.  \r\n\r\n                    </p>\r\n\r\n                    <p>\r\n\r\n                        <font style=`font-weight:bold; font-style:italic`>Tools Repository:&nbsp;</font>\r\n\r\n                        kGeo maintains an online repository of software tools, hardware designs and analysis processes which will be of value to others. Users can browse and download tools and\r\n\r\ndocumentation, and request information and support. \r\n\r\n                    </p>');
INSERT INTO `MSGTEXT` VALUES('KGEO00011', 'eng', '<p>In service to our vision, kGeo has the following missions:</p>\r\n\r\n                    <li>\r\n\r\n                        Design and execute projects that solve significant problems and create measurable value for our clients. These projects may involve knowledge innovation, knowledge application, or both\r\n\r\n                    </li>\r\n\r\n                    <li>\r\n\r\n                        Support and coordinate the efforts of faculty and researchers within KMUTT who have interests in or activities related to geospatial knowledge and/or tools\r\n\r\n                    </li>\r\n\r\n                    <li>\r\n\r\n                        Build capacity of students in various areas of geospatial engineering, to enable them to contribute to industry, academia, and society at large\r\n\r\n                    </li>\r\n\r\n                    <li>\r\n\r\n                        Establish the reputation of KMUTT as a center of excellence in geospatial engineering\r\n\r\n                    </li>\r\n\r\n                    <li>\r\n\r\n                        Development and testing of analytic and predictive models with a spatial component\r\n\r\n                    </li>\r\n\r\n                    <li>\r\n\r\n                        Development of educational tools and materials related to geospatial topics\r\n\r\n                    </li>\r\n\r\n                    ');
INSERT INTO `MSGTEXT` VALUES('CONT00001', 'eng', 'KMUTT Geospatial Engineering and InnOvation Center (KGEO)');
INSERT INTO `MSGTEXT` VALUES('CONT00001', 'tha', 'ศูนย์วิศวกรรมสารสนเทศภูมิศาสตร์และนวัตกรรม (เคจีโอ)');
INSERT INTO `MSGTEXT` VALUES('CONT00002', 'eng', 'Institute of Field Robotics<br/>\r\n\r\n                                King Mongkut ''s University of Technology Thonburi<br/>\r\n\r\n                                126 Prach u-tid Road Bangmod Thungkru Bangkok 10140 Thailand');
INSERT INTO `MSGTEXT` VALUES('CONT00002', 'tha', 'สถาบันวิทยาการหุ่นยนต์ภาคสนาม<br/>\r\n\r\nมหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี<br/>\r\n\r\n126 ถนนประชาอุทิศ แขวงบางมด เขตทุ่งครุ กรุงเทพมหานคร ประเทศไทย 10140');
INSERT INTO `MSGTEXT` VALUES('CONT00003', 'eng', 'Phone: +66 (0) 2-470-9339');
INSERT INTO `MSGTEXT` VALUES('CONT00003', 'tha', 'โทร: +66 (0) 2-470-9339');
INSERT INTO `MSGTEXT` VALUES('CONT00004', 'eng', 'Fax: +66 (0) 2-470-9703');
INSERT INTO `MSGTEXT` VALUES('CONT00004', 'tha', 'โทรสาร: +66 (0) 2-470-9703');
INSERT INTO `MSGTEXT` VALUES('CONT00005', 'eng', 'E-mail: <a href=`mailto:kgeo@fibo.kmutt.ac.th`>kgeo@fibo.kmutt.ac.th</a>');
INSERT INTO `MSGTEXT` VALUES('CONT00005', 'tha', 'อีเมล: <a href=`mailto:kgeo@fibo.kmutt.ac.th`>kgeo@fibo.kmutt.ac.th</a>');
INSERT INTO `MSGTEXT` VALUES('HOME00002', 'tha', 'ยืนดีต้อนรับสู่เคจีโอ');
INSERT INTO `MSGTEXT` VALUES('CONT00006', 'eng', 'CONTACT US');
INSERT INTO `MSGTEXT` VALUES('CONT00006', 'tha', 'ติดต่อเรา');
INSERT INTO `MSGTEXT` VALUES('CONT00007', 'eng', 'Map to KMUTT');
INSERT INTO `MSGTEXT` VALUES('CONT00007', 'tha', 'แผนที่สู่ มจธ.');
INSERT INTO `MSGTEXT` VALUES('HOME00002', 'eng', 'Welcome to kGeo');
INSERT INTO `MSGTEXT` VALUES('HOME00003', 'eng', 'News feed');
INSERT INTO `MSGTEXT` VALUES('HOME00003', 'tha', 'ข่าว');
INSERT INTO `MSGTEXT` VALUES('HOME00004', 'eng', 'CLICK to Subscribe our news');
INSERT INTO `MSGTEXT` VALUES('HOME00004', 'tha', 'คลิกที่นี่เพื่อรับข่าวสารจากเรา');
INSERT INTO `MSGTEXT` VALUES('KGEO00010', 'eng', '<p>kGeo will create an innovative research and development community at KMUTT which will help Thai government organizations, businesses and society to realize the full benefits of geospatial knowledge by designing, building and deploying robust solutions to real world geospatial problems.</p>');
INSERT INTO `MSGTEXT` VALUES('PUBL00004', 'tha', 'ตีพิมพ์ที่');
INSERT INTO `MSGTEXT` VALUES('PUBL00006', 'eng', 'Year');
INSERT INTO `MSGTEXT` VALUES('PUBL00007', 'eng', 'Type of article');
INSERT INTO `MSGTEXT` VALUES('PUBL00007', 'tha', 'ประเภทบทความ');
INSERT INTO `MSGTEXT` VALUES('ARTY00001', 'tha', 'ปริญญานิพนธ์');
INSERT INTO `MSGTEXT` VALUES('ARTY00003', 'eng', 'Journal Article');
INSERT INTO `MSGTEXT` VALUES('ARTY00003', 'tha', 'วารสารวิชาการ');
INSERT INTO `MSGTEXT` VALUES('ARTY00004', 'eng', 'Presentation');
INSERT INTO `MSGTEXT` VALUES('KGEO00010', 'tha', '<p>ศูนย์วิศวกรรมสารสนเทศภูมิศาสตร์และนวัตกรรม มีวิสัยทัศน์ในการเป็นศูนย์กลางในการสร้างสังคมนวัตกรรมภายใต้มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี ที่สามารถช่วยภาครัฐ เอกชน และสังคมให้ตระหนักถึงความสำคัญของความรู้ด้านสารสนเทศภูมิศาสตร์โดยการออกแบบ สร้าง และนำไปใช้แก้ปัญหาที่เกิดขึ้นจริงบนพื้นโลก</p>');
INSERT INTO `MSGTEXT` VALUES('KGEO00009', 'tha', '<p>ข้อมูลสารสนเทศภูมิศาสตร์มีความสำคัญทั้งทางด้านเศรษฐกิจและการพัฒนาสังคมสำหรับประเทศไทย ตัวอย่างเช่น การจัดการทรัพยากรน้ำที่มีความจำเป็นอย่างยิ่งในปัจจุบัน การทำนายและการตอบสนองต่ออุทกภัยมีความยุ่งยากมากถ้าไม่มีข้อมูลเชิงพื้นที่ของเส้นทางน้ำ สถานีระบายน้ำ เขื่อนกั้นน้ำ ปริมาณ และอัตราการไหลของน้ำ ณ จุดต่างๆภายในระบบการไหลของน้ำ ข้อมูลความสูง และสิ่งกีดขวาง ลักษณะการกระจายตัวของฝน และข้อมูลเชิงพื้นที่อื่นๆ โครงการต่างๆจากภาครัฐมีความจำเป็นในการใช้ข้อมูลสารสนเทศภูมิศาสตร์ รวมถึงการบริการทางด้านสาธารณสุข การตรวจวัดมลพิษ กฎหมายและการบังคับใช้ การประมง ป่าไม้ และการทำเหมืองแร่</p>\r\n\r\n<p>ภาคธุรกิจมีความจำเป็นในการใช้ข้อมูลสารสนเทศภูมิศาสตร์ บริษัทค้าส่งใช้ข้อมูลประชากร และโครงสร้างพื้นฐานในการหาพื้นที่ตั้งศูนย์การกระจายสินค้า ธุรกิจอสังหาริมทรัพย์ใช้ข้อมูลราคาพื้นที่ การจัดโซน การคมนาคม ความสูง และปัจจัยอื่นๆเฉพาะพื้นที่ในการสร้างพื้นที่อยู่อาศัยใหม่ ธุรกิจภาคเกษตรใช้ข้อมูลที่ทันต่อเวลาในการทำนายผลผลิต การวิเคราะห์โรคพืชและแมลง ระบบการให้น้ำและปุ๋ย ธุรกิจการผลิตเลือกที่ตั้งโรงงานจากปัจจัยที่ต่างกันซึ่งรวมไปถึง แหล่งน้ำ ความน่าจะเป็นในการเกิดน้ำท่วม และตลาดแรงงาน ธุรกิจการโฆษณามีการทำธุรกิจเพิ่มขึ้นในด้านสื่อทางอินเทอเน็ตที่ตอบสนองต่อความต้องการเชิงพื้นที่</p>\r\n\r\n<p>ในทางปฏิบัตินั้นข้อมูลสารสนเทศภูมิศาสตร์เป็นที่ต้องการในทุกภาคทั้งทางด้านเกษตรกรรม การท่องเที่ยว สาธารณสุข และการขนส่ง เนื่องจากความก้าวหน้าทางเทคโนโลยี และค่าใช้จ่ายที่ลดลงทางด้านอุปกรณ์คอมพิวเตอร์ ในแต่ละปีจึงมีความต้องการข้อมูลสารสนเทศภูมิศาสตร์ทั้งเชิงปริมาณและคุณภาพเพิ่มขึ้น</p>');
INSERT INTO `MSGTEXT` VALUES('KGEO00011', 'tha', '<p>ศูนย์วิศวกรรมสารสนเทศภูมิศาสตร์และนวัตกรรม มีหน้าที่ดังนี้</p>\r\n\r\n<li>ออกแบบและทำงานวิจัยด้านสารสนเทศภูมิศาสตร์ในปัญหาที่มีความสำคัญและสามารถหาแนวทางแก้ไขที่เป็นไปได้ ซึ่งอาจจะเกี่ยวกับการสร้างนวัตกรรมหรือการประยุกต์ใช้ความรู้ที่มีอยู่</li>\r\n\r\n<li>สนับสนุนและประสานงานในการดำเนินงานวิจัยทางด้านสารสนเทศภูมิศาสตร์ทั้งด้านความรู้และเครื่องมือสำหรับนักวิจัยและนักศึกษาภายในมหาวิทยาลัย</li>\r\n\r\n<li>กระตุ้นและผลักดันให้เกิดการพัฒนาสำหรับนักศึกษาทั้งทางด้านวิศวกรรมสารสนเทศภูมิศาสตร์และระบบสารสนเทศภูมิศาสตร์ เพื่อให้นำไปใช้ประโยชน์ได้ต่อไปทั้งในมหาวิทยาลัยภาคเอกชน และในสังคม</li>\r\n\r\n<li>สร้างชื่อเสียงมหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรีให้เป็นที่รู้จักทั้งในระดับประเทศและเอเชียตะวันออกเฉียงใต้ในด้านวิศวกรรมสารสนเทศภูมิศาสตร์</li>');
INSERT INTO `MSGTEXT` VALUES('STAF00021', 'tha', 'เคจีโอสามารถเป็นศูนย์กลางในการติดต่อและประสานความร่วมมือระหว่างผู้เชี่ยวชาญและนักวิจัยกว่า 500 คน ในหลากหลายสาขาวิชา ทั้งด้านวิศวกรรมและวิทยาศาสตร์ อันได้แก่ วิศวกรรมโยธา วิศวกรรมเครื่องกล วิศวกรรมคอมพิวเตอร์ วิศวกรรมหุ่นยนต์ วิศวกรรมสิ่งแวดล้อม เคมี ชีวภาพ สถาปัตยกรรมและการออกแบบ');
INSERT INTO `MSGTEXT` VALUES('PJTY00006', 'tha', 'โครงงานระดับปริญญาตรี');
INSERT INTO `MSGTEXT` VALUES('KGEO00012', 'tha', '<p><font style=`font-weight:bold; font-style:italic`>เพื่อให้บริการทางด้านวิศวกรรมสารสนเทศภูมิศาสตร์: </font>แก่ทั้งภาครัฐและภาคเอกชนโดยการให้คำปรึกษาและให้ความร่วมมือผ่านโครงงานต่างๆ สร้างนวัตกรรมและงานวิจัยที่ได้รับการสนับสนุนจากหน่วยงานภาครัฐและเอกชน</p>\r\n\r\n<p><font style=`font-weight:bold; font-style:italic`>เพื่อริเริ่มและพัฒนาการฝึกอบรมแก่นักศึกษา: </font>ทั้งในระดับปริญญาตรีและงานวิจัยในระดับปริญญาโทและเอก เกี่ยวกับหัวข้อทางด้านสารสนเทศภูมิศาสตร์</p>\r\n\r\n<p><font style=`font-weight:bold; font-style:italic`>เพื่อเสริมสร้างการสื่อสารและการทำงานร่วมกันของหน่วยงานภายในมหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี: </font>เป็นศูนย์กลางในการประสานงานด้านการวิจัยสำหรับผู้ทำวิจัยและผู้ที่สอนรายวิชาเกี่ยวกับการประมวลผลข้อมูลสารสนเทศภูมิศาสตร์</p>\r\n\r\n<p><font style=`font-weight:bold; font-style:italic`>เพื่อพัฒนาเครื่องมือทั้งโปรแกรมและอุปกรณ์ในการทำงานด้านสารสนเทศภูมิศาสตร์: </font>ซึ่งบุคคลากรภายในมหาวิทยาลัยสามารถนำไปใช้ได้ และสามารถเผยแพร่ในระดับประเทศและระดับโลก</p>\r\n\r\n');
INSERT INTO `MSGTEXT` VALUES('PROJ00001', 'eng', 'Project');
INSERT INTO `MSGTEXT` VALUES('STAF00020', 'eng', 'Ancillary Personnel');
INSERT INTO `MSGTEXT` VALUES('STAF00021', 'eng', 'KGEO can call on the expertise of more than five hundred distinguished faculty and researchers in a variety of engineering and scientific disciplines including civil engineering, mechanical engineering, computer engineering, robotics, environmental engineering, chemistry, biotechnology, architecture and design. ');
INSERT INTO `MSGTEXT` VALUES('STAF00019', 'eng', 'Our team');
INSERT INTO `MSGTEXT` VALUES('STAF00019', 'tha', 'ทีมงานของเรา');
INSERT INTO `MSGTEXT` VALUES('COLL00009', 'eng', 'Our Clients');
INSERT INTO `MSGTEXT` VALUES('COLL00009', 'tha', 'ลูกค้าของเรา');
INSERT INTO `MSGTEXT` VALUES('COLL00010', 'eng', 'Our Partners');
INSERT INTO `MSGTEXT` VALUES('COLL00010', 'tha', 'พันธมิตรของเรา');
INSERT INTO `MSGTEXT` VALUES('PROD00001', 'eng', 'Products and Services');
INSERT INTO `MSGTEXT` VALUES('PROD00001', 'tha', 'ผลิตภัณฑ์และบริการ');
INSERT INTO `MSGTEXT` VALUES('PJTY00001', 'eng', 'Data development');
INSERT INTO `MSGTEXT` VALUES('PJTY00001', 'tha', 'การพัฒนาระบบข้อมูล');
INSERT INTO `MSGTEXT` VALUES('PJTY00002', 'eng', 'software design and development');
INSERT INTO `MSGTEXT` VALUES('PJTY00002', 'tha', 'การออกแบบและพัฒนาซอฟต์แวร์');
INSERT INTO `MSGTEXT` VALUES('PJTY00003', 'eng', 'Education ');
INSERT INTO `MSGTEXT` VALUES('PJTY00003', 'tha', 'การศึกษา');
INSERT INTO `MSGTEXT` VALUES('PJTY00004', 'eng', 'Software development');
INSERT INTO `MSGTEXT` VALUES('PJTY00004', 'tha', 'การพัฒนาซอฟต์แวร์');
INSERT INTO `MSGTEXT` VALUES('PJTY00005', 'eng', 'Graduate research ');
INSERT INTO `MSGTEXT` VALUES('PJTY00005', 'tha', 'วิทยานิพนธ์ระดับบัณฑิตศึกษา');
INSERT INTO `MSGTEXT` VALUES('PJTY00006', 'eng', 'Undergraduate research ');
INSERT INTO `MSGTEXT` VALUES('PROJ00002', 'eng', 'Articles');
INSERT INTO `MSGTEXT` VALUES('PROJ00002', 'tha', 'บทความ');
INSERT INTO `MSGTEXT` VALUES('PROJ00003', 'eng', 'Education and Training');
INSERT INTO `MSGTEXT` VALUES('PROJ00003', 'tha', 'หลักสูตรและการฝึกอบรม');
INSERT INTO `MSGTEXT` VALUES('PROJ00018', 'eng', 'Type of project');
INSERT INTO `MSGTEXT` VALUES('PROJ00018', 'tha', 'ประเภทโครงการ');
INSERT INTO `MSGTEXT` VALUES('PROJ00001', 'tha', 'โครงการ');
INSERT INTO `MSGTEXT` VALUES('PROJ00019', 'eng', 'Client');
INSERT INTO `MSGTEXT` VALUES('PROJ00019', 'tha', 'ดำเนินการให้กับ');
INSERT INTO `MSGTEXT` VALUES('PUBL00004', 'eng', 'Published in');
INSERT INTO `MSGTEXT` VALUES('PUBL00005', 'eng', 'Abstract');
INSERT INTO `MSGTEXT` VALUES('PUBL00005', 'tha', 'บทคัดย่อ');
INSERT INTO `MSGTEXT` VALUES('ARTY00002', 'tha', 'บทความในการประชุมวิชาการ');
INSERT INTO `MSGTEXT` VALUES('ARTY00002', 'eng', 'Conference Paper');
INSERT INTO `MSGTEXT` VALUES('ARTY00005', 'eng', 'Technical Report');
INSERT INTO `MSGTEXT` VALUES('STAF00020', 'tha', 'บุคลากรอื่นๆ');
INSERT INTO `MSGTEXT` VALUES('ARTY00001', 'eng', 'Thesis / Dissertation ');
INSERT INTO `MSGTEXT` VALUES('ARTY00005', 'tha', 'รายงานเชิงเทคนิค');
INSERT INTO `MSGTEXT` VALUES('ARTY00004', 'tha', 'พรีเซนเทชั่น');
INSERT INTO `MSGTEXT` VALUES('PUBL00006', 'tha', 'ปีที่ตีพิมพ์ (ค.ศ)');
INSERT INTO `MSGTEXT` VALUES('SLTY00001', 'eng', 'General');
INSERT INTO `MSGTEXT` VALUES('SLTY00001', 'tha', 'ทั่วไป');
INSERT INTO `MSGTEXT` VALUES('SLTY00006', 'eng', 'Graduate');
INSERT INTO `MSGTEXT` VALUES('SLTY00002', 'tha', 'ปริญญาตรี ชั้นปีที่ 1');
INSERT INTO `MSGTEXT` VALUES('SLTY00003', 'tha', 'ปริญญาตรี ชั้นปีที่ 2');
INSERT INTO `MSGTEXT` VALUES('SLTY00004', 'tha', 'ปริญญาตรี ชั้นปีที่ 3\r\n\r\n');
INSERT INTO `MSGTEXT` VALUES('SLTY00005', 'tha', 'ปริญญาตรี ชั้นปีที่ 4');
INSERT INTO `MSGTEXT` VALUES('SLTY00006', 'tha', 'บัณฑิตศึกษา');
INSERT INTO `MSGTEXT` VALUES('DPTY00001', 'eng', 'Computer Engineering');
INSERT INTO `MSGTEXT` VALUES('DPTY00001', 'tha', 'วิศวกรรรมคอมพิวเตอร์');
INSERT INTO `MSGTEXT` VALUES('DPTY00002', 'eng', 'Mathematics ');
INSERT INTO `MSGTEXT` VALUES('DPTY00002', 'tha', 'คณิตศาสตร์');
INSERT INTO `MSGTEXT` VALUES('EDCT00010', 'eng', 'Instructor');
INSERT INTO `MSGTEXT` VALUES('EDCT00012', 'eng', 'Department');
INSERT INTO `MSGTEXT` VALUES('EDCT00012', 'tha', 'ภาควิชา');
INSERT INTO `MSGTEXT` VALUES('EDCT00011', 'eng', 'Student level');
INSERT INTO `MSGTEXT` VALUES('EDCT00013', 'eng', 'Term');
INSERT INTO `MSGTEXT` VALUES('EDCT00013', 'tha', 'ภาคการศึกษา');
INSERT INTO `MSGTEXT` VALUES('EDCT00010', 'tha', 'อาจารย์ผู้สอน');
INSERT INTO `MSGTEXT` VALUES('EDCT00014', 'eng', 'Description');
INSERT INTO `MSGTEXT` VALUES('EDCT00011', 'tha', 'ระดับนักศึกษา');
INSERT INTO `MSGTEXT` VALUES('EDCT00014', 'tha', 'เกี่ยวกับรายวิชา');
INSERT INTO `MSGTEXT` VALUES('SLTY00002', 'eng', '1st year undergrad student');
INSERT INTO `MSGTEXT` VALUES('SLTY00003', 'eng', '2nd year undergrad student');
INSERT INTO `MSGTEXT` VALUES('SLTY00004', 'eng', '3rd year undergrad student');
INSERT INTO `MSGTEXT` VALUES('SLTY00005', 'eng', '4th year undergrad student');
INSERT INTO `MSGTEXT` VALUES('NEWS00007', 'eng', 'News');
INSERT INTO `MSGTEXT` VALUES('NEWS00007', 'tha', 'ข่าวสาร');

-- --------------------------------------------------------

--
-- Table structure for table `NEWS`
--

DROP TABLE IF EXISTS `NEWS`;
CREATE TABLE `NEWS` (
  `NewsId` int(11) NOT NULL,
  `HeadlineId` varchar(15) NOT NULL,
  `PubDate` date default NULL,
  `PicId` int(11) default NULL,
  `SourceId` int(11) default NULL,
  `ExternURL` varchar(300) default NULL,
  `DisplayOrder` int(11) NOT NULL,
  `ContentId` varchar(15) default NULL,
  PRIMARY KEY  (`NewsId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `NEWS`
--

INSERT INTO `NEWS` VALUES(2, 'NEWS00003', '2013-11-01', NULL, NULL, NULL, 2, 'NEWS00004');
INSERT INTO `NEWS` VALUES(1, 'NEWS00001', '2013-11-01', NULL, NULL, '100resilientcities.rockefellerfoundation.org/pages/about-the-challenge', 1, 'NEWS00002');
INSERT INTO `NEWS` VALUES(3, 'NEWS00005', '2013-11-01', 21, NULL, 'geoinfotech.gistda.or.th', 3, 'NEWS00006');

-- --------------------------------------------------------

--
-- Table structure for table `ORGANIZATIONTYPELOOKUP`
--

DROP TABLE IF EXISTS `ORGANIZATIONTYPELOOKUP`;
CREATE TABLE `ORGANIZATIONTYPELOOKUP` (
  `Id` int(11) NOT NULL,
  `MsgKey` varchar(15) NOT NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ORGANIZATIONTYPELOOKUP`
--


-- --------------------------------------------------------

--
-- Table structure for table `PICTURE`
--

DROP TABLE IF EXISTS `PICTURE`;
CREATE TABLE `PICTURE` (
  `PicId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Caption` varchar(150) default NULL,
  `Location` varchar(150) NOT NULL,
  PRIMARY KEY  (`PicId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PICTURE`
--

INSERT INTO `PICTURE` VALUES(5, 'egat.jpg', NULL, './content_img/');
INSERT INTO `PICTURE` VALUES(6, 'kmutt.png', NULL, './content_img/');
INSERT INTO `PICTURE` VALUES(7, 'fibo.jpg', NULL, './content_img/');
INSERT INTO `PICTURE` VALUES(8, 'innosoft.jpg', NULL, './content_img/');
INSERT INTO `PICTURE` VALUES(9, 'cpe.png', NULL, './content_img/');
INSERT INTO `PICTURE` VALUES(10, 'math_banner.jpg', NULL, './content_img/');
INSERT INTO `PICTURE` VALUES(11, 'PerryPhoto.jpg', NULL, './content_img/');
INSERT INTO `PICTURE` VALUES(12, 'SallyPhoto.jpg', NULL, './content_img/');
INSERT INTO `PICTURE` VALUES(13, 'KurtPhoto.jpg', NULL, './content_img/');
INSERT INTO `PICTURE` VALUES(1, 'KMUTT.jpg', 'kGeo is located at King Mongkut''s University of Technology Thonburi', './content_img/');
INSERT INTO `PICTURE` VALUES(3, 'KMUTT3.jpg', 'Beautiful night in Bangmod', './content_img/');
INSERT INTO `PICTURE` VALUES(4, 'dwrlogo.png', NULL, './content_img/');
INSERT INTO `PICTURE` VALUES(14, 'bmalogo.png', NULL, './content_img/');
INSERT INTO `PICTURE` VALUES(15, 'FaridaPhoto.jpg', NULL, './content_img/');
INSERT INTO `PICTURE` VALUES(16, 'SupanneePhoto.jpg', NULL, './content_img/');
INSERT INTO `PICTURE` VALUES(18, '3dcanal_1.png', NULL, './content_img/');
INSERT INTO `PICTURE` VALUES(17, 'amphawaproj.png', NULL, './content_img/');
INSERT INTO `PICTURE` VALUES(2, 'KMUTT2.jpg', 'Bangmod campus', './content_img/');
INSERT INTO `PICTURE` VALUES(20, 'lampradong_1.png', 'Water Management on Lumpradong Stream Network and Community Conservation', './content_img/');
INSERT INTO `PICTURE` VALUES(19, 'floodfinder_news.png', 'Floodfinder won the first prize of students with solutions mobile application competition in 2011', './content_img/');
INSERT INTO `PICTURE` VALUES(21, 'b-geoinfo2013.jpg', NULL, './content_img/');

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT`
--

DROP TABLE IF EXISTS `PRODUCT`;
CREATE TABLE `PRODUCT` (
  `ProductId` int(11) NOT NULL,
  `NameId` varchar(15) NOT NULL,
  `DescriptionId` varchar(15) default NULL,
  `PicId` int(11) default NULL,
  `SourceId` int(11) default NULL,
  `ExternURL` varchar(300) default NULL,
  `DisplayOrder` int(11) NOT NULL,
  PRIMARY KEY  (`ProductId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PRODUCT`
--

INSERT INTO `PRODUCT` VALUES(1, 'PROD00002', 'PROD00003', NULL, NULL, NULL, 1);
INSERT INTO `PRODUCT` VALUES(2, 'PROD00004', 'PROD00005', NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `PROJECT`
--

DROP TABLE IF EXISTS `PROJECT`;
CREATE TABLE `PROJECT` (
  `ProjectId` int(11) NOT NULL,
  `TitleId` varchar(15) NOT NULL,
  `ClientId` varchar(15) NOT NULL,
  `PicId` int(11) default NULL,
  `DescriptionId` varchar(15) NOT NULL,
  `SourceId` int(11) default NULL,
  `ExternURL` varchar(300) default NULL,
  `DisplayOrder` int(11) NOT NULL,
  `TypeId` text NOT NULL,
  `AuthorityId` varchar(15) default NULL,
  PRIMARY KEY  (`ProjectId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PROJECT`
--

INSERT INTO `PROJECT` VALUES(1, 'PROJ00004', 'PROJ00005', 17, 'PROJ00006', NULL, NULL, 1, '{''PJTY00001'',''PJTY00002'',''PJTY00003''}', NULL);
INSERT INTO `PROJECT` VALUES(3, 'PROJ00010', 'PROJ00011', NULL, 'PROJ00012', NULL, NULL, 3, '{''PJTY00005''}', 'PROJ00013');
INSERT INTO `PROJECT` VALUES(2, 'PROJ00007', 'PROJ00008', 18, 'PROJ00009', NULL, NULL, 2, '{''PJTY00004''}', NULL);
INSERT INTO `PROJECT` VALUES(4, 'PROJ00014', 'PROJ00015', 19, 'PROJ00016', NULL, NULL, 4, '{''PJTY00006''}', 'PROJ00017');

-- --------------------------------------------------------

--
-- Table structure for table `PROJECTTYPELOOKUP`
--

DROP TABLE IF EXISTS `PROJECTTYPELOOKUP`;
CREATE TABLE `PROJECTTYPELOOKUP` (
  `Id` int(11) NOT NULL,
  `MsgKey` varchar(15) NOT NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PROJECTTYPELOOKUP`
--

INSERT INTO `PROJECTTYPELOOKUP` VALUES(1, 'PJTY00001');
INSERT INTO `PROJECTTYPELOOKUP` VALUES(2, 'PJTY00002');
INSERT INTO `PROJECTTYPELOOKUP` VALUES(3, 'PJTY00003');
INSERT INTO `PROJECTTYPELOOKUP` VALUES(4, 'PJTY00004');
INSERT INTO `PROJECTTYPELOOKUP` VALUES(5, 'PJTY00005');
INSERT INTO `PROJECTTYPELOOKUP` VALUES(6, 'PJTY00006');

-- --------------------------------------------------------

--
-- Table structure for table `PUBLICATION`
--

DROP TABLE IF EXISTS `PUBLICATION`;
CREATE TABLE `PUBLICATION` (
  `PublicationId` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Author` varchar(200) NOT NULL,
  `TypeId` varchar(15) NOT NULL,
  `Publish` varchar(200) default NULL,
  `Year` int(11) default NULL,
  `AbstractId` varchar(15) NOT NULL,
  `ExternURL` varchar(200) default NULL,
  `SourceId` int(11) default NULL,
  PRIMARY KEY  (`PublicationId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PUBLICATION`
--

INSERT INTO `PUBLICATION` VALUES(1, 'Incorporating Geospatial Information and Animation in a Mobile Web-based Irrigation Management System', 'Chanon Pansamuth and Sally E. Goldin', 'ARTY00002', 'Proceedings of the International Symposium on Mobile Mapping Technology (MMT 2013) , Tainan, Taiwan, May 2013.  ', 2013, 'PUBL00001', 'conf.ncku.edu.tw/mmt2013/', 1);
INSERT INTO `PUBLICATION` VALUES(2, 'Integrated Precipitation Monitoring from Weather Radar using Thai Grid', 'Sally E. Goldin and Kurt T. Rudahl', 'ARTY00002', 'Proceedings of GISTDA GeoInfoTech (Thailand national mapping conference) 2012.', 2012, 'PUBL00002', 'www.gistda.or.th', 2);
INSERT INTO `PUBLICATION` VALUES(3, 'Mobile Geotagged Data Gathering for Disaster Remediation', 'Sally E. Goldin and Kurt T. Rudahl', 'ARTY00002', 'Proceedings of COMNETSAT2012, July 2012, Bali, Indonesia.', 2012, 'PUBL00003', 'www.comnetsat.org', 3);

-- --------------------------------------------------------

--
-- Table structure for table `SOURCE`
--

DROP TABLE IF EXISTS `SOURCE`;
CREATE TABLE `SOURCE` (
  `SourceId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Location` varchar(200) NOT NULL,
  PRIMARY KEY  (`SourceId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SOURCE`
--

INSERT INTO `SOURCE` VALUES(1, 'PansamuthMMTPaper.pdf', './source/1/');
INSERT INTO `SOURCE` VALUES(2, 'GoldinPrecipitationMonitoring.pdf', './source/2/');
INSERT INTO `SOURCE` VALUES(3, 'GoldinMobileData.pdf', './source/3/');

-- --------------------------------------------------------

--
-- Table structure for table `STAFF`
--

DROP TABLE IF EXISTS `STAFF`;
CREATE TABLE `STAFF` (
  `PersonId` int(11) NOT NULL,
  `NameId` varchar(15) NOT NULL,
  `PositionId` varchar(15) NOT NULL,
  `ProfileId` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PicId` int(11) default NULL,
  `SourceId` int(11) default NULL,
  `DisplayOrder` int(11) NOT NULL,
  `ExternURL` varchar(300) default NULL,
  PRIMARY KEY  (`PersonId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `STAFF`
--

INSERT INTO `STAFF` VALUES(1, 'STAF00001', 'STAF00002', 'STAF00003', 'pariwate@gmail.com', 11, NULL, 1, NULL);
INSERT INTO `STAFF` VALUES(2, 'STAF00004', 'STAF00005', 'STAF00006', 'seg@goldin-rudahl.com', 12, NULL, 2, NULL);
INSERT INTO `STAFF` VALUES(3, 'STAF00007', 'STAF00008', 'STAF00009', 'kurt@cpe.kmutt.ac.th', 13, NULL, 3, NULL);
INSERT INTO `STAFF` VALUES(6, 'STAF00016', 'STAF00017', 'STAF00018', 'littlebearproject@gmail.com', 16, NULL, 4, NULL);
INSERT INTO `STAFF` VALUES(4, 'STAF00010', 'STAF00011', 'STAF00012', 'pra.thananan@gmail.com', NULL, NULL, 5, NULL);
INSERT INTO `STAFF` VALUES(5, 'STAF00013', 'STAF00014', 'STAF00015', 'fajung15@gmail.com', 15, NULL, 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `STUDENTLEVELLOOKUP`
--

DROP TABLE IF EXISTS `STUDENTLEVELLOOKUP`;
CREATE TABLE `STUDENTLEVELLOOKUP` (
  `Id` int(11) NOT NULL,
  `MsgKey` varchar(15) default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `STUDENTLEVELLOOKUP`
--

INSERT INTO `STUDENTLEVELLOOKUP` VALUES(1, 'SLTY00001');
INSERT INTO `STUDENTLEVELLOOKUP` VALUES(2, 'SLTY00002');
INSERT INTO `STUDENTLEVELLOOKUP` VALUES(3, 'SLTY00003');
INSERT INTO `STUDENTLEVELLOOKUP` VALUES(4, 'SLTY00004');
INSERT INTO `STUDENTLEVELLOOKUP` VALUES(5, 'SLTY00005');
INSERT INTO `STUDENTLEVELLOOKUP` VALUES(6, 'SLTY00006');

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

DROP TABLE IF EXISTS `USER`;
CREATE TABLE `USER` (
  `UserId` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Name` varchar(150) default NULL,
  `OrgTypeId` int(11) NOT NULL,
  `OrganizationName` varchar(150) NOT NULL,
  `PostalAddress` int(11) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Fax` varchar(20) NOT NULL,
  `Subscribed` tinyint(1) NOT NULL,
  `Registered` tinyint(1) NOT NULL,
  `Active` char(1) NOT NULL,
  PRIMARY KEY  (`UserId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `USER`
--


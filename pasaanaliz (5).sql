-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2026 at 06:40 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pasaanaliz`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-1e5602d43b963d7a727338e5ef7761a5d607cc8c', 'i:1;', 1776952122),
('laravel-cache-1e5602d43b963d7a727338e5ef7761a5d607cc8c:timer', 'i:1776952122;', 1776952122),
('laravel-cache-23987a11add3daa789455b06faf2ec539d678627', 'i:1;', 1776953323),
('laravel-cache-23987a11add3daa789455b06faf2ec539d678627:timer', 'i:1776953323;', 1776953323),
('laravel-cache-5c785c036466adea360111aa28563bfd556b5fba', 'i:1;', 1779466464),
('laravel-cache-5c785c036466adea360111aa28563bfd556b5fba:timer', 'i:1779466464;', 1779466464),
('laravel-cache-lv:v3.24.0:file:9d304337-laravel.log:ecf8427e:chunk:0', 'a:370:{i:1774859783;a:1:{s:5:\"ERROR\";a:1:{i:0;i:0;}}i:1775197974;a:1:{s:5:\"ERROR\";a:1:{i:1;i:2728;}}i:1775198199;a:1:{s:5:\"ERROR\";a:1:{i:2;i:25329;}}i:1775198441;a:1:{s:5:\"ERROR\";a:1:{i:3;i:36630;}}i:1775198486;a:1:{s:5:\"ERROR\";a:1:{i:4;i:47950;}}i:1775198487;a:1:{s:5:\"ERROR\";a:1:{i:5;i:58800;}}i:1775198642;a:1:{s:5:\"ERROR\";a:1:{i:6;i:62455;}}i:1775198643;a:1:{s:5:\"ERROR\";a:1:{i:7;i:73305;}}i:1775198968;a:1:{s:5:\"ERROR\";a:1:{i:8;i:76960;}}i:1775199148;a:1:{s:5:\"ERROR\";a:1:{i:9;i:82268;}}i:1775199155;a:1:{s:5:\"ERROR\";a:1:{i:10;i:93118;}}i:1775199224;a:1:{s:5:\"ERROR\";a:1:{i:11;i:118166;}}i:1775199270;a:1:{s:5:\"ERROR\";a:1:{i:12;i:159326;}}i:1775199314;a:1:{s:5:\"ERROR\";a:1:{i:13;i:200530;}}i:1775201111;a:1:{s:5:\"ERROR\";a:1:{i:14;i:211380;}}i:1775202549;a:1:{s:5:\"ERROR\";a:1:{i:15;i:212879;}}i:1775202574;a:1:{s:5:\"ERROR\";a:1:{i:16;i:253584;}}i:1775220324;a:1:{s:5:\"ERROR\";a:1:{i:17;i:294289;}}i:1775220360;a:1:{s:5:\"ERROR\";a:1:{i:18;i:294859;}}i:1775220391;a:1:{s:5:\"ERROR\";a:1:{i:19;i:295429;}}i:1775220399;a:1:{s:5:\"ERROR\";a:1:{i:20;i:306279;}}i:1775220406;a:1:{s:5:\"ERROR\";a:1:{i:21;i:317129;}}i:1775220433;a:1:{s:5:\"ERROR\";a:1:{i:22;i:317699;}}i:1775220454;a:1:{s:5:\"ERROR\";a:1:{i:23;i:318269;}}i:1775220458;a:1:{s:5:\"ERROR\";a:1:{i:24;i:318839;}}i:1775220459;a:1:{s:5:\"ERROR\";a:1:{i:25;i:319409;}}i:1775220484;a:1:{s:5:\"ERROR\";a:1:{i:26;i:319979;}}i:1775220499;a:1:{s:5:\"ERROR\";a:1:{i:27;i:320549;}}i:1775309075;a:1:{s:5:\"ERROR\";a:1:{i:28;i:321119;}}i:1775309101;a:1:{s:5:\"ERROR\";a:1:{i:29;i:329985;}}i:1775309660;a:1:{s:5:\"ERROR\";a:1:{i:30;i:338851;}}i:1775309680;a:1:{s:5:\"ERROR\";a:1:{i:31;i:347717;}}i:1775309720;a:1:{s:5:\"ERROR\";a:1:{i:32;i:356583;}}i:1775309767;a:1:{s:5:\"ERROR\";a:1:{i:33;i:380978;}}i:1775309771;a:1:{s:5:\"ERROR\";a:1:{i:34;i:405373;}}i:1775310127;a:1:{s:5:\"ERROR\";a:1:{i:35;i:429768;}}i:1775673663;a:1:{s:4:\"INFO\";a:1:{i:36;i:454169;}}i:1775673667;a:1:{s:5:\"ERROR\";a:1:{i:37;i:454288;}}i:1775673752;a:2:{s:4:\"INFO\";a:1:{i:38;i:454383;}s:5:\"ERROR\";a:1:{i:39;i:454502;}}i:1775673802;a:1:{s:4:\"INFO\";a:1:{i:40;i:454597;}}i:1775673803;a:1:{s:5:\"ERROR\";a:1:{i:41;i:454716;}}i:1775676960;a:1:{s:4:\"INFO\";a:1:{i:42;i:454811;}}i:1775676961;a:1:{s:5:\"ERROR\";a:1:{i:43;i:454930;}}i:1775725205;a:1:{s:4:\"INFO\";a:1:{i:44;i:455025;}}i:1775725209;a:1:{s:5:\"ERROR\";a:1:{i:45;i:455144;}}i:1775727139;a:2:{s:4:\"INFO\";a:1:{i:46;i:455239;}s:5:\"ERROR\";a:1:{i:47;i:455358;}}i:1775727220;a:2:{s:4:\"INFO\";a:1:{i:48;i:455453;}s:5:\"ERROR\";a:1:{i:49;i:455572;}}i:1775727264;a:2:{s:4:\"INFO\";a:1:{i:50;i:455667;}s:5:\"ERROR\";a:1:{i:51;i:455786;}}i:1775727613;a:1:{s:4:\"INFO\";a:1:{i:52;i:455881;}}i:1775727614;a:1:{s:5:\"ERROR\";a:1:{i:53;i:456000;}}i:1775727662;a:1:{s:4:\"INFO\";a:1:{i:54;i:456095;}}i:1775727663;a:1:{s:5:\"ERROR\";a:1:{i:55;i:456214;}}i:1775728071;a:1:{s:4:\"INFO\";a:2:{i:56;i:456309;i:57;i:456423;}}i:1775728072;a:1:{s:5:\"ERROR\";a:1:{i:58;i:456478;}}i:1775728314;a:2:{s:4:\"INFO\";a:2:{i:59;i:465563;i:60;i:465677;}s:5:\"ERROR\";a:1:{i:61;i:465732;}}i:1775728503;a:1:{s:4:\"INFO\";a:2:{i:62;i:474817;i:63;i:474931;}}i:1775728504;a:1:{s:4:\"INFO\";a:1:{i:64;i:474986;}}i:1775728505;a:1:{s:5:\"ERROR\";a:1:{i:65;i:475138;}}i:1775728647;a:1:{s:4:\"INFO\";a:2:{i:66;i:487215;i:67;i:487329;}}i:1775728648;a:2:{s:4:\"INFO\";a:1:{i:68;i:487384;}s:5:\"ERROR\";a:1:{i:69;i:487536;}}i:1775728721;a:2:{s:4:\"INFO\";a:3:{i:70;i:499616;i:71;i:499730;i:72;i:499785;}s:5:\"ERROR\";a:1:{i:73;i:499937;}}i:1775728828;a:1:{s:4:\"INFO\";a:5:{i:74;i:512017;i:75;i:512131;i:76;i:512186;i:77;i:512338;i:78;i:512411;}}i:1775728868;a:1:{s:4:\"INFO\";a:3:{i:79;i:512483;i:80;i:512597;i:81;i:512652;}}i:1775728869;a:1:{s:4:\"INFO\";a:2:{i:82;i:512804;i:83;i:512884;}}i:1775729389;a:1:{s:4:\"INFO\";a:5:{i:84;i:512956;i:85;i:513070;i:86;i:513125;i:87;i:513277;i:88;i:513357;}}i:1775731671;a:1:{s:4:\"INFO\";a:1:{i:89;i:513429;}}i:1775731673;a:1:{s:4:\"INFO\";a:1:{i:90;i:513508;}}i:1775731674;a:1:{s:4:\"INFO\";a:1:{i:91;i:513586;}}i:1775731676;a:1:{s:4:\"INFO\";a:1:{i:92;i:513665;}}i:1775731677;a:1:{s:4:\"INFO\";a:1:{i:93;i:513744;}}i:1775731679;a:1:{s:4:\"INFO\";a:1:{i:94;i:513822;}}i:1775731681;a:1:{s:4:\"INFO\";a:1:{i:95;i:513900;}}i:1775731682;a:1:{s:4:\"INFO\";a:1:{i:96;i:513979;}}i:1775731684;a:1:{s:4:\"INFO\";a:1:{i:97;i:514058;}}i:1775731685;a:1:{s:4:\"INFO\";a:1:{i:98;i:514137;}}i:1775731687;a:1:{s:4:\"INFO\";a:1:{i:99;i:514215;}}i:1775731688;a:1:{s:4:\"INFO\";a:1:{i:100;i:514294;}}i:1775731690;a:1:{s:4:\"INFO\";a:2:{i:101;i:514373;i:102;i:514452;}}i:1775731691;a:1:{s:4:\"INFO\";a:1:{i:103;i:514539;}}i:1775731693;a:1:{s:4:\"INFO\";a:1:{i:104;i:514618;}}i:1775731695;a:1:{s:4:\"INFO\";a:1:{i:105;i:514696;}}i:1775731696;a:1:{s:4:\"INFO\";a:1:{i:106;i:514775;}}i:1775731698;a:1:{s:4:\"INFO\";a:1:{i:107;i:514854;}}i:1775731699;a:1:{s:4:\"INFO\";a:1:{i:108;i:514932;}}i:1775731701;a:1:{s:4:\"INFO\";a:1:{i:109;i:515010;}}i:1775731703;a:1:{s:4:\"INFO\";a:1:{i:110;i:515089;}}i:1775731704;a:1:{s:4:\"INFO\";a:1:{i:111;i:515168;}}i:1775731706;a:1:{s:4:\"INFO\";a:1:{i:112;i:515247;}}i:1775731707;a:1:{s:4:\"INFO\";a:1:{i:113;i:515325;}}i:1775731709;a:1:{s:4:\"INFO\";a:1:{i:114;i:515404;}}i:1775731710;a:1:{s:4:\"INFO\";a:2:{i:115;i:515483;i:116;i:515562;}}i:1775731712;a:1:{s:4:\"INFO\";a:1:{i:117;i:515649;}}i:1775731713;a:1:{s:4:\"INFO\";a:1:{i:118;i:515728;}}i:1775731715;a:1:{s:4:\"INFO\";a:1:{i:119;i:515806;}}i:1775731716;a:1:{s:4:\"INFO\";a:1:{i:120;i:515885;}}i:1775731718;a:1:{s:4:\"INFO\";a:1:{i:121;i:515964;}}i:1775731720;a:1:{s:4:\"INFO\";a:1:{i:122;i:516042;}}i:1775731721;a:1:{s:4:\"INFO\";a:1:{i:123;i:516120;}}i:1775731723;a:1:{s:4:\"INFO\";a:1:{i:124;i:516199;}}i:1775731724;a:1:{s:4:\"INFO\";a:1:{i:125;i:516278;}}i:1775731726;a:1:{s:4:\"INFO\";a:1:{i:126;i:516357;}}i:1775731727;a:1:{s:4:\"INFO\";a:1:{i:127;i:516435;}}i:1775731729;a:1:{s:4:\"INFO\";a:1:{i:128;i:516514;}}i:1775731730;a:1:{s:4:\"INFO\";a:2:{i:129;i:516593;i:130;i:516672;}}i:1775731757;a:1:{s:4:\"INFO\";a:6:{i:131;i:516759;i:132;i:516839;i:133;i:516926;i:134;i:517006;i:135;i:517093;i:136;i:517173;}}i:1775731879;a:1:{s:4:\"INFO\";a:2:{i:137;i:517260;i:138;i:517340;}}i:1775731903;a:1:{s:4:\"INFO\";a:14:{i:139;i:517427;i:140;i:517507;i:141;i:517586;i:142;i:517666;i:143;i:517746;i:144;i:517825;i:145;i:517904;i:146;i:517984;i:147;i:518064;i:148;i:518144;i:149;i:518223;i:150;i:518303;i:151;i:518383;i:152;i:518463;}}i:1775731993;a:1:{s:4:\"INFO\";a:14:{i:153;i:518550;i:154;i:518629;i:155;i:518708;i:156;i:518788;i:157;i:518868;i:158;i:518947;i:159;i:519026;i:160;i:519106;i:161;i:519186;i:162;i:519266;i:163;i:519345;i:164;i:519425;i:165;i:519505;i:166;i:519585;}}i:1775732066;a:1:{s:4:\"INFO\";a:2:{i:167;i:519672;i:168;i:519752;}}i:1775732202;a:1:{s:4:\"INFO\";a:2:{i:169;i:519839;i:170;i:519919;}}i:1775732226;a:1:{s:4:\"INFO\";a:2:{i:171;i:520006;i:172;i:520086;}}i:1775732442;a:1:{s:4:\"INFO\";a:6:{i:173;i:520173;i:174;i:520253;i:175;i:520340;i:176;i:520420;i:177;i:520507;i:178;i:520587;}}i:1775732508;a:1:{s:4:\"INFO\";a:6:{i:179;i:520674;i:180;i:520754;i:181;i:520841;i:182;i:520921;i:183;i:521008;i:184;i:521088;}}i:1775732756;a:1:{s:4:\"INFO\";a:14:{i:185;i:521175;i:186;i:521255;i:187;i:521334;i:188;i:521414;i:189;i:521494;i:190;i:521573;i:191;i:521652;i:192;i:521732;i:193;i:521812;i:194;i:521892;i:195;i:521971;i:196;i:522051;i:197;i:522131;i:198;i:522211;}}i:1775732773;a:1:{s:4:\"INFO\";a:14:{i:199;i:522298;i:200;i:522378;i:201;i:522457;i:202;i:522537;i:203;i:522617;i:204;i:522696;i:205;i:522775;i:206;i:522855;i:207;i:522935;i:208;i:523015;i:209;i:523094;i:210;i:523174;i:211;i:523254;i:212;i:523334;}}i:1775732953;a:1:{s:4:\"INFO\";a:14:{i:213;i:523421;i:214;i:523501;i:215;i:523580;i:216;i:523660;i:217;i:523740;i:218;i:523819;i:219;i:523898;i:220;i:523978;i:221;i:524058;i:222;i:524138;i:223;i:524217;i:224;i:524297;i:225;i:524377;i:226;i:524457;}}i:1775733479;a:1:{s:5:\"ERROR\";a:1:{i:227;i:524544;}}i:1775733715;a:1:{s:5:\"ERROR\";a:1:{i:228;i:525114;}}i:1775733785;a:1:{s:5:\"ERROR\";a:1:{i:229;i:536605;}}i:1775733941;a:1:{s:5:\"ERROR\";a:1:{i:230;i:548081;}}i:1775734166;a:1:{s:5:\"ERROR\";a:2:{i:231;i:559554;i:232;i:578153;}}i:1775734167;a:1:{s:5:\"ERROR\";a:1:{i:233;i:596752;}}i:1775734168;a:1:{s:5:\"ERROR\";a:1:{i:234;i:615351;}}i:1775734169;a:1:{s:5:\"ERROR\";a:1:{i:235;i:633950;}}i:1775734171;a:1:{s:5:\"ERROR\";a:1:{i:236;i:652549;}}i:1775734175;a:1:{s:5:\"ERROR\";a:1:{i:237;i:671148;}}i:1775734182;a:1:{s:5:\"ERROR\";a:1:{i:238;i:689747;}}i:1775734189;a:1:{s:5:\"ERROR\";a:1:{i:239;i:708346;}}i:1775734196;a:1:{s:5:\"ERROR\";a:1:{i:240;i:726945;}}i:1775734232;a:1:{s:5:\"ERROR\";a:2:{i:241;i:745544;i:242;i:764143;}}i:1775734233;a:1:{s:5:\"ERROR\";a:1:{i:243;i:782742;}}i:1775734234;a:1:{s:5:\"ERROR\";a:1:{i:244;i:801341;}}i:1775734235;a:1:{s:5:\"ERROR\";a:1:{i:245;i:819940;}}i:1775734237;a:1:{s:5:\"ERROR\";a:1:{i:246;i:838539;}}i:1775734241;a:1:{s:5:\"ERROR\";a:1:{i:247;i:857138;}}i:1775734248;a:1:{s:5:\"ERROR\";a:1:{i:248;i:875737;}}i:1775734254;a:1:{s:5:\"ERROR\";a:1:{i:249;i:894336;}}i:1775734261;a:1:{s:5:\"ERROR\";a:1:{i:250;i:912935;}}i:1775734268;a:1:{s:5:\"ERROR\";a:1:{i:251;i:931534;}}i:1775734275;a:1:{s:5:\"ERROR\";a:1:{i:252;i:950133;}}i:1775734706;a:1:{s:5:\"ERROR\";a:1:{i:253;i:968732;}}i:1775734707;a:1:{s:5:\"ERROR\";a:1:{i:254;i:987331;}}i:1775734708;a:1:{s:5:\"ERROR\";a:1:{i:255;i:1005930;}}i:1775734709;a:1:{s:5:\"ERROR\";a:1:{i:256;i:1024529;}}i:1775734711;a:1:{s:5:\"ERROR\";a:1:{i:257;i:1043128;}}i:1775734715;a:1:{s:5:\"ERROR\";a:1:{i:258;i:1061727;}}i:1775734722;a:1:{s:5:\"ERROR\";a:1:{i:259;i:1080326;}}i:1775734792;a:1:{s:5:\"ERROR\";a:1:{i:260;i:1098925;}}i:1775734793;a:1:{s:5:\"ERROR\";a:1:{i:261;i:1117524;}}i:1775734794;a:1:{s:5:\"ERROR\";a:1:{i:262;i:1136123;}}i:1775734795;a:1:{s:5:\"ERROR\";a:1:{i:263;i:1154722;}}i:1775734798;a:1:{s:5:\"ERROR\";a:1:{i:264;i:1173321;}}i:1775734801;a:1:{s:5:\"ERROR\";a:1:{i:265;i:1191920;}}i:1775734808;a:1:{s:5:\"ERROR\";a:1:{i:266;i:1210519;}}i:1775734815;a:1:{s:5:\"ERROR\";a:1:{i:267;i:1229118;}}i:1775734822;a:1:{s:5:\"ERROR\";a:1:{i:268;i:1247717;}}i:1775734829;a:1:{s:5:\"ERROR\";a:1:{i:269;i:1266316;}}i:1775734836;a:1:{s:5:\"ERROR\";a:1:{i:270;i:1284915;}}i:1776798743;a:1:{s:5:\"ERROR\";a:1:{i:271;i:1303514;}}i:1776807285;a:1:{s:5:\"ERROR\";a:1:{i:272;i:1314364;}}i:1776823515;a:1:{s:4:\"INFO\";a:2:{i:273;i:1315863;i:274;i:1315977;}}i:1776823516;a:1:{s:4:\"INFO\";a:3:{i:275;i:1316032;i:276;i:1316184;i:277;i:1316264;}}i:1776825103;a:1:{s:4:\"INFO\";a:5:{i:278;i:1316336;i:279;i:1316450;i:280;i:1316505;i:281;i:1316657;i:282;i:1316737;}}i:1776825104;a:1:{s:5:\"ERROR\";a:1:{i:283;i:1316809;}}i:1776825105;a:1:{s:5:\"ERROR\";a:3:{i:284;i:1339206;i:285;i:1361603;i:286;i:1384000;}}i:1776825106;a:1:{s:5:\"ERROR\";a:1:{i:287;i:1406397;}}i:1776825107;a:1:{s:5:\"ERROR\";a:2:{i:288;i:1428794;i:289;i:1451191;}}i:1776825109;a:1:{s:5:\"ERROR\";a:2:{i:290;i:1473588;i:291;i:1495985;}}i:1776825111;a:1:{s:5:\"ERROR\";a:2:{i:292;i:1518382;i:293;i:1540779;}}i:1776825115;a:1:{s:5:\"ERROR\";a:1:{i:294;i:1563176;}}i:1776825116;a:1:{s:5:\"ERROR\";a:1:{i:295;i:1585573;}}i:1776825119;a:1:{s:5:\"ERROR\";a:1:{i:296;i:1607970;}}i:1776825120;a:1:{s:5:\"ERROR\";a:1:{i:297;i:1629185;}}i:1776825121;a:1:{s:5:\"ERROR\";a:1:{i:298;i:1650400;}}i:1776825124;a:1:{s:5:\"ERROR\";a:1:{i:299;i:1671615;}}i:1776825126;a:1:{s:5:\"ERROR\";a:2:{i:300;i:1692830;i:301;i:1715227;}}i:1776825133;a:1:{s:5:\"ERROR\";a:2:{i:302;i:1737624;i:303;i:1760021;}}i:1776825140;a:1:{s:5:\"ERROR\";a:1:{i:304;i:1782418;}}i:1776825141;a:1:{s:5:\"ERROR\";a:1:{i:305;i:1804815;}}i:1776825148;a:1:{s:5:\"ERROR\";a:2:{i:306;i:1827212;i:307;i:1849609;}}i:1776825155;a:1:{s:5:\"ERROR\";a:2:{i:308;i:1872006;i:309;i:1894403;}}i:1776825179;a:1:{s:5:\"ERROR\";a:1:{i:310;i:1916800;}}i:1776825239;a:1:{s:5:\"ERROR\";a:2:{i:311;i:1938015;i:312;i:1960412;}}i:1776825240;a:1:{s:5:\"ERROR\";a:2:{i:313;i:1982809;i:314;i:2005206;}}i:1776825241;a:1:{s:5:\"ERROR\";a:1:{i:315;i:2027603;}}i:1776825242;a:1:{s:5:\"ERROR\";a:2:{i:316;i:2050000;i:317;i:2072397;}}i:1776825243;a:1:{s:5:\"ERROR\";a:1:{i:318;i:2094794;}}i:1776825244;a:1:{s:5:\"ERROR\";a:1:{i:319;i:2117191;}}i:1776825246;a:1:{s:5:\"ERROR\";a:2:{i:320;i:2139588;i:321;i:2161985;}}i:1776825250;a:1:{s:5:\"ERROR\";a:2:{i:322;i:2184382;i:323;i:2206779;}}i:1776825270;a:1:{s:5:\"ERROR\";a:2:{i:324;i:2229176;i:325;i:2251573;}}i:1776825271;a:1:{s:5:\"ERROR\";a:3:{i:326;i:2273970;i:327;i:2296367;i:328;i:2318764;}}i:1776825272;a:1:{s:5:\"ERROR\";a:1:{i:329;i:2341161;}}i:1776825273;a:1:{s:5:\"ERROR\";a:1:{i:330;i:2363558;}}i:1776825274;a:1:{s:5:\"ERROR\";a:2:{i:331;i:2385955;i:332;i:2408352;}}i:1776825276;a:1:{s:5:\"ERROR\";a:1:{i:333;i:2430749;}}i:1776825277;a:1:{s:5:\"ERROR\";a:1:{i:334;i:2453146;}}i:1776825281;a:1:{s:5:\"ERROR\";a:2:{i:335;i:2475543;i:336;i:2497940;}}i:1776825288;a:1:{s:5:\"ERROR\";a:2:{i:337;i:2520337;i:338;i:2542734;}}i:1776825295;a:1:{s:5:\"ERROR\";a:2:{i:339;i:2565131;i:340;i:2587528;}}i:1776825302;a:1:{s:5:\"ERROR\";a:2:{i:341;i:2609925;i:342;i:2632322;}}i:1776825309;a:1:{s:5:\"ERROR\";a:2:{i:343;i:2654719;i:344;i:2677116;}}i:1776825316;a:1:{s:5:\"ERROR\";a:2:{i:345;i:2699513;i:346;i:2721910;}}i:1776825350;a:1:{s:5:\"ERROR\";a:2:{i:347;i:2744307;i:348;i:2766704;}}i:1776825351;a:1:{s:5:\"ERROR\";a:3:{i:349;i:2789101;i:350;i:2811498;i:351;i:2833895;}}i:1776825352;a:1:{s:5:\"ERROR\";a:1:{i:352;i:2856292;}}i:1776825353;a:1:{s:5:\"ERROR\";a:1:{i:353;i:2878689;}}i:1776825354;a:1:{s:5:\"ERROR\";a:1:{i:354;i:2901086;}}i:1776825355;a:1:{s:5:\"ERROR\";a:1:{i:355;i:2923483;}}i:1776825357;a:1:{s:5:\"ERROR\";a:2:{i:356;i:2945880;i:357;i:2968277;}}i:1776825361;a:1:{s:5:\"ERROR\";a:2:{i:358;i:2990674;i:359;i:3013071;}}i:1776825368;a:1:{s:5:\"ERROR\";a:1:{i:360;i:3035468;}}i:1776825369;a:1:{s:5:\"ERROR\";a:1:{i:361;i:3057865;}}i:1776825375;a:1:{s:5:\"ERROR\";a:1:{i:362;i:3080262;}}i:1776825376;a:1:{s:5:\"ERROR\";a:1:{i:363;i:3102659;}}i:1776825382;a:1:{s:5:\"ERROR\";a:1:{i:364;i:3125056;}}i:1776825383;a:1:{s:5:\"ERROR\";a:1:{i:365;i:3147453;}}i:1776825389;a:1:{s:5:\"ERROR\";a:1:{i:366;i:3169850;}}i:1776825390;a:1:{s:5:\"ERROR\";a:1:{i:367;i:3192247;}}i:1776825396;a:1:{s:5:\"ERROR\";a:1:{i:368;i:3214644;}}i:1776825397;a:1:{s:5:\"ERROR\";a:1:{i:369;i:3237041;}}i:1776825631;a:1:{s:5:\"ERROR\";a:1:{i:370;i:3259438;}}i:1776825632;a:1:{s:5:\"ERROR\";a:3:{i:371;i:3281835;i:372;i:3304232;i:373;i:3326629;}}i:1776825633;a:1:{s:5:\"ERROR\";a:1:{i:374;i:3349026;}}i:1776825634;a:1:{s:5:\"ERROR\";a:2:{i:375;i:3371423;i:376;i:3393820;}}i:1776825635;a:1:{s:5:\"ERROR\";a:1:{i:377;i:3416217;}}i:1776825636;a:1:{s:5:\"ERROR\";a:1:{i:378;i:3438614;}}i:1776825638;a:1:{s:5:\"ERROR\";a:2:{i:379;i:3461011;i:380;i:3483408;}}i:1776825642;a:1:{s:5:\"ERROR\";a:2:{i:381;i:3505805;i:382;i:3528202;}}i:1776825649;a:1:{s:5:\"ERROR\";a:2:{i:383;i:3550599;i:384;i:3572996;}}i:1776825656;a:1:{s:5:\"ERROR\";a:2:{i:385;i:3595393;i:386;i:3617790;}}i:1776825663;a:1:{s:5:\"ERROR\";a:2:{i:387;i:3640187;i:388;i:3662584;}}i:1776825670;a:1:{s:5:\"ERROR\";a:1:{i:389;i:3684981;}}i:1776825671;a:1:{s:5:\"ERROR\";a:1:{i:390;i:3707378;}}i:1776825677;a:1:{s:5:\"ERROR\";a:1:{i:391;i:3729775;}}i:1776825678;a:1:{s:5:\"ERROR\";a:1:{i:392;i:3752172;}}i:1776825814;a:1:{s:5:\"ERROR\";a:1:{i:393;i:3774569;}}i:1776825815;a:1:{s:5:\"ERROR\";a:1:{i:394;i:3795784;}}i:1776825817;a:1:{s:5:\"ERROR\";a:1:{i:395;i:3816999;}}i:1776825818;a:1:{s:5:\"ERROR\";a:1:{i:396;i:3838214;}}i:1776825934;a:1:{s:5:\"ERROR\";a:3:{i:397;i:3859429;i:398;i:3881826;i:399;i:3904223;}}i:1776825935;a:1:{s:5:\"ERROR\";a:2:{i:400;i:3926620;i:401;i:3949017;}}i:1776825936;a:1:{s:5:\"ERROR\";a:1:{i:402;i:3971414;}}i:1776825937;a:1:{s:5:\"ERROR\";a:1:{i:403;i:3993811;}}i:1776825938;a:1:{s:5:\"ERROR\";a:1:{i:404;i:4016208;}}i:1776825940;a:1:{s:5:\"ERROR\";a:1:{i:405;i:4038605;}}i:1776825941;a:1:{s:5:\"ERROR\";a:1:{i:406;i:4061002;}}i:1776825942;a:1:{s:5:\"ERROR\";a:1:{i:407;i:4083399;}}i:1776825945;a:1:{s:5:\"ERROR\";a:1:{i:408;i:4105796;}}i:1776825946;a:1:{s:5:\"ERROR\";a:1:{i:409;i:4128193;}}i:1776825952;a:1:{s:5:\"ERROR\";a:1:{i:410;i:4150590;}}i:1776825953;a:1:{s:5:\"ERROR\";a:1:{i:411;i:4172987;}}i:1776825959;a:1:{s:5:\"ERROR\";a:1:{i:412;i:4195384;}}i:1776825960;a:1:{s:5:\"ERROR\";a:1:{i:413;i:4217781;}}i:1776825966;a:1:{s:5:\"ERROR\";a:1:{i:414;i:4240178;}}i:1776825967;a:1:{s:5:\"ERROR\";a:1:{i:415;i:4262575;}}i:1776825973;a:1:{s:5:\"ERROR\";a:1:{i:416;i:4284972;}}i:1776825975;a:1:{s:5:\"ERROR\";a:1:{i:417;i:4307369;}}i:1776825981;a:1:{s:5:\"ERROR\";a:1:{i:418;i:4329766;}}i:1776825982;a:1:{s:5:\"ERROR\";a:1:{i:419;i:4352163;}}i:1776826837;a:1:{s:5:\"ERROR\";a:2:{i:420;i:4374560;i:421;i:4396957;}}i:1776826838;a:1:{s:5:\"ERROR\";a:2:{i:422;i:4419354;i:423;i:4441751;}}i:1776826839;a:1:{s:5:\"ERROR\";a:1:{i:424;i:4464148;}}i:1776826840;a:1:{s:5:\"ERROR\";a:2:{i:425;i:4486545;i:426;i:4508942;}}i:1776826841;a:1:{s:5:\"ERROR\";a:1:{i:427;i:4531339;}}i:1776826842;a:1:{s:5:\"ERROR\";a:1:{i:428;i:4553736;}}i:1776826844;a:1:{s:5:\"ERROR\";a:2:{i:429;i:4576133;i:430;i:4598530;}}i:1776826848;a:1:{s:5:\"ERROR\";a:2:{i:431;i:4620927;i:432;i:4643324;}}i:1776826855;a:1:{s:5:\"ERROR\";a:1:{i:433;i:4665721;}}i:1776826856;a:1:{s:5:\"ERROR\";a:1:{i:434;i:4688118;}}i:1776826863;a:1:{s:5:\"ERROR\";a:2:{i:435;i:4710515;i:436;i:4732912;}}i:1776826870;a:1:{s:5:\"ERROR\";a:2:{i:437;i:4755309;i:438;i:4777706;}}i:1776826877;a:1:{s:5:\"ERROR\";a:2:{i:439;i:4800103;i:440;i:4822500;}}i:1776826884;a:1:{s:5:\"ERROR\";a:2:{i:441;i:4844897;i:442;i:4867294;}}i:1776827355;a:1:{s:5:\"ERROR\";a:2:{i:443;i:4889691;i:444;i:4912088;}}i:1776827356;a:1:{s:5:\"ERROR\";a:3:{i:445;i:4934485;i:446;i:4956882;i:447;i:4979279;}}i:1776827357;a:1:{s:5:\"ERROR\";a:1:{i:448;i:5001676;}}i:1776827358;a:1:{s:5:\"ERROR\";a:1:{i:449;i:5024073;}}i:1776827359;a:1:{s:5:\"ERROR\";a:1:{i:450;i:5046470;}}i:1776827360;a:1:{s:5:\"ERROR\";a:1:{i:451;i:5068867;}}i:1776827362;a:1:{s:5:\"ERROR\";a:1:{i:452;i:5091264;}}i:1776827363;a:1:{s:5:\"ERROR\";a:1:{i:453;i:5113661;}}i:1776827366;a:1:{s:5:\"ERROR\";a:1:{i:454;i:5136058;}}i:1776827367;a:1:{s:5:\"ERROR\";a:1:{i:455;i:5158455;}}i:1776827373;a:1:{s:5:\"ERROR\";a:1:{i:456;i:5180852;}}i:1776827374;a:1:{s:5:\"ERROR\";a:1:{i:457;i:5203249;}}i:1776827380;a:1:{s:5:\"ERROR\";a:1:{i:458;i:5225646;}}i:1776827381;a:1:{s:5:\"ERROR\";a:1:{i:459;i:5248043;}}i:1776827387;a:1:{s:5:\"ERROR\";a:1:{i:460;i:5270440;}}i:1776827388;a:1:{s:5:\"ERROR\";a:1:{i:461;i:5292837;}}i:1776827394;a:1:{s:5:\"ERROR\";a:1:{i:462;i:5315234;}}i:1776827395;a:1:{s:5:\"ERROR\";a:1:{i:463;i:5337631;}}i:1776827401;a:1:{s:5:\"ERROR\";a:1:{i:464;i:5360028;}}i:1776827402;a:1:{s:5:\"ERROR\";a:1:{i:465;i:5382425;}}i:1776827936;a:1:{s:5:\"ERROR\";a:1:{i:466;i:5404822;}}i:1776827937;a:1:{s:5:\"ERROR\";a:3:{i:467;i:5433677;i:468;i:5462532;i:469;i:5491387;}}i:1776827938;a:1:{s:5:\"ERROR\";a:1:{i:470;i:5520242;}}i:1776827939;a:1:{s:5:\"ERROR\";a:2:{i:471;i:5549097;i:472;i:5577952;}}i:1776827940;a:1:{s:5:\"ERROR\";a:1:{i:473;i:5606807;}}i:1776827941;a:1:{s:5:\"ERROR\";a:1:{i:474;i:5635662;}}i:1776827943;a:1:{s:5:\"ERROR\";a:2:{i:475;i:5664517;i:476;i:5693372;}}i:1776827947;a:1:{s:5:\"ERROR\";a:2:{i:477;i:5722227;i:478;i:5751082;}}i:1776827954;a:1:{s:5:\"ERROR\";a:1:{i:479;i:5779937;}}i:1776827955;a:1:{s:5:\"ERROR\";a:1:{i:480;i:5808792;}}i:1776827961;a:1:{s:5:\"ERROR\";a:1:{i:481;i:5837647;}}i:1776827962;a:1:{s:5:\"ERROR\";a:1:{i:482;i:5866502;}}i:1776827968;a:1:{s:5:\"ERROR\";a:1:{i:483;i:5895357;}}i:1776827969;a:1:{s:5:\"ERROR\";a:1:{i:484;i:5924212;}}i:1776827975;a:1:{s:5:\"ERROR\";a:1:{i:485;i:5953067;}}i:1776827976;a:1:{s:5:\"ERROR\";a:1:{i:486;i:5981922;}}i:1776827984;a:1:{s:5:\"ERROR\";a:1:{i:487;i:6010777;}}i:1776827987;a:1:{s:5:\"ERROR\";a:1:{i:488;i:6032893;}}i:1776828025;a:1:{s:5:\"ERROR\";a:1:{i:489;i:6055009;}}i:1776828026;a:1:{s:5:\"ERROR\";a:2:{i:490;i:6083864;i:491;i:6112719;}}i:1776828027;a:1:{s:5:\"ERROR\";a:2:{i:492;i:6141574;i:493;i:6170429;}}i:1776828028;a:1:{s:5:\"ERROR\";a:2:{i:494;i:6199284;i:495;i:6228139;}}i:1776828030;a:1:{s:5:\"ERROR\";a:2:{i:496;i:6256994;i:497;i:6285849;}}i:1776828032;a:1:{s:5:\"ERROR\";a:1:{i:498;i:6314704;}}i:1776828033;a:1:{s:5:\"ERROR\";a:1:{i:499;i:6343559;}}i:1776828036;a:1:{s:5:\"ERROR\";a:1:{i:500;i:6372414;}}i:1776828037;a:1:{s:5:\"ERROR\";a:1:{i:501;i:6401269;}}i:1776828044;a:1:{s:5:\"ERROR\";a:2:{i:502;i:6430124;i:503;i:6458979;}}i:1776828051;a:1:{s:5:\"ERROR\";a:2:{i:504;i:6487834;i:505;i:6516689;}}i:1776828058;a:1:{s:5:\"ERROR\";a:1:{i:506;i:6545544;}}i:1776828059;a:1:{s:5:\"ERROR\";a:1:{i:507;i:6574399;}}i:1776828066;a:1:{s:5:\"ERROR\";a:2:{i:508;i:6603254;i:509;i:6632109;}}i:1776828073;a:1:{s:5:\"ERROR\";a:1:{i:510;i:6660964;}}i:1776828074;a:1:{s:5:\"ERROR\";a:1:{i:511;i:6689819;}}i:1776953489;a:1:{s:4:\"INFO\";a:2:{i:512;i:6718674;i:513;i:6718788;}}i:1776953490;a:1:{s:4:\"INFO\";a:3:{i:514;i:6718843;i:515;i:6718995;i:516;i:6719075;}}i:1778024171;a:1:{s:5:\"ERROR\";a:1:{i:517;i:6719147;}}i:1778024191;a:1:{s:5:\"ERROR\";a:1:{i:518;i:6729997;}}i:1778024206;a:1:{s:5:\"ERROR\";a:1:{i:519;i:6740847;}}i:1778024216;a:1:{s:5:\"ERROR\";a:1:{i:520;i:6751697;}}i:1778024265;a:1:{s:5:\"ERROR\";a:1:{i:521;i:6762547;}}i:1778024317;a:1:{s:5:\"ERROR\";a:1:{i:522;i:6773397;}}i:1778024343;a:1:{s:5:\"ERROR\";a:1:{i:523;i:6784247;}}i:1778024358;a:1:{s:5:\"ERROR\";a:1:{i:524;i:6795097;}}i:1778024368;a:1:{s:5:\"ERROR\";a:1:{i:525;i:6805947;}}i:1778024377;a:1:{s:5:\"ERROR\";a:1:{i:526;i:6816797;}}i:1778080671;a:1:{s:5:\"ERROR\";a:1:{i:527;i:6827647;}}i:1778081251;a:1:{s:5:\"ERROR\";a:1:{i:528;i:6829314;}}i:1778081274;a:1:{s:5:\"ERROR\";a:1:{i:529;i:6854825;}}i:1778081283;a:1:{s:5:\"ERROR\";a:1:{i:530;i:6880336;}}i:1778081292;a:1:{s:5:\"ERROR\";a:1:{i:531;i:6905847;}}i:1778081631;a:1:{s:5:\"ERROR\";a:1:{i:532;i:6931358;}}i:1778081709;a:1:{s:5:\"ERROR\";a:1:{i:533;i:6956869;}}i:1778081756;a:1:{s:5:\"ERROR\";a:1:{i:534;i:6982874;}}i:1778081779;a:1:{s:5:\"ERROR\";a:1:{i:535;i:7008879;}}i:1778081878;a:1:{s:5:\"ERROR\";a:1:{i:536;i:7034884;}}i:1778094432;a:1:{s:4:\"INFO\";a:2:{i:537;i:7060395;i:538;i:7060509;}}i:1778094434;a:1:{s:4:\"INFO\";a:3:{i:539;i:7060564;i:540;i:7060716;i:541;i:7060796;}}i:1778094456;a:1:{s:5:\"ERROR\";a:1:{i:542;i:7060868;}}i:1778150457;a:1:{s:5:\"ERROR\";a:1:{i:543;i:7071718;}}i:1778150476;a:1:{s:5:\"ERROR\";a:1:{i:544;i:7082568;}}i:1779313276;a:1:{s:4:\"INFO\";a:2:{i:545;i:7093418;i:546;i:7093532;}}i:1779313278;a:1:{s:4:\"INFO\";a:3:{i:547;i:7093587;i:548;i:7093739;i:549;i:7093819;}}i:1779313293;a:1:{s:5:\"ERROR\";a:1:{i:550;i:7093891;}}i:1779320801;a:1:{s:5:\"ERROR\";a:1:{i:551;i:7095345;}}i:1779411889;a:1:{s:4:\"INFO\";a:2:{i:552;i:7106195;i:553;i:7106309;}}i:1779411891;a:1:{s:4:\"INFO\";a:1:{i:554;i:7106364;}}i:1779411892;a:1:{s:4:\"INFO\";a:2:{i:555;i:7106516;i:556;i:7106596;}}i:1779413516;a:1:{s:4:\"INFO\";a:5:{i:557;i:7106668;i:558;i:7106782;i:559;i:7106837;i:560;i:7106989;i:561;i:7107069;}}i:1779423471;a:1:{s:4:\"INFO\";a:2:{i:562;i:7107141;i:563;i:7107255;}}i:1779423472;a:1:{s:4:\"INFO\";a:3:{i:564;i:7107310;i:565;i:7107462;i:566;i:7107542;}}i:1779547309;a:1:{s:4:\"INFO\";a:2:{i:567;i:7107614;i:568;i:7107728;}}i:1779547311;a:1:{s:4:\"INFO\";a:1:{i:569;i:7107783;}}i:1779547312;a:1:{s:4:\"INFO\";a:2:{i:570;i:7107935;i:571;i:7108015;}}i:1779574088;a:1:{s:5:\"ERROR\";a:1:{i:572;i:7108087;}}i:1779581764;a:1:{s:5:\"ERROR\";a:1:{i:573;i:7130203;}}}', 1780186586),
('laravel-cache-lv:v3.24.0:file:9d304337-laravel.log:ecf8427e:metadata', 'a:9:{s:5:\"query\";s:0:\"\";s:10:\"identifier\";s:8:\"ecf8427e\";s:26:\"last_scanned_file_position\";i:7132016;s:18:\"last_scanned_index\";i:574;s:24:\"next_log_index_to_create\";i:574;s:14:\"max_chunk_size\";i:50000;s:19:\"current_chunk_index\";i:0;s:17:\"chunk_definitions\";a:0:{}s:24:\"current_chunk_definition\";a:5:{s:5:\"index\";i:0;s:4:\"size\";i:574;s:18:\"earliest_timestamp\";i:1774859783;s:16:\"latest_timestamp\";i:1779581764;s:12:\"level_counts\";a:2:{s:5:\"ERROR\";i:353;s:4:\"INFO\";i:221;}}}', 1780186586),
('laravel-cache-lv:v3.24.0:file:9d304337-laravel.log:metadata', 'a:8:{s:4:\"type\";s:7:\"laravel\";s:4:\"name\";s:11:\"laravel.log\";s:4:\"path\";s:50:\"C:\\laragon\\www\\pasaanaliz\\storage\\logs\\laravel.log\";s:4:\"size\";i:7132016;s:18:\"earliest_timestamp\";i:1774859783;s:16:\"latest_timestamp\";i:1779581764;s:26:\"last_scanned_file_position\";i:7132016;s:15:\"related_indices\";a:1:{s:8:\"ecf8427e\";a:2:{s:5:\"query\";s:0:\"\";s:26:\"last_scanned_file_position\";i:7132016;}}}', 1780186586);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` bigint UNSIGNED NOT NULL,
  `fixture_id` bigint UNSIGNED NOT NULL,
  `league_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `league_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_team` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `away_team` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `away_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `match_date` datetime NOT NULL,
  `match_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NS',
  `home_score` int DEFAULT NULL,
  `home_form` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `away_score` int DEFAULT NULL,
  `away_form` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prediction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `analysis` text COLLATE utf8mb4_unicode_ci,
  `confidence` int DEFAULT '80',
  `odds` decimal(4,2) DEFAULT NULL,
  `is_premium` tinyint(1) NOT NULL DEFAULT '1',
  `is_vip_dealer` tinyint(1) NOT NULL DEFAULT '0',
  `prediction_status` enum('pending','won','lost','void') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `fixture_id`, `league_name`, `league_logo`, `home_team`, `home_logo`, `away_team`, `away_logo`, `match_date`, `match_status`, `home_score`, `home_form`, `away_score`, `away_form`, `prediction`, `analysis`, `confidence`, `odds`, `is_premium`, `is_vip_dealer`, `prediction_status`, `created_at`, `updated_at`) VALUES
(23, 1543734, 'Eredivisie', 'https://media.api-sports.io/football/leagues/88.png', 'Almere City FC', 'https://media.api-sports.io/football/teams/419.png', 'De Graafschap', 'https://media.api-sports.io/football/teams/199.png', '2026-05-06 19:45:00', 'NS', NULL, 'W,W,D,L,W', NULL, 'L,W,W,D,L', 'KG Var', 'test', 85, '2.80', 0, 1, 'pending', '2026-05-06 14:33:58', '2026-05-06 15:38:33'),
(26, 15437346, 'Eredivisie', 'https://media.api-sports.io/football/leagues/88.png', 'Almere City FC', 'https://media.api-sports.io/football/teams/419.png', 'De Graafschap', 'https://media.api-sports.io/football/teams/199.png', '2026-05-06 19:45:00', 'NS', NULL, 'W,W,D,L,W', NULL, 'L,W,W,D,L', 'MS 2', NULL, 85, '2.80', 1, 0, 'pending', '2026-05-06 14:33:58', '2026-05-06 15:26:04'),
(27, 1494163, 'Allsvenskan', 'https://media.api-sports.io/football/leagues/113.png', 'IF Elfsborg', 'https://media.api-sports.io/football/teams/372.png', 'IF Brommapojkarna', 'https://media.api-sports.io/football/teams/371.png', '2026-05-08 20:00:00', 'NS', NULL, 'W,W,D,L,W', NULL, 'L,W,W,D,L', 'MS 2', 'test 2', 85, '3.90', 0, 0, 'pending', '2026-05-07 10:40:50', '2026-05-07 10:44:58'),
(28, 1494652, 'Eliteserien', 'https://media.api-sports.io/football/leagues/103.png', 'Ham-Kam', 'https://media.api-sports.io/football/teams/2159.png', 'Valerenga', 'https://media.api-sports.io/football/teams/326.png', '2026-05-08 20:00:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-07 10:40:50', '2026-05-07 10:40:50'),
(29, 1530585, 'Superliga', 'https://media.api-sports.io/football/leagues/119.png', 'Viborg', 'https://media.api-sports.io/football/teams/2070.png', 'Sonderjyske', 'https://media.api-sports.io/football/teams/396.png', '2026-05-08 20:00:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-07 10:40:50', '2026-05-07 10:40:50'),
(30, 1388597, 'Bundesliga', 'https://media.api-sports.io/football/leagues/78.png', 'Borussia Dortmund', 'https://media.api-sports.io/football/teams/165.png', 'Eintracht Frankfurt', 'https://media.api-sports.io/football/teams/169.png', '2026-05-08 21:30:00', 'NS', NULL, 'W,W,D,L,W', NULL, 'L,W,W,D,L', 'KG Gol Var', NULL, 85, '2.80', 1, 0, 'pending', '2026-05-07 10:40:50', '2026-05-07 10:43:11'),
(31, 1543680, 'Premiership', 'https://media.api-sports.io/football/leagues/179.png', 'Arbroath', 'https://media.api-sports.io/football/teams/4249.png', 'Dunfermline', 'https://media.api-sports.io/football/teams/1388.png', '2026-05-08 21:30:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-07 10:40:50', '2026-05-07 10:40:50'),
(32, 1378222, 'Serie A', 'https://media.api-sports.io/football/leagues/135.png', 'Torino', 'https://media.api-sports.io/football/teams/503.png', 'Sassuolo', 'https://media.api-sports.io/football/teams/488.png', '2026-05-08 21:45:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-07 10:40:50', '2026-05-07 10:40:50'),
(33, 1387989, 'Ligue 1', 'https://media.api-sports.io/football/leagues/61.png', 'Lens', 'https://media.api-sports.io/football/teams/116.png', 'Nantes', 'https://media.api-sports.io/football/teams/83.png', '2026-05-08 21:45:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-07 10:40:50', '2026-05-07 10:40:50'),
(34, 1536954, 'Jupiler Pro League', 'https://media.api-sports.io/football/leagues/144.png', 'Standard Liege', 'https://media.api-sports.io/football/teams/733.png', 'OH Leuven', 'https://media.api-sports.io/football/teams/260.png', '2026-05-08 21:45:00', 'NS', NULL, 'W,W,D,L,W', NULL, 'L,W,W,D,L', 'Sistem 4 6', NULL, 85, '3.90', 1, 0, 'pending', '2026-05-07 10:40:50', '2026-05-07 10:42:56'),
(35, 1391163, 'La Liga', 'https://media.api-sports.io/football/leagues/140.png', 'Levante', 'https://media.api-sports.io/football/teams/539.png', 'Osasuna', 'https://media.api-sports.io/football/teams/727.png', '2026-05-08 22:00:00', 'NS', NULL, 'W,W,D,L,W', NULL, 'L,W,W,D,L', 'MS 2', 'test', 85, '5.00', 0, 0, 'pending', '2026-05-07 10:40:50', '2026-05-07 10:42:05'),
(36, 1545410, 'Superliga', 'https://media.api-sports.io/football/leagues/119.png', 'Brondby', 'https://media.api-sports.io/football/teams/407.png', 'FC Copenhagen', 'https://media.api-sports.io/football/teams/400.png', '2026-05-21 19:30:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-20 21:41:41', '2026-05-20 21:41:41'),
(37, 1545411, 'Eredivisie', 'https://media.api-sports.io/football/leagues/88.png', 'Ajax', 'https://media.api-sports.io/football/teams/194.png', 'Groningen', 'https://media.api-sports.io/football/teams/202.png', '2026-05-21 19:45:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-20 21:41:41', '2026-05-20 21:41:41'),
(38, 1494228, 'Allsvenskan', 'https://media.api-sports.io/football/leagues/113.png', 'IF Elfsborg', 'https://media.api-sports.io/football/teams/372.png', 'Mjallby AIF', 'https://media.api-sports.io/football/teams/2240.png', '2026-05-21 20:00:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-20 21:41:41', '2026-05-20 21:41:41'),
(39, 1537002, 'Jupiler Pro League', 'https://media.api-sports.io/football/leagues/144.png', 'KV Mechelen', 'https://media.api-sports.io/football/teams/266.png', 'Club Brugge KV', 'https://media.api-sports.io/football/teams/569.png', '2026-05-21 21:30:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-20 21:41:41', '2026-05-20 21:41:41'),
(40, 1537003, 'Jupiler Pro League', 'https://media.api-sports.io/football/leagues/144.png', 'Gent', 'https://media.api-sports.io/football/teams/631.png', 'Union St. Gilloise', 'https://media.api-sports.io/football/teams/1393.png', '2026-05-21 21:30:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-20 21:41:41', '2026-05-20 21:41:41'),
(41, 1537004, 'Jupiler Pro League', 'https://media.api-sports.io/football/leagues/144.png', 'Anderlecht', 'https://media.api-sports.io/football/teams/554.png', 'St. Truiden', 'https://media.api-sports.io/football/teams/735.png', '2026-05-21 21:30:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-20 21:41:41', '2026-05-20 21:41:41'),
(42, 1545417, 'Bundesliga', 'https://media.api-sports.io/football/leagues/78.png', 'VfL Wolfsburg', 'https://media.api-sports.io/football/teams/161.png', 'SC Paderborn 07', 'https://media.api-sports.io/football/teams/185.png', '2026-05-21 21:30:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-20 21:41:41', '2026-05-20 21:41:41'),
(43, 1545234, 'Premiership', 'https://media.api-sports.io/football/leagues/179.png', 'Partick', 'https://media.api-sports.io/football/teams/901.png', 'ST Mirren', 'https://media.api-sports.io/football/teams/251.png', '2026-05-21 22:00:00', 'NS', NULL, 'W,W,D,L,W', NULL, 'L,W,W,D,L', 'MS 22', 'yok yok', 85, '3.90', 0, 0, 'pending', '2026-05-20 21:41:41', '2026-05-20 21:42:22'),
(44, 1545412, 'Eredivisie', 'https://media.api-sports.io/football/leagues/88.png', 'Utrecht', 'https://media.api-sports.io/football/teams/207.png', 'Heerenveen', 'https://media.api-sports.io/football/teams/210.png', '2026-05-21 22:00:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-20 21:41:41', '2026-05-20 21:41:41'),
(45, 1494177, 'Allsvenskan', 'https://media.api-sports.io/football/leagues/113.png', 'Djurgardens IF', 'https://media.api-sports.io/football/teams/364.png', 'IF Brommapojkarna', 'https://media.api-sports.io/football/teams/371.png', '2026-05-22 20:00:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-22 01:05:20', '2026-05-22 01:05:20'),
(46, 1545664, 'Bundesliga', 'https://media.api-sports.io/football/leagues/218.png', 'Ried', 'https://media.api-sports.io/football/teams/1028.png', 'Rapid Vienna', 'https://media.api-sports.io/football/teams/781.png', '2026-05-22 20:30:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-22 01:05:20', '2026-05-22 01:05:20'),
(47, 1378236, 'Serie A', 'https://media.api-sports.io/football/leagues/135.png', 'Fiorentina', 'https://media.api-sports.io/football/teams/502.png', 'Atalanta', 'https://media.api-sports.io/football/teams/499.png', '2026-05-22 21:45:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-22 01:05:20', '2026-05-22 01:05:20'),
(48, 1494180, 'Allsvenskan', 'https://media.api-sports.io/football/leagues/113.png', 'Halmstad', 'https://media.api-sports.io/football/teams/766.png', 'Orgryte IS', 'https://media.api-sports.io/football/teams/2166.png', '2026-05-23 16:00:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-22 01:05:21', '2026-05-22 01:05:21'),
(49, 1494182, 'Allsvenskan', 'https://media.api-sports.io/football/leagues/113.png', 'Kalmar FF', 'https://media.api-sports.io/football/teams/374.png', 'Degerfors IF', 'https://media.api-sports.io/football/teams/2172.png', '2026-05-23 16:00:00', 'NS', NULL, 'W,W,D,L,W', NULL, 'L,W,W,D,L', 'MS 2', NULL, 85, '3.90', 0, 0, 'pending', '2026-05-22 01:05:21', '2026-05-22 01:07:06'),
(50, 1378234, 'Serie A', 'https://media.api-sports.io/football/leagues/135.png', 'Bologna', 'https://media.api-sports.io/football/teams/500.png', 'Inter', 'https://media.api-sports.io/football/teams/505.png', '2026-05-23 19:00:00', 'NS', NULL, 'W,W,D,L,W', NULL, 'L,W,W,D,L', 'MS 2', NULL, 85, '3.90', 1, 0, 'pending', '2026-05-22 01:05:21', '2026-05-22 01:07:00'),
(51, 1544683, 'Jupiler Pro League', 'https://media.api-sports.io/football/leagues/144.png', 'Dender', 'https://media.api-sports.io/football/teams/6215.png', 'Lommel United', 'https://media.api-sports.io/football/teams/259.png', '2026-05-23 19:15:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-22 01:05:21', '2026-05-22 01:05:21'),
(52, 1378237, 'Serie A', 'https://media.api-sports.io/football/leagues/135.png', 'Lazio', 'https://media.api-sports.io/football/teams/487.png', 'Pisa', 'https://media.api-sports.io/football/teams/801.png', '2026-05-23 21:45:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-22 01:05:21', '2026-05-22 01:05:21'),
(53, 1536963, 'Jupiler Pro League', 'https://media.api-sports.io/football/leagues/144.png', 'Standard Liege', 'https://media.api-sports.io/football/teams/733.png', 'Charleroi', 'https://media.api-sports.io/football/teams/736.png', '2026-05-23 21:45:00', 'NS', NULL, 'W,W,D,L,W', NULL, 'L,W,W,D,L', 'KG Gol Var', NULL, 85, '2.80', 0, 0, 'pending', '2026-05-22 01:05:21', '2026-05-22 01:07:12'),
(54, 1536964, 'Jupiler Pro League', 'https://media.api-sports.io/football/leagues/144.png', 'OH Leuven', 'https://media.api-sports.io/football/teams/260.png', 'Genk', 'https://media.api-sports.io/football/teams/742.png', '2026-05-23 21:45:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-22 01:05:21', '2026-05-22 01:05:21'),
(55, 1536965, 'Jupiler Pro League', 'https://media.api-sports.io/football/leagues/144.png', 'Antwerp', 'https://media.api-sports.io/football/teams/740.png', 'KVC Westerlo', 'https://media.api-sports.io/football/teams/261.png', '2026-05-23 21:45:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-22 01:05:21', '2026-05-22 01:05:21'),
(56, 1391189, 'La Liga', 'https://media.api-sports.io/football/leagues/140.png', 'Alaves', 'https://media.api-sports.io/football/teams/542.png', 'Rayo Vallecano', 'https://media.api-sports.io/football/teams/728.png', '2026-05-23 22:00:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-22 01:05:21', '2026-05-22 01:05:21'),
(57, 1391190, 'La Liga', 'https://media.api-sports.io/football/leagues/140.png', 'Real Betis', 'https://media.api-sports.io/football/teams/543.png', 'Levante', 'https://media.api-sports.io/football/teams/539.png', '2026-05-23 22:00:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-22 01:05:21', '2026-05-22 01:05:21'),
(58, 1391191, 'La Liga', 'https://media.api-sports.io/football/leagues/140.png', 'Celta Vigo', 'https://media.api-sports.io/football/teams/538.png', 'Sevilla', 'https://media.api-sports.io/football/teams/536.png', '2026-05-23 22:00:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-22 01:05:21', '2026-05-22 01:05:21'),
(59, 1391192, 'La Liga', 'https://media.api-sports.io/football/leagues/140.png', 'Espanyol', 'https://media.api-sports.io/football/teams/540.png', 'Real Sociedad', 'https://media.api-sports.io/football/teams/548.png', '2026-05-23 22:00:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-22 01:05:21', '2026-05-22 01:05:21'),
(60, 1391193, 'La Liga', 'https://media.api-sports.io/football/leagues/140.png', 'Getafe', 'https://media.api-sports.io/football/teams/546.png', 'Osasuna', 'https://media.api-sports.io/football/teams/727.png', '2026-05-23 22:00:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-22 01:05:21', '2026-05-22 01:05:21'),
(61, 1391194, 'La Liga', 'https://media.api-sports.io/football/leagues/140.png', 'Girona', 'https://media.api-sports.io/football/teams/547.png', 'Elche', 'https://media.api-sports.io/football/teams/797.png', '2026-05-23 22:00:00', 'NS', NULL, 'W,W,D,L,W', NULL, 'L,W,W,D,L', 'MS 1', NULL, 85, '3.90', 1, 0, 'pending', '2026-05-22 01:05:21', '2026-05-22 01:06:35'),
(62, 1391195, 'La Liga', 'https://media.api-sports.io/football/leagues/140.png', 'Mallorca', 'https://media.api-sports.io/football/teams/798.png', 'Oviedo', 'https://media.api-sports.io/football/teams/718.png', '2026-05-23 22:00:00', 'NS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'pending', '2026-05-22 01:05:21', '2026-05-22 01:05:21'),
(63, 1391196, 'La Liga', 'https://media.api-sports.io/football/leagues/140.png', 'Real Madrid', 'https://media.api-sports.io/football/teams/541.png', 'Athletic Club', 'https://media.api-sports.io/football/teams/531.png', '2026-05-23 22:00:00', 'NS', NULL, 'W,W,D,L,W', NULL, 'L,W,W,D,L', 'MS 228', NULL, 85, '3.90', 1, 0, 'pending', '2026-05-22 01:05:21', '2026-05-22 01:06:51'),
(64, 1391197, 'La Liga', 'https://media.api-sports.io/football/leagues/140.png', 'Valencia', 'https://media.api-sports.io/football/teams/532.png', 'Barcelona', 'https://media.api-sports.io/football/teams/529.png', '2026-05-23 22:00:00', 'NS', NULL, 'W,W,D,L,W', NULL, 'L,W,W,D,L', 'MS 2', NULL, 85, '2.80', 1, 0, 'pending', '2026-05-22 01:05:21', '2026-05-22 01:06:44'),
(65, 1492277, 'Serie A', 'https://media.api-sports.io/football/leagues/71.png', 'Sao Paulo', 'https://media.api-sports.io/football/teams/126.png', 'Botafogo', 'https://media.api-sports.io/football/teams/120.png', '2026-05-23 23:00:00', 'NS', NULL, 'W,W,D,L,W', NULL, 'L,W,W,D,L', 'KG Gol Var', NULL, 85, NULL, 0, 0, 'pending', '2026-05-22 01:05:21', '2026-05-22 01:06:14'),
(66, 1492279, 'Serie A', 'https://media.api-sports.io/football/leagues/71.png', 'Vitoria', 'https://media.api-sports.io/football/teams/136.png', 'Internacional', 'https://media.api-sports.io/football/teams/119.png', '2026-05-23 23:00:00', 'NS', NULL, 'W,W,D,L,W', NULL, 'L,W,W,D,L', NULL, NULL, 85, '5.00', 1, 0, 'pending', '2026-05-22 01:05:21', '2026-05-22 01:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `match_user_favorites`
--

CREATE TABLE `match_user_favorites` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `match_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_03_30_113629_create_matches_table', 1),
(5, '2026_03_30_113701_create_favorites_table', 1),
(6, '2026_03_30_113910_create_personal_access_tokens_table', 1),
(7, '2026_03_31_131444_add_details_to_matches_table', 2),
(8, '2026_04_03_093419_create_permission_tables', 3),
(9, '2026_04_04_160540_add_google_id_to_users_table', 4),
(10, '2026_04_22_000334_add_team_statistics_to_matches_table', 5),
(11, '2026_04_22_051850_create_match_user_favorites_table', 6),
(12, '2026_05_06_181644_add_vip_dealer_fields', 7),
(13, '2026_05_07_122122_migration_add_revenue_cat_fields', 8);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\User', 2, 'auth_token', 'ec7e6258d30e6ab66ae32e2ae89d1dda7a9b06ed2122cfd7d35277ad75a663ca', '[\"*\"]', '2026-03-30 09:36:38', NULL, '2026-03-30 09:35:41', '2026-03-30 09:36:38'),
(3, 'App\\Models\\User', 2, 'auth_token', 'c3d76ce6f8d70831aea9f9ecb8eee91b828c83de1ffe1b658f775bddb8ce1490', '[\"*\"]', '2026-03-31 06:37:57', NULL, '2026-03-31 06:36:21', '2026-03-31 06:37:57'),
(4, 'App\\Models\\User', 2, 'auth_token', '4001edf5fad72ff845fc33812125baa92f3ab4803238bc0f3dbfd1b9a0959676', '[\"*\"]', '2026-03-31 06:47:54', NULL, '2026-03-31 06:37:57', '2026-03-31 06:47:54'),
(5, 'App\\Models\\User', 2, 'auth_token', '940918fa600dea01fde9537f36bfcdce6678c0185ad0c051161b2be8e528d02e', '[\"*\"]', '2026-03-31 06:53:10', NULL, '2026-03-31 06:47:54', '2026-03-31 06:53:10'),
(6, 'App\\Models\\User', 2, 'auth_token', '4d04eec468982bcdc99481bcacb1c316d91b77d79e0dbba28548eaefd69d3343', '[\"*\"]', '2026-03-31 06:53:15', NULL, '2026-03-31 06:53:10', '2026-03-31 06:53:15'),
(7, 'App\\Models\\User', 2, 'auth_token', '57d4144d09265cce075859f3a3ff549a9f0ca77e65c6fc0296f1a4cf3642b635', '[\"*\"]', '2026-03-31 06:55:47', NULL, '2026-03-31 06:55:42', '2026-03-31 06:55:47'),
(8, 'App\\Models\\User', 2, 'auth_token', '7eb9c2dac07f4545d482ed46108a85a49e57df9338d043149a68d8123d35dd9a', '[\"*\"]', NULL, NULL, '2026-03-31 09:08:40', '2026-03-31 09:08:40'),
(9, 'App\\Models\\User', 2, 'auth_token', '824c953e5355a4ddf001a4929caff7d30dde08d14a5104d23b6569a8d20d9e2c', '[\"*\"]', NULL, NULL, '2026-03-31 09:09:00', '2026-03-31 09:09:00'),
(10, 'App\\Models\\User', 2, 'auth_token', 'd18ed7ffab06855eed7e91819ff481a2e1abfa7f0e350101d689e871a2d6a917', '[\"*\"]', NULL, NULL, '2026-03-31 09:09:44', '2026-03-31 09:09:44'),
(11, 'App\\Models\\User', 2, 'auth_token', '2fbe61f58f44895efcb47a1442cbe501849bba8ace440795d70c84d029c0a393', '[\"*\"]', NULL, NULL, '2026-03-31 09:14:57', '2026-03-31 09:14:57'),
(12, 'App\\Models\\User', 2, 'auth_token', '1adc61ff05f52e6f29bcbc511daa9440fd02914b87efd1d1c6512f7c81281b12', '[\"*\"]', NULL, NULL, '2026-03-31 09:15:04', '2026-03-31 09:15:04'),
(13, 'App\\Models\\User', 2, 'auth_token', 'bb6aa71ccaaada254dcf17d271a4978cd222f778934d7f16869c5c2d91e941ed', '[\"*\"]', NULL, NULL, '2026-03-31 09:15:07', '2026-03-31 09:15:07'),
(14, 'App\\Models\\User', 2, 'auth_token', '4b8485079d75ecd805a82225a8888a9b67575ac01bc9eaf8a2800e2a794515c1', '[\"*\"]', NULL, NULL, '2026-03-31 09:15:18', '2026-03-31 09:15:18'),
(15, 'App\\Models\\User', 2, 'auth_token', '771114ce842f974aa340d78a70e6c4103f0cbcc47b537f2c41bdc0f542f15037', '[\"*\"]', NULL, NULL, '2026-03-31 09:16:09', '2026-03-31 09:16:09'),
(16, 'App\\Models\\User', 2, 'auth_token', '1cc1445489d2bbca3251494e0832db4a35c98db81414c4c9cb179caab269af69', '[\"*\"]', '2026-03-31 09:20:51', NULL, '2026-03-31 09:20:06', '2026-03-31 09:20:51'),
(18, 'App\\Models\\User', 2, 'auth_token', 'ea40e998cb292a50b41762c5340dc5bc9eaf2fce0fda5856394e4feea8420d04', '[\"*\"]', '2026-03-31 09:56:15', NULL, '2026-03-31 09:56:15', '2026-03-31 09:56:15'),
(27, 'App\\Models\\User', 2, 'auth_token', '2f928ea10ff40776d422399e9d05aff8dbc880370ef4087936700c5875fc49ff', '[\"*\"]', '2026-03-31 12:05:06', NULL, '2026-03-31 12:03:01', '2026-03-31 12:05:06'),
(28, 'App\\Models\\User', 2, 'auth_token', '32dc15941f0fd2b206451905e0fd15c88ec1e85a159f85e26777f6e03660a7d5', '[\"*\"]', '2026-03-31 12:05:58', NULL, '2026-03-31 12:05:58', '2026-03-31 12:05:58'),
(39, 'App\\Models\\User', 2, 'auth_token', 'd8f9d67a2a80460e6ac241ba7192e478748bc959c24b9f4b66f20676c9517f40', '[\"*\"]', '2026-04-03 07:15:26', NULL, '2026-04-03 07:15:26', '2026-04-03 07:15:26'),
(67, 'App\\Models\\User', 2, 'auth_token', '41d5d39379249fb14340a13633f9baad871f49cbd9fc53dfbf64872a51ba6ca0', '[\"*\"]', NULL, NULL, '2026-04-03 13:02:59', '2026-04-03 13:02:59'),
(69, 'App\\Models\\User', 2, 'auth_token', 'b37a95daaf63c10df65543ffbb63bb5ebbcd7d29a7a43a590422b65fd0de61d9', '[\"*\"]', NULL, NULL, '2026-04-03 13:04:39', '2026-04-03 13:04:39'),
(76, 'App\\Models\\User', 1, 'auth_token', '90981035cbc3a1e1c8e2c039b359ef18434c35599a5e0bb6ac6480bc5cff33c6', '[\"*\"]', '2026-04-04 12:05:57', NULL, '2026-04-04 12:05:56', '2026-04-04 12:05:57'),
(77, 'App\\Models\\User', 3, 'auth_token', 'a5c42ad530e17e8bb0aed7eff3e3be4b2725252c9078e5e29c27abfcd6d85437', '[\"*\"]', '2026-04-04 13:42:41', NULL, '2026-04-04 13:42:40', '2026-04-04 13:42:41'),
(78, 'App\\Models\\User', 1, 'auth_token', '80e1bc6e473dfc508e844e6da4fae62d1a57689fa20f3861628eeac2607ede43', '[\"*\"]', '2026-04-08 18:41:47', NULL, '2026-04-08 18:41:46', '2026-04-08 18:41:47'),
(82, 'App\\Models\\User', 1, 'auth_token', 'de0d1d717122cea14419549214f40b6a8cae514cddbcf6329c405a5a5022f443', '[\"*\"]', '2026-04-09 11:29:56', NULL, '2026-04-09 11:29:25', '2026-04-09 11:29:56'),
(83, 'App\\Models\\User', 1, 'auth_token', 'dad6fb2c57901ea9bcb1decc6cd1e647f7109ca6acde9a066cf03d82651724ad', '[\"*\"]', '2026-04-09 11:31:15', NULL, '2026-04-09 11:30:31', '2026-04-09 11:31:15'),
(84, 'App\\Models\\User', 1, 'auth_token', '63730ec3a8135c59a2dcad045a16fc0cac3f5c80ee09257577d84b8ca9379b54', '[\"*\"]', '2026-04-09 11:38:42', NULL, '2026-04-09 11:38:25', '2026-04-09 11:38:42'),
(85, 'App\\Models\\User', 1, 'auth_token', '149900e11ceaf233f8e62b5c721ef1258a832e4b4121fa119e0c4d565a72b2cb', '[\"*\"]', '2026-04-09 11:40:36', NULL, '2026-04-09 11:39:52', '2026-04-09 11:40:36'),
(86, 'App\\Models\\User', 1, 'auth_token', '7a65427a88eb8d94d7d89844080fab20b6fde11b136f65b788001605b107b5a7', '[\"*\"]', '2026-04-09 11:45:36', NULL, '2026-04-09 11:45:35', '2026-04-09 11:45:36'),
(87, 'App\\Models\\User', 1, 'auth_token', '2bdccaffa9cf7aafda8eed4ab1fa38dbe347936523a869dc3e026b0ae4df2b96', '[\"*\"]', '2026-04-09 11:46:47', NULL, '2026-04-09 11:46:45', '2026-04-09 11:46:47'),
(88, 'App\\Models\\User', 1, 'auth_token', '3fcfe71c2a5cd483fd9866bc78c24f2f83cfd9d08c832db4a17978416c52ddd6', '[\"*\"]', '2026-04-09 11:50:53', NULL, '2026-04-09 11:50:52', '2026-04-09 11:50:53'),
(89, 'App\\Models\\User', 1, 'auth_token', '58ea9f32fda578ed105af81352d3218dd1d029f5f6c5fa9e54df63f80ea78f74', '[\"*\"]', '2026-04-09 12:25:48', NULL, '2026-04-09 11:52:03', '2026-04-09 12:25:48'),
(90, 'App\\Models\\User', 1, 'auth_token', 'd80d458e3d8f202f60cfd770219683f1cbc2b466d3c6c99f0153f8ab1aefd4ef', '[\"*\"]', '2026-04-19 21:27:37', NULL, '2026-04-19 21:27:34', '2026-04-19 21:27:37'),
(91, 'App\\Models\\User', 1, 'auth_token', '775257f9bec67a4958b2fb82bb4d7e4bd458f527e0d5808313da4cc654c58c29', '[\"*\"]', '2026-04-19 21:35:15', NULL, '2026-04-19 21:35:13', '2026-04-19 21:35:15'),
(92, 'App\\Models\\User', 1, 'auth_token', '9a5efa09481b4b7354261a6525837e0edec6ddd3e388a3f0fcda1f3fae04d50b', '[\"*\"]', '2026-04-19 21:45:54', NULL, '2026-04-19 21:45:52', '2026-04-19 21:45:54'),
(93, 'App\\Models\\User', 1, 'auth_token', '179756d87c4fff42116a16296a25d16d8ed5bd7fd75091692a24209544132a08', '[\"*\"]', '2026-04-19 21:47:08', NULL, '2026-04-19 21:47:06', '2026-04-19 21:47:08'),
(94, 'App\\Models\\User', 1, 'auth_token', '9e7758f12c6b95e0334d38924d378c0952bf1d34278ab8387a7d6e0d02a6da72', '[\"*\"]', '2026-04-19 21:57:58', NULL, '2026-04-19 21:57:56', '2026-04-19 21:57:58'),
(95, 'App\\Models\\User', 1, 'auth_token', '173f8db9a9d3080f35432b783d21c8b845bba34e11fe13245a5a5c57e6cd4f29', '[\"*\"]', '2026-04-21 19:14:40', NULL, '2026-04-21 19:14:38', '2026-04-21 19:14:40'),
(96, 'App\\Models\\User', 1, 'auth_token', '716d4da37c060cef69d351046e1417751a5ab71f5c815e221dcd8c2376c6cf60', '[\"*\"]', '2026-04-21 21:11:34', NULL, '2026-04-21 21:11:32', '2026-04-21 21:11:34'),
(97, 'App\\Models\\User', 1, 'auth_token', 'fbcc5ec54c1cb421fc9b4434b575c773556b02e4600974cbd640ecca05d5b31a', '[\"*\"]', '2026-04-22 01:22:40', NULL, '2026-04-22 01:22:38', '2026-04-22 01:22:40'),
(98, 'App\\Models\\User', 1, 'auth_token', '0a734c5c682f90bac9acb7fac0c7b3b5a3f42331eb23d46a745c991f58cbc3d5', '[\"*\"]', '2026-04-22 01:24:17', NULL, '2026-04-22 01:24:16', '2026-04-22 01:24:17'),
(99, 'App\\Models\\User', 1, 'auth_token', '69d7514310409530ac2b353e0a68b6d2289afccd65dada194251ac9390081a19', '[\"*\"]', '2026-04-22 01:25:53', NULL, '2026-04-22 01:25:52', '2026-04-22 01:25:53'),
(100, 'App\\Models\\User', 1, 'auth_token', 'a3173be0480ce3605110d5348325efe060db8aa91d070070ab8ccb933b095bf0', '[\"*\"]', '2026-04-22 01:26:29', NULL, '2026-04-22 01:26:28', '2026-04-22 01:26:29'),
(101, 'App\\Models\\User', 1, 'auth_token', '0e3bdc705409629b5723a2d0486f7e5e7b280b1897f5575a612c6606b26854b7', '[\"*\"]', '2026-04-22 01:35:58', NULL, '2026-04-22 01:35:56', '2026-04-22 01:35:58'),
(102, 'App\\Models\\User', 1, 'auth_token', '891f11680a30f5a070a0391455578c555d95597d287f67bd5a057371e3d0043e', '[\"*\"]', '2026-04-22 01:38:13', NULL, '2026-04-22 01:38:11', '2026-04-22 01:38:13'),
(103, 'App\\Models\\User', 1, 'auth_token', '14d01cc218d8049a9ae03620205a5f3e1ac6715a3da2f8f76210d844bd3754ed', '[\"*\"]', '2026-04-22 01:42:36', NULL, '2026-04-22 01:42:34', '2026-04-22 01:42:36'),
(104, 'App\\Models\\User', 1, 'auth_token', 'd5632c5c0ed6802caae17417fef2f7f73bf5a7b8a3cca715b9d34ed04c610a20', '[\"*\"]', '2026-04-22 01:57:40', NULL, '2026-04-22 01:57:38', '2026-04-22 01:57:40'),
(105, 'App\\Models\\User', 1, 'auth_token', '656e913b80c57335ef84d92f5f9723b308eacd59187f20bad5f8db2787ee574b', '[\"*\"]', '2026-04-22 01:59:31', NULL, '2026-04-22 01:59:29', '2026-04-22 01:59:31'),
(108, 'App\\Models\\User', 1, 'auth_token', 'aca0093d38022db51afac7a9657346fee16d2b2ae8e653266812fefbe93c1dac', '[\"*\"]', '2026-04-22 02:34:10', NULL, '2026-04-22 02:33:58', '2026-04-22 02:34:10'),
(109, 'App\\Models\\User', 1, 'auth_token', 'a6ef4b8707ea568ad233f18e9a563435b7bc9edb5c1b10219a76966e7a2b0f65', '[\"*\"]', '2026-04-22 02:35:16', NULL, '2026-04-22 02:34:29', '2026-04-22 02:35:16'),
(110, 'App\\Models\\User', 1, 'auth_token', '62ce399f8d9c01d6fba11ee394a5c3b30f19ce9f7a6006199a2ab2d03f85a033', '[\"*\"]', '2026-04-22 02:36:37', NULL, '2026-04-22 02:35:49', '2026-04-22 02:36:37'),
(111, 'App\\Models\\User', 1, 'auth_token', '93748af28ec7b8f62154747558eb70c9760c483148f4446417ef80cc1ecf9cf7', '[\"*\"]', '2026-04-22 02:43:38', NULL, '2026-04-22 02:40:30', '2026-04-22 02:43:38'),
(112, 'App\\Models\\User', 1, 'auth_token', '462a271a2388fe000a8860d4f7d2fa5aa60c5690b26c29ce6425258029b60719', '[\"*\"]', '2026-04-22 02:46:22', NULL, '2026-04-22 02:45:33', '2026-04-22 02:46:22'),
(113, 'App\\Models\\User', 1, 'auth_token', '1bfc6eb0fabc0d7c3453a540f035a586e0d296bcb492112535d5d392dc8ec53c', '[\"*\"]', '2026-04-22 03:01:24', NULL, '2026-04-22 03:00:36', '2026-04-22 03:01:24'),
(114, 'App\\Models\\User', 1, 'auth_token', '5b055d61abbebb49bb2cffdafaf661cd3dfce97e15d1233256eaa26b0035a8b6', '[\"*\"]', '2026-04-22 03:10:02', NULL, '2026-04-22 03:09:14', '2026-04-22 03:10:02'),
(115, 'App\\Models\\User', 1, 'auth_token', '0493673430dc9a98070d7bfb14725950066520b0f4c1a0e83da3f0065d298cd1', '[\"*\"]', '2026-04-22 03:19:36', NULL, '2026-04-22 03:18:55', '2026-04-22 03:19:36'),
(116, 'App\\Models\\User', 1, 'auth_token', 'bedfd8a031848493934c236d580752d04b68a7912b570a51e3676109706d2f45', '[\"*\"]', '2026-04-22 03:21:14', NULL, '2026-04-22 03:20:24', '2026-04-22 03:21:14'),
(117, 'App\\Models\\User', 1, 'auth_token', '7a30d5407a1f775b35f52fa97fda62608dca37587e0fab34d3c82601bac207ea', '[\"*\"]', '2026-04-22 03:29:40', NULL, '2026-04-22 03:26:45', '2026-04-22 03:29:40'),
(118, 'App\\Models\\User', 1, 'auth_token', 'a9c5330bca6ae522852e0eec4ecc217112655d03f8d0a12c01e158132ae42aed', '[\"*\"]', '2026-04-23 13:50:33', NULL, '2026-04-22 03:31:27', '2026-04-23 13:50:33'),
(119, 'App\\Models\\User', 1, 'auth_token', '128c4ee0d01cff1f854706f191e01951d923bd8944bef9eed1925c8efc177f37', '[\"*\"]', '2026-04-23 13:48:16', NULL, '2026-04-23 13:47:42', '2026-04-23 13:48:16'),
(120, 'App\\Models\\User', 1, 'auth_token', '865d3f23513729eb9b6beb6e930f0172ee60aa27a45d569cb83e625e60b428b2', '[\"*\"]', '2026-04-23 14:07:46', NULL, '2026-04-23 14:07:45', '2026-04-23 14:07:46'),
(126, 'App\\Models\\User', 1, 'auth_token', 'f4677d9ea9deb00ffbcc4afd0302bb36f84f842e7aad0804ae7a36a88868597f', '[\"*\"]', '2026-05-22 03:15:39', NULL, '2026-05-22 02:15:10', '2026-05-22 03:15:39'),
(127, 'App\\Models\\User', 1, 'auth_token', '243a4f94ba1dbc8d2bb4bf76a058ae3a498d90d6fae55db32e486bf939fafc03', '[\"*\"]', '2026-05-22 03:44:35', NULL, '2026-05-22 03:22:53', '2026-05-22 03:44:35'),
(129, 'App\\Models\\User', 1, 'auth_token', '3139547fd62f414cf2d9685f39da91a7918bea6e09953c8db281c7fe3e0b0dee', '[\"*\"]', '2026-05-22 04:21:43', NULL, '2026-05-22 04:19:05', '2026-05-22 04:21:43'),
(130, 'App\\Models\\User', 1, 'auth_token', '99a160a199495254ce04912db5c80a7964399d85351ff7ad347fea31829f8d0c', '[\"*\"]', NULL, NULL, '2026-05-22 04:33:39', '2026-05-22 04:33:39'),
(131, 'App\\Models\\User', 1, 'auth_token', '68f89bc91358174e761ec92d91f2196f99b48ae3fd1772140070f26a167c2179', '[\"*\"]', '2026-05-22 15:07:55', NULL, '2026-05-22 14:51:33', '2026-05-22 15:07:55'),
(132, 'App\\Models\\User', 1, 'auth_token', 'd8801826079b41e4de8a6be94e1e1650b13e313045fae6ce6d010e5e908c1f90', '[\"*\"]', '2026-05-23 12:30:19', NULL, '2026-05-22 16:13:25', '2026-05-23 12:30:19'),
(133, 'App\\Models\\User', 4, 'auth_token', 'b402a0875a193e130c815bde37bd8815168e4c33a41af67c9e44dc38925cce45', '[\"*\"]', NULL, NULL, '2026-05-23 14:41:52', '2026-05-23 14:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'web', '2026-04-03 06:49:55', '2026-04-03 06:49:55'),
(4, 'user', 'web', '2026-04-03 06:49:55', '2026-04-03 06:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('adUkXHxdYPtY5j8UcrlkVqezYCG19QhOeyqIfVK6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJzOWQwWkZTaVpwVkZCT014M3hiWjJXTUpUSG5SWWxEdFZLUXFMUFByIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9sb2ctdmlld2VyP2ZpbGU9OWQzMDQzMzctbGFyYXZlbC5sb2ciLCJyb3V0ZSI6ImxvZy12aWV3ZXIuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1779581948),
('iHFF5JqZPqgkEhxGkMpnYA7JuKxUSVoQfKU2qemD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiIwMlpWQ1VVV1lIVUg4U3VQa3Q5eEkwMnE5V2UwQlFzU0xiZlZBQlVUIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1779320813),
('opkCskyMvDoJZ3MnJ1jWo3CsWf6DOPJtOyHiVbdu', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJ6R1NUZWpZcmtMSXJWSUFsdzRaRDFaaFkwMnB1VWhHa0VDQWplMHdpIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9hZG1pblwvbWF0Y2hlcyIsInJvdXRlIjoiYWRtaW4ubWF0Y2hlcy5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoyfQ==', 1778150698),
('Psq6GN7eatOkDDc25PplLr1HvGBzfptRF0j8fyzJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJvbTFwVTRmZ3k4b0NTZm9GSjlkWEw1dnVYTWl6TGJZVEpiNVVDVFVMIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9hZG1pblwvbWF0Y2hlcyIsInJvdXRlIjoiYWRtaW4ubWF0Y2hlcy5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1778150475),
('TAPX8EJlKWz8kD7QnKusHl9k3JnNNdf5n7W9lhfw', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJZY2dVb2oxWVR5OTgwUk9DTkZDZHpObkhEazVuZ2JiOUNPYjR2eFpPIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9hZG1pblwvbWF0Y2hlcyIsInJvdXRlIjoiYWRtaW4ubWF0Y2hlcy5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoyfQ==', 1779313342),
('wu8Cdwr82o1aAwdhg5vhOtxI5MSIAjmlwFdQohCL', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJEVjJqSkJmelo0UVdRQ20yMzB4MjEzbU8xcWIxVmd4Tm80NG9GTExOIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9hZG1pblwvZGFzaGJvYXJkIiwicm91dGUiOiJhZG1pbi5kYXNoYm9hcmQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6Mn0=', 1779461199),
('ykk8ZxztYQO3ZOyEHyqfDJ3HEowPiwSR4V1a1li4', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJrZEpXRXQzekpHSDdBSnB4NlNvUGR0aUpvbUt6N040OFU2dWdwNDYxIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9hZG1pblwvbWF0Y2hlcyIsInJvdXRlIjoiYWRtaW4ubWF0Y2hlcy5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoyfQ==', 1779538795),
('YuzLw4AlIEFT4hpQtwOyaMoaQsCwZwCLk20eYHSt', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJrb1hVT0g0bTF6NW52d1A5T29uRnpyTzNFWHFNZXB0c2lXRVNETlJaIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9hZG1pblwvdmlwLWRlYWxlci11c2VycyIsInJvdXRlIjoiYWRtaW4udmlwLWRlYWxlci11c2Vycy5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoyfQ==', 1778094942),
('YWI5QustAqhNfNMHmIniSYlFJxK1ln4pYH8e2vnC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJvTVc0UnM5UFlxeHRoaEllMmNoN2RNcWRpa3hoaFV4bFE1UUVCU2pEIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9hZG1pblwvbG9naW4iLCJyb3V0ZSI6ImFkbWluLmxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1779320813),
('zVREsvGruJ7xwMz8wOUFioXsAOyZPEeALKQxQxhc', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiI5MUdpQmJ5SXB3ckNRbkVBM0hWekdPbklDazd5R1hoZDVGeEM4VlI0IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9hZG1pblwvbWF0Y2hlcyIsInJvdXRlIjoiYWRtaW4ubWF0Y2hlcy5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoyfQ==', 1779412032);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revenue_cat_customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_premium` tinyint NOT NULL,
  `is_vip_dealer_approved` tinyint(1) NOT NULL DEFAULT '0',
  `vip_dealer_approved_at` timestamp NULL DEFAULT NULL,
  `premium_until` timestamp NULL DEFAULT NULL,
  `subscription_platform` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_started_at` timestamp NULL DEFAULT NULL,
  `subscription_expires_at` timestamp NULL DEFAULT NULL,
  `subscription_auto_renew` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `google_id`, `revenue_cat_customer_id`, `avatar`, `email_verified_at`, `password`, `remember_token`, `is_premium`, `is_vip_dealer_approved`, `vip_dealer_approved_at`, `premium_until`, `subscription_platform`, `subscription_product_id`, `subscription_started_at`, `subscription_expires_at`, `subscription_auto_renew`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@test.com', NULL, NULL, NULL, NULL, '$2y$12$LSCz/sFUTuESB8NlntvBsOpS4HOwoeGhHox.jv9A14ZoKjf3CqmQe', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-03-30 09:06:32', '2026-03-30 09:06:32'),
(2, 'Mert', 'mert.dogan3535@gmail.com', NULL, NULL, NULL, NULL, '$2y$12$A4QKHb//50aEjvRnWdxlRennQEVKpd3uCcpeB2JrmoLBkWhj9pZQW', NULL, 0, 0, NULL, '2026-08-14 16:03:20', NULL, NULL, NULL, NULL, 1, '2026-03-30 09:35:41', '2026-03-30 09:35:41'),
(3, 'testest test', 'test@test.com', NULL, NULL, NULL, NULL, '$2y$12$.CXG0tbQnpA52O4aG0OruOGFUJjWVqcMUDI10ksnWnXe83G1h7g/C', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-04-04 13:42:40', '2026-04-04 13:42:40'),
(4, 'Mert Doğan', 'mertoo3539@gmail.com', '117874403032605452409', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocJUHcm8fgHrDHWhmMerenUg13-FjAe6heujdKOqCxfCNo2BS0RT=s96-c', NULL, NULL, NULL, 0, 0, NULL, '2026-05-15 14:16:35', NULL, NULL, NULL, NULL, 1, '2026-04-09 10:00:28', '2026-05-06 19:15:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matches_fixture_id_unique` (`fixture_id`);

--
-- Indexes for table `match_user_favorites`
--
ALTER TABLE `match_user_favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_match_unique` (`user_id`,`match_id`),
  ADD KEY `idx_user` (`user_id`),
  ADD KEY `idx_match` (`match_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_google_id_unique` (`google_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `match_user_favorites`
--
ALTER TABLE `match_user_favorites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `match_user_favorites`
--
ALTER TABLE `match_user_favorites`
  ADD CONSTRAINT `fk_match` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

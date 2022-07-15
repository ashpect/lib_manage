-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Feb 15, 2020 at 11:43 AM
-- Server version: 5.7.29
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_app`
--

-- --------------------------------------------------------

--
-- Tables and their structure for db;
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  primary key(`username`),
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `admins` (
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  primary key(`username`),
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

Create TABLE `books` {
  `bookid` bigint unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50),
  `publisher` varchar(50),
  `numberofbooks` int,
  primary key(`bookid`),
}

create table checkouts{
  `id` serial unique not null,
  `user_id` varchar(50) not null,
  `book_id` bigint unsigned not null,
  `checkout_time` timestamp,
  `checkout_adminid` varchar(50),
  `checkin_time` timestamp,
  `checkin_adminid` varchar(50),
  primary key (`id`),
  foreign key (`user_id`)
  references users(`username`) on delete cascade,
    foreign key (`book_id`)
  references books(`bookid`) on delete cascade
}
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE DATABASE employee;
USE employee;

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `emp_registration` (
  `username` varchar(100) NOT NULL,
  `idno` int(100) NOT NULL,
  `hired` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cellphone` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `passport` varchar(100) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `leave` (
  `username` varchar(100) NOT NULL,
  `ids` int(100) NOT NULL,
  `hired` varchar(100) NOT NULL,
  `start` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
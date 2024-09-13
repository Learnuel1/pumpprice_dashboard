CREATE Database marketwatch_db;
use  marketwatch_db;

CREATE TABLE `business` (
  `Regid` int(11) NOT NULL,
  `BusinessName` varchar(80) NOT NULL,
  `CAC` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `State` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Contact` varchar(15) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Website` varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `message` (
  `MesID` int(11) NOT NULL,
  `Fullname` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `price` (
  `Priceid` int(11) NOT NULL,
  `Proid` int(11) NOT NULL,
  `Cost` decimal(7,2) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `products` (
  `Proid` int(11) NOT NULL,
  `Regid` int(11) DEFAULT NULL,
  `Name` varchar(50) NOT NULL,
  `Symbol` varchar(50) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `DateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
  `Userid` int(11) NOT NULL,
  `Regid` int(11) DEFAULT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`Regid`,`CAC`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`MesID`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`Priceid`),
  ADD KEY `PK_PriceProduct` (`Proid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Proid`),
  ADD KEY `PK_BusinessProduct` (`Regid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Userid`),
  ADD KEY `FK_UsersBusiness` (`Regid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `Regid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `MesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `Priceid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Proid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `PK_PriceProduct` FOREIGN KEY (`Proid`) REFERENCES `products` (`Proid`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `PK_BusinessProduct` FOREIGN KEY (`Regid`) REFERENCES `business` (`Regid`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_UsersBusiness` FOREIGN KEY (`Regid`) REFERENCES `business` (`Regid`) ON DELETE CASCADE;

 
 PROCEDURES 
 
 
 DELIMITER //
CREATE PROCEDURE sp_update_price(IN name varchar(30),IN price decimal(7,2),IN status varchar(20), IN userid INT(11))
BEGIN
 INSERT INTO price(Proid,Cost)
 VALUES((SELECT Proid FROM products WHERE Name=name LIMIT 1),price);
  
END //
DELIMITER ;



CREATE VIEW view_product_price
AS
SELECT p.Regid,Priceid, P.Proid,Name,Symbol,Cost,Status,CONVERT(P.DateAdded,Date)AS Created ,CONVERT(price.Date,Date)AS Date,CONVERT(price.Date,Time)AS Time
FROM products P
INNER JOIN price ON P.Proid=price.Proid

DELIMITER //
CREATE PROCEDURE sp_get_user_products(IN userid int(11))
BEGIN
SELECT DISTINCT Name FROM view_product_price
WHERE Regid=userid;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_current_price(IN userid int(11))
BEGIN
SELECT Regid,Proid,Name,Symbol,Cost,Status,Created,Date,Time
FROM view_current_price 
WHERE Regid=userid;
END //
DELIMITER ;


CREATE VIEW view_current_price
AS
SELECT b.Regid AS Userid,b.BusinessName,CAC,b.Address,b.Contact,State,City,b.Website, p.Proid,p.Regid,Name,Symbol,Status,Cost, CONVERT(p.DateAdded,Date)AS Created ,CONVERT(c.Date,Date)AS Date,CONVERT(c.Date,Time)AS Time
FROM products p INNER JOIN currentprice c ON p.Proid=c.Proid INNER JOIN business b ON p.Regid=b.Regid


DELIMITER //
CREATE PROCEDURE sp_add_product(IN userid int(11), IN name varchar(50), IN symbol varchar(10),IN pstatus varchar(20),IN price DECIMAL(7,2))
BEGIN
    INSERT INTO products(Regid,Name,Symbol,Status) VALUES(userid,name,symbol,pstatus);
   INSERT INTO price(Proid,Cost) 
   VALUES((SELECT Proid FROM products WHERE Regid=userid AND Name=name ORDER BY Proid DESC LIMIT 1),price);
   INSERT INTO currentprice(Proid,Cost,Date)
   VALUES((SELECT Proid FROM products WHERE Regid=userid AND Name=name ORDER BY Proid DESC LIMIT 1),price,
          (SELECT Date FROM price WHERE Proid=(SELECT Proid FROM products WHERE Regid=userid AND Name=name ORDER BY Proid DESC LIMIT 1)
 ORDER BY priceid DESC LIMIT 1));
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE sp_register_business(IN name varchar(60), IN CAC varchar(30), IN contact varchar(15), IN email varchar(255),IN state varchar(30), IN city varchar(30),
                                      IN address varchar(60), IN password VARCHAR(255),IN website varchar(80))
    BEGIN
   INSERT INTO business (BusinessName,CAC,Email,State,City,Contact,Address,Website) 
   VALUES(name,cac,email,state,city, contact,address,website);
   INSERT INTO users(Regid,Password,Email) VALUES((SELECT max(Regid) FROM business),password,email);
   END //
   DELIMITER ;
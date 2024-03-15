
insert into `admin`(`name`,`password`,`role`)  values('AdminQL','c4ca4238a0b923820dcc509a6f75849b',1)
,('AdminQLKH','c4ca4238a0b923820dcc509a6f75849b',2)
,('AdminQLTT','c4ca4238a0b923820dcc509a6f75849b',3);
insert into `customer`(`full_name`,`phone_number`,`user_name`,`gender`,`password`) values 
('Nguyen Duy Hiep','123123123','hiepnd','1','c4ca4238a0b923820dcc509a6f75849b'),
('Nguyen Thi Nhan','123123123','nhannt','0','c4ca4238a0b923820dcc509a6f75849b'),
('Nguyen Duc Duy','123123123','duynd','1','c4ca4238a0b923820dcc509a6f75849b'),
('Hoang Thanh Tu','123123123','tuth','1','c4ca4238a0b923820dcc509a6f75849b'),
('Nguyen Thi Lan Anh','123123123','anhlnt','0','c4ca4238a0b923820dcc509a6f75849b');
	

insert into `product`(`name`,`description`,`img`,`price`,`quantity`) values
('Đồng hồ','Đồng hồ này đẹp cực 1','public/img/news/4.jpg',2000,'2');
insert into `product`(`name`,`description`,`img`,`price`,`quantity`) values
('Đồng hồ 1','Đồng hồ này đẹp cực 2','public/img/news/4.jpg',2000,'2');insert into `product`(`name`,`description`,`img`,`price`,`quantity`) values
('Đồng hồ','Đồng hồ này đẹp cực 1','public/img/news/4.jpg',2000,'2');insert into `product`(`name`,`description`,`img`,`price`,`quantity`) values
('Đồng hồ','Đồng hồ này đẹp cực 1','public/img/news/4.jpg',2000,'2');insert into `product`(`name`,`description`,`img`,`price`,`quantity`) values
('Đồng hồ','Đồng hồ này đẹp cực 1','public/img/news/4.jpg',2000,'2');insert into `product`(`name`,`description`,`img`,`price`,`quantity`) values
('Đồng hồ','Đồng hồ này đẹp cực 1','public/img/news/4.jpg',2000,'2');insert into `product`(`name`,`description`,`img`,`price`,`quantity`) values
('Đồng hồ','Đồng hồ này đẹp cực 1','public/img/news/4.jpg',2000,'2');insert into `product`(`name`,`description`,`img`,`price`,`quantity`) values
('Đồng hồ','Đồng hồ này đẹp cực 1','public/img/news/4.jpg',2000,'2');


insert into `cart` (customer_id,product_id,quantity) values(1,1,2),
										(1,5,3);

-- admin
use team_2_shop;
CREATE OR REPLACE VIEW view_admin AS
    SELECT 
        admin_id, name, `role`
    FROM
        admin
    WHERE
        is_deleted = FALSE;
SELECT 
    *
FROM
    view_admin;
-- customer 
CREATE OR REPLACE VIEW view_customer AS
    SELECT 
        customer_id,
        full_name,
        user_name,
        phone_number,
        mail,
        address,
        gender
    FROM
        customer
    WHERE
        is_deleted = FALSE;
        -- product
CREATE VIEW view_product AS
    SELECT 
        p.*
    FROM
        product p
    WHERE
        is_deleted = FALSE;





-- view cart
CREATE VIEW `view_shopping_cart` AS
SELECT
    c.`cart_id`,
    p.`product_id`,
    ctm.`customer_id`,
    p.`name` AS `product_name`,
    p.`description` AS `product_description`,
    p.`img` AS `product_image`,
    p.`price` AS `product_price`,
    c.`quantity` AS `cart_quantity`
FROM
    `cart` c
JOIN
    `product` p ON c.`product_id` = p.`product_id`
join 
`customer` ctm on c.`customer_id`=ctm.`customer_id`
    where p.is_deleted=false and c.is_deleted=false;


CREATE VIEW view_order AS
    SELECT 
        p.*
    FROM
        `order` p
    WHERE
        is_deleted = FALSE;
-- view_order_detail


CREATE VIEW view_order_detail AS
SELECT
    od.order_id,
    od.product_id,
    od.price,
    od.quantity,
    od.`value`,
    o.customer_id,
    o.admin_id,
    o.value_order,
    o.order_status,
    o.order_status_price,
    o.delivery_time,
    o.address,
    o.phone_number,
    o.full_name,
    o.create_at,
    prd.`name`
    
FROM
    order_detail od
JOIN
    `order` o ON od.order_id = o.order_id 
join `product` prd on prd.`product_id`=od.product_id
    where od.is_deleted=false;
select *from view_order;

   SELECT * FROM `view_order` ;
   select *from order_detail join `order` on order_detail.order_id=`order`.order_id;

   

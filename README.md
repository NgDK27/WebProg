# WebProg
 
# Demo video
https://youtu.be/zfksgqawU4E

# Contribution
Bùi Khắc Tiến - s3925982: 33%

Đào Anh Vũ - s3926187: 33%

Nguyễn Đình Khải - s3925921: 33%

Phạm Quang Huy - s3940676: 1%

# Accounts
- Customer

Username: Customer01

Password: Test!1234

- Shipper

Username: Shipper01

Password: Shipper!23

- Vendor

Username: Vendor01

Password: Test!1234

# Instructions
- Open folder /www/ in your IDE
- Open terminal
- Type "php -S localhost:8000"
- Access http://localhost:8000/ on your browser

# Databases
- accounts.db: 
[0]: Username,
[1]: Password (hashed),
[2]: User type (1 = Customer, 2 = Vendor, 3 = Shipper),
[3]: Name (Shipper = Distribution Hub),
[4]: Address

- order.db: 
[0]: Order ID,
[1]: Username,
[2]: Distribution Hub,
[3]: Order status,
[4]: Product ID:Quantity

- product.db: 
[0]: Product ID,
[1]: Vendor,
[2]: Product Name,
[3]: Product Price,
[4]: Product Description

- distributionhub.db: 
[0]: Hub ID,
[1]: Hub Name,
[2]: Hub Address

- profile-images.db: 
[0]: Username,
[1]: Profile image file name

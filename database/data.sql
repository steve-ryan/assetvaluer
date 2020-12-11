CREATE TABLE admin
(
  admin_id INT NOT NULL AUTO_INCREMENT,
  admin_name VARCHAR(70) NOT NULL,
  admin_password VARCHAR(70) NOT NULL,
  admin_email VARCHAR(70) NOT NULL,
  PRIMARY KEY (admin_id)
);

CREATE TABLE assessor
(
  
  assessor_id INT NOT NULL AUTO_INCREMENT,
  password VARCHAR(70) NOT NULL ,
  email VARCHAR(70) NOT NULL,
  name VARCHAR(70) NOT NULL,
  status INT NOT NULL,
  PRIMARY KEY (assessor_id)
);

CREATE TABLE client
(
  client_id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(70) NOT NULL,
  email VARCHAR(70) NOT NULL,
  phone_no VARCHAR(70) NOT NULL,
  PRIMARY KEY (client_id)
);

CREATE TABLE brand
(
  brand_id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(70) NOT NULL,
  pers FLOAT NOT NULL,
  PRIMARY KEY (brand_id)
);

CREATE TABLE type
(
  type_id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(70) NOT NULL,
  per FLOAT NOT NULL,
  PRIMARY KEY (type_id)
);

CREATE TABLE report
(
  report_id INT NOT NULL AUTO_INCREMENT,
  date DATE NOT NULL,
  PRIMARY KEY (report_id)
);

CREATE TABLE vehicle
(
  vehicle_id INT NOT NULL AUTO_INCREMENT,
  model VARCHAR(70) NOT NULL,
  chassis_no VARCHAR(70) NOT NULL,
  yom DATE NOT NULL,
  reg_no VARCHAR(70) NOT NULL,
  picture INT NOT NULL,
  client_id INT NOT NULL,
  brand_id INT NOT NULL,
  type_id INT NOT NULL,
  assessor_id INT NOT NULL,
  report_id INT NOT NULL,
  PRIMARY KEY (vehicle_id),
  FOREIGN KEY (client_id) REFERENCES client(client_id),
  FOREIGN KEY (brand_id) REFERENCES brand(brand_id),
  FOREIGN KEY (type_id) REFERENCES type(type_id),
  FOREIGN KEY (assessor_id) REFERENCES assessor(assessor_id),
  FOREIGN KEY (report_id) REFERENCES report(report_id)
);
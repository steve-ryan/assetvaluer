CREATE TABLE admin
(
  admin_name INT NOT NULL,
  admin_password INT NOT NULL
);

CREATE TABLE assessor
(
  password INT NOT NULL,
  email INT NOT NULL,
  assessor_id INT NOT NULL,
  name INT NOT NULL,
  status INT NOT NULL,
  PRIMARY KEY (assessor_id)
);

CREATE TABLE client
(
  name INT NOT NULL,
  email INT NOT NULL,
  client_id INT NOT NULL,
  phone_no INT NOT NULL,
  PRIMARY KEY (client_id)
);

CREATE TABLE brand
(
  name INT NOT NULL,
  brand_id INT NOT NULL,
  pers INT NOT NULL,
  PRIMARY KEY (brand_id)
);

CREATE TABLE type
(
  name INT NOT NULL,
  per INT NOT NULL,
  type_id INT NOT NULL,
  PRIMARY KEY (type_id)
);

CREATE TABLE kondition
(
  name INT NOT NULL,
  pers INT NOT NULL,
  condition_id INT NOT NULL,
  PRIMARY KEY (condition_id)
);

CREATE TABLE accident_status
(
  name INT NOT NULL,
  pers INT NOT NULL,
  acc_id INT NOT NULL,
  PRIMARY KEY (acc_id)
);

CREATE TABLE company
(
  company_id INT NOT NULL,
  company_name INT NOT NULL,
  password INT NOT NULL,
  email INT NOT NULL,
  PRIMARY KEY (company_id)
);

CREATE TABLE vehicle
(
  vehicle_id INT NOT NULL,
  model INT NOT NULL,
  chassis_no INT NOT NULL,
  yom INT NOT NULL,
  reg_no INT NOT NULL,
  picture INT NOT NULL,
  client_id INT NOT NULL,
  brand_id INT NOT NULL,
  type_id INT NOT NULL,
  assessor_id INT NOT NULL,
  condition_id INT NOT NULL,
  acc_id INT NOT NULL,
  PRIMARY KEY (vehicle_id),
  FOREIGN KEY (client_id) REFERENCES client(client_id),
  FOREIGN KEY (brand_id) REFERENCES brand(brand_id),
  FOREIGN KEY (type_id) REFERENCES type(type_id),
  FOREIGN KEY (assessor_id) REFERENCES assessor(assessor_id),
  FOREIGN KEY (condition_id) REFERENCES kondition(condition_id),
  FOREIGN KEY (acc_id) REFERENCES accident_status(acc_id)
);

CREATE TABLE report
(
  report_id INT NOT NULL,
  final_cost INT NOT NULL,
  date INT NOT NULL,
  vehicle_id INT NOT NULL,
  PRIMARY KEY (report_id),
  FOREIGN KEY (vehicle_id) REFERENCES vehicle(vehicle_id)
);

CREATE TABLE refer
(
  refer_id INT NOT NULL,
  vehicle_id INT NOT NULL,
  company_id INT NOT NULL,
  PRIMARY KEY (refer_id),
  FOREIGN KEY (vehicle_id) REFERENCES vehicle(vehicle_id),
  FOREIGN KEY (company_id) REFERENCES company(company_id),
  UNIQUE (vehicle_id, company_id)
);
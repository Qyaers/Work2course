DROP DATABASE hospital_tech;
CREATE DATABASE hospital_tech;
USE hospital_tech;
CREATE TABLE Doctor(
    id_doctor INT NOT NULL DEFAULT '1' PRIMARY KEY,
    name_d VARCHAR(30) NOT NULL,
	second_name_d VARCHAR(30) NOT NULL,
    room_d int NOT NULL,
    floor_d int NOT NULL,
    id_d_ysluga int,
    id_d_p int
);
CREATE TABLE Adress(
    id_adress INT NOT NULL DEFAULT '1' PRIMARY KEY,	
	adress_a VARCHAR(30) NOT NULL
);
CREATE TABLE Patient (
	id_patient INT NOT NULL DEFAULT '1' PRIMARY KEY,
    login_p VARCHAR(30) NOT NULL ,
    password_p VARCHAR(30) NOT NULL,
    id_ysluga_p int,
	id_doctor_p int,
    id_adress_p int,
    hash_p varchar(120)
);
CREATE TABLE price_check(
	id_pch INT NOT NULL DEFAULT '1' PRIMARY KEY,
    ysluga_pch VARCHAR(30) NOT NULL,
    price_pch int NOT NULL
);
ALTER TABLE Doctor ADD CONSTRAINT FK_d1 FOREIGN KEY Doctor(id_d_ysluga) REFERENCES price_check(id_pch);
ALTER TABLE Doctor ADD CONSTRAINT Fk_d2  FOREIGN KEY Doctor(id_d_p) REFERENCES Patient(id_patient);
ALTER TABLE Patient ADD CONSTRAINT Fk_p1 FOREIGN KEY Patient(id_ysluga_p) REFERENCES price_check(id_pch); 
ALTER TABLE Patient ADD CONSTRAINT Fk_p2 FOREIGN KEY Patient(id_adress_p) REFERENCES Adress(id_adress);
ALTER TABLE Patient ADD CONSTRAINT Fk_p3 FOREIGN KEY Patient(id_doctor_p) REFERENCES Doctor(id_doctor);  
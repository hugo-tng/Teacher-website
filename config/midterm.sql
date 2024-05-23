create database midterm;
use midterm;

CREATE TABLE Teacher
(
  maGiangVien char(10) NOT NULL,
  tenGiangVien VARCHAR(50) NOT NULL,
  thongTinLienHe VARCHAR(50) NOT NULL,
  gioiThieu VARCHAR(500) NOT NULL,
  chucVu VARCHAR(100) NOT NULL,
  PRIMARY KEY (maGiangVien)
);

CREATE TABLE Research
(
  tuaDe VARCHAR(50) NOT NULL,
  moTa VARCHAR(400) NOT NULL,
  maGiangVien char(10) NOT NULL,
  PRIMARY KEY (tuaDe),
  FOREIGN KEY (maGiangVien) REFERENCES Teacher(maGiangVien)
);

CREATE TABLE Major
(
  tenMon VARCHAR(100) NOT NULL,
  maMon CHAR(10) NOT NULL,
  maGiangVien CHAR(10) NOT NULL,
  PRIMARY KEY (maMon),
  FOREIGN KEY (maGiangVien) REFERENCES Teacher(maGiangVien)
);

CREATE TABLE Material
(
  taiLieu VARCHAR(400) NOT NULL,
  loaiTaiLieu VARCHAR(10) NOT NULL,
  monHocLienQuan CHAR(10) NOT NULL,
  FOREIGN KEY (monHocLienQuan) REFERENCES Major(maMon)
);

CREATE TABLE News
(
  tuaDe VARCHAR(100) NOT NULL,
  noiDung VARCHAR(300) NOT NULL,
  monHocLienQuan CHAR(10) NOT NULL,
  PRIMARY KEY (tuaDe),
  FOREIGN KEY (monHocLienQuan) REFERENCES Major(maMon)
);
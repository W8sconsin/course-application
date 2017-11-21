create DATABASE if not EXISTS course_svc;
use course_svc;

drop table if exists course;
create table course (
  id varchar(15) PRIMARY KEY,
  name varchar(50) NOT NULL,
  description VARCHAR(1000)
);

drop table if exists textbook;
create table textbook (
  course_id VARCHAR(15) NOT NULL,
  isbn varchar(50) NOT NULL,
  name varchar(100) NOT NULL,
  PRIMARY KEY (course_id, isbn),
  CONSTRAINT fk_textbook_course_id FOREIGN KEY (course_id) REFERENCES course(id)
    on DELETE CASCADE on UPDATE NO ACTION
);

drop table if EXISTS section;
create table section (
  course_id varchar(15) NOT NULL,
  id VARCHAR(30) NOT NULL,
  day_of_week VARCHAR(7) NOT NULL,
  time VARCHAR(30) NOT NULL,
  PRIMARY KEY (course_id, id),
  CONSTRAINT fk_section_course_id FOREIGN KEY (course_id) REFERENCES course(id)
    on DELETE CASCADE on UPDATE NO ACTION
);
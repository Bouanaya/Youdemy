CREATE DATABASE Youdemy;
USE Youdemy;
 


CREATE TABLE users (
  userId INT AUTO_INCREMENT PRIMARY KEY
  , username VARCHAR(255) NOT NULL
  , email VARCHAR(255) NOT NULL UNIQUE
  , password VARCHAR(255) NOT NULL
  , role ENUM('student', 'teacher',"admin") NOT NULL
  , created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  , updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  ON
  UPDATE
    CURRENT_TIMESTAMP
    , status ENUM('active', 'suspended', 'pending') DEFAULT 'pending'
);

-- Table des category de cours
CREATE TABLE category (
  categoryId INT AUTO_INCREMENT PRIMARY KEY
  , categoryName VARCHAR(255) NOT NULL
  , description TEXT
  , created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des tags
CREATE TABLE Tags (
  tagId INT AUTO_INCREMENT PRIMARY KEY
  , tagName VARCHAR(255) NOT NULL UNIQUE
  , created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des cours
CREATE TABLE Courses (
  courseId INT AUTO_INCREMENT PRIMARY KEY
  , title VARCHAR(255) NOT NULL
  , description TEXT
  , content TEXT
  , -- Peut être une URL ou un chemin vers le fichier
    teacherId INT
  , categoryId INT
  , created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  , updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  ON
  UPDATE
    CURRENT_TIMESTAMP
    , FOREIGN KEY (teacherId) REFERENCES Users(userId)
    , FOREIGN KEY (categoryId) REFERENCES category(categoryId)
);

-- Table de relation many-to-many entre les cours et les tags
CREATE TABLE CourseTags (
  courseId INT
  , tagId INT
  , FOREIGN KEY (courseId) REFERENCES Courses(courseId)
  , FOREIGN KEY (tagId) REFERENCES Tags(tagId)
);

-- Table des inscriptions des étudiants aux cours
CREATE TABLE Enrollments (
  enrollmentId INT AUTO_INCREMENT PRIMARY KEY
  , studentId INT
  , courseId INT
  , enrolled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  , FOREIGN KEY (studentId) REFERENCES Users(userId)
  , FOREIGN KEY (courseId) REFERENCES Courses(courseId)
);


-- ================================================trigger=================================

DELIMITER //

CREATE TRIGGER default_status
BEFORE INSERT ON users
FOR EACH ROW
BEGIN
    IF NEW.role = 'enseignant' THEN
        SET NEW.status = 'pending';
    ELSE
        SET NEW.status = 'active';
    END IF;
END; //

DELIMITER ;
-- =================================================fin trigger=================================




alter table courses add type varchar(40) not null;
alter table courses add courseStatus ENUM('active','desactive') DEFAULT 'active';




INSERT INTO `users`( `username`, `email`, `password`, `role`) VALUES ('SOUFIANE','bouanaya@gmail.com','12345678','student' );
INSERT INTO `users`( `username`, `email`, `password`, `role`) VALUES ('SOUIAL','SOUHIALE@gmail.com','12345678','teacher' );
INSERT INTO `users`( `username`, `email`, `password`, `role`) VALUES ('NOUHIALA','NOUHIALA@gmail.com','12345678','student' );





INSERT INTO users (username, email, password, role, status, created_at) VALUES
-- 5 Users on 2025-01-10
('user1', 'userS14DZD@example.com', 'password123', 'student', 'active', '2025-04-10 08:00:00'),
('user2', 'userD2E4D@example.com', 'password123', 'teacher', 'pending', '2025-04-10 09:15:00'),
('user3', 'user3ZS4D@example.com', 'password123', 'student', 'suspended', '2025-04-10 10:30:00'),
('user4', 'userE4Z4D@example.com', 'password123', 'teacher', 'active', '2025-02-10 11:45:00'),
('user5', 'userZE5D4@example.com', 'password123', 'student', 'pending', '2025-05-10 13:00:00'),
('user6', 'userE6ED4@example.com', 'password123', 'teacher', 'suspended', '2025-05-20 08:45:00'),
('user7', 'useZr7RD4@example.com', 'password123', 'student', 'active', '2025-07-20 10:00:00'),
('user8', 'useSr8RD4@example.com', 'password123', 'teacher', 'pending', '2025-07-20 11:15:00')
;

ALTER TABLE users ADD COLUMN slug VARCHAR(255) UNIQUE;

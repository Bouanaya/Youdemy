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

ALTER TABLE Courses 
ADD status ENUM('draft', 'published', 'archived') NOT NULL DEFAULT 'draft';

-- =================================================fin trigger=================================




alter table courses add type varchar(40) not null;
alter table courses add courseStatus ENUM('active','desactive') DEFAULT 'active';




INSERT INTO `users`( `username`, `email`, `password`, `role`) VALUES ('SOUFIANE','bouanaya@gmail.com','12345678','student' );
INSERT INTO `users`( `username`, `email`, `password`, `role`) VALUES ('SOUIAL','SOUHIALE@gmail.com','12345678','teacher' );
INSERT INTO `users`( `username`, `email`, `password`, `role`) VALUES ('NOUHIALA','NOUHIALA@gmail.com','12345678','student' );






;

ALTER TABLE Courses 
ADD status ENUM('draft', 'published', 'archived') NOT NULL DEFAULT 'draft';


ALTER TABLE Courses 
ADD devise VARCHAR(10) NOT NULL DEFAULT 'USD';


ALTER TABLE CourseTags 
ADD CONSTRAINT fk_course_tag FOREIGN KEY (courseId) REFERENCES Courses(courseId) ON DELETE CASCADE,
ADD CONSTRAINT fk_tag FOREIGN KEY (tagId) REFERENCES Tags(tagId) ON DELETE CASCADE;



SELECT 
    c.courseId,
    c.title,
    c.description,
    c.content,
    c.teacherId,
    c.categoryId,
    c.status,
    ca.categoryName,
    GROUP_CONCAT(DISTINCT t.tagName ORDER BY t.tagName SEPARATOR ', ') AS tags
FROM 
    Courses c
LEFT JOIN 
    CourseTags ct ON c.courseId = ct.courseId 
JOIN category ca ON c.categoryId = ca.categoryId
LEFT JOIN 
    Tags t ON ct.tagId = t.tagId
GROUP BY 
    c.courseId
ORDER BY 
    c.created_at DESC;




ALTER TABLE Courses DROP FOREIGN KEY fk_category;

ALTER TABLE Courses 
ADD CONSTRAINT fk_category 
FOREIGN KEY (categoryId) 
REFERENCES category(categoryId) 
ON DELETE CASCADE;




                -- Drop existing foreign keysCONSTRAINT `fk_category` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`) ON DELETE CASCADE
ALTER TABLE users
ADD COLUMN photo VARCHAR(500) DEFAULT 'https://th.bing.com/th/id/OIP.nbiEEr9fr4P-UslubiE1RQHaHa?w=186&h=187&c=7&r=0&o=5&pid=1.7',
ADD COLUMN description TEXT DEFAULT 'No description';


ALTER TABLE users
ADD COLUMN address VARCHAR(255) DEFAULT 'Skhirat',
ADD COLUMN phone VARCHAR(20) DEFAULT '06##########';


ALTER TABLE users
ADD COLUMN travailName VARCHAR(255) DEFAULT 'No travailName',
ADD COLUMN travailAddress VARCHAR(255) DEFAULT 'No travailAddress',
ADD COLUMN headerPhoto VARCHAR(500) DEFAULT 'https://th.bing.com/th/id/R.72ad85d65b52a367ebb66f5466a8556b?rik=zeV%2bJ7Kb7lCNyA&riu=http%3a%2f%2fweknowyourdreams.com%2fimages%2fgrey%2fgrey-04.jpg&ehk=VFVujJ1Q0KhthB4cdQnwgljyetXvMgjem2gxDcUmkhE%3d&risl=&pid=ImgRaw&r=0';


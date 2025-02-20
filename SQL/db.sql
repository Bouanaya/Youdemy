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





INSERT INTO users (username, email, password, role, status, created_at) VALUES
-- 5 Users on 2025-01-10
('user1s', 'userS1s4DZD@example.com', 'password123', 'student', 'active', '2025-04-10 08:00:00'),
('user2s', 'userD2E4Ds@example.com', 'password123', 'teacher', 'pending', '2025-04-10 09:15:00'),
('user3s', 'user3ZS4Ds@example.com', 'password123', 'student', 'suspended', '2025-04-10 10:30:00'),
('userss', 'userE4Z4Ds@example.com', 'password123', 'teacher', 'active', '2025-02-10 11:45:00'),
('user5s', 'userZE5D4s@example.com', 'password123', 'student', 'pending', '2025-05-10 13:00:00'),
('user6s', 'userE6ED4s@example.com', 'password123', 'teacher', 'suspended', '2025-05-20 08:45:00'),
('user7s', 'useZr7RD4s@example.com', 'password123', 'student', 'active', '2025-07-20 10:00:00'),
('user8s', 'useSr8RD4s@example.com', 'password123', 'teacher', 'pending', '2025-07-20 11:15:00')
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
    GROUP_CONCAT(DISTINCT t.tagName ORDER BY t.tagName SEPARATOR ', ') AS tags
FROM 
    Courses c
LEFT JOIN 
    CourseTags ct ON c.courseId = ct.courseId
LEFT JOIN 
    Tags t ON ct.tagId = t.tagId
GROUP BY 
    c.courseId
ORDER BY 
    c.created_at DESC;


 SELECT c.*, 
                    ca.name AS category_name, 
                    u.username AS enseignant_name, 
                    GROUP_CONCAT(t.name) AS tags,
                    DATE(c.scheduled_date) AS scheduled_date_only
                FROM cours c
                LEFT JOIN categories ca ON c.category_id = ca.id
                LEFT JOIN users u ON c.enseignant_id = u.id
                LEFT JOIN cours_tags ct ON c.id = ct.cours_id
                LEFT JOIN tags t ON ct.tag_id = t.id
                WHERE (c.contenu_document IS NOT NULL AND c.contenu_document != '') 
                  AND (c.contenu_video IS NULL OR c.contenu_video = '')
                GROUP BY c.id
                ORDER BY c.created_at DESC
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    description TEXT,
    technologies VARCHAR(100),
    project_link VARCHAR(255)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    skill_name VARCHAR(100) NOT NULL,
    proficiency INT DEFAULT 80
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

DELETE FROM admins;
DELETE FROM projects;
DELETE FROM skills;

INSERT INTO admins (username, password) VALUES ('admin', MD5('admin123'));

INSERT INTO projects (title, description, technologies, project_link) VALUES 
('Hệ thống Quản lý Bán hàng', 'Ứng dụng thương mại điện tử quản lý sản phẩm, giỏ hàng và thanh toán trực tuyến.', 'PHP, MySQL, Bootstrap', 'https://github.com/'),
('Ứng dụng Quản lý Công việc (Task Management)', 'Hệ thống hỗ trợ phân công công việc nhóm theo thời gian thực sử dụng RESTful API.', 'ReactJS, Node.js, Express', 'https://github.com/');

INSERT INTO skills (skill_name, proficiency) VALUES 
('HTML5 / CSS3 / JavaScript', 90),
('PHP & MySQL Database', 85),
('Docker & Linux System Administration', 80);

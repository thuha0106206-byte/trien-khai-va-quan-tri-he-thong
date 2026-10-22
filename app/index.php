<?php 
require_once 'db.php';
$pdo->exec("SET NAMES utf8mb4");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới thiệu Cá nhân - Nguyễn Thị Thu Hà</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --bg-color: #f8fafc;
            --text-color: #1e293b;
            --card-bg: #ffffff;
            --border-color: #e2e8f0;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Inter', sans-serif; background-color: var(--bg-color); color: var(--text-color); line-height: 1.6; }
        header { background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); color: white; padding: 50px 20px; text-align: center; }
        header h1 { font-size: 2.8rem; margin-bottom: 10px; font-weight: 700; }
        header p { font-size: 1.2rem; opacity: 0.95; font-weight: 500; }
        .container { max-width: 1000px; margin: 30px auto 40px; padding: 0 20px; }
        .card { background: var(--card-bg); border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); padding: 30px; margin-bottom: 30px; border: 1px solid var(--border-color); }
        h2 { color: var(--secondary-color); font-size: 1.5rem; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid var(--border-color); display: flex; align-items: center; gap: 10px; }
        .info-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 15px; }
        .info-item { display: flex; align-items: center; gap: 12px; background: #f8fafc; border: 1px solid var(--border-color); padding: 14px 18px; border-radius: 8px; font-weight: 500; font-size: 1rem; }
        .info-item i { color: var(--primary-color); font-size: 1.2rem; min-width: 24px; text-align: center; }
        .project-grid { display: grid; grid-template-columns: 1fr; gap: 20px; }
        .project-item { background: #f8fafc; border: 1px solid var(--border-color); padding: 20px; border-radius: 8px; }
        .project-item h3 { color: var(--primary-color); margin-bottom: 8px; font-size: 1.2rem; }
        .tech-tag { display: inline-block; background: #e0e7ff; color: #3730a3; padding: 4px 10px; border-radius: 20px; font-size: 0.85rem; font-weight: 600; margin-top: 10px; }
        .skills-list { display: flex; flex-wrap: wrap; gap: 10px; }
        .skill-badge { background: #eff6ff; color: var(--primary-color); padding: 8px 16px; border-radius: 6px; font-weight: 600; border: 1px solid #bfdbfe; }
        footer { text-align: center; padding: 20px; color: #64748b; font-size: 0.9rem; }
    </style>
</head>
<body>
    <header>
        <h1>Giới thiệu Cá nhân</h1>
        <p>Website Portfolio - Hệ thống Quản lý & Giám sát DevOps</p>
    </header>

    <div class="container">
        <!-- Thông tin sinh viên -->
        <div class="card">
            <h2><i class="fa-solid fa-user-circle"></i> Thông tin sinh viên</h2>
            <div class="info-grid">
                <div class="info-item"><i class="fa-solid fa-user"></i> <span><strong>Họ và tên:</strong> Nguyễn Thị Thu Hà</span></div>
                <div class="info-item"><i class="fa-solid fa-graduation-cap"></i> <span><strong>Lớp:</strong> Kỹ thuật phần mềm K23C</span></div>
                <div class="info-item"><i class="fa-solid fa-building-columns"></i> <span><strong>Khoa:</strong> Công nghệ Thông tin</span></div>
                <div class="info-item"><i class="fa-solid fa-phone"></i> <span><strong>SĐT:</strong> 0355201256</span></div>
                <div class="info-item"><i class="fa-solid fa-envelope"></i> <span><strong>Email:</strong> dtc245180187@ictu.edu.vn</span></div>
                <div class="info-item"><i class="fa-solid fa-location-dot"></i> <span><strong>Địa chỉ:</strong> Thái Nguyên</span></div>
            </div>
        </div>

        <!-- Kỹ năng chuyên môn -->
        <div class="card">
            <h2><i class="fa-solid fa-laptop-code"></i> Kỹ năng chuyên môn</h2>
            <div class="skills-list">
                <div class="skill-badge">HTML5 / CSS3 / JavaScript (90%)</div>
                <div class="skill-badge">PHP & MySQL Database (85%)</div>
                <div class="skill-badge">Docker & Linux System Administration (80%)</div>
            </div>
        </div>

        <!-- Dự án nổi bật -->
        <div class="card">
            <h2><i class="fa-solid fa-briefcase"></i> Dự án nổi bật</h2>
            <div class="project-grid">
                <div class="project-item">
                    <h3>Hệ thống Quản lý Bán hàng</h3>
                    <p>Ứng dụng thương mại điện tử quản lý sản phẩm, giỏ hàng và danh mục trực tuyến phục vụ người dùng.</p>
                    <span class="tech-tag">PHP, MySQL, Bootstrap</span>
                </div>
                <div class="project-item">
                    <h3>Ứng dụng Quản lý Công việc (Task Management)</h3>
                    <p>Hệ thống hỗ trợ phân công công việc nhóm theo thời gian thực sử dụng RESTful API.</p>
                    <span class="tech-tag">ReactJS, Node.js, Express</span>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 Nguyễn Thị Thu Hà - Lớp Kỹ thuật phần mềm K23C - Khoa CNTT</p>
    </footer>
</body>
</html>

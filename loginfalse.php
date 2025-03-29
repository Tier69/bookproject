<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Error</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Fonts - Itim -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Itim', cursive;
            background-color: #f8f3e6;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cpath fill='%23d4c8b0' d='M10 10L90 10L90 90L10 90Z' opacity='0.1'/%3E%3C/svg%3E");
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .error-container {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(139, 97, 62, 0.3);
            padding: 40px;
            text-align: center;
            max-width: 500px;
            width: 100%;
            border: 2px solid #8b613e;
            position: relative;
            z-index: 10;
        }

        .book-corner {
            position: absolute;
            top: 0;
            right: 0;
            width: 40px;
            height: 40px;
            background-color: #8b613e;
            clip-path: polygon(100% 0, 0 0, 100% 100%);
        }

        .error-icon {
            font-size: 4rem;
            color: #c17754;
            margin-bottom: 20px;
            filter: drop-shadow(2px 2px 2px rgba(0,0,0,0.1));
        }

        .book-design {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #8b613e;
            height: 30px;
            width: 120px;
            border-radius: 5px 5px 0 0;
            z-index: -1;
        }

        .error-title {
            color: #8b613e;
            margin-bottom: 20px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }

        .error-message {
            color: #a67b5b;
            margin-bottom: 30px;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background-color: #8b613e;
            border-color: #8b613e;
            padding: 10px 20px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background-color: #6d4c30;
            border-color: #6d4c30;
            transform: scale(1.05);
        }

        .footer {
            margin-top: 20px;
            color: #a67b5b;
            font-size: 0.9rem;
            border-top: 1px dashed #d4c8b0;
            padding-top: 15px;
        }
        
        .book-icon {
            display: inline-block;
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="book-corner"></div>
        <div class="book-design"></div>
        <i class="bi bi-book error-icon"></i>
        <h1 class="error-title"><i class="bi bi-bookmark-x book-icon"></i> Login ผิดพลาด</h1>
        <h2 class="error-message">กรุณาตรวจสอบ ชื่อผู้ใช้และรหัสผ่าน</h2>
        
        <a href="login.php" class="btn btn-primary btn-back">
            <i class="bi bi-arrow-left-circle-fill"></i> กลับสู่หน้าจอ Login
        </a>

        <div class="footer">
            <i class="bi bi-pencil"></i> พัฒนาโดย 664485028 นภัสกร กิตติเรืองชัย
        </div>
    </div>

    <!-- Bootstrap 5 JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
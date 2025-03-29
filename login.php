<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ห้องสมุดออนไลน์ - เข้าสู่ระบบ</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Google Fonts - Kanit และ Itim -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=Kanit:wght@200;300;400&family=Prompt:wght@200;300;400&display=swap" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f9f4e8; /* สีกระดาษหนังสือเก่า */
            background-image: url("https://images.unsplash.com/photo-1512820790803-83ca734da794?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDF8fGJvb2t8ZW58MHx8fHwxNjg0MjY1MjY0&ixlib=rb-4.0.3&q=80&w=1080");
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(139, 90, 43, 0.3); /* สีน้ำตาลโปร่งแสง */
            z-index: 1;
        }

        .login-wrapper {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            padding: 40px;
            width: 100%;
            max-width: 450px;
            position: relative;
            z-index: 10;
            border: 1px solid #e0d5c1;
            overflow: hidden;
        }

        /* เพิ่มเอฟเฟคหนังสือด้านบน */
        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background-image: linear-gradient(to right, #e74c3c, #f39c12, #2ecc71, #3498db, #9b59b6);
            border-radius: 20px 20px 0 0;
        }

        /* เพิ่มเอฟเฟคที่มุมหนังสือ */
        .book-corner {
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            background-color: #8B4513;
            transform: rotate(45deg);
            z-index: -1;
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
            color: #5D4037; /* สีน้ำตาลเข้ม */
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }

        .login-header h1 {
            font-family: 'Itim', cursive;
            font-size: 2.2rem;
            margin-top: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .book-icon-wrapper {
            width: 80px;
            height: 80px;
            background-color: #8B4513; /* สีน้ำตาล */
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        .book-icon-wrapper::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 50%);
            border-radius: 50%;
        }

        .book-icon-wrapper i {
            font-size: 3rem;
            color: #FFF;
        }

        .form-label {
            font-weight: 500;
            color: #5D4037; /* สีน้ำตาลเข้ม */
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }

        .form-label i {
            margin-right: 8px;
            color: #8B4513; /* สีน้ำตาล */
        }

        .form-control {
            padding: 12px 15px 12px 45px;
            border-radius: 30px;
            border: 2px solid #e0d5c1;
            background-color: #fff;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #8B4513; /* สีน้ำตาล */
            box-shadow: 0 0 0 0.25rem rgba(139, 69, 19, 0.25);
        }

        .input-group {
            position: relative;
        }

        .input-group-text {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            background-color: transparent;
            border: none;
            color: #8B4513; /* สีน้ำตาล */
            padding: 0;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #8B4513; /* สีน้ำตาล */
            border-color: #8B4513; /* สีน้ำตาล */
            transition: all 0.3s ease;
            font-weight: 500;
            box-shadow: 0 4px 8px rgba(139, 69, 19, 0.3);
        }

        .btn-login:hover {
            background-color: #6d4c41; /* สีน้ำตาลเข้มขึ้นเมื่อ hover */
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(139, 69, 19, 0.4);
        }

        .btn-login i, .btn-cancel i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .btn-cancel {
            width: 100%;
            margin-top: 10px;
            background-color: #f8f9fa;
            color: #dc3545;
            border: 2px solid #dc3545;
            border-radius: 30px;
            padding: 12px;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .btn-cancel:hover {
            background-color: #dc3545;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #5D4037;
            font-size: 0.9rem;
            position: relative;
            padding-top: 20px;
        }

        .footer::before {
            content: "";
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 2px;
            background-color: #e0d5c1;
        }

        /* เพิ่มเอฟเฟคหนังสือลอยไปมา */
        .floating-books {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .floating-book {
            position: absolute;
            font-size: 30px;
            animation: float 15s infinite linear;
            opacity: 0.5;
            color: #8B4513;
        }

        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 0.5;
            }
            90% {
                opacity: 0.5;
            }
            100% {
                transform: translateY(-1000px) rotate(360deg);
                opacity: 0;
            }
        }

        /* สไตล์สำหรับการแสดงรหัสผ่าน */
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            background: none;
            border: none;
            color: #6d4c41;
            cursor: pointer;
        }

        /* ตกแต่งลิงก์ลืมรหัสผ่านและสมัครสมาชิก */
        .auth-links {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            font-size: 0.9rem;
        }

        .auth-links a {
            color: #8B4513;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .auth-links a:hover {
            color: #6d4c41;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- เพิ่มหนังสือลอยไปมา -->
    <div class="floating-books">
        <div class="floating-book" style="left: 10%; animation-duration: 20s;"><i class="fas fa-book"></i></div>
        <div class="floating-book" style="left: 25%; animation-duration: 15s; animation-delay: 2s;"><i class="fas fa-book-open"></i></div>
        <div class="floating-book" style="left: 40%; animation-duration: 18s; animation-delay: 5s;"><i class="fas fa-bookmark"></i></div>
        <div class="floating-book" style="left: 60%; animation-duration: 25s; animation-delay: 1s;"><i class="fas fa-book-reader"></i></div>
        <div class="floating-book" style="left: 75%; animation-duration: 22s; animation-delay: 3s;"><i class="fas fa-atlas"></i></div>
        <div class="floating-book" style="left: 90%; animation-duration: 17s; animation-delay: 8s;"><i class="fas fa-journal-whills"></i></div>
    </div>

    <div class="login-wrapper">
        <div class="login-container">
            <div class="book-corner"></div>
            <div class="login-header">
                <div class="book-icon-wrapper">
                    <i class="fas fa-book-open"></i>
                </div>
                <h1>ห้องสมุดออนไลน์</h1>
                <p>กรุณาเข้าสู่ระบบเพื่อใช้งาน</p>
            </div>
            <form action="chklogin.php" method="POST">
                <div class="mb-4">
                    <label for="u_id" class="form-label">
                        <i class="fas fa-user-circle"></i> ชื่อผู้ใช้
                    </label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" id="u_id" name="u_id" maxlength="30" required placeholder="กรอกชื่อผู้ใช้">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="u_passwd" class="form-label">
                        <i class="fas fa-key"></i> รหัสผ่าน
                    </label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="u_passwd" name="u_passwd" maxlength="30" required placeholder="กรอกรหัสผ่าน">
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-login">
                        <i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ
                    </button>
                    <button type="reset" class="btn btn-cancel">
                        <i class="fas fa-times-circle"></i> ยกเลิก
                    </button>
                </div>

               
            </form>
            
            <div class="footer">
                <p><i class="fas fa-heart"></i> พัฒนาโดย 664485028 นภัสกร กิตติเรืองชัย</p>
                <p>ระบบห้องสมุดออนไลน์ <?php echo date('Y'); ?></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- ฟังก์ชันสำหรับซ่อน/แสดงรหัสผ่าน -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('u_passwd');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
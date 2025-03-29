<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลหนังสือ | ระบบจัดการข้อมูลหนังสือ</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f0f4f8;
            padding-bottom: 60px; /* For footer space */
        }
        .navbar {
            background: linear-gradient(135deg, #0d6efd, #0099ff);
            color: white;
            padding: 15px 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 30px;
        }
        .card-header {
            background: linear-gradient(135deg, #0d6efd, #0099ff);
            color: white;
            font-weight: 500;
            padding: 15px 20px;
            border: none;
        }
        .btn {
            border-radius: 8px;
            font-weight: 500;
            padding: 8px 20px;
            transition: all 0.3s;
        }
        .btn-primary {
            background: linear-gradient(135deg, #0d6efd, #0099ff);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #0b5ed7, #0077cc);
            transform: translateY(-2px);
        }
        .btn-danger:hover, .btn-warning:hover {
            transform: translateY(-2px);
        }
        .form-control, .form-select {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #ddd;
        }
        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            border-color: #86b7fe;
        }
        footer {
            background: linear-gradient(135deg, #0d6efd, #0099ff);
            color: white;
            text-align: center;
            padding: 15px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.1);
        }
        .developer-credit {
            margin-top: 20px;
            color: #6c757d;
            text-align: center;
        }
        .alert {
            border-radius: 8px;
            animation: fadeIn 0.5s;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="fs-4 fw-bold">
                <i class="fas fa-chalkboard-teacher me-2"></i>
                ระบบจัดการข้อมูลหนังสือ
            </div>
            <div>
                <a href="login1.php" class="btn btn-outline-light btn-sm">
                    <i class="fas fa-sign-in-alt me-1"></i> เข้าสู่ระบบ
                </a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header fs-5">
                <i class="fas fa-user-plus me-2"></i>
                เพิ่มข้อมูลหนังสือ
            </div>
            <div class="card-body p-4">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="needs-validation" novalidate>
                    <div class="row mb-3">
                        <label for="teacher_id" class="col-sm-3 col-md-2 col-form-label">รหัสหนังสือ</label>
                        <div class="col-sm-9 col-md-4">
                            <input type="text" class="form-control" id="book_id" name="book_id" required>
                            <div class="invalid-feedback">
                                กรุณากรอกรหัสหนังสือ
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="title" class="col-sm-3 col-md-2 col-form-label">ชื่อหนังสือ</label>
                        <div class="col-sm-9 col-md-4">
                            <input type="text" class="form-control" id="title" name="title" required>
                            <div class="invalid-feedback">
                                กรุณากรอกชื่อหนังสือ
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="author" class="col-sm-3 col-md-2 col-form-label">ผู้แต่ง</label>
                        <div class="col-sm-9 col-md-4">
                            <input type="text" class="form-control" id="author" name="author" required>
                            <div class="invalid-feedback">
                                กรุณากรอกชื่อผู้แต่ง
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="genre" class="col-sm-3 col-md-2 col-form-label">ประเภทของหนังสือ</label>
                        <div class="col-sm-9 col-md-4">
                            <select name="genre" id="genre" class="form-select" required>
                                <option value="" selected disabled>เลือกประเภทของหนังสือ</option>
                                <option value="ผจญภัย">ผจญภัย</option>
                                <option value="รักโรแมนติก">รักโรแมนติก</option>
                                <option value="สารคดี">สารคดี</option>
                                <option value="ดราม่า">ดราม่า</option>
                                <option value="ประวัติศาสตร์">ประวัติศาสตร์</option>
                                <option value="ลึกลับ">ลึกลับ</option>
                            </select>
                            <div class="invalid-feedback">
                                กรุณาเลือกประเภทของหนังสือ
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row mb-3">
                        <label for="published_year" class="col-sm-3 col-md-2 col-form-label">ปีที่ตีพิมพ์</label>
                        <div class="col-sm-9 col-md-4">
                            <input type="text" class="form-control" id="published_year" name="published_year" min="1" max="100" required>
                            <div class="invalid-feedback">
                                กรุณากรอกปีที่ตีพิมพ์
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="mood" class="col-sm-3 col-md-2 col-form-label">อารมณ์ของหนังสือ</label>
                        <div class="col-sm-9 col-md-4">
                            <input type="text" class="form-control" id="mood" name="mood" min="0" required>
                            <div class="invalid-feedback">
                                กรุณากรอกอารมณ์ของหนังสือ
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> บันทึกข้อมูล
                        </button>
                        <button type="reset" class="btn btn-danger">
                            <i class="fas fa-times me-1"></i> ยกเลิก
                        </button>
                        <a href="show.php" class="btn btn-warning">
                            <i class="fas fa-list me-1"></i> แสดงข้อมูล
                        </a>
                    </div>
                </form>
                
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Include database connection
                    include("conn.php");
                    
                    // Get form data and sanitize inputs
                    $book_id = mysqli_real_escape_string($conn, $_POST['book_id']);
                    $title = mysqli_real_escape_string($conn, $_POST['title']);
                    $author = mysqli_real_escape_string($conn, $_POST['author']);
                    $genre = mysqli_real_escape_string($conn, $_POST['genre']);
                    $published_year = mysqli_real_escape_string($conn, $_POST['published_year']);
                    $mood = mysqli_real_escape_string($conn, $_POST['mood']);
                    
                    // Insert data into database
                    $sql = "INSERT INTO book1 (book_id, title, author, genre, published_year, mood) 
                            VALUES ('$book_id', '$title', '$author', '$genre', '$published_year', '$mood')";
                    
                    if ($conn->query($sql) === TRUE) {
                        echo '<div class="alert alert-success mt-3 animate__animated animate__fadeIn">
                                <i class="fas fa-check-circle me-2"></i> บันทึกข้อมูลเรียบร้อยแล้ว
                              </div>';
                    } else {
                        echo '<div class="alert alert-danger mt-3 animate__animated animate__fadeIn">
                                <i class="fas fa-exclamation-circle me-2"></i> เกิดข้อผิดพลาด: ' . $conn->error . '
                              </div>';
                    }
                    
                    // Close connection
                    $conn->close();
                }
                ?>
            </div>
        </div>
        
        <!-- Developer Credit -->
        <div class="developer-credit">
            <small>
                <i class="fas fa-code me-1"></i> พัฒนาโดย 664485028 นภัสกร กิตติเรืองชัย | หมู่เรียน 66/96
            </small>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <small>© 2025 ระบบจัดการข้อมูลพนักงาน | มหาวิทยาลัยราชภัฏนครปฐม</small>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Form validation
        (function() {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>
</html>
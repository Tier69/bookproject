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
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700&family=Prompt:wght@300;400;500&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f8f5f0;
            padding-bottom: 60px; /* For footer space */
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d1c4ae' fill-opacity='0.2'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .navbar {
            background: linear-gradient(135deg, #8B4513, #A0522D);
            color: white;
            padding: 15px 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            margin-bottom: 30px;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 18px rgba(139, 69, 19, 0.15);
            overflow: hidden;
            margin-bottom: 30px;
            background-color: #fff;
            border-left: 5px solid #8B4513;
        }
        .card-header {
            background: linear-gradient(135deg, #8B4513, #A0522D);
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
            background: linear-gradient(135deg, #8B4513, #A0522D);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #A0522D, #CD853F);
            transform: translateY(-2px);
        }
        .btn-danger {
            background-color: #DC3545;
        }
        .btn-warning {
            background-color: #D4A76A;
            color: white;
        }
        .btn-danger:hover, .btn-warning:hover {
            transform: translateY(-2px);
        }
        .form-control, .form-select {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #ddd;
            background-color: #FFFAF0;
        }
        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(139, 69, 19, 0.25);
            border-color: #CD853F;
            background-color: #fff;
        }
        footer {
            background: linear-gradient(135deg, #8B4513, #A0522D);
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
        .form-label {
            position: relative;
        }
        .form-label i {
            margin-right: 8px;
            color: #8B4513;
        }
        .book-icon {
            animation: float 3s ease-in-out infinite;
            display: inline-block;
            margin-right: 5px;
            color: #FFF8DC;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
            100% { transform: translateY(0px); }
        }
        .page-title {
            font-family: 'Prompt', sans-serif;
            font-weight: 500;
        }
        .form-group-icon {
            position: relative;
        }
        .form-group-icon i {
            position: absolute;
            top: 12px;
            left: 15px;
            color: #8B4513;
        }
        .icon-input {
            padding-left: 40px !important;
        }
        .btn i {
            margin-right: 6px;
        }
        .navbar-brand {
            font-family: 'Prompt', sans-serif;
            font-weight: 500;
        }
        .book-card-icon {
            font-size: 24px;
            margin-right: 10px;
            color: #FFF8DC;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="fs-4 fw-bold navbar-brand">
                <i class="fas fa-book-open book-icon"></i>
                ระบบจัดการข้อมูลหนังสือ
            </div>
            
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header fs-5">
                <i class="fas fa-book-medical book-card-icon"></i>
                <span class="page-title">เพิ่มข้อมูลหนังสือ</span>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="needs-validation" novalidate>
                    <div class="row mb-3">
                        <label for="book_id" class="col-sm-3 col-md-2 col-form-label">
                            <i class="fas fa-barcode"></i> รหัสหนังสือ
                        </label>
                        <div class="col-sm-9 col-md-4 form-group-icon">
                            <i class="fas fa-hashtag"></i>
                            <input type="text" class="form-control icon-input" id="book_id" name="book_id" required>
                            <div class="invalid-feedback">
                                กรุณากรอกรหัสหนังสือ
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="title" class="col-sm-3 col-md-2 col-form-label">
                            <i class="fas fa-bookmark"></i> ชื่อหนังสือ
                        </label>
                        <div class="col-sm-9 col-md-4 form-group-icon">
                            <i class="fas fa-font"></i>
                            <input type="text" class="form-control icon-input" id="title" name="title" required>
                            <div class="invalid-feedback">
                                กรุณากรอกชื่อหนังสือ
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="author" class="col-sm-3 col-md-2 col-form-label">
                            <i class="fas fa-user-edit"></i> ผู้แต่ง
                        </label>
                        <div class="col-sm-9 col-md-4 form-group-icon">
                            <i class="fas fa-pen-fancy"></i>
                            <input type="text" class="form-control icon-input" id="author" name="author" required>
                            <div class="invalid-feedback">
                                กรุณากรอกชื่อผู้แต่ง
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="genre" class="col-sm-3 col-md-2 col-form-label">
                            <i class="fas fa-tags"></i> ประเภท
                        </label>
                        <div class="col-sm-9 col-md-4 form-group-icon">
                            <i class="fas fa-list-ul"></i>
                            <select name="genre" id="genre" class="form-select icon-input" required>
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
                        <label for="published_year" class="col-sm-3 col-md-2 col-form-label">
                            <i class="fas fa-calendar-alt"></i> ปีที่ตีพิมพ์
                        </label>
                        <div class="col-sm-9 col-md-4 form-group-icon">
                            <i class="fas fa-clock"></i>
                            <input type="text" class="form-control icon-input" id="published_year" name="published_year" min="1" max="100" required>
                            <div class="invalid-feedback">
                                กรุณากรอกปีที่ตีพิมพ์
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="mood" class="col-sm-3 col-md-2 col-form-label">
                            <i class="fas fa-heart"></i> อารมณ์
                        </label>
                        <div class="col-sm-9 col-md-4 form-group-icon">
                            <i class="fas fa-smile"></i>
                            <input type="text" class="form-control icon-input" id="mood" name="mood" min="0" required>
                            <div class="invalid-feedback">
                                กรุณากรอกอารมณ์ของหนังสือ
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> บันทึกข้อมูล
                        </button>
                        <button type="reset" class="btn btn-danger">
                            <i class="fas fa-times"></i> ยกเลิก
                        </button>
                        <a href="show.php" class="btn btn-warning">
                            <i class="fas fa-th-list"></i> แสดงข้อมูล
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
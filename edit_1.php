<!DOCTYPE html>
<html lang="en">
<?php
//เชื่อมต่อฐานข้อมูล
include("conn.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=Mali:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Fontawesome for cute icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Mali', cursive;
            background-color: #f5f0e6; /* สีกระดาษเก่า */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-image: url('data:image/svg+xml;utf8,<svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M30,20 L70,20 L70,80 L30,80 Z" stroke="%23d3c5a9" stroke-width="1" fill="none" opacity="0.3"/></svg>');
        }

        .card {
            box-shadow: 0 8px 16px rgba(0,0,0,0.15);
            border: none;
            background-color: #fff9f0;
            border-radius: 10px;
            overflow: hidden;
            border-left: 15px solid #8b6c4e; /* ขอบซ้ายเหมือนสันหนังสือ */
        }

        .card-header {
            background-color: #8b6c4e; /* สีน้ำตาลของปกหนังสือ */
            color: white;
            text-align: center;
            padding: 1.2rem;
            position: relative;
        }

        .card-header h1 {
            font-family: 'Itim', cursive;
            font-size: 1.8rem;
        }

        .card-body {
            padding: 2rem;
            background-image: url('data:image/svg+xml;utf8,<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M0,0 L20,0 L20,1 L0,1 Z" stroke="%23f0e6d7" stroke-width="0.5" fill="none"/></svg>');
            background-repeat: repeat;
            background-position: 0 0;
        }

        .btn-custom {
            background-color: #8b6c4e;
            color: white;
            border-radius: 20px;
            padding: 0.5rem 1.5rem;
            transition: all 0.3s;
        }

        .btn-custom:hover {
            background-color: #6e573d;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .alert-success {
            background-color: #e8f3eb;
            border-color: #c9e6d3;
            color: #2c6e3f;
            border-radius: 8px;
        }
        
        .alert-danger {
            background-color: #f8e8e8;
            border-color: #ecc9c9;
            color: #6e2c2c;
            border-radius: 8px;
        }

        .card-footer {
            background-color: #f0e6d7;
            border-top: 1px dashed #d3c5a9;
            padding: 0.8rem;
        }
        
        /* เพิ่มองค์ประกอบธีมหนังสือ */
        .book-corner {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 50px;
            height: 50px;
            overflow: hidden;
        }
        
        .book-corner::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            border-width: 0 50px 50px 0;
            border-style: solid;
            border-color: transparent #6e573d transparent transparent;
        }
        
        .book-bookmark {
            position: absolute;
            top: -10px;
            left: 20px;
            width: 20px;
            height: 40px;
            background-color: #e07a5f;
            border-radius: 0 0 10px 10px;
            transform: rotate(-10deg);
            z-index: 10;
        }
    </style>

    <title>แก้ไขข้อมูลหนังสือ</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="book-bookmark"></div>
                    <div class="book-corner"></div>
                    <div class="card-header">
                        <h1 class="mb-0">
                            <i class="fas fa-book-open me-2"></i>แก้ไขข้อมูลหนังสือ
                        </h1>
                    </div>
                    <div class="card-body">
                        <?php
                        //เริ่มเก็บข้อมูล
                        $book_id = $_POST['book_id'];
                        $title = $_POST['title'];
                        $author = $_POST['author'];
                        $genre = $_POST['genre'];
                        $published_year = $_POST['published_year'];
                        $mood = $_POST['mood'];
                        //เขียนคำสั่ง SQL
                        $sql = "UPDATE book1 SET title='$title',author='$author',genre='$genre',published_year='$published_year',mood='$mood' WHERE book_id=$book_id ";
                        // รับคำสั่ง sql
                        if ($conn->query($sql) === TRUE) {
                            echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                                    <i class="fas fa-bookmark me-2"></i>
                                    <div>ยินดีด้วยครับ คุณได้ทำการแก้ไขข้อมูลเรียบร้อย !!!</div>
                                  </div>';

                            echo '<div class="text-center mt-4">
                                    <a href="show.php" class="btn btn-custom">
                                        <i class="fas fa-book me-2"></i>กลับหน้าแสดงข้อมูล
                                    </a>
                                  </div>';
                        } else {
                            echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <i class="fas fa-exclamation-circle me-2"></i>
                                    <div>มีข้อผิดพลาด: ' . $conn->error . '</div>
                                  </div>';
                        }
                        // ปิดการเชื่อมต่อ
                        $conn->close();
                        ?>
                    </div>
                    <div class="card-footer text-center text-muted">
                        <small>
                            <i class="fas fa-feather-alt me-2"></i>
                            พัฒนาโดย 664485028 นภัสกร กิตติเรืองชัย หมู่เรียน 66/96
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ไอคอนหนังสือลอยเบาๆ -->
    <div style="position: fixed; bottom: 20px; right: 20px; opacity: 0.2; z-index: -1;">
        <i class="fas fa-book fa-5x" style="color: #8b6c4e;"></i>
    </div>
    <div style="position: fixed; bottom: 30px; left: 20px; opacity: 0.2; z-index: -1;">
        <i class="fas fa-bookmark fa-4x" style="color: #e07a5f;"></i>
    </div>

    <!-- Bootstrap 5 JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
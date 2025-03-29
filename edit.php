<!DOCTYPE html>
<html lang="en">
<?php
// เชื่อมต่อฐานข้อมูล
include("conn.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- เพิ่ม ส่วน Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- เพิ่มฟอนต์ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Kanit", sans-serif;
            background-color: #f8f5ee;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px 0;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-left: 5px solid #8b4513;
            max-width: 650px;
            width: 100%;
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #5d4037;
            font-weight: 600;
            border-bottom: 2px dashed #d7ccc8;
            padding-bottom: 15px;
        }

        .form-label {
            font-weight: 500;
            color: #6d4c41;
            display: flex;
            align-items: center;
        }

        .form-label i {
            margin-right: 8px;
            color: #8b4513;
        }

        .form-control, .form-select {
            border: 1px solid #d7ccc8;
            border-radius: 8px;
            padding: 10px 15px;
            transition: all 0.3s;
            background-color: #fff8e1;
        }

        .form-control:focus, .form-select:focus {
            border-color: #8b4513;
            box-shadow: 0 0 0 0.2rem rgba(139, 69, 19, 0.25);
            background-color: #ffffff;
        }

        .btn-container {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary {
            background-color: #4a6da7;
            border: none;
            flex: 1;
        }

        .btn-primary:hover {
            background-color: #3a5b91;
            transform: translateY(-2px);
        }

        .btn-danger {
            background-color: #d9534f;
            border: none;
            flex: 1;
        }

        .btn-danger:hover {
            background-color: #c9302c;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            width: 100%;
            margin-top: 10px;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .icon-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .book-icon {
            font-size: 48px;
            color: #8b4513;
            background-color: #f0e6d2;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #5d4037;
            text-decoration: none;
            font-weight: 500;
        }

        .back-link:hover {
            color: #8b4513;
        }

        .developer-info {
            text-align: center;
            font-size: 14px;
            color: #7d6e6e;
            margin-top: 25px;
            padding-top: 15px;
            border-top: 1px dashed #d7ccc8;
        }

        /* เพิ่มแอนิเมชั่นเล็กน้อย */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .container {
            animation: fadeIn 0.5s ease-out;
        }
    </style>

    <title>แก้ไขข้อมูลหนังสือ</title>
</head>

<body>
    <div class="container">
        <div class="icon-container">
            <div class="book-icon">
                <i class="fas fa-book-open"></i>
            </div>
        </div>
        
        <h1>แก้ไขข้อมูลหนังสือ</h1>

        <?php
        if (isset($_GET['action_even']) && $_GET['action_even'] == 'edit') {
            $book_id = $_GET['book_id'];
            $sql = "SELECT * FROM book1 WHERE book_id=$book_id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                echo "<div class='alert alert-warning'><i class='fas fa-exclamation-circle'></i> ไม่พบข้อมูลที่ต้องการแก้ไข กรุณาตรวจสอบ</div>";
            }
        }
        ?>

        <form action="edit_1.php" method="POST">
            <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-fingerprint"></i> รหัสหนังสือ</label>
                <div class="form-control bg-light"><?php echo $row['book_id']; ?></div>
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="fas fa-heading"></i> ชื่อหนังสือ</label>
                <input type="text" name="title" class="form-control" maxlength="50" value="<?php echo $row['title']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="fas fa-user-edit"></i> ผู้แต่ง</label>
                <input type="text" name="author" class="form-control" maxlength="100" value="<?php echo $row['author']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="fas fa-bookmark"></i> ประเภทของหนังสือ</label>
                <select name="genre" class="form-select" required>
                    <option value="">กรุณาระบุประเภทของหนังสือนะจ๊ะ</option>
                    <option value="ผจญภัย" <?php if ($row['genre'] == 'ผจญภัย') echo "selected"; ?>>ผจญภัย</option>
                    <option value="รักโรแมนติก" <?php if ($row['genre'] == 'รักโรแมนติก') echo "selected"; ?>>รักโรแมนติก</option>
                    <option value="สารคดี" <?php if ($row['genre'] == 'สารคดี') echo "selected"; ?>>สารคดี</option>
                    <option value="ดราม่า" <?php if ($row['genre'] == 'ดราม่า') echo "selected"; ?>>ดราม่า</option>
                    <option value="ประวัติศาสตร์" <?php if ($row['genre'] == 'ประวัติศาสตร์') echo "selected"; ?>>ประวัติศาสตร์</option>
                    <option value="ลึกลับ" <?php if ($row['genre'] == 'ลึกลับ') echo "selected"; ?>>ลึกลับ</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="fas fa-calendar-alt"></i> ปีที่ตีพิมพ์</label>
                <input type="text" name="published_year" class="form-control" maxlength="10" value="<?php echo $row['published_year']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="fas fa-heart"></i> อารมณ์ของหนังสือ</label>
                <input type="text" name="mood" class="form-control" maxlength="50" value="<?php echo $row['mood']; ?>" required>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> บันทึกข้อมูล</button>
                <button type="reset" class="btn btn-danger"><i class="fas fa-times-circle"></i> ยกเลิก</button>
            </div>
            
            <a href="show.php" class="back-link"><i class="fas fa-arrow-left"></i> กลับไปหน้าแสดงข้อมูล</a>
        </form>
        
        <div class="developer-info">
            <i class="fas fa-user-graduate"></i> พัฒนาโดย 664485028 นภัสกร กิตติเรืองชัย
        </div>
    </div>
</body>

</html>
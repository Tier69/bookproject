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
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .btn {
            width: 100%;
        }

        .icon {
            font-size: 50px;
            color: #007bff;
            display: block;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>

    <title>แก้ไขข้อมูลหนังสือ</title>
</head>

<body>
    <div class="container">
        <i class="fas fa-book icon"></i>
        <h1>แก้ไขข้อมูลหนังสือ</h1>

        <?php
        if (isset($_GET['action_even']) && $_GET['action_even'] == 'edit') {
            $book_id = $_GET['book_id'];
            $sql = "SELECT * FROM book1 WHERE book_id=$book_id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                echo "ไม่พบข้อมูลที่ต้องการแก้ไข กรุณาตรวจสอบ";
            }
        }
        ?>

        <form action="edit_1.php" method="POST">
            <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
            <div class="mb-3">
                <label class="form-label">รหัสหนังสือ</label>
                <label class="form-control"><?php echo $row['book_id']; ?></label>
            </div>

            <div class="mb-3">
                <label class="form-label">ชื่อหนังสือ</label>
                <input type="text" name="title" class="form-control" maxlength="50" value="<?php echo $row['title']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">ผู้แต่ง</label>
                <input type="text" name="author" class="form-control" maxlength="100" value="<?php echo $row['author']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">ประเภทของหนังสือ</label>
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
                <label class="form-label">ปีที่ตีพิมพ์</label>
                <input type="text" name="published_year" class="form-control" maxlength="10" value="<?php echo $row['published_year']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">อารมณ์ของหนังสือ</label>
                <input type="text" name="mood" class="form-control" maxlength="50" value="<?php echo $row['mood']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
            <button type="reset" class="btn btn-danger">ยกเลิก</button>
        </form>
        <br>
        <p class="text-center">พัฒนาโดย 664485028 นภัสกร กิตติเรืองชัย</p>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("conn.php")
    ?>
    <!-- เพิ่มส่วน ใช้งาน Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ส่วนของ DataTable -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- เพิ่มส่วน ใช้งาน Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=Kanit:ital,wght@0,200;0,300;1,100;1,200&family=Prompt:ital,wght@0,200;0,300;1,300&display=swap" rel="stylesheet">

    <!-- เพิ่ม Font Awesome สำหรับไอคอน -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- เพิ่ม CSS ให้ใช้ Font และธีมหนังสือ -->
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f8f5ee;
            margin-right: 100px;
            margin-left: 100px;
            margin-top: 50px;
        }

        .header-section {
            background-color: #f0e6d2;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-left: 5px solid #8b4513;
        }

        h1 {
            color: #5d4037;
            font-weight: bold;
        }

        h2 {
            color: #7d6e6e;
            font-size: 18px;
            margin-top: 10px;
        }

        .table {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        thead {
            background-color: #8b4513;
            color: white;
        }

        .btn-primary {
            background-color: #4a6da7;
            border: none;
        }

        .btn-danger {
            background-color: #d9534f;
            border: none;
        }

        .alert {
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .book-icon {
            margin-right: 10px;
            color: #8b4513;
        }

        .add-button {
            background-color: #5c8d76;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
            transition: all 0.3s;
        }

        .add-button:hover {
            background-color: #4a7861;
            transform: translateY(-2px);
        }

        .action-buttons a {
            margin-right: 5px;
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลหนังสือ</title>
</head>

<body>
    <?php
    if (isset($_GET['action_even']) == 'delete') {
        $id = $_GET['id'];
        $sql = "SELECT * FROM bags WHERE id=$id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $sql = "DELETE FROM bags WHERE id =$id";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success'><i class='fas fa-check-circle'></i> ลบข้อมูลสำเร็จ</div>";
            } else {
                echo "<div class='alert alert-danger'><i class='fas fa-exclamation-triangle'></i> ลบข้อมูลมีข้อผิดพลาด กรุณาตรวจสอบ !!! </div>" . $conn->error;
            }
        } else {
            echo '<div class="alert alert-warning"><i class="fas fa-exclamation-circle"></i> ไม่พบข้อมูล กรุณาตรวจสอบ</div>';
        }
    }
    ?>

    <div class="header-section">
        <h1><i class="fas fa-book book-icon"></i>แสดงข้อมูลหนังสือ</h1>
        <h2><i class="fas fa-user-edit"></i> พัฒนาโดย นภัสกร กิตติเรืองชัย 664485028</h2>
    </div>

    <a href="add.php" class="add-button"><i class="fas fa-plus-circle"></i> เพิ่มข้อมูลหนังสือ</a>

    <div class="table-responsive">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th><i class="fas fa-fingerprint"></i> รหัสประจำหนังสือ</th>
                    <th><i class="fas fa-heading"></i> ชื่อหนังสือ</th>
                    <th><i class="fas fa-user-edit"></i> ผู้แต่ง</th>
                    <th><i class="fas fa-bookmark"></i> ประเภทของหนังสือ</th>
                    <th><i class="fas fa-calendar-alt"></i> ปีที่ตีพิมพ์</th>
                    <th><i class="fas fa-heart"></i> อารมณ์ของหนังสือ</th>
                    <th><i class="fas fa-cogs"></i> จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM book1";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["book_id"] . " </td>";
                        echo "<td>" . $row["title"] . " </td>";
                        echo "<td>" . $row["author"] . " </td>";
                        echo "<td>" . $row["genre"] . " </td>";
                        echo "<td>" . $row["published_year"] . " </td>";
                        echo "<td>" . $row["mood"] . " </td>";
                        echo '<td class="action-buttons">
                            <a type="button" href="show.php?action_even=del&book_id=' . $row['book_id'] . '" 
                                title="ลบข้อมูล" onclick="return confirm(\'ต้องการจะลบข้อมูลรายชื่อ ' . $row['book_id'] . ' ' . $row['title'] .
                            ' ' . $row['title'] . '?\')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> ลบ</a>  
                                
                            <a type="button" href="edit.php?action_even=edit&book_id=' . $row['book_id'] . '" 
                                title="แก้ไขข้อมูล" onclick="return confirm(\'ต้องการจะแก้ไขข้อมูลรายชื่อ ' .
                            $row['book_id'] . ' ' . $row['title'] . ' ' . $row['author'] . '?\')" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> แก้ไข</a>
                            </td>';
                        echo "</tr>";
                    }
                } else {
                    echo '<tr><td colspan="7" class="text-center">ไม่พบข้อมูล</td></tr>';
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <footer class="mt-4 text-center text-muted">
        <small><i class="fas fa-book"></i> ระบบจัดการข้อมูลหนังสือ &copy; <?php echo date('Y'); ?></small>
    </footer>
</body>

<!-- Latest compiled JavaScript -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
    new DataTable('#example', {
        language: {
            search: "ค้นหา:",
            lengthMenu: "แสดง _MENU_ รายการ",
            info: "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
            infoEmpty: "แสดง 0 ถึง 0 จาก 0 รายการ",
            infoFiltered: "(กรองจากทั้งหมด _MAX_ รายการ)",
            paginate: {
                first: "หน้าแรก",
                last: "หน้าสุดท้าย",
                next: "ถัดไป",
                previous: "ก่อนหน้า"
            }
        }
    });
</script>

</html>
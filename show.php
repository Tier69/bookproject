<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("conn.php") ?>
    <!-- เพิ่มส่วน ใช้งาน Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=Kanit:wght@200;300&family=Prompt:wght@200;300&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Kanit', sans-serif;
            margin: 50px;
            background-color: #f0f8ff; /* สีพื้นหลังที่นุ่มนวล */
        }

        h1, h2 {
            text-align: center;
            color: #343a40;
        }

        .table {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background-color: #6c757d; /* สีของหัวตาราง */
            color: white;
        }

        .btn {
            margin: 5px;
        }

        .icon {
            font-size: 1.2em; /* ขนาดไอคอน */
        }

        .book-icon {
            color: #ff6347; /* สีของไอคอนหนังสือ */
        }

        .alert {
            text-align: center;
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลหนังสือ</title>
</head>

<body>
    <?php
    if (isset($_GET['action_even']) && $_GET['action_even'] == 'delete') {
        $id = $_GET['id'];
        $sql = "SELECT * FROM bags WHERE id=$id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $sql = "DELETE FROM bags WHERE id =$id";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success'>ลบข้อมูลสำเร็จ</div>";
            } else {
                echo "<div class='alert alert-danger'>ลบข้อมูลมีข้อผิดพลาด กรุณาตรวจสอบ !!! </div>" . $conn->error;
            }
        } else {
            echo '<div class="alert alert-warning">ไม่พบข้อมูล กรุณาตรวจสอบ</div>';
        }
    }
    ?>
    <h1>แสดงข้อมูลหนังสือ</h1>
    <h2>พัฒนาโดย นภัสกร กิตติเรืองชัย 664485028</h2>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>รหัสประจำหนังสือ</th>
                <th>ชื่อหนังสือ</th>
                <th>ผู้แต่ง</th>
                <th>ประเภทของหนังสือ</th>
                <th>ปีที่ตีพิมพ์</th>
                <th>อารมณ์ของหนังสือ</th>
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM book1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["book_id"] . "</td>";
                    echo "<td>" . $row["title"] . "</td>";
                    echo "<td>" . $row["author"] . "</td>";
                    echo "<td>" . $row["genre"] . "</td>";
                    echo "<td>" . $row["published_year"] . "</td>";
                    echo "<td>" . $row["mood"] . "</td>";
                    echo '<td>
                            <a href="show.php?action_even=del&book_id=' . $row['book_id'] . '" 
                               title="ลบข้อมูล" onclick="return confirm(\'ต้องการจะลบข้อมูลรายชื่อ ' . $row['title'] . '?\')" class="btn btn-danger btn-sm">
                               <i class="fas fa-trash-alt icon"></i> ลบ
                            </a>
                            <a href="edit.php?action_even=edit&book_id=' . $row['book_id'] . '" 
                               title="แก้ไขข้อมูล" class="btn btn-primary btn-sm">
                               <i class="fas fa-edit icon"></i> แก้ไข
                            </a>
                          </td>';
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7' class='text-center'>ไม่มีข้อมูล</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>
<?php
include('conn.php');
session_start();

if (!isset($_SESSION['user_number']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

$name = $_SESSION['user_number'];
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        rel="stylesheet" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap"
        rel="stylesheet" />
    <link rel="icon" href="heder-icon.png"
        type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />


    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Noto Kufi Arabic', serif;

            background-color: #f5f5f5;
            margin: 0px 2px 8px;
            padding: 20px;
            direction: rtl;
            text-align: start;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h2 {
            font-size: 25px;
            display: block;
            height: 55px;
            border-radius: 9px;
            background-color: rgb(11, 153, 141);
            color: rgb(255, 255, 255);
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            line-height: 55px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .button {
            padding: 10px 20px;
            background-color: rgb(11, 153, 141);
            font-size: 16px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th,
        td {
            text-align: center;
            align-items: center;
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: rgb(11, 153, 141);
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: rgba(11, 153, 141, 0.1);
        }

        .update {
            margin: 3px;
        }

        .get_serch,
        .get_location {
            text-decoration: none;
            color: rgb(11, 153, 141);
            display: block;
            text-align: center;
            margin-top: 15px;
            font-weight: 600;
            letter-spacing: -1px;
            word-spacing: -0.10cap;
        }

        .select2-selection.select2-selection--single,
        .select2-selection__rendered,
        .select2-selection__arrow {
            height: 48px !important;
        }

        .select2-selection__rendered,
        .select2-selection__arrow {
            line-height: 48px !important;
        }
    </style>

</head>

<body>
    <header style="display: flex; justify-content: space-between; align-items: center; padding: 20px; background-color: rgb(11, 153, 141); border-radius: 6px;">
        <span style="font-size: 20px; color: rgb(255, 255, 255); font-weight: bold;">أهلاً بك: <strong><?php echo $name; ?></strong></span>
        <div style="text-align: right; font-size: 16px; color: rgb(255, 255, 255);">
            <a href="logout.php" class="logout-button" style="font-size: 16px; color: rgb(255, 255, 255); font-weight: bold;">
                <i class="bi bi-door-closed" style="font-size: x-large; color: rgb(56, 39, 39);"></i> تسجيل الخروج
            </a>
        </div>
    </header>

    <div class="overflow-auto w-100" style="height: 400px;">
        <table id="lessons-table" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="position: sticky; top: 0; z-index: 10;">#</th>
                    <th style="position: sticky; top: 0; z-index: 10;">عنوان الرابط</th>
                    <th style="position: sticky; top: 0; z-index: 10;">الإجراءات</th>
                    <th style="position: sticky; top: 0; z-index: 10;">الملاحظات</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    <?php
    /*                 if ($rows->num_rows > 0) {
                    while ($row = $rows->fetch_assoc()) {
                        echo '
              <tr>
                  <td>' . $row['id'] . '</td>
                  <td>' . $row['location'] . '</td>
                  <td>' . $row['day'] . '</td>
                  <td>' . $row['ders_tame'] . '</td>
                  <td>' . $row['book'] . '</td>
                  <td>' . $row['teacher'] . '</td>
                  <td>' . $row['notes'] . '</td>
                  <td>
                      <div class="d-flex justify-content-center gap-2 align-items-center">
                          <a class="btn py-2 btn-primary update" href="update.php?id=' . $row['id'] . '">
                              <i class="bi bi-pencil-square"></i>
                          </a>
                          <a class="btn py-2 btn-danger" href="delet.php?id=' . $row['id'] . '" onclick="return confirmDelete();">
                              <i class="bi bi-trash"></i>
                          </a>
                      </div>
                  </td>
              </tr>
              ';
                    }
                } else {
                    echo '
            <tr>
              <td colspan="8">لا توجد بيانات</td>
            </tr>
            ';
                } */ ?>
    </tbody>
    </table>
    </div>
</body>

</html>
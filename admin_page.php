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
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المدير العام</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Noto Kufi Arabic', serif;
        }

        :root {
            --sidebar-width: 280px;
        }

        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            right: -280px;
            top: 0;
            background: #2c3e50;
            color: white;
            z-index: 1000;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar.show {
            right: 0;
        }

        .main-content {
            transition: all 0.3s;
        }

        .navbar {
            background-color: #2c3e50 !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            color: white;
        }

        .user-profile {
            background-color: #2c3e50;
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .user-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #3498db;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            margin: 0 auto 15px;
        }

        .table th,
        .table td {
            border-left: 1px solid #ddd;
            text-align: center;
        }

        .table th:last-child,
        .table td:last-child {
            border-left: none;
        }

        #toggle-sidebar {
            position: fixed;
            right: 10px;
            top: 15px;
            z-index: 1100;
        }

        .table th,
        .table td {
            text-align: center;
        }

        .table th:last-child,
        .table td:last-child {
            border-left: none;
        }

        .table th,
        .table td {
            border-left: 1px solid #ddd;
        }

        .table th:last-child,
        .table td:last-child {
            border-left: none;
        }

        .table th,
        .table td {
            border-left: 1px solid #ddd;
        }

        .table th:last-child,
        .table td:last-child {
            border-left: none;
        }

        .table th,
        .table td {
            border-left: 1px solid #ddd;
        }

        .table th:last-child,
        .table td:last-child {
            border-left: none;
        }

        th {
            background-color: #2c3e50 !important;
            color: white !important;
        }

        .btn-group button {
            margin: 0 5px;
        }

        th:last-child,
        td:first-child {
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        th:first-child,
        td:last-child {
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .nav-link {
            color: #ddd;
        }

        .nav-link:hover {
            color: aqua;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="btn btn-light" id="toggle-sidebar">
                <i class="bi bi-list"></i>
            </button>
            <div class="ms-auto d-flex align-items-center">
                <div class="d-flex align-items-center me-3">
                    <div class="user-avatar me-2" style="width: 40px; height: 40px; font-size: 1.2rem;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <h6 class="mb-0">اسم المستخدم</h6>
                </div>
            </div>
            <button class="btn btn-danger btn-sm ms-auto">
                <i class="bi bi-door-open-fill me-1"></i>
                تسجيل الخروج
            </button>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="user-profile">
            <div class="user-avatar">
                <i class="bi bi-person-fill"></i>
            </div>
            <h5 class="mb-2">اسم المستخدم</h5>
        </div>
        <ul class="nav flex-column mt-3">
            <li class="nav-item">
                <a class="nav-link" href="profile.php">
                    <i class="bi bi-people-fill ms-2"></i>
                    الملف الشخصي
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="admin_page.php">
                <i class="bi bi-link-45deg ms-2"></i>
                    الروابط العامة 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="admin_page.php">
                <i class="bi bi-link-45deg ms-2"></i>
                    الروابط الخاصة 
                </a>
            </li>
            </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="bi bi-door-open-fill me-1"></i>
                    تسجيل الخروج
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid mt-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th width="80">#</th>
                                    <th>عنوان الرابط</th>
                                    <th width="300">الإجراءات</th>
                                    <th>الملاحظات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>https://example.com</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-success btn-sm" title="نسخ">
                                                <i class="bi bi-clipboard"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm" title="فتح">
                                                <i class="bi bi-box-arrow-up-right"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>ملاحظة تجريبية</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleButton = document.getElementById('toggle-sidebar');

        toggleButton.addEventListener('click', function() {
            if (sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
                toggleButton.style.right = '10px';
            } else {
                sidebar.classList.add('show');
                toggleButton.style.right = '290px';
            }
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
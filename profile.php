<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الملف الشخصي</title>
    <!-- إضافة روابط Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<!-- بوكس العرض باستخدام الـ Grid system من Bootstrap -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center mb-4">الملف الشخصي</h2>

                    <!-- قسم اسم المستخدم -->
                    <div class="mb-3">
                        <label for="username" class="form-label">اسم المستخدم:</label>
                        <span id="username" class="form-control">اسم المستخدم هنا</span>
                    </div>

                    <!-- قسم الرقم في المؤسسة -->
                    <div class="mb-3">
                        <label for="employeeNumber" class="form-label">رقم المستخدم في المؤسسة:</label>
                        <span id="employeeNumber" class="form-control">رقم المستخدم هنا</span>
                    </div>

                    <!-- قسم كلمة المرور -->
                    <div class="mb-3">
                        <label for="password" class="form-label">كلمة المرور:</label>
                        <span id="password" class="form-control">كلمة المرور هنا</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- إضافة رابط لملف JavaScript الخاص بـ Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0I1DX5D5oYcx61Qk/eYwF8zA5uXKdfh3enb3zYjI7C5qvOg5" crossorigin="anonymous"></script>
</body>
</html>
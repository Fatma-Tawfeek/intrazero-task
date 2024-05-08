<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f4;
        }

        .button-container {
            text-align: center;
        }

        .button-container button {
            display: block;
            margin: 0 auto 10px auto;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button-container button:hover {
            background-color: #ddd;
        }

        .admin-btn {
            background-color: #007bff;
            color: #fff;
        }

        .tutor-btn {
            background-color: #28a745;
            color: #fff;
        }

        .student-btn {
            background-color: #ffc107;
            color: #333;
        }

        .button-container button i {
            margin-right: 5px;
        }
    </style>
</head>
<body>

<div class="button-container">
    <button class="admin-btn" onclick="loginAsAdmin()"><i class="fas fa-user-shield"></i>Login as Admin</button>
    <button class="tutor-btn" onclick="loginAsTutor()"><i class="fas fa-chalkboard-teacher"></i>Login as Tutor</button>
    <button class="student-btn" onclick="loginOrRegisterAsStudent()"><i class="fas fa-user-graduate"></i>Login/Register as Student</button>
</div>

<script>
    function loginAsAdmin() {
        window.location.href = "{{ route('admin.get.login') }}";
    }

    function loginAsTutor() {
        // Add login as tutor functionality
        alert("Logging in as tutor...");
    }

    function loginOrRegisterAsStudent() {
        // Add login/register as student functionality
        alert("Logging in/registering as student...");
    }
</script>

</body>
</html>

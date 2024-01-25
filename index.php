<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        * {
            font-family: Montserrat;
        }
        .container .position-absolute {
            box-shadow: 15px 15px 10px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <?php
        if (isset($_GET['message'])) {
            if ($_GET['message'] == 'notfound') {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Theres something wrong with your credentials',
                });
                </script>";
            }
        }
    ?>
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="row g-0 bg-body-secondary position-relative">
                <div class="col-md-6 mb-md-0 p-md-4">
                    <img src="https://media.discordapp.net/attachments/1065122549253558313/1199998108336132126/img22.png?ex=65c49453&is=65b21f53&hm=e0697ff718a5034e26b2a0cdea9b91d061b9dd9b4abb131c40b72c056d87dc3e&=&format=webp&quality=lossless&width=593&height=593" class="w-100" alt="...">
                </div>
                <div class="col-md-6 p-4 ps-md-0">
                    <h3 class="mt-0">Login Dashboard</h3>
                    <form method="POST" action="loginValidation.php" >
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username"  aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div id="passwordHelpBlock" class="form-text">
                                
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const passwordInput = document.getElementById('password');

        const validationMessage = document.getElementById('passwordHelpBlock');
    
        passwordInput.addEventListener('input', validatePassword);
    
        function validatePassword() {
            const password = passwordInput.value;
    
            let hasLetter = false;
            let hasDigit = false;
            let hasSpecialChar = false;
    
            for (let i = 0; i < password.length; i++) {
                const char = password[i];
    
                if (/[a-zA-Z]/.test(char)) {
                    hasLetter = true;
                } else if (/\d/.test(char)) {
                    hasDigit = true;
                } else if (/[@$!%*?&]/.test(char)) {
                    hasSpecialChar = true;
                }
            }
    
            if (password.length === 0) {
                passwordInput.classList.remove('is-invalid');
                validationMessage.textContent = '';
            } else if (hasLetter && hasDigit && hasSpecialChar) {
                passwordInput.classList.remove('is-invalid');
                validationMessage.textContent = '';
            } else {
                passwordInput.classList.add('is-invalid');
                validationMessage.textContent = 'Your password must be 8-20 characters long, contain letters, numbers, and at least one special character (@, $, !, %, *, ?, or &).';
            }
        }
        function notifyAlert() {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Something went wrong!",
                footer: '<a href="#">Why do I have this issue?</a>'
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

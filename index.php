<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="assets/css/style.css">

    <title>Login Registrasi</title>

</head>

<body class="login-page">


    <div class="login-box">


        <h2>LOGIN</h2>


        <form action="login.php" method="POST">


            <label>Username</label>

            <input type="text" name="username" required>



            <label>Password</label>

            <input type="password" name="password" required>



            <button type="submit">
                LOGIN
            </button>

            <br><br>

            <a href="pengunjung.php">

                <button type="button">
                    Pengunjung
                </button>

            </a>


        </form>


    </div>


</body>

</html>
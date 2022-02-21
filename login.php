<html>

<head>
    <<title>Login Page
        </title>
        <style type="text/css">
            body {
                margin: 0;
                padding: 0;
                background-color: #6abadeba;
                font-family: 'Arial';
            }

            .login {
                width: 382px;
                overflow: hidden;
                margin: auto;
                margin: 20 0 0 450px;
                padding: 80px;
                background: #23463f;
                border-radius: 15px;

            }

            h2 {
                text-align: center;
                color: #277582;
                padding: 20px;
            }

            label {
                color: #08ffd1;
                font-size: 17px;
            }

            #Uname {
                width: 300px;
                height: 30px;
                border: none;
                border-radius: 3px;
                padding-left: 8px;
            }

            #Pass {
                width: 300px;
                height: 30px;
                border: none;
                border-radius: 3px;
                padding-left: 8px;

            }

            #log {
                width: 300px;
                height: 30px;
                border: none;
                border-radius: 17px;
                padding-left: 7px;
                color: blue;


            }

            span {
                color: white;
                font-size: 17px;
            }

            a {
                float: right;
                background-color: grey;
            }
        </style>
</head>

<body>
<h2>Login Page</h2><br>    
    <div class="login">  
    <form id="login" method="post">
    <label><b>email</b></label><br/>
    <input type="text" id="Uname" name="email"> <br /><br />
    <label><b>password</b></label><br/>
    <input type="text" id="pass" name="pass"> <br /><br />

        <input type="submit" value="Login" id="log" name="Login" />
</body>

</html>
<?php
if (isset($_POST['Login'])) {
    $semail = $_POST['emai'];
    $spass = $_POST['pass'];

    include "includecon.php";

    $sql = "Select * from student where email='$semail' and password='$spass'";
    $query = mysqli_query($con, $sql) or die("Error in Query");
    $rows = mysqli_num_rows($query);

    if ($rows > 0) {
        session_start();
        $_SESSION['email'] = $semail;
        header('Location:selecttable.php');
        //echo "Login Success";

    } else {
        echo "Incorrect Username or password";
    }


    mysqli_close($con);
}
?>
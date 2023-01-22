<?php 
    session_start();
    require_once('connect.php');
    if(isset($_SESSION["email"])) {
        header('Location:dashboard.php');
        exit();
    }

    if(!isset($_SESSION["email"]) && !isset($_POST['email'])) {
        ?>
                <!doctype html>
                <html lang="en">
                <head>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <link rel="stylesheet" href="./resources/bootstrap/css/bootstrap.min.css">
                        <style>
                            body{
                                height: 100vh;
                                width: 100vw;
                            } 
                        </style>
                        <title>Escolarite Admin</title>
                    </head>
                <body>
                <div class="container h-100 w-100 d-flex">
                            <div class="col col-6 bg-light p-5 m-auto">
                            <span class="bg-dark text-xl row mb-5 text-white text-center justify-content-center fw-bold fs-3">ESCOLARITE ADMIN</span>
                            <div class="my-3">
                            <?php
                                if(isset($_SESSION["error"]))  {
                                ?>
                                <button type="button" class="btn btn-danger w-100 btn-block p-3" id="error" name="error" ><?php echo $_SESSION["error"]; ?></button>
            
                                <?php
                                }
                                ?>
                            </div>
                            <form action="/admin.php" method="POST">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <button type="submit" class="btn btn-success my-3 w-100 btn-block">GO TO DASHBOARD</button>
                            </form>
                            </div>
                        </div>
                    <script src="./resources/bootsrap/js/bootstrap.min.js"></script>
    
                        
                </body>
                </html>
        <?php
        exit();
        }
        else if(isset($_POST["email"]) && isset($_POST["password"])) {
                $email = $_POST["email"];
                $password = $_POST["password"];
                try {
                    $statement = $conn->prepare("SELECT * FROM admins WHERE email = :email AND password = :password");
                    $statement->execute(array('email' => $email, 'password' => $password));
                    if($statement->rowCount() == 1){
                        $_SESSION["email"] = $email;
                        header('Location:dashboard.php');
                        exit();
                    }
                    $_SESSION["error"] = "User Not Found!";
                    header('Location:/admin.php');
                    exit();
                } catch (Exception $e) {
                    $_SESSION["error"] = "Could Not Find Admin Account :  " . $e->getMessage();
                    header('Location:/admin.php');
                    exit();
                }
            }
            $_SESSION["error"] = "Not Enought Post Request Arguments!";
            header('Location:/admin.php');
            exit();
            //exit(var_dump($_POST));
        
?>
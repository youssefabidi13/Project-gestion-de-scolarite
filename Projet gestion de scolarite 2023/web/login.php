<?php 
    require_once('connect.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST["email"]) && isset($_POST["apoge"]) && isset($_POST["cin"])) {
            $email = $_POST["email"];
            $apoge = $_POST["apoge"];
            $cin = $_POST["cin"];
            if(empty($email)) {
                
                exit("You must enter your Email");
                
                
            }
            if(empty($apoge)) {
                exit("You must enter your Apoge");
                
            }
            
            if(empty($cin)) {
                exit("You must enter your CIN");
                
            }
            try {
            $statement = $conn->prepare("SELECT * FROM etudiants WHERE email = :email AND cin = :cin AND apoge = :apoge");
            $statement->execute(array('email' => $email, 'cin' => $cin, 'apoge' => $apoge));
            if($statement->rowCount() == 1){
                setcookie('email', $email, time()+3600*24, '/');
                $_COOKIE['email'] = $email;
                setcookie('cin', $cin, time()+3600*24, '/');
                $_COOKIE['cin'] = $cin;
                setcookie('apoge', $apoge, time()+3600*24, '/');
                $_COOKIE['apoge'] = $apoge;
                $result = $statement->fetch();
                $filiere = array(0 => $result['Filiere']);
                setcookie('filiere', json_encode($filiere), time()+3600*24, '/');
                $_COOKIE['filiere'] = $filiere;
                setcookie('etudiant', $result['id'], time()+3600*24, '/');
                $_COOKIE['etudiant'] = $result['id'];
                exit("success");
                
            }
            else{
                exit("Email, CIN and Apoge are not found");
                
        }
    } catch (Exception $e) {
        exit($e);
    }
}
    exit("not enough post data " . var_dump($_POST));
}
    exit("we need email, apoge and cin");
?>
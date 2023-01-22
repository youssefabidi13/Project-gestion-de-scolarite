<?php 
    require_once('connect.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST["id"])) {
            $id = $_POST["id"];
            if(empty($id)) {
                exit("Could Not Fetch Student Notes");
            }
            $statement = $conn->prepare("SELECT * FROM notes WHERE id_etudiant = :id");
            $statement->execute(array('id' => $id));
            if($statement->rowCount() > 0){
                try {
                    $result = $statement->fetchAll();
                    if(empty($result)) {
                        exit("0 User Note Results!");
                    }
                    $data = array();
                    foreach ($result as $row) {
                        array_push($data, $row['Filiere']);
                    }
                    setcookie('notes', json_encode($data), time()+3600*24, '/');
                    $_COOKIE['notes'] = json_encode($data);
                    exit("success");
                }catch(Exception $e) {
                    exit("error" . $e);
                }
        }
        exit("Filieres Not Found!");
    }
    exit("not enough post data " . var_dump($_POST));
    }
    exit("please use a post request!");
    ?>
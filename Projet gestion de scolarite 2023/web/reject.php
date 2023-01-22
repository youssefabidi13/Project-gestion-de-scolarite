<?php 
    require_once('connect.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST["id"])) {
            $id = $_POST["id"];
            
            if(empty($id)) {
                exit("You must send the document ID");
                
            }
            try {
                $statement = $conn->prepare("UPDATE demandes SET status =  :status WHERE id = :id");
                $statement->execute(array('status' => 'refuse', 'id' => $id));
                if($statement->rowCount() == 1){
                    exit("success");
                }
                exit("failed!");
            } catch (Exception $e) {
                exit("Error :  " . $e->getMessage());
            }

        }
        exit("attach document id in post request thanks!");
    }
    exit("we need post data!");
?>
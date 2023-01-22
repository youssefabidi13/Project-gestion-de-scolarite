<?php 
    require_once('connect.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST["notes"])) {
            $releve = $_POST["notes"];
            $etudiant = $_COOKIE["etudiant"];
            $email = $_COOKIE["email"];
            $apoge = $_COOKIE["apoge"];
            $cin = $_COOKIE["cin"];
            if(empty($releve)) {
                exit("You must enter filiere!");
                
            }
            if(empty($email)) {
                
                exit("Email Not Valid!");
                
                
            }
            if(empty($apoge)) {
                exit("Apoge Not Valid!");
                
            }
            
            if(empty($cin)) {
                exit("CIN Not Valid!");
                
            }
            if(empty($etudiant)) {
                exit("You must have an etudiant id!");
                
            }
            try {
                // added
                $statement = $conn->prepare("SELECT * FROM etudiants WHERE id = :etudiant");
                $statement->execute(array('etudiant' => $etudiant));
                if($statement->rowCount() == 1) {
                    $result = $statement->fetch();
                    if($result["did_req_notes"] == "true") {
                        exit("Already Requested This Type Of Document");
                    }
                }
                // end added
                $statement = $conn->prepare("INSERT INTO documents (type_doc) VALUES (:type_doc)");
                $statement->execute(array('type_doc' => "Releve De Notes"));
                if($statement->rowCount() == 1){
                    try {
                        $statement = $conn->prepare("INSERT INTO demandes (id_etd, id_docum, date_demande, status, apogée, type, Filiere) VALUES (:id_etd, :id_docum, :date_demande, :status, :apoge, :type, :filiere)");
                        $statement->execute(array('id_etd' => $etudiant, 'id_docum' => $conn->lastInsertId(),'date_demande' => date("Y-m-d"), 'status' => 'Non traite', 'apoge' => $apoge, 'type' => 'releve', 'filiere' => $releve));
                        if($statement->rowCount() == 1){
                            $statement = $conn->prepare("UPDATE etudiants SET did_req_notes = :status WHERE id = :id");
                            $statement->execute(array('status' => true, 'id' => $etudiant));
                            if($statement->rowCount() == 1){
                                exit("success");
                            }
                            exit("failed!");
                        }
                        exit("Demande Not Inserted!");
                    } catch (Exception $e) {
                        exit("Could Not Insert Into Demandes Table :  " . $e->getMessage());
                    }
                }
                exit("Document Not Inserted!");
            } catch (Exception $e) {
                exit("Could Not Insert Into Documents Table :  " . $e->getMessage());
            }

        }
        exit("not enough post data " . var_dump($_POST));
    }
    exit("we need post data!");
?>
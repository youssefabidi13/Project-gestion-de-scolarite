<?php 
    require_once('connect.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['debut']) && isset($_POST['fin']) && isset($_POST['filiere']) && isset($_POST['entreprise']) && isset($_POST['type'])) {
            $debut = $_POST["debut"];
            $fin = $_POST["fin"];
            $filiere = $_POST["filiere"];
            $type = $_POST["type"];
            $entreprise = $_POST["entreprise"];
            $etudiant = $_COOKIE["etudiant"];
            $email = $_COOKIE["email"];
            $apoge = $_COOKIE["apoge"];
            $cin = $_COOKIE["cin"];
            if(empty($debut)) {
                
                exit("You must enter the start date!");
                
                
            }
            if(empty($fin)) {
                exit("You must enter the end date!");
                
            }
            
            if(empty($filiere)) {
                exit("You must enter your filiere!");
                
            }

            if(empty($type)) {
                exit("You must enter votre type de stage!");
                
            }
            if(empty($entreprise)) {
                exit("You must enter enterprise name!");
                
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
                    if($result["did_req_conv"] == "true") {
                        exit("Already Requested This Type Of Document");
                    }
                }
                // end added
                $statement = $conn->prepare("INSERT INTO documents (type_doc) VALUES (:type_doc)");
                $statement->execute(array('type_doc' => "Convention de stage"));
                if($statement->rowCount() == 1){
                    try {
                        $statement = $conn->prepare("INSERT INTO demandes (id_etd, id_docum, date_demande, status, apogée, type, nomEntre, dateDebut, dateFin, typeDeStage ,Filiere) VALUES (:id_etd, :id_docum, :date_demande, :status, :apoge, :type, :entreprise, :dateDebut, :dateFin, :typeDeStage, :filiere)");
                        $statement->execute(array('id_etd' => $etudiant, 'id_docum' => $conn->lastInsertId(),'date_demande' => date("Y-m-d"), 'status' => 'Non traite', 'apoge' => $apoge, 'type' => 'convention', 'entreprise' => $entreprise ,'dateDebut' => $debut, 'dateFin' => $fin, 'typeDeStage' => $type,'filiere' => $filiere));
                        if($statement->rowCount() == 1){
                            $statement = $conn->prepare("UPDATE etudiants SET did_req_conv = :status WHERE id = :id");
                            $statement->execute(array('status' => "true", 'id' => $etudiant));
                            if($statement->rowCount() == 1){
                                exit("success");
                            }
                            exit("failed!");
                        }
                        exit("Demande Not Inserted!");
                    }
                    catch (Exception $e) {
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
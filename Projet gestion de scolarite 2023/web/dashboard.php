<?php 
    session_start();
    if(!isset($_SESSION["email"])) {
        header('Location:admin.php');
        exit();
    }
    require_once('connect.php');
    if(isset($_SESSION['email'])) {
        $statement = $conn->prepare("SELECT * FROM demandes");
        $statement->execute();
        if($statement->rowCount() > 0){
            $result = $statement->fetchAll();
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
                    <div class="col bg-light p-5 m-auto">
                    <div class="d-flex mb-3">
                        <button type="button" id="reject" class="btn btn-danger btn-block w-50" >REFUSER</button>
                        <button type="button" id="approve" class="btn btn-success btn-block w-50" >ACCEPTER</button>
                    </div>
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>SELECT</th>
                                <th>
                                    Id
                                </th>
                                <th>
                                    EtudiantId
                                </th>
                                <th>
                                    documentId
                                </th>
                                <th>
                                    Date Demande
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Apogee
                                </th>
                                <th>
                                    Type
                                </th>
                                <th>
                                    Entreprise
                                </th>
                                <th>
                                    Date Debut
                                </th>
                                <th>
                                    Date Fin
                                </th>
                                <th>
                                    Stage
                                </th>
                                <th>
                                    Filiere
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($result as $row) {
                        ?>
                        <tr>
                            <td>
                                <?php
                                if($row["status"] == "Non traite") {
                                    ?>
                                    <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="<?php print_r($row['id']); ?>" id="<?php print_r($row['id']); ?>">
                                </div>
                                    <?php
                                }
                                ?>
                            </td>
                                <td>
                                    <?php print_r($row['id']);  ?>
                                </td>
                                <td>
                                    <?php print_r($row['id_etd']);  ?>
                                </td>
                                <td>
                                    <?php print_r($row['id_docum']);  ?>
                                </td>
                                <td>
                                    <?php print_r($row['date_demande']);  ?>
                                </td>
                                <td>
                                    <?php print_r($row['status']);  ?>
                                </td>
                                <td>
                                    <?php print_r($row['apogée']);  ?>
                                </td>
                                <td>
                                    <?php print_r($row['type']);  ?>
                                </td>
                                <td>
                                    <?php print_r($row['nomEntre']);  ?>
                                </td>
                                <td>
                                    <?php print_r($row['dateDebut']);  ?>
                                </td>
                                <td>
                                    <?php print_r($row['dateFin']);  ?>
                                </td>
                                <td>
                                    <?php print_r($row['typeDeStage']);  ?>
                                </td>
                                <td>
                                    <?php print_r($row['Filiere']);  ?>
                                </td>

                           </tr>
            
                        
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script src="./resources/bootsrap/js/bootstrap.min.js"></script>
        <script src="./dashboard.js" defer></script>
        
                
        </body>
    </html>
<?php 
        }
    }
?>
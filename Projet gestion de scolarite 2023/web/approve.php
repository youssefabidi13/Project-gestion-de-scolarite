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
                $statement->execute(array('status' => 'accepte', 'id' => $id));
                if($statement->rowCount() == 1){
                    try {
                        $result = $statement->fetch();

                        $to = $result["email"];
                        $subject = 'Your ' . $result["type"];

                        $message = "
                        <html>
                        <head>
                        <title>" . $subject . "</title>
                        </head>
                        <body>
                        <p>This email contains HTML Tags!</p>
                        <table>
                        <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        </tr>
                        <tr>
                        <td>John</td>
                        <td>Doe</td>
                        </tr>
                        </table>
                        </body>
                        </html>
                        ";

                        // Always set content-type when sending HTML email
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        // More headers
                        $headers .= 'From: <webmaster@example.com>' . "\r\n";
                        //$headers .= 'Cc: myboss@example.com' . "\r\n";

                        mail($to,$subject,$message,$headers);
                    } catch (Exception $e) {
                        exit("Error :  " . $e->getMessage());
                    }
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
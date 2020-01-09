<?php
// Allow from any origin
if (isset($_SERVER['HTTP_ORIGIN'])) {
    // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
    // you want to allow, and if so:
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        // may also be using PUT, PATCH, HEAD etc
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

require_once 'connexion_bdd.php';

// fonction pour récuperer le pseudo, mdp et  le type qui correspond à utilisateur qui se log 




function logapp(){
    global $conn;

    
    $data = json_decode(file_get_contents("php://input"),true);
    $action = $data['action'];
    // Login section
    if ($action === 'login') {
        
        $pseudo = $data['pseudo'];
        $mdp = $data['mdp'];
        
        $query = "SELECT id_utilisateur, type FROM utilisateur WHERE pseudo = '".$pseudo."'  AND mdp = '".$mdp."'";
        //A dummy credential match.. you should have some SQl queries to match from databases
        if (mysqli_query($conn, $query)) {
            
            $result= mysqli_query($conn, $query);
            $response = mysqli_fetch_assoc($result);
            
            $data_insert = array(
                
                'id'  =>  $response['id_utilisateur'],
                'type' => $response['type'],
                
                'status' => "success",
                'message' => "Successfully Logged In"
            );
        } else {
            $data_insert = array(
                "data" => "0",
                "status" => "invalid",
                "message" => "Invalid Request"
            );
        }
        header('Content-Type: application/json');
        echo json_encode($data_insert);
    }
}

logapp();
    
    
?>

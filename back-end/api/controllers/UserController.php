<?php


class UserController //UtilisateurController
{

    public function addUser() //ajouterUtil
    {
        header('Access-Control-Allow-Origin: *'); //for cross-domain AJAX requests
        header('Content-Type: application/json');   //for JSON response
        header('Access-Control-Allow-Methods: POST');   //for POST request
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');    //for headers
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            return false;
        }
        $data = json_decode(file_get_contents("php://input"));  //for getting data from AJAX request
        $user = new User(); 
        $ref = $this->nbru($data->lastname);    //for getting the last id of the user
        $user->setReference($ref);  //for setting the reference of the user
        $user->setFirstName($data->firstname);  //for setting the first name of the user
        $user->setLastName($data->lastname);    //for setting the last name of the user
        $user->setAge($data->age);  //for setting the age of the user
        $tab = array("reference" => $ref,   "firstname" => $data->firstname, "lastname" => $data->lastname, "age" => $data->age);   
        $user->addUser($tab);
        echo json_encode($tab); //for sending the data to the AJAX request
    }


    public function nbru($lastname)      
    {
        $user = new User();
        $nb = $user->count();
        $ran = rand();
        return $lastname . $nb['nb'] . $ran;
    }

    public function Signin($ref)
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: GET');
        $user = new User();
        $user->setReference($ref);
        $u = $user->Signin($ref);
        echo json_encode($u);
    }
}
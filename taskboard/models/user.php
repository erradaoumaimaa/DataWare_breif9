<?php

class user{
    public static function login($data){
       
        $email_user = $data['email_user'];
        try{
            $query = 'SELECT * FROM users WHERE email_user=:email_user';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":email_user"=>$email_user));
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            return $user;
            if($stmt->execute()){
                return 'ok';
            } 
        }catch(PDOException $ex){
            echo 'error' . $ex->getMessage();
        }
    }
    
    static public function createUser($data){
        try {
            $stmt = DB::connect()->prepare('INSERT INTO users (email_user, password_user, name_user)
                VALUES (:email_user, :password_user, :name_user)');
            $stmt->bindParam(':email_user', $data['email_user']);
            $stmt->bindParam(':password_user', password_hash($data['password_user'], PASSWORD_DEFAULT));
            $stmt->bindParam(':name_user', $data['name_user']);
    
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        } catch (PDOException $ex) {
            echo 'error' . $ex->getMessage();
        }
    }    
}

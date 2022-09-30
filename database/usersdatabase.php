<?php

class UsersDatabase{
// creater user
public static function create($user)
{
    try
    {
        $bdd =connectionDB();
        $insertUser = $bdd->prepare('INSERT INTO users(pseudo, nom, prenom, mdp)
        VALUES(:pseudo,:nom, :prenom,:mdp)');
        // le mot de passe est crypté par une méthode plus résistante que le simple MD5()
        $insertUser->execute(['pseudo'=>$user->getPseudo(),'nom'=>$user->getNom(),
        'prenom'=>$user->getPrenom(), 'mdp'=>password_hash($user->getMdp(),PASSWORD_DEFAULT)]);
    }
    catch(PDOException $e){
        die('Une erreur PDO a été trouvée : ' . $e->getMessage());
    }
}
// read user
public static function read($id):Users
{
    try
    {
        $bdd = connectionDB();
        $readAnswer = $bdd->prepare('SELECT * FROM users where id=:id');
        $readAnswer->execute(['id'=>$id]);
        $data= $readAnswer->fetch();
        $user = new Users($data['id'],$data['pseudo'],$data['nom'],$data['prenom'],$data['mdp']);
        return $user;
    }
    catch(PDOException $e){
        die('Une erreur PDO a été trouvée : ' . $e->getMessage());
    }
}

public static function chargerAvecPseudo($pseudo)
{
    try
    {
        $bdd = connectionDB();
        $readAnswer = $bdd->prepare('SELECT * FROM users where pseudo=:pseudo');
        $readAnswer->execute(['pseudo'=>$pseudo]);
        $data= $readAnswer->fetch();
        if ($data)
            {
                $user = new Users($data['id'],$data['pseudo'],$data['nom'],$data['prenom'],$data['mdp']);
            return $user;
            }
        return false;
    }
    catch(PDOException $e){
        die('Une erreur PDO a été trouvée : ' . $e->getMessage());
    }
}
public static function connexion($pseudo,$motdepasse)
{
    $user = UsersDatabase::chargerAvecPseudo($pseudo);
    if ($user)
    {
        if (password_verify($motdepasse,$user->getMdp()))
            return $user;
        else
        return false;
    }
    else
    return false;

}

}
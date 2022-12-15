<?php

namespace App\Model;
use App\Database\Database;

class HomeModel
{
    private object $mdb;

    public function __construct()
    {
        $this->mdb = new Database();
    }

    public function insertContact(array $contact,string $url_img_profile): bool
    {
        $stmt = $this->mdb->db()->prepare("INSERT INTO contact (coct_name,
                                                        coct_last_name,
                                                        coct_age,
                                                        coct_email,
                                                        coct_description,
                                                        coct_url_img_profile) VALUES (?,?,?,?,?,?)");
        $stmt->bindParam(1,$contact['name']);
        $stmt->bindParam(2,$contact['lastName']);
        $stmt->bindParam(3,$contact['age']);
        $stmt->bindParam(4,$contact['email']);
        $stmt->bindParam(5,$contact['description']);
        $stmt->bindParam(6,$url_img_profile);
        return $stmt->execute();
    }

    public function getAllContacts(){
        $result = $this->mdb->db()->query('SELECT coct_id_contact,
                                                            coct_name,
                                                            coct_last_name,
                                                            coct_age,
                                                            coct_email,
                                                            coct_description,
                                                            coct_url_img_profile
                                            FROM contact');
        return $result->fetchAll($this->mdb->db()::FETCH_ASSOC);
    }

    public function getContactImg($id_contact){
        $stmt = $this->mdb->db()->prepare('SELECT coct_url_img_profile FROM contact WHERE coct_id_contact = ?');
        $stmt->bindParam(1,$id_contact);
        $stmt->execute();
        return $stmt->fetchAll($this->mdb->db()::FETCH_ASSOC);
    }

    public function deleteContact($id_contact): bool
    {
        $stmt = $this->mdb->db()->prepare("DELETE FROM contact where coct_id_contact = ?");
        $stmt->bindParam(1,$id_contact);
        return $stmt->execute();
    }

    public function getContact($id_contact){
        $stmt = $this->mdb->db()->prepare("SELECT coct_id_contact,
                                                            coct_name,
                                                            coct_last_name,
                                                            coct_age,
                                                            coct_email,
                                                            coct_description,
                                                            coct_url_img_profile
                                            FROM contact where coct_id_contact = ?");
        $stmt->bindParam(1,$id_contact);
        $stmt->execute();
        return $stmt->fetchAll($this->mdb->db()::FETCH_ASSOC);
    }

    public function editCliente($contact,$id_client)
    {

        $stmt = $this->mdb->db()->prepare("UPDATE contact SET 
                                                        coct_name = ?,
                                                        coct_last_name = ?,
                                                        coct_age = ?,
                                                        coct_email = ?,
                                                        coct_description = ?
                                                       WHERE coct_id_contact =  ?");
        $stmt->bindParam(1,$contact['name']);
        $stmt->bindParam(2,$contact['lastName']);
        $stmt->bindParam(3,$contact['age']);
        $stmt->bindParam(4,$contact['email']);
        $stmt->bindParam(5,$contact['description']);
        $stmt->bindParam(6,$id_client);

        return $stmt->execute();
    }


}
<?php

namespace App\Controller;

use App\Model\HomeModel;
use EasyProjects\SimpleRouter\Request as Request;
use EasyProjects\SimpleRouter\Response as Response;

class HomeController
{
    public function index(){

        $contacts = new HomeModel();
        $data['contacts'] = $contacts->getAllContacts();
        view('home',$data);
    }

    public function create(){
        view('create');
    }

    public function store(Request $request, Response $response){

        $client = (array)$request->body;
        $url_img_profile = saveFile((array)$request->files->file,'assets/img/',["jpg", "jpeg", "png", "gif", "PNG", "JPG", "JPEG"]);
        $HomeModel = new HomeModel();
        ($HomeModel->insertContact($client,$url_img_profile)) ? $response->status(200)->send(['data' => 'It was inserted the contact successfully'])
                                                                : $response->status(400)->send(['data' => 'Error inserting data']);
    }

    public function destroy(Request $request, Response $response){

        $id_contact = $request->params->id;
        $homeModel = new HomeModel();
        $img = $homeModel->getContactImg($id_contact)[0]['coct_url_img_profile'];

        if ($homeModel->deleteContact($id_contact)){
            if(!empty($img)){
                unlink('assets/img/'.$img);
            }
            $response->status(200)->send(['data' => 'The contact was deleted successfully']);
        }
        $response->status(400)->send(['Error deleting the contact']);
    }

    public function edit(Request $request){

        $data['id_contact'] = $request->params->id;

        $homeModel = new HomeModel();
        $data['contact'] = $homeModel->getContact($request->params->id);
        view('edit',$data);
    }

    public function update(Request $request, Response $response){

        $id_client = $request->params->id;
        $contact = (array)$request->body;

        $homeModel = new HomeModel();

        ($homeModel->editCliente($contact,$id_client)) ? $response->status(200)->send(['data' => 'It was inserted the contact successfully'])
            : $response->status(400)->send(['data' => 'Error inserting data']);
    }

}
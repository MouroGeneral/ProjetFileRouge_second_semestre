<?php

namespace Mouro\Controller;
use Mouro\Core\Controller;
use Mouro\Models\CategorieVente;
class CategorieVenteController extends Controller
{
    public function create()
    {

    }
    public function store()
    {

    }
    public function index()
    {
        $data = CategorieVente::all();
        $page=1;
        if(isset($_GET['page'])) {
            $page = intval($_GET['page']);
         }
        $datas=paginnation($data, $page, 4);
        $nombrepage=get_nombre_page($data, 4);
    $this->view("CategorieVente/lister",[ "datas" => $datas],$nombrepage,$page);
    }

    public function delete(){

    }
    public function update(){
     
    }
}
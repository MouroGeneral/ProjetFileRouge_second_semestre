<?php
namespace Mouro\Models;
use Mouro\Core\Model;
class Production extends Model
{
    private $id;
    private  $dateProd;
    private  $montantProd;
  

    protected static function tableName()
    {
        return "production";
    }

    public  $productionArticle;

    public function __construct()
    {
        // $this->detailapprovisionnement = new DetailApprovisionnement;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        if($id>0) {
            $this->id = $id;
        }

        return $this;
    }
    public function getdate()
    {
        return $this->dateProd;
    }

    public function setdate($date)
    {
        $this->dateProd = $date;

        return $this;
    }

    public function getMontant()
    {
        return $this->montantProd;
    }

    public function setMontant($montant)
    {
        $this->montantProd = $montant;

        return $this;
    }


    


}

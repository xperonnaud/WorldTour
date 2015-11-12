<?php

use Phalcon\Mvc\Controller;

class PoiController extends Controller
{
    // access session in model:
    // $this->userId = $this->getDI()->getSession()->get('user-id');
    
    public function indexAction()
    {
        $this->view->setVar("title", "WorldTour | POI");
        
        $this->initialize();
    }
    
    public function initialize()
    {
        $this->view->setVar("pois", $this->showAction());
        $this->view->setVar("nbPois", $this->getPoiCount());
    }
    
    public function showAction()
    {
        // Préparation de la requete initiale
        $query =
        "SELECT DISTINCT Poi.id, Poi.name AS poiName, Poi.city AS poiCity, Poi.rating AS poiRating, "
            . "( SELECT COUNT(*) "
                . "FROM Review r "
                . "WHERE r.FK_review_poi = Poi.id) "
            . "AS nbReviews, "
            . "( SELECT t.translation "
                . "FROM Translation t "
                . "WHERE t.FK_translation_poi = Poi.id "
                . "AND t.language = :language:) "
            . "AS enTranslation "
        . "FROM Poi "
        . "LEFT JOIN Review ON Poi.id = Review.FK_review_poi ";

        // Recherche par nom (name) si spécifié
        if ($this->request->isPost() == true) {
            // Access POST data
            $poiName = $this->request->getPost("poiNameSearch");
        } else {
            $poiName = "";
        }
        
        // ajoute le parametre de recherche si existant;
        if($poiName != null && $poiName != "")
        {
            $query = $query."WHERE Poi.name LIKE '%". $poiName ."%'";
        }
        
        $query = $query. "ORDER BY Poi.city";
        $pois = $this->modelsManager->executeQuery($query, array("language" => 'english'));

        return($pois);
    }
    
    public function editAction()
    {
        if ($this->request->isPost() == true) {
            // Access POST data
            $poiId = $this->request->getPost("poiId");
            $poiName = $this->request->getPost("poiName");
            $poiCity = $this->request->getPost("poiCity");
            $poiRating = $this->request->getPost("poiRating");
            
            $poi = Poi::findFirst("id = $poiId");
            
            if($poi) {
                $poi->name = $poiName;
                $poi->city = $poiCity;
                $poi->rating = $poiRating;
                
                if($poi->save() == false) {
                    echo "POI editing unsuccessful: \n";
                    foreach ($poi->getMessages() as $message) {
                        echo $message, "\n";
                    }
                } else {
                    echo "POI successfully edited!";
                }
            }
        } 
        $response = new \Phalcon\Http\Response();
        
        return $response->redirect("poi");
    }
    
    public function deleteAction()
    {
        if ($this->request->isPost() == true) {
            // Access POST data
            $poiId = $this->request->getPost("poiId");
            
            $poi = Poi::findFirst("id = $poiId");
            
            if($poi) {
                if($poi->delete() == false) {
                    echo "POI deleting unsuccessful: \n";
                    foreach ($poi->getMessages() as $message) {
                        echo $message, "\n";
                    }
                } else {
                    echo "POI successfully deleted!";
                }
            }
        }
        $response = new \Phalcon\Http\Response();
        
        return $response->redirect("poi");
    }
    
    public function addAction()
    {
        
    }
    
    public function getPoiCount()
    {
        return Poi::count();
    }
}
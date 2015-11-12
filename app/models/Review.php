<?php

class Review extends BaseModel
{
    protected $id;

    protected $date;
    
    protected $reviewer;
    
    protected $text;
    
    protected $poiId;
    
    // initializes relations
    public function initialize()
    {
        $this->belongsTo("FK_review_poi", "poi", "id");
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setDate($date)
    {
        $this->date = $date;
    }
    
    public function getDate()
    {
        return $this->date;
    }
    
    public function setReviewer($reviewer)
    {        
        $this->reviewer = $reviewer;
    }
    
    public function getReviewer()
    {
        return $this->reviewer;
    }
    
    public function setText($text)
    {
        $this->text = $text;
    }
    
    public function getText()
    {
        return $this->text;
    }
    
    public function getPoiId()
    {
        return $this->FK_review_poi;
    }
    
    public function setPoiId($poiId)
    {
        $this->FK_review_poi = $poiId;
    }
}
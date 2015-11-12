<?php

class Translation extends BaseModel
{
    protected $id;

    protected $language;
    
    protected $translation;
    
    protected $poiId;
    
    // initializes relations
    public function initialize()
    {
        $this->belongsTo("FK_translation_poi", "poi", "id");
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setLanguage($language)
    {
        $this->language = $language;
    }
    
    public function getLanguage()
    {
        return $this->language;
    }
    
    public function setTranslation($translation)
    {        
        $this->translation = $translation;
    }
    
    public function getTranslation()
    {
        return $this->translation;
    }
    
    public function getPoiId()
    {
        return $this->FK_translation_poi;
    }
    
    public function setPoiId($poiId)
    {
        $this->FK_translation_poi = $poiId;
    }
}
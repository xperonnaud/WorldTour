<?php

class Poi extends BaseModel
{
    protected $id;

    protected $address;
    
    protected $city;
    
    protected $longitude;
    
    protected $latitude;
    
    protected $name;
    
    protected $phone;
    
    protected $rating;
    
    protected $url;
    
    // initializes relations
    public function initialize()
    {
        $this->hasMany("id", "review", "FK_review_poi");
        $this->hasMany("id", "translation", "FK_translation_poi");
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setName($name)
    {
        if(trlen($name) > 45)
        {
            throw new \InvalidArgumentException('Name too long');
        }
        $this->name = $name;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setAddress($address)
    {        
        if(trlen($address) > 45)
        {
            throw new \InvalidArgumentException('Address too long');
        }
        $this->address = $address;
    }
    
    public function getAddress()
    {
        return $this->address;
    }
    
    public function setCity($city)
    {
        if(trlen($city) > 45)
        {
            throw new \InvalidArgumentException('City too long');
        }
        $this->city = $city;
    }
    
    public function getCity()
    {
        return $this->city;
    }
    
    public function getLongitude()
    {
        return $this->longitude;
    }
    
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }
    
    public function getLatitude()
    {
        return $this->latitude;
    }
    
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }
    
    public function getPhone()
    {
        return $this->phone;
    }
    
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    
    public function getRating()
    {
        return $this->rating;
    }
    
    public function setRating($rating)
    {
        $this->rating = $rating;
    }
    
    public function getUrl()
    {
        return $this->url;
    }
    
    public function setUrl($url)
    {
        $this->url = $url;
    }
}
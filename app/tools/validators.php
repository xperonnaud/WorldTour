<?php
use Phalcon\Validation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Mvc\Model\Validator\Regex as RegexValidator;

class MyValidators extends Validation
{
    public function initialize()
    {
        // Min 8 chars, Min 1 minuscule, Min 1 majuscule, Min 1 chiffre
        $this->add('password', new RegexValidator(array(
           'pattern' => '^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$',
           'message' => 'Mot de passe invalide'
        )));

        $this->add('email', new Email(
            array(
                'message' => "L'email est invalide"
            )
        ));
        
        $this->add('email', new PresenceOf(
            array(
                'message' => "L'email est requis"
            )
        ));

        $this->add('cellphone', new RegexValidator(array(
            'pattern' => '#^0[0-9]([ .-]?[0-9]{2}){4}$#',
            'message' => 'Numéro de téléphone invalide'
        )));

        $this->add('latitude', new RegexValidator(array(
            'pattern' => '/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/',
            'message' =>'Latitude inexistante'
        )));

        $this->add('longitude', new RegexValidator(array(
            'pattern' => '/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/',
            'message' => 'Longitude inexistante'
        )));

        // all aplhanum chars, 4 to 16 chars
        $this->add('login', new RegexValidator(array(
           'pattern' => '^[^0-9a-fA-Z]{4,16}$',
           'message' => 'Login invalide'
        )));

        // allows true or false only, all cases
        $this->add('bool', new RegexValidator(array(
            'pattern' => '^([Tt][Rr][Uu][Ee]|[Ff][Aa][Ll][Ss][Ee])$',
            'message' => 'Valeur non booléenne'
        )));
    }
}


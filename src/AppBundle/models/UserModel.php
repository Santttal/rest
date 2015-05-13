<?php

namespace AppBundle\models;

use JMS\Serializer\Annotation as Serializer;
use Hateoas\Configuration\Annotation as Hateoas;


/**
 * @Serializer\XmlRoot("user")
 *
 *@Hateoas\Relation("self", href = "expr('/api/users/')")
 */
class UserModel
{
    private $login;
    private $password;
    private $age;

    function __construct($login, $password, $age)
    {
        $this->login = $login;
        $this->password = $password;
        $this->age = $age;
    }
}

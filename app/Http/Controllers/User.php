<?php

namespace App\Http\Controllers;



class User
{
    private $firstname, $lastname, $email;

    function setFirstName($fname) {
        $this->firstname = $fname;
        return $this;
    }
    function setLastName($lname) {
        $this->lastname = $lname;
        return $this;
    }
    function setEmail($email) {
        $this->email = $email;
        return $this;
    }
    function __toString() {
        return $this->firstname. ' ' .$this->lastname. ' &lt;' . $this->email .'&gt;';
    }

    public function getOutput(){
        $user = new User();
        $user->setFirstName('John')
            ->setLastName('Doe')
            ->setEmail('john.doe@example.com');

        echo $user;
    }

}


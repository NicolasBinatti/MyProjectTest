<?php

namespace App\Helpers;

class ResultMapping extends \Doctrine\ORM\Query\ResultSetMapping {
    
    public function setMapping(array $fields = []){
        foreach($fields as $field){
            $this->addScalarResult($field, $field);
        }
        return $this;
    }
}


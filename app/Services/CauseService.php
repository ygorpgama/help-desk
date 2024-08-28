<?php

namespace App\Services;

use App\Interfaces\CauseRepositoryContract;

class CauseService {
    public function __construct(private CauseRepositoryContract $causeInterface)
    {

    }

    public function findAll(){
        return $this->causeInterface->findAll();
    }
}

<?php

namespace App\Http\Service;

use App\Http\Repository\IndexRepository;

class IndexService
{
    protected $IndexRepository;

    public function __construct()
    {
        $this->IndexRepository = new IndexRepository();
    }

    public function getUser()
    {
         $IndexRepository = $this->IndexRepository->getUser();

         return $IndexRepository;
    }

    public function get()
    {
         $companyinfo = $this->IndexRepository->get();

         return $companyinfo;
    }

}

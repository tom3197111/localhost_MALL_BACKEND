<?php

namespace App\Http\Repository;

use App\Http\Model\User;
use App\Http\Model\CompanyInfo;
class IndexRepository
{
    protected $User;

    public function __construct()
    {
        $this->User = new User();
        $this->companyInfo = new CompanyInfo();


    }

    public function getUser()
    {
        $user=User::first();

        return $user;
    }

    public function get()
    {
        $companyinfo = companyinfo::get();
        return $companyinfo;
    }

}

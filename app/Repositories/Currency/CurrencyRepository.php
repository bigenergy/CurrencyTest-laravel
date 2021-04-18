<?php

namespace App\Repositories\Currency;

interface CurrencyRepository
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param $officeId
     * @param $atDate
     * @return mixed
     */
    public function getCurrency($officeId, $atDate);
}


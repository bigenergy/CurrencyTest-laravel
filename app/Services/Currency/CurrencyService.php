<?php

namespace App\Services\Currency;

use App\Models\Currency;
use App\Repositories\Currency\CurrencyRepository;
use Carbon\Carbon;

class CurrencyService
{
    /**
     * @var Currency
     */
    private Currency $currencyModel;

    /**
     * @var CurrencyRepository
     */
    public CurrencyRepository $currencyRepository;

    /**
     * CurrencyService constructor.
     * @param Currency $currencyModel
     * @param CurrencyRepository $currencyRepository
     */
    public function __construct(Currency $currencyModel, CurrencyRepository $currencyRepository)
    {
        $this->currencyModel = $currencyModel;
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * @param array $attributes
     * @return bool
     */
    public function add(array $attributes): bool
    {
        $date = Carbon::parse($attributes['begins_at_day'].$attributes['begins_at_time'], 'Europe/Moscow');
        $attributes['begins_at'] = $date;

        $createdCurrency = $this->currencyModel->fill($attributes);
        $createdCurrency->save();

        return true;
    }
}

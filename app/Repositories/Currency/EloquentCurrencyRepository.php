<?php

namespace App\Repositories\Currency;

use App\Models\Currency;
use App\Repositories\AbstractRepository;
use Carbon\Carbon;

class EloquentCurrencyRepository extends AbstractRepository implements CurrencyRepository
{
    /**
     * @var Currency
     */
    private Currency $model;

    /**
     * EloquentCurrencyRepository constructor.
     * @param Currency $currency
     */
    public function __construct(Currency $currency)
    {
        $this->model = $currency;
        parent::__construct($currency);
    }

    /**
     * @param array $relations
     * @return mixed
     */
    public function getAll($relations = [])
    {
        return $this->model->with($relations)->get();
    }

    /**
     * @param $officeId
     * @param $atDate
     * @return mixed
     */
    public function getCurrency($officeId, $atDate)
    {
        return $this->model
            ->whereTime('begins_at', Carbon::parse($atDate)->format('H:i:s'))
            ->whereDate('begins_at', Carbon::parse($atDate)->toDateString())
            ->where('office_id', $officeId)
            ->get();
            //return Carbon::parse($atDate)->timezone('Europe/Moscow')->toDateTimeString();
    }
}

<?php

namespace App\Http\Controllers\Currency;

use App\Http\Controllers\Controller;
use App\Http\Requests\Currency\CurrencyStoreRequest;
use App\Services\Currency\CurrencyService;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * @var CurrencyService
     */
    private CurrencyService $currencyService;

    /**
     * CurrencyController constructor.
     */
    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function get(Request $request): RedirectResponse
    {
        $date = Carbon::parse($request->get('at_date_day') . $request->get('at_date_time'), 'Europe/Moscow');
        $getInfo = $this->currencyService->currencyRepository->getCurrency($request->get('office_id'), $date);

        return redirect()->route('currency.index')->with(['data' => $getInfo]);
    }

    /**
     * @param CurrencyStoreRequest $request
     * @return RedirectResponse
     */
    public function store(CurrencyStoreRequest $request): RedirectResponse
    {
        if ($this->currencyService->add($request->all()))
        {
            return redirect()->route('currency.index')->with('status', 'Валюта добавлена!');
        }

        return redirect()->route('currency.index')->with('status', 'Ошибка добавления');

    }
}

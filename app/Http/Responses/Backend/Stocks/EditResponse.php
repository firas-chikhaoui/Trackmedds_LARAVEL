<?php

namespace App\Http\Responses\Backend\Stocks;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Stocks\Stock
     */
    protected $stocks;

    /**
     * @param App\Models\Stocks\Stock $stocks
     */
    public function __construct($stocks)
    {
        $this->stocks = $stocks;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.stocks.edit')->with([
            'stocks' => $this->stocks
        ]);
    }
}
<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class StatsListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'stats';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::set('user_name','Kullanıcı')->sort()->filter(TD::FILTER_TEXT),
            TD::set('product_id','Ürün SKU')->sort()->filter(TD::FILTER_TEXT),
            TD::set('search','Arama')->sort()->filter(TD::FILTER_TEXT),
            TD::set('created_at', 'Tarih')->sort()->filter(TD::FILTER_TEXT),
        ];
    }


}

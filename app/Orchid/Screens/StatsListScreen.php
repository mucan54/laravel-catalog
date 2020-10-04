<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Models\Stats;
use App\Orchid\Layouts\StatsListLayout;

class StatsListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Kullanıcı İstatistikleri';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Kullanıcıların gezdikleri ürünleri görebilirsiniz.';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'stats' => Stats::filters()->defaultSort('id')->paginate()
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            StatsListLayout::class
        ];
    }
}

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
    public $name = 'StatsListScreen';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'StatsListScreen';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'stats' => Stats::paginate()
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

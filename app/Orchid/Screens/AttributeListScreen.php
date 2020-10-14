<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use App\Orchid\Layouts\AttributeListLayout;
use App\Models\Attribute;

class AttributeListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'AttributeListScreen';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'AttributeListScreen';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'attribute' => Attribute::filters()->defaultSort('id')->paginate()
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [
            Link::make('Yeni Ekle')
                ->icon('pencil')
                ->route('platform.customer.edit')
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            AttributeListLayout::class
        ];
    }
}

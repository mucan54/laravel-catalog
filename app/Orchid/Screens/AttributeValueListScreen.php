<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use App\Orchid\Layouts\AttributeValueListLayout;
use App\Models\AttributeValue;

class AttributeValueListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'AttributeValueListScreen';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'AttributeValueListScreen';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'attributevalue' => AttributeValue::filters()->defaultSort('id')->paginate()
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
            AttributeValueListLayout::class
        ];
    }
}

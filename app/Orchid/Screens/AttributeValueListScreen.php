<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use App\Orchid\Layouts\AttributeValueListLayout;
use App\Models\AttributeValue;
use Orchid\Screen\Actions\Button;

class AttributeValueListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Özellik Değerleri Listesi';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Eklenmiş olan özelliklerin, alabileceği değerler listesi.';

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
            Button::make('Geri Dön')
                ->icon('arrow-left-circle')
                ->method('back'),
            Link::make('Yeni Ekle')
                ->icon('pencil')
                ->route('platform.attributevalue.edit'),
                
        ];
    }


    public function back(){

        return redirect()->route('platform.attribute.list');
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

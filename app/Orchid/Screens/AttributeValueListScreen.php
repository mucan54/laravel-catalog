<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use App\Orchid\Layouts\AttributeValueListLayout;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
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

                Button::make('Yeni Ekle')
                ->icon('pencil')
                ->method('new'),
                Button::make('Geri Dön')
                ->icon('arrow-left-circle')
                ->method('back'),
                
        ];
    }


    public function back(){

        return redirect()->route('platform.attribute.list');
    }

    public function new(Request $request){

        if(isset(parse_url($request->headers->get('referer'))['query']))
        {
            $val = explode('=',parse_url($request->headers->get('referer'))['query'])[1];
            return redirect()->route('platform.attributevalue.edit',['filter[attribute_id]'=>$val]);
        }
        else
        return redirect()->route('platform.attributevalue.edit');
        dd(request()->query());

        return redirect()->route('platform.attributevalue.edit', ['attribute'=>isset(request()->query()['filter']['attribute_id'])?request()->query()['filter']['attribute_id']:'']);
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

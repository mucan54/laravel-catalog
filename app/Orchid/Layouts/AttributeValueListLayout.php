<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use App\Models\AttributeValue;
use Illuminate\Http\Request;

class AttributeValueListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'attributevalue';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {

        return [            
            TD::set('name', 'Özellik Değeri')
        ->render(function (AttributeValue $post) {
            return Link::make($post->name)
                ->route('platform.attributevalue.edit', [$post,'attribute'=>isset(request()->query()['filter']['attribute_id'])?request()->query()['filter']['attribute_id']:'']);
        })->sort()->filter(TD::FILTER_TEXT),
        TD::set('attribute.name', 'Bağlı Olduğu Özellik')
        ->render(function (AttributeValue $post) {
            return $post->attribute->name;
        })->sort()->filter(TD::FILTER_TEXT),

        TD::set('created_at', 'Eklenme T.'),
        TD::set('updated_at', 'Düzenlenme T.'),
];
    }
}

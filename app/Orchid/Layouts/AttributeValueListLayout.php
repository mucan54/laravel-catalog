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
            TD::set('name', 'Title')
        ->render(function (AttributeValue $post) {
            return Link::make($post->name)
                ->route('platform.attributevalue.edit', [$post,'attribute'=>isset(request()->query()['filter']['attribute_id'])?request()->query()['filter']['attribute_id']:'']);
        }),
        TD::set('attribute', 'Parent')
        ->render(function (AttributeValue $post) {
            return $post->attribute->name;
        }),

    TD::set('created_at', 'Created'),
    TD::set('updated_at', 'Last edit'),
];
    }
}

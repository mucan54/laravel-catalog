<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use App\Models\Attribute;

class AttributeListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'attribute';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::set('name', 'Özellik Adı')
            ->render(function (Attribute $post) {
                return Link::make($post->name)
                    ->route('platform.attribute.edit', $post);
            })->sort()->filter(TD::FILTER_TEXT),

        TD::set('created_at', 'Eklenme T.'),
        TD::set('updated_at', 'Düzenlenme T.'),

        ];
    }
}

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
            TD::set('name', 'Title')
            ->render(function (Attribute $post) {
                return Link::make($post->name)
                    ->route('platform.attribute.edit', $post);
            }),

        TD::set('created_at', 'Created'),
        TD::set('updated_at', 'Last edit'),

        ];
    }
}

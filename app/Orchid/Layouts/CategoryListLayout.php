<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use App\Models\Category as ModelsProducts;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Button;

class CategoryListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'category';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::set('name', 'Kategori Adı')
                ->render(function (ModelsProducts $post) {
                    return Link::make($post->name)
                        ->route('platform.category.edit', $post);
                })->sort()->filter(TD::FILTER_TEXT),
            TD::set('created_at', 'Eklenme T.')->sort(),
            TD::set('updated_at', 'Düzenlenme T.')->sort(),
            TD::set('id', 'ID')
            ->align(TD::ALIGN_CENTER)
            ->width('100px')
            ->render(function (ModelsProducts $user) {
                return DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        Link::make(__('Düzenle'))
                            ->route('platform.category.edit', $user->id)
                            ->icon('pencil'),

                        Button::make(__('Sil'))
                            ->method('remove')
                            ->confirm(__('Kategoriyi silmek istediğinize emin misiniz?'))
                            ->route('platform.category.edit', $user->id)
                            ->parameters([
                                'id' => $user->id,
                            ])
                            ->icon('trash'),
                    ]);
            }),
        ];
    }
}

<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Link;
use App\Orchid\Layouts\CategoryListLayout;
use App\Models\Category;

class CategoryListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Kategoriler';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Tüm Katergorilerin Listesi';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'category' => Category::paginate()
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
            Link::make('Kategori Ekle')
                ->icon('pencil')
                ->route('platform.category.edit')
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
            CategoryListLayout::class
        ];
    }
}

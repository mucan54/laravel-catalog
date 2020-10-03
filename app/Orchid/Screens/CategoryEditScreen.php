<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Models\Category;

use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;

class CategoryEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Kategori Düzenleme Ekranı';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Kategori ekleyebilir ve düzenleyebilirsiniz.';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Category $post): array
    {
        $this->exists = $post->exists;

        if($this->exists){
            $this->name = 'Kategori Düzenle';
        }

        return [
            'category' => $post
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
            Button::make('Geri')
                ->icon('back')
                ->route('platform.category.list'),

            Button::make('Kategori Oluştur')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->exists),

            Button::make('Kaydet')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->exists),

            Button::make('Sil')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->exists),
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
            Layout::rows([
                Input::make('category.name')
                    ->title('Kategori Adı')
                    ->placeholder('Kategorinizin adını girin.')
                    ->help('Kategori adı'),


                Relation::make('category.category')
                    ->title('Bağlı Olduğu Kategori (Varsa)')
                    ->placeholder('Ana Katogeri')
                    ->fromModel(Category::class, 'id'),

            ])
        ];
    }

    public function createOrUpdate(Category $post, Request $request)
    {
        $post->fill($request->get('category'))->save();

        Alert::info('You have successfully created an post.');

        return redirect()->route('platform.customer.list');
    }

}

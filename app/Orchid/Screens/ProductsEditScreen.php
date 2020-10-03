<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;

class ProductsEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Ürün Ekle';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Ürün Ekleme Ekranı';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Products $post): array
    {
        $this->exists = $post->exists;

        if($this->exists){
            $this->name = 'Ürün Düzenle';
        }

        $post->load('attachment');

        return [
            'products' => $post
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
            Button::make('Ürün Ekle')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->exists),

            Button::make('Güncelle')
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
            Layout::tabs([
                'Ürün Bilgileri' => [
                    Layout::rows([
                        Input::make('products.name')
                    ->title('Ürün Adı')
                    ->placeholder('Ürünün Adı'),

                    TextArea::make('products.sku')
                    ->title('SKU')
                    ->help('Her ürün için benzersiz olmalıdır.')
                    ->maxlength(200)
                    ->placeholder('Brief description for preview'),
                    Relation::make('products.category')
                    ->title('Kategori')
                    ->fromModel(Category::class, 'name'),

                    Quill::make('products.body')
                    ->title('Ürün Açıklaması'),
                    ]),
                ],
                    'Ürün Görselleri' => [
                        Layout::rows([
                   

                            Cropper::make('products.hero')
                            ->targetId()
                            ->title('Ürünün ana resmi')
                            ->width(1000)
                            ->height(500),
        
                            Upload::make('products.attachment')
                            ->title('Diğer Resimler')
        
                    ])
                    ]]),
        ];
    }


    public function createOrUpdate(Products $post, Request $request)
    {
        $post->fill($request->get('products'))->save();
        $post->attachment()->syncWithoutDetaching(
            $request->input('products.attachment', [])
        );
    

        Alert::info('You have successfully created an post.');

        return redirect()->route('platform.products.list');
    }

    public function remove(Products $post)
    {
        $post->delete()
            ? Alert::info('You have successfully deleted the post.')
            : Alert::warning('An error has occurred')
        ;

        return redirect()->route('platform.products.list');
    }
}

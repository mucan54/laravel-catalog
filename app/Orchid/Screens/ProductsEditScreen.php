<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Models\Products;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;
use Orchid\Screen\Fields\SimpleMDE;
use App\Http\Controllers\Relation as MyRelation;
use App\Models\Attribute;

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
            Button::make('Geri Dön')
                ->icon('arrow-left-circle')
                ->method('back'),

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
                ->confirm('Silmek İstediğinize Emin misiniz?')
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

        $attributes=Attribute::all();
        $posteditor=[];

        foreach($attributes as $post){

            $posteditor[]=Select::make('products.attributevalues.')
                    ->fromQuery(AttributeValue::where('attribute_id', '=', $post->id), 'name')
                    ->title($post->name)
                    ->multiple();

        }


        return [
            Layout::tabs([
                'Ürün Özellikleri' => Layout::rows($posteditor),

                'Ürün Bilgileri' => [
                    Layout::rows([
                    TextArea::make('products.sku')
                    ->title('SKU')
                    ->help('Her ürün için benzersiz olmalıdır boşluk ve özel karakter içeremez!')
                    ->maxlength(200)
                    ->placeholder('Örnek : D-101'),

                    Quill::make('products.body')
                    ->title('Ürün Açıklaması')
                    ->value('<blockquote>Açıklama</blockquote><p><br></p><ul><li><br></li><li><br></li><li><br></li><li><br></li></ul>'),
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
                            ->title('Diğer Resimler'),

                            Cropper::make('products.thumb')
                            ->targetId()
                            ->title('Ürünün liste resmi')
                            ->help('Eğer ürün resmi listelemede uygun gözükmüyorsa listeleme resmini burdan ayrıca yüklemelisiniz, listeleme resmi sorunsuzsa yüklenemenize gerek yoktur.')
                            ->width(262)
                            ->height(350)
        
                    ])
                    ]]),
        ];
    }


    public function createOrUpdate(Products $post, Request $request)
    {
        $request->validate([
            'products.sku' => 'required|alpha_dash|unique:products,sku,'.$post->id,
            'products.body' => 'required',
        ]);

        $post->fill($request->get('products'))->save();
        $post->attachment()->syncWithoutDetaching(
            $request->input('products.attachment', [])
        );
        $post->attributevalues()->sync($request->input('products.attributevalues', []));
    

        Alert::info('You have successfully created an post.');

        //return redirect()->route('platform.products.list');
    }

    public function remove(Products $post)
    {
        $post->attributevalues()->detach();
        $post->delete()
            ? Alert::info('You have successfully deleted the post.')
            : Alert::warning('An error has occurred')
        ;

        return redirect()->route('platform.products.list');
    }

    public function back(Request $request){

        return redirect()->route('platform.products.list');
    }
}

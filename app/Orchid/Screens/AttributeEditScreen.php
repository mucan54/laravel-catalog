<?php

namespace App\Orchid\Screens;

use App\Models\Attribute;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use App\Orchid\Layouts\AttributeValueListLayout;
use App\Orchid\Layouts\AttributeListLayout;

class AttributeEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Özellik Düzenleme Ekranı';


    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Özelikleri düzenleyebilir yeni oluşturabilirsiniz.';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Attribute $post): array
    {
        $this->exists = $post->exists;

        if($this->exists){
            $this->name = 'Özellik Düzenle';
        }

        return [
            'attribute' => $post
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
            Button::make('Özellik Oluştur')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->exists),

                Button::make('Seçenekleri Düzenle')
                ->icon('list')
                ->method('createValue')
                ->canSee($this->exists),

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
        return [
            Layout::rows([
                Input::make('attribute.name')
                    ->title('Özellik Adı')
                    ->help('Özelliğin adı.'),

                Input::make('attribute.order')
                    ->title('Menu Sırası')
                    ->placeholder('Sayı Olmalıdır.')
                    ->help('Menuler sıralanırken kaçıncı sırada yer alacağı.'),

            ]),
       
        ];
    }

    public function createValue(Attribute $post){

        session(['attribute_id' => $post->id]);
        return redirect(route('platform.attributevalue.list').'?filter[attribute_id]='.$post->id);
    }

    public function createOrUpdate(Attribute $post, Request $request)
    {
        $request->validate([
            'attribute.name' => 'required',
            'attribute.order' => 'required|numeric',
        ]);

        $post->fill($request->get('attribute'))->save();

        Alert::info('You have successfully created an post.');

        return redirect()->route('platform.attribute.list');
    }

    /**
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Attribute $post)
    {
        $post->attributevalues()->each(function($item) {
            $item->products()->detach();
            $item->delete();
        });
        $post->delete()
            ? Alert::info('You have successfully deleted the post.')
            : Alert::warning('An error has occurred')
        ;

        return redirect()->route('platform.attribute.list');
    }
}

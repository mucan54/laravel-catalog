<?php

namespace App\Orchid\Screens;

use App\Models\AttributeValue;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Fields\Select;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use App\Orchid\Layouts\AttributeValueListLayout;

class AttributeValueEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Özellik Değeri Düzenleme Ekranı';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Özellik değeri oluşturabilir ve düzenleyebilirsiniz.';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(AttributeValue $post): array
    {
        $this->exists = $post->exists;

        if($this->exists){
            $this->name = 'Özellik Değeri Düzenle';
        }

        return [
            'attributevalue' => $post
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
            Button::make('Özellik Değeri Oluştur')
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
                Button::make('Geri Dön')
                ->icon('arrow-left-circle')
                ->method('back'),
        ];
    }


    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        $elems=[];

        $elem [] = Input::make('attributevalue.name')
        ->title('Özellik Değeri Adı')
        ->placeholder('Değer Adı')
        ->help('Özellik Değeri Adı.');
        if(isset(request()->query()['filter']['attribute_id']))
        $elem [] =Select::make('attributevalue.attribute_id')
        ->fromQuery(Attribute::where('id',request()->query()['filter']['attribute_id']), 'name')
        ->title('Bağlı Olduğu Özellik')
        ->help('Değerin hangi özellik altında görünmesini belirlerin');

        return [
            Layout::rows($elem)
       
        ];
    }

    public function back(Request $request){

        if(isset(parse_url($request->headers->get('referer'))['query']))
        {
            $val = explode('=',parse_url($request->headers->get('referer'))['query'])[1];
            return redirect()->route('platform.attributevalue.list',['filter[attribute_id]'=>$val]);
        }
        else
        return redirect()->route('platform.attributevalue.list');
    }

    public function createOrUpdate(AttributeValue $post, Request $request)
    {
        $post->fill($request->get('attributevalue'))->save();

        Alert::info('You have successfully created an post.');

        return $this->back($request);
    }

    /**
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(AttributeValue $post, Request $request)
    {
        $post->delete()
            ? Alert::info('You have successfully deleted the post.')
            : Alert::warning('An error has occurred')
        ;

        return $this->back($request);
    }
}

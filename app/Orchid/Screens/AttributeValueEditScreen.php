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
    public $name = 'AttributeValueEditScreen';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'AttributeValueEditScreen';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(AttributeValue $post): array
    {
        $this->exists = $post->exists;

        if($this->exists){
            $this->name = 'Edit post';
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
            Button::make('Kullanıcı Oluştur')
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
            Layout::rows([
                Input::make('attributevalue.name')
                    ->title('Kullanıcı ID')
                    ->placeholder('kullanici-adi')
                    ->help('Kullanıcıya ait benzersiz bir id olmalıdır.'),

                    Relation::make('attributevalue.attribute')
                    ->fromModel(Attribute::class, 'name')

            ]),
       
        ];
    }

    public function createOrUpdate(AttributeValue $post, Request $request)
    {
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
    public function remove(AttributeValue $post)
    {
        $post->delete()
            ? Alert::info('You have successfully deleted the post.')
            : Alert::warning('An error has occurred')
        ;

        return redirect()->route('platform.attribute.list');
    }
}

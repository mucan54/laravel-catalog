<?php

namespace App\Orchid\Screens;

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
use App\Models\SettingsModel;

class SettingsEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'SettingsEditScreen';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'SettingsEditScreen';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(SettingsModel $post): array
    {
        $post=$this->getElems();
        return [
            'settings' => $post
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

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate'),
        ];
    }

    function getElems(){

        $elems=config('settings.options');
        $object = new \stdClass;
        foreach ($elems as $elem){
            $post=SettingsModel::where('name',$elem)->first();
            if($post!==null){
                var_dump($post->value);
                $object->$elem=$post->value;
            }
        }

        return $object;

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
                Input::make('settings.qr_height')
                    ->title('Title')
                    ->placeholder('Attractive but mysterious title')
                    ->help('Specify a short descriptive title for this post.'),

                TextArea::make('settings.qr_width')
                    ->title('Description')
                    ->rows(3)
                    ->maxlength(200)
                    ->placeholder('Brief description for preview'),

            ])
        ];
    }

    public function createOrUpdate(SettingsModel $post, Request $request)
    {
        $post->fill($request->get('settings'))->save();

        Alert::info('You have successfully created an post.');

        return redirect()->route('platform.settings.edit');
    }
}

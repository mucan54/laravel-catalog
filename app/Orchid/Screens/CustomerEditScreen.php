<?php

namespace App\Orchid\Screens;

use App\Models\Customer;
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

class CustomerEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Kullanıcı Düzenle';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Kullanıcı düzenleyebilir ve ekleyebilirsiniz';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Customer $post): array
    {
        $this->exists = $post->exists;

        if($this->exists){
            $this->name = 'Kullanıcıyı Düzenle';
        }

        return [
            'customers' => $post
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
                Input::make('customers.username')
                    ->title('Kullanıcı ID')
                    ->placeholder('kullanici-adi')
                    ->help('Kullanıcıya ait benzersiz bir id olmalıdır.'),

                Input::make('customers.name')
                    ->title('Kullanıcı Adı')
                    ->placeholder('Kullanıcı Adı'),
                
                    Input::make('customers.email')
                    ->title('Kullanıcı Mail Adres')
                    ->placeholder('site@example.com'),

                    Input::make('customers.password')
                    ->title('Kullanıcı Şifresi')
                    ->placeholder('123123'),

            ])
        ];
    }

    public function createOrUpdate(Customer $post, Request $request)
    {
        $request->validate([
            'customers.username' => 'required|alpha_dash|unique:customers,username,'.$post->id,
            'customers.password' => 'required|alpha_dash|unique:customers,password,'.$post->id,
            'customers.name' => 'required',
        ]);

        $post->fill($request->get('customers'))->save();

        Alert::info('You have successfully created an post.');

        return redirect()->route('platform.customer.list');
    }

    /**
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Customer $post)
    {
        $post->delete()
            ? Alert::info('You have successfully deleted the post.')
            : Alert::warning('An error has occurred')
        ;

        return redirect()->route('platform.customer.list');
    }
}

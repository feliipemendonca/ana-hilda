<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactsRequest;
use App\Http\Requests\NewsllletersRequest;
use App\Mail\Contacts as MailContacts;
use App\Mail\Newslleters as MailNewslleters;
use App\Models\Blogs;
use App\Models\CategoryProducts;
use App\Models\Contacts;
use App\Models\LocationProducts;
use App\Models\Newslleters;
use App\Models\Pages;
use App\Models\Products;
use App\Models\Settings;
use App\Models\Slides;
use App\Models\TypeProducts;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public $settings;
    public function __construct()
    {
        $this->settings = Settings::select('description','slug')->pluck('description','slug')->all();

        if($this->settings['whatsapp']):
            $numberWhats = preg_replace('/(\D+)/', '', $this->settings['whatsapp']);
            $numberWhats = preg_replace('/ˆ0?(\d{2})9?(\d{8})/', '$1$2', $numberWhats);
            view()->share('whatslink', $numberWhats);
        endif;
        
        view()->share('settings', $this->settings);
        view()->share('locations', LocationProducts::select('id','title','slug')->orderBy('title','asc')->get());
        view()->share('blogs',Blogs::select('files_id','title','description','slug')->limit(3)->inRandomOrder()->get());
    }

    public function index()
    {
        $types = TypeProducts::select('id','title','slug')->orderBy('title','asc')->get();
        $type = [];

        foreach($types->lazy() as $item){
            $item->products->count() > 0 ? $type[] = $item : '';
        }

        return view('pages.index',[
            'category' => CategoryProducts::select('id','title','slug')->orderBy('title','asc')->get(),
            'type' => $type,
            'slides' => Slides::where([
                        ['active', 1],
                        ['start_at', '<=', now()->format('Y-m-d')],
                        ['finish_at', '>=', now()->format('Y-m-d')]
                    ])->orderBy('position', 'desc')->get()
        ]);
    }

    public function products($slug)
    {
        $item = LocationProducts::select('id','title','slug')->where('slug',$slug)->first();
        return view('pages.products',[
            'item' => $item,
            'items' => $item->products()->simplepaginate(16)
        ]);
    }

    public function search()
    {
        $products = Products::orderBy('title','desc');

        if(request()->type)
            $type = TypeProducts::select('title')->where('id',request()->type)->first();
            $products->where(function($q){
                $q->orWhere('type_products_id',request()->type);
            });
        
        if(request()->category)
            $category = CategoryProducts::select('title')->where('id',request()->category)->first();
            $products->where(function($q){
                $q->orWhere('category_products_id',request()->category);
            });

        if(request()->location)
            $location = LocationProducts::select('title')->where('id',request()->location)->first();
            $products->where(function($q){
                $q->orWhere('location_products_id',request()->location);
            });

        $title = 'Resultado: '.@$type->title .' / '.@$category->title.' / '.@$location->title;
        
        
        return view('pages.seach',[
            'title' => $title,
            'items' => $products->simplepaginate(16)
        ]);
    }


    public function product($slug)
    {
        return view('pages.product',['item' => Products::where('slug',$slug)->first()]);
    }

    public function about()
    {
        return view('pages.statics',['item' => Pages::where('slug','quem-somos')->first()]);
    }

    public function contacts()
    {
        return view('pages.contacts');
    }

    public function sendContacts(ContactsRequest $request)
    {
        $contact = new Contacts;
        $contact->setData($contact, $request->all());

        try {
            $contact->save();
        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('error','Error ao enviar contato. Por favor tente novamente.');
        } finally {

            Mail::to($this->settings['email-contato'])->send(new MailContacts($contact));
        }

        return redirect()->back()->with('success','Em breve entraremos em contato.');        
    }

    public function newslleter(NewsllletersRequest $request)
    {
        $item = new Newslleters;
        $item->email = $request->email;

        try {           
            $item->save();
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error','Error ao enviar contato. Por favor tente novamente.');
        } finally {
            Mail::to($this->settings['email-contato'])->send(new MailNewslleters($item));
        }

        return redirect()->back()->with('success','Em breve entraremos em contato.');  
    }

    public function blogs()
    {
        return view('pages.blogs', ['items' => Blogs::select('files_id','title','description','slug')->paginate(7)]);
    }

    public function blog($slug)
    {
        return view('pages.blog', ['item' => Blogs::where('slug',$slug)->first()]);
    }
}

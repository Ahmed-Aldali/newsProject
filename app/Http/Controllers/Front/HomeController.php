<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::where('status','active')->take(3)->get();
        $sliders = Slider::take(3)->get();
        $articles = Article::orderBy('created_at','desc')->take(3)->get();
        return response()->view('news.index',compact('categories','sliders','articles'));
    }

    public function allNews($id){
        $categories = Category::findOrFail($id);
        $articles = Article::where('category_id' , $id)->paginate(4);
        return response()->view('news.all-news',compact('categories','articles'));
    }


    public function details($id){
        $articles = Article::findOrFail($id);
        $comments = Comment::where('article_id',$id)->get();
        return response()->view('news.newsdetailes',compact('articles','comments'));
    }


    public function showContact(){
        return response()->view('news.contact');
    }
    public function storeContact(Request $request){
        $validator = Validator($request->all() , [

            ] , [

            ]);

            if(! $validator->fails()){
                $contacts = new Contact();
                $contacts->fullname = $request->input('fullname');
                $contacts->email = $request->input('email');
                $contacts->mobile = $request->input('mobile');
                $contacts->message = $request->input('message');

                $isSaved = $contacts->save();

                if($isSaved){
                    return response()->json([
                        'icon' => 'success' ,
                        'title' => "Created is Successfully" ,
                    ] , 200);
                }

            }
            else{
                return response()->json([
                    'icon' => 'error' ,
                    'title' => $validator->getMessageBag()->first(),
                ] , 400);
            }
    }


    public function storeComment(Request $request  ){

        $validator = Validator($request->all() , [

            ] , [

            ]);

            if(! $validator->fails()){
                $comments = new Comment();

                $comments->comment = $request->input('comment');
                $comments->article_id = $request->input('article_id');
                $comments->user_id = $request->input('user_id');

                $isSaved = $comments->save();

                if($isSaved){
                    return response()->json([
                        'icon' => 'success' ,
                        'title' => "Created is Successfully" ,
                    ] , 200);
                }

            }
            else{
                return response()->json([
                    'icon' => 'error' ,
                    'title' => $validator->getMessageBag()->first(),
                ] , 400);
            }

    }


}

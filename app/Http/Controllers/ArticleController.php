<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $articles = Article::orderBy('id' , 'desc')->paginate(4);
        $this->authorize('viewAny',Article::class);
        return response()->view('cms.article.indexAll' , compact('articles'));
    }

     public function indexArticle($id)
     {
         //
         $articles = Article::where('author_id', $id)->orderBy('created_at', 'desc')->paginate(4);
        
         return response()->view('cms.article.index', compact('articles','id'));
     }

     public function indexCategoryArticles($id)
     {
         //
         $articles = Article::where('category_id', $id)->orderBy('created_at', 'desc')->paginate(4);
         return response()->view('cms.article.indexCategoryArticles', compact('articles','id'));
     }

     public function createArticle($id)
     {

         $authors = Author::all();
         $categories = Category::where('status' , 'active')->get();

         return response()->view('cms.article.create' , compact('authors' , 'categories' , 'id'));

     }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::where('status' , 'active')->get();
        $this->authorize('create',Article::class);
        return response()->view('cms.article.create' , compact('authors' , 'categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'tags' => 'nullable|string',
        ]);

        $articles = new Article(); 

        $tagNames = explode(',', $validatedData['tags']);//return as array 
        $value = array_values(array_unique($tagNames));
        $articles->tags = json_encode($value); 
        
            if (request()->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/article', $imageName);
                $articles->image = $imageName;
                }

            $articles->title = $request->get('title');
            $articles->short_description = $request->get('short_description');
            $articles->full_description = $request->get('full_description');
            $articles->category_id = $request->get('category_id');
            $articles->author_id = $request->get('author_id');
           
            $jsonData = [
                'ar' => $request->get('title'),
                'en' => $request->get('title-en')
            ];
            $articles->testTitle = json_encode($jsonData);

            $isSaved = $articles->save();

            if($isSaved){
                return redirect()->back()->with('message', 'add successfully');
            }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors = Author::all();
        $categories = Category::where('status' , 'active')->get();
        $articles = Article::findOrFail($id);
        $this->authorize('update',Article::class);
        return response()->view('cms.article.edit' , compact('authors' , 'categories' , 'articles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tags' => 'nullable|string',
        ]);

        $articles = Article::findOrFail($id);

        $tagNames = explode(',', $validatedData['tags']);
        $value = array_values(array_unique($tagNames));
        $articles->tags = json_encode($value , JSON_UNESCAPED_UNICODE);

                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/article', $imageName);
                    // $image->storeAs('storage/images/admin', $imageName);

                    $articles->image = $imageName;
                    }

                $articles->title = $request->get('title');
                $articles->short_description = $request->get('short_description');
                $articles->full_description = $request->get('full_description');
                $articles->category_id = $request->get('category_id');
                $articles->author_id = $request->get('author_id');

                $isUpdate = $articles->save();

                if($isUpdate){
                    return redirect()->back()->with('message', 'add successfully');
                }

          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete',Article::class);
        $articles = Article::destroy($id);
    }




    

}
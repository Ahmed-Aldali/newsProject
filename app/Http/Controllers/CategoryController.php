<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::withcount('articles')->orderBy('id' , 'desc')->paginate(10);
        $this->authorize('viewAny',Category::class);
        return response()->view('cms.category.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Category::class);
        return response()->view('cms.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all() , [

        ] , [

        ]);

        if(! $validator->fails()){
            $categories = new Category();

            $jsonData = [
                'ar' => $request->get('name-ar'),
                'en' => $request->get('name-en')
            ];
            $categories->name = json_encode($jsonData);

            $categories->status = $request->input('status');
            $categories->description = $request->input('description');

            $isSaved = $categories->save();

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
        $categories = Category::findOrFail($id);
        $this->authorize('update',Category::class);
        return response()->view('cms.category.edit' , compact('categories'));
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
        $validator = Validator($request->all() , [

            ] , [

            ]);

            if(! $validator->fails()){
                $categories = Category::findOrFail($id);
                $jsonData = [
                    'ar' => $request->get('name-ar'),
                    'en' => $request->get('name-en')
                ];
                $categories->name = json_encode($jsonData);
                $categories->status = $request->input('status');
                $categories->description = $request->input('description');

                $isUpdates = $categories->save();

                return ['redirect' => route('categories.index')];

            }
            else{
                return response()->json([
                    'icon' => 'error' ,
                    'title' => $validator->getMessageBag()->first(),
                ] , 400);
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
        $this->authorize('delete',Category::class);
        $categories = Category::destroy($id);
    }
}

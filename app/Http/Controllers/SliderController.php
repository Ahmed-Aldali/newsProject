<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Dotenv\Validator;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id' , 'desc')->paginate(10);
        $this->authorize('viewAny',Slider::class);
        return response()->view('cms.slider.index' , compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Slider::class);

        return response()->view('cms.slider.create');
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

        ]);

        if(! $validator->fails()){

            $sliders = new Slider();


            if (request()->hasFile('image')) {

                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/slider', $imageName);
                // $image->storeAs('storage/images/admin', $imageName);
                $sliders->image = $imageName;
                }

                $jsonTitle = [
                    'ar' => $request->get('title-ar'),
                    'en' => $request->get('title-en')
                ];
                $jsonDesc = [
                    'ar' => $request->get('description-ar'),
                    'en' => $request->get('description-en')
                ];
                $sliders->title = json_encode($jsonTitle);
                $sliders->description = json_encode($jsonDesc);


            $isSaved = $sliders->save();
            return response()->json([
                'icon' => 'success' ,
                'title' => 'Created is Successfully'
            ] , 200) ;

        }
        else{
            return response()->json([
                'icon' => 'error' ,
                'title' => $validator->getMessageBag()->first()] , 400);
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
        $sliders = Slider::findOrFail($id);
        $this->authorize('update',Slider::class);

        return response()->view('cms.slider.edit' , compact('sliders'));
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

        ]);

        if(! $validator->fails()){

            $sliders = Slider::findOrFail($id);


            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/slider', $imageName);
                // $image->storeAs('storage/images/admin', $imageName);

                $sliders->image = $imageName;
                }


           
                $jsonTitle = [
                    'ar' => $request->get('title-ar'),
                    'en' => $request->get('title-en')
                ];
                $jsonDesc = [
                    'ar' => $request->get('description-ar'),
                    'en' => $request->get('description-en')
                ];
                $sliders->title = json_encode($jsonTitle);
                $sliders->description = json_encode($jsonDesc);

            $isSaved = $sliders->save();

            return ['redirect' => route('sliders.index')];

        }
        else{
            return response()->json([
                'icon' => 'error' ,
                'title' => $validator->getMessageBag()->first()] , 400);
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
        $this->authorize('delete',Slider::class);

        $sliders = Slider::destroy($id);
    }
}
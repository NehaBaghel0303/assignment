<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.testimonial.index',['testimonials' => Testimonial::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new Testimonial;
        $data->name= $request->name;
        $data->role= $request->role;
        $data->description= $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = storage_path('app/public/backend/testimonial');
            $imageName = 'testimonial' . $data->id.rand(000, 999).'.' . $image->getClientOriginalExtension();
            $image->move($path, $imageName);
            $data->image=$imageName;
        }
        else{
            $data->image = $request->image;
        }
        $data->save();

        return redirect()->route('testimonial.index')->with('success','testimonial created successfully');
    }
    public function ProductStore(Request $request)
    {
        // return $request->all();
        try {

            $product = new Product();
            $product->title  = $request->title;
            $product->slug = \Str::slug($request->title);
            $product->summary  = $request->summary;
            $product->description  = $request->description;
            $product->stock  = $request->stock;
            $product->size  = $request->size;
            $product->condition  = $request->condition;
            $product->status  = $request->status;
            $product->price  = $request->price;
            $product->discount  = $request->discount;
            $product->is_featured  = $request->is_featured;
            $product->save();
            return redirect(route('product.index'))->with('success', 'Product created successfully.');
            
          } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
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
        $testimonials = Testimonial::whereId($id)->firstorfail();
        return view('admin.testimonial.edit',compact('testimonials'));
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
       
        $data = new Testimonial;
        $data->name= $request->name;
        $data->role= $request->role;
        $data->description= $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = storage_path('app/public/backend/testimonial');
            $imageName = 'testimonial' . $data->id.rand(000, 999).'.' . $image->getClientOriginalExtension();
            $image->move($path, $imageName);
            $data->image=$imageName;
        }
        else{
            $data->image = $request->image;
        }
        $data->update();

        return redirect()->route('testimonial.index')->with('success','testimonial created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

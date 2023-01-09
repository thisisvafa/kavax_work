<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Review;
use App\Model\Attachments;
use Intervention\Image\Facades\Image;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Review $review)
    {
        try {
            $reviews = $review->allData();
            return view('admin.review.index', compact('reviews'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.review.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Review $review, Request $request)
    {
        try {
            $data = $request->all();
            if ($thumbnail_path = $request->file('image')) {
                $attachments_id = array();
                if ($path = $thumbnail_path->store('review/thumbnail')) {
                    $user = auth()->user();
                    $Attachments = new Attachments();
                    $Attachments->uid = $user->id;
                    $Attachments->orgname = $thumbnail_path->getClientOriginalName();
                    $Attachments->path = pathinfo($path)['filename'] . '.' . pathinfo($path)['extension'];
                    $Attachments->type = $thumbnail_path->extension();
                    $img = Image::make(storage_path('app/review/thumbnail/' . $Attachments->path));


                    // save the file 636px
                    $img->backup();
                    $img->crop(636, 385);

                    if (!file_exists('storage/app/review/thumbnail')) {
                        mkdir('storage/app/review/thumbnail', 0755, true);
                    }
                    $img->save('storage/app/review/thumbnail/' . pathinfo($path)['filename'] . '.' . pathinfo($path)['extension'], 100);

                    if ($Attachments->save()) {
                        array_push($attachments_id, $Attachments->id);
                    } else {
                        return redirect()->back()->with('notification', [
                            'status' => 'danger',
                            'message' => 'review is not uploaded!',
                        ]);
                    }
                }
                $data['image'] = end($attachments_id);
            }


            $review->create($data);
            return redirect()->route('reviews.index')->with(
                'notification',
                [
                    'class' => 'success',
                    'message' => 'Review Created Successfully.'
                ]
            );
        } catch (\Exception $e) {
            return $e->getMessage();
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
    public function edit(Review $review)
    {
        try {
            $review = $review->view($review->id);
            return view('admin.review.edit', compact('review'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        try {
            $data = $request->all();
            if ($thumbnail_path = $request->file('image')) {
                $attachments_id = array();
                if ($path = $thumbnail_path->store('review/thumbnail')) {
                    $user = auth()->user();
                    $Attachments = new Attachments();
                    $Attachments->uid = $user->id;
                    $Attachments->orgname = $thumbnail_path->getClientOriginalName();
                    $Attachments->path = pathinfo($path)['filename'] . '.' . pathinfo($path)['extension'];
                    $Attachments->type = $thumbnail_path->extension();
                    $img = Image::make(storage_path('app/review/thumbnail/' . $Attachments->path));


                    // save the file 636px
                    $img->backup();
                    //$img->crop(636, 385);

                    if (!file_exists('storage/app/review/thumbnail')) {
                        mkdir('storage/app/review/thumbnail', 0755, true);
                    }
                    $img->save('storage/app/review/thumbnail/' . pathinfo($path)['filename'] . '.' . pathinfo($path)['extension'], 100);

                    if ($Attachments->save()) {
                        array_push($attachments_id, $Attachments->id);
                    } else {
                        return redirect()->back()->with('notification', [
                            'status' => 'danger',
                            'message' => 'review is not uploaded!',
                        ]);
                    }
                }
                $data['image'] = end($attachments_id);
            }

            $review->edit($review->id, $data);
            return redirect()->route('reviews.index')->with(
                'notification',
                [
                    'class' => 'success',
                    'message' => 'Review Updated Successfully.'
                ]
            );
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review, Request $request)
    {
        try {
            foreach ($request->delete_item as $key => $val) {
                $review->find($val)->delete();
            }
            return redirect()->route('reviews.index')->with(
                'notification',
                [
                    'class' => 'success',
                    'message' => 'review Deleted.'
                ]
            );
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

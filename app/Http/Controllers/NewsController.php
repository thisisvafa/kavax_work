<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Attachments;
use App\Model\News;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(12)->onEachSide(2);
        return view('admin.news.index', compact('news'));
    }

    /* Create New Post */
    public function create()
    {
        return view('admin.news.create');
    }

    /* Submit Post */
    public function store(Request $request)
    {
        $this->middleware('can:isAuthor');
        $user = auth()->user();
        $BlogData = $request->all();
        $BlogData['author_id'] = $user->id;
        $BlogData['slug'] = Str::slug($request->title);

        /* Save Thumbnail */
        if ($thumbnail_path = $request->file('thumbnail')) {
            $attachments_id = array();
            if ($path = $thumbnail_path->store('news/thumbnail/full')) {
                $Attachments = new Attachments();
                $Attachments->uid = $user->id;
                $Attachments->orgname = $thumbnail_path->getClientOriginalName();
                $Attachments->path = pathinfo($path)['filename'] . '.' . pathinfo($path)['extension'];
                $Attachments->type = $thumbnail_path->extension();
                // $img = Image::make(storage_path('app/news/thumbnail/full/' . $path));

                // //save the file 636px
                // $img->backup();
                // $img->crop(636, 385);

                // if (!file_exists('storage/app/news/thumbnail/636')) {
                //     mkdir('storage/app/news/thumbnail/636', 0755, true);
                // }
                // $img->save('storage/app/news/thumbnail/636/' . pathinfo($path)['filename'] . '.' . pathinfo($path)['extension'], 100);

                if ($Attachments->save()) {
                    array_push($attachments_id, $Attachments->id);
                } else {
                    return redirect()->back()->with('notification', [
                        'status' => 'danger',
                        'message' => 'Thumbnail is not uploaded!',
                    ]);
                }
            }
            $BlogData['thumbnail'] = end($attachments_id);
        }

        if (News::create($BlogData)) {
            return redirect('admin/news')->with('notification', [
                'class' => 'success',
                'message' => 'Post Created.'
            ]);
        } else {
            return redirect()->back()->with('notification', [
                'class' => 'alert',
                'message' => 'Error.'
            ]);
        }
    }


    /* Edit Post Page */
    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.news.edit', compact('news'));
    }

    /* Update News */
    public function update(Request $request, $id)
    {
        $this->middleware('can:isAuthor');
        $user = auth()->user();
        $news = News::find($id);

        $BlogData = $request->all();
        $BlogData['slug'] = $news->slug;
        if ($news->title != $request->title) {
            $BlogData['slug'] = Str::slug($request->title);
        }

        /* Save Thumbnail */
        if ($thumbnail_path = $request->file('thumbnail')) {
            $attachments_id = array();
            if ($path = $thumbnail_path->store('news/thumbnail/full')) {
                $Attachments = new Attachments();
                $Attachments->uid = $user->id;
                $Attachments->orgname = $thumbnail_path->getClientOriginalName();
                $Attachments->path = pathinfo($path)['filename'] . '.' . pathinfo($path)['extension'];
                $Attachments->type = $thumbnail_path->extension();
                $img = Image::make('storage/app/news/thumbnail/full/' . $Attachments->path);

                // save the file 350px
                $img->backup();
                $img->crop(636, 385);

                if (!file_exists('storage/app/news/thumbnail/636')) {
                    mkdir('storage/app/news/thumbnail/636', 0755, true);
                }
                $img->save('storage/app/news/thumbnail/636/' . pathinfo($path)['filename'] . '.' . pathinfo($path)['extension'], 100);

                if ($Attachments->save()) {
                    array_push($attachments_id, $Attachments->id);
                } else {
                    return redirect()->back()->with('notification', [
                        'status' => 'danger',
                        'message' => 'Thumbnail is not uploaded!',
                    ]);
                }
            }
            $BlogData['thumbnail'] = end($attachments_id);
        }

        if ($news->update($BlogData)) {
            return redirect()->back()->with('notification', [
                'class' => 'success',
                'message' => 'Post Updated.'
            ]);
        } else {
            return redirect('admin/news')->with('notification', [
                'class' => 'danger',
                'message' => 'Error.'
            ]);
        }
    }

    /* Show Post */
    public function show($slug)
    {
        $news = News::where('slug', $slug)->first();

        return view('site.pages.news.single', compact('news'));
    }


    /* Post Destroy */
    public function destroy(Request $request)
    {
        $this->middleware('can:isAuthor');
        foreach ($request->delete_item as $key => $item) {
            News::where('id', $key)->delete();
        }

        return redirect('/admin/news')->with('notification', [
            'class' => 'success',
            'message' => 'Post is Deleted.'
        ]);
    }
}

<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Model\Attachments;
use App\Model\Portfolio;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Model\Services;

class PortfolioController extends Controller
{
    /* Show All Portfolios */
    public function index()
    {
        $Portfolio = Portfolio::orderBy('created_at', 'desc')->paginate(12)->onEachSide(2);
        return view('admin.portfolio.index', compact('Portfolio'));
    }

    /* Create Portfolios */
    public function create()
    {
        $services = Services::where('service_level', 'parent')->select('id', 'title')->orderBy('created_at', 'desc')->get();
        return view('admin.portfolio.create', compact('services'));
    }

    /* Portfolio Store */
    public function store(Request $request)
    {
        $PortfolioData = $request->all();
        $user = auth()->user();
        $PortfolioData['uid'] = $user->id;

        /* Save Thumbnail */
        if ($logo_path = $request->file('logo')) {
            $attachments_id = array();
            if ($path = $logo_path->store('portfolio/logo')) {
                $Attachments = new Attachments();
                $Attachments->uid = $user->id;
                $Attachments->orgname = $logo_path->getClientOriginalName();
                $Attachments->path = pathinfo($path)['filename'] . '.' . pathinfo($path)['extension'];
                $Attachments->type = $logo_path->extension();
                $img = Image::make(storage_path('app/portfolio/logo/' . $Attachments->path));


                // save the file 636px
                $img->backup();
                $img->crop(636, 385);

                if (!file_exists(storage_path('app/portfolio/logo'))) {
                    mkdir(storage_path('app/portfolio/logo'), 0755, true);
                }
                $img->save(storage_path('app/portfolio/logo/' . pathinfo($path)['filename'] . '.' . pathinfo($path)['extension']), 100);

                if ($Attachments->save()) {
                    array_push($attachments_id, $Attachments->id);
                } else {
                    return redirect()->back()->with('notification', [
                        'status' => 'danger',
                        'message' => 'Thumbnail is not uploaded!',
                    ]);
                }
            }
            $PortfolioData['logo'] = end($attachments_id);
        }

        /* Save Thumbnail */
        if ($thumbnail_path = $request->file('thumbnail')) {
            $attachments_id = array();
            if ($path = $thumbnail_path->store('portfolio/thumbnail')) {
                $Attachments = new Attachments();
                $Attachments->uid = $user->id;
                $Attachments->orgname = $thumbnail_path->getClientOriginalName();
                $Attachments->path = pathinfo($path)['filename'] . '.' . pathinfo($path)['extension'];
                $Attachments->type = $thumbnail_path->extension();
                $img = Image::make(storage_path('app/portfolio/thumbnail/' . $Attachments->path));


                // save the file 636px
                $img->backup();
                $img->crop(636, 385);

                if (!file_exists(storage_path('app/portfolio/thumbnail'))) {
                    mkdir(storage_path('app/portfolio/thumbnail'), 0755, true);
                }
                $img->save(storage_path('app/portfolio/thumbnail/' . pathinfo($path)['filename'] . '.' . pathinfo($path)['extension']), 100);

                if ($Attachments->save()) {
                    array_push($attachments_id, $Attachments->id);
                } else {
                    return redirect()->back()->with('notification', [
                        'status' => 'danger',
                        'message' => 'Thumbnail is not uploaded!',
                    ]);
                }
            }
            $PortfolioData['thumbnail'] = end($attachments_id);
        }


        $Grid = [];
        foreach ($request->portfolio as $item) {

            /* Save Thumbnail */
            if ($thumbnail_path = $item['image']) {
                $attachments_id = array();
                if ($path = $thumbnail_path->store('portfolio/full')) {
                    $Attachments = new Attachments();
                    $Attachments->uid = $user->id;
                    $Attachments->orgname = $thumbnail_path->getClientOriginalName();
                    $Attachments->path = pathinfo($path)['filename'] . '.' . pathinfo($path)['extension'];
                    $Attachments->type = $thumbnail_path->extension();
                    $img = Image::make(storage_path('app/portfolio/full/' . $Attachments->path));

                    // save the file 412px
                    $img->backup();
                    $img->resize(412, null);

                    if (!file_exists(storage_path('app/portfolio/thumbnail'))) {
                        mkdir(storage_path('app/portfolio/thumbnail'), 0755, true);
                    }
                    $img->save(storage_path('app/portfolio/thumbnail/' . pathinfo($path)['filename'] . '.' . pathinfo($path)['extension']), 100);

                    if ($Attachments->save()) {
                        array_push($attachments_id, $Attachments->id);
                    } else {
                        return redirect()->back()->with('notification', [
                            'status' => 'danger',
                            'message' => 'Image is not uploaded!',
                        ]);
                    }
                }
            }

            array_push($Grid, ['name' => $item['name'], 'image' => end($attachments_id)]);
        }
        $PortfolioData['service_id'] = $request->service_id[0];
        $PortfolioData['grid'] = json_encode($Grid);

        if ($por = Portfolio::create($PortfolioData)) {
            $por->categories()->sync($request->service_id);
            return redirect('admin/portfolio')->with('notification', [
                'class' => 'success',
                'message' => 'Portfolio Created.'
            ]);
        } else {
            return redirect()->back()->with('notification', [
                'class' => 'alert',
                'message' => 'Error.'
            ]);
        }
    }

    /* Edit Portfolio */
    public function edit($id)
    {
        $Portfolio = Portfolio::find($id);
        $services = Services::where('service_level', 'parent')->select('id', 'title')->orderBy('created_at', 'desc')->get();

        return view('admin.portfolio.edit', compact('Portfolio', 'services'));
    }

    /* Portfolio Update */
    public function update(Request $request, $id)
    {
        $user = auth()->user();
        $Portfolio = Portfolio::find($id);

        $PortfolioData = $request->all();
        $PortfolioData['slug'] = $Portfolio->slug;
        if ($Portfolio->title != $request->title) {
            $PortfolioData['slug'] = SlugService::createSlug(Portfolio::class, 'slug', $request->title);
        }
        // dd($PortfolioData);

        /* Save Thumbnail */
        if ($logo_path = $request->file('logo')) {
            $attachments_id = array();
            if ($path = $logo_path->store('portfolio/logo')) {
                $Attachments = new Attachments();
                $Attachments->uid = $user->id;
                $Attachments->orgname = $logo_path->getClientOriginalName();
                $Attachments->path = pathinfo($path)['filename'] . '.' . pathinfo($path)['extension'];
                $Attachments->type = $logo_path->extension();
                $img = Image::make(storage_path('app/portfolio/logo/' . $Attachments->path));


                // save the file 636px
                $img->backup();
                $img->crop(636, 385);

                if (!file_exists(storage_path('app/portfolio/logo'))) {
                    mkdir(storage_path('app/portfolio/logo'), 0755, true);
                }
                $img->save(storage_path('app/portfolio/logo/' . pathinfo($path)['filename'] . '.' . pathinfo($path)['extension']), 100);

                if ($Attachments->save()) {
                    array_push($attachments_id, $Attachments->id);
                } else {
                    return redirect()->back()->with('notification', [
                        'status' => 'danger',
                        'message' => 'Thumbnail is not uploaded!',
                    ]);
                }
            }
            $PortfolioData['logo'] = end($attachments_id);
        }

        /* Save Thumbnail */
        if ($thumbnail_path = $request->file('thumbnail')) {
            $attachments_id = array();
            if ($path = $thumbnail_path->store('portfolio/thumbnail')) {
                $Attachments = new Attachments();
                $Attachments->uid = $user->id;
                $Attachments->orgname = $thumbnail_path->getClientOriginalName();
                $Attachments->path = pathinfo($path)['filename'] . '.' . pathinfo($path)['extension'];
                $Attachments->type = $thumbnail_path->extension();
                $img = Image::make(storage_path('app/portfolio/thumbnail/' . $Attachments->path));


                // save the file 636px
                $img->backup();
                $img->crop(636, 385);

                if (!file_exists(storage_path('app/portfolio/thumbnail'))) {
                    mkdir(storage_path('app/portfolio/thumbnail'), 0755, true);
                }
                $img->save(storage_path('app/portfolio/thumbnail/' . pathinfo($path)['filename'] . '.' . pathinfo($path)['extension']), 100);

                if ($Attachments->save()) {
                    array_push($attachments_id, $Attachments->id);
                } else {
                    return redirect()->back()->with('notification', [
                        'status' => 'danger',
                        'message' => 'Thumbnail is not uploaded!',
                    ]);
                }
            }
            $PortfolioData['thumbnail'] = end($attachments_id);
        }

        /* Technology Items */
        $OldPortfolio = json_decode($Portfolio->grid, true);
        if ($request->portfolio) {
            $i = 0;
            $Grid = [];
            foreach ($request->portfolio as $item) {
                /* Save Thumbnail */
                if (isset($item['image']) && $thumbnail_path = $item['image']) {
                    $attachments_id = array();
                    if ($path = $thumbnail_path->store('portfolio/full')) {
                        $Attachments = new Attachments();
                        $Attachments->uid = $user->id;
                        $Attachments->orgname = $thumbnail_path->getClientOriginalName();
                        $Attachments->path = pathinfo($path)['filename'] . '.' . pathinfo($path)['extension'];
                        $Attachments->type = $thumbnail_path->extension();
                        $img = Image::make(storage_path('app/portfolio/full/' . $Attachments->path));

                        // save the file 412px
                        $img->backup();
                        $img->resize(412);
                        if (!file_exists(storage_path('app/portfolio/thumbnail'))) {
                            mkdir(storage_path('app/portfolio/thumbnail'), 0755, true);
                        }
                        $img->save(storage_path('app/portfolio/thumbnail/' . pathinfo($path)['filename'] . '.' . pathinfo($path)['extension']), 100);

                        if ($Attachments->save()) {
                            array_push($attachments_id, $Attachments->id);
                        } else {
                            return redirect()->back()->with('notification', [
                                'status' => 'danger',
                                'message' => 'Image is not uploaded!',
                            ]);
                        }
                    }
                    array_push($Grid, ['name' => $item['name'], 'image' => end($attachments_id)]);
                } else {
                    array_push($Grid, [
                        'name' => $item['name'],
                        'image' => $OldPortfolio[$i]['image']
                    ]);
                }
                $i += 1;
            }
        }

        $PortfolioData['grid'] = json_encode($Grid);

        if ($por = $Portfolio->update($PortfolioData)) {
            $por->categories()->sync($request->service_id);
            return redirect()->back()->with('notification', [
                'class' => 'success',
                'message' => 'Portfolio Updated.'
            ]);
        } else {
            return redirect('admin/portfolioData')->with('notification', [
                'class' => 'danger',
                'message' => 'Error.'
            ]);
        }
    }


    /* Services Destroy */
    public function destroy(Request $request)
    {
        $this->middleware('can:isAuthor');
        foreach ($request->delete_item as $key => $item) {
            Portfolio::where('id', $key)->delete();
        }

        return redirect('/admin/portfolio')->with('notification', [
            'class' => 'success',
            'message' => 'Portfolio Deleted.'
        ]);
    }

    /* Show All Blog Portfolio */
    public function show_all()
    {
        $portfolio = Portfolio::orderBy('created_at', 'desc')->paginate(12)->onEachSide(2);
        return view('site.pages.portfolio.portfolios', compact('portfolio'));
    }

    /* Show Career */
    public function show($slug)
    {
        $portfolio = Portfolio::where('slug', $slug)->first();
        return view('site.pages.portfolio.single', compact('portfolio'));
    }

    public function getContent($id)
    {
        $portfolio = Portfolio::find($id);
        return response()->json(['content' => $portfolio->content]);
    }
}

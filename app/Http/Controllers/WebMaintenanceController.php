<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\WebMaintenance;

class WebMaintenanceController extends Controller
{

    public function index(WebMaintenance $maintenance)
    {
        try {
            $data = $maintenance->first();
            if (!$data) {
                $maintenance->create(['title' => 'Maintaining not only your website, but a healthy CMS.', 'content' => 'data..']);
                $data = $maintenance->first();
            }
            return view('admin.maintenance.edit', compact('data'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(Request $request, WebMaintenance $maintenance)
    {
        $data = [
            'title' => $request->title,
            'content' => $request->content
        ];
        try {
            $maintenance->edit($request->id, $data);
            return redirect()->route('web-maintenance')->with(
                'notification',
                [
                    'class' => 'success',
                    'message' => 'Updated Successfully.'
                ]
            );
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getContent($id)
    {
        $data = WebMaintenance::find($id);
        return response()->json(['content' => $data->content]);
    }
}

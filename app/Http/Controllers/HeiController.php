<?php

namespace App\Http\Controllers;

use App\Models\HEI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HeiController extends Controller
{
    public function index()
    {
        if (! Gate::allows('admin')) {
            abort(403);
        }
        $url = url('/hei');
        $hei = new HEI();
        $title = "HEI Register";
        $heis = HEI::all();
        $data = compact('url', 'hei', 'title', 'heis');
        return view('admin.hei')->with($data);;
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
            ]
        );
        //Insert Query
        $hei = new HEI();
        $hei->title = $request['title'];
        $hei->save();

        return redirect('hei/view');
    }

    public function view(Request $request)
    {
        $title = "HEI List";
        $search = $request['search'] ?? "";
        if ($search != "") {
            //where
            $heis = HEI::where('title', 'LIKE', "%$search%")->Paginate(5);
        } else {
            $heis = HEI::orderBy('title')->Paginate(5);
        }

        $data = compact('heis', 'search', 'title');
        return view('admin.hei-view')->with($data);
    }

    //Delete Query
    public function delete($id)
    {
        $hei = HEI::find($id);
        if (!is_null($hei)) {
            $hei->delete();
        }
        return redirect('hei/view');
    }

    public function edit($id)
    {
        if (! Gate::allows('admin')) {
            abort(403);
        }
        $hei = HEI::find($id);
        if (is_null($hei)) {
            //not found
            return redirect('hei/view');
        } else {
            $url = url('/hei/update') . "/" . $id;
            $title = "Hei Update";
            $data = compact('url', 'title', 'hei');
            return view('admin.hei')->with($data);
        }
    }

    public function update($id, Request $request)
    {
        $hei = HEI::find($id);
        if (is_null($hei)) {
            //Not Found
            return redirect('hei/view');
        } else {
            $request->validate([
                'title' => 'required',
            ]);
            $hei->title = $request['title'];
        }
        $hei->save();

        return redirect('hei/view');
    }
}

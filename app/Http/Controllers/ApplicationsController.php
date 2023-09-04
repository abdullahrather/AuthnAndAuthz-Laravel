<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\HEI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ApplicationsController extends Controller
{
    public function index()
    {
        if (! Gate::allows('admin-hei')) {
            abort(403);
        }
        $url = url('/application');
        $application = new Application();
        $title = "Application";
        $heis = HEI::all();
        $data = compact('url', 'title', 'application', 'heis');
        return view('admin.applications')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'hei_id' => 'required',
                'title' => 'required',
            ]
        );

        // Retrieve all HEIs
        $heis = HEI::all();

        //Insert Query
        $application = new Application();
        $application->hei_id = $request['hei_id'];
        $application->title = $request['title'];
        $application->save();

        return redirect('/application/view');
    }

    public function view(Request $request)
    {
        $title = "Applications List";
        $search = $request['search'] ?? "";
        if ($search != "") {
            //where
            $applications = Application::where('title', 'LIKE', "%$search%")->orwhere('hei_id', 'LIKE', "%$search%")->Paginate(5);
        } else {
            $applications = Application::orderBy('title')->Paginate(5);
        }

        $data = compact('applications', 'search', 'title');
        return view("admin.applications-view")->with($data);
    }

    //Delete Query
    public function delete($id)
    {
        $application = Application::find($id);
        if (!is_null($application)) {
            $application->delete();
        }
        return redirect('application/view');
    }

    public function edit($id)
    {
        if (! Gate::allows('admin-aic')) {
            abort(403);
        }
        $application = Application::find($id);
        if (is_null($application)) {
            //not found
            return redirect('application/view');
        } else {
            $url = url('/application/update') . "/" . $id;
            $title = "Update";
            $heis = HEI::all();
            $data = compact('url', 'title', 'application', 'heis');
            return view('admin.applications')->with($data);
        }
    }

    public function update($id, Request $request)
    {
        $application = Application::find($id);
        $application->hei_id = $request['hei_id'];
        $application->title = $request['title'];
        $application->save();

        return redirect('application/view');
    }
}

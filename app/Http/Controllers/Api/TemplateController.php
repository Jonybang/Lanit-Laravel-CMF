<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use \Response;
use \Auth;
use \App\User;
use \App\Template;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TemplateController extends Controller
{
    public function index()
    {
        return Response::json(
            Template::all()->toArray(),
            200
        );
    }
    public function show($id)
    {
        return Response::json(
            Template::find($id)->toArray(),
            200
        );
    }
    public function store(Request $request)
    {
        $data = $request->all();

        return Response::json(
            Template::create($data)->toArray(),
            200
        );
    }
    public function update(Request $request)
    {
        $data = $request->all();
        $is_saved = Template::find($data['id'])->update($data);

        return Response::json(
            Template::find($data['id']),
            $is_saved ? 200 : 400
        );
    }
    public function destroy($id)
    {
        $is_destroyed = Template::destroy($id);

        return Response::json(
            $is_destroyed ? 200 : 400
        );
    }
}

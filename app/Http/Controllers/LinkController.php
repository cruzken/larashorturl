<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function show($hash)
    {
        return Link::where('hash', '=', $hash)->get();
    }

    public function store(Link $link)
    {
        $this->validate(request(), [
            'url' =>  'required'
        ]);

        $url = request('url');
        $hash = str_random(4);
        $linker = new Link;

        $linker->addLink(
            compact('url', 'hash')
        );

        return redirect()->route('home')->with('hash', $hash);
    }
}
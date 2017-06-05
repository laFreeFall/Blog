<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tag;

class TagsController extends Controller
{
    public function index() {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    /**
     * @param Tag $tag
     * @return Tag
     */
    public function show(Tag $tag) {
        $articles = $tag->articles()->latest()->get();
        return view('articles.index', compact('articles', 'tag'));
    }

    //DONE: make a list in top menu 'Tags' which will redirect onto index tags page displaying all existing tags (ofcuz clickables)
    //DONE: display tags on index page
    //DONE: make tags clickable on both index and show page
    //TODO: fix error while adding an article with no tags (and update with no tags if it previously had it)
}

<?php

namespace App\Http\Controllers\Api;

use App\Tag;
use App\RealWorld\Transformers\TagTransformer;
use Illuminate\Support\Facades\DB;

class TagController extends ApiController
{
    /**
     * TagController constructor.
     *
     * @param TagTransformer $transformer
     */
    public function __construct(TagTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * Get all the tags.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // $tags = Tag::all()->pluck('name');

        $tags = DB::table('tags')->select('name', DB::raw('count(*) as total'))->groupBy('name')->get();

        return $this->respondWithTransformer($tags);
    }
}

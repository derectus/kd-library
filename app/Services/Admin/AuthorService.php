<?php

namespace App\Services\Admin;

use App\Models\Author;
use Exception;
use Illuminate\Http\Request;


class AuthorService
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $author = Author::create([
            'name' => $name,
            'slug' => str_slug($name)
        ]);

        return $author;
    }

    /*
    * Update the specified resource in storage.
    *
    * @param string $name
    * @param int $id
    */
    public function update($name, $id)
    {
        $author = Author::findOrFail($id)->update([
            'name' => $name,
            'slug' => str_slug($name)
        ]);

        return $author;

    }
}

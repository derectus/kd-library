<?php

namespace App\Services\Admin;

use App\Models\Publisher;
use Exception;
use Illuminate\Http\Request;


class PublisherService
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
        $publisher = Publisher::create([
            'name' => $name,
            'slug' => str_slug($name)
        ]);

        return $publisher;
    }

    /*
    * Update the specified resource in storage.
    *
    * @param string $name
    * @param int $id
    */
    public function update($name, $id)
    {
        $publisher = Publisher::findOrFail($id)->update([
            'name' => $name,
            'slug' => str_slug($name)
        ]);

        return $publisher;

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Step;
use Illuminate\Http\Request;

class StepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        request()->validate([
            'description' => ['required', 'max:50'],
        ]);
        Step::create(['description' => $request->description, 'article_id' => $request->article_id]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Step $step
     * @return \Illuminate\Http\Response
     */
    public function show(Step $step)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Step $step
     * @return \Illuminate\Http\Response
     */
    public function edit(Step $step)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Step $step
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Step $step): \Illuminate\Http\RedirectResponse
    {
        $step->update(['completed' => $request->has('completed')]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Step $step
     * @return \Illuminate\Http\Response
     */
    public function destroy(Step $step)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
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
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar
        $request->validate([
            'nombre'=>['required', 'min:3', 'unique:articles,nombre'],
            'descripcion'=>['required', 'min:10'],
            'pvp'=>['required','max:999'],
            'stock'=>['required', 'min:0']
        ]);

        // Guardar imagen
        $rutaNombre = $request->imagen->store('articles');

        // Guardar artículo en la bdd
        Article::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'pvp'=>$request->pvp,
            'stock'=>$request->stock,
            'slug'=>Str::slug($request->nombre),
            'imagen'=>$rutaNombre,
            'user_id'=>auth()->user()->id,
        ]);

        return redirect()->route('dashboard')->with('mensaje', 'Artículo creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function showGuest(Article $article){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        // Validar
        $request->validate([
            'nombre'=>['required', 'min:3', 'unique:articles,nombre,'.$article->id],
            'descripcion'=>['required', 'min:10'],
            'pvp'=>['required','max:999'],
            'stock'=>['required', 'min:0']
        ]);

        // Comprobar si la imagen ha cambiado, asignar la nueva y borrar la antigua.
        $rutaNombre = ($request->imagen) ? $request->imagen->store('articles') : $article->imagen;

        if($request->imagen)
            Storage::delete($article->imagen);

        // Guardar post
        $article->update([
            'nombre'=>$request->nombre,
            'slug'=>Str::slug($request->nombre),
            'descripcion'=>$request->descripcion,
            'pvp'=>$request->pvp,
            'stock'=>$request->stock,
            'imagen'=>$rutaNombre,
            'user_id'=>auth()->user()->id
        ]);

        // Redirigir
        return redirect()->route('dashboard')->with('mensaje', "Artículo actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        Storage::delete($article->imagen);
        $article->delete();

        return redirect()->route('dashboard')->with('mensaje', 'Artículo borrado');
    }
}

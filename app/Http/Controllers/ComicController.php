<?php

namespace App\Http\Controllers;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $form_data = $request->all();
        $form_data = $this->validation($request->all());

        $newComic = new Comic();

            $newComic->fill($form_data);

        $newComic->save();

        return redirect()->route('comics.show', ['comic' => $newComic->id])->with('status', 'Card aggiunta con successo');;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        //$comic = Comic::findOrFail($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        //$comic = Comic::findOrFail($id);
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        //$comic = Comic::findOrFail($id);
        $form_data = $this->validation($request->all());
        $form_data = $request->all();
        $comic->update($form_data);

        return redirect()->route('comics.show', ['comic' => $comic->id])->with('status', 'Card Aggiornata!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        //$comic = Comic::findOrfail($id);
        $comic->delete();

        return redirect()->route('comics.index', ['comic' => $comic->id]);
    }

    private function validation($data) {

        $validator = Validator::make(
            $data,
            [
                'title'=>'required|max:50',
                'description'=>'nullable|max:1000',
                'thumb'=>'required|url|max:255',
                'price'=>'required',
                'series'=>'required|max:100',
                'sale_date'=>'required|date',
                'type'=>'required|max:50'
            ],
            [
                'title.required' => "Titolo richiesto",
                'title.max' => "Deve aver massimo 50 caratteri di lunghezza",
                'description.max' => "Deve aver massimo 255 caratteri di lunghezza",
                'thumb.required' => "L'url dell'immagine è richiesta",
                'thumb.url' => "Deve essere un url valida (ex. https://.....)",
                'thumb.max' => "Deve aver massimo 255 caratteri di lunghezza",
                'price.required' => "Prezzo richiesto",
                'series.required' => "Serie Comic richiesta",                'cooking_time.max' => "Il tempo di cottura deve essere al massimo di 10 caratteri",
                'series.max' => "Deve aver massimo 100 caratteri di lunghezza",
                'sale_date.required' => "Data di acquisto richiesta",                'cooking_time.max' => "Il tempo di cottura deve essere al massimo di 10 caratteri",
                'sale_date.date' => "Deve essere un formato di data valido (ex. 2023-05-19)",
                'type.required' => "Tipo richiesto",                'cooking_time.max' => "Il tempo di cottura deve essere al massimo di 10 caratteri",
                'type.max' => "Deve aver massimo 50 caratteri di lunghezza",
            ]
        )->validate();

        return $validator;

    }
}

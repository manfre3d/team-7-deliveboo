<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Plate;

// facade used for user authentication
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        // richiamo al metodo che definisce la relazione tra user e plates nel model
        $plates = $user['plates'];

        return view('admin.plate.index', compact('plates')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plate.create');
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
        
        // verifica se è stata caricata un'immagine
        if(array_key_exists('image', $form_data)) {

            // salviamo in $cover_path l'immagine (questo processo modifica il nome dell'immagine)
            // e recuperiamo il path / percorso dell'immagine.
            // il metodo richiamato va a creare la cartella plates_covers in storage, e gli va a mettere
            // il path dell'immagine tramite $form_data['image']
            $coverPath=Storage::put('plates_covers',$form_data['image']);
        
        
            // aggiungiamo all'array $form_data che viene usato nella funzione fill (nel punto precedente)
            // "la chiave / un nuovo indice" cover
            // che contiene il persorso relativo dell'imagine caricata
            // a partire da public/storage
            $form_data['img_path'] = $coverPath;
        }
        $newPlate= new Plate();
        $newPlate->fill($form_data);

        $newPlate->user_id = Auth::id();


        $newPlate->save();


        return redirect()->route("admin.plate.index")->with('success',"Il piatto è stato creato");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        if( $plate->user_id != Auth::id() ) {
            abort("403");
        }

        return view("admin.plate.show", compact("plate"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {
        if( $plate->user_id != Auth::id() ) {
            abort("403");
        }
        return view('admin.plate.update','plate');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plate $plate)
    {
        $form_data = $request->all();
        
        // verifica se è stata caricata un'immagine
        if(array_key_exists('image', $form_data)) {

            // in caso il piatta ha già un'immagine 
            if($plate->img_path){
                // cancella il path dell'img nel db
                Storage::delete($plate->img_path);
            }
            // salviamo in $cover_path l'immagine (questo processo modifica il nome dell'immagine)
            // e recuperiamo il path / percorso dell'immagine.
            // il metodo richiamato va a creare la cartella plates_covers in storage, e gli va a mettere
            // il path dell'immagine tramite $form_data['image']
            $coverPath=Storage::put('plates_covers',$form_data['image']);
        
        
            // aggiungiamo all'array $form_data che viene usato nella funzione fill (nel punto precedente)
            // "la chiave / un nuovo indice" cover
            // che contiene il persorso relativo dell'imagine caricata
            // a partire da public/storage
            $form_data['img_path'] = $coverPath;
        }
        $plate->uptda($form_data);


        return redirect()->route("admin.plate.index")->with('success',"Il piatto è stato modificato");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {   
        if($plate->img_path){
            // cancella il path dell'img nel db
            Storage::delete($plate->img_path);
        }
        $plate->delete();
        return redirect()->route("admin.plate.index");
    }
}

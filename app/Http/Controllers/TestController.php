<?php

namespace App\Http\Controllers;

use App\Models\CEO\BeeDoc;
use App\Models\File;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Play a Test or Another Thing.
     */
    public function index(Request $request){
        $count = $request->get('count',25);
        /**
         * SELECT ALL BEEDOCS
         */
        $list = BeeDoc::where('conteudo_edicao','!=','deprecated')->limit($count)->get(); // Limit of 25
        $count = count($list);
        // Foreach Item
        foreach($list as $item){
            // Download the "conteudo_publicado" data to a file, located in bee_conta folder
            $store = \Storage::disk("digitalocean")->put("beedocs/".$item->bee_conta."/preversion/".$item->id.".bap", $item->conteudo_publicado);
            // Check if it's stored
            if($store){
                // Update the Item 'conteudo_edicao'
                $item->conteudo_edicao = 'deprecated';
                // Save
                $item->save();
            }
        }
        dd("Finished ".$count." itens");
    }
}

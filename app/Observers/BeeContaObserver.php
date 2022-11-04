<?php

namespace App\Observers;

use App\Models\Hive\BeeConta;

class BeeContaObserver
{
    /**
     * Handle the BeeConta "created" event.
     *
     * @param \App\Models\Hive\BeeConta $beeConta
     * @return void
     */
    public function created(BeeConta $beeConta)
    {

    }

    /**
     * Handle the BeeConta "updated" event.
     *
     * @param \App\Models\Hive\BeeConta $beeConta
     * @return void
     */
    public function updated(BeeConta $beeConta)
    {
        /** Forçar a remoção do arquivo antigo, caso altere **/
        if (!$beeConta->originalIsEquivalent('imagem_perfil')) {
            \Storage::delete($beeConta->getOriginal('imagem_perfil'));
        }
    }

    /**
     * Handle the BeeConta "deleted" event.
     *
     * @param \App\Models\Hive\BeeConta $beeConta
     * @return void
     */
    public function deleted(BeeConta $beeConta)
    {

    }

    /**
     * Handle the BeeConta "restored" event.
     *
     * @param \App\Models\Hive\BeeConta $beeConta
     * @return void
     */
    public function restored(BeeConta $beeConta)
    {
        //
    }

    /**
     * Handle the BeeConta "force deleted" event.
     *
     * @param \App\Models\Hive\BeeConta $beeConta
     * @return void
     */
    public function forceDeleted(BeeConta $beeConta)
    {
        //
    }
}

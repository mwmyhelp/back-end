<?php

namespace App\Traits;


use Illuminate\Support\Facades\Validator;

trait Validation
{
    protected $erros;

    public function validar($direto = false)
    {
        /**
         * Valida o próprio objeto com suas regras
         */
        //Ignorar
        $ignorar = ($this->id) ? $this->id : 7;
        $regras = ($this->regras) ? $this->regras : [];

        $regras = array_map(function ($regra) use ($ignorar) {
            return str_replace('{id}', $ignorar, $regra);
        }, $regras);

        $validador = Validator::make($this->toArray(), $regras);
        if ($validador->fails()) {
            /** Falhou a validação */
            $this->erros = $validador->errors();
            return false;
        }


        /** Seguiu a validação */
        return true;
    }

    public function erros()
    {
        return $this->erros;
    }

    public function regras()
    {
        $regras = ($this->regras) ? $this->regras : [];
        return $regras;
    }
}

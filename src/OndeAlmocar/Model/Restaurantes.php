<?php

namespace OndeAlmocar\Model;

class Restaurantes
{

    private $restaurante;
    private $path_restaurente_hoje;

    public function __construct()
    {

        $this->path_restaurente_hoje = __DIR__.'/../../../app/data/restaurante_hoje.txt';
        $this->path_restaurentes     = __DIR__.'/../../../app/data/restaurantes.txt';

        if(!file_exists($this->path_restaurente_hoje)){
            throw new \Exception('File not found');
        }

        if(!file_exists($this->path_restaurentes)){
            throw new \Exception('File not found');
        }

        $this->atualiza_restaurante_hoje();

    }

    public function getRestaunteHoje()
    {
        return trim(file_get_contents($this->path_restaurente_hoje));
    }

    private function atualiza_restaurante_hoje()
    {
        $data_arquivo = date ('Y-m-d', filemtime($this->path_restaurente_hoje));
        if($data_arquivo == date('Y-m-d')) return;

        $this->grava_restaurante_hoje($this->getRestauranteRandom());

    }

    private function getRestauranteRandom()
    {

        $restaurantes = explode("\n", (file_get_contents($this->path_restaurentes)));

        if(($key = array_search($this->getRestaunteHoje(), $restaurantes)) !== false) {
            unset($restaurantes[$key]);
        }

        $restaurantes = array_map('trim', $restaurantes);
        $key          = array_rand($restaurantes);

        return $restaurantes[$key];
    }

    private function grava_restaurante_hoje($restaurante)
    {
        file_put_contents($this->path_restaurente_hoje, trim($restaurante));
    }

}
<?php

namespace OndeAlmocar\Models;

use \Silex\Application;
use \Symfony\Component\HttpFoundation\Request;

class Restaurantes
{

    private $restaurante;
    private $path_restaurente_hoje;
    private $app;

    public function __construct(Request $request, Application $app)
    {

        $this->path_restaurente_hoje = __DIR__.'/../../../app/data/restaurante_hoje.txt';
        $this->path_restaurentes     = __DIR__.'/../../../app/data/restaurantes.txt';
        $this->app = $app;

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
       // if($data_arquivo == date('Y-m-d')) return;

        $this->grava_restaurante_hoje($this->getRestauranteRandom());

    }

    private function getRestauranteRandom()
    {

        $sql    = "SELECT * FROM restaurantes WHERE nome <> ?";
        $result =  $this->app['db']->fetchAssoc($sql, array((string) $this->getRestaunteHoje()));


        $restaurantes = array_map('trim', $result);
        $key          = array_rand($restaurantes);

        return $restaurantes[$key];
    }

    private function grava_restaurante_hoje($restaurante)
    {
        file_put_contents($this->path_restaurente_hoje, trim($restaurante));
    }

}
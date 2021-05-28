<?php

//creamos clase sencilla para los vuelos
class Vuelo
{
    //propiedades
    // como se trata de una clase de paso,
    //es decir, solo servirá como una clase contenedora
    // necesitamos que las propiedades sean públicas
    public $id;
    public $origen;
    public $destino;
    public $duracion;
    //constructor
    public function __construct(string $id, string $origen, string $destino, string $duracion)
    {
        $this->id = $id;
        $this->origen = $origen;
        $this->destino = $destino;
        $this->duracion = $duracion;
    }
    //no necesitamos getters ni setters
}
        
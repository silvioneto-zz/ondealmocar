<?php

namespace OndeAlmocar\Entity;

/**
 * Restaurantes
 *
 * @Table(name="restaurantes")
 * @Entity
 */
class Restaurantes
{
    /**
     * @var integer
     *
     * @Column(name="idRestaurante", type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idRestaurante;

    /**
     * @var string
     *
     * @Column(name="nome", type="string", length=255, nullable=false)
     */
    private $nome;

    /**
     * Get idRestaurante
     *
     * @return integer
     */
    public function getIdRestaurante()
    {
        return $this->idRestaurante;
    }


    /**
     * Set nome
     *
     * @param string $nome
     * @return Restaurantes
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

}
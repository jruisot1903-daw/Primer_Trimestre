<?php
abstract class InstrumentoBase{
    //Declaramos el atributo tipo cadena y edad
    private  string $_descripcion;
    protected int $_edad = 10;


    //Declaracion cont de cuantos se han crado
    protected static int $cont = 0; // tenemos que volverlo statica ya que sera la que lleve la cuenta global
    public int $instancia = 0; 
    //Vamos a crearle el constructor

    // Constructores

     public function __construct(string $_descripcion , int $_edad = 10)
    {
        $this->_descripcion = $_descripcion;
        $this-> _edad = $_edad;
        self::$cont++;                 
        $this->instancia = self::$cont;
    }

    // Le creo el get y el set de la propiedad descripcion y edad el get

    //Getters and Setters

    public function getDescripcion(){
        return $this->  _descripcion;
    }

    public function setDescripcion($descripcion){
        $this->_descripcion = $descripcion;
    }

    public function getEdad(){
        return $this -> _edad;
    }


    // Metodos
   abstract public function sonido();

   abstract public function afinar();

    public function envejecer(){
        $this->_edad++;
    }


    //Metodo "toString"
    public function __toString(): string{
        return "<br>Instrumento con descripción  ".$this-> _descripcion.", instancia ".$this->instancia." de un total de ".self::$cont." .Tiene ".$this->_edad." año(s). La clase es ". get_class($this)."<br>";
    }

}

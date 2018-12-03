<?php

declare(strict_types = 1);

abstract class Vehicle
{
    protected   $id,
                $brand,
                $type,
                $color,
                $spec,
                $doors;

        /**
     * constructor
     *
     * @param array $array
     */
    public function __construct(array $array)
    {
        $this->hydrate($array);
    }

    /**
     * Hydratation
     *
     * @param array $donnees
     */
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            // On récupère le nom du setter correspondant à l'attribut.
            if (is_string($key)) {
                $method = 'set'.ucfirst($key);
            }
                
            // Si le setter correspondant existe.
            if (method_exists($this, $method))
            {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

    /**
     * SETTERS
     */
    
     /**
      * Set ID
      *
      * @param int $id
      * @return self
      */
       public function setId($id)
    {
        $id = (int) $id;

        if ($id > 0)
        {
            $this->id = $id;
        }

        return $this;
    }

    /**
     * Set brand
     *
     * @param string $brand
     * @return self
     */
     public function setBrand(string $brand)
    {
        if (is_string($brand))
        {
            $this->brand = $brand;
        }

        return $this;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return self
     */
      public function setColor(string $color)
    {
        if (is_string($color))
        {
            $this->color = $color;
        }

        return $this;
    }

    /**
     * Set Specialities
     *
     * @param string $spec
     * @return self
     */
      public function setSpec(string $spec)
    {
        if (is_string($spec))
        {
            $this->spec = $spec;
        }

        return $this;
    }

      /**
     * Set Type
     *
     * @param string $type
     * @return self
     */
      public function setType(string $type)
    {
        if (is_string($type))
        {
            $this->type = $type;
        }

        return $this;
    }
    
    /**
     * Set numbers of doors
     *
     * @param int $doors
     * @return void
     */
      public function setDoors($doors)
    {
        $doors = (int) $doors;
        $this->doors = $doors;
        return $this->doors;
    }

    /**
     * GETTERS
     */

    /**
     * Get the value of the id
     *
     */
        public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of the brand
     *
     */
       public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Get the value of the color
     *
     */
       public function getColor()
    {
        return $this->color;
    }

    /**
     * Get the value of the spec
     *
     */
       public function getSpec()
    {
        return $this->spec;
    }

      /**
    * Get the type
    *
    */

    public function getType()
    {
        return $this->type;
    }


    /**
    * Get value of doors
    *
    */

    public function getDoors()
    {
        return $this->doors;
    }

}
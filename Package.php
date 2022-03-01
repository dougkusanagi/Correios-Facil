<?php

class Package{
    private string $weight;
    private string $height;
    private string $width;
    private string $length;
    private string $diameter;
    private string $format = '1';

    /**
     * Get the value of weight
     */ 
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set the value of weight
     *
     * @return  self
     */ 
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get the value of height
     */ 
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set the value of height
     *
     * @return  self
     */ 
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get the value of width
     */ 
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set the value of width
     *
     * @return  self
     */ 
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get the value of length
     */ 
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set the value of length
     *
     * @return  self
     */ 
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get the value of diameter
     */ 
    public function getDiameter()
    {
        return $this->diameter;
    }

    /**
     * Set the value of diameter
     *
     * @return  self
     */ 
    public function setDiameter($diameter)
    {
        $this->diameter = $diameter;

        return $this;
    }

    /**
     * Get the value of format
     */ 
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set the value of format
     *
     * @return  self
     */ 
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }
}
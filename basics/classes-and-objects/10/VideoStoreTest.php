<?php

class VideoStoreTest extends VideoStore
{
    public function __construct()
    {
        $this->addVideo("The Matrix");
        $this->addVideo("Godfather II");
        $this->addVideo("Star Wars Episode IV: A New Hope");
        $this->rate("The Matrix", 5);
        $this->rate("The Matrix", 3);
        $this->rate("The Matrix", 2);
        $this->rate("The Matrix", 4);
        $this->rate("Godfather II", 5);
        $this->rate("Godfather II", 3);
        $this->rate("Godfather II", 3);
        $this->rent("Star Wars Episode IV: A New Hope");
        $this->return("Star Wars Episode IV: A New Hope");
        $this->rent("Godfather II");
    }
}
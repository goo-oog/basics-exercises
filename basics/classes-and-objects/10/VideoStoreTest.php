<?php

class VideoStoreTest extends VideoStore
{
    public function __construct()
    {
        $this->addVideo(new Video('The Matrix'));
        $this->addVideo(new Video('Godfather II'));
        $this->addVideo(new Video('Star Wars Episode IV: A New Hope'));
        $this->rate('The Matrix', 5);
        $this->rate('The Matrix', 3);
        $this->rate('The Matrix', 2);
        $this->rate('The Matrix', 4);
        $this->rate('Godfather II', 5);
        $this->rate('Godfather II', 3);
        $this->rate('Godfather II', 3);
        $this->rent('Star Wars Episode IV: A New Hope');
        $this->return('Star Wars Episode IV: A New Hope');
        $this->rent('Godfather II');
    }
}

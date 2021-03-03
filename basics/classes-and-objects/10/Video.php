<?php

class Video
{
    private string $title;
    private bool $isAvailable = true;
    private object $ratings;

    public function __construct(string $title)
    {
        $this->title = $title;
        $this->ratings = (object)['numOfRatings' => 0, 'sumOfRatings' => 0];
    }

    public function title(): string
    {
        return $this->title;
    }

    public function isAvailable(): bool
    {
        return $this->isAvailable;
    }

    public function getAvgRating(): string
    {
        if ($this->ratings->numOfRatings !== 0) {
            return sprintf('%0.1f', $this->ratings->sumOfRatings / $this->ratings->numOfRatings);
        }
        return '———';
    }

    public function info(): string
    {
        return sprintf("$this->title   Rating: %s   Available: %s\n", $this->getAvgRating(), $this->isAvailable ? 'yes' : 'no');
    }

    public function rent(): void
    {
        $this->isAvailable = false;
    }

    public function return(): void
    {
        $this->isAvailable = true;
    }

    public function rate(int $rating): void
    {
        $this->ratings->numOfRatings++;
        $this->ratings->sumOfRatings += $rating;
    }
}

<?php

class VideoStore
{
    private array $videos = [];

    public function videos(): array
    {
        return $this->videos;
    }

    public function listVideos(): string
    {
        $list = '';
        foreach ($this->videos as $video) {
            $list .= $video->info();
        }
        return strlen($list) > 0 ? $list . "\n" : "Empty store\n\n";
    }

    public function addVideo(string $title): void
    {
        $this->videos[] = new Video($title);
    }

    public function rent(string $title): void
    {
        foreach ($this->videos as $i => $video) {
            if ($video->title() === $title) $this->videos[$i]->rent();
        }
    }

    public function return(string $title): void
    {
        foreach ($this->videos as $i => $video) {
            if ($video->title() === $title) $this->videos[$i]->return();
        }
    }

    public function rate(string $title, int $rating): void
    {
        foreach ($this->videos as $i => $video) {
            if ($video->title() === $title) $this->videos[$i]->rate($rating);
        }
    }
}
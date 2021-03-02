<?php
/*## Exercise #4
The class Movie is started below. An instance of class Movie represents a film.
This class has the following three class variables:
 - *title*, which is a string representing the title of the movie
    - *studio*, which is a string representing the studio that made the movie
    - *rating*, which is a string representing the rating of the movie (i.e. PG­13, R, etc)

1. Write a constructor for the class Movie, which takes the title of the movie,
   studio, and rating as its arguments, and sets the respective class variables to these values.
2. Write a second constructor for the class Movie, which takes the title of the movie
   and studio as its arguments, and sets the respective class variables to these values,
   while the class variable rating is set to "PG".
3. Write a method GetPG, which takes an array of base type Movie as its argument,
   and returns a new array of only those movies in the input array with a rating of "PG".
   You may assume the input array is full of Movie instances. The returned array may be empty.
4. Write a piece of code that creates an instance of the class Movie:
    - with the title “Casino Royale”, the studio “Eon Productions” and the rating “PG­13”;
    - with the title “Glass”, the studio “Buena Vista International” and the rating “PG­13”;
    - with the title “Spider-Man: Into the Spider-Verse”, the studio “Columbia Pictures” and the rating “PG”.*/

class Movie
{
    private string $title;
    private string $studio;
    private string $rating;

    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getStudio(): string
    {
        return $this->studio;
    }

    public function getRating(): string
    {
        return $this->rating;
    }
}

$movies = [
    new Movie('Casino Royale', 'Eon Productions', 'PG13'),
    new Movie('Glass', 'Buena Vista International', 'PG13'),
    new Movie('Spider-Man: Into the Spider-Verse', 'Columbia Pictures', 'PG')
];
function getPG(array $movies): array
{
    return array_filter($movies, fn(Movie $movie) => $movie->getRating() === 'PG');
}

foreach (getPG($movies) as $movie) {
    echo "Title: " . $movie->getTitle() . "  Studio: " . $movie->getStudio() . "  Rating: " . $movie->getRating() . PHP_EOL;
}
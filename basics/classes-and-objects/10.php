<?php
//## Exercise #10
// VIDEO STORE

class Video
{
    private string $title;
    private bool $isAvailable = true;
    private object $ratings;

    public function __construct(string $title)
    {
        $this->title = $title;
        $this->ratings = (object)['numOfRatings' => null, 'sumOfRatings' => null];
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
        if ($this->ratings->numOfRatings != 0) {
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

class Application
{
    private object $store;

    public function __construct()
    {
        $this->store = new VideoStore();
    }

    public function run(): void
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";
            echo "Choose t to load the test movie database\n";

            $command = readline('>> ');
            switch ($command) {
                case '0':
                    echo "Bye!";
                    die;
                case '1':
                    $this->add_movies();
                    break;
                case '2':
                    $this->rent_video();
                    break;
                case '3':
                    $this->return_video();
                    break;
                case '4':
                    $this->list_inventory();
                    readline("Press 'enter' to continue...");
                    break;
                case 't':
                    $this->test();
                    break;
                default:
                    echo "Enter 0 to 4 or t!\n";
                    sleep(1);
            }
        }
    }

    private function add_movies(): void
    {
        $title = readline('To add movie, enter its title: ');
        if (strlen($title) > 0) {
            $this->store->addVideo($title);
        }
    }

    private function rent_video(): void
    {
        do {
            $title = readline('Title of movie to rent: ');
            if (strlen($title) == 0) break;
            foreach ($this->store->videos() as $i => $video) {
                if ($video->title() === $title && $video->isAvailable()) {
                    $this->store->rent($title);
                    $done = true;
                }
            }
        } while (!isset($done));
    }

    private function return_video(): void
    {
        do {
            $title = readline('Title of movie to return: ');
            if (strlen($title) == 0) break;
            foreach ($this->store->videos() as $i => $video) {
                if ($video->title() === $title && $video->isAvailable() === false) {
                    $this->store->return($title);
                    $done = true;
                }
            }
        } while (!isset($done));
    }

    private function list_inventory(): void
    {
        echo $this->store->listVideos();
    }

    public function test(): void
    {
        $testStore = new VideoStore();
        $testStore->addVideo("The Matrix");
        $testStore->addVideo("Godfather II");
        $testStore->addVideo("Star Wars Episode IV: A New Hope");
        $testStore->rate("The Matrix", 5);
        $testStore->rate("The Matrix", 3);
        $testStore->rate("The Matrix", 2);
        $testStore->rate("The Matrix", 4);
        $testStore->rate("Godfather II", 5);
        $testStore->rate("Godfather II", 3);
        $testStore->rate("Godfather II", 3);
        $testStore->rent("Star Wars Episode IV: A New Hope");
        $testStore->return("Star Wars Episode IV: A New Hope");
        $testStore->rent("Godfather II");
        $this->store = $testStore;
    }
}

$app = new Application();
$app->run();
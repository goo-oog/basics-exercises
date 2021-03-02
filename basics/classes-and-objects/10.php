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
            echo "Choose 4 to rate video (as user)\n";
            echo "Choose 5 to list inventory\n";
            echo "Choose t to load the test movie database\n";

            $command = readline('>> ');
            switch ($command) {
                case '0':
                    exit("Bye!");
                case '1':
                    $this->addVideo();
                    break;
                case '2':
                    $this->rentVideo();
                    break;
                case '3':
                    $this->returnVideo();
                    break;
                case '4':
                    $this->rateVideo();
                    break;
                case '5':
                    $this->listVideos();
                    break;
                case 't':
                    $this->loadTestDB();
                    break;
                default:
                    echo "Enter 0 to 4 or t!\n";
                    sleep(1);
            }
        }
    }

    private function addVideo(): void
    {
        $title = readline('To add movie, enter its title: ');
        if (strlen($title) > 0) {
            $this->store->addVideo($title);
        }
    }

    private function rentVideo(): void
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

    private function returnVideo(): void
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

    private function rateVideo(): void
    {
        do {
            $title = readline('Title of movie to rate: ');
            if (strlen($title) == 0) break;
            foreach ($this->store->videos() as $i => $video) {
                if ($video->title() === $title) {
                    do {
                        $rating = filter_var(readline("Enter 1-5 to rate '$title' or 0 to not: "), FILTER_VALIDATE_INT, ['options' => ['min_range' => 0, 'max_range' => 5]]);
                        if ($rating == 0) break;
                    } while (!$rating);
                    if ($rating == 0) break;
                    $this->store->rate($title, $rating);
                    $done = true;
                }
            }
            if ($rating == 0) break;
        } while (!isset($done));
    }

    private function listVideos(): void
    {
        echo $this->store->listVideos();
        readline("Press 'enter' to continue...");
    }

    private function loadTestDB(): void
    {
        $this->store = new VideoStoreTest();
        echo "Test database loaded\n";
        sleep(1);
    }
}

$app = new Application();
$app->run();
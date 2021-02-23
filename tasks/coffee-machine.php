<?php

class Drink
{
    public string $name;
    public int $price;

    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}

$drinks[] = new Drink('Melna kafija', 99);
$drinks[] = new Drink('Balta kafija', 108);
$drinks[] = new Drink('Espresso', 98);
$drinks[] = new Drink('Kakao', 85);
$drinks[] = new Drink('Zelta kafija', 500);

$wallet = ['1' => 1, '2' => 1, '5' => 1, '10' => 1, '20' => 1, '50' => 1, '100' => 1, '200' => 1];

echo "\033[2J"; // "clear" screen
echo "\n\x1B[1;44;37m       Kafijas automāts       \x1B[0m\n\n";
foreach ($drinks as $i => $drink) {
    echo "\x1B[1;44;37m " . ($i + 1) . " \x1B[0m  " . $drink->name . (strlen($drink->name) < 10 ? "\t\t" : "\t");
    echo sprintf("%0.2f €\n\n", $drink->price / 100);
}
$allMoney = 0;
foreach ($wallet as $denomination => $count) {
    $allMoney += $denomination * $count;
}
echo "\x1B[1;44;37m 0 \x1B[0m  Iziet\t Nauda: \x1B[1;43;97m" . $allMoney / 100 . " €\x1B[0m\n\n";


while (!isset($isChoiceMade)) {
    $choice = getInput('Lūdzu izvēlieties dzērienu: ', '/^[0-' . count($drinks) . ']$/', "Dzēriens ar šādu numuru neeksistē. Mēģiniet vēlreiz!\n");
    if ($drinks[$choice - 1]->price > $allMoney) {
        echo "Jums pietrūkst naudas, lai iegādātos šo dzērienu. Mēģiniet vēlreiz!\n";
    } else {
        $isChoiceMade = true;
    }
}

$paid = 0;
while ($paid < $drinks[$choice - 1]->price) {
    printChoice($drinks, $choice, $paid);
    $pattern = printWallet($wallet);
    $payment = getInput('Metiet monētas pa vienai, ievadot tās vērtību centos: ', $pattern, "Jums nav monētas ar šādu vērtību. Mēģiniet vēlreiz!\n");
    $paid += $payment;
    $wallet[$payment]--;
}

$change = $paid - $drinks[$choice - 1]->price;
if ($change > 0) {
    foreach (array_reverse($wallet, true) as $denomination => $count) {
        while ($change - $denomination >= 0) {
            $change -= $denomination;
            $wallet[$denomination]++;
        }
    }
}

printChoice($drinks, $choice, $paid);
printWallet($wallet);
echo "\x1B[1;97;47m Paldies par pirkumu! \x1B[0m\n\n";

function printChoice(array $drinks, int $choice, int $paid): void
{
    echo "\033[2J"; // "clear" screen
    echo "\nJūsu izvēle : \x1B[1;44;37m {$drinks[$choice-1]->name}  \x1B[0m";
    echo sprintf(" Cena: \x1B[1;44;37m %0.2f \x1B[0m € ", $drinks[$choice - 1]->price / 100);
    if ($paid < $drinks[$choice - 1]->price) {
        echo sprintf(" Samaksāts: \x1B[1;41;97m %0.2f \x1B[0m € ", $paid / 100);
        echo sprintf(" Jāmaksā: \x1B[1;41;97m %0.2f \x1B[0m €", ($drinks[$choice - 1]->price - $paid) / 100);
    } else if ($paid > $drinks[$choice - 1]->price) {
        echo sprintf(" Samaksāts: \x1B[1;42;97m %0.2f \x1B[0m € ", $paid / 100);
        echo sprintf(" Atlikums: \x1B[1;42;97m %0.2f \x1B[0m €", ($drinks[$choice - 1]->price - $paid) / -100);
    } else {
        echo sprintf(" Samaksāts: \x1B[1;42;97m %0.2f \x1B[0m € ", $paid / 100);
    }
}

function printWallet(array $wallet): string
{
    $pattern = '/^(0|';
    $allMoney = 0;
    foreach ($wallet as $denomination => $count) {
        $allMoney += $denomination * $count / 100;
    }
    echo sprintf("\n\nJūsu makā ir šādas monētas par kopējo summu \x1B[1;43;97m %0.2f \x1B[0m € :\n\n", $allMoney);
    foreach ($wallet as $denomination => $count) {
        if ($count > 0) {
            echo "\x1B[1;43;97m $denomination \x1B[0m x $count   ";
        } else {
            echo "\x1B[1;47;30m $denomination \x1B[0m x $count   ";
        }

        if ($count > 0) {
            $pattern .= "$denomination|";
        }
    }
    echo "\n\n\x1B[1;97;47m 0 \x1B[0m Iziet\n\n";
    return substr($pattern, 0, -1) . ')$/';
}

function getInput(string $prompt, string $pattern, string $errorMsg): int
{
    do {
        $isInputValid = false;
        $readline = readline($prompt);
        if (preg_match($pattern, $readline)) {
            $input = $readline;
            $isInputValid = true;
        } else {
            echo $errorMsg;
        }
    } while (!$isInputValid);
    if ($input == 0) {
        exit("\033[2J\x1B[1;44;47m Priecāsimies, ja izmantosiet mūsu pakalpojumus citreiz! \x1B[0m\n\n");
    }
    return $input;
}
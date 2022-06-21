<?php

class Shingles {

    private $shingles_lenght;
    
    public function __construct(int $shingles_lenght = 1)
    {
        $this->shingles_lenght = 1;
        
    }

    public function analyze($source1, $source2) {
        
        // очищаємо від пробілів
        $old_text_clean = [];
        foreach ($source1 as $text)
            array_push($old_text_clean, trim($text));
        
        $new_text_clean = [];
        foreach ($source2 as $text)
            array_push($new_text_clean, trim($text));
        // розділяємо тест на шингли та хешуємо 
        $sin1 = $this->shinglesGen($new_text_clean);
        $sin2 = $this->shinglesGen($old_text_clean);

        // порівнюємо два тести
        $intersection = array_intersect(
            $sin1,
            $sin2
        );
        //обрахунок у відсотках
        $result = (count($intersection) * 100 / count($new_text_clean));
        return $result;
    }
    
    // функція для розділення тесту на шингли та хешування 
    private function shinglesGen(array $words) {
        $shingles = [];
        $limit = count($words) - ($this->shingles_lenght - 1);
        for ($i = 0; $i < $limit; $i ++) {
            $array = [];
            for ($j = $i; $j < $i + $this->shingles_lenght; $j ++) {
                $array[] = $words[$j];
            }
            $hash_str = implode("", $array);
            $shingles[] = hash("md5", $hash_str);
        }
        return $shingles;
    }
}
?>



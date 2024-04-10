<?php
class TextWorker
{
    /*

2.  Вывести только картинки из исходного текста


8.  Расстановка точек в сокращениях «и т. д. и т. п.».
    Пример 
    итд => и т.д.

13. Автоматически сформировать “Указатель изображений”. Работает как оглавление, но ссылки делаются на картинки в документе. Текст ссылки такой: 
    Картинка <номер> ”содержимое атрибута alt”.

18. Подсветить в тексте литературные повторы. Если слово встречается в абзаце <p>....<p> более 3 раз, все вхождения должны быть подсвечены.
*/


    public static function task2($text)
    {
        $pattern = '/<img.*?src="(.*)".*?>/i';
        preg_match_all($pattern, $text, $matches);
        return $matches[1];
    }

    public static function task8($text)
    {
        $pattern = '/\bи\s*т[.*|\s*]*(д|п)\b[.*|\s*]*/u';
        
        $text = preg_replace($pattern, 'и т.$1. ', $text);
    
        return $text;
    }

    public static function task13($text)
    {
        $pattern = '/<img.*?alt="(.*?)".*?>/i';
        preg_match_all($pattern, $text, $matches);
        $result = '';
        for ($i = 0; $i < count($matches[1]); $i++) {
            $result .= 'Картинка ' . ($i + 1) . ' "' . $matches[1][$i] . '"' . PHP_EOL;
        }
        return $result;
    }

    public static function task18($text)
    {
        // $pattern = '/<p>(.*?)<\/p>/i';
        // preg_match_all($pattern, $text, $matches);
        // $words = [];
        // foreach ($matches[1] as $match) {
        //     $words = array_merge($words, preg_split('/\s+/', $match));
        // }
        // $words = array_map('mb_strtolower', $words);
        // $words = array_map('trim', $words);
        // $words = array_filter($words, function ($word) {
        //     return mb_strlen($word) > 3;
        // });
        // $words = array_count_values($words);
        // $result = $text;
        // foreach ($words as $word => $count) {
        //     if ($count > 3) {
        //         $result = preg_replace('/\b' . $word . '\b/iu', '<mark>' . $word . '</mark>', $result);
        //     }
        // }
        // return $result;
    }

    public static function formAnswerHtml($text)
    {
       
        
        $result = '<div class="container">';

         // Картинки
        $result .= '<h3>Вывести только картинки из исходного текста</h2>';
        foreach (self::task2($text) as $image) {
            $result .= '<img src="' . $image . '" alt="Image">';
        }
        $result .= '<div class="my-5"></div>';

        // Указатель изображений
        $result .= '<h3>Указатель изображений</h2>';
        $result .= '<p>' . self::task13($text) . '</p>';
        $result .= '<div class="my-5"></div>';

        // Подсвеченные литературные повторы
        $result .= '<h3>Подсвеченные литературные повторы</h2>';
        $result .= '<p>' . self::task18($text) . '</p>';
        $result .= '<div class="my-5"></div>';

        // Расстановка точек в сокращениях
        $result .= '<div class="row">';
        $result .= '<h3>Расстановка точек в сокращениях:</h2>';
        $result .= '<p>' . self::task8($text) . '</p>';
        $result .= '<div class="my-5"></div>';
        $result .= '</div>';


        $result .= '</div>';
        $result .= '</div>';
        return $result;
    }
}
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
        //ссылки картинок
        $pattern = '/<img.*src="(.*)".*>/iU';
        preg_match_all($pattern, $text, $matches);
        return $matches[1];
    }

    public static function task8($text)
    {
        $pattern = '/\bи\s*т[.*|\s*]*(д|п)\b[.*|\s*]*/u';
        
        $text = preg_replace($pattern, 'и т.$1. ', $text);
    
        return $text;
    }

    private static $id = 0;
    private static function getId($matches)
    {
        self::$id++;
        return $matches[1] . ' id="image' . self::$id . '">' ;
    }

    public static function task13($text)
    {
        $result = [];
        // найти alt тег
        // дописать id к картинке
        $pattern = '/(<img.*alt="(.*)".*)>/iU';
        preg_match_all($pattern, $text, $matches);
        $alts = $matches[2];
        $text = preg_replace_callback($pattern, 'self::getId', $text);

        // создать список
        $lsit = '<ul>';
        for ($i = 0; $i < count($alts); $i++) {
            $lsit .= '<li><a href="#image' . ($i + 1) . '">Картинка ' . ($i + 1) . ' "' . $alts[$i] . '"</a></li>';
        }
        $lsit .= '</ul>';
        $result['list'] = $lsit;
        $result['text'] = $text;
        return $result;
    }

    public static function task18($text)
    {
        $result = $text;
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
        //return $result;

        // используя domdocument Найди все параграфы
        // $dom = new DOMDocument();
        // libxml_use_internal_errors(true); // Ignore errors during loading HTML
        // $dom->loadHTML("\xEF\xBB\xBF" . $text);
        // libxml_clear_errors(); // Clear any errors that occurred during loading HTML
        // $paragraphs = $dom->getElementsByTagName('p');
        // $words = [];
        // foreach ($paragraphs as $paragraph) {
        //     $words = array_merge($words, preg_split('/\s+/', $paragraph->textContent));
        // }
        // $words = array_map('mb_strtolower', $words);
        // $words = array_map('trim', $words);
        // $words = array_filter($words, function ($word) {
        //     return mb_strlen($word) > 3;
        // });

        // $words = array_count_values($words);
        // $result = $text;
        // print_r($words);
        // foreach ($words as $word => $count) {
        //     if ($count > 3) {
        //         $result = preg_replace('/\b' . $word . '\b/iu', '<mark>' . $word . '</mark>', $result);
        //     }
        // }
        return $result;  
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
        $task13 = self::task13($text);
        $text = $task13['text'];
        $result .= $task13['list'];
        $result .= '<div class="my-5"></div>';

        // // Подсвеченные литературные повторы
        //$text = self::task18($text);

        // Расстановка точек в сокращениях
        $text = self::task8($text);

        // введенный текст после преобразований
        $result .= '<div class="row">';
        $result .= '<h3>Введенный текст после преобразований:</h2>';
        $result .= '<p>' . $text . '</p>';
        $result .= '<div class="my-5"></div>';


        $result .= '</div>';
        $result .= '</div>';
        return $result;
    }
}
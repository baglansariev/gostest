<?php
	namespace core\lib;

	class LetterChange
	{
		public function CyrilicToRoman($text)
		{
			if(preg_match("#[а-яА-Я]+#", $text)){

			    $converter = [
			        'а' => 'a',   'б' => 'b',   'в' => 'v',
			        'г' => 'g',   'д' => 'd',   'е' => 'e',
			        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
			        'и' => 'i',   'й' => 'y',   'к' => 'k',
			        'л' => 'l',   'м' => 'm',   'н' => 'n',
			        'о' => 'o',   'п' => 'p',   'р' => 'r',
			        'с' => 's',   'т' => 't',   'у' => 'u',
			        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
			        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
			        'ь' => '',  'ы' => 'y',   'ъ' => '',
			        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
			        
			        'А' => 'A',   'Б' => 'B',   'В' => 'V',
			        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
			        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
			        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
			        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
			        'О' => 'O',   'П' => 'P',   'Р' => 'R',
			        'С' => 'S',   'Т' => 'T',   'У' => 'U',
			        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
			        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
			        'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',
			        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
                    // kazakh
                    'ә' => 'a',   'Ә' => 'A',
                    'ғ' => 'g',   'Ғ' => 'G',
                    'қ' => 'k',   'Қ' => 'K',
                    'ң' => 'n',   'Ң' => 'N',
                    'ө' => 'o',   'Ө' => 'O',
                    'ұ' => 'u',   'Ұ' => 'U',
                    'ү' => 'u',   'Ү' => 'U',
                    'һ' => 'h',   'Һ' => 'H',
                    ' ' => '-',
			    ];

	   			return strtr($text, $converter);

			}
			else{
				echo 'В данном тексте нет кириллицы';
			}
		}

		public function ucfirstForText($text)
		{
			$textAr = explode(' ', $text);

			if(is_array($textAr)){
				$textAr = array_map('ucfirst', $textAr);

				return implode(' ', $textAr);
			}
			else {
				return ucfirst($text);
			}
		}
	}
<?php

namespace App;

class Service
{
    public static function mountHeaderInstitutions($tables)
    {
        $line = 0;
        foreach ($tables as $row) {
            $line++;
            if($line >= 2){
                $header = $this->validateHeaderElements($line, $row);
                break;
            }
        }

        return $header;
    }

    public static function mountBodyInstitutions($tables, $array)
    {
        $itens = [];
        $body = [];
        foreach ($tables as $row) {
            $cols = $row->getElementsByTagName('td');

            $linha = array();
            foreach ($cols as $item) {
                if ($cols->length == count($array['header'])) {
                    $linha[] = $item->nodeValue;
                }
            }
            if (!empty($linha)) {
                $body[] = $linha;
            }
        }

        return $body;
    }

    private function validateHeaderElements($line, $row)
    {
        $cols = $row->getElementsByTagName('th');
        foreach ($cols as $item) {
            $header[] = $item->nodeValue;
        }

        return $header;
    }
}

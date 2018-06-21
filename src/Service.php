<?php

namespace App;

class Service
{
    public static function mountHeaderInstitutions($tables)
    {
        $line = 0;
        foreach ($tables as $row) {
            $line++;
            if ($line >= 2) {
                $header = Service::validateHeaderElements($line, $row);
                break;
            }
        }

        return $header;
    }

    public static function mountBodyInstitutions($tables, $array)
    {
        $itens = [];
        foreach ($tables as $row) {
            $cols = $row->getElementsByTagName('td');

            $body = Service::validateBodyElements($cols, $array);
        }

        return $body;
    }

    private static function validateHeaderElements($line, $row)
    {
        $cols = $row->getElementsByTagName('th');
        foreach ($cols as $item) {
            $header[] = $item->nodeValue;
        }

        return $header;
    }

    private static function validateBodyElements($cols, $array)
    {
        $body = null;
        $linha = [];
        foreach ($cols as $item) {
            if ($cols->length == count($array['header'])) {
                $linha[] = $item->nodeValue;
            }
        }
        if (!empty($linha)) {
            $body[] = $linha;
        }
        return $body;
    }
}

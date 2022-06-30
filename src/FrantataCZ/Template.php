<?php

namespace FrantataCZ;

class Template
{
    private string $template;

    public function __construct(string $template)
    {
        $this->template = $template;
    }

    public function getTemplate(?array $args = null): string
    {
        $returnString = $this->template;
        foreach (explode("{", $this->template) as $var) {
            if (strpos($var, "}") !== false)
            {
                $var = explode("}", $var)[0];
                if(array_key_exists($var, $args)) {
                    $returnString = str_replace("{" . $var . "}", $args[$var], $returnString);
                }
            }
        }
        return $returnString;
    }
}
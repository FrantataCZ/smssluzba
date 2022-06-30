<?php

namespace FrantataCZ;

class Template
{
    private array $template;

    public function setTemplate(string $templateName, string $content)
    {
        $this->template[$templateName] = $content;
    }

    public function getTemplate(string $templateName, ?array $args = null): ?string
    {
        if(!array_key_exists($templateName, $this->template))
        {
            return null;
        }
        $returnString = $this->template[$templateName];
        if($args === null)
        {
            return $returnString;
        }
        foreach (explode("{", $this->template[$templateName]) as $var) {
            if (strpos($var, "}") !== false) {
                $var = explode("}", $var)[0];
                if (array_key_exists($var, $args)) {
                    $returnString = str_replace("{" . $var . "}", $args[$var], $returnString);
                }
            }
        }
        return $returnString;
    }
}
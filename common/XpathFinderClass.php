<?php
class XpathFinderClass
{
    public $ocurrencies = '';

    public function __construct($urls) {
        $this->urls = $urls;
    }

    public function findPath(){
        foreach ($this->urls as $url){
            $this->ocurrencies .= $url."\n";
            $doc = new DOMDocument();
            libxml_use_internal_errors(true);
            $doc->loadHTMLFile(trim($url));
            $tags = $doc->getElementsByTagName('a');
            foreach ($tags as $tag) {
                //USED THE COMMON ATTRIBUTE I'VE FIND COULD BE REFACTORED TO STRATEGY PATTERN IF MORE ARGUMENTS AVAILABLE
                $title = $tag->getAttribute('title');
                $mb = "Make-Button";
                if (substr($title, -strlen($mb)) === $mb) {
                    $this->ocurrencies .= str_replace('/', ' > ', $tag->getNodePath())."\n";
                }
            }
        }
        libxml_clear_errors();
        return $this->ocurrencies;
    }
}
?>
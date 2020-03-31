<?php

if(isset($_POST['find'])){
    foreach (explode(PHP_EOL, $_POST['find']) as $url){
        $doc = new DOMDocument();
        $doc->loadHTMLFile($DOCUMENT_ROOT.trim($url));
        $tags = $doc->getElementsByTagName('a');
        foreach ($tags as $tag) {
            $title = $tag->getAttribute('title');
            $mb = "Make-Button";
            if (substr($title, -strlen($mb)) === $mb) {
                $ocurrencies .= $tag->getNodePath()."\n";
            }
        }
    }
}
$urls = [
    'sample-0-origin.html',
    'sample-1-evil-gemini.html',
    'sample-2-container-and-clone.html',
    'sample-3-the-escape.html',
    'sample-4-the-mash.html'
];
?>
<html>
    <h1>Find occurrencies</h1>
    <form action="" method='post'>
        <textarea name="find" rows="10"><?php print implode("\n", $urls); ?></textarea>
        <input type="submit" value="find ocurrencies">
        <textarea name="result" rows="10"><?php print isset($ocurrencies) ? $ocurrencies : '' ?></textarea>
    </form>
</html>
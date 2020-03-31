<?php
    require('common/XpathFinderClass.php');
    if(isset($_POST['find'])){
        foreach (explode(PHP_EOL, $_POST['find']) as $url) $urls[] = $DOCUMENT_ROOT.trim($url);
        $finder = new XpathFinderClass($urls);

        $ocurrencies = $finder->findPath();
    }
    $placeholder = [
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
        <textarea name="find" rows="10"><?php print implode("\n", $placeholder); ?></textarea>
        <input type="submit" value="find ocurrencies">
        <textarea name="result" rows="10"><?php print isset($ocurrencies) ? $ocurrencies : '' ?></textarea>
    </form>
</html>
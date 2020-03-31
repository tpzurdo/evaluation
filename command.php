<?php
    require('common/XpathFinderClass.php');
    array_shift($argv);
    $finder = new XpathFinderClass($argv);
    print_r($finder->findPath());
?>
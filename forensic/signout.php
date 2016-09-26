<?php
        $siteTitle = 'Sign out site !!! - Forensic';
        require_once('lib2.php');
        setSession('forensicUser','');
        setSession('forensicCollectionId','');
        setSession('forensicCollectionName','');
        header('location: index.php');
?>

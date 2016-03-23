<?php

$assets = new \Phalcon\Assets\Manager();

$assets
    ->collection('layoutCss')
    ->setPrefix('components/')
    ->addCss('material-design-lite/material.min.css')
    ->addCss('angular/angular-csp.css')
    ->addCss('../css/style.css');

$assets
    ->collection('layoutJs')
    ->setPrefix('components/')
    ->addJs('material-design-lite/material.js')
    ->addJs('angular/angular.js')
    ->addJs('angular-route/angular-route.js')
    ->addJs('../js/app.js');

return $assets;
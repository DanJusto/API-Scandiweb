<?php

return [
    'GET|/' => \DanielJusto\ScandiwebApi\Controller\ProductList::class,
    'POST|/' => \DanielJusto\ScandiwebApi\Controller\NewProduct::class,
    'DELETE|/' => \DanielJusto\ScandiwebApi\Controller\DeleteProduct::class,
];
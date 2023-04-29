<?php

namespace DanielJusto\ScandiwebApi\Controller;

use DanielJusto\ScandiwebApi\Infra\PdoProductRepository;
use DanielJusto\ScandiwebApi\Models\Book;
use DanielJusto\ScandiwebApi\Models\Dvd;
use DanielJusto\ScandiwebApi\Models\Furniture;

class NewProduct implements Controller
{
    public function __construct(private PdoProductRepository $productRepo)
    {
    }

    public function processRequest()
    {
      $product = json_decode(file_get_contents("php://input"), true);

      $checkProductExists = $this->productRepo->findProductBySku($product['sku']);
      
      if(count($checkProductExists) > 0) {
        $res['status_code_header'] = 'HTTP/1.1 400 Bad request';
        $res['body'] = 'This SKU is already in use';
        $response = json_encode($res);
        return $response;
      }

      $type = require __DIR__ . '/../Models/Config/Type.php';
      $productTypes = require __DIR__ . '/../Models/Config/ProductTypes.php';

      $ptype = $type[$product['type']];
      $productClass = $productTypes["$ptype"];

      $this->productRepo->add(new $productClass(
        $product['sku'],
        $product['name'],
        $ptype,
        (float) $product['price'],
        $product['attribute']
      ));
      
      $res['status_code_header'] = 'HTTP/1.1 201 Created';
      $res['body'] = 'Success';
      $response = json_encode($res);
      return $response;
    }
}
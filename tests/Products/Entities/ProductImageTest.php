<?php

namespace Satelite\Tests\Products\Entities;

use Satelite\Entities\Products\Product;
use Satelite\Entities\Products\ProductImage;
use Satelite\Tests\Products\AbstractTestsCase;
use Illuminate\Database\Eloquent\Model;

class ProductImageTest extends AbstractTestsCase
{

    /**
     *
     * @var Satelite\Entities\Products\Product
     */
    protected $product;
    protected $productImage;

    public function setUp()
    {
        parent::setUp();
        $this->migrate();
        $this->product = Product::create(['name' => "Product Test 1", 'description' => 'Product Description Test 1']);
        $this->productImg = new ProductImage();
    }

    public function test_type()
    {
        $this->assertInstanceOf(Model::class, $this->productImg);
        $this->assertInstanceOf(ProductImage::class, $this->productImg);
    }

    public function test_if_can_create_object()
    {
        $productImg = ProductImage::create(['product_id' => $this->product->id, 'name' => "Product image Test 1", 'extension' => 'exe', 'url' => 'http://www.teste.com']);
        $productImg->find(1);

        $this->assertEquals("Product image Test 1", $productImg->name);
        $this->assertEquals('http://www.teste.com', $productImg->url);
    }

    public function test_if_can_update_object()
    {
        $data = ['product_id' => $this->product->id, 'name' => "Product imageTest 1", 'extension' => 'exe', 'url' => 'http://www.teste.com'];
        $productImg = ProductImage::create($data);

        $productImg = ProductImage::find(1);
        $productImg->name = "Product image Test 1 Update";
        $productImg->url = 'http://www.teste.com/update';
        $productImg->save();
        $productImg = ProductImage::find(1);
        $this->assertEquals("Product image Test 1 Update", $productImg->name);
        $this->assertEquals('http://www.teste.com/update', $productImg->url);
    }

    public function test_if_can_do_fisical_deletion()
    {
        $data = ['product_id' => $this->product->id, 'name' => "Product imageTest 1", 'extension' => 'exe', 'url' => 'http://www.teste.com'];
        $productImg1 = ProductImage::create($data);
        $productImg2 = ProductImage::create($data);

        $productImgs = ProductImage::all();
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $productImgs);
        $this->assertCount(2, $productImgs);

        $productImg2->delete();
        $productImgs = ProductImage::all();
        $this->assertCount(1, $productImgs);
    }

    // test_if_can_do_soft_delete
    // test_if_can_retrieves_deleted
    // test_if_can_recover_from_delete
    // integração
    // test_if_can_create_from_product
    // test_if_can_delete_from_product
    // test_if_can_update_from_product
}

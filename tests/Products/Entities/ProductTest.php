<?php

namespace Satelite\Tests\Products\Entities;

use Satelite\Entities\Products\Product;
use Satelite\Entities\Products\ProductImage;
use Satelite\Tests\Products\AbstractTestsCase;
use Illuminate\Database\Eloquent\Model;

/**
 * Description of Product
 * @abstract This Satelite\Product\Product object is responsible for handling the Product's data.
 * @author Mario Henrique Meireles de Aquino
 */
class ProductTest extends AbstractTestsCase
{

    /**
     *
     * @var Satelite\Entities\Products\Product
     */
    protected $product;

    public function setUp()
    {
        parent::setUp();
        $this->migrate();
        $this->product = new Product();
    }

    public function test_type()
    {
        $this->assertInstanceOf(Model::class, $this->product);
        $this->assertInstanceOf(Product::class, $this->product);
    }

    public function test_if_can_create_object()
    {
        $product = Product::create(['name' => "Product Test 1", 'description' => 'Product Description Test 1']);
        $product->find(1);

        $this->assertEquals("Product Test 1", $product->name);
        $this->assertEquals("Product Description Test 1", $product->description);
    }

    public function test_if_can_update_object()
    {
        $data = ['name' => "Product Test 2", 'description' => 'Product Description Test 2'];
        $product = Product::create($data);

        $product = Product::find(1);
        $product->name = "Product Test 2 Update";
        $product->description = 'Product Description Test 2 update';
        $product->save();
        $product = Product::find(1);
        $this->assertEquals("Product Test 2 Update", $product->name);
        $this->assertEquals('Product Description Test 2 update', $product->description);
    }

    public function test_if_can_do_fisical_deletion()
    {
        $data = ['name' => "Product Test 2", 'description' => 'Product Description Test 2'];
        $product1 = Product::create($data);
        $product2 = Product::create($data);

        $products = Product::all();
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $products);
        $this->assertCount(2, $products);

        $product2->delete();
        $products = Product::all();
        $this->assertCount(1, $products);
    }

}

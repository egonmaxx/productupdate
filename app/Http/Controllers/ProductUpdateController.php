<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProductUpdateController extends Controller
{
    /**
     * Updating product table by csv file and showing all changes in a view
     *
     * @return View
     */
    public static function updateProductsByCsv()
    {
        $productCsv = Storage::disk('local')->get('product.csv');
        $data = str_getcsv($productCsv, "\n");
        /* drop header */
        array_shift($data);
        /* drop header */
        
        foreach($data as $row){
            $productsImportArray[] = explode(';',$row);
        }

        /* deleting products */    
        $allProducts = DB::table('product')->get();
        
        $productToDelete = [];
        foreach ($allProducts as $product) {//foreach all products
            $keepThisProduct = false;
            foreach ($productsImportArray as $productImport) {//foreach all imported products to find updateable rows
                if ($productImport[0] == $product->sku) {
                    $productsToUpdate[] = $product; //collecting updateable products
                    $keepThisProduct = true;   
                }
            }
            if (!$keepThisProduct) {//if the product in the db is not in the csv it can delete
                $productToDelete[] = $product;
                DB::table('product')->where('sku', $product->sku)->delete();
            }
        }
        /* deleting products */
;
        /* updating products */
        foreach ($productsToUpdate as $product) {
            DB::table('product')->where('sku', $product->sku)->update(['name' => $product->name, 'short_desc' => $product->short_desc, 'base_img_url' => $product->base_img_url]);
        }
        /* updating products */

        /* inserting new product */
        $productToInsert = [];
        foreach ($productsImportArray as $productImport) {
            
            $result = DB::table('product')->where('sku', $productImport[0])->first();

            /* inserting new product */
            if (!$result) {
                $product->sku = $productImport[0];
                $product->name = $productImport[1];
                $product->shor_desc = $productImport[2];
                $product->base_img_url = $productImport[3];
                $productToInsert[] = $product;
                DB::table('product')->insert(['sku'=>$productImport[0], 'name' => $productImport[1], 'short_desc' => $productImport[2], 'base_img_url' => $productImport[3]]);
                //DB::table('product')->insert(['sku'=>'123Test'.mt_rand(1,100000), 'name' => 'TestName', 'short_desc' => 'Test Shor Desc', 'base_img_url' => 'http://example.com/TestImage.png']);
            }
        }
        /* inserting new product */

        /* Getting all products after db changes */
        $allProductsAfterUpdate = DB::table('product')->get();
        /* Getting all products after db changes */
        
        return view('productsupdate',['productToDelete' => $productToDelete, 'productsToUpdate' => $productsToUpdate, 'productToInsert' => $productToInsert,'allProductsAfterUpdate' => $allProductsAfterUpdate]);
    }

    public static function updateCategoriesByCsv(){
        return view('productsupdate',['isDbConnected' => 'ok323']);
    }
}

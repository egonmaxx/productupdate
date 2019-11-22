<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
    <h2>Deleted products</h2>
    <div>
        @if(!count($productToDelete) == 0)
        <table>
            <thead>
                <tr>
                    <th> sku</th>
                    <th> name</th>
                    <th> short desc  </th>
                    <th> image </th>
                </tr>
            </thead>
            <tbody>
                @foreach($productToDelete as $product)
                <tr>
                    <td> {{$product->sku}} </td>
                    <td> {{$product->name}} </td>
                    <td> {{$product->short_desc}} </td>
                    <td> {{$product->base_img_url}} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <span>No product has been deleted</span>
        @endif
    </div>
    <hr>
    <h2>Updated products</h2>
    <div>
        @if(!count($productsToUpdate) == 0)
        <table>
            <thead>
                <tr>
                    <th> sku</th>
                    <th> name</th>
                    <th> short desc  </th>
                    <th> image </th>
                </tr>
            </thead>
            <tbody>
                @foreach($productsToUpdate as $product)
                <tr>
                    <td> {{$product->sku}} </td>
                    <td> {{$product->name}} </td>
                    <td> {{$product->short_desc}} </td>
                    <td> {{$product->base_img_url}} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <span>No product has been updated</span>
        @endif
    </div>
    <hr>
    <h2>Inserted products</h2>
    <div>
        @if(!count($productToInsert) == 0)
        <table>
            <thead>
                <tr>
                    <th> sku</th>
                    <th> name</th>
                    <th> short desc  </th>
                    <th> image </th>
                </tr>
            </thead>
            <tbody>
                @foreach($productToInsert as $product)
                <tr>
                    <td> {{$product->sku}} </td>
                    <td> {{$product->name}} </td>
                    <td> {{$product->short_desc}} </td>
                    <td> {{$product->base_img_url}} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <span>No product has been inserted</span>
        @endif
    </div>
    <hr>
    <h2>Products after importing CSV</h2>
    <div>
        @if(!count($allProductsAfterUpdate) == 0)
        <table>
            <thead>
                <tr>
                    <th> sku</th>
                    <th> name</th>
                    <th> short desc  </th>
                    <th> image </th>
                </tr>
            </thead>
            <tbody>
                @foreach($allProductsAfterUpdate as $product)
                <tr>
                    <td> {{$product->sku}} </td>
                    <td> {{$product->name}} </td>
                    <td> {{$product->short_desc}} </td>
                    <td> {{$product->base_img_url}} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <span>No products found</span>
        @endif
    </div>
    </body>
</html>
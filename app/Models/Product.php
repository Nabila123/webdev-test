<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';

    public static function productCreate($title, $description, $price, $discountPercentage, $rating, $stock, $brand, $category, $thumbnail)
    {
        $Product = new Product();
        $Product->title = $title;
        $Product->description = $description;
        $Product->price = $price;
        $Product->discountPercentage = $discountPercentage;
        $Product->rating = $rating;
        $Product->stock = $stock;
        $Product->brand = $brand;
        $Product->category = $category;
        $Product->thumbnail = $thumbnail;
        $Product->created_at = date('Y-m-d H:i:s');

        if ($Product->save()) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function productUpdate($id, $title, $description, $price, $discountPercentage, $rating, $stock, $brand, $category, $thumbnail)
    {
        $ProductUpdated['title'] = $title;
        $ProductUpdated['description'] = $description;
        $ProductUpdated['price'] = $price;
        $ProductUpdated['discountPercentage'] = $discountPercentage;
        $ProductUpdated['rating'] = $rating;
        $ProductUpdated['stock'] = $stock;
        $ProductUpdated['brand'] = $brand;
        $ProductUpdated['category'] = $category;
        $ProductUpdated['thumbnail'] = $thumbnail;
        $ProductUpdated['updated_at'] = date('Y-m-d H:i:s');

        self::where('id', $id)->update($ProductUpdated);

        return 1;
    }

    public static function productUpdateField($fieldName, $updatedField, $id)
    {
        $ProductUpdatedField[$fieldName] = $updatedField;
        $success = self::where('id', $id)->update($ProductUpdatedField);

        if ($success) {
            return 1;
        }
    }
}

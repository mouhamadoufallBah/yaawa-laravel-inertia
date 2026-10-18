<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\DeliveryZone;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('seeders/data/demo.json');

        if (! file_exists($path)) {
            throw new \RuntimeException("Fichier introuvable : {$path}");
        }

        $data = json_decode(file_get_contents($path), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException('JSON invalide : ' . json_last_error_msg());
        }

        // --- Helper local pour convertir une date ISO en format MySQL ---
        $toMysql = fn($value) => $value === null ? null : Carbon::parse($value)->format('Y-m-d H:i:s');

        // --- Admin ---
        User::updateOrCreate(
            ['email' => 'admin@teranga.test'],
            [
                'name'     => 'Admin Teranga',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]
        );

        // --- Catégories ---
        foreach ($data['categories'] as $c) {
            Category::updateOrCreate(
                ['id' => $c['id']],
                [
                    'name'  => $c['name'],
                    'color' => $c['color'],
                    'image' => $c['image'],
                ]
            );
        }

        // --- Produits ---
        foreach ($data['products'] as $p) {
            Product::updateOrCreate(
                ['id' => $p['id']],
                [
                    'category_id' => $p['categoryId'],
                    'name'        => $p['name'],
                    'description' => $p['description'] ?? null,
                    'origin'      => $p['origin'] ?? null,
                    'unit'        => $p['unit'],
                    'image'       => $p['image'],
                    'price'       => $p['price'],
                    'sale_price'  => $p['salePrice'] ?? null,
                    'stock'       => $p['stock'],
                    'active'      => $p['active'] ?? true,
                    'featured'    => $p['featured'] ?? false,
                    'version'     => 1,
                ]
            );
        }

        // --- Zones de livraison ---
        foreach ($data['deliveryZones'] as $z) {
            DeliveryZone::updateOrCreate(
                ['id' => $z['id']],
                [
                    'name' => $z['name'],
                    'fee'  => $z['fee'] ?? 0,
                ]
            );
        }

        // --- Promotions ---
        foreach ($data['promotions'] as $promo) {
            Promotion::updateOrCreate(
                ['id' => $promo['id']],
                [
                    'code'       => $promo['code'],
                    'percentage' => $promo['percentage'],
                    'active'     => $promo['active'],
                    'expiresAt'  => $toMysql($promo['expiresAt'] ?? null),
                ]
            );
        }

        // --- Commandes + items ---
        foreach ($data['orders'] as $o) {
            $order = Order::updateOrCreate(
                ['reference' => $o['reference']],
                [
                    'delivery_zone_id'    => $o['customer']['zoneId'],
                    'checkout_token'      => (string) Str::uuid(),
                    'zone_name'           => $o['customer']['zoneName'],
                    'addresse'            => $o['customer']['address'] ?? null,
                    'fulfillmentMode'     => $o['fulfillmentMode'],
                    'note'                => $o['note'] ?? null,
                    'subtotal'            => $o['subtotal'],
                    'discount_percentage' => $o['discount']['percentage'] ?? 0,
                    'discount_amount'     => $o['discount']['amount'] ?? 0,
                    'delivery_fee'        => $o['deliveryFee'] ?? 0,
                    'total'               => $o['total'],
                    'status'              => $o['status'],
                    'stock_applied'       => $o['stockApplied'] ?? false,
                    'stock_restored'      => $o['stockRestored'] ?? false,
                    'created_at'          => $toMysql($o['createdAt'] ?? now()),
                    'updated_at'          => $toMysql($o['updatedAt'] ?? now()),
                ]
            );

            foreach ($o['items'] as $item) {
                OrderItem::updateOrCreate(
                    [
                        'order_id'   => $order->id,
                        'product_id' => $item['productId'],
                    ],
                    [
                        'name'       => $item['name'],
                        'units'      => $item['unit'],
                        'unit_price' => $item['unitPrice'],
                        'quantity'   => $item['quantity'],
                        'line_total' => $item['lineTotal'],
                    ]
                );
            }
        }
    }
}

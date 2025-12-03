<?php
declare(strict_types=1); //strict types on

//array
$cupcakeStock = [
    "Chocolate Dream" => [
        "price" => 40.0,
        "stock" => 15
    ],
    "Vanilla Swirl" => [
        "price" => 35.0,
        "stock" => 0
    ],
    "Strawberry Burst" => [
        "price" => 37.0,
        "stock" => 20
    ],
    "Cookies & Cream" => [
        "price" => 39.0,
        "stock" => 0
    ],
    "Red Velvet Bliss" => [
        "price" => 38.0,
        "stock" => 12
    ],
    "Lemon Delight" => [
        "price" => 36.0,
        "stock" => 16
    ],
    "Caramel Crunch" => [
        "price" => 39.0,
        "stock" => 14
    ]
];

//tax rate in the Philippines
$taxRate = 12;

//reorder using ternary operator
function get_reorder_message(int $stock): string {
    return ($stock < 10) ? "Yes" : "No";
}

//total value of product stock
function get_total_value(float $price, int $qty): float {
    return $price * $qty;
}

//tax due for each product
function get_tax_due(float $price, int $qty, int $tax = 0): float {
    $totalValue = $price * $qty;
    return $totalValue * ($tax / 100);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Control</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Sweet Bliss Cupcake Shop</h1>
<?php include 'header.php' ?>
<h3 class="menu-header">Stock Control</h3>
<table>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Reorder?</th>
        <th>Total Stock Value</th>
        <th>Tax Due (<?php echo $taxRate; ?>%)</th>
    </tr>

    <!-- foreach loop -->
    <?php foreach ($cupcakeStock as $product_name => $data): ?>
    <tr>
        <td><?= $product_name ?></td><!-- name -->
        <td>₱ <?= $data['price'] ?></td><!-- price -->
        <td><?= $data['stock'] ?></td><!-- stock level -->
        <td><?= get_reorder_message($data['stock']) ?></td> <!-- reorder product -->
        <!-- used number format for 2 decimal places -->
        <td>₱ <?= number_format(get_total_value($data['price'], $data['stock']), 2) ?></td><!-- total value -->
        <td>₱ <?= number_format(get_tax_due($data['price'], $data['stock'], $taxRate), 2) ?></td><!-- tax due -->
    </tr>
    <?php endforeach; ?>

</table>
<div class="creds">
<?php include "footer.php"; ?>
</div>
</body>
</html>

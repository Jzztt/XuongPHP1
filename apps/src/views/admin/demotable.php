<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $listProduct = [
        [
            "id" => 1,
            "name" => "iphone",
            "price" => 1000
        ],
        [
            "id" => 2,
            "name" => "samsung",
            "price" => 2000
        ],
        [
            "id" => 3,
            "name" => "xiaomi",
            "price" => 3000
        ]
    ]
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listProduct as $product) {
                echo "<tr>";
                foreach ($product as $key => $value) {
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }
            ?>
            <?php foreach ($listProduct as $product) : ?>
            <tr>
                <?php foreach ($product as $key => $value) : ?>
                <td>
                    <?php echo $value ?>
                </td>
                <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>




</body>

</html>
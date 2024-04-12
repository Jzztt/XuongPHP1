<?php
include "../../ultils/connect_db.php";
ob_start();

session_start();
include_once "../../layouts/partials/header.php";

if (!(isset($_SESSION['email']))) {
    echo "test";
    header("Location: ../login/index.php");
    exit();
}
?>
<?php
$listProduct = [
    [
        "productName" => "Magic Mouse 2",
        "color" => "Black",
        "category" => "Accessories",
        "price" => 99
    ],
    [
        "productName" => "iPhone 9",
        "color" => "Black",
        "category" => "Accessories",
        "price" => 99
    ],
    [
        "productName" => "iPhone 8",
        "color" => "Black",
        "category" => "Accessories",
        "price" => 99
    ],
    [
        "productName" => "samsung s20",
        "color" => "Black",
        "category" => "Accessories",
        "price" => 99
    ],
    [
        "productName" => "samsung s21",
        "color" => "Black",
        "category" => "Accessories",
        "price" => 99
    ],
];
?>

<?php
function searchProduct($queryParam, $listProduct)
{
    if (empty($queryParam)) {
        return $listProduct;
    }
    // queryParam = samsung
    $results = [];
    foreach ($listProduct as $product) {
        foreach ($product as $key => $value) {
            if ($key == "productName") {
                //  queryParam = samsung so sánh với  $value
                // strpos "samsung s21" , "sam"
                // strpos khi mà tìm thấy thì nó trả ra vị trí
                // ko tìm thấy trả ra false
                if (strpos(strtolower($value), strtolower($queryParam)) !== false) {
                    // tìm thấy
                    $results[] = $product;
                    // var_dump($results);
                    // array_push($results, $product);
                }
            }
        }
    }
    return $results;
}


if (isset($_GET['search'])) {
    $queryParam = $_GET['search'];
    // sam ===  "samsung s20"
    $listProduct = searchProduct($queryParam, $listProduct);
}
?>

<div class="container flex h-full mx-auto mt-4">
    <!-- Content -->
    <main class="w-full px-4 py-4 overflow-auto bg-white">
        <h2 class="mb-4 text-lg font-semibold">Product Management</h2>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Color
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <!-- <th scope="col" class="px-6 py-3">
                            Action
                        </th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listProduct as $product) : ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <?php foreach ($product as $key => $value) : ?>
                                <?php if ($key == "productName") : ?>
                                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $value ?>
                                    </th>
                                <?php endif ?>
                                <?php if ($key !== "productName") : ?>
                                    <td class="px-6 py-4"><?= $value ?></td>
                                <?php endif ?>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                    <?php

                    // foreach ($listProduct as $product) {
                    //     echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700'>";
                    //     echo "<th class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>" . $product["productName"] . "</th>";
                    //     echo "<td class='px-6 py-4'>" . $product["color"] . "</td>";
                    //     echo "<td class='px-6 py-4'>" . $product["category"] . "</td>";
                    //     echo "<td class='px-6 py-4'>" . $product["price"] . "</td>";
                    //     echo "</tr>";
                    // }
                    ?>
                </tbody>
            </table>
        </div>

    </main>
</div>






<?php include_once "../../layouts/partials/footer.php";

ob_end_flush();
?>
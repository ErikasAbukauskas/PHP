<h3 class="text-center">All Products</h3>

<table class="table_center table table-bordered mt-5 w-75 m-auto">
<thead class="bg-success">
    <tr class="text-center">
        <th>Product ID</th>
        <th>Product Title</th>
        <th>Product Category</th>
        <th>Product Date</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody class="bg-secondary text-light">
    <?php
    $viewProducts = new User();
    $viewProducts->viewProducts();
    ?>
</tbody>
</table>

<h3 class="text-center">All Categories</h3>

<table class="table_center table table-bordered mt-5 w-75 m-auto">
<thead class="bg-warning">
    <tr class="text-center">
        <th>Category ID</th>
        <th>Category Title</th>
        <th>Category Date</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody class="bg-secondary text-light">
    <?php
    $viewCategories = new User();
    $viewCategories->viewCategories();
    ?>
</tbody>
</table>
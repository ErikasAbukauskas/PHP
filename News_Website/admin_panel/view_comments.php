<h3 class="text-center">All Comments</h3>

<table class="table_center table table-bordered mt-5 w-75 m-auto">
<thead class="bg-danger">
    <tr class="text-center">
        <th>Comment ID</th>
        <th>Email</th>
        <th>Comment</th>
        <th>Comment Date</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody class="bg-secondary text-light">
    <?php
    $viewComments = new User();
    $viewComments->viewComments();
    ?>
</tbody>
</table>
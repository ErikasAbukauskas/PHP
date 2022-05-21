<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD operation</title>
    <!-- Bootstrap CSS -->
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New user</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="mb-3">
            <label for="completeName" class="form-label">Name</label>
            <input type="text" class="form-control" id="completeName" placeholder="Enter name">
        </div>

        <div class="mb-3">
            <label for="completeEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="completeEmail" placeholder="Enter email">
        </div>

        <div class="mb-3">
            <label for="completeMobile" class="form-label">Mobile</label>
            <input type="text" class="form-control" id="completeMobile" placeholder="Enter mobile number">
        </div>

        <div class="mb-3">
            <label for="completePlace" class="form-label">Place</label>
            <input type="text" class="form-control" id="completePlace" placeholder="Enter place">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" onclick="adduser()">Submit</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- update modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="mb-3">
            <label for="updateName" class="form-label">Name</label>
            <input type="text" class="form-control" id="updateName" placeholder="Enter name">
        </div>

        <div class="mb-3">
            <label for="updateEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="updateEmail" placeholder="Enter email">
        </div>

        <div class="mb-3">
            <label for="updateMobile" class="form-label">Mobile</label>
            <input type="text" class="form-control" id="updateMobile" placeholder="Enter mobile number">
        </div>

        <div class="mb-3">
            <label for="updatePlace" class="form-label">Place</label>
            <input type="text" class="form-control" id="updatePlace" placeholder="Enter place">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" onclick="updateDetails()">Update</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <input type="hidden" id="hiddenData">
      </div>
    </div>
  </div>
</div>

<div class="container my-3">
    <h1 class="text-center">PHP CRUD using Bootstrap Modal, AJAX, JQUERY </h1>
   <!-- Button trigger modal -->
    <button type="button" class="btn btn-dark my-3" data-bs-toggle="modal" data-bs-target="#completeModal">
        Add New users
    </button>
    <div id="displayDataTable"></div>
</div>
    

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

    <script>

        $(document).ready(function(){
            displayData();
        });
        //display data function
        function displayData() {
            var displayData="true";
            $.ajax({
                url:"display.php",
                type:'post',
                data:{
                    displaySend:displayData
                },
                success:function(data,status){
                    $('#displayDataTable').html(data);

                }
            });
        }



        function adduser(){
            var nameAdd=$('#completeName').val();
            var emailAdd=$('#completeEmail').val();
            var mobileAdd=$('#completeMobile').val();
            var placeAdd=$('#completePlace').val();

            $.ajax({
                url:"insert.php",
                type:'post',
                data:{
                    nameSend:nameAdd,
                    emailSend:emailAdd,
                    mobileSend:mobileAdd,
                    placeSend:placeAdd
                },
                success:function(data,status){
                    //function display data
                    // console.log(status);
                    $('#completeModal').modal('hide');
                    displayData();
                    
                }
            });
        }

        //Delete record
        function deleteUser(deleteID){
            $.ajax({
                url:"delete.php",
                type:'post',
                data:{
                    deleteSend:deleteID
                },
                success:function(data,status){
                    displayData();
                }
            });
        }

        //Update record
        function updateUser(updateID){
            $('#hiddenData').val(updateID);
            $.post("update.php",{updateID:updateID},function(data,status){
                var userid=JSON.parse(data);
                $('#updateName').val(userid.name);
                $('#updateEmail').val(userid.email);
                $('#updateMobile').val(userid.mobile);
                $('#updatePlace').val(userid.place);
            });
            $('#updateModal').modal("show");
        }

        //onclick update event function
        function updateDetails(){
            var updateName=$('#updateName').val();
            var updateEmail=$('#updateEmail').val();
            var updateMobile=$('#updateMobile').val();
            var updatePlace=$('#updatePlace').val();
            var hiddenData=$('#hiddenData').val();

            $.post("update.php",{
                updateName:updateName,
                updateEmail:updateEmail,
                updateMobile:updateMobile,
                updatePlace:updatePlace,
                hiddenData:hiddenData,
            }, function(data,status){
                $('#updateModal').modal('hide');
                displayData();
            });

        }
    </script>
</body>
</html>
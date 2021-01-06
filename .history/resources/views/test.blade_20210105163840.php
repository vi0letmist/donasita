<!DOCTYPE html>
 
<html lang="en">
<head>

<title>Laravel DataTables Todo CRUD Example Tutorial - w3alert.com</title>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Analytics Dashboard - This is an example dashboard created using build-in elements and components.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="csrf-param" content="_token" />
        <script>
          window.Laravel = <?php echo json_encode([
              'csrfToken' => csrf_token(),
          ]); ?>
        </script>

<script src="https://code.jquery.com/jquery-3.4.1.js"></script> 

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

</head>
      <body>
         <div class="container mt-4">
            <h2 class="text-center mt-2 mb-3 alert alert-success">Laravel DataTables Todo CRUD Example Tutorial</h2>
            <a href="{{ url('add-todo') }}" class="text-center btn btn-success mb-1">Create Todo</a>
            <table class="table table-bordered" id="laravel-datatable-crud">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Title</th>
                     <th>Description</th>
                     <th>Created at</th>
                     <th>Action</th>
                  </tr>
               </thead>
            </table>
         </div>
   <script>
     $(document).ready( function () {
      $('#laravel-datatable-crud').DataTable({
           processing: true,
           serverSide: true,
          ajax: {
            url: "{{ url('tost') }}",
            type: 'GET',
           },
           columns: [
                    {data: 'rownum', name: 'rownum'},
                    { data: 'judul', name: 'judul' },
                    { data: 'slug', name: 'slug' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                 ]
       });
     });

     $('body').on('click', '.deleteTodo', function () {
 
        var todo_id = $(this).data("id");
        if(confirm("Are You sure want to delete !"))
        {
          $.ajax({
              type: "get",
              url: "{{ url('delete-todo') }}"+'/'+todo_id,
              success: function (data) {
              var oTable = $('#laravel-datatable-crud').dataTable(); 
              oTable.fnDraw(false);
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
       }
    });   
  
   </script>
  </body>
</html>
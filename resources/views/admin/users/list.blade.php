@extends('admin.layouts.app')
 
@section('title', 'Login')

@section('pagecontent')
  

 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 1302.12px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content" >
        <div class="container-fluid" >
            <div class="row" >
                <div class="col-12" >
                    <div class="card" >
                        <div class="card-header" >
                            Users List
                        </div>
                        <div class="card-body" >
                            <div class="row">
                                <div class="col-sm-12">

                                    <table id="tblUsersList" align="center" border="1" >
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Image</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>		
                                        </thead>
                                        
                                        <tbody>
                                            
                                        </tbody>

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        
        </div>
    </section>

</div>    
    <!-- /.content-header -->

        <!-- Page Modal Popup -->

        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">User Info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>

                <div class="modal-body">
                    <!-- <p>One fine body&hellip;</p> -->
                </div>

                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
      <!-- /.modal -->

        <!-- -->

@endsection


@section('pagescript')
<script>
    
    $(document).ready(function(){
        
        $('#tblUsersList').DataTable({
			processing: true,
			serverSide: true,			
			//ajax: site_url+"/admin/usersdata",
            ajax: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add the CSRF token
                },     
                url: site_url + "/admin/usersdata",
                type: "POST", // Set the HTTP method to POST
            },
			columns: [
				{ data: 'id', name: 'id' },
				{ data: 'fullname', name: 'fullname'},
				{ data: 'email', name: 'email' },
                { data: 'profile_photo', name: 'profile_photo',searchable:false,sortable:false},
                { data: 'date', name: 'date',searchable:false },
                { data: 'actions', name: 'actions',searchable:false,sortable:false },
			],
        });

                
        $(document).on('click','.view-info',function(){

            var rid = $(this).attr('data-rid');

            // build the ajax call
			$.ajax({
				url: site_url+"/admin/user/userdetail",
				type: 'POST',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				data: {					
					userid:'',
				},
				success: function (response) {		
                    console.log(response);
                    return false;

					if(response.status == '1'){
						$.toast({
							heading: 'Success',
							text: response.message,
							showHideTransition: 'slide',
							icon: 'success',
							position:'top-right',
						});		

						$("#tblStudentList tbody").html("");
						$("#tblStudentList tbody").html(response.data.listrows);

					}else if(response.status == '0'){
						$.toast({
							heading: 'Error',
							text: response.message,
							showHideTransition: 'fade',
							icon: 'error',
							position:'top-right',
						});		
					}

				},
				error: function (response) {
					//console.log(response);
					$.toast({
						heading: 'Error',
						text: response.status+" "+response.statusText,
						showHideTransition: 'fade',
						icon: 'error',
						position:'top-right',
					});
				},				
			});

        });

    });

</script>
@endsection


@section('pagecss')

    <style>
        #tblUsersList{
            border: 0;
        }
        #tblUsersList tr.even td{
            background-color: whitesmoke;
        }
    </style>

@endsection
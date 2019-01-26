@if(Session::has('admin'))
        @foreach($admins as $admin)
            @if(Session::get('admin') == $admin->name.":".$admin->password )
                @extends('admin-pages.admin-nav')

                @section('content')
                <div style="margin-top:55px;"></div>
                <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12" id="thetable">
                    <h2 class="solid-text-light text-center"><span style="color:deeppink;">All</span> <span style="color:orange;">Ord</span><span style="color:cyan;">ers</span> <i class="fa fa-shopping-cart" style="color:lime;"></i> </h2>
                    <div class="table-responsive">
                        <table class="table  col-lg-12 col-sm-12 col-xs-12" >
                            <thead class='blue-grey darken-3 ' style='color:white'>
                                <tr>
                                    <th class="">NAME</th>
                                    <th class="">EMAIL</th>
                                    <th class="">ADDRESS</th>
                                    <th class="">ITEMS</th>
                                    <th class="">COST</th>
                                    <th class="">TIME</th>
                                    <th class="">ACTIONS</th>
                                    
                                 </tr>
                            </thead>
                            <tbody>
                                
                                    @forelse($orders as $order)
                                        <tr class="active">
                                            <td class="text text-info">{{ $order->Name }}</td>
                                            <td class="text text-info">{{ $order->Email }}</td>
                                            <td class="text text-warning">{{ $order->Address }}</td>
                                            <td class="text text-warning">{{ $order->Items }}</td>
                                            <td class="text text-success">{{ $order->Price }}</td>
                                            <td class="text text-success">{{ $order->created_at->diffForHumans() }}</td>
                                            <td>
                                            	<button class="btn btn-danger btn-sm pull-right solid-two solid-two" type='button' data-toggle='modal' data-target='#delete-order-{{ $order->id }}'><i class="glyphicon glyphicon-trash"></i>
                                            	</button>
                                            	<button class="btn btn-warning btn-sm pull-right solid-two solid-two" onclick='details("{{$order->id}}","{{$order->itemIDs}}")' type='button' data-toggle='modal' data-target='#see-order-{{ $order->id }}'><i class="glyphicon glyphicon-eye-open"></i>
                                            	</button>
                                            	<button class="btn btn-elegant btn-sm pull-right solid-two solid-two" onclick='details("{{$order->id}}","{{$order->itemIDs}}")' type='button' data-toggle='modal' data-target='#record-order-{{ $order->id }}'><i class="glyphicon glyphicon-check"></i>
                                            	</button>
                                            	
                                            </td>
                                          </tr>
                                        
                                        <!-- ######################## SEE ORDER MODAL ################### -->
                                         <div class='modal fade' id ='see-order-{{$order->id}}'> 
                                         	<div class='modal-dialog modal-md' style='border-radius:0px'> 
                                         		<div class='modal-content' > 
                                         			<div class='modal-header' style='background-color:orange;'> 
                                         				<button class='close' data-dismiss='modal' aria-hidden='true'>x</button>
                                         				<h2 class='modal-title solid-text-light'>{{$order->Name}}'s order</h2>
                                         			</div>
                                         			<div class='modal-body clearfix' style='max-height:400px;overflow-y:scroll'> 
                                                                    				<small class='text text-success'>Send a message to <b>{{$order->Name}}</b></small> <small id='status-{{$order->id}}' class=' pull-right text text-info' style='display:none'><span class='glyphicon glyphicon-ok'></span> Sent! </small>
                                         			
                                         					<div class='form-group clearfix'> 
                                         						<textarea class='form-control ' style=' border-radius:0px; border:solid 0px green; border-bottom-width:3px;' rows='2' id='order-message-box-{{$order->id}}'></textarea>			<input type='hidden' id='order-email-box-{{$order->id}}' value='{{$order->Email}}'>							
                                         					</div> 
                                         					
                                         					<button data-id='{{$order->id}}' class='solid-two btn btn-default order-message-button pull-right' id='' style=''><span class='glyphicon glyphicon-send'></span></button>
                                         					<br>
                                         				<p>Details of the order.</p>

                                         				<div id='pictures-{{$order->id}}'>
                                         				</div>
                                         				
                                         			</div>
                                         			<div class='modal-footer' style='background-color: #585858' > 
                                         			<button class='btn btn-primary solid-two' data-toggle='popover' data-title='Reason if any' data-placement='top' data-html='true' data-content='
                                         			<p class="text text-success"><b>{{$order->reason}}</b></p>
                                         			
                                         			'>Reason</button>

                                         			<button class='btn btn-warning solid-two' data-dismiss='modal'>Close</button>
                                         			</div>
                                         		</div>
                                         	</div>
                                         </div>
                                        <!-- ######################## DELETE MODAL ################### --> 
                                            <div class='modal fade' id='{{ 'delete-order-'.$order->id }}'>
                                                <div class='modal-dialog modal-sm' style='border-radius:0px;'>
                                                    <div class='modal-content' style='background-color:white;'> 
                                                        <div class='modal-header' style='background-color:red;'> 
                                                            <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'></span>&times;<span class="sr-only"></span></button>
                                                            <h3 class='modal-title' style='color:white'>Delete</h3>
                                                        </div>
                                                        <div class='modal-body'> 
                                                            <small>Are you sure you want to delete <b>{{ $order->Name }}'s</b> order?</small>
                                                        </div>
                                                        <div class='modal-footer' style='background-color:#585858'>                                                 
                                                          <a class="btn btn-danger solid-two" href="admin-delete-order/{{ explode(":",Session::get('admin'))[0] }}/{{ $order->id }}">Yes</a>
                                                                                                                   
                                                        </div>
                                                    </div> 
                                                </div> 
                                            </div>
                                            
                                            <!-- ######################## sorted FREE ITEM MODAL ################### --> 
						<div class='modal fade' id='{{ 'record-order-'.$order->id }}'>
							<div class='modal-dialog modal-sm'>
								<div class='modal-content'> 
									<div class='modal-header' style='background:black; color:white'> 
										<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'></span>&times;<span class="sr-only"></span></button>
										<h3 class='modal-title'>COMPLETION</h3>
									</div>
									<div class='modal-body'> 
										<small>{{ explode(":",Session::get('admin'))[0] }}! This means the transaction of '<b>{{ $order->Item }}</b>' from commcycle to the buyer is complete and you would like to record it.<span style='color:green'>The order will be removed afterwards!</span> <br> </small>
									</div>
									<div class='modal-footer'> 
										<a type="button" href="record-transaction/{{ explode(":",Session::get('admin'))[0] }}/{{ $order->id }}" class="btn btn-success pull-right solid-two">Yes</a>
									</div>
								</div> 
							</div> 
						</div>
	            			@empty 
                                        <tr>
                                            <td>Nothing</td>
                                            <td>Nothing</td>
                                            <td>Nothing</td>
                                            <td>Nothing</td>
                                            <td>Nothing</td>
                                            <td>Nothing</td>
                                            <td>I havent asked for anything</td>
                                            <td><button type="button" class="btn btn-danger" ><span class="fa fa-trash"></span></button></td>
                                        </tr>
                                    @endforelse
                                    
                            </tbody>
                        </table>
                    </div>
                </div>

                <style>
                    #thetable{
                        min-height:500px; 
                        max-height:800px;
                        overflow-y:scroll;
                    }
                </style>
                @endsection
            @endif 
        @endforeach
@else 
    <div class="container" style="margin-top:300px">
        <div class="row col-md-6 col-lg-6 col-md-offset-3 col-sm-12 col-xs-12"> 
            <div class="alert alert-warning clearfix solid solid-text-light" style="background: deeppink; color:cyan;">
                <p>You are not signed in as an admin. Please do so :) <a class="btn btn-success pull-right solid-two" href="{{ route('admin.signin') }}" style="background:orange;">Sign in </a></p>
            </div>
        </div>
    </div>
@endif    
@section('custom-js') 
<script> 
$('[data-toggle="popover"]').popover();


	$('.order-message-button').on('click',function(){
	
		
	
		var id = $(this).attr('data-id');
		
		if($('#order-message-box-'+id).val() !=''){
			$.ajax({method:'get', 
			url:'/email-orderer',
			data:{email: document.getElementById('order-email-box-'+id).value, theBody:$('#order-message-box-'+id).val()}
			 
			}).done(function(){
			
				$('#status-'+id).fadeIn(300,function(){
					setTimeout(function(){
					
					$('#status-'+id).fadeOut(300); 
					
					$('#order-message-box-'+id).val('');
					
					},3000);
					
				
				
				});		
			});
		}else{
		
			alert('The body of your mail is empty!');
		
		}
	
			
	});
	
	function details(ID,motherIDs){
		$.ajax({method:'get', 
		url:'/'
		
		}).done(function(){
		
			$('#pictures-'+ID).load('/show-order-pics/'+motherIDs);
		
		});
	};

</script>
@endsection


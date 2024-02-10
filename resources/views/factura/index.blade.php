@extends('layouts.master')
@section('css')
<!-- Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}"  rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<!-- Slect2 css -->
<link href="{{URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Facturas</h4>
							</div>
						</div>
						<!--End Page header-->
@endsection
@section('content')
                        <!--Row-->
                        @if(Session::has('success'))
                            <div class="alert alert-{{ session('success.alert') }} alert-dismissible fade show" role="alert">
                                {{ session('success.message') }}

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

						<div class="row row-deck">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card">

									<div class="card-header">
                                    <div class="btn-group ml-5 mb-0">
                                                <a class="btn btn-primary" href="{{route('factura.new')}}"><i class="fa fa-plus mr-2"></i>Crear Una Nueva Factura</a>
											</div>
										<h3 class="card-title"></h3>
										<div class="card-options">

								
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive table-responsive-sm">
                                            <table id="example" class="table table-bordered text-nowrap key-buttons ">
                                                <thead>
                                                    <th class="border-bottom-0">ID</th>
                                                    <th class="border-bottom-0">Nombre</th>
                                                    <th class="border-bottom-0">Direccion</th>
                                                    <th class="border-bottom-0">Telefono</th>
                                                    <th class="border-bottom-0">Subtotal</th>
                                                    <th class="border-bottom-0">Divisa</th>
                                                    <th class="border-bottom-0">Tipo</th>

                                                    <th class="border-bottom-0">Fecha</th>
                                                    @if(Auth::user()->isSuper())

                                                    <th style="border-color:#eff0f6;"></th>
                                                    @endif


                                                </thead>
                                                <tbody >
                                                    @if($facturas->isNotEmpty())
                                                        @foreach($facturas as $factura)
                                                            <tr class="bold">
                                                                <td>{{$factura->id}}</td>
                                                                <td>{{$factura->name}}</td>
                                                                <td>{{$factura->direccion}}</td>
                                                                <td>{{$factura->Telefono}}</td>
                                                                <td>{{$factura->subtotal }}</td>
                                                                <td>{{$factura->divisa}}</td>
                                                                <td>
                                                                    @php 
                                                                    if ($factura->factura == 1){
                                                                        echo "Factura";
                                                                    } else{
                                                                        echo "Recibo";
                                                                    }
                                                                    @endphp
                                                                </td>

                                                                <td>{{$factura->created_at}}</td>
                                                                @if(Auth::user()->isSuper())

                                                                <td>
                                                                <form id="deleteForm" action="{{ route('factura.destroy', ['factura' => $factura]) }}" method="POST">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('DELETE') }}

                                                                        <button class="btn btn-danger btn-xs" type="button" onclick="confirmDelete()"><span class="fa fa-trash"></span></button>
                                                                </form>

                                                                </td>
                                                                @endif

                                                       
                                                     
                                               
                                                            </tr>
                                            
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="8">No one there!</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
								</div>
							</div>
						</div>
						<!--End row-->
					</div>
				</div><!-- end app-content-->
            </div>
            <div class="modal" id="modaldemo1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">File Upload</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('factura.store') }}" role="form" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="custom-file">
                                            <input type="file" id="xmldata" name="xmldata" class="custom-file-input" data-height="250" accept="text/xml" onchange='openFile(event)'/>
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-lg btn-primary">Upload</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light" data-dismiss="modal" type="button">Close</button>
                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('js')
<!-- Data tables -->
<script>
    function confirmDelete() {
        var confirmation = confirm("¿Estás seguro de que deseas eliminar esta factura?");
        if (confirmation) {
            document.getElementById('deleteForm').submit();
        } else {
            // Si el usuario hace clic en "Cancelar", evitamos el envío del formulario.
            console.log("Eliminación cancelada por el usuario.");
        }
    }
</script>



<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/js/datatables.js')}}"></script>
<!-- Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/select2.full.min.js')}}"></script>


@endsection

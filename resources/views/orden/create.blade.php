@extends('layouts.master')
@section('css')
<!-- Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Crear Orden de Entrega</h4>
							</div>
							<div class="page-rightheader ml-auto d-lg-flex d-none">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Dashboard</span></a></li>
									<li class="breadcrumb-item"><a href="{{ route('inventario.index') }}">Site Panel</a></li>
									<li class="breadcrumb-item active" aria-current="page">Create Site</li>
								</ol>
							</div>
						</div>
						<!--End Page header-->
@endsection
@section('content')
                        <!-- Row -->
                        @if(Session::has('success'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{Session::get('success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
			            @endif
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card">
                                    <div class="card-header">
										<div class="card-title">Crear una Orden De Entrega</div>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('orden.store') }}"  role="form">
                                            {{ csrf_field() }}
                                            <div class="input-group mb-3">
                                                <span class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></span>
                                                <input type="text" name="name" id="name" class="form-control input-sm" placeholder="nombre">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></span>
                                                <input type="text" name="apellido" id="apellido" class="form-control input-sm" placeholder="apellido">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></span>
                                                <input type="text" name="direccion" id="direccion" class="form-control input-sm" placeholder="direccion">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></span>
                                                <input type="text" name="cedula" id="cedula" class="form-control input-sm" placeholder="cedula de identidad">
                                            </div>
                                            <span class="card-title">Fecha de Nacimiento</span>
                                            <div class="input-group mb-3">
                                                <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control input-sm">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></span>
                                                <input type="text" name="telefono" id="telefono" class="form-control input-sm" placeholder="telefono">
                                            </div>

                                            <!-- Abonado Logic -->
                                  
                                            <div class="input-group mb-3 w-100">

                                                <span class="card-title"> Seleccione la Moneda con la que va a abonar</span>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></span>
                                                    <input type="numeric" name="abonado" id="abonado" class="form-control input-sm" placeholder="abonado">
                                            </div>

                                                <select  class="select2 " name="divisas" id="divisas" style="width : 100%">
                                                            <option value="Bs" selected>BS</option>
                                                            <option value="COP">COP</option>
                                                            <option value="USD">USD</option>
                                                </select>
                                            </div>


                                            <div class="input-group mb-3 w-100">
                                                <span class="card-title"> Seleccione los Articulos</span>
                                                <select name="products[]" id="products" class="select2" multiple style="width : 100%">
                                                        @foreach($products as $product)
                                                            <option value="{{ $product->codigo }}" @if($product->codigo == $numeroId) selected @endif>
                                                                {{ $product->producto }}
                                                            </option>
                                                        @endforeach
                                                </select>
                                                    
                                            </div>
                                            <div class="card-title m-5" id="suma-precio">Suma del precio: $0.00</div>
                                            <input type="hidden" id="inputSumaPrecio" name="inputSumaPrecio">


                            

                                            <div class="col-xs-12">
                                                <button type="submit" class="btn btn-lg btn-primary">Crear</button>
                                                <a href="{{ route('orden.index') }}" class="btn btn-lg btn-danger">Cancelar</a>
                                            </div>
                                        </form>
                                    </div>
								</div>
							</div>
						</div>
						<!-- End Row-->

					</div>
				</div><!-- end app-content-->
			</div>
@endsection
@section('js')
<!--Select2 js -->

<script>
$(document).ready(function() {
    // Manejar el cambio en el evento 'change' de #products
    $('#products').on('change', function() {
        // Obtener las IDs seleccionadas
        var selectedIds = $(this).val();

        // Obtener la lista de productos desde Laravel
        var miVariableEnJS = @json($products);

        // Inicializar la variable para almacenar la suma de precios
        var totalPrecio = 0;

        // Iterar sobre los productos y sumar los precios de los productos seleccionados
        miVariableEnJS.forEach(function(product) {
            if (selectedIds.includes(product.codigo.toString())) {
                totalPrecio += product.precio;
            }
        });

        // Mostrar o actualizar la suma de precios en algún lugar
        $('#suma-precio').text('Suma del precio: $' + totalPrecio.toFixed(2));
        $('#inputSumaPrecio').val(totalPrecio.toFixed(2));

    });

    // Simular el evento 'change' al principio para realizar el cálculo inicial
    $('#products').trigger('change');
});

</script>
<script src="{{URL::asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
@endsection

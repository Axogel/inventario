@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Promos</h4>
							</div>
						</div>
						<!--End Page header-->
@endsection
@section('content')
                        <!-- Row -->
                        <div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="table-responsive">
										<table class="table card-table table-vcenter text-nowrap mb-0">
											<thead >
												<tr>
                                                    <th>SID</th>
                                                    <th>DOB</th>
													<th>STORE CODE</th>
													<th>STORE NAME</th>
													<th>CHECK</th>
                                                    <th>CHECKNAME</th>
                                                    <th>EMPLOYEE</th>
                                                    <th>MANAGER</th>
                                                    <th>PROMOTYPE</th>
                                                    <th>QTY</th>
                                                    <th>AMOUNT</th>
                                                    <th>EMPID</th>
                                                    <th>MANID</th>   
												</tr>
											</thead>
											<tbody>
                                                <tr>
													<th>131483</th>
													<td>20201110</td>
													<td>9</td>
													<td>Juici - Liguanea Restored</td>
                                                    <td>Breakfast </td>
                                                    <td>16</td>
                                                    <td>81170</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>940</td>
                                                    <td>0</td>
                                                    <td>81170</td>
                                                    <td>8</td>    
												</tr>
												<tr>
													<th scope="row">1</th>
													<td>Joan Powell</td>
													<td>Associate Developer</td>
													<td>$450,870</td>
												</tr>
												<tr>
													<th scope="row">2</th>
													<td>Gavin Gibson</td>
													<td>Account manager</td>
													<td>$230,540</td>
												</tr>
												<tr>
													<th scope="row">3</th>
													<td>Julian Kerr</td>
													<td>Senior Javascript Developer</td>
													<td>$55,300</td>
												</tr>
												<tr>
													<th scope="row">4</th>
													<td>Cedric Kelly</td>
													<td>Accountant</td>
													<td>$234,100</td>
												</tr>
												<tr>
													<th scope="row">5</th>
													<td>Samantha May</td>
													<td>Junior Technical Author</td>
													<td>$43,198</td>
												</tr>
											</tbody>
										</table>
									</div>
									<!-- table-responsive -->
								</div>
                            </div>
                        </div>
						<!-- End Row -->
@endsection
@section('js')
@endsection
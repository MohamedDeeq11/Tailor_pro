@extends('layouts.admin');
@section('content');

	<div class="row" style="width: 90%;margin-left: 18%;margin-top: 5%;">
								<!-- Column starts -->
								<div class="col-xl-11">
									<div class="card" id="bootstrap-table4">
										<div class="card-header flex-wrap d-flex justify-content-between  border-0 px-3">
											<div>
												<h4 class="card-title">Expenses</h4>
												{{-- <p class="m-0 subtitle">Add <code>table striped</code> class with <code>bootsrtap-table</code></p> --}}
											</div>
											<ul class="nav nav-tabs dzm-tabs" id="myTab-3" role="tablist">
												<li class="nav-item" role="presentation">
													<button class="nav-link active " id="home-tab-3" data-bs-toggle="tab" data-bs-target="#withoutBorder" type="button" role="tab"  aria-selected="true">Add Expenses</button>
												</li>
											
											</ul>	
										</div>
									   
											   <!-- /tab-content -->	
											<div class="tab-content" id="myTabContent-3">
												<div class="tab-pane fade show active" id="withoutBorder" role="tabpanel" aria-labelledby="home-tab-3">
													<div class="card-body p-0">
														
														<div class="table-responsive">
																<table class="table table-striped table-responsive-sm">
																	<thead>
																		<tr>
																			<th>#</th>
																			<th>Name</th>
																			<th>Status</th>
																			<th>Date</th>
																			<th>Price</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<th>1</th>
																			<td>Kolor Tea Shirt For Man</td>
																			<td><span class="badge badge-primary">Sale</span>
																			</td>
																			<td>January 22</td>
																			<td class="color-primary">$21.56</td>
																			<td>
																				<div class="d-flex">
																					<a href="#" class="btn btn-warning shadow btn-xs sharp me-1" ><i class="fa fa-eye"></i></a>
																					<a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
																					<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<th>2</th>
																			<td>Kolor Tea Shirt For Women</td>
																			<td><span class="badge badge-success light">Tax</span>
																			</td>
																			<td>January 30</td>
																			<td class="color-success">$55.32</td>
																			<td>
																				<div class="d-flex">
																					<a href="#" class="btn btn-warning shadow btn-xs sharp me-1" ><i class="fa fa-eye"></i></a>
																					<a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
																					<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<th>3</th>
																			<td>Blue Backpack For Baby</td>
																			<td><span class="badge badge-danger">Extended</span>
																			</td>
																			<td>January 25</td>
																			<td class="text-danger">$14.85</td>
																			<td>
																				<div class="d-flex">
																					<a href="#" class="btn btn-warning shadow btn-xs sharp me-1" ><i class="fa fa-eye"></i></a>
																					<a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
																					<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
																				</div>
																			</td>
																		</tr>
																	</tbody>
																</table>
														</div>
													</div>
												</div>
											
											</div>
										<!-- /tab-content -->	
										
									</div>
								</div>
							</div>
@endsection
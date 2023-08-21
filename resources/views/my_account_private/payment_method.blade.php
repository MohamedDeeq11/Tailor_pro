@extends('privatelayout.privateadmin');
@section('private');

<div class="content-body">
    <div class="container-fluid">
    
        <!-- row -->
        <div class="row">

            <!-- Card for Payment Tier -->
       
            <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                <div class="widget-stat card bg-primary">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between">
                            <input type="radio" name="payment_tier" class="mt-3 ml-1" style="width: 20px;height:20px">
                            <div class="media-body text-white" style="margin-left: 10px">
                                <h2 class="mb-3 text-white">Launch</h2>
                                <p style="color: white">Exactly what you need to get started.</p>
                            </div>
                            <div class="text-right">
                                <h3 class="text-white">$25</h3>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     

            <!-- Repeat the above block for other payment tiers -->

        </div>

        <!-- Update Button -->
        <button class="btn btn-primary">Update Bayment </button>
    </div>
</div>

@endsection
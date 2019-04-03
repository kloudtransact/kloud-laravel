@extends("layout")

@section('title',"Add Money to KloudPay")

@section('content')
<div class="row">
          <div class="col-lg-12 mx-auto text-center">
            <h2 class="section-heading mt-1">Add Money to KloudPay</h2>
            <hr class="my-4">
             <div class="card" style="">
              <div class="card-content">
               <form>
                <div class="form-group">
                  <p class="form-control-plaintext"><i class="fa fa-briefcase"></i> KloudPay: &#8358;0.00</p><br>
                  <input type="number" class="form-control" placeholder="Enter amount">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Add to KloudPay</button>
               </form>
              </div>
             </div>

          </div>
        </div>
@stop
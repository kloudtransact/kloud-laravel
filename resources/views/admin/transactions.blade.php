@extends("admin.layout")

@section('title',"Transactions")

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Transactions</h4>
                  <p class="card-category"> View all user transactions</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="ordersTable">
                      <thead class=" text-primary">
                        <th>User</th>
                                                <th>Type</th>
                                                <th>Description</th>
                                                <th>Amount (&#8358;)</th>
                      </thead>
                      <tbody>
                        <tr>
                        <td>anibel</td>
                        <td><span class="badge badge-info">DEPOSIT</span></td>
                        <td>Deposited to KloudPay Wallet</td>
                        <td>10,000</td>
                      </tr>
                      <tr>
                        <td>anibel</td>
                        <td><span class="badge badge-primary">TRANSFER</span></td>
                        <td>Transferred to <a href="#">topewer</a>'s KloudPay Wallet</td>
                        <td>5,000</td>
                      </tr>
                      <tr>
                        <td>anibel</td>
                        <td><span class="badge badge-success">PAID</span></td>
                        <td>Paid for order <a href="#">KLO456884528</a> via KloudPay Wallet</td>
                        <td>5,000</td>
                      </tr>
                      <tr>
                        <td>anibel</td>
                        <td><span class="badge badge-danger">REFUND</span></td>
                        <td>Refund for order <a href="#">KLO456884528</a> to KloudPay Wallet</td>
                        <td>5,000</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@stop
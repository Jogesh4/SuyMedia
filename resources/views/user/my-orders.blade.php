@extends('user.layouts.header')

@section('title', 'dashboard')

@section('content')

<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> My Orders</h4>

              <div class="row">
                 <div class="col-xl-12 col-lg-12">
 <div class="card">
                <h5 class="card-header">My Orders</h5>
                <div class="table-responsive text-nowrap">
                  <table class="cart-table table border" width="100%">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Order ID</th>
                          <th>Customer</th>
                          <th>Items</th>
                          <th>Details</th>
                          <th>status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(!empty($orders))
                          @foreach($orders as $order)
                            <tr>
                              <td>{{date('d-m-Y H:m:s', strtotime($order->created_at))}}</td>
                              <td>{{ $order->order_no }}</a></td>
                              <td>{{ $order->user->name }}</td>
                              <td>{{ $order->items }}</td>
                              <td><a href="{{ route('user_order_detail', $order->id) }}" class="btn btn-warning">View Details</a></td>
                              <td><span class="failed">{{ $order->status }}</span></td>
                            
                            </tr>
                          @endforeach
                        @endif
                      </tbody>
                    </table>
                </div>
              </div>
					
					
</div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  © 2022
                </div>
                
              </div>
            </footer>
            <!-- / Footer -->
          </div>
@endsection
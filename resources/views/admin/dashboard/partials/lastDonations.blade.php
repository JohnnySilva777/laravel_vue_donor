<!-- TABLE: LATEST Donations -->
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-transparent">
            <h3 class="card-title">Latest Donations</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Type</th>
                        <th>Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($donations as $donation)
                        <tr>
                            <td><a href="pages/examples/invoice.html">OR9842</a></td>
                            <td>{{$donation->donor->name}}</td>
                            @if($donation->type === 'unique')
                                <td><span class="badge badge-success">{{$donation->type}}</span></td>
                            @else
                                <td><span class="badge badge-primary">{{$donation->type}}</span></td>
                            @endif
                            <td>
                                <div class="sparkbar" data-color="#00a65a" data-height="20">
                                    R${{$donation->price/100}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <a href="{{route('donations.index')}}" class="btn btn-sm btn-secondary float-right">View All
                Orders</a>
        </div>
        <!-- /.card-footer -->
    </div>
</div>

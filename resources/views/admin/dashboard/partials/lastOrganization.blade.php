<!-- TABLE: ORGANIZATIONS LIST -->
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Recently Added Organizations</h3>

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
            <ul class="products-list product-list-in-card pl-2 pr-2">
                @foreach($organizations as $organization)
                    <li class="item">
                        <div class="product-info">
                            <a href="{{route('organizations.edit', $organization->id)}}" class="product-title">{{$organization->name}}
                                <span class="badge badge-warning float-right">View Organization</span></a>
                            <span class="product-description">
                            {{$organization->description}}.
                          </span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-center">
            <a href="{{route('organizations.index')}}" class="uppercase">View All Organizations</a>
        </div>
        <!-- /.card-footer -->
    </div>
</div>

<!-- LAST MEMBERS -->
<div class="col-md-12">
    <!-- USERS LIST -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Latest Members</h3>

            <div class="card-tools">
                <span class="badge badge-danger">8 New Members Today</span>
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
            <ul class="users-list clearfix">
                @foreach($donors as $donor)
                    <li>
                        <a class="users-list-name" href="#">{{$donor->name}}</a>
                        <span class="users-list-date">{{$donor->email}}</span>
                        <span class="users-list-date">{{$donor->created_at}}</span>
                    </li>
                @endforeach
            </ul>
            <!-- /.users-list -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-center">
            <a href="{{route('donors.index')}}">View All Users</a>
        </div>
        <!-- /.card-footer -->
    </div>
    <!--/.card -->
</div>
<!-- /.col -->
<!-- /.col -->

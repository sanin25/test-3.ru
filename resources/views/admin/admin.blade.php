@extends('layouts.add_admin')
<li class="treeview">
    <a href="#"><i class="fa fa-globe"></i> <span>Translations</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="{{ url('admin/language') }}"><i class="fa fa-flag-checkered"></i> Languages</a></li>
        <li><a href="{{ url('admin/language/texts') }}"><i class="fa fa-language"></i> Site texts</a></li>
    </ul>
</li>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>

                    <div class="panel-body">
                        Admin panel
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

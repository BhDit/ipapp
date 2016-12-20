@section('css')
    <style>
        body {
            padding-bottom: 40px;
            padding-top: 60px;
        }

        .sidebar-nav-fixed {
            width:14%;
        }
    </style>

@stop


@section('sidebar')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="sidebar-nav-fixed pull-right affix">
                    <div class="well">
                        <ul class="nav">
                            <li>
                                <br>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile </a>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Contests</a>
                            </li>

                            <li>
                                <span class="glyphicon glyphicon glyphicon-th-list" aria-hidden="true"></span><font color="#337AB7"> STATISTICS</font>
                            </li>

                            <li>
                                <a href="#"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Statistic</a>
                            </li>
                            <li>
                                <span class="glyphicon glyphicon glyphicon-th-list" aria-hidden="true"></span><font color="#337AB7"> STATUS</font>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                    User</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
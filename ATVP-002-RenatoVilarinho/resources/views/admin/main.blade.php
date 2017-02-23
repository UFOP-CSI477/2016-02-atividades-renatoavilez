<!DOCTYPE html>
<html lang="pt-BR">

    @include('admin/partials/_head')

    <body class="hold-transition skin-green sidebar-mini">

        <div class="wrapper">
    
            @include('admin/partials/_header')
    
            <!-- Left side column. contains the logo and sidebar -->
            @include('admin/partials/_menuesquerdo')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
            <!-- Content Header (Page header) -->
                <section class="content-header">
                <h1>
                    @yield('titulo')
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">@yield('titulo')</li>
                </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
            <!-- /.content -->
            </div>                                                                
  <!-- /.content-wrapper -->

            @include('admin/partials/_footer')
        </div>
<!-- ./wrapper -->
        @include('admin/partials/_javascript')
        @yield('scriptLocal')
    </body>
</html>

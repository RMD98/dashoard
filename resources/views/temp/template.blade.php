
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>LPPM</title>

<!-- Custom fonts for this template-->
<link href="{{asset('/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
<link
    href="{{asset('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i')}}"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{asset('/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>
<body id="page-top">
    <div id="wrapper">
        @include('temp/sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('temp/navbar')
                @yield('content')
            </div>
        </div>
    </div>
 
    <!-- start footer Area -->
    <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
    <!-- End footer Area -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('/vendor/chart.js/Chart.min.js')}}"></script>
    <link href="{{ asset('/vendor/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
    <script src="{{ asset('/vendor/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/vemdor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('/js/demo/datatables-demo.js')}}"></script>
    <script>
         $('.nidn').select2(
            {
                placeholder: 'NIDN',
                ajax: {
                    url: '/dosens',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                        results:  $.map(data, function (item) {
                                return {
                                    text: item.nidn,
                                    id: item.nidn
                                }
                            })
                        };
                    },
                    cache: true
                },
                tags: true,
                createTag: function(params){
                    return{
                        id : params.term,
                        text : params.term,
                        newOption : true
                    }
                },
            }
        );
    </script>
    <!-- Page level custom scripts -->
    <!-- <script src="/js/demo/chart-area-demo.js"></script> -->
    <!-- <script src="/js/demo/chart-pie-demo.js"></script> -->
    @stack('script')
</body>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">

    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('include.leftMenu')
        <div id="content-wrapper" class="d-flex flex-column">
            @include('include.header')
            @include('include.main')
            @include('include.footer')
        </div>
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

    <script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-storage.js"></script>
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script type="module">
        const firebaseConfig = {
            apiKey: "AIzaSyBo3af9GIVE6fEX0c_hhlEe4PkazmPh5po",
            authDomain: "doan-59ab4.firebaseapp.com",
            databaseURL: "https://doan-59ab4-default-rtdb.firebaseio.com",
            projectId: "doan-59ab4",
            storageBucket: "doan-59ab4.appspot.com",
            messagingSenderId: "597562326117",
            appId: "1:597562326117:web:77e5d8bf294463ca515a8c",
            measurementId: "G-CC7303V021"
        };
        firebase.initializeApp(firebaseConfig);
    </script>
    <script>
        $(document).ready(function() {
            flatpickr(".flatpickr", {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d",
            });
            $('.editor').each(function() {

                CKEDITOR.replace(this, {
                    enterMode: CKEDITOR.ENTER_BR,
                    shiftEnterMode: CKEDITOR.ENTER_P,
                    removePlugins: 'div,autolink'
                });
            });

            $('#btn-add-tour-deatil').click(function(event) {
                event.preventDefault();
                const name = $('.tourNameDeatil').val();
                const code = $('.tourCodeDeatil').val();
                const category_tour = $('.categoryTour').val();
                const price = $('.priceTourDeatil').val();
                const startTime = $('.startTime').val();
                const endTime = $('.endTime').val();
                const startTour = $('.startTour').val();
                const vehicle = $('.vehicleTourDeatil').val();
                const location = $('.locationStartDeatil').val();
                const mota = CKEDITOR.instances.mota.getData()

                const files = Array.from(document.getElementById("file-upload-tour-deatil").files);
                const uploadPromises = [];
                const ref = firebase.storage().ref();

                files.forEach((file) => {
                    const name = +new Date() + "-" + file.name;
                    const metadata = {
                        contentType: file.type
                    };

                    const task = ref.child(name).put(file, metadata);
                    const uploadPromise = task
                        .then((snapshot) => snapshot.ref.getDownloadURL())
                        .catch(console.error);

                    uploadPromises.push(uploadPromise);
                });

                Promise.all(uploadPromises)
                    .then((urls) => {
                        const imageURLs = urls;
                        var csrfToken = $('meta[name="csrf-token"]').attr('content');
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken
                                }
                            });
                        $.ajax({
                            type: "POST",
                            url:" {{route('tour_deatil_post_add')}}", // Replace with your actual route
                            data: {
                                name: name,
                                code: code,
                                category_tour: category_tour,
                                price: price,
                                startTime: startTime,
                                endTime: endTime,
                                startTour: startTour,
                                vehicle: vehicle,
                                location: location,
                                mota: mota,
                                listImg: imageURLs,
                            },
                            success: function(response) {
                                if (response.status === 'success') {
                                    alert(response.mess);
                                    window.location = response.route;
                                } else {
                                    // Handle errors or display an error message
                                    alert(response.mess);
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr, status, error);
                            }
                        });
                    })
                    .catch(console.error);
            });


        });
    </script>
</body>

</html>

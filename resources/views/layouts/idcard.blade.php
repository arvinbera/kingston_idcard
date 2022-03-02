<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ID Card System - Dashboard</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/html2canvas.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/html2canvas2.min.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script>
        function idcard_photo_upload() {
            let college_id = document.getElementsByTagName("input")['college_id'].value;
            let student_photo = document.getElementsByTagName("input")["student_photo"].files[0];

            let formData = new FormData();
            formData.append("college_id", college_id);
            formData.append("student_photo", student_photo);
            fetch("/idcard_photo_upload", {
                method: "POST",
                enctype: "multipart/form-data",
                body: formData,
            }).then((response) => response.json()).then((data) => {
                document.getElementById("student_photo_div").src = data?.data?.student_photo;
                document.getElementById("student_photo_div_big").src = data?.data?.student_photo;
            });
        }

        function idcard_details(college_id) {
            if (!college_id) {
                college_id = "tingtong";
            }
            fetch("/idcard_details?college_id=" + college_id).then(function(res) {
                res.text().then(function(text) {
                    document.getElementById("idcard_details_bind").innerHTML = text;
                });
            }, error => {
                alert(error);
            })
        }

        // function idcard_print(college_id) {
        //     html2canvas(document.getElementById("section-to-print"), {
        //         backgroundColor: "rgba(0,0,0,0)"
        //     }).then(function(canvas) {
        //         var anchorTag = document.createElement("a");
        //         document.body.appendChild(anchorTag);
        //         anchorTag.download = "idcard.png";
        //         anchorTag.href = canvas.toDataURL("image/png");
        //         anchorTag.target = '_blank';
        //         anchorTag.click();
        //     });

        //     let formData = new FormData();
        //     formData.append("college_id", college_id);
        //     formData.append("idcard_status", "1");
        //     fetch("/idcard_status_update", {
        //         method: "POST",
        //         body: formData,
        //     }).then(function() {
        //         document.getElementById("idcard_status_update").innerText = "ID Card has been printed...";
        //     });
        // }

        function idcard_print(college_id) {
            // html2canvas(document.getElementById("section-to-print"), {
            //     backgroundColor: "rgba(0,0,0,0)"
            // }).then(function(canvas) {
            //     var imgData = canvas.toDataURL('image/png');
            //     var doc = new jsPDF('p', 'mm');
            //     doc.addImage(imgData, 'PNG', 10, 10);
            //     doc.save('sample-file.pdf');
            // });

            // var mywindow = window.open('', 'PRINT', 'height=1016,width=638');
            // var mywindow = window.open('', 'PRINT');
            // mywindow.document.write('<html><head><title>' + document.title + '</title>');
            // mywindow.document.write('<link href="/css/bootstrap.min.css" rel="stylesheet" media="print" />');
            // mywindow.document.write('<link href="/css/style.css" rel="stylesheet" media="print" />');
            // mywindow.document.write('</head><body >');
            // mywindow.document.write(document.getElementById("print_me_big").innerHTML);
            // mywindow.document.write('</body></html>');
            // mywindow.document.close();
            // mywindow.focus();
            // mywindow.print();
            // mywindow.close();

            var mywindow = window.open('', 'PRINT');
            mywindow.document.write('<html><head><title>' + document.title + '</title>');
            mywindow.document.write('<link href="/css/bootstrap.min.css" rel="stylesheet" media="print" />');
            mywindow.document.write('<link href="/css/style.css" rel="stylesheet" media="print" />');
            mywindow.document.write('</head><body >');
            mywindow.document.write(document.getElementById("print_me_big").innerHTML);
            mywindow.document.write('</body></html>');
            mywindow.document.close();
            mywindow.moveTo(0, 0);
            mywindow.resizeTo(screen.width, screen.height);
            setTimeout(function() {
                mywindow.print();
                mywindow.close();
            }, 250);

            // html2canvas(document.getElementById("section-to-print"), {
            //     scale: 2,
            //     backgroundColor: "rgba(0,0,0,0)"
            // }).then(function(canvas) {
            //     var anchorTag = document.createElement("a");
            //     document.body.appendChild(anchorTag);
            //     anchorTag.download = "idcard.png";
            //     anchorTag.href = canvas.toDataURL("image/png");
            //     anchorTag.target = '_blank';
            //     anchorTag.click();
            // });

            // var element = document.getElementById('section-to-print');
            // html2pdf(element, {
            //     margin: 0,
            //     filename: 'myfile.pdf',
            //     image: {
            //         type: 'jpeg',
            //         quality: 1
            //     },
            //     html2canvas: {
            //         scale: 2,
            //         logging: true,
            //         dpi: 192,
            //         letterRendering: true
            //     },
            //     jsPDF: {
            //         unit: 'mm',
            //         format: 'a4',
            //         orientation: 'portrait'
            //     }
            // });

            // document.getElementById("print_me_big").style.visibility = "visible";
            // html2canvas(document.getElementById("print_me_big"), {
            //     backgroundColor: "rgba(0,0,0,0)"
            // }).then(function(canvas) {
            //     var anchorTag = document.createElement("a");
            //     document.body.appendChild(anchorTag);
            //     anchorTag.download = "idcard.png";
            //     anchorTag.href = canvas.toDataURL("image/png");
            //     anchorTag.target = '_blank';
            //     anchorTag.click();
            // });
            // document.getElementById("print_me_big").style.visibility = "hidden";

            let formData = new FormData();
            formData.append("college_id", college_id);
            formData.append("idcard_status", "1");
            fetch("/idcard_status_update", {
                method: "POST",
                body: formData,
            }).then(function() {
                document.getElementById("idcard_status_update").innerText = "ID Card has been printed...";
            });
        }

        function search() {
            let search = document.getElementById("search").value;

            if (!search) {
                search = "tingtong";
            }
            fetch("/search_student?search=" + search).then(function(res) {
                res.text().then(function(text) {
                    document.getElementById("search_result_bind").innerHTML = text;
                });
            }, error => {
                alert(error);
            })
        }
    </script>
</head>

<body>
    <div class="container">
        <nav class="
                    navbar navbar-dark
                    sticky-top
                    bg-light
                    flex-md-nowrap
                    p-0
                ">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">ID Card System</a>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <!-- <a class="btn btn-link text-dark" href="#">Sign Out</a> -->
                    <a class="btn border-bottom text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Sign Out') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        <button class="btn btn-link text-dark" type="submit" value="Sign Out">Sign Out</button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('dashboard') || request()->is('home') ? 'active' : ''}}" href="/dashboard">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file"></span>
                                ID Card Sample
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="users"></span>
                                Student Database
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('upload_bulk') ? 'active' : ''}}" href="/upload_bulk">
                                <span data-feather="layers"></span>
                                Upload Bulk Data
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('upload_single') ? 'active' : ''}}" href="/upload_single">
                                <span data-feather="file-text"></span>
                                Upload Single Data
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="bar-chart-2"></span>
                                Download Reports
                            </a>
                        </li> -->
                    </ul>
                </div>
            </nav>

            @yield('content')

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script>
        feather.replace();
    </script>
    @livewireScripts
</body>

</html>
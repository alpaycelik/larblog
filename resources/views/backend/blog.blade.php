@extends('backend.app')
@section('icerik')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Blog Listesi</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <table id="datatable-buttons" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Eklenme</th>
                                        <th>Başlık</th>
                                        <th>Yazar</th>
                                        <th>Kategori</th>
                                        <th>Hit</th>
                                        <th>Yorumlar</th>
                                        <th>Sil</th>
                                        <th>Düzenle</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $sira = 1;
                                    @endphp
                                    @foreach($bloglar as $blog )
                                    <tr>
                                        <td>{{ $blog->created_at }}</td>
                                        <td>{{ $blog->baslik }}</td>
                                        <td>{{ $blog->yazar }}</td>
                                        <td>{{ $blog->kategori }}</td>
                                        <td>{{ $blog->hit }}</td>
                                        <td>{{ $blog->yorumlar }}</td>
                                        <td>
                                            <input onclick="sil(this, '{{ $blog->slug }}')" type="button" class="btn btn-danger btn-xs">
                                        </td>
                                        <td>
                                            <a href="blog/blog-duzenle/{{ $blog->slug }}" class="btn btn-primary btn-xs">Düzenle</a>
                                        </td>
                                    </tr>
                                    @php
                                        $sira++;
                                    @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Datatables -->
    <script src="/backend/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/backend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/backend/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/backend/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/backend/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/backend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/backend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/backend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/backend/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="/backend/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/backend/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/backend/vendors/pdfmake/build/vfs_fonts.js"></script>

    <script src="/js/jquery.form.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/messages_tr.min.js"></script>
    <script src="/js/sweetalert2.min.js"></script>

    <script>
        $(document).ready(function () {
            $('form').ajaxForm({
                success: function (response) {
                    swal(
                        response.baslik,
                        response.icerik,
                        response.durum
                    );
                    if(response.durum == 'success'){
                        var form = document.getElementById("form");
                        var sira = form.elements[2].value();
                        document.getElementById("datatable-buttons").deleteRow(sira);
                    }
                }
            });
        });
    </script>

@endsection
@section('css')
    <!-- Datatables -->
    <link href="/backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/backend/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/backend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/backend/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/css/sweetalert2.min.css">

@endsection
@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('admin.publishers.create')  }}"
                           class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                            <span class="text">Yeni Yayınevi</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-hover " id="dataTable" cellpadding="0" width="100%">
                            <thead>
                            <tr>
                                @foreach($thead as $th)
                                    <th class="{{ $th  != 'ID' ? 'text-right' : ''}}">{{ $th }}</th>
                                @endforeach
                            </tr>
                            </thead>
                            @foreach($publishers as $publisher)
                                <tr>
                                    <td>{{ $publisher->id  }}</td>
                                    <td class="text-right">{{ $publisher->name }}</td>
                                    <td class="justify-content-end form-inline">
                                        <a href="{{ route('admin.publishers.edit', $publisher->id) }}"
                                           class="btn btn-primary btn-icon-split btn-sm">
                                        <span class="icon text-white-xs">
                                          <i class="fas fa-edit"></i>
                                        </span>
                                            <span class="text">Düzenle</span>
                                        </a>
                                        <form action="{{ route('admin.publishers.destroy',$publisher->id) }}"
                                              method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button
                                                class="btn btn-danger btn-icon-split btn-sm">
                                        <span class="icon text-white-xs">
                                          <i class="fas fa-trash"></i>
                                        </span>
                                                <span class="text">Sil</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                "order": [[0, "asc"]],
                "language": {
                    "sDecimal": ",",
                    "sEmptyTable": "Tabloda herhangi bir veri mevcut değil",
                    "sInfo": "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                    "sInfoEmpty": "Kayıt yok",
                    "sInfoFiltered": "(_MAX_ kayıt içerisinden bulunan)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "Sayfada _MENU_ kayıt göster",
                    "sLoadingRecords": "Yükleniyor...",
                    "sProcessing": "İşleniyor...",
                    "sSearch": "Ara:",
                    "sZeroRecords": "Eşleşen kayıt bulunamadı",
                    "oPaginate": {
                        "sFirst": "İlk",
                        "sLast": "Son",
                        "sNext": "Sonraki",
                        "sPrevious": "Önceki"
                    },
                    "oAria": {
                        "sSortAscending": ": artan sütun sıralamasını aktifleştir",
                        "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                    },
                    "select": {
                        "rows": {
                            "_": "%d kayıt seçildi",
                            "0": "",
                            "1": "1 kayıt seçildi"
                        }
                    }
                }
            });
        });
    </script>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h6 class="m-0 font-weight-bold text-primary">Bekleyen {{ $title }}</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-hover font-weight-lighter" id="dataTable" cellpadding="0"
                               width="100%">
                            <thead>
                            <tr>
                                @foreach($thead as $th)
                                    <th>{{ $th }}</th>
                                @endforeach
                            </tr>
                            </thead>
                            @foreach($barrows as $barrow)
                                @if($barrow->status == 'pending')
                                    <tr>
                                        <td>{{ $barrow->id  }}</td>
                                        <td>
                                            <span
                                                class="badge badge-warning">Onay Bekliyor
                                            </span>
                                        </td>
                                        <td>{{ $barrow->book->implode('title',',') }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.edit',$barrow->user->id) }}">{{ $barrow->user->name }}</a>
                                        </td>
                                        <td>{{ $barrow->request_date }}</td>
                                        <td>{{ $barrow->return_date }}</td>
                                        <td class="tooltip-bottom" title="Kolleksiyonun geri dönüş durmunu ifade eder.">
                                            <span
                                                class="badge badge-{{ $barrow->return_status ? ' success' : 'danger' }}">
                                                {{ $barrow->return_status ? 'Döndü' : 'Dönmedi' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h6 class="m-0 font-weight-bold text-primary">Geçmiş istek kayıtları</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-hover font-weight-lighter" id="oldBarrows" cellpadding="0"
                               width="100%">
                            <thead>
                            <tr>
                                @foreach($thead as $th)
                                    <th>{{ $th }}</th>
                                @endforeach
                            </tr>
                            </thead>
                            @foreach($barrows as $barrow)
                                @if($barrow->status != 'pending')
                                    <tr>
                                        <td>{{ $barrow->id  }}</td>
                                        <td>
                                            <span
                                                class="badge badge-{{ $barrow->status == 'successful' ? 'success' : 'danger' }}">
                                                {{ $barrow->status == 'successful' ? 'Onaylandı' : 'Başarısız' }}
                                            </span>
                                        </td>
                                        <td>{{ $barrow->book->implode('title',',') }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.edit',$barrow->user->id) }}">{{ $barrow->user->name }}</a>
                                        </td>
                                        <td>{{ $barrow->request_date }}</td>
                                        <td>{{ $barrow->return_date }}
                                        <td>
                                            @if(!is_null($barrow->sent_code))
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#requestModal">
                                                    Gönderim Bilgileri
                                                </button>
                                                <div class="modal fade" id="requestModal" tabindex="-1" role="dialog"
                                                     aria-labelledby="modalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalLabel"> Gönderim
                                                                    Bilgileri</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <b>Kargo Firması</b> : {{ $barrow->shipping_company }}
                                                                <br><br>
                                                                <b>Kargo Takip No</b> : {{ $barrow->sent_code }}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-info"
                                                                        data-dismiss="modal">Kapat
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="tooltip-bottom" title="Kolleksiyonun geri dönüş durmunu ifade eder.">
                                            <span
                                                class="badge badge-{{ $barrow->return_status ? 'success' : 'danger' }}">
                                                {{ $barrow->return_status ? 'Döndü' : 'Dönmedi' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endif
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
    <script>
        $(document).ready(function () {
            $('#oldBarrows').DataTable({
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

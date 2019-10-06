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
                        <a href="{{ route('admin.users.create')  }}"
                           class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                            <span class="text">Yeni Kullanıcı</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" cellpadding="0" width="100%">
                            <thead>
                            <tr>
                                @foreach($thead as $th)
                                    <th>{{ $th }}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <span class="badge badge-{{($user->is_admin ? 'success' : 'danger')}}">
                                            {{$user->is_admin ? 'Evet' : 'Hayır'}}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-{{($user->is_banned ? 'danger' : 'success')}}">
                                            {{$user->is_banned ? 'Banlı' : 'Temiz'}}
                                        </span>
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <span class="badge badge-{{($user->email_verified_at ? 'success' : 'danger')}}">
                                        {{ $user->email_verified_at ? 'Onaylanmış' : 'E-Posta Onaylanmamış' }}
                                    </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                           class="btn btn-primary btn-icon-split btn-sm">
                                        <span class="icon text-white-xs">
                                          <i class="fas fa-edit"></i>
                                        </span>
                                            <span class="text">Düzenle</span>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
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
                "processing": true,
                "order": [[0, "desc"]],
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

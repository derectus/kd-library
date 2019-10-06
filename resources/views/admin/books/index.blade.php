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
                        <a href="{{ route('admin.books.create')  }}"
                           class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                            <span class="text">Yeni Koleksiyon</span>
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
                            @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->id }} </td>
                                    @if(File::exists(public_path('storage/'.$book->slug.'.jpg')))
                                        <td>
                                            <img
                                                src="{{ asset('storage/'.$book->slug.'.jpg') }}" width="40px"
                                                height="50px" alt="{{ $book->name }}">
                                        </td>
                                    @else
                                        <td>
                                            <img
                                                src="{{ asset('img/cover.png') }}" width="40px"
                                                height="50px" alt="{{ $book->name }}">
                                        </td>
                                    @endif
                                    <td>{{ $book->title }}</td>
                                    @if(count($book->author) > 0 && !is_null($book->author) )
                                        <td>
                                            @foreach($book->author as $author)
                                                {{ count($book->author) > 1  && !$loop->last ?  $author->name.', ' : $author->name  }}
                                            @endforeach
                                        </td>
                                    @else
                                        <td>nope</td>
                                    @endif
                                    <td> {{ $book->publishers->implode('name',',') }} </td>
                                    <td> {{ $book->location_id }}     </td>
                                    <td>
                                        <span
                                            class="badge badge-{{ $book->bookDetails->availability ? 'success' : 'danger' }}">
                                            {{ $book->bookDetails->availability ? 'Müsait' : 'Müsait Değil' }}
                                        </span>
                                    </td>
                                    <td> {{ $book->categories->implode('name',',') }} </td>
                                    <td class="justify-content-end form-inline">
                                        <a href="{{ route('admin.books.edit', $book->id) }}"
                                           class="btn btn-primary btn-icon-split btn-sm">
                                        <span class="icon text-white-xs">
                                          <i class="fas fa-edit"></i>
                                        </span>
                                            <span class="text">Düzenle</span>
                                        </a>
                                        <form action="{{ route('admin.books.destroy',$book->id) }}" method="post">
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
                                    @endforeach
                                </tr>
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

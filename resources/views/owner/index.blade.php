@extends('layout.owner')

@section('head')
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <style>
        .dataTables_length,.dataTables_filter {
            float: right;
        }
        div.dt-buttons {
            float: left;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <section class="content-header">
            @include('flash-message')
        </section>
        <section class="content">
            <div class="container">
                <div class="card card-solid">
                    <div class="card-body">
                        <table class="table" id="tabelItem">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Item Name</th>
                                    <th>Type</th>
                                    <th>Unit</th>
                                    <th>Price per Unit</th>
                                    <th>Stock (Unit)</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <a href="{{ route('owner.itemDetail', $item->id) }}">
                                            {{ $item->nama }}
                                        </a>
                                    </td>
                                    <td>{{ $item->type->name }}</td>
                                    <td>{{ $item->unit->name }}</td>
                                    <td>{{ $item->harga }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-success editItem" data-id="{{ $item->id }}" data-nama="{{ $item->nama }}" data-type="{{ $item->type_id }}" data-unit="{{ $item->unit_id }}" data-harga="{{ $item->harga }}" data-stok="{{ $item->stok }}" data-foto="{{ $item->foto }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="{{ route('item.destroy', $item->id) }}" method="post" style="display: inline-block">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('modal')
    <!-- Modal Tambah Item-->
    <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addItemModalLabel">Add Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Item Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" placeholder="Item Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type_id" class="col-sm-3 col-form-label">Type</label>
                            <div class="col-sm-9">
                                <select name="type_id" class="form-control" required>
                                    @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="unit_id" class="col-sm-3 col-form-label">Unit</label>
                            <div class="col-sm-9">
                                <select name="unit_id" class="form-control" required>
                                    @foreach($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label">Price per Unit</label>
                            <div class="col-sm-9">
                                <input type="text" name="price" class="form-control" placeholder="Price per Unit" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stock" class="col-sm-3 col-form-label">Stock</label>
                            <div class="col-sm-9">
                                <input type="number" name="stock" class="form-control" placeholder="Stock" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-sm-3 col-form-label">Picture</label>
                            <div class="col-sm-9">
                                <input type="file" name="foto" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Item-->
    <div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="editItemModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editItemModalLabel">Edit Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" enctype="multipart/form-data" id="formEditItem">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Item Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Item Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type_id" class="col-sm-3 col-form-label">Type</label>
                            <div class="col-sm-9">
                                <select name="type_id" id="type_id" class="form-control">
                                    @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="unit_id" class="col-sm-3 col-form-label">Unit</label>
                            <div class="col-sm-9">
                                <select name="unit_id" id="unit_id" class="form-control">
                                    @foreach($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label">Price per Unit</label>
                            <div class="col-sm-9">
                                <input type="text" name="price" id="price" class="form-control" placeholder="Price per Unit">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stock" class="col-sm-3 col-form-label">Stock</label>
                            <div class="col-sm-9">
                                <input type="number" name="stock" id="stock" class="form-control" placeholder="Stock">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-sm-3 col-form-label">Picture</label>
                            <div class="col-sm-9">
                                <input type="file" name="foto" id="foto" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $("#tabelItem").DataTable({
            dom: "<'row'<'col-md-6'B><'col-md-6'f>>" +
                "<'row'<'col-md-6'><'col-md-6'>>" +
                "<'row'<'col-md-12't>><'row'<'col-md-12'ip>>",
            buttons: [
                {
                    text: "<i class='fas fa-plus'></i> Tambah",
                    className: "btn btn-primary",
                    attr: {
                        'data-toggle': "modal",
                        'data-target': "#addItemModal"
                    }
                }
            ]
        });

        $(".editItem").on('click', function(){
            let id      = $(this).data('id');
            let nama    = $(this).data('nama');
            let type    = $(this).data('type');
            let unit    = $(this).data('unit');
            let harga   = $(this).data('harga');
            let stok    = $(this).data('stok');
            let foto    = $(this).data('foto');
            let action  = 'item/'+id;
            $("#formEditItem").attr('action', action);
            $("#name").val(nama);
            $("#type_id").val(type);
            $("#unit_id").val(unit);
            $("#price").val(harga);
            $("#stock").val(stok);
            $("#editItemModal").modal('show');
        });
    });

</script>
@endsection
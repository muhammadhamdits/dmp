@extends('layout.owner')

@section('content')
    <div class="container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Item Detail</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container">
                <div class="card card-solid">
                    <div class="card-body pb-0">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-4">
                                <div class="gambar" style="background-image: url('/img/item/{{ $item->foto }}')">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">ID:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $item->id }}" style="border: none; border-color: transparent;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Item Name:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $item->nama }}" style="border: none; border-color: transparent;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Type:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $item->type->name }}" style="border: none; border-color: transparent;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Unit:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $item->unit->name }}" style="border: none; border-color: transparent;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Price Per Unit:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $item->harga }}" style="border: none; border-color: transparent;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Stock:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $item->stok }}" style="border: none; border-color: transparent;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
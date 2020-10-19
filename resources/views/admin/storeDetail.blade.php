@extends('layout.admin')

@section('content')
    <div class="container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-center">
                    <div class="col-sm-6">
                        <h1 class="text-center">{{ $store->shop_name }}</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group ml-4">
                                    <label>Photo:</label>
                                    <p>
                                    <a href="{{ url('/img/ktp/'.$store->ktp) }}" class="btn btn-primary" data-toggle="lightbox">KTP</a>
                                    <a href="{{ url('/img/shop/'.$store->pict_1) }}" class="btn btn-primary" data-toggle="lightbox">Store</a>
                                    </p>
                                </div>
                                <div class="form-group ml-4">
                                    <label>Owner Name:</label>
                                    <p>{{ $store->name }}</p>
                                </div>
                                <div class="form-group ml-4">
                                    <label>Phone Number:</label>
                                    <p>{{ $store->phone_number }}</p>
                                </div>
                                <div class="form-group ml-4">
                                    <label>Owner Address:</label>
                                    <p>{{ $store->owner_address }}</p>
                                </div>
                                <div class="form-group ml-4">
                                    <label>E-Mail:</label>
                                    <p>{{ $store->email }}</p>
                                </div>
                                <div class="form-group ml-4">
                                    <label>Other Information:</label>
                                    <p>{{ $store->other_info }}</p>
                                </div>
                                @if($store->status == 0)
                                <div class="form-group ml-4 float-right">
                                    <form action="{{ route('admin.confirmStore', [$store->id]) }}" method="post" style="display: inline-block">
                                        @csrf
                                        <input type="hidden" name="status" value="2">
                                        <button onclick="return confirm('Are you sure refuse this store?')" type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Refuse</button>
                                    </form>
                                    <form action="{{ route('admin.confirmStore', [$store->id]) }}" method="post" style="display: inline-block">
                                        @csrf
                                        <input type="hidden" name="status" value="1">
                                        <button onclick="return confirm('Are you sure accept this store?')" type="submit" class="btn btn-success ml-2"><i class="fas fa-check"></i> Accept</button>
                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
<script>
    $(function () {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });
    })
</script>
@endsection
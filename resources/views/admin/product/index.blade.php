@extends('admin.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
@endsection
@section('button')
<a href="{{ route('productCreate') }}" class="btn btn-outline-primary">Thêm</a>
@endsection
@section('content')
<div class="card">
  <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tiêu đề</th>
                    <th>Phân loại</th>
                    <th>Stock</th>
                    <th width="20%">Số lượng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{!! str_replace('-', ' ', ucwords($row->title)) !!}</td>
                    <td>
                        {!! str_replace('-', ' ', ucwords($row->category->name)) !!}
                    </td>
                    <td>{{ $row->stock }}</td>
                    <td>
                        <a href="{{ route('productEdit', $row->title ) }}"><span class="btn btn-sm btn-outline-primary">Thông tin</span></a>
                    </td>
                </tr>
                @endforeach
                <tbody>
        </table>
  </div>
</div>
@endsection
@section('js')
<script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
  let table1 = document.querySelector('#table1');
  let dataTable = new simpleDatatables.DataTable(table1);
</script>
@endsection
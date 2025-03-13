@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sub->SubCategory List <span
                                    class="badge badge-pill badge-danger"> {{ $categories->flatMap->subcategories->flatMap->subsubcategories->count() }} </span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>

                                    <tr>
                                        <th>Category</th>
                                        <th>SubCategory Name</th>
                                        <th>Sub-Subcategory</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        @foreach($category->subcategories as $subcategory)
                                            @foreach($subcategory->subsubcategories as $subsubcategory)
                                        <tr>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $subcategory->subcategory_name }}</td>
{{--                                            <td> {{ $subsubcategory['category']['category_name'] }}  </td>--}}
{{--                                            <td>{{ $subsubcategory['subcategory']['subcategory'] }}</td>--}}
                                            <td>{{ $subsubcategory->subsubcategory_name }}</td>
                                            <td width="30%">
                                                <a href="{{ route('subsubcategory.edit',$subsubcategory->id) }}"
                                                   class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i>
                                                </a>

                                                <a href="{{ route('subsubcategory.delete',$subsubcategory->id) }}"
                                                   class="btn btn-danger" title="Delete Data" id="delete">
                                                    <i class="fa fa-trash"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                        @endforeach
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->

                <!--   ------------ Add Category Page -------- -->

                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Sub-SubCategory </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('subsubcategory.store') }}">

                                    @csrf

                                    <div class="form-group">
                                        <h5>Category Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control">
                                                <option value="" selected="" disabled="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option
                                                        value="{{ $category->id}}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_id" class="form-control">
                                                <option value="" selected="" disabled="">Select SubCategory</option>

                                            </select>
                                            @error('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5>Sub-SubCategory <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name" class="form-control">
                                            @error('subsubcategory_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
                                    </div>
                                </form>


                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>


            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection

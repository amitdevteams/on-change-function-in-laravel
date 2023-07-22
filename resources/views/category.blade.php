<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Onchange Function in laravel</title>
</head>

<body>
    <h1 class="text-center mt-3">Onchange function</h1>
    <div class="container" style="margin-top: 83px;">
        <div class="col-lg-12">
            <div class="row">

                <div class="col-lg-4">
                    <h4>Add Category</h4>
                    <form action="{{ route('store.category') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="category"
                                placeholder="Enter your category name">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <h4>Add SubCategory</h4>
                    <form method="POST" action="{{ route('store.subcategory') }}">
                        @csrf
                        <div class="form-group col-sm-12 text-secondary">
                            <select class="form-control" name="category_id" class="form-select form-select-sm mb-3"
                                aria-label=".form-select-sm example">
                                <option selected="">Open this select menu</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12 text-secondary">
                            <input type="text" name="subcategory_name" class="form-control"
                                placeholder="Enter your subcategory" />
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 ml-3">Submit</button>
                    </form>

                </div>
                <div class="col-lg-4">
                    <h4>Onchange category</h4>

                    <select name="category_id" class="form-select form-control" id="inputVendor">
                        <option></option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                        @endforeach
                    </select>
                    <div class="form-group col-12 mt-2">
                        <label for="inputCollection" class="form-label">Product SubCategory</label>
                        <select name="subcategory_id" class="form-select form-control" id="inputCollection">
                            <option></option>
                        </select>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/subcategory/') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subcategory_id"]').html('');
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name + '</option>');
                            });
                        },

                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>


</body>

</html>

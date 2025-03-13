<form class="control-group" id="search-form" method="GET" action="{{ route('product.search') }}">
    <input type="text" name="search" id="search-input" value="{{ request('search') }}" placeholder="Пошук...">
    <button type="submit">🔍</button>
</form>

@if($products->isEmpty())
    <p>Nothing found.</p>
@else
    @foreach($products as $product)
        <div class="search-item">{{ $product->name }}</div>
    @endforeach
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#search-form").on("submit", function (e) {
            e.preventDefault();

            let query = $("#search-input").val();
            let resultsContainer = $("#search-results");

            $.ajax({
                url: "{{ route('product.search') }}",
                method: "GET",
                data: {search: query},
                dataType: "html",
                success: function (data) {
                    resultsContainer.html(data);
                    $("#search-input").val(query);
                },
                error: function () {
                    console.error("Error while searching");
                }
            });
        });
    });
</script>

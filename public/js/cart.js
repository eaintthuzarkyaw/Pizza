// when + button click
$(document).ready(function () {
    $(".btn-plus").click(function () {
        $parentNode = $(this).parents("tr");
        $price = Number(
            $parentNode.find("#price").text().replace("kyats", " ")
        );
        $qty = $parentNode.find("#qty").val();
        $total = $price * $qty;
        $total = $parentNode.find("#total").html(`${$total} kyats`);

        summaryCalculation();
    });

    // when - button click
    $(".btn-minus").click(function () {
        $parentNode = $(this).parents("tr");
        $price = Number(
            $parentNode.find("#price").text().replace("kyats", " ")
        );
        $qty = $parentNode.find("#qty").val();
        $total = $price * $qty;
        $total = $parentNode.find("#total").html(`${$total} kyats`);

        summaryCalculation();
    });

    //calculate final price from order
    function summaryCalculation() {
        $priceTotal = 0;
        $("#dataTable tbody tr").each(function (index, row) {
            $priceTotal += Number(
                $(row).find("#total").text().replace("kyats", "")
            );
        });

        $("#subTotalPrice").html(`${$priceTotal} Kyats`);
        $("#finalPrice").html(`${$priceTotal + 3000} Kyats`);
    }
});

$(document).ready(function()
{
    function updatePrice() {
        var bitcoin_amount = parseFloat($("#bitcoin_amount").val());
        var bitcoin_fees = bitcoin_amount * .02;
        var bitcoin_total = bitcoin_amount + bitcoin_fees;
        bitcoin_fees = Math.round(bitcoin_fees*100).toFixed(2)/100;
        bitcoin_total = Math.round(bitcoin_total*100).toFixed(2)/100;
        $("#bitcoin_subtotal").val(bitcoin_amount);
        $("#bitcoin_fees").val(bitcoin_fees);
        $("#bitcoin_total").val(bitcoin_total);
        $("#estimated_bitcoins").val(Math.round((bitcoin_amount/estimated_bitcoins)*100000).toFixed(5)/100000);
    }
    $(document).on("change, keyup", "#bitcoin_amount", updatePrice());
});
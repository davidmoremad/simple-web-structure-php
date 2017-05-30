// Search field (common)
function FilterResults(filtertext) {
$(".col-md-4,.col-md-6").each(function (index, element) {
    if ($(element).text().toUpperCase().indexOf(filtertext.toUpperCase()) > -1) {
        $(element).show();
    } else {
        $(element).hide();
    }
});
}

function FilterTextBox() {
FilterResults($("#SearchTB").val());
}

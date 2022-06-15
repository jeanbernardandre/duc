$("select.table-responsive").each(function() {
    $(this).on('change', function () {
        var valueSelected = this.value;
        var path = $(this).parents('section');
        path.find('article').css('display', 'none');
        path.find('article.line-' + valueSelected).css('display', 'block');
    });
});
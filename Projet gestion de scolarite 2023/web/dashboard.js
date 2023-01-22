(function($) {
    $("#reject").click(function (e) {
        e.preventDefault();
        $('.form-check-input:checkbox:checked').each(function () {
            if(this.checked){
                $.ajax({
                    type: "POST",
                    url: '/reject.php',
                    data: {
                        'id': $(this).val()
                    },
                    success: function(data)
                    {
                        alert(data);
                    },
                    error: function (error) {
                        alert(error);
                    }
                });
            }
        });
        window.location.reload();
    });

    $("#approve").click(function (e) {
        e.preventDefault();
        $('.form-check-input:checkbox:checked').each(function () {
            if(this.checked){
                $.ajax({
                    type: "POST",
                    url: '/approve.php',
                    data: {
                        'id': $(this).val()
                    },
                    success: function(data)
                    {
                        alert(data);
                    },
                    error: function (error) {
                        alert(error);
                    }
                });
            }
        });
        window.location.reload();
    });

})(jQuery);
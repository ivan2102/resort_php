$(document).ready(function() {

    $(".image_container").click(function() {

        var user_input;
        location.reload();
        return user_input = confirm("Are you sure you want to delete this image");

    });


    $('#selectAllBoxes').click(function(event) {

        if (this.checked) {

            $('.checkBoxes').each(function() {

                this.checked = true;
            });

        } else {

            $('.checkBoxes').each(function() {

                this.checked = false;
            });
        }

    });



    var div_box = "<div id='load-screen'><div id='loading'></div></div>";

    $("body").prepend(div_box);
    $('#load-screen').delay(700).fadeOut(600, function() {

        $(this).remove();
    });


});
console.log("map");

//! filter
$(function () {
    $("#filter").click(function (e) {
        e.preventDefault();
        var errors = [];
        hideError();

        if ($('input[name="offer_type"]').is(":checked") == false) {
            errors.push("Оберіть тип пропозиції");
        }

        if ($('select[name="culture_type"] option:selected').val() === "") {
            errors.push("Оберіть тип культури");
        }

        $('select[name="culture_type]').change(function () {
            var selectedCountry = $(this).children("option:selected").val();
            alert("You have selected the country - " + selectedCountry);
        });

        if (errors.length != 0) {
            errors.forEach(showError);
        }
    });
});

function showError(item, index) {
    if (!index) {
        $(".errors").show();
    }

    $(".errors ul").append(`<li class="error">${item}</li>`);
}

function hideError() {
    $(".error").remove();
    $(".errors").hide();
}

//! map copyright
if (
    $(".copyright .link").attr("href") != "https://apartner.top" ||
    $(".copyright .link").is(":hidden") ||
    $(".copyright .link").css("opacity") == 0 ||
    $(".copyright").is(":hidden") ||
    $(".copyright").css("opacity") == 0
) {
    $(".copyright").remove();

    $("body").append(`
        <div class="copyright">
            <a href="https://apartner.top" title="Development of sites on laravel, prestashop, wordpress and their support" class="link" target="_blank" rel="dofollow">
                    APARTNER.TOP
                <strong class="description">Development of sites on Laravel, PrestaShop, Wordpress and their support</strong>
            </a>
        </div>
    `);
}

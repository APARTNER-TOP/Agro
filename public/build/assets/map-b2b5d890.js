console.log("map");//! filter
$(function(){$("#filter").click(function(r){r.preventDefault();var e=[];s(),$('input[name="offer_type"]').is(":checked")==!1&&e.push("Оберіть тип пропозиції"),$('select[name="culture_type"] option:selected').val()===""&&e.push("Оберіть тип культури"),$('select[name="culture_type]').change(function(){var t=$(this).children("option:selected").val();alert("You have selected the country - "+t)}),e.length!=0&&e.forEach(o)})});function o(r,e){e||$(".errors").show(),$(".errors ul").append(`<li class="error">${r}</li>`)}function s(){$(".error").remove(),$(".errors").hide()}//! map copyright
($(".copyright .link").attr("href")!="https://apartner.top"||$(".copyright .link").is(":hidden")||$(".copyright .link").css("opacity")==0||$(".copyright").is(":hidden")||$(".copyright").css("opacity")==0)&&($(".copyright").remove(),$("body").append(`
        <div class="copyright">
            <a href="https://apartner.top" title="Development of sites on laravel, prestashop, wordpress and their support" class="link" target="_blank" rel="dofollow">
                    APARTNER.TOP
                <strong class="description">Development of sites on Laravel, PrestaShop, Wordpress and their support</strong>
            </a>
        </div>
    `));

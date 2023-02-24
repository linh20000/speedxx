var pattern = {
    "ä|æ|ǽ": "ae",
    "ö|œ": "oe",
    "ü": "ue",
    "à|á|â|ã|å|ǻ|ā|ă|ą|ǎ|ª": "a",
    "ç|ć|ĉ|ċ|č": "c",
    "ĝ|ğ|ġ|ģ": "g",
    "ĥ|ħ": "h",
    "ì|í|î|ï|ĩ|ī|ĭ|ǐ|į|ı": "i",
    "ĵ": "j",
    "ķ": "k",
    "ĺ|ļ|ľ|ŀ|ł": "l",
    "ñ|ń|ņ|ň|ŉ": "n",
    "ò|ó|ô|õ|ō|ŏ|ǒ|ő|ơ|ø|ǿ|º": "o",
    "/ŕ|ŗ|ř": "r",
    "ś|ŝ|ş|š|ſ": "s",
    "è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ": "e",
    "ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ": "u",
    "ý|ÿ|ŷ": "y",
    "ì|í|ị|ỉ|ĩ": "i",
    "ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ": "o",
    "ỳ|ý|ỵ|ỷ|ỹ": "y",
    "đ": "d"
};

function slugify(e) {
    return e = (e = e.replace(/^\s+|\s+$/g, "")).toLowerCase(), $.each(pattern, function(t) {
        for (var a = t.split("|"), c = pattern[t], r = a.length, i = 0; i < r; i++) e = e.replace(new RegExp(a[i], "g"), c)
    }), e = e.replace(/[^a-z0-9 -]/g, "").replace(/\s+/g, "-").replace(/-+/g, "-")
}

function onVendorAndTypeFilter() {

}

function addFilterEffect() {
    $("#catalog_block").length && $("#catalog_block").hasClass("ajax-filter") && $(".catalog_filters").length && $(".advanced-filter").each(function() {
        dataGroup = $(this).data("group"), "Vendor" != dataGroup && (activeFilter = "", $(this).hasClass("active-filter") && (activeFilter = ' checked="checked"'), $("a", $(this)).each(function() {
            var e = slugify($(this).parent().data("handle"));
            $("body").hasClass("template-collection") ? ($('<input class="chkval checkbox" type="checkbox" name=' + dataGroup + activeFilter + ' value="' + e + '"/>').insertBefore($(this)), $(this).click(function(e) {
                return chkVal = $(this).parent().find(".chkval"), chkVal.prop("checked", !chkVal.prop("checked")), $(this).parent().toggleClass("active-filter"), FilterLoadResult(), !1
            })) : ($(this).attr("href", "/collections/all/" + e), $(this).unbind("click"))
        }))
    }), $("#SortBy").change(function(e) {
        console.log('trigger sortby change')
        e.preventDefault();
        var t = window.location.href;
        if (t.indexOf("search") > 0) switch ($(this).val()) {
            case "title-ascending":
                t = replaceUrlParam(t, "sortby", "(title:product=asc)");
                break;
            case "title-descending":
                t = replaceUrlParam(t, "sortby", "(title:product=des)");
                break;
            case "price-ascending":
                t = replaceUrlParam(t, "sortby", "(price:product=asc)");
                break;
            case "price-descending":
                t = replaceUrlParam(t, "sortby", "(price:product=des)");
                break;
            case "created-ascending":
                t = replaceUrlParam(t, "sortby", "(created:product=asc)");
                break;
            case "created-descending":
                t = replaceUrlParam(t, "sortby", "(created:product=des)")
        } else t = replaceUrlParam(t, "sort_by", $(this).val());
        return processCollectionAjax(t), !1
    }), $(".change-view").click(function(e) {
        if (e.preventDefault(), $(this).hasClass("change-view--active")) return !1;
        $(".change-view").removeClass("change-view--active"), $(this).addClass("change-view--active");
        var t = window.location.href;
        return processCollectionAjax(t = replaceUrlParam(t, "view", $(this).data("view"))), $(".product_list").removeClass("list").removeClass("grid").addClass($(this).data("view")), !1
    }), pagingCollection()
}

function FilterLoadResult() {
    collecionid = $("#catalog_block").data("collection"), collecionid ? q = "filter=((collectionid:product=" + collecionid + ")" : q = "filter=((collectionid:product>=0)", textsize = "", $("#ul_catalog_size .chkval").each(function() {
        $(this).is(":checked") && (0, vc = $(this).val().toLowerCase(), textsize += (textsize ? "||" : "") + "(variant:product=" + Haravan.encodeExpressionValue(vc) + ")")
    }), textcolor = "", $("#ul_catalog_color .chkval").each(function() {
        $(this).is(":checked") && (0, vc = $(this).val().toLowerCase(), textcolor += (textcolor ? "||" : "") + "(variant:color=" + Haravan.encodeExpressionValue(vc) + ")")

    }), textPrice = "", $("#ul_catalog_price .chkval").each(function() {
        if ($(this).is(":checked"))
            if (0, vc = $(this).val().toLowerCase(), vc.indexOf("duoi") > -1) vc = vc.replace("duoi ", "<="), textPrice += (textPrice ? "||" : "") + "(price:product" + vc + ")";
            else if (vc.indexOf("tren") > -1) vc = vc.replace("tren ", ">"), textPrice += (textPrice ? "||" : "") + "(price:product" + Haravan.encodeExpressionValue(vc) + ")";
        else {
            vc = vc.split("-"), tmpprice = "";
            for (var e in vc) tmpprice += (tmpprice ? "&&" : "") + "(price:product" + (0 == e ? ">" : "<=") + vc[e] + ")";
            textPrice += (textPrice ? "||" : "") + "(" + tmpprice + ")"
        }
    });

    var e = "/search?q=" + q;
    if (textsize && (textsize.split("||").length > 1 ? e += "&&(" + textsize + ")" : e += "&&" + textsize), textcolor && (textcolor.split("||").length > 1 ? e += "&&(" + textcolor + ")" : e += "&&" + textcolor), textPrice && (textPrice.split("||").length > 1 ? e += "&&(" + textPrice + ")" : e += "&&" + textPrice), e += ")", view = $(".change-view--active").data("view"), "list" == view &&
        (e = replaceUrlParam(e, "view", $(this).data("view"))), sortby = $("#SortBy").val(), "manual" != sortby)
        switch (sortby) {
            case "title-ascending":
                e = replaceUrlParam(e, "sortby", "(title:product=asc)");
                break;
            case "title-descending":
                e = replaceUrlParam(e, "sortby", "(title:product=des)");
                break;
            case "price-ascending":
                e = replaceUrlParam(e, "sortby", "(price:product=asc)");
                break;
            case "price-descending":
                e = replaceUrlParam(e, "sortby", "(price:product=des)");
                break;
            case "created-ascending":
                e = replaceUrlParam(e, "sortby", "(created:product=asc)");
                break;
            case "created-descending":
                e = replaceUrlParam(e, "sortby", "(created:product=des)")
						
        }
    processCollectionAjax(e)
}

function pagingCollection() {
    activeNumber = parseInt($(".pagination li.active a").html()), $("#pagination .pagination a").click(function() {
        var e = 0;
        if ((e = $(this).parent().hasClass("pagination_previous") ? activeNumber - 1 : $(this).parent().hasClass("pagination_next") ? activeNumber + 1 : parseInt($(this).html())) > 0) {
            var t = window.location.href;
            processCollectionAjax(t = replaceUrlParam(t, "page", e))
        }
        return !1
    })
}

function replaceUrlParam(e, t, a) {
    var c = new RegExp("(" + t + "=).*?(&|$)"),
        r = e.replace(c, "$1" + a + "$2");
    return r == e && (r = r + (r.indexOf("?") > 0 ? "&" : "?") + t + "=" + a), r
}

function processCollectionAjax(e) {
    console.log(e, 'url ajax to call')
    $.ajax({
        type: "GET",
        url: e,
        data: {},
        beforeSend: function() {
            $("product-list").addClass("loading")
        },
        complete: function(t) {
            $("product-list", t.responseText).length ? ($("product-list").html($("product-list", t.responseText).html()), $(".content_sortPagiBar").html($(".content_sortPagiBar", t.responseText).html())) : ($("product-list").html(""), $(".content_sortPagiBar").html("")), $("product-list").removeClass("loading"),
                history.pushState({
                page: e
            }, e, e) ,
                $("#pagination", t.responseText).length ? ($("#pagination").html($("#pagination", t.responseText).html())) : $("#pagination").html("")
            $(".product-facet__meta-bar-item--count", t.responseText).length ? ($(".product-facet__meta-bar-item--count").html($(".product-facet__meta-bar-item--count", t.responseText).html())) : $(".product-facet__meta-bar-item--count").html("")

            pagingCollection()
        }
    })
}
addFilterEffect();
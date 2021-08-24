/**
 * @file
 *   Javascript for the adding event tracking from advanced datalayer.
 */

(function ($) {
    // Check Tint is exist on any content type.
    if($(".tint-social").length > 0) {
        // Get title of the node.
        var content_title = $(".tint-social").data("eventlabel");
        dataLayer.push({
            event:"viewUGC",
            eventCategory:"UGC",
            eventAction:"View UGC",
            eventLabel:content_title
        })
    }

})(jQuery);

// Evidon cookie consent js event.
function tintcokkieConsentAcceptance() {
    let cookies = document.cookie;
    let myCookies = cookies.split("; ");

    for (let index = 0; index < myCookies.length; index++) {
        let temp = myCookies[index].split("=");
        let cookie_name = temp[0];
        let cookie_value = temp[1];

        if (cookie_name === "_evidon_suppress_notification_cookie") {
            jQuery(document).find(".tintup").attr("data-notrack", true);
            var iframe = jQuery(document).find(".tintup iframe");
            var src = iframe.attr('src');
            iframe.attr('src', src + '&notrack=true');
            break;
        }
        if (cookie_name === "_evidon_consent_cookie") {
            jQuery(document).find(".tintup").attr("data-notrack", false);
            var iframe = jQuery(document).find(".tintup iframe");
            var src = iframe.attr('src');
            iframe.attr('src', src + '&notrack=false');
            break;
        }
    }
}

jQuery(document).ready(function() {
    tintcokkieConsentAcceptance();
    setTimeout(function() {
        jQuery("[class$='acceptbutton']").each(function() {
            jQuery(this).on("click", function() {
                jQuery(document).find(".tintup").attr("data-notrack", false);
                var iframe = jQuery(document).find(".tintup iframe");
                var src = iframe.attr('src');
                iframe.attr('src', src + '&notrack=false');
            });
        });
    }, 2000);
});

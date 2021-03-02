// Counter =====================================================================
jQuery('.dm_counter').each(function () {

    "use strict";

    var el = jQuery(this);
    el.waypoint({
        handler: function () {

            if (!el.hasClass('stop')) {
                el.addClass('stop').countTo({
                    refreshInterval: 50,
                    formatter: function (value, options) {
                        return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                    },
                });
            }
        },
        offset: '80%'
    });
});

define(
    [
        'ko',
        'uiComponent'
    ],
    function (ko, Component) {
        "use strict";

        return Component.extend({
            defaults: {
                template: 'Intern_Checkout/newsletter'
            },
            isRegisterNewsletter: true
        });
    }
);

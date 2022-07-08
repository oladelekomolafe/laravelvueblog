export default {
    name: 'vue-laravel-csrf',
    config: {},
    install (Vue, installOptions) {
        // Directive to add csrf-token
        Vue.directive("csrf-token", {
            inserted: function(el) {
                let token = document.head.querySelector('meta[name="csrf-token"]').content;
                let hidden = document.createElement("input");
                hidden.setAttribute('type', "hidden")
                hidden.setAttribute('name', "_token");
                hidden.setAttribute('value', token);
                el.appendChild(hidden);
            }
        });
    }
};
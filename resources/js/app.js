/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Unicon from 'vue-unicons'


/// model
import { uniSignout, uniEnvelopeAlt, uniAngleLeft,uniBars,uniUser,uniBookMedical,
        uniCornerDownLeft,uniSetting, uniBell,uniBooks, uniClipboardAlt, uniDialpadAlt,
        uniCircle ,uniUsersAlt , uniShoppingCart , uniCommentMessage , uniSchedule,
        uniSortAmountDown, uniSortAmountUp,uniTrashAlt,uniEdit,uniCopy} from 'vue-unicons/src/icons'

Unicon.add([uniSignout, uniEnvelopeAlt, uniAngleLeft,uniBars,uniUser,uniBookMedical,uniCornerDownLeft,
            uniSetting, uniBell,uniBooks, uniClipboardAlt, uniDialpadAlt,uniCircle , uniUsersAlt , uniSchedule,
            uniShoppingCart , uniCommentMessage, uniSortAmountDown, uniSortAmountUp,uniTrashAlt,uniEdit,uniCopy])
Vue.use(Unicon)
/////////


//////
import VueTippy, { TippyComponent } from "vue-tippy";

Vue.use(VueTippy, {
  directive: "tippy", // => v-tippy
  flipDuration: 0,
  popperOptions: {
    modifiers: {
      preventOverflow: {
        enabled: false
      }
    }
  }
});

Vue.component("tippy", TippyComponent);

import "tippy.js/themes/light.css";
import "tippy.js/themes/light-border.css";
import "tippy.js/themes/google.css";
import "tippy.js/themes/translucent.css";

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

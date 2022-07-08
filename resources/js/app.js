import './bootstrap';


import { createApp } from 'vue';
import adminmain from './components/admin/adminmain.vue';
import homemain from './components/blog/Blogmain.vue';
import router from './router';
import { createStore } from 'vuex';

import moment from 'moment';

import storeData from './store/index';
/*import 'v-markdown-editor/dist/index.css';
import Editor from 'v-markdown-editor';*/
import VMdEditor from '@kangc/v-md-editor';
import '@kangc/v-md-editor/lib/style/base-editor.css';
import vuepressTheme from '@kangc/v-md-editor/lib/theme/vuepress.js';
import '@kangc/v-md-editor/lib/theme/style/vuepress.css';
import enUS from '@kangc/v-md-editor/lib/lang/en-US';

// Prism
import Prism from 'prismjs';
// highlight code
import 'prismjs/components/prism-json';

VMdEditor.use(vuepressTheme, {
  Prism,
});
VMdEditor.lang.use('en-US', enUS);

const store = createStore(
	storeData
);

const app = createApp({});

app.component('adminmain', adminmain);
app.component('homemain', homemain);

app.use(router);
app.use(store);
app.use(VMdEditor);

app.config.globalProperties.$dateFormat = (date) => {
	return moment(date).format("MMMM Do YYYY")
}

app.config.globalProperties.$sortLength = (text, length, suffix) => {
	return text.toString().substring(0, length) + suffix;
}
	/*dateTimeFormat(date) {
		return moment(date).format("MMMM Do YYYY")
	},*/
	
// mount the app to the DOM
app.mount('#app');


//import 'mainapp', require('./components/mainapp.vue'));

//app.mount('#app');
/*const app = new createApp({
	el: '#app',
	components: { App }
});*/

import { createWebHistory, createRouter } from 'vue-router';
import { createApp } from 'vue';
import adminpage from './components/admin/home.vue';
import categorylist from './components/admin/category/List.vue';
import addcategory from './components/admin/category/New.vue';
import editcategory from './components/admin/category/Edit.vue';
import postlist from './components/admin/post/List.vue';
import addpost from './components/admin/post/New.vue';
import editpost from './components/admin/post/Edit.vue';
import contactus from './components/admin/contactus.vue';
import blogpage from './components/admin/blog.vue';
import notfound from './components/admin/notfound.vue';
import bloghome from './components/blog/Bloghome.vue';
import blogpost from './components/blog/Blogpost.vue';
import singleblog from './components/blog/Singleblog.vue';
import blogcontact from './components/blog/Blogcontact.vue';

// 2. Define some routes
// Each route should map to a component.
// We'll talk about nested routes later.
const routes = [
  //{ path: '/', component: homepage },
  { path: '/home', component: adminpage },
  { path: '/category-list', component: categorylist },
  { path: '/add-category', component: addcategory },
  { path: '/edit-category/:categoryid', component: editcategory },
  { path: '/post-list', component: postlist },
  { path: '/add-post', component: addpost },
  { path: '/edit-post/:postid', component: editpost },
  { path: '/contactus', component: contactus },
  //{ path: '/blog', name: "blog", component: blogpage },

  //frontend route
  { path: '/', name: "blog", component: bloghome },
  { path: '/blog', name: "blogpost", component: blogpost },
  { path: '/blogpost/:postid', component: singleblog },
  { path: '/categories/:catid', component: blogpost },
  { path: '/contact', name: "blogcontact", component: blogcontact },
  //{ path: "/:catchAll(.*)", component: notfound },
  //{ path: '/about', component: About },
]

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = createRouter({
  // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
  history: createWebHistory(),
  routes, // short for `routes: routes`
});

export default router;

/*// 5. Create and mount the root instance.
const app = Vue.createApp({})
// Make sure to _use_ the router instance to make the
// whole app router-aware.
app.use(router)*/
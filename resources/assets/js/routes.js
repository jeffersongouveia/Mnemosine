import VueRouter from 'vue-router';

export default new VueRouter({
   routes: [
       {
           path: '/logins',
           component: require('./components/Logins.vue')
       },
       {
           path: '/favorites',
           component: require('./components/Favorites.vue')
       },
       {
           path: '/notes',
           component: require('./components/Notes.vue')
       },
       
       {
           path: '/login/create',
           component: require('./components/login/LoginCreate.vue')
       }
   ]
});
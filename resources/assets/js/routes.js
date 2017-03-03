import VueRouter from 'vue-router';

export default new VueRouter({
   routes: [
       {
           path: '/all',
           component: require('./components/item/AllItems.vue')
       },
       {
           path: '/logins',
           component: require('./components/login/Logins.vue')
       },
       {
           path: '/favorites',
           component: require('./components/Favorites.vue')
       },
       {
           path: '/notes',
           component: require('./components/note/Notes.vue')
       },
       
       {
           path: '/login/create',
           component: require('./components/login/LoginCreate.vue')
       },
       {
           path: '/note/create',
           component: require('./components/note/NoteCreate.vue')
       }
   ]
});
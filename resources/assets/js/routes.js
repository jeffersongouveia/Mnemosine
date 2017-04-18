import VueRouter from 'vue-router';

export default new VueRouter({
   routes: [
       {
           path: '/all',
           component: require('./components/item/AllItems.vue')
       },
       {
           path: '/equipments',
           component: require('./components/equipments/Equipments.vue')
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
           path: '/radius/create',
           component: require('./components/radius/RadiusCreate.vue')
       },
       {
           path: '/login/create',
           component: require('./components/login/LoginCreate.vue')
       },
       {
           path: '/note/create',
           component: require('./components/note/NoteCreate.vue')
       },
       {
           path: '/user/create',
           component: require('./components/UserCreate.vue')
       },
       {
           path: '/group/create',
           component: require('./components/GroupCreate.vue')
       },

       {
           path: '/configurations',
           component: require('./components/config/ConfigsList.vue')
       }
   ]
});
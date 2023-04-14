import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AdminView from '../views/AdminView.vue'
import SettingsView from '../views/SettingsView.vue'
import UserView from '../views/UserView.vue'
import SubView from '../views/SubradditView.vue'
import PostView from '../views/PostView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/admin',
      name: 'Admin',
      component: AdminView,
      meta: {
        // requiresAuth: true,
        title: 'Admin',
        metaTags: [
          {
            name: 'Admin',
            content: 'Admin stuff'
          }
        ]
      }
    },
    {
      path: '/settings',
      name: 'Settings',
      component: SettingsView
    },
    {
      //find a way to get the user from the local storage
      path: '/user/:id',
      name: 'User Page',
      component: UserView
    },
    {
      path: '/r/:subraddit_name',
      name: 'Subraddit Page',
      component: SubView
    },
    {
      path: '/p/:postId',
      name: 'Single Post Page',
      component: PostView
    }
    // route level code-splitting
    // this generates a separate chunk (About.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    // component: () => import('../views/AboutView.vue')
  ]
})

export default router

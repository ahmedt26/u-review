import Vue from 'vue'
import { createWebHistory, createRouter } from "vue-router"
import VueRouter from 'vue-router'
import Home from '@/views/Home.vue'
// import Login from '../views/Login.vue'
// import Registration from '../views/Registration.vue'
// import Submission from '../views/Submission.vue'
// import WriteReview from '../views/WriteReview.vue'
Vue.use(VueRouter)


const routes = [
  {
    path: '/',
    redirect: '/home',
    name: 'Home',
    component: Home
  },
  {
    path: '/login',
    name: 'Login',
    component: () => import(/* webpackChunkName: "about" */ '../views/Login.vue')
  },
  {
    path: '/registration',
    name: 'Registration',
    component: () => import(/* webpackChunkName: "about" */ '../views/Registration.vue')
  },
  {
    path: '/submission',
    name: 'Submission',
    component: () => import(/* webpackChunkName: "about" */ '../views/Submission.vue')
  },
  {
    path: '/writereview',
    name: 'WriteReview',
    component: () => import(/* webpackChunkName: "about" */ '../views/WriteReview.vue')
  },
  {
    path: '/about',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  },
  {
    path: '/:catchAll(.*)*',
    name: "PageNotFound",
    component: PageNotFound,
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router

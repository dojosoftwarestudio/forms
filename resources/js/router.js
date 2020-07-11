import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)
/*
	RUTAS
*/
import login from './auth/Login'
import home from './components/pages/Home'
import users from './components/pages/Users'
import forms from './components/pages/Forms'
import groups from './components/pages/Groups'
import inputs from './components/pages/inputs'
import apps from './components/pages/Apps'
import help from './components/pages/Help'
import settings from './components/pages/Settings'

const routes = [
	{
		path: '/login',
		component: login
	},
	{
		path: '/',
		component: home,
		meta:{
			requiresAuth: true
		}
	},
	{
		path: '/users',
		component: users,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/forms',
		component: forms,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/groups',
		component: groups,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/inputs',
		component: inputs,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/apps',
		component: apps
	},
	{
		path: '/help',
		component: help,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/settings',
		component: settings,
		meta: {
			requiresAuth: true
		}
	},
]

export default new Router({
	mode:'history',
	routes
})
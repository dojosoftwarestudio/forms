<template>
	<v-app id="forms-app">

		<v-navigation-drawer v-model="drawer" app :clipped="$vuetify.breakpoint.lgAndUp"  v-if="currentUser">
			<v-list nav dense>
				<v-list-item-group>
					<v-list-item  v-for="(menu, i) in menus" :key="i" :to="menu.url" dense style="text-decoration: none; color: inherit;">
						<v-list-item-icon>
							<v-icon>{{ menu.icon }}</v-icon>
						</v-list-item-icon>
						<v-list-item-content>
							<v-list-item-title v-text="menu.text"></v-list-item-title>
						</v-list-item-content>
					</v-list-item>
				</v-list-item-group>
			</v-list>
			<template v-slot:append v-if="currentUser">
				<div class="pa-2">
					<v-btn block color="primary" @click="logout()">Logout</v-btn>
				</div>
			</template>
		</v-navigation-drawer>

		<v-app-bar dark app color="#c13832" elevate-on-scroll :clipped-left="$vuetify.breakpoint.lgAndUp" >
			<v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
			<v-icon class="mx-4" large>mdi-toy-brick</v-icon>
			<v-toolbar-title >
				<span class="title">FORMS</span>
			</v-toolbar-title>
			<v-spacer></v-spacer>
			<v-menu offset-y>

				<v-list>
					<v-list-item v-for="(item, i) in items" :key="i">
						<v-list-item-title>{{ item.title }}</v-list-item-title>
					</v-list-item>
				</v-list>
          	</v-menu>
		</v-app-bar>

		<v-content>
			<v-container fluid>
				<router-view />
			</v-container>
		</v-content>

		<v-footer app color="#4d4e53" absolute class="font-weight-medium">
 			<v-col class="text-center" cols="12" >
        		{{ new Date().getFullYear() }} — <strong>DOJOES</strong>
      		</v-col>
		</v-footer>

	</v-app>
</template>


<script>
export default {
	components: {},
	data: () => ({
		drawer: null,
		items: [
			{ title: "Dashboard", icon: "mdi-view-dashboard" },
			{ title: "Photos", icon: "mdi-image" },
			{ title: "About", icon: "mdi-help-box" }
		],
		menus: [
				{ icon: "mdi-contacts", text: "Inicio", url:'/' },
				{ icon: "mdi-account-cog", url:'/users', text: "Usuarios" },
                { icon: "mdi-application", url:'/forms', text: "Formularios" },
                { icon: "mdi-application", url:'/groups', text: "Dash" },
                { icon: "mdi-application", url:'/inputs', text: "Inputs" },
                { icon: "mdi-help-circle", url:'/help', text: "Help" },
                { icon: "mdi-application", url:'/apps', text: "App DOJO" },
                { icon: "mdi-cogs", url:'/settings', text: "Settings" },
            ],
		icons: ["mdi-facebook", "mdi-twitter", "mdi-linkedin", "mdi-instagram"],
		color: "primary",
		colors: ["primary", "blue", "success", "red", "teal"],
		right: false,
		permanent: true,
		miniVariant: false,
		expandOnHover: false,
		background: false
	}),
	methods:{
		logout: function(){
			this.$store.commit('logout')
			this.$router.push('/login')
		}
	},
	computed:{
		currentUser(){
			return this.$store.getters.currentUser
		}
	}
};
</script>

<script setup>

    import {ref} from "vue";

    defineProps({
        title: String
    })

    let navigator = ref(true);

    const routes = [
        { title: "Request Form", icon: 'mdi-form-textarea', route: route('request.form') },
        { title: "Requests List", icon: 'mdi-format-list-checkbox', route: route('request.list') }
    ]
</script>

<template>
    <v-app>
        <v-navigation-drawer v-model="navigator">
            <v-list-item title="Varterra"></v-list-item>
            <v-divider></v-divider>
            <v-list-item
                v-for="link in routes"
                :key="link.title"
                link
                :title="link.title"
                :prepend-icon="link.icon"
                @click="$inertia.get(link.route)"
                :value="link.route"
            ></v-list-item>
        </v-navigation-drawer>

        <v-app-bar>
            <template #prepend>
                <v-btn icon="mdi-menu" @click="navigator = !navigator"></v-btn>
            </template>
            <v-app-bar-title :text="title" />
        </v-app-bar>

        <v-main>
            <slot />
        </v-main>
    </v-app>
</template>

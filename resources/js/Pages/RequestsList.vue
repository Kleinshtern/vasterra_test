<script setup>
    import Layout from "@/Layouts/Layout.vue";

    defineProps({
        requests: {
            type: Array,
            required: true
        }
    })
</script>

<template>
    <Layout title="Requests Page">
        <v-container>
            <v-col cols="12">
                <v-table>
                    <thead>
                    <tr>
                        <th class="text-left">
                            ID
                        </th>
                        <th class="text-left">
                            URL
                        </th>
                        <th>Created At</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr
                        v-for="item in requests"
                        :key="item.id"
                    >
                        <td>{{ item.id }}</td>
                        <td>
                            <a :href="item.url" target="_blank">
                                {{ item.url }}
                            </a>
                        </td>
                        <td>{{  item.created_at }}</td>
                    </tr>
                    </tbody>
                </v-table>
            </v-col>
        </v-container>
    </Layout>
</template>

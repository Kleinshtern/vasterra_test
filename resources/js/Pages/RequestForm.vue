<script setup>
    import Layout from "@/Layouts/Layout.vue";
    import {useForm} from "@inertiajs/vue3";

    defineProps({
        errors: Object
    })

    const form = useForm({
        firstName: null,
        lastName: null,
        phoneNumber: null,
        description: null
    })

    function submit() {
        form.post('/form');
    }
</script>

<template>
    <Layout title="Request Form">
        <form @submit.prevent="submit">
            <v-container>
                <v-col cols="12">
                    <v-text-field
                        v-model="form.firstName"
                        :error-messages="errors ? errors.firstName : ''"
                        label="First Name"
                    ></v-text-field>
                </v-col>
                <v-col cols="12">
                    <v-text-field
                        v-model="form.lastName"
                        :error-messages="errors ? errors.lastName : ''"
                        label="Last Name"
                    ></v-text-field>
                </v-col>
                <v-col cols="12">
                    <v-text-field
                        v-model="form.phoneNumber"
                        :error-messages="errors ? errors.phoneNumber : ''"
                        label="Phone Number"
                    ></v-text-field>
                </v-col>
                <v-col cols="12">
                    <v-textarea
                        v-model="form.description"
                        :error-messages="errors ? errors.description : ''"
                        label="Description"
                    ></v-textarea>
                </v-col>

                <v-col cols="12">
                    <v-btn
                        type="submit"
                        block
                        variant="outlined"
                        color="success"
                        prepend-icon="mdi-check"
                        :loading="form.processing"
                    >Send request</v-btn>
                </v-col>
            </v-container>
        </form>
    </Layout>
</template>

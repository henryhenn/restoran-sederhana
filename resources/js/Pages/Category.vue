<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeButton from "@/Components/Button.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    name: "",
});

const submit = () => {
    const alert = document.querySelector("#alert");
    form.post(route("category_store"), {
        onFinish: () => {
            alert.classList.remove("hidden");
            form.reset("name");
        },
    });
};
</script>

<template>
    <Head title="Category" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Category
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-2xl font-bold">Manage Food Category</h3>
                        <div
                            v-if="true"
                            class="bg-emerald-500 px-4 py-2.5 hidden rounded-md mb-4"
                            id="alert"
                        >
                            <div class="flex flex-wrap justify-between">
                                <span class="text-white font-bold">{{
                                    $page.props.flash.message
                                }}</span>
                                <span
                                    class="text-white font-bold"
                                    onclick="this.parentElement.style.display='none'"
                                    >&times;</span
                                >
                            </div>
                        </div>
                        <BreezeValidationErrors class="mb-4" />
                        <div class="flex justify-center">
                            <form
                                @submit.prevent="submit"
                                class="mt-10 w-[50%]"
                            >
                                <div>
                                    <BreezeLabel for="name" value="Name" />
                                    <BreezeInput
                                        id="name"
                                        type="text"
                                        v-model="form.name"
                                        class="block mt-1 w-full"
                                        required
                                    />
                                </div>
                                <div>
                                    <BreezeButton
                                        class="mt-6"
                                        :class="{
                                            'opacity-25': form.processing,
                                        }"
                                        :disabled="form.processing"
                                    >
                                        Submit
                                    </BreezeButton>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

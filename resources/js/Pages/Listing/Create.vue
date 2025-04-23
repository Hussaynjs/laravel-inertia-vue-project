<script setup>
import Container from '../../Components/Container.vue';
import Title from '../../Components/Title.vue';
import TextLink from '../../Components/TextLink.vue';
import InputField from '../../Components/InputField.vue';
import TextArea from '../../Components/TextArea.vue';
import PrimaryBtn from '../../Components/PrimaryBtn.vue';
import ImageUpload from '../../Components/ImageUpload.vue';
import ErrorMessage from '../../Components/ErrorMessage.vue';
import { useForm } from '@inertiajs/vue3';


const form = useForm({
    title: null,
    desc: null,
    tags: null,
    link: null,
    email: null,
    image: null,
    title: null
})


</script>

<template>
         <Head title="- Creat New List" />
    <Container>
        <div class="mb-6">
       <Title>Create A New Listing</Title>
        </div>
        <ErrorMessage :errors="form.errors" />
        <form @submit.prevent="form.post(route('listing.store'))" class="grid grid-cols-2 gap-6">
            <div class="space-y-6">
                <InputField 
                label="Title"
                icon="heading"
                placeholder="Enter Title"
                v-model="form.title"

                />
                <InputField 
                label="Tags (separate with ,)"
                icon="tags"
                placeholder="one, two, three"
                v-model="form.tags"

                />
            </div>

            <div class="space-y-6">
                <InputField 
                label="Email"
                icon="@"
                placeholder="example@gmail.com"
                v-model="form.email"

                />
                <InputField 
                label="Link"
                icon="up-right-from-square"
                placeholder="www.example.com"
                v-model="form.link"

                />
            </div>
            <TextArea
            label="description"
                icon="newspaper"
                placeholder="this is my listing description"
                v-model="form.desc"
            />

            <ImageUpload @image="(i) => form.image = i" />
                <PrimaryBtn :disabled="form.processing">submit</PrimaryBtn>
        </form>
    </Container>

 
</template>
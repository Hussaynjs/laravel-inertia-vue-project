<script setup>
import Container from '../../Components/Container.vue';
import Title from '../../Components/Title.vue';
import TextLink from '../../Components/TextLink.vue';
import InputField from '../../Components/InputField.vue';
import PrimaryBtn from '../../Components/PrimaryBtn.vue';
import ErrorMessage from '../../Components/ErrorMessage.vue';
import CheckBox from '../../Components/CheckBox.vue';
import SessionMessage from '../../Components/SessionMessage.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
        password: '',
})


// const submit = () => {
//         form.post(route('register'), {
//                 onFinish: () => form.reset
//         })
// }

const login = () => {
        form.post(route('password.confirm'), {
                onFinish: () => form.reset()
        })
}

</script>

<template>
        <Head title="login" />
   <Container class="w-1/2 ">
        <div class="text-center mb-8">
                
                <p>This is the secure Area of the Application, Please confirm your password before continuing</p>
        </div>

        <ErrorMessage :errors="form.errors" />
        <form @submit.prevent="login" class="space-y-9">
               
               
                <InputField label="password" type="password" icon="key" v-model="form.password" />

                
                <PrimaryBtn :disabled="form.processing">confirm password</PrimaryBtn>
        </form>

        
   </Container>
  
</template>
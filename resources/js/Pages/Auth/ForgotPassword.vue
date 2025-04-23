<script setup>
import Container from '../../Components/Container.vue';
import Title from '../../Components/Title.vue';
import SessionMessage from '../../Components/SessionMessage.vue';
import InputField from '../../Components/InputField.vue';
import PrimaryBtn from '../../Components/PrimaryBtn.vue';
import ErrorMessage from '../../Components/ErrorMessage.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
       
        email: '',
     
       
})

defineProps({
    status: String
})
// const submit = () => {
//         form.post(route('register'), {
//                 onFinish: () => form.reset
//         })
// }

const login = () => {
        form.post(route('password.email'))
}

</script>

<template>
        <Head title="-forgot password" />
   <Container class="w-1/2 ">
        <div class="text-center mb-8">
            <p>
                Forgot your password? No problem. Just let us know your email
                address and we will email you a password reset link that will
                allow you to choose a new one.
            </p>
        </div>

        <ErrorMessage :errors="form.errors" />
        <SessionMessage :status="status" />

        <form @submit.prevent="login" class="space-y-9">
               
                <InputField label="email" type="email" icon="at" v-model="form.email" />
                
                <PrimaryBtn :disabled="form.processing">Send Password Resend Link</PrimaryBtn>
        </form>

        
   </Container>
  
</template>
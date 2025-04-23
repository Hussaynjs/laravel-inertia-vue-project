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
       
        email: '',
        password: '',
        remember: null
       
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
        form.post(route('login'), {
                onFinish: () => form.reset('password')
        })
}

</script>

<template>
        <Head title="login" />
   <Container class="w-1/2 ">
        <div class="text-center mb-8">
                <Title>Login an account</Title>
                <p>Dont have an account? <TextLink routeName="register" label="Register" />  </p>
        </div>

        <ErrorMessage :errors="form.errors" />
        <SessionMessage :status="status" />

        <form @submit.prevent="login" class="space-y-9">
               
                <InputField label="email" type="email" icon="at" v-model="form.email" />
                <InputField label="password" icon="key" v-model="form.password" />

                <div class="flex items-center justify-between">

                        <CheckBox name="remember me" v-model="form.remember">
                                remember me
                        </CheckBox>
                        <TextLink routeName="password.request" label="forgot-password" />

                </div>
                
                <PrimaryBtn :disabled="form.processing">Login</PrimaryBtn>
        </form>

        
   </Container>
  
</template>